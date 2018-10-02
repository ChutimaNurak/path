@extends('theme.default')
@section('content')

@forelse($table_job as $row) 
<h1>รหัสรอบงาน {{ $row->ID_Job }} </h1> 
 
	<div class="line"> 
		<strong>ปี/เดือน/วัน และเวลา : </strong> 
		<span>{{ $row->Date }}</span> 
	</div> 
	<div class="line"> 
		<strong>ระยะทางรวม : </strong> 
		<span>{{ $row->Distance_Sum }}</span> 
	</div> 
	
	<div class="line"> 
			<button><a href="{{ url('/') }}/job">back</a></button>
	</div> 
	@empty 
	<div>This Job id does not exist</div>
 @endforelse
@endsection