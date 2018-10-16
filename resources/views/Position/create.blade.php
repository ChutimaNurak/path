@extends('theme.default')
@section('content')
<!--ค้นหาตำแหน่งจาก Latitude และ Longitude และปักหมุด (Marker) ลงบนแผนที่ -->
<style>
/* Always set the map height explicitly to define the size of the div
* element that contains the map. */
#map {
		height: 500px;
		width: 600px;
		}
/* Optional: Makes the sample page fill the window. */
html {
		height: 100%;
		margin: 0;
		padding: 0;
		}
#floating-panel {
		position: absolute;
		top: 5px;
		left: 30%;
		margin-left: -180px;
		width: 350px;
		z-index: 5;
		background-color: #fff;
		padding: 5px;
		border: 1px solid #999;
		}
#latlng {
		width: 225px;
		}
</style>

<!--
<style>
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
-->
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
	
	<div class="line" >
		<strong>ละจิจูด : </strong>
		<input id="Latitude" type="text" name="Latitude" placeholder="ระบุละจิจูด">
	</div>

	<div class="line">
		<strong>ลองจิจูด : </strong>
		<input id="Longitude" type="text" name="Longitude"  placeholder="ระบุลองจิจูด"  >
	</div>


	<div class="line">
		<button type="button"><a href="{{ url('/') }}/customer/{{$ID}}">back</a></button>
		<button type="submit">Create</button>
	</div>
</form>

<!--ค้นหาตำแหน่งจาก Latitude และ Longitude และปักหมุด (Marker) ลงบนแผนที่-->
    <input id="pac-input" class="controls" type="text" placeholder="Search Box">
    <div id="map"></div>
    <script>
      function initAutocomplete() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -33.8688, lng: 151.2195},
          zoom: 15,
          mapTypeId: 'roadmap'
        });

        // Create the search box and link it to the UI element.
        var input = document.getElementById('pac-input');
        var searchBox = new google.maps.places.SearchBox(input);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        // Bias the SearchBox results towards current map's viewport.
        map.addListener('bounds_changed', function() {
          searchBox.setBounds(map.getBounds());
        });

        var markers = [];
        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener('places_changed', function() {
          //อาร์เรย์ที่อยู่
          var places = searchBox.getPlaces();
          //console.log("places : ",places);

          //จำนวนอาร์เรยืที่อยู่ 
          if (places.length == 0) {
            return;
          }

          // Clear out the old markers. ล้างข้อมูลเก่าที่เคยค้นหา
          markers.forEach(function(marker) {
            marker.setMap(null);
          });

          markers = [];

          // For each place, get the icon, name and location.

          var bounds = new google.maps.LatLngBounds();
          places.forEach(function(place) {
            if (!place.geometry) {
              console.log("Returned place contains no geometry");
              return;
            }
            var icon = {
              url: place.icon,
              size: new google.maps.Size(71, 71),
              origin: new google.maps.Point(0, 0),
              anchor: new google.maps.Point(17, 34),
              scaledSize: new google.maps.Size(25, 25)
            };

            // Create a marker for each place.
            markers.push(new google.maps.Marker({
              map: map,
              icon: icon,
              title: place.name,
              position: place.geometry.location
            }));
            //ค่า lat&lng
console.log("place.geometry.location :",place.geometry.location.lat(),place.geometry.location.lng());
var lat=place.geometry.location.lat();
var	lng=place.geometry.location.lng();
var Latitude = document.getElementById("Latitude");
console.log("lat",Latitude);
Latitude.value = lat;
var Longitude = document.getElementById("Longitude");
console.log("lng",Longitude);
Longitude.value = lng;

            if (place.geometry.viewport) {
              // Only geocodes have viewport.
              bounds.union(place.geometry.viewport);
            } else {
              bounds.extend(place.geometry.location);
            }
          });
          map.fitBounds(bounds);
        });
      }

    </script>

    <!-- GoogleMaps Api -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC6EpDuzLcc5fhxZfr30n4eNoHOQQGLlTY&libraries=places&callback=initAutocomplete"async defer>
   </script>
@endsection
<!--- ค้นหาโดย la&long -->
<!--
<div id="floating-panel">
<input id="latlng" type="text" value="13.847860,100.604274">
<input id="submit" type="button" value="Reverse Geocode">
</div>
<div id="map"></div>
<script>
	var map;
	function initMap() {
		map = new google.maps.Map(document.getElementById('map'), {
		//กำหนดค่า Latitude and Longitude ที่จะแสดงผลตรงกลาง Map
		center: {lat: 13.847860, lng: 100.604274},
		//การเปิด/ปรับค่าค่า zoomControl แต่เปิด/ปรับค่า mapTypeContro
				zoomControl: true,
				zoomControlOptions: {
				style: google.maps.ZoomControlStyle.LARGE
			},

		mapTypeControl: true,
		mapTypeControlOptions: {
		style: google.maps.MapTypeControlStyle.DROPDOWN_MENU
		},
		//กำหนดค่าจาก 0 - 21
		zoom: 11
		});
	
	var geocoder = new google.maps.Geocoder;
	var infowindow = new google.maps.InfoWindow;
	document.getElementById('submit').addEventListener('click', function() {
	geocodeLatLng(geocoder, map, infowindow);
	});
}
function geocodeLatLng(geocoder, map, infowindow) {
	var input = document.getElementById('latlng').value;
	var latlngStr = input.split(',', 2);
	var latlng = {lat: parseFloat(latlngStr[0]), lng: parseFloat(latlngStr[1])};
	geocoder.geocode({'location': latlng}, function(results, status) {
	if (status === 'OK') {
	if (results[1]) {
		map.setZoom(11);
		var marker = new google.maps.Marker({
		position: latlng,
		map: map
	});
	infowindow.setContent(results[1].formatted_address);
	infowindow.open(map, marker);
	} else {
	window.alert('No results found');}
	} else {
	window.alert('Geocoder failed due to: ' + status);
	}
	});
	}
	</script> 
	--->

<!--Position Present-->
<!--
<div id="map"></div>
	<script>
		function initMap() {
			var mapOptions = {
				center: {lat: 13.847860, lng: 100.604274},
				zoom: 11
		}

		var maps = new google.maps.Map(document.getElementById("map"),mapOptions);
			infoWindow = new google.maps.InfoWindow;
			// Try HTML5 geolocation.
			if (navigator.geolocation) {
				navigator.geolocation.getCurrentPosition(function(position) {
				var pos = {
				lat: position.coords.latitude,
				lng: position.coords.longitude
				};
		infoWindow.setPosition(pos);
		infoWindow.setContent('Location found. lat: ' + position.coords.latitude + ', lng: ' + position.coords.longitude + ' ');
		infoWindow.open(maps);
		map.setCenter(pos);
		}, function() {
		handleLocationError(true, infoWindow, map.getCenter());
		});
		} else {
		// Browser doesn't support Geolocation
		handleLocationError(false, infoWindow, map.getCenter());
		}

		}
		function handleLocationError(browserHasGeolocation, infoWindow, pos) {
		infoWindow.setPosition(pos);
		infoWindow.setContent(browserHasGeolocation ?
		'Error: The Geolocation service failed.' :
		'Error: Your browser doesn\'t support geolocation.');
		infoWindow.open(map);
		}
	</script>
-->

