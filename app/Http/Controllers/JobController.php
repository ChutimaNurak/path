<?php

namespace App\Http\Controllers;

use App\JobModel;
use Illuminate\Http\Request;

class JobController extends Controller
{
 
    public function index(Request $request)
    {
         $model = new JobModel();
         $q = $request->input('q');        
         $table_job = $model->select_search($q);
         $data = ['table_job' => $table_job,'q' => $q ];        
        return view('job/index',$data); 

    }

    public function create()
    {
         return view('job/create');
    }

    
    public function store(Request $request)
    {
  

        $model = new JobModel();
        $model->insert();
        return redirect('/job');

    }

   
    public function show($id)
    {
          $model = new JobModel();        
          $table_job = $model->select_id($id);       
          $data = ['table_job' => $table_job];      
        return view('job/show',$data); 
    }

    
    public function edit($id)
    {
         $model = new JobModel();        
         $table_job = $model->select_id($id);        
         $data = ['table_job' => $table_job];        
        return view('job/edit',$data); 
    }

    
    public function update(Request $request, $id)
    {
         $date = $request->input('Date');        
         $distance_sum = $request->input('Distance_Sum');               

         $model = new JobModel();        
         $model->update($date, $distance_sum, $id);
        return redirect('/job'); 
    }

    
    public function destroy($id)
    {
           $model = new JobModel();        
           $model->delete($id);
        return redirect('/job');
    }
}