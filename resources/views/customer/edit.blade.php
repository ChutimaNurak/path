@extends('theme.default')
@section('content')

@forelse($table_customer as $row) 
	<h2>รหัสลูกค้า {{ $row->ID }}</h2> 
	<form action="{{ url('/') }}/customer/{{ $row->ID }}" method="POST"> 
		{{ csrf_field() }} 
		{{ method_field('PUT') }} 
		<div class="line"> 
			<strong>ชื่อ - นามสกุล : </strong> 
			<input type="text" name="Name"  value="{{ $row->Name }}"> 
		</div> 
		<div class="line"> 
			<strong>เบอร์โทร : </strong> 
			<input type="text" data-masked-input="999-9999999" pattern="[0-9]{3}-[0-9]{7}" maxlength="11" name="Telephone" value="{{$row->Telephone }}"> 
		</div> 
		<div class="line"> 
			<strong>อีเมลล์ : </strong> 
			<input type="Email" name="Email" value="{{ $row->Email }}"> 
		</div> 
		
		<div class="line">
			<button><a href="{{ url('/') }}/customer">back</a></button>
			<button type="submit">Update</button> 
		</div>
	</form>
@empty
<div>This Customer id does not exist</div> 
@endforelse
@endsection