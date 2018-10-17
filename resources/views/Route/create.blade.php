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
		<!--<input type="number" name="ID_Position" placeholder="ระบุรหัสตำแหน่ง" >-->
		<select name="ID_Position">
			@foreach($table_position as $row_position)
			<option value="{{ $row_position->ID_Position }}"
							{{ $row_position->ID_Position === $row->ID_Position ? "selected" : "" }} >
						{{ $row_position->Name_Position }}
			</option>
			@endforeach
		</select>
	</div>	
	
	<div class="line">
		<button type="button"><a href="{{ url('/') }}/job/{{$ID_Job}}">back</a></button>
		<button type="submit">Create</button>
	</div>
</form>
@endsection