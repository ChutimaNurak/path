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
			<button><a href="{{ url('/') }}/position/create"> เพิ่มข้อมูลที่อยู่ลูกค้า </a></button>
			<button><a href="{{ url('/') }}/customer">back</a></button>
	</div> 
	@empty 
	<div>This Customer id does not exist</div>
 @endforelse
 @endsection
