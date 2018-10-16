@extends('theme.default')
@section('content')

<h2>เพิ่มข้อมูลลูกค้า</h2>
<form action="{{ url('/') }}/customer" method="POST">
	{{ csrf_field() }}
	{{ method_field('POST') }}
	
	<div class="line">
		<strong>ชื่อ - นามสกุล : </strong>
		<input type="text" name="Name" placeholder="ระบุชื่อ - นามสกุล">
	</div>
	
	<div class="line">
		<strong>เบอร์โทร : </strong>
		<input type="text" name="Telephone" placeholder="xx-xxxxxxxxx">
		<script type="text/javascript">
		function CheckMobileNumber(data) {
		   var msg = 'โปรดกรอกหมายเลขโทรศัพท์ 10 หลัก ด้วยรูปแบบดังนี้ 08XXXXXXXX ไม่ต้องใส่เครื่องหมายขีด (-) วงเล็บหรือเว้นวรรค';
		   s = new String(data);

		   if ( s.length != 10)
		   {
		      alert(msg);
		      return false;
		   }

		   for (i = 0; i < s.length; i++ ) {               
		      if ( s.charCodeAt(i) < 48 || s.charCodeAt(i) > 57 ) {
		         alert(msg);
		         return false;
		      } else {
		         
		         if ( ((i == 0) && (s.charCodeAt(i) != 48)) || ((i == 1) && (s.charCodeAt(i) != 56)) )
		         {
		            alert(msg);
		            return false;
		         }
		      }
		   }            
		   return true;
		}
		</script>
	</div>
	
	<div class="line">
		<strong>อีเมลล์ : </strong>
		<input type="text" name="Email" placeholder="xxx@gmail.com">
	</div>

	
	<div class="line">
		<button><a href="{{ url('/') }}/customer">back</a></button>
		<button type="submit">Create</button>
	</div>
</form>
@endsection