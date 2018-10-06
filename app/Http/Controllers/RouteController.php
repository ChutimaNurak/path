<?php

namespace App\Http\Controllers;

use App\RouteModel;
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

    public function create()
    {
         return view('route/create');
    }

    
    public function store(Request $request)
    {
        $ID_Job = $request->input('ID_Job');
        $ID_Position = $request->input('ID_Position');
        $Sequence = $request->input('Sequence');
        $District = $request->input('District');

        $model = new RouteModel();
        $model->insert($ID_Job,$ID_Position,$Sequence,$District);
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
        return view('route/edit',$data); 
    }

    
    public function update(Request $request, $id)
    {
         $ID_Job = $request->input('ID_Job');        
         $ID_Position = $request->input('ID_Position');        
         $Sequence = $request->input('Sequence');    
         $District = $request->input('District');    

         $model = new RouteModel();        
         $model->update($ID_Job, $ID_Position, $Sequence,$District, $id);
        return redirect("/job/{$ID_Job}"); 
    }

    
    public function destroy($id)
    {
           $model = new RouteModel();        
           $model->delete($id);
        return redirect("/job/{$ID_Job}");
    }
}
