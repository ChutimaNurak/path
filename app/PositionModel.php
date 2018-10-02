<?php

namespace App;

use Illuminate\Support\Facades\DB;

class PositionModel 
{
	function select(){
		$sql = "select * from position";
		return DB::select($sql, []);
	}

	function select_id($id){
		$sql = "select * from position where ID_Position = {$id}";
		return DB::select($sql, []);
	}

	function select_id_customer($id){
		$sql = "select * from position where ID = {$id}";
		return DB::select($sql, []);
	}

	function select_search($q){
		$sql = "select * from position where Zip_code like '%{$q}%'";
		return DB::select($sql, []);
	}

	function insert($ID, $House_number, $Village, $District, $City, $Province, $Zip_code, $Latitude, $Longitude){
		$sql = "insert into position (ID,House_number,Village,District,City,Province,Zip_code,Latitude,Longitude) 
				values ({$ID},'{$House_number}','{$Village}','{$District}','{$City}','{$Province}','{$Zip_code}',
						'{$Latitude}','{$Longitude}')";
		DB::insert($sql, []);
	}

	function update($ID, $House_number, $Village, $District, $City,$Province,$Zip_code,$Latitude,$Longitude,$id){
		$sql = "update position 
			set 
				ID 			 = {$ID},
				House_number = '{$House_number}', 
				Village      = '{$Village}',  
				District     = '{$District}', 
				City         = '{$City}',
				Province     = '{$Province}',
				Zip_code     = '{$Zip_code}',
				Latitude     = {$Latitude},
				Longitude    = {$Longitude}
			where ID_Position = {$id}";
		DB::update($sql, []);
	}

	function delete($id){
		$sql = "delete from position where ID_Position = {$id}";
		DB::delete($sql, []);
	}

}