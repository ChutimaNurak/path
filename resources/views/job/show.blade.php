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
</style>
<br>

	<div class="line"> 
		<strong>รหัสรอบงาน </strong> 
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
			<a href="{{ url('/') }}/route/create?ID_Job={{$ID_Job}}" class="btn btn-warning"> เพิ่มข้อมูลเส้นทาง </a>
			<a href="{{ url('/') }}/job" class="btn btn-primary">back</a>
	</div> 

<br>
<h2>รอบงาน {{ $row->Name_Job }} </h2>
<br>
	<table class="table">
		<tr>
			<!-- <th style="text-align: center!important;">รหัสเส้นทาง</th> -->
			<th></th>
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
			<td></td>
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
				<a href="{{ url('/') }}/route/{{ $row->ID_Route }}/edit" class="btn btn-outline btn-success">edit</a>
				<button type="submit" class="btn btn-danger">Delete</button> 
				</form>
		</tr>
		@endforeach
	</table>

<!-- หาเส้นทาง -->
<a href="{{ url('/') }}/route/dis/{{$row->ID_Job}}" class="btn btn-primary">คำนวนเส้นทาง</a>
<br>
<br>

<!-- googlge map -->

<div id="map"></div>
	<script>
		var map;
		//console.log(dis);
		function initMap() {
		map = new google.maps.Map(document.getElementById('map'), {
			center: {lat: 13.847860, lng: 100.604274},
		    zoom: 11
	    });
	    
	   
	    // var directionsService = new google.maps.DirectionsService;
     //    var directionsDisplay = new google.maps.DirectionsRenderer({
     //      draggable: true,
     //      map: map
          
     //    });

     //     directionsDisplay.addListener('directions_changed', function() {
     //      computeTotalDistance(directionsDisplay.getDirections());
     //    });

     //    displayRoute('Perth, WA', 'Sydney, NSW', directionsService,
     //        directionsDisplay);

	}

		
      // function displayRoute(origin, destination, service, display) {
      //   service.route({
      //     origin: origin,
      //     destination: destination,
      //     // waypoints: [{location: 'Adelaide, SA'}, {location: 'Broken Hill, NSW'}],
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

      // function computeTotalDistance(result) {
      //   var total = 0;
      //   var myroute = result.routes[0];
      //   for (var i = 0; i < myroute.legs.length; i++) {
      //     total += myroute.legs[i].distance.value;
      //   }
      //   total = total / 1000;
      //   document.getElementById('total').innerHTML = total + ' km';
      // }
	
	
	</script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC6EpDuzLcc5fhxZfr30n4eNoHOQQGLlTY&libraries=places&callback=initMap"async defer></script>


@empty 
@endforelse
@endsection
