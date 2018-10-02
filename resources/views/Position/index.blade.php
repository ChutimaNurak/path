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
<br><h1>รายละเอียดข้อมูลที่อยู่ลูกค้า</h1>
	<div class="line"> 
		<form class="inline" action="{{ url('/') }}/position" method="GET"> 
			<input type="text" name="q" placeholder="ระบุรหัสไปรษณีย์" value="{{ $q }}"> 
			<button type="submit">ค้นหา</button> 
		</form> 
	</div>

<table border=1>
	<tr>
		<th>รหัสตำแหน่ง</th>
		<th>รหัสลูกค้า</th>
		<th>บ้านเลขที่</th>
		<th>หมู่ที่</th>
		<th>ตำบล</th>
		<th>อำเภอ</th>
		<th>จังหวัด</th>
		<th>รหัสไปรษณีย์</th>
		<th>ละติจูด</th>
		<th>ลองจิจูด</th>
		<th>action</th>
	</tr>
	@foreach($table_position as $row)
	<tr>
		<td>{{ $row->ID_Position }} </td>
		<td>{{ $row->ID }}</td>
		<td>{{ $row->House_number }}</td>
		<td>{{ $row->Village }} </td>
		<td>{{ $row->District }}</td>
		<td>{{ $row->City }}</td>
		<td>{{ $row->Province }}</td>
		<td>{{ $row->Zip_code }}</td>
		<td>{{ $row->Latitude }}</td>
		<td>{{ $row->Longitude }}</td>
		<td>
			<form class="inline" action="{{ url('/') }}/position/{{ $row->ID_Position }}" method="POST"> 
			{{ csrf_field() }} 
			{{ method_field('DELETE') }} 
			<button type="submit">Delete</button> 
			<button><a href="{{ url('/') }}/position/{{ $row->ID_Position }}/edit">edit</a></button>
			<button><a href="{{ url('/') }}/position/{{ $row->ID_Position }}">Viwe</a></button>
			</form>
		</td>
	</tr>
	@endforeach
</table>
@endsection