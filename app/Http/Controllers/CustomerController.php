<?php
namespace App\Http\Controllers;
use App\CustomerModel;
use App\PositionModel;
use Illuminate\Http\Request;

class CustomerController extends Controller {
 
    public function index(Request $request) {
         $model = new CustomerModel();
         $q = $request->input('q');        
         $table_customer = $model->select_search($q);
         $data = ['table_customer' => $table_customer,'q' => $q ];        
        return view('customer/index',$data); 
    }

    public function create() {
         return view('customer/create');
    }

    
    public function store(Request $request) {
        $Name = $request->input('Name');
        $Telephone = $request->input('Telephone');
        $Email = $request->input('Email');

        $model = new CustomerModel();
        $model->insert($Name,$Telephone,$Email);
        return redirect('/customer');
    }

   
    public function show($id) {
          $model = new CustomerModel();        
          $table_customer = $model->select_id($id);       
          $model_pos = new PositionModel();
          $table_position = $model_pos->select_id_customer($id);
          $data = ['table_customer' => $table_customer,'table_position' => $table_position];      
        return view('customer/show',$data); 
    }

    
    public function edit($id) {
         $model = new CustomerModel();        
         $table_customer = $model->select_id($id);        
         $data = ['table_customer' => $table_customer];        
        return view('customer/edit',$data); 
    }

    
    public function update(Request $request, $id) {
         $Name = $request->input('Name');        
         $Telephone = $request->input('Telephone');        
         $Email = $request->input('Email');        

         $model = new CustomerModel();        
         $model->update($Name, $Telephone, $Email, $id);
        return redirect('/customer'); 
    }

    
    public function destroy($id) {
           $model = new CustomerModel();        
           $model->delete($id);
        return redirect('/customer');
    }

}