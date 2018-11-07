@extends('theme.default')
@section('content')
@forelse($table_customer as $row) 

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
		<strong>รหัสลูกค้า</strong> 
		<span>{{ $row->ID }}</span>
	</div>
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
			<a href="{{ url('/') }}/position/create?ID={{ $row->ID }}" class="btn btn-warning"> เพิ่มข้อมูลที่อยู่ลูกค้า </a>
			<a href="{{ url('/') }}/customer" class="btn btn-primary">back</a>
	</div> 

<h2>ข้อมูลที่อยู่ของ {{ $row->Name }} </h2>
<br>

<!-- ตาราง -->
<table class="table">
	<tr>
		<th>รหัสตำแหน่ง</th>
		<th>บ้านเลขที่</th>
		<th>หมู่ที่</th>
		<th>ตำบล</th>
		<th>อำเภอ</th>
		<th>จังหวัด</th>
		<th>รหัสไปรษณีย์</th>
		<th>ละจิจูด</th>
		<th>ลองจิจูด</th>
		<th></th>
	</tr>
	@foreach($table_position as $row)
	<tr>
		<td style="text-align: center!important;">{{ $row->ID_Position }} </td>
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
			<a href="{{ url('/') }}/position/{{ $row->ID_Position }}/edit"class="btn btn-outline btn-success">edit</a>
			<button type="submit" class="btn btn-danger">Delete</button> 
			
			</form>
		</td>
	</tr>
	@endforeach
</table>

	@empty 
	<div>This Customer id does not exist</div>
 @endforelse
 @endsection


