@extends('theme.default')
@section('content')
 <style >
	table {
		width:100%;
		text-align: center!important;
	}
	th{
		text-align: center!important;
	}
	h3{
		text-align: center!important;
	}
</style>

@forelse($table_job as $row) 
<h2>รหัสรอบงาน {{ $row->ID_Job }} </h2> 
	<div class="line"> 
		<strong>ปี/เดือน/วัน และเวลา : </strong> 
		<span>{{ $row->Date }}</span> 
	</div> 
	<div class="line"> 
		<strong>ระยะทางรวม : </strong> 
		<span>{{ $row->Distance_Sum }}</span> 
	</div> 
	
	<div class="line"> 
			<button><a href="{{ url('/') }}/route/create?ID_Job={{$ID_Job}}"> เพิ่มข้อมูลเส้นทาง </a></button>
			<button><a href="{{ url('/') }}/job">back</a></button>
	</div> 

<br>
	<table border=1>
	<tr>
		<th>รหัสรอบงาน</th>
		<th>รหัสเส้นทาง</th>
		<th>รหัสตำแหน่ง</th>
		<th>ลำดับที่</th>
		<th>ระยะทาง</th>
		<th></th>
	</tr>
	@foreach($table_route as $row)
	<tr>
		<td>{{ $row->ID_Job }}</td>
		<td>{{ $row->ID_Route }} </td>
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
<br>
<button>คำนวนเส้นทาง</a></button>
	@empty 
	<div>This Customer id does not exist</div>
 @endforelse
 @endsection
