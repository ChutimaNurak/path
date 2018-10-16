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
      #description {
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
      }

      #infowindow-content .title {
        font-weight: bold;
      }

      #infowindow-content {
        display: none;
      }

      #map #infowindow-content {
        display: inline;
      }

      .pac-card {
        margin: 10px 10px 0 0;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        outline: none;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        background-color: #fff;
        font-family: Roboto;
      }

      #pac-container {
        padding-bottom: 12px;
        margin-right: 12px;
      }

      .pac-controls {
        display: inline-block;
        padding: 5px 11px;
      }

      .pac-controls label {
        font-family: Roboto;
        font-size: 13px;
        font-weight: 300;
      }

      #pac-input {
        background-color: #fff;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        margin-left: 12px;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 400px;
      }

      #pac-input:focus {
        border-color: #4d90fe;
      }

      #title {
        color: #fff;
        background-color: #4d90fe;
        font-size: 25px;
        font-weight: 500;
        padding: 6px 12px;
      }
      #target {
        width: 345px;
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
		<button type="button"><a href="{{ url('/') }}/customer/{{$ID}}">back</a></button>
		<button type="submit">Create</button>
	</div>
</form>
    <input id="pac-input" class="controls" type="text" placeholder="Search Box">
    <div id="map"></div>
    <script>

      function initAutocomplete() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -33.8688, lng: 151.2195},
          zoom: 13,
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
          var places = searchBox.getPlaces();

          if (places.length == 0) {
            return;
          }

          // Clear out the old markers.
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

<!--- ค้นหาโดย la&long
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
window.alert('No results found');
}
} else {
window.alert('Geocoder failed due to: ' + status);
}
});
}
</script> 
--->

<!-- Position Present
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
@endsection
