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
<br>
	<div class="line" style="text-align: center!important"> 
		<form class="inline" action="{{ url('/') }}/customer" method="GET"> 
			<input type="text" name="q" placeholder="ระบุชื่อ-นามสกุล" value="{{ $q }}"> 
			<button class="btn btn-default" type="button">
                        <i class="fa fa-search"></i>
                    </button>
		</form> 
		</form> 
	</div>
<br>
<br>
<table border=1>
	<tr>
		<th>รหัสลูกค้า</th>
		<th>ชื่อ-นามสกุล</th>
		<th>เบอร์โทร</th>
		<th>อีเมลล์</th>
		<th></th>
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
			<a href="{{ url('/') }}/customer/{{ $row->ID }}" class="btn btn-outline btn-primary">View</a>
			<a href="{{ url('/') }}/customer/{{ $row->ID }}/edit" class="btn btn-outline btn-success">edit</a>
			<button type="submit"  class="btn btn-outline btn-danger">Delete</button> 
			</form>
		</td>
	</tr>
	@endforeach
</table>
@endsection
