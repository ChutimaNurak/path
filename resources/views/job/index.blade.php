@extends('theme.default')
@section('content')
<style type="text/css">
	table {
		width:100%;
		text-align: center!important;
	}
	th{
		text-align: center!important;
	}
	h1{
		text-align: center!important;
	}
</style>
<br>
<h1>รายละเอียดข้อมูลรอบงาน</h1>
<br>
	<div class="line" style="text-align: center!important" class="btn btn-warnin" > 
		<form class="inline" action="{{ url('/') }}/job" method="GET"  > 
			<input type="text" name="q" placeholder="ปี/เดือน/วัน และเวลา" value="{{ $q }}" > 
			<button class="btn btn-default" type="button">
                        <i class="fa fa-search"></i>
                    </button>
		</form> 
	</div>
<br>
<br>
<table border=1>
	<tr>
		<th>รหัสรอบงาน</th>
		<th>ปี/เดือน/วัน และเวลา</th>
		<th>ระยะทางรวม</th>
		<th></th>
	</tr>
	@foreach($table_job as $row)
	<tr>
		<td>{{ $row->ID_Job }} </td>
		<td>{{ $row->Date }}</td>
		<td>{{ $row->Distance_Sum }}</td>
		<td>
			<form class="inline" action="{{ url('/') }}/job/{{ $row->ID_Job }}" method="POST"> 
			{{ csrf_field() }} 
			{{ method_field('DELETE') }} 						
			<a href="{{ url('/') }}/job/{{ $row->ID_Job }}" class="btn btn-outline btn-primary">View</a>
			<a href="{{ url('/') }}/job/{{ $row->ID_Job }}/edit" class="btn btn-outline btn-success">edit</a>
			<button type="submit" class="btn btn-outline btn-danger" >Delete</button> 
		</form>
	</tr>
	</tr>
	@endforeach
</table>
@endsection