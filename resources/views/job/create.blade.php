@extends('theme.default')
@section('content')

<h2>เพิ่มข้อมูลรอบงาน</h2>
<form action="{{ url('/') }}/job" method="POST">
	{{ csrf_field() }}
	{{ method_field('POST') }}

	<div class="line">
		<a href="{{ url('/') }}/job"  class="btn btn-primary">back</a>
		<button type="submit" class="btn btn-warning">Create</button>
	</div>
</form>
@endsection