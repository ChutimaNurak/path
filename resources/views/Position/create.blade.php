@extends('theme.default')
@section('content')

<style>
	/* Always set the map height explicitly to define the size of the div
	* element that contains the map. */
	#map {
			height: 100%;
		}
	/* Optional: Makes the sample page fill the window. */
	html, body {
			height: 100%;
			margin: 0;
			padding: 0;
		}
	#map {
			height: 500px;
			width: 400px;
		}
</style>

<h2>เพิ่มข้อมูลที่อยู่ลูกค้า</h2>
<form action="{{ url('/') }}/position" method="POST">
	{{ csrf_field() }}
	{{ method_field('POST') }}
	
	<div class="line">
		<strong>รหัสลูกค้า :</strong>
		<input type="text" name="ID" value="{{$ID}}" readonly >
	</div>
	
	<div class="line">
		<strong>บ้านเลขที่ : </strong>
		<input type="text" name="House_number" placeholder="ระบุบ้านเลขที่" >
	</div>
	
	<div class="line">
		<strong>หมูที่ : </strong>
		<input type="text" name="Village" placeholder="ระบุหมูที่" >
	</div>

	<div class="line">
		<strong>ตำบล: </strong>
		<input type="text" name="District" placeholder="ระบุตำบล" >
	</div>
	
	<div class="line">
		<strong>อำเภอ : </strong>
		<input type="text" name="City" placeholder="ระบุอำเภอ" >
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
		<button><a href="{{ url('/') }}/customer/{{$ID}}">back</a></button>
		<button type="submit">Create</button>
	</div>
</form>
<div id="map"></div>
<script>
	var map;
	function initMap() {
		map = new google.maps.Map(document.getElementById('map'), {
		//กำหนดค่า Latitude and Longitude ที่จะแสดงผลตรงกลาง Map
		center: {lat: 13.847860, lng: 100.604274},
		zoom: 11
		});
	}
</script>
@endsection
