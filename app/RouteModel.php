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
	
	//View ID_Job
	function select_position_route($id){
		$sql = "select * FROM position INNER JOIN route ON position.ID_Position = route.ID_Position WHERE ID_Job = {$id}";
		return DB::select($sql, []);
	}
	//View Latitude&Longitude
	// function select_route($id) {
	// 	$sql = "select position.Latitude, position.Longitude 
	// 			FROM position 
	// 			INNER JOIN route ON position.ID_Position = route.ID_Position 
	// 			INNER JOIN job ON route.ID_Job = job.ID_Job 
	// 			WHERE job.ID_Job = {$id}";
	// 	return DB::select($sql,[]);
	// }

	function select_id_job($id){
		$sql = "select * from route where ID_Job = {$id}";
		return DB::select($sql, []);
	}

	function select_search($q){
		$sql = "select * from route where ID_Route like '%{$q}%'";
		return DB::select($sql, []);
	}

	function insert($id_job,$id_position){
		$sql = "insert into route (ID_Job,ID_Position) 
				values ({$id_job},{$id_position})";
		DB::insert($sql, []);
	}

	function update($id_job, $id_position, $sequence, $district, $time, $id){
		$sql = "update route 
			set 
				ID_Job 	     = {$id_job},
				ID_Position  = {$id_position}, 
				Sequence     = {$sequence},
				District     = {$district},
				Time 		 = {$time}

			where ID_Route = {$id}";
		DB::update($sql, []);
	}

	function delete($id){
		$sql = "delete from route where ID_Route = {$id}";
		DB::delete($sql, []);
	}

}