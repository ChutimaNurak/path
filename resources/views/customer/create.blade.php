@extends('theme.default')
@section('content')

<style type="text/css">
	h2{
		text-align: center!important;
	}
</style>

<br>
<h2>เพิ่มข้อมูลลูกค้า</h2>
<form action="{{ url('/') }}/customer" method="POST">
	{{ csrf_field() }}
	{{ method_field('POST') }}
	<br>
	<div class="line">
		<strong>ชื่อ - นามสกุล : </strong>
		<input class="form-control" type="text" name="Name" placeholder="ระบุชื่อ - นามสกุล">
	</div>
	
	<br>
	<div class="line">
		<strong>เบอร์โทร : </strong>
		<input  class="form-control" type="text" data-masked-input="999-9999999" pattern="[0-9]{3}-[0-9]{7}" maxlength="11" name="Telephone" placeholder="0xx-xxxxxxx">
	</div>
	
	<br>
	<div class="line">
		<strong>อีเมลล์ : </strong>
		<input class="form-control" type="Email" name="Email" placeholder="xxx@gmail.com">
	</div>

	<br>
	<div class="line">
		<a href="{{ url('/') }}/customer" class="btn btn-primary pull-right ">back</a>
		<button type="submit" class="btn btn-warning btn-success">Create</button>
	</div>
</form>
@endsection