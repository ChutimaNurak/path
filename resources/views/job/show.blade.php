@extends('theme.default')
@section('content')

@forelse($table_job as $row) 

<style>
	#map {
			height: 500px;
			width: 1050px;
			}
	h2{
		text-align: center!important;
	}
	.button5 {
    background-color: white;
    color: black;
    border: 2px solid #555555;
	}

	.button5:hover {
	    background-color: #555555;
	    color: white;
	}
</style>
<br>
	<button onclick="window.print()" class="button button5 pull-right hidden-print" >พิมพ์รายงาน</button>
	<br>
	<div class="line"> 
		<strong>รหัสรอบงาน : </strong> 
		<span>{{ $row->ID_Job }}</span> 
	</div> 
	<div class="line"> 
		<strong>ปี/เดือน/วัน และเวลา : </strong> 
		<span>{{ $row->Date }}</span> 
	</div> 
	<div class="line"> 
		<strong>ระยะทางรวม : </strong> 
		<span>{{ $row->Distance_Sum }}</span> 
	</div> 
	<div class="line"> 
		<strong>ระยะเวลารวม : </strong> 
		<span>{{ $row->Time_Sum }}</span> 
	</div> 
		<div class="line"> 
			<a href="{{ url('/') }}/route/create?ID_Job={{$ID_Job}}" class="btn btn-warning hidden-print"> เพิ่มข้อมูลเส้นทาง </a>
			<a href="{{ url('/') }}/job" class="btn btn-primary hidden-print ">back</a>
	</div> 

<br>
<h2>รอบงาน {{ $row->Name_Job }} </h2>
<br>
	<table class="table">
		<tr>
			<!-- <th style="text-align: center!important;">รหัสเส้นทาง</th> -->
			<th>ชื่อ - นามสกุล</th>
			<th>ตำแหน่ง</th>
			<th style="text-align: center!important;">ละติจูด</th>
			<th style="text-align: center!important;">ลองจิจูด</th>
			<th style="text-align: center!important;">ลำดับที่</th>
			<th style="text-align: center!important;">ระยะทาง</th>
			<th style="text-align: center!important;">เวลา</th>
			<th></th>
		</tr>
		@foreach($table_route as $row)
		<tr>
			<!-- <td style="text-align: center!important;">{{ $row->ID_Route }} </td> -->
			<td>{{ $row->Name }}</td>
			<td>{{ $row->Province }} </td>
			<td style="text-align: center!important;">{{ $row->Latitude }} </td>
			<td style="text-align: center!important;">{{ $row->Longitude }} </td>
			<td style="text-align: center!important;">{{ $row->Sequence}} </td>
			<td id="dis" style="text-align: center!important;" >{{ $row->District}} </td>
			<td style="text-align: center!important;">{{ $row->Time}}</td>
			<td style="text-align: center!important;">
				<form class="inline" action="{{ url('/') }}/route/{{ $row->ID_Route }}?ID_Job={{$ID_Job}}" method="POST"> 
				{{ csrf_field() }} 
				{{ method_field('DELETE') }} 
				<a href="{{ url('/') }}/route/{{ $row->ID_Route }}/edit" class="btn btn-outline btn-success hidden-print">edit</a>
				<button type="submit" class="btn btn-danger hidden-print">Delete</button> 
				</form>
		</tr>
		@endforeach
	</table>

<!-- หาเส้นทาง -->
<a href="{{ url('/') }}/route/dis/{{$row->ID_Job}}" class="btn btn-primary hidden-print">คำนวนเส้นทาง</a>
<br>
<br>

<!-- googlge map -->

<div id="map"></div>
	<script>
		var map;
		//console.log(dis);
		function initMap() {
		var mapOptions = {
			center: {lat: 13.847860, lng: 100.604274},
			zoom: 18,
			}
			 
		var maps = new google.maps.Map(document.getElementById("map"),mapOptions);
		var marker = new google.maps.Marker({
			position: new google.maps.LatLng(13.847616, 100.604736),map: maps,
						title: 'ถนน ลาดปลาเค้า',icon: 'images/camping-icon.png', 
			});

		var info = new google.maps.InfoWindow({
			content : '<div style="font-size: 25px;color: red">ThaiCreate.Com Camping</div>'
			});

			google.maps.event.addListener(marker, 'click', function() {
			nfo.open(maps, marker);
			});
		}

	</script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC6EpDuzLcc5fhxZfr30n4eNoHOQQGLlTY&libraries=places&callback=initMap"async defer></script>


@empty 
@endforelse
@endsection
