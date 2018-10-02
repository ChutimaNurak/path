@extends('theme.default')
@section('content')

<h2>เพิ่มข้อมูลลูกค้า</h2>
<form action="{{ url('/') }}/customer" method="POST">
	{{ csrf_field() }}
	{{ method_field('POST') }}
	
	<div class="line">
		<strong>ชื่อ - นามสกุล : </strong>
		<input type="text" name="Name" placeholder="ระบุชื่อ - นามสกุล">
	</div>
	
	<div class="line">
		<strong>เบอร์โทร : </strong>
		<input type="text" name="Telephone" placeholder="ระบุเบอร์โทร">
	</div>
	
	<div class="line">
		<strong>อีเมลล์ : </strong>
		<input type="text" name="Email" placeholder="ระบุบอีเมลล์">
	</div>

	
	<div class="line">
		<button><a href="{{ url('/') }}/customer">back</a></button>
		<button type="submit">Create</button>
	</div>
</form>
@endsection