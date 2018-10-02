@extends('theme.default')
@section('content')

@forelse($table_customer as $row) 
<h2>รหัสลูกค้า {{ $row->ID }} </h2> 
 
	<div class="line"> 
		<strong>ชื่อ - นามสกุล่ : </strong> 
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
			<form class="inline" action="{{ url('/') }}/position/{{ $row->ID_Position }}?ID={{ $row->ID }}" method="POST"> 
			{{ csrf_field() }} 
			{{ method_field('DELETE') }} 
			<button type="submit">Delete</button> 
			<button type="button"><a href="{{ url('/') }}/position/{{ $row->ID_Position }}/edit">edit</a></button>
			<button type="button"><a href="{{ url('/') }}/position/{{ $row->ID_Position }}">Viwe</a></button>
			</form>
		</td>
	</tr>
	@endforeach
</table>
	@empty 
	<div>This Customer id does not exist</div>
 @endforelse
 @endsection
