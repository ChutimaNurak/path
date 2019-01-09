@extends('theme.default')
@section('content')

<style>
  	h2{
  		  text-align: center!important;
  	}
  	table{
  		  width: 100%;
  	}  
  	html {
  		  height: 100%;
  		  margin: 0;
  		  padding: 0;
  	}
  	#map {
  		  height: 500px;
  		  width: 100%;
    }
</style> <br>

<!-- Export PDF  -->
    <a href="{{url('/')}}/job/{{$ID_Job}}/pdf" class="btn pull-right hidden-print">
      <i class="fa fa-cloud-download "></i>  Export to PDF 
    </a>

<!-- datd job -->
@forelse($table_job as $row) 
<h2>รอบงาน {{ $row->Name_Job }} </h2>

	<div class="line"> 
		<strong>รหัสรอบงาน : </strong> 
		<span>{{ $row->ID_Job }}</span>
    <input type="hidden" name="id_job" value="{{$row->ID_Job}}" id="id_job"> 
	</div> 

	<div class="line"> 
		<strong>ปี/เดือน/วัน และเวลา ที่เพิ่มรอบงาน: </strong> 
		<span>{{ $row->Date }}</span> 
	</div> 

	<div class="line"> 
		<strong>ระยะทางรวม : </strong> 
		<span>{{ $row->Distance_Sum }} กิโลเมตร</span> 
	</div> 

	<div class="line"> 
		<strong>ระยะเวลารวม : </strong> 
		<span>{{ $row->Time_Sum }} นาที</span> 
	</div> 

	
	<div class="line"> 
    <!-- but add route -->
		<a href="{{ url('/') }}/route/create?ID_Job={{$ID_Job}}" class="btn btn-warning hidden-print">
        <i class="fa fa-plus "></i> เส้นทาง</a>
    <!-- but back -->
		<a href="{{ url('/') }}/job" class="btn btn-primary hidden-print">Back</a>
	</div> <br><br><br> 

  <!-- tabel route -->
	<table class="table">
		<tr>
        <th style="text-align: center!important;">ลำดับที่</th>
  			<th >ชื่อ - นามสกุล</th>
  			<th >ตำแหน่ง</th>
  			<th >ละติจูด</th>
  			<th >ลองจิจูด</th>
  			<th style="text-align: center!important;">ระยะทาง</th>
  			<th style="text-align: center!important;">ระยะเวลา</th>
  		  	<th ></th>
		</tr>
		@foreach($table_route as $row)
    
		<tr>
        <td style="text-align: center!important;">{{ $row->Sequence}} </td>
  			<td>{{ $row->Name }}</td>
  			<td>{{ $row->House_number }} ม.{{ $row->Village }} ต.{{$row->Subdistrict}} อ.{{$row->City}} จ.{{ $row->Province }} </td>
  			<td >{{ $row->Latitude }} </td>
  			<td >{{ $row->Longitude }} </td>
  			<td id="dis" style="text-align: center!important;" >{{ $row->District}} กม.</td>
  			<td style="text-align: center!important;">{{ $row->Time}} นาที</td>
  			<td style="text-align: center!important;">
      				<form class="inline" action="{{ url('/') }}/route/{{ $row->ID_Route }}?ID_Job={{$ID_Job}}" method="POST"> 
          				{{ csrf_field() }} 
          				{{ method_field('DELETE') }} 
                  <!--but edit -->
          				<a href="{{ url('/') }}/route/{{ $row->ID_Route }}/edit" class="btn btn-outline btn-success hidden-print">
                      <i class="fa fa-edit"></i></a>
                  <!--but delete -->
                  <button type="submit" class="btn btn-danger hidden-print">
                      <i class="fa  fa-trash-o "></i>
                  </button> 
      				</form>
		</tr>
      <input type="hidden" name="Latitude" value="{{$row->Latitude}}">
        <input type="hidden" name="Longitude" value="{{$row->Longitude}}">
		@endforeach
	</table><br><br>

<!-- Google Map -->
    <div id="map"></div>
    <script>
      function initMap() {
        var lat = document.getElementsByName('Latitude');
        var lng = document.getElementsByName('Longitude');
        var origin = {location: new google.maps.LatLng(14.133469,100.616013)}; //จุดเริ่มต้น ม.วไล
        var destination = {lat: lat[lat.length - 1].value, lng: lng[lng.length - 1].value}; //จุดสุดท้าย
        var waypoints = []; //จุดถัดไป
        // console.log(waypoints);
        for(var i = 0 ;i<lat.length -1;i++) {
          waypoints.push({location: new google.maps.LatLng(lat[i].value, lng[i].value)});
        }
        // console.log("NEW waypoints", waypoints);

        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 4, //ขนาด
          center: {lat: 12.8821371, lng: 92.4377}  // ประเทศไทย
        });

        var directionsService = new google.maps.DirectionsService;
        var directionsDisplay = new google.maps.DirectionsRenderer({
                                    draggable: true,
                                    map: map,
                                  });

        directionsDisplay.addListener('directions_changed', function() {
          computeTotalDistance(directionsDisplay.getDirections());
        });

        displayRoute(new google.maps.LatLng(14.133331, 100.611465), //origin จุดเริ่มต้น
                    //destination จุดสินสุด
                     new google.maps.LatLng(lat[lat.length -1].value, lng[lng.length-1].value), 
                      directionsService, //service
                      directionsDisplay, //display
                      waypoints //จุดถัดไป
                    );
      }
      //เส้นทางที่เรียงลำดับแล้ว
      function displayRoute(origin, destination, service, display,waypoints) {
        service.route({
            origin: origin,
            destination: destination,
            waypoints: waypoints,
            travelMode: 'DRIVING',
            avoidTolls: true
            }, function(response, status) {
                    if (status === 'OK') {
                      display.setDirections(response);
                      } else {
                        alert('Could not display directions due to: ' + status);
                      }
                    });
        }

      //ระยะทาง
      function computeTotalDistance(result) {
        var route_data = @json($table_route); 
        var total = 0;
        var duration = 0;
        var myroute = result.routes[0];
          for (var i = 0; i < myroute.legs.length; i++) {
            //d ระยะทาง กม.
            d = myroute.legs[i].distance.value;
            total += d;
            t = myroute.legs[i].duration.value;
            duration += t;    

            // console.log('ระยะทาง',d/1000);
            //t ระยะเวลา นาที
            console.log('ระยะเวลา',t/60);

            console.log('รหัสรอบงาน',route_data[i].ID_Route);

            $.ajax({
             type: "POST",  //ชนิด
             url: "{{ url('/') }}/test/"+route_data[i].ID_Route, //action 
             data: {
                      //name:value
                      "District": d/1000,
                      "Time": t/60,
                      "District_Sum": total,
                      "Time_Sum": duration,
                      "_method": "PUT",
                      "_token":"{{ csrf_token() }}",
                   },
             success: function(msg){ //ทำงานเสร็จจะทำอะไรต่อ
                 }
           });
        }

        total = total / 1000;
        duration = duration/60;
        document.getElementById('total').innerHTML = total + ' km';/**/
        // console.log('',result.routes[0].legs);
      }
    </script>

    <!-- KEY API -->
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC6EpDuzLcc5fhxZfr30n4eNoHOQQGLlTY&callback=initMap">
    </script>

@empty 
@endforelse

@endsection