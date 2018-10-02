<?php

namespace App;

use Illuminate\Support\Facades\DB;

class JobModel 
{
	function select(){
		$sql = "select * from job";
		return DB::select($sql, []);
	}

	function select_id($id){
		$sql = "select * from job where ID_Job = {$id}";
		return DB::select($sql, []);
	}

	function select_search($q){
		$sql = "select * from job where Date like '%{$q}%'";
		return DB::select($sql, []);
	}

	function insert($distance_Sum){
		//$sql = "insert into job (Distance_Sum) values (50)";
		$sql = "insert into job (Distance_Sum) values ({$distance_Sum})";
		DB::insert($sql, []);
	}

	function update($date, $distance_Sum,$id){
		$sql = "update job 
			set 
				Date 	  = '{$date}',
				Distance_Sum  = {$distance_Sum} 
			where ID_Job = {$id}";
		DB::update($sql, []);
	}

	function delete($id){
		$sql = "delete from job where ID_Job = {$id}";
		DB::delete($sql, []);
	}

}