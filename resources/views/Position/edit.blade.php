@extends('theme.default')
@section('content')

@forelse($table_position as $row) 
	<h2>แก้ไขข้อมูลตำแหน่ง : {{ $row->ID_Position }}</h2> 
	<form action="{{ url('/') }}/position/{{ $row->ID_Position }}" method="POST"> 
		{{ csrf_field() }} 
		{{ method_field('PUT') }}
		<div class="line"> 
			<strong>รหัสลูกค้า : </strong> 
			<input type="number" name="ID" value="{{ $row->ID }}" readonly> 
		</div> 
		<div class="line"> 
			<strong>บ้านเลขที่ : </strong> 
			<input type="text" name="House_number"  value="{{ $row->House_number }}"> 
		</div> 
		<div class="line"> 
			<strong>หมู่ที่ : </strong> 
			<input type="text" name="Village" value="{{ $row->Village }}"> 
		</div> 
		<div class="line"> 
			<strong>ตำบล : </strong> 
			<input type="text" name="District" value="{{ $row->District }}"> 
		</div> 
		<div class="line"> 
			<strong>อำเภอ : </strong> 
			<input type="text" name="City"  value="{{ $row->City }}"> 
		</div> 
		<div class="line"> 
			<strong>จังหวัด : </strong> 
			<input type="text" name="Province" value="{{ $row->Province }}"> 
		</div> 
		<div class="line"> 
			<strong>รหัสไปรษณีย์ : </strong> 
			<input type="text" name="Zip_code" value="{{ $row->Zip_code }}"> 
		</div>
		<div class="line"> 
			<strong>ละติจูด : </strong> 
			<input type="text" name="Latitude" value="{{ $row->Latitude }}" > 
		</div> 
		<div class="line"> 
			<strong>ลองจิจูด : </strong> 
			<input type="text" name="Longitude" value="{{ $row->Longitude }}"> 
		</div>
		<br>
		<div class="line"> 
			<a href="{{ url('/') }}/customer/{{ $row->ID }}" class="btn btn-primary">back</a>
			<button type="submit" class="btn btn-outline btn-warning">Update</button> 
		</div>
	</form>
@empty
<div>This Position id does not exist</div> 
@endforelse
@endsection