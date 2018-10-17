<?php

namespace App\Http\Controllers;

use App\RouteModel;
use App\JobModel;
use App\PositionModel;
use Illuminate\Http\Request;


class RouteController extends Controller
{
 
    public function index(Request $request)
    {
         $model = new RouteModel();
         $q = $request->input('q');        
         $table_route = $model->select_search($q);
         $data = ['table_route' => $table_route,'q' => $q ];        
        return view('route/index',$data); 

    }

    public function create(Request $request)
    {
        //PositionModel
        $model = new PositionModel();
        $table_position= $model->select_all();
        $data1 = ['table_position'=>$table_position];

        $ID_Job = $request->input('ID_Job');
        $data = ['ID_Job' => $ID_Job];
         return view('route/create',$data,$data1);
    }

    
    public function store(Request $request)
    {
        $ID_Job = $request->input('ID_Job');
        $ID_Position = $request->input('ID_Position');
        $model = new RouteModel();
        $model->insert($ID_Job,$ID_Position);
        return redirect("/job/{$ID_Job}");

    }

   
    public function show($id)
    {
          $model = new RouteModel();        
          $table_route = $model->select_id($id);       
          $data = ['table_route' => $table_route];      
        return view('route/show',$data); 
    }

    
    public function edit($id)
    {
         $model = new RouteModel();        
         $table_route = $model->select_id($id); 
         $data = ['table_route' => $table_route]; 

         $model = new PositionModel();   
         $table_position = $model->select_all();  
         $data1 = ['table_position' => $table_position]; 
                
        return view('route/edit',$data,$data1); 
    }

    
    public function update(Request $request, $id)
    {
         $ID_Job = $request->input('ID_Job');        
         $ID_Position = $request->input('ID_Position');        
         $Sequence = $request->input('Sequence');    
         $District = $request->input('District');
         $ID_Route = $request->input('ID_Route');    

         $model = new RouteModel();        
         $model->update($ID_Job, $ID_Position, $Sequence,$District, $ID_Route,$id);
        return redirect("/job/{$ID_Job}"); 
    }

    
    public function destroy($id)
    {
            echo $id;
           $model = new RouteModel(); 
           $ID_Job = $model->select_jobId($id);
            
           $model->delete($id);

        return redirect("/job/".$ID_Job[0]->ID_Job);
    }
}
