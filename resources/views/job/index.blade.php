@extends('theme.default')
@section('content')

<style type="text/css">
	table {
		width:100%;
	}
	h1{
		text-align: center!important;
	}
</style>

<br>
<!-- เพิ่มข้อมูลรอบงาน -->
<a href="{{ url('/') }}/job/create" class="btn btn-warning pull-right">
	<i class="fa fa-plus "></i> รอบงาน
</a>
<br>

<!-- หัวเรื่อง -->
<h1>ข้อมูลรอบงาน</h1>
<br>

<!-- ค้นหา -->
	<div class="line" style="text-align: center!important" class="btn btn-warnin" > 
		<form class="inline" action="{{ url('/') }}/job" method="GET"  > 
			<input type="text" name="q" placeholder="ระบุชื่อรอบงาน" value="{{ $q }}" > 
			<button class="btn btn-default" type="submit">
                        <i class="fa fa-search"></i>
                    </button>
		</form> 
	</div>
<br><br>

<!-- ตาราง -->
<table class="table">
	<tr>
		<!-- <th style="text-align: center!important;">รหัสรอบงาน</th> -->
		<th></th>
		<th>ชื่อรอบงาน</th>
		<th style="text-align: center!important;">ปี/เดือน/วัน และเวลา ที่เพิ่มรอบงาน</th>
		<th style="text-align: center!important;">ระยะทางรวม</th>
		<th style="text-align: center!important;">เวลารวม </th>
		<th></th>
	</tr>
	@foreach($table_job as $row)
	<tr>
		<!-- <td style="text-align: center!important;">{{ $row->ID_Job }} </td> -->
		<td></td>
		<td>{{ $row->Name_Job }} </td>
		<td style="text-align: center!important;">{{ $row->Date }}</td>
		<td style="text-align: center!important;">{{ $row->Distance_Sum }} กม.</td>
		<td style="text-align: center!important;">{{ $row->Time_Sum }} นาที</td>
		<td style="text-align: center!important;">
			<form class="inline" action="{{ url('/') }}/job/{{ $row->ID_Job }}" method="POST"> 
			{{ csrf_field() }} 
			{{ method_field('DELETE') }} 
			<!-- but view -->						
			<a href="{{ url('/') }}/job/{{ $row->ID_Job }}" class="btn btn-outline btn-primary">
				<i class="fa fa-road "></i> ข้อมมูลรอบงาน
			</a>
			<!-- but edit -->
			<a href="{{ url('/') }}/job/{{ $row->ID_Job }}/edit" class="btn btn-outline btn-success">
				 <i class="fa fa-edit"></i>
			</a>
			<!-- but Detele -->
			<button type="submit" class="btn btn-danger">
				<i class="fa  fa-trash-o "></i>
			</button> 
		</form>
	</tr>
	</tr>
	@endforeach
</table>
@endsection