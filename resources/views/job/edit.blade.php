@extends('theme.default')
@section('content')

@forelse($table_job as $row) 
	<h2>แก้ไขข้อมูลรอบงาน : {{ $row->ID_Job }}</h2> 
	<form action="{{ url('/') }}/job/{{ $row->ID_Job }}" method="POST"> 
		{{ csrf_field() }} 
		{{ method_field('PUT') }} 
		<div class="line"> 
			<strong>ปี/เดือน/วัน และเวลา : </strong> 
			<input type="text" name="Date"  value="{{ $row->Date }}"> 
		</div> 
		<div class="line"> 
			<strong>ระยะทางรวม : </strong> 
			<input type="number" name="Distance_Sum" value="{{$row->Distance_Sum }}"> 
		</div> 

		
		<div class="line">
			<button><a href="{{ url('/') }}/job">back</a></button>
			<button type="submit">Update</button> 
		</div>
	</form>
@empty
<div>This Job id does not exist</div> 
@endforelse
@endsection