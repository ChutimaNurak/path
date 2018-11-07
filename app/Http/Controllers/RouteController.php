<?php

namespace App\Http\Controllers;
use App\RouteModel;
use App\JobModel;
use App\PositionModel;
use Illuminate\Http\Request;
use \stdClass;

class RouteController extends Controller{
 
    public function index(Request $request) {
            $model = new RouteModel();
            $q = $request->input('q');        
            $table_route = $model->select_search($q);
            $data = ['table_route' => $table_route,'q' => $q ]; 

        return view('route/index',$data); 
    }

    public function create(Request $request) {
            $ID_Job = $request->input('ID_Job');
            $data = ['ID_Job' => $ID_Job];
            //PositionModel
            $model = new PositionModel();
            $table_position= $model->select_all();
            $data1 = ['table_position'=>$table_position];

        return view('route/create',$data,$data1);
    }

    public function store(Request $request) {
            $ID_Job = $request->input('ID_Job');
            $ID_Position = $request->input('ID_Position');
            $model = new RouteModel();
            $model->insert($ID_Job,$ID_Position);
            
        return redirect("/job/{$ID_Job}");

    }
   
    public function show($id){
            $model = new RouteModel();        
            $table_route = $model->select_id($id);       
            $data = ['table_route' => $table_route];      
        
        return view('route/show',$data); 
    }

    public function edit($id) {
            $model = new RouteModel();        
            $table_route = $model->select_id($id); 
            $data = ['table_route' => $table_route]; 

            $model = new PositionModel();   
            $table_position = $model->select_all();  
            $data1 = ['table_position' => $table_position]; 
                
        return view('route/edit',$data,$data1); 
    }

    public function update(Request $request, $id) {
            $ID_Job = $request->input('ID_Job');        
            $id_position = $request->input('ID_Position');        
            $sequence = $request->input('Sequence');    
            $district = $request->input('District');   
            $time = $request->input('Time');
            $model = new RouteModel();        
            $model->update($ID_Job, $id_position,$sequence,$district,$time,$id);

        return redirect("/job/{$ID_Job}"); 
    }

    public function destroy(Request $request,$id){
            $model = new RouteModel();     
            $ID_Job = $request->input('ID_Job');     
            $model->delete($id);
        
        return redirect("/job/{$ID_Job}");
    }

    //คำนวนเส้นทาง
    // public function dis($id){
    //         $model = new RouteModel();        
    //         $table_route = $model->select_route($id);
    //         print_r($table_route);
    //         //สร้างออปเจ๊ก
    //         $first = new \stdClass();
    //         //ตำแกน่งเริ่มต้น
    //         $first->Latitude = 14.133469;
    //         $first->Longitude = 100.616013;

    //         $order = [$first];
    //         $distance = [];
    //             for($i = 0 ; $i<count($table_route); $i++) {
    //             $distance[$i] = haversineGreatCircleDistance(end($order)->Latitude, 
    //                 end($order)->Longitude, 
    //                 $table_route[$i]->Latitude,
    //                 $table_route[$i]->Longitude);         
    //             }

    //         $data = ['table_route' => $table_route]; 
            
    //     return view("route/dis",$data);
    //     }
 
    // function haversineGreatCircleDistance($latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo) {
    //     $earthRadius = 6371000;
    //     // convert from degrees to radians
    //     $latFrom = deg2rad($latitudeFrom);
    //     $lonFrom = deg2rad($longitudeFrom);
    //     $latTo = deg2rad($latitudeTo);
    //     $lonTo = deg2rad($longitudeTo);

    //     $lonDelta = $lonTo - $lonFrom;
    //     $a = pow(cos($latTo) * sin($lonDelta), 2) + pow(cos($latFrom) * sin($latTo) - sin($latFrom) * cos($latTo) * cos($lonDelta), 2);
    //     $b = sin($latFrom) * sin($latTo) + cos($latFrom) * cos($latTo) * cos($lonDelta);

    //     $angle = atan2(sqrt($a), $b);
    //   return ($angle * $earthRadius);
    // }   
}   