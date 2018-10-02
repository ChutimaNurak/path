@extends('theme.default')
@section('content')

@forelse($table_position as $row) 
<h2>รหัสตำแหน่ง : {{ $row->ID_Position }} </h2> 
	<div class="line"> 
		<strong>รหัสลูกค้า : </strong> 
		<span>{{ $row->ID }} </span> 
	</div> 
	<div class="line"> 
		<strong>บ้านเลขที่ : </strong> 
		<span>{{ $row->House_number }}</span> 
	</div> 
	<div class="line"> 
		<strong>หมู่ที่ : </strong> 
		<span>{{ $row->Village }}</span> 
	</div> 
	<div class="line"> 
		<strong>ตำบล : </strong> 
		<span>{{ $row->District }}</span> 
	</div> 
	<div class="line"> 
		<strong>อำเภอ : </strong> 
		<span>{{ $row->City }} </span> 
	</div> 
	<div class="line"> 
		<strong>จังหวัด : </strong> 
		<span>{{ $row->Province }}</span> 
	</div> 
	<div class="line"> 
		<strong>รหัสไปรษณีย์ : </strong> 
		<span>{{ $row->Zip_code }}</span> 
	</div> 
	<div class="line"> 
		<strong>ละจิจูด : </strong> 
		<span>{{ $row->Latitude }}</span> 
	</div> 
	<div class="line"> 
		<strong>ลองจิจูด : </strong> 
		<span>{{ $row->Longitude }}</span> 
	</div> 
	<div class="line"> 
			<button><a href="{{ url('/') }}/position">back</a></button>
	</div> 
	@empty 
	<div>This Position ID_Position does not exist</div>
 @endforelse
@endsection