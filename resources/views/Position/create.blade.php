@extends('theme.default')
@section('content')

<h2>เพิ่มข้อมูลที่อยู่ลูกค้า</h2>
<form action="{{ url('/') }}/position" method="POST">
	{{ csrf_field() }}
	{{ method_field('POST') }}
	
	<div class="line">
		<strong>รหัสลูกค้า :</strong>
		<input type="number" name="ID" value="{{$ID}}" readonly>
	</div>
	
	<div class="line">
		<strong>บ้านเลขที่ : </strong>
		<input type="text" name="House_number" placeholder="ระบุบ้านเลขที่" >
	</div>
	
	<div class="line">
		<strong>หมูที่ : </strong>
		<input type="text" name="Village" placeholder="ระบุหมูที่">
	</div>

	<div class="line">
		<strong>ตำบล: </strong>
		<input type="text" name="District" placeholder="ระบุตำบล" >
	</div>
	
	<div class="line">
		<strong>อำเภอ : </strong>
		<input type="text" name="City" placeholder="ระบุอำเภอ">
	</div>
	
	<div class="line">
		<strong>จังหวัง : </strong>
		<input type="text" name="Province" placeholder="ระบุจังหวัง" >
	</div>
	
	<div class="line">
		<strong>รหัสไปรณีย์ : </strong>
		<input type="text" name="Zip_code" placeholder="ระบุรหัสไปรณีย์" >
	</div>
	
	<div class="line">
		<strong>ละจิจูด : </strong>
		<input type="text" name="Latitude" placeholder="ระบุละจิจูด">
	</div>

	<div class="line">
		<strong>ลองจิจูด : </strong>
		<input type="text" name="Longitude"  placeholder="ระบุลองจิจูด" >
	</div>
	
	<div class="line">
		<button><a href="{{ url('/') }}/position">back</a></button>
		<button type="submit">Create</button>
	</div>
</form>
@endsection