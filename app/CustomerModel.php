<?php
namespace App;
use Illuminate\Support\Facades\DB;
class CustomerModel {
	
	function select(){
		$sql = "select * from customer";
		return DB::select($sql, []);
	}

	function select_id($id){
		$sql = "select * from customer where ID = {$id}";
		return DB::select($sql, []);
	}

	function select_search($q){
		$sql = "select * from customer where Name like '%{$q}%'";
		return DB::select($sql, []);
	}

	function insert($Name, $Telephone, $Email){
		$sql = "insert into customer (Name,Telephone,Email) 
				values ('{$Name}','{$Telephone}','{$Email}')";
		DB::insert($sql, []);
	}

	function update($Name, $Telephone, $Email,$id){
		$sql = "update customer 
			set 
				Name 	  = '{$Name}',
				Telephone  = '{$Telephone}', 
				Email     = '{$Email}'
			where ID = {$id}";
		DB::update($sql, []);
	}

	function delete($id){
		$sql = "delete from customer where ID = {$id}";
		DB::delete($sql, []);
	}
}