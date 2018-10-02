@extends('theme.default')
@section('content')
<style type="text/css">
	table {
		width:100%;
	}
	th {
		text-align: center!important;
	}
</style>
<br><h1>รายละเอียดข้อมูลรอบงาน</h1>
	<div class="line"> 
		<form class="inline" action="{{ url('/') }}/job" method="GET"> 
			<input type="text" name="q" placeholder="ปี/เดือน/วัน และเวลา" value="{{ $q }}"> 
			<button type="submit">ค้นหา</button> 
		</form> 
	</div>

<table border=1>
	<tr>
		<th>รหัสรอบงาน</th>
		<th>ปี/เดือน/ปี และเวลา</th>
		<th>ระยะทางรวม</th>
		<th>action</th>
	</tr>
	@foreach($table_job as $row)
	<tr>
		<td>{{ $row->ID_Job }} </td>
		<td>{{ $row->Date }}</td>
		<td>{{ $row->Distance_Sum }}</td>
		<td>
			<form class="inline" action="{{ url('/') }}/job/{{ $row->ID_Job }}" method="POST"> 
			{{ csrf_field() }} 
			{{ method_field('DELETE') }} 
			<button type="submit">Delete</button> 
			<button><a href="{{ url('/') }}/job/{{ $row->ID_Job }}/edit">edit</a></button>
			<button><a href="{{ url('/') }}/job/{{ $row->ID_Job }}">Viwe</a></button>
			</form>
	</tr>
	</tr>
	@endforeach
</table>
@endsection