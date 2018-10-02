@extends('theme.default')
@section('content')
<style type="text/css">
	table {
		width:80%;
	}
	th {
		text-align: center!important;
	}
	td {
		text-align: center!important;
	}
</style>
<br>
<h1 style="text-align: center!important">รายละเอียดข้อมูลเส้นทาง</h1>
	<div class="line"> 
		<form class="inline" action="{{ url('/') }}/route" method="GET"> 
			<input type="text" name="q" placeholder="ระบุชื่อ - นามสกุล" value="{{ $q }}"> 
			<button type="submit">ค้นหา</button> 
		</form> 
	</div>
<br>
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
			<button type="submit">Delete</button> 
			<button><a href="{{ url('/') }}/route/{{ $row->ID_Route }}/edit">edit</a></button>
			<button><a href="{{ url('/') }}/route/{{ $row->ID_Route }}">Viwe</a></button>
			</form>
	</tr>
	@endforeach
</table>
@endsection