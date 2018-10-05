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
<br>
<h1 style="text-align: center!important">รายละเอียดข้อมูลลูกค้า</h1>
	<div class="line"> 
		<form class="inline" action="{{ url('/') }}/customer" method="GET" > 
			<input type="text" name="q" placeholder="ระบุชื่อ-นามสกุล" value="{{ $q }}"> 
			<button type="submit">ค้นหา</button> 
		</form> 
	</div>
<br>
<table border=1>
	<tr>
		<th>รหัสลูกค้า</th>
		<th>ชื่อ-นามสกุล</th>
		<th>เบอร์โทร</th>
		<th>อีเมลล์</th>
		<th>action</th>
	</tr>
	@foreach($table_customer as $row)
	<tr>
		<td style="text-align: center!important">{{ $row->ID }} </td>
		<td>{{ $row->Name }}</td>
		<td>{{ $row->Telephone }}</td>
		<td>{{ $row->Email}} </td>
		<td style="text-align: center!important">
			<form class="inline" action="{{ url('/') }}/customer/{{ $row->ID }}" method="POST"> 
			{{ csrf_field() }} 
			{{ method_field('DELETE') }} 
			<button type="button"><a href="{{ url('/') }}/customer/{{ $row->ID }}">Viwe</a></button>
			<button type="button"><a href="{{ url('/') }}/customer/{{ $row->ID }}/edit">edit</a></button>
			<button type="submit">Delete</button> 
			</form>
		</td>
	</tr>
	@endforeach
</table>
@endsection
