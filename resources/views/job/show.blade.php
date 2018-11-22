@extends('theme.default')
@section('content')

@forelse($table_job as $row) 

<!-- <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script src="http://code.jquery.com/jquery-latest.min.js"></script> -->

<style>
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
	#map {
		height: 100%;
		}
	html {
		height: 100%;
		margin: 0;
		padding: 0;
		}
	#map {
		height: 500px;
		width: 100%;
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
			<th style="text-align: center!important;">ตำแหน่ง</th>
			<th >ละติจูด</th>
			<th >ลองจิจูด</th>
			<th style="text-align: center!important;">ลำดับที่</th>
			<th style="text-align: center!important;">ระยะทาง</th>
			<th style="text-align: center!important;">เวลา</th>
			<th></th>
		</tr>
		@foreach($table_route as $row)
		<tr>
			<!-- <td style="text-align: center!important;">{{ $row->ID_Route }} </td> -->
			<td>{{ $row->Name }}</td>
			<td>{{ $row->House_number }} หมูที่{{ $row->Village }} ตำบล{{$row->Subdistrict}} อำเภอ{{$row->City}} จังหวัด{{ $row->Province }} </td>
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

<!-- ปักหมุด Marker บน Google Map -->
<div id="map"></div>
	<script>
	function initMap() {
		var mapOptions = {
			center: {lat: 13.847860, lng: 100.604274},
			zoom: 11,
		}

		var maps = new google.maps.Map(document.getElementById("map"),mapOptions);
		var directionsService = new google.maps.DirectionsService;
		var directionsDisplay = new google.maps.DirectionsRenderer({
    		draggable: true,
    		map: mapOptions
    		//panel: document.getElementById('right-panel')
  			});
		var marker, info;
		var start,end;
		var wayspoint = [];
		// อ่านค่า Json แล้ว Loop ค่าเพื่อปักหมุดลงใน Map
		$.getJSON( "{{ url('/') }}/route/json/{{$row->ID_Job}}", function( jsonObj ) {
				console.log( jsonObj );
				for(var i=1;i<jsonObj.length-1;i++){
					start = {lat: jsonObj[0].Latitude, lng: jsonObj[0].Longitude};
					end = {lat: jsonObj[jsonObj.length - 1].Latitude, lng: jsonObj[jsonObj.length - 1].Longitude};
					wayspoint.push({lat: jsonObj[i].Latitude, lng: jsonObj[i].Longitude});
				}
				console.log(start,end,wayspoint);
			
					//*** loop
					$.each(jsonObj, function(i, item){
					
					marker = new google.maps.Marker({
					position: new google.maps.LatLng(item.Latitude, item.Longitude),
					map: maps,
					title: item.LOC_NAME
					});

				// maps.setCenter(new google.maps.LatLng(item.Latitude,item.Longitude));
				maps.setCenter({lat:item.Latitude,lng:item.Longitude});

				info = new google.maps.InfoWindow();
				
				google.maps.event.addListener(marker, 'click', (function(marker, i) {
					return function() {
						info.setContent(item.LOC_NAME);
						info.open(maps, marker);
						}
					})(marker, i));
				}); // loop
			});
		displayRoute(start, end, wayspoint, directionsService,
         directionsDisplay);
		};

		function displayRoute(origin, destination, wayspoint, service, display) {
		 	console.log(service);
		}

// 	function displayRoute(origin, destination, ,wayspoint,service, display) {
//   service.route({
//     origin: origin,
//     destination: destination,
//     waypoints: waypoints,
//     travelMode: 'DRIVING',
//     avoidTolls: true
//   }, function(response, status) {
//     if (status === 'OK') {
//       display.setDirections(response);
//     } else {
//       alert('Could not display directions due to: ' + status);
//     }
//   });
// }
	
	</script>

	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC6EpDuzLcc5fhxZfr30n4eNoHOQQGLlTY&libraries=places&callback=initMap"async defer></script>
@empty 
@endforelse
@endsection
