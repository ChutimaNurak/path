@extends('theme.default')
@section('content')

<h2>เพิ่มข้อมูลเส้นทาง</h2>
<form action="{{ url('/') }}/route" method="POST">
	{{ csrf_field() }}
	{{ method_field('POST') }}
	
	<div class="line">
		<strong>รหัสรอบงาน :</strong>
		<input type="number" name="ID_Job" value="{{$ID_Job}}" readonly >
	</div>
	
	<div class="line">
		<strong>รหัสตำแหน่ง : </strong>
		<input type="number" name="ID_Position" placeholder="ระบุรหัสตำแหน่ง" >
	</div>
	<div class="line">
		<strong>รหัสเส้น่ทาง : </strong>
		<input type="number" name="ID_Route" placeholder="ระบุรหัสเส้นทาง" >
	</div>
	<div class="line">
		<strong>ลำดับที่ : </strong>
		<input type="number" name="Sequence" placeholder="ระบุระยะเส้นทาง">
	</div>

	<div class="line">
		<strong>ระยะเส้นทาง : </strong>
		<input type="number" name="District" placeholder="ระบุระยะทาง" >
	</div>
	
	
	<div class="line">
		<button><a href="{{ url('/') }}/job/{{$ID_Job}}">back</a></button>
		<button type="submit">Create</button>
	</div>
</form>
@endsection