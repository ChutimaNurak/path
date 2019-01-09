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
      width: 105%;
      font-size: 19px;
    }
    div{
       font-size: 21px;
        color: #FF6600;
        text-align: right!important;
    }
</style>
@forelse($table_job as $row) 
      <div class="line" > 
          <span>ระยะทางรวม : {{ $row->Distance_Sum }} กม.</span> 
      </div> 

      <div class="line" > 
          <span>ระยะเวลารวม : {{ $row->Time_Sum }} นาที</span> 
      </div> 
@empty 
@endforelse

@forelse($table_job as $row)   
  <p style="text-align: center!important;font-size:32px;">{{ $row->Name_Job }} </p>
    <table>
        <tr>
            <td style="text-align: center!important;">ลำดับที่</td>
            <td >ชื่อ - นามสกุล</td>
            <td >ตำแหน่ง</td>
            <td style="text-align: center!important;">ระยะทาง(กม.)</td>
            <td style="text-align: center!important;">เวลา(นาที)</td>
        </tr>
      @foreach($table_route as $row)
        <tr>
            <td style="text-align: center!important;">{{ $row->Sequence}} </td>
            <td style="color: ">{{ $row->Name }}</td>
            <td>{{ $row->House_number }} ม.{{ $row->Village }} ต.{{$row->Subdistrict}} อ.{{$row->City}} จ.{{ $row->Province }} </td>
            <td id="dis" style="text-align: center!important;" >{{ $row->District}} </td>
            <td style="text-align: center!important;">{{ $row->Time}}</td>
        </tr>
      @endforeach
    </table>
@empty 
@endforelse
<br>
