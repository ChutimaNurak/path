<?php

namespace App;

use Illuminate\Support\Facades\DB;

class RouteModel 
{
	function select(){
		$sql = "select * from route";
		return DB::select($sql, []);
	}

	function select_id($id){
		$sql = "select * from route where 	ID_Route = {$id}";
		return DB::select($sql, []);
	}

	function select_id_route($id){
		$sql = "select * from route where ID_Route = {$id}";
		return DB::select($sql, []);
	}

	function select_search($q){
		$sql = "select * from route where ID_Route like '%{$q}%'";
		return DB::select($sql, []);
	}

	function insert($ID_Job,$ID_Position,$Sequence,$District){
		$sql = "insert into route (ID_Job,ID_Position,Sequence,District) 
				values ({$ID_Job},{$ID_Position},{$Sequence},{$District})";
		DB::insert($sql, []);
	}

	function update($id_job, $id_position, $sequence, $district, $id){
		$sql = "update route 
			set 
				ID_Job 	     = {$id_job},
				ID_Position  = {$id_position}, 
				Sequence     = {$sequence},
				District     = {$district}
			where 	ID_Route = {$id}";
		DB::update($sql, []);
	}

	function delete($id){
		$sql = "delete from route where ID_Route = {$id}";
		DB::delete($sql, []);
	}

}