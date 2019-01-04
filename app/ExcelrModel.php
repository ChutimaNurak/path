<?php
namespace App;
use Illuminate\Support\Facades\DB;

class ExcelrModel 
{	
	function uprout($district, $time, $id_route){
		$sql = "update route 
			set  
				District     = {$district},
				Time 		 = {$time}
			where ID_Route = {$id_route}";
		DB::update($sql, []);
	}

	function upjob($district_Sum, $time_Sum, $id_job){
		$sql = "update route 
			set  
				District_Sum     = {$district_Sum},
				Time_Sum 		 = {$time_Sum}
			where ID_Route = {$id_job}";
		DB::update($sql, []);
	}

}