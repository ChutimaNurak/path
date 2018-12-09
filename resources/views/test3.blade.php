<!-- <!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Draggable Directions</title>
    <style>
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
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #map {
        height: 100%;
        float: left;
        width: 63%;
        height: 100%;
      }
      #right-panel {
        float: right;
        width: 34%;
        height: 100%;
      }
      .panel {
        height: 100%;
        overflow: auto;
      }
    </style>
  </head>
  <body>
    <div id="map"></div>
    <div id="right-panel">
      <p>Total Distance: <span id="total"></span></p>
    </div>
    <script>
      function initMap() {
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

        // displayRoute('Perth, WA', 'Sydney, NSW', directionsService,directionsDisplay);
        displayRoute(new google.maps.LatLng(14.1333725, 100.6092868),
                     new google.maps.LatLng(13.9894503, 100.6146459),
                      directionsService,
                      directionsDisplay);
      }
      //เส้นทางที่เรียงลำดับแล้ว
      function displayRoute(origin, destination, service, display) {
        service.route({
          origin: origin,
          destination: destination,
          // waypoints: [{location: 'Adelaide, SA'}, {location: 'Broken Hill, NSW'}],
          waypoints: [{location: new google.maps.LatLng(14.0824618, 100.6172948)}, 
                      {location: new google.maps.LatLng(14.0432203, 100.6156019)}],
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
        var total = 0;
        var myroute = result.routes[0];
        for (var i = 0; i < myroute.legs.length; i++) {
          total += myroute.legs[i].distance.value;
        }
        total = total / 1000;
        document.getElementById('total').innerHTML = total + ' km';
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC6EpDuzLcc5fhxZfr30n4eNoHOQQGLlTY&callback=initMap">
    </script>
  </body>
</html>


 -->

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
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC6EpDuzLcc5fhxZfr30n4eNoHOQQGLlTY&libraries=places&callback=initMap"async defer></script>


  <!-- excal -->
  @extends('theme.default')
@section('content')
<!-- 
<php
$connect = mysqli_connect("localhost", "root", "", "path");
$output = '';
if(isset($_POST["export"]))
{
 $query = "SELECT * FROM customer 
      INNER JOIN position ON customer.ID = position.ID 
      INNER JOIN route ON route.ID_Position = position.ID_Position 
            WHERE ID_Job =  {$id_job}";
 $query="SELECT * FROM  job where ID_Job = {$id_job}";
 $result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
                <tr>
          <th>ชื่อ - นามสกุล</th>
          <th style="text-align: center!important;">ตำแหน่ง</th>
          <th >ละติจูด</th>
          <th >ลองจิจูด</th>
          <th style="text-align: center!important;">ลำดับที่</th>
          <th style="text-align: center!important;">ระยะทาง(กิโลเมตร)</th>
          <th style="text-align: center!important;">เวลา(นาที)</th>
        </tr>
          ';
        while($row = mysqli_fetch_array($result)) 
        {
          $output .= '
          <tr>
          <td>{{ $row->Name }}</td>
          <td>{{ $row->House_number }} ม.{{ $row->Village }} ต.{{$row->Subdistrict}} อ.{{$row->City}} จ.{{ $row->Province }} </td>
          <td style="text-align: center!important;">{{ $row->Latitude }} </td>
          <td style="text-align: center!important;">{{ $row->Longitude }} </td>
          <td style="text-align: center!important;">{{ $row->Sequence}} </td>
          <td id="dis" style="text-align: center!important;" >{{ $row->District}} </td>
          <td style="text-align: center!important;">{{ $row->Time}}</td>
        </tr>
         ';
      }
        $output .= '</table>';
        header('Content-Type: application/xls');
        header('Content-Disposition: attachment; filename=download.xls');
        echo $output;
    }
  }
?>

 @forelse($table_job as $row) 
@empty  
@endforelse
@endsection -->