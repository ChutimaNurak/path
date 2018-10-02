@extends('theme.default')
@section('content')

<h2>เพิ่มข้อมูลรอบงาน</h2>
<form action="{{ url('/') }}/job" method="POST">
	{{ csrf_field() }}
	{{ method_field('POST') }}
	
	<div class="line">
		<strong>ระยะทางรวม : </strong>
		<input type="number" name="Distance_Sum" placeholder="ระบุระยะทางรวม">
	</div>
	
	<div class="line">
		<button><a href="{{ url('/') }}/job">back</a></button>
		<button type="submit">Create</button>
	</div>
</form>
@endsection