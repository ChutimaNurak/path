@extends('theme.default')
@section('content')
@forelse($table_job as $row) 

<style type="text/css">
	table {
		width:100%;
	}
	h2 {
		text-align: center!important;
	}
</style>

<!-- ข้อมูลลูกค้า -->
	<div div class="line">
		<strong>รหัสรอบงาน</strong> 
		<span>{{ $row->ID_Job }}</span>
	</div>
	<div class="line"> 
		<strong>ชื่อรอบงาน : </strong> 
		<span>{{ $row->Name_Job }}</span> 
	</div> 
	<div class="line"> 
			<a href="{{ url('/') }}/route/create?ID_Job={{ $row->ID_Job }}" class="btn btn-warning"> เพิ่มข้อมูลที่อยู่ลูกค้า </a>
			<a href="{{ url('/') }}/route" class="btn btn-primary">back</a>
	</div> 

<h2>ข้อมูลรอบงาน {{ $row->Name_Job }} </h2>
<br>

<!-- ตาราง -->
<table class="table">
	<tr >
		<th >ตำแหน่ง</th>
		<th style="text-align: center!important;">ละจิจูด</th>
		<th style="text-align: center!important;">ลองจิจูด</th>
		<th style="text-align: center!important;">ลำดับที่</th>
		<th style="text-align: center!important;">ระยะทาง</th>	
		<th style="text-align: center!important;">ระยะเวลา</th>

		<th></th>
	</tr>
	@foreach($table_route as $row)
	<tr>
		<td >{{ $row->Province }}</td>
		<td style="text-align: center!important;">{{ $row->Latitude }}</td>
		<td style="text-align: center!important;">{{ $row->Longitude }}</td>
		<td style="text-align: center!important;">{{ $row->Sequence }}</td>
		<td style="text-align: center!important;">{{ $row->District }}</td>
		<td style="text-align: center!important;">{{ $row->Time }}</td>
		<td style="text-align: center!important;">
			<form class="inline" action="{{ url('/') }}route/{{ $row->ID_Route }}?ID_Job{{ $row->ID_Job }}" method="POST"> 
			{{ csrf_field() }} 
			{{ method_field('DELETE') }} 
			<a href="{{ url('/') }}/route/{{ $row->ID_Route }}/edit"class="btn btn-outline btn-success">edit</a>
			<button type="submit" class="btn btn-danger">Delete</button> 
			</form>
		</td>
	</tr>
	@endforeach
</table>

<a href="{{ url('/') }}/route/dis/{ID_Job}">หาเส้นทาง</a>
	@empty 
	<div>This Customer id does not exist</div>
 @endforelse
 @endsection


