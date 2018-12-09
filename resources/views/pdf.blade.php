<style>
    @font-face{
         font-family:  'THSarabunNew';
         font-style: normal;
         font-weight: normal;
         src: url("{{ asset('fonts/THSarabunNew.ttf') }}") format('truetype');
    }
    @font-face{
         font-family:  'THSarabunNew';
         font-style: normal;
         font-weight: normal;
         src: url("{{ asset('fonts/THSarabunNew Bold.ttf') }}") format('truetype');
    }
    @font-face{
         font-family:  'THSarabunNew';
         font-style: normal;
         font-weight: normal;
         src: url("{{ asset('fonts/THSarabunNew Italic.ttf') }}") format('truetype');
    }
    @font-face{
         font-family:  'THSarabunNew';
         font-style: normal;
         font-weight: normal;
         src: url("{{ asset('fonts/THSarabunNew BoldItalic.ttf') }}") format('truetype');
    }
    body{
        font-family: "THSarabunNew";
    }
    table{
      width: 100%;
      font-size: 19px;
    }
    div{
       font-size: 18px;
    }
</style>

  @forelse($table_job as $row) 
      <div class="line"> 
          <span>รหัสรอบงาน : </span> 
          <span>{{ $row->ID_Job }}</span> 
      </div> 

      <div class="line"> 
          <span>ปี/เดือน/วัน และเวลา ที่เพิ่มรอบงาน : </span> 
          <span>{{ $row->Date }}</span> 
      </div> 

      <div class="line"> 
          <span>ระยะทางรวม(กิโลเมตร) : </span> 
          <span>{{ $row->Distance_Sum }}</span> 
      </div> 

      <div class="line"> 
          <span>ระยะเวลารวม(นาที) : </span> 
          <span>{{ $row->Time_Sum }}</span> 
      </div> 
<p style="text-align: center!important;font-size:32px;">รอบงาน {{ $row->Name_Job }} </p>
    <table>
        <tr>
            <td style="text-align: center!important;">ลำดับที่</td>
            <td>ชื่อ - นามสกุล</td>
            <td">ตำแหน่ง</td>
            <td style="text-align: center!important;">ระยะทาง(กิโลเมตร)</td>
            <td style="text-align: center!important;">เวลา(นาที)</td>
        </tr>
      @foreach($table_route as $row)
        <tr>
            <td style="text-align: center!important;">{{ $row->Sequence}} </td>
            <td>{{ $row->Name }}</td>
            <td>{{ $row->House_number }} ม.{{ $row->Village }} ต.{{$row->Subdistrict}} อ.{{$row->City}} จ.{{ $row->Province }} </td>
            <td id="dis" style="text-align: center!important;" >{{ $row->District}} </td>
            <td style="text-align: center!important;">{{ $row->Time}}</td>
        </tr>
    @endforeach
  </table>


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
@empty 
@endforelse