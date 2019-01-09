<?php
namespace App\Http\Controllers;
use App\RouteModel;
use App\JobModel;
use App\PositionModel;
use PDF;
use DB;
use Illuminate\Http\Request;
use \stdClass;

class RouteController extends Controller{
 
    public function index(Request $request) {

            $model = new RouteModel();
            $q = $request->input('q');        
            $table_route = $model->select_search($q); ////search ID_Route
            $data = ['table_route' => $table_route,'q' => $q ]; 

        return view('route/index',$data); 
    }

    public function create(Request $request) {

            $ID_Job = $request->input('ID_Job');
            $data = ['ID_Job' => $ID_Job];

            $model = new PositionModel();
            $table_position= $model->select_all();
            $data1 = ['table_position'=>$table_position];

        return view('route/create',$data,$data1);
    }

    public function store(Request $request) {

            $id_job = $request->input('ID_Job');
            $id_position = $request->input('ID_Position');

            $model = new RouteModel();
            $model->insert($id_job,$id_position);

            $this->dis($id_job); //เรียกใช้ฟังชั้นdis

        return redirect("/job/{$id_job}");

    }
   
    public function show($id_route){

            $model = new RouteModel();        
            $table_route = $model->select_id($id_route);       
            $data = ['table_route' => $table_route];      
        
        return view('route/show',$data); 
    }

    public function edit($id_route) {

            $model = new RouteModel();        
            $table_route = $model->select_id($id_route); 
            $data = ['table_route' => $table_route]; 

            $model = new PositionModel();   
            $table_position = $model->select_all();  
            $data1 = ['table_position' => $table_position]; 
                
        return view('route/edit',$data,$data1); 
    }

    public function update(Request $request, $id_route) {

            $id_job = $request->input('ID_Job');        
            $id_position = $request->input('ID_Position');        
            $sequence = $request->input('Sequence');    
            $district = $request->input('District');   
            $time = $request->input('Time');

            $model = new RouteModel();        
            $model->update($id_job, $id_position,$sequence,$district,$time,$id_route);

            $this->dis($id_job); //เรียกใช้ฟังชั้นdis

        return redirect("/job/{$id_job}"); 
    }

    public function destroy(Request $request,$id_route){

            $model = new RouteModel();     
            $id_job = $request->input('ID_Job');     
            $model->delete($id_route);

            $this->dis($id_job); //เรียกใช้ฟังชั้นdis
        
        return redirect("/job/{$id_job}");
    }

    //Export PDF
    public function downloadpdf ($id_job) {
            $model = new JobModel();        
            $table_job = $model->select_id($id_job);

            $model_route = new RouteModel();     
            $table_route = $model_route->select_position_route_customer($id_job);

            $data = ['table_job' => $table_job,'table_route' => $table_route, 'ID_Job' => $id_job]; 

            $pdf = PDF::loadView('pdf',$data);
            return $pdf->stream('pdf');
    }
    
//คำนวนเส้นทาง
    public function dis($id_job){

    //ตำแหน่งที่ยังไม่ได้เรียง ดึงมากจาก Route ด้วย id_job
        $model = new RouteModel();        
        $table_route = $model->select_la_lon($id_job); 
        $number = $table_route;
        //print_r($number);

    //สร้างออปเจค
        $first = new \stdClass(); //กำหนดจุดตำแหน่งเริ่มต้น ม.วไล
        $first->Latitude = 14.133469;
        $first->Longitude = 100.616013;

        $minValue = [$first];   //เก็บตำแหน่ง$first ไว้ใน minValue
 
        // (stat;stop;stap)
        for($i=0;count($number)!=0;$i++){
            $min = 99999999999; 
            $pos = 0;           
            for($j=0; $j<count($number);$j++){

                //la lon ตำแหน่งเริ่มต้น ตำแหน้งตัวสุดท้ายที่อยู่ใน minValue
                $x1 = $minValue[count($minValue) - 1]->Latitude;
                $y1 = $minValue[count($minValue) - 1]->Longitude;

                //la lon ตำแหน่งถัดไป ตำแหน่งที่อยู่ในnumber
                $x2 = $number[$j]->Latitude;
                $y2 = $number[$j]->Longitude;

                //เรียกฟังชั่นคำนวนระยะทาง District
                $d = $this->District($x1,$x2,$y1,$y2);

                //เงือนไข ตำแหน่งตัวสุดท้ายของminValue เปรียบเทีบค่าระยะทางกับ ตำแหน่งใน number
                    if( $d < $min ) 
                    {
                        $min = $d;
                        $pos = $j;        
                    }
            }
            //print_r($number[$pos]);

            //ฝังd ระยะทาง
            $number[$pos]->d = $d;

            //t ระยะเวลา
            $t=$d*1.2;
            $number[$pos]->t = $t;

            //ค่า $number[i] ที่สั้นที่สุดไปเก็บไว้ใน $minValue[j] 
            $minValue[] = $number[$pos];

            //ลบค่า number ตามตำแหน่งที่ $pos ใส่1เพราะต้องการลบแค่ตำแหน่งที่pos
            array_splice($number, $pos, 1);   
        }
       // print_r($minValue);    

    //up data
        $i = 1;

        //ลบตำแหน่งแรกออกจากminValue 0 คือต่ำแหน่ง 1คือ1ตัว แต่ถ้าไม่ใช่1ลบตั้งแต่1เป็นต้นไป
        array_splice($minValue, 0, 1);

        //ระยะเวลารวม
        $time_sum = 0;

        //ระยะทางรวม
        $dis_sum = 0;

        foreach($minValue as $row){

            $time_sum = $time_sum + $row->t;
            $dis_sum = $dis_sum + $row->d;

            //update
            $model = new RouteModel(); 
            //print_r($row);
            //$row->ID_Job rowคือแถว เข้าถึงคอลัมID_Job
            $model->update($row->ID_Job, $row->ID_Position, $i, $row->d, $row->t, $row->ID_Route);
            $i++;
         }
         //print_r("TEST");

         $model_job = new JobModel();
         $model_job->up_time($dis_sum,$time_sum,$id_job);

          return redirect("/job/{$id_job}");
    }

//ฟังก์ชั่นคำนวณ ระยะทาง
    public function District($latitudeFrom, $latitudeTo, $longitudeFrom, $longitudeTo) {
        $earthRadius = 6371000;
        $latFrom = deg2rad($latitudeFrom);  //x1
        $lonFrom = deg2rad($longitudeFrom); //y1
        $latTo = deg2rad($latitudeTo);      //x2  
        $lonTo = deg2rad($longitudeTo);     //y2
        $lonDelta = $lonTo - $lonFrom;
        $a = pow(cos($latTo) * sin($lonDelta), 2) + pow(cos($latFrom) * sin($latTo) - sin($latFrom) * 
            cos($latTo) * cos($lonDelta), 2);
        $b = sin($latFrom) * sin($latTo) + cos($latFrom) * cos($latTo) * cos($lonDelta);

        $angle = atan2(sqrt($a), $b);
      return ($angle * $earthRadius) / 1000;
    } 

    public function District2($x1,$x2,$y1,$y2){
        $d=sqrt( (($x2-$x1)*($x2-$x1)) + (($y2-$y1)*($y2-$y1)) );
        return $d;
    }

    public function json($id_job){
            $model = new RouteModel();        
            $table_route = $model->select_la_lon($id_job);
        return response()->json($table_route);
    }  
}  
    
   