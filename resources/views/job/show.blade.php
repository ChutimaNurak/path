@extends('theme.default')
@section('content')
@forelse($table_job as $row) 

 <style >
	table {
		width:100%;
	}
	h2{
		text-align: center!important;
	}
</style>
<br>

	<div class="line"> 
		<strong>รอบงาน </strong> 
		<span>{{ $row->Name_Job }}</span> 
	</div> 
	<div class="line"> 
		<strong>ปี/เดือน/วัน และเวลา : </strong> 
		<span>{{ $row->Date }}</span> 
	</div> 
	<div class="line"> 
		<strong>ระยะทางรวม : </strong> 
		<span>{{ $row->Distance_Sum }}</span> 
	</div> 
	<div class="line"> 
		<strong>ระยะเวลารวม : </strong> 
		<span>{{ $row->Time_Sum }}</span> 
	</div> 
		<div class="line"> 
			<a href="{{ url('/') }}/route/create?ID_Job={{$ID_Job}}" class="btn btn-warning"> เพิ่มข้อมูลเส้นทาง </a>
			<a href="{{ url('/') }}/job" class="btn btn-primary">back</a>
	</div> 

<br>
<h2>รอบงาน {{ $row->Name_Job }} </h2>
<br>
	<table class="table">
	<tr>
		<th style="text-align: center!important;">รหัสเส้นทาง</th>
		<th>ตำแหน่ง</th>
		<th>ละติจูด</th>
		<th>ลองจิจูด</th>
		<th>ลำดับที่</th>
		<th>ระยะทาง</th>
		<th>เวลา</th>
		<th></th>
	</tr>
	@foreach($table_route as $row)
	<tr>
		<td style="text-align: center!important;">{{ $row->ID_Route }} </td>
		<td>{{ $row->Province }} </td>
		<td>{{ $row->Latitude }} </td>
		<td>{{ $row->Longitude }} </td>
		<td>{{ $row->Sequence}} </td>
		<td>{{ $row->District}} </td>
		<td>{{ $row->Time}}</td>
		<td>
			<form class="inline" action="{{ url('/') }}/route/{{ $row->ID_Route }}?ID_Job={{$ID_Job}}" method="POST"> 
			{{ csrf_field() }} 
			{{ method_field('DELETE') }} 
			<a href="{{ url('/') }}/route/{{ $row->ID_Route }}/edit" class="btn btn-outline btn-success">edit</a>
			<button type="submit" class="btn btn-danger">Delete</button> 
			</form>
	</tr>
	@endforeach
</table>

<br>

<a href="{{ url('/') }}/route/dis/{{$row->ID_Job}}" class="btn btn-primary">คำนวนเส้นทาง</a>


@empty 
<div>This Customer id does not exist</div>
@endforelse
 @endsection
