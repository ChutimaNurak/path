<?php
namespace App\Http\Controllers;
use App\JobModel;
use App\RouteModel;
use Illuminate\Http\Request;

class JobController extends Controller {
    public function index(Request $request) {

            $model = new JobModel();
            $q = $request->input('q');        
            $table_job = $model->select_search($q);  // search Name_Job
            $data = ['table_job' => $table_job,'q' => $q ];        

        return view('job/index',$data); 
    }

    public function create() {   
         return view('job/create');
    }
    
    public function store(Request $request) {

            $name_job = $request->input('Name_Job');
            $model = new JobModel();
            $model->insert($name_job);

        return redirect('/job');
    }
   
    public function show($id_job) {

            $model = new JobModel();        
            $table_job = $model->select_id($id_job);

            $model_route = new RouteModel();     
            $table_route = $model_route->select_position_route_customer($id_job);

            $data = ['table_job' => $table_job,'table_route' => $table_route,'ID_Job' => $id_job ]; 

        return view('job/show',$data); 
    }
    
    //โชว์เฉพาะ ID 
    public function edit($id_job) {

            $model = new JobModel();        
            $table_job = $model->select_id($id_job);        
            $data = ['table_job' => $table_job]; 

        return view('job/edit',$data); 
    }
    
    public function update(Request $request, $id_job) {

            $name_job = $request->input('Name_Job');
            $date = $request->input('Date');        
            $distance_sum = $request->input('Distance_Sum');  
            $time_sum = $request->input('Time_Sum'); 
                 
            $model = new JobModel();        
            $model->update($name_job, $date, $distance_sum, $time_sum, $id_job);

        return redirect('/job'); 
    }

    public function destroy($id_job) {
        
           $model = new JobModel();        
           $model->delete($id_job);

        return redirect('/job');
    }
}