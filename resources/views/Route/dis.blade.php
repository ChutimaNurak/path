@extends('theme.default')
@section('content')

<?php
	$number[i], $minValue[j];
	$i = 0;
	if($number[i]<$minValue[j]) 
	{
		$minValue[j] = $number[i];
		$number[i-1];
		$minValue[j=1];
		i++;
			if($number[i] == 0)
			{
				if($number[i]<$minValue[j]) 
				{
					$minValue[j] = $number[i];
					$number[i-1];
					$minValue[j=1];
					i++;
				}else 
					$minValue[j];
					print_r($minValue[j]);
			}
	}else 
		i++;
?>

@endsection