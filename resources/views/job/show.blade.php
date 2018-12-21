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
  	#right-panel {
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
        padding-left: 10px;
    }
  	#right-panel select, #right-panel input {
        font-size: 15px;
    }
    #right-panel select {
        width: 100%;
    }
    #right-panel i {
        font-size: 12px;
    }
</style>



<br>
<!-- Export PDF  -->
  <a href="{{url('/')}}/job/{{$ID_Job}}/pdf" class="btn pull-right hidden-print">
    <i class="fa fa-cloud-download "></i>  Export to PDF 
  </a>
  <!-- <button onclick="window.print()" class="button button5 pull-right hidden-print" >พิมพ์รายงาน</button> -->

<!-- Export Excal  -->
 	<a href="{{url('/')}}/job/{{$ID_Job}}/excel" class="btn pull-right hidden-print">
    <i class="fa fa-cloud-download "></i>  Export to Excel
  </a>
<br> 
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
      <i class="fa fa-plus "></i> เส้นทาง
    </a>
    <!-- back -->
		<a href="{{ url('/') }}/job" class="btn btn-primary hidden-print">Back
    </a>
	</div> 

<!-- หาเส้นทาง -->
    <!-- <a href="{{ url('/') }}/route/dis/{{$row->ID_Job}}" class="btn btn btn-info pull-right hidden-print">คำนวนเส้นทาง</a> -->
<br><br><br> 

	<table class="table">
		<tr>
      <th style="text-align: center!important;">ลำดับที่</th>
			<th >ชื่อ - นามสกุล</th>
			<th >ตำแหน่ง</th>
			<th >ละติจูด</th>
			<th >ลองจิจูด</th>
			<th style="text-align: center!important;">ระยะทาง</th>
			<th style="text-align: center!important;">เวลา</th>
			<th></th>
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
          <i class="fa fa-edit"></i>
        </a>
				<!--but delete -->
        <button type="submit" class="btn btn-danger hidden-print">
          <i class="fa  fa-trash-o "></i>
        </button> 
				</form>
		</tr>
    <input type="hidden" name="Latitude" value="{{$row->Latitude}}">
        <input type="hidden" name="Longitude" value="{{$row->Longitude}}">
		@endforeach
	</table>
<br><br>

<!-- Google Map -->
    <div id="map"></div>
    <div id="right-panel">
      <p>Total Distance: <span id="total"></span></p>
    </div>
    <script>
      function initMap() {
        var lat = document.getElementsByName('Latitude');
        var lng = document.getElementsByName('Longitude');
        var origin = {location: new google.maps.LatLng(14.133469,100.616013)}; //ม.วไล
        var destination = {lat: lat[lat.length - 1].value, lng: lng[lng.length - 1].value}; //จุดสุดท้าย
        var waypoints = [];
        // console.log(waypoints);
        for(var i = 0 ;i<lat.length -1;i++) {
          waypoints.push({location: new google.maps.LatLng(lat[i].value, lng[i].value)});
        }
        // console.log("NEW waypoints", waypoints);

        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 4,
          center: {lat: 12.8821371, lng: 92.4377}  // ประเทศไทย
        });

        var directionsService = new google.maps.DirectionsService;
        var directionsDisplay = new google.maps.DirectionsRenderer({
          draggable: true,
          map: map,
          panel: document.getElementById('right-panel')
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

      //Total Distance
      function computeTotalDistance(result) {
        var route_data = @json($table_route); 
        var total = 0;
        var myroute = result.routes[0];
        for (var i = 0; i < myroute.legs.length; i++) {
          //d ระยะทาง กม.
          d = myroute.legs[i].distance.value;
          total += d;
          // console.log('ระยะทาง',d/1000);
          //t ระยะเวลา นาที
          t = myroute.legs[i].duration.value;
          // console.log('ระยะเวลา',t/60);

          // console.log('รหัสรอบงาน',route_data[i].ID_Route);

          $.ajax({
           type: "POST",  //ชนิด
           url: "{{ url('/') }}/test/"+route_data[i].ID_Route, //action 
           data: {
                    //name:value
                    "District": d/1000,
                    "Time": t/60,
                    "_method": "PUT",
                    "_token":"{{ csrf_token() }}",
                 },
           success: function(msg){ //ทำงานเสร็จจะทำอะไรต่อ
               }
         });

        }
        total = total / 1000;
        document.getElementById('total').innerHTML = total + ' km';
        // console.log('',result);
        // console.log('',route_data);
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC6EpDuzLcc5fhxZfr30n4eNoHOQQGLlTY&callback=initMap">
    </script>

<!-- 
  <div id="map"></div>
    <script>
    function initMap() {
      var mapOptions = {
        center: {lat: 13.847860, lng: 100.604274},
        zoom: 11,
      }

    var maps = new google.maps.Map(document.getElementById("map"),mapOptions);

    var marker, info;

    // อ่านค่า Json แล้ว Loop ค่าเพื่อปักหมุดลงใน Map
    $.getJSON( "{{ url('/') }}/route/json/{{$row->ID_Job}}", function( jsonObj ) {
        console.log( jsonObj );
        
          //*** loop
          $.each(jsonObj, function(i, item){
          
          marker = new google.maps.Marker({
            position: new google.maps.LatLng(item.Latitude, item.Longitude),
            map: maps,
            title: item.LOC_NAME
          });
        //ตั้งค่าmap ให้อยู่ใกล้เคียงต่ำแหน่งเริ่มแรก
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
    };
  
  </script> 
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC6EpDuzLcc5fhxZfr30n4eNoHOQQGLlTY&libraries=places&callback=initMap"async defer></script> -->
@empty 
@endforelse

@endsection