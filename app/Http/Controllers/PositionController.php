<?php

namespace App\Http\Controllers;

use App\PositionModel;
use Illuminate\Http\Request;

class PositionController extends Controller
{
 
    public function index(Request $request)
    {
         $model = new PositionModel();
         $q = $request->input('q');        
         $table_position = $model->select_search($q);
         $data = ['table_position' => $table_position,'q' => $q ];        
        return view('position/index',$data); 

    }

    public function create()
    {
         return view('position/create');
    }

    
    public function store(Request $request)
    {
        $ID = $request->input('ID');
        $House_number = $request->input('House_number');
        $Village = $request->input('Village');
        $District = $request->input('District');
        $City = $request->input('City');
        $Province = $request->input('Province');
        $Zip_code = $request->input('Zip_code');
        $Latitude = $request->input('Latitude');
        $Longitude = $request->input('Longitude');

        $model = new PositionModel();
        $model->insert($ID,$House_number, $Village, $District, $City, $Province, $Zip_code, $Latitude, $Longitude);
        return redirect('/position');

    }

   
    public function show($id)
    {
          $model = new PositionModel();        
          $table_position = $model->select_id($id);       
          $data = ['table_position' => $table_position];      
        return view('position/show',$data); 
    }

    
    public function edit($id)
    {
         $model = new PositionModel();        
         $table_position = $model->select_id($id);        
         $data = ['table_position' => $table_position];        
        return view('position/edit',$data); 
    }

    
    public function update(Request $request, $id)
    {
         $ID = $request->input('ID');        
         $House_number = $request->input('House_number');        
         $Village = $request->input('Village');        
         $District = $request->input('District');
         $City = $request->input('City');        
         $Province = $request->input('Province');        
         $Zip_code = $request->input('Zip_code');        
         $Latitude = $request->input('Latitude');
         $Longitude = $request->input('Longitude');
         $model = new PositionModel();        
         $model->update($ID, $House_number, $Village, $District, $City, $Province, $Zip_code, $Latitude, $Longitude, $id);
        return redirect('/position'); 
    }

    
    public function destroy($id)
    {
           $model = new PositionModel();        
           $model->delete($id);
        return redirect('/position');
    }
}