@extends('theme.default')
@section('content')

@forelse($table_route as $row) 
	<h2>แก้ไขข้อมูลเส้นทาง: {{ $row->ID_Route }}</h2> 
	<form action="{{ url('/') }}/route/{{ $row->ID_Route }}" method="POST"> 
		{{ csrf_field() }} 
		{{ method_field('PUT') }} 
		<div class="line"> 
			<strong>รหัสรอบงาน : </strong> 
			<input type="text" name="ID_Job"  value="{{ $row->ID_Job }}"> 
		</div> 
		<div class="line"> 
			<strong>รหัสตำแหน่ง : </strong> 
			<input type="text" name="ID_Position" value="{{$row->ID_Position }}"> 
		</div> 
		<div class="line"> 
			<strong>ลำดับที่ : </strong> 
			<input type="text" name="Sequence" value="{{ $row->Sequence }}"> 
		</div> 
		<div class="line"> 
			<strong>ระยะทาง(km) : </strong> 
			<input type="text" name="District" value="{{ $row->District }}"> 
		</div>
		<div class="line">
			<button  type="button"><a href="{{ url('/') }}/job/{{ $row->ID_Job }}">back</a></button>
			<button type="submit">Update</button> 
		</div>
	</form>
@empty
<div>This Route id does not exist</div> 
@endforelse
@endsection