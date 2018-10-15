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
		$sql = "select * from route where ID_Route = {$id}";
		return DB::select($sql, []);
	}

	function select_id_job($id){
		$sql = "select * from route where ID_Job = {$id}";
		return DB::select($sql, []);
	}

	function select_search($q){
		$sql = "select * from route where ID_Route like '%{$q}%'";
		return DB::select($sql, []);
	}

	function insert($id_job,$id_position,$sequence,$district,$ID_Route){
		$sql = "insert into route (ID_Job,ID_Position,Sequence,District,ID_Route) 
				values ({$id_job},{$id_position},{$sequence},{$district},{$ID_Route})";
		DB::insert($sql, []);
	}

	function update($id_job, $id_position, $sequence, $district, $ID_Route,$id){
		$sql = "update route 
			set 
				ID_Job 	     = {$id_job},
				ID_Position  = {$id_position}, 
				Sequence     = {$sequence},
				District     = {$district},
				ID_Route	 = {$ID_Route}
			where 	ID_Route = {$id}";
		DB::update($sql, []);
	}
	function delete($id){
		$sql = "delete from route where ID_Route = {$id}";
		DB::delete($sql, []);
	}
	function select_jobId($id) {
		$sql = "select ID_Job from route where ID_Route = {$id}";
		return DB::select($sql,[]);
	}
}