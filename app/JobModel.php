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
		$sql = "select * from job where Name_Job like '%{$q}%'";
		return DB::select($sql, []);
	}

	function insert($name_job){
		$sql = "insert into job (Name_Job) values ('{$name_job}')";
		DB::insert($sql, []);
	}

	function update($name_job,$date, $distance_sum,$time_sum,$id){
		$sql = "update job
				set 
				   Name_Job = '{$name_job}',
				   Date = '{$date}',
				   Distance_Sum = {$distance_sum},
				   Time_Sum = {$time_sum}
				where ID_Job = {$id}";
		DB::update($sql, []);
	}

	function delete($id){
		$sql = "delete from job where ID_Job = {$id}";
		DB::delete($sql, []);
	}
	
}