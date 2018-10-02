@extends('theme.default')
@section('content')

@forelse($table_route as $row) 
<h2>รหัสเส้นทาง : {{ $row->ID_Route }} </h2> 
 
	<div class="line"> 
		<strong>รหัสเส้นทาง : </strong> 
		<span>{{ $row->ID_Route }}</span> 
	</div> 
	<div class="line"> 
		<strong>รหัสรอบงาน : </strong> 
		<span>{{ $row->ID_Job }}</span> 
	</div> 
	<div class="line"> 
		<strong>รหัสตำแหน่ง : </strong> 
		<span>{{ $row->ID_Position }}</span> 
	</div> 
	<div class="line"> 
		<strong>ลำดับที่ : </strong> 
		<span>{{ $row->Sequence }}</span> 
	</div> 
	<div class="line"> 
		<strong>ระยะทาง : </strong> 
		<span>{{ $row->District }}</span> 
	</div> 
	
	<div class="line"> 
			<button><a href="{{ url('/') }}/route">back</a></button>
	</div> 
	@empty 
	<div>This Route id does not exist</div>
 @endforelse
@endsection