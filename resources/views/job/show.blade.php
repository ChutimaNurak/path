@extends('theme.default')
@section('content')

@forelse($table_job as $row) 
<h1>รหัสรอบงาน {{ $row->ID_Job }} </h1> 
 
	<div class="line"> 
		<strong>ปี/เดือน/วัน และเวลา : </strong> 
		<span>{{ $row->Date }}</span> 
	</div> 
	<div class="line"> 
		<strong>ระยะทางรวม : </strong> 
		<span>{{ $row->Distance_Sum }}</span> 
	</div> 
	
	<div class="line"> 
			<button><a href="{{ url('/') }}/route/create?ID_Job={{ $row->ID_Job }}"> เพิ่มข้อมูลเส้นทาง </a></button>
			<button><a href="{{ url('/') }}/job">back</a></button>
	</div> 

	<table border=1>
	<tr>
		<th>รหัสเส้นทาง</th>
		<th>รหัสรอบงาน</th>
		<th>รหัสตำแหน่ง</th>
		<th>ลำดับที่</th>
		<th>ระยะทาง</th>
		<th>action</th>
	</tr>
	@foreach($table_route as $row)
	<tr>
		<td>{{ $row->ID_Route }} </td>
		<td>{{ $row->ID_Job }}</td>
		<td>{{ $row->ID_Position }}</td>
		<td>{{ $row->Sequence}} </td>
		<td>{{ $row->District}} </td>
		<td>
			<form class="inline" action="{{ url('/') }}/route/{{ $row->ID_Route }}" method="POST"> 
			{{ csrf_field() }} 
			{{ method_field('DELETE') }} 
			<button><a href="{{ url('/') }}/route/{{ $row->ID_Route }}/edit">edit</a></button>
			<button type="submit">Delete</button> 
			</form>
	</tr>
	@endforeach
</table>

	@empty 
	<div>This Customer id does not exist</div>
 @endforelse
 @endsection
