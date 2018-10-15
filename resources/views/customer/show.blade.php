@extends('theme.default')
@section('content')
<style type="text/css">
	table {
		width:100%;
	}
	th {
		text-align: center!important;
	}
	h3 {
		text-align: center!important;
	}
</style>
@forelse($table_customer as $row) 
<h2>รหัสลูกค้า {{ $row->ID }} </h2> 
 
	<div class="line"> 
		<strong>ชื่อ - นามสกุล : </strong> 
		<span>{{ $row->Name }}</span> 
	</div> 
	<div class="line"> 
		<strong>เบอร์โทร : </strong> 
		<span>{{ $row->Telephone }}</span> 
	</div> 
	<div class="line"> 
		<strong>อีเมลล์ : </strong> 
		<span>{{ $row->Email }}</span> 
	</div> 
	<div class="line"> 
			<button><a href="{{ url('/') }}/position/create?ID={{ $row->ID }}"> เพิ่มข้อมูลที่อยู่ลูกค้า </a></button>
			<button><a href="{{ url('/') }}/customer">back</a></button>
	</div> 

<h3>ข้อมูลที่อยู่ของ {{ $row->Name }} </h3>
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
		<th></th>
	</tr>
	@foreach($table_position as $row)
	<tr>
		<td style="text-align: center!important;">{{ $row->ID_Position }} </td>
		<td style="text-align: center!important;">{{ $row->ID }}</td>
		<td >{{ $row->House_number }}</td>
		<td>{{ $row->Village }} </td>
		<td>{{ $row->District }}</td>
		<td>{{ $row->City }}</td>
		<td>{{ $row->Province }}</td>
		<td>{{ $row->Zip_code }}</td>
		<td>{{ $row->Latitude }}</td>
		<td>{{ $row->Longitude }}</td>
		<td style="text-align: center!important;">
			<form class="inline" action="{{ url('/') }}/position/{{ $row->ID_Position }}?ID={{ $row->ID }}" method="POST"> 
			{{ csrf_field() }} 
			{{ method_field('DELETE') }} 
			<button type="button"><a href="{{ url('/') }}/position/{{ $row->ID_Position }}/edit">edit</a></button>
			<button type="submit">Delete</button> 
			
			</form>
		</td>
	</tr>
	@endforeach
</table>
	@empty 
	<div>This Customer id does not exist</div>
 @endforelse
 @endsection
