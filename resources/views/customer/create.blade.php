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
		<input  type="text" data-masked-input="999-9999999" pattern="[0-9]{3}-[0-9]{7}" maxlength="11" name="Telephone" placeholder="ระบุเบอร์โทรมือถือ">
	</div>
	
	<div class="line">
		<strong>อีเมลล์ : </strong>
		<input type="Email" name="Email" placeholder="ระบุอีเมลล์">
	</div>

	
	<div class="line">
		<button><a href="{{ url('/') }}/customer">back</a></button>
		<button type="submit">Create</button>
	</div>
</form>
@endsection