@extends('theme.default')
@section('content')

<style type="text/css">
	table {
		width:100%;
	}
	h1{
		text-align: center!important
	}
</style>

<br>
<!-- เพิ่มข้อมูลลูกค้า -->
<a href="{{ url('/') }}/job/create" class="btn btn-warning pull-right">เพิ่มข้อมูลรอบงาน</a> 
<br>

<h1>รายละเอียดข้อมูลรอบงาน</h1>
<br>

<!-- ค้นหา -->
	<div class="line" style="text-align: center!important"> 
		<form class="inline" action="{{ url('/') }}/job" method="GET"> 
			<input type="text" name="q" placeholder="ระบุชื่อรอบงาน" value="{{ $q }}"> 
                    <button class="btn btn-default" type="submit">
                        <i class="fa fa-search"></i>
		</form> 
	</div>
		<br>
		<br>
<!-- ตาราง -->
		<table class="table">
			<tr>
				<th style="text-align: center!important;">รหัสรอบงาน</th>
				<th>ชื่อรอบงาน</th>
				<th>วัน/เดือน/ปี และเวลา</th>
				<th>ระยะทางรวม (กิโล)	</th>
				<th>ระยะเวลารวม (ชั่วโมง)</th>
				<th></th>
			</tr>
			@foreach($table_job as $row)
			<tr>
				<td style="text-align: center!important">{{ $row->ID_Job }} </td>
				<td>{{ $row->Name_Job }}</td>
				<td>{{ $row->Date }}</td>
				<td>{{ $row->Distance_Sum}} </td>
				<td>{{ $row->Time_Sum}} </td>
				<td style="text-align: center!important">
					<form class="inline" action="{{ url('/') }}/job/{{ $row->ID_Job }}" method="POST"> 
						{{ csrf_field() }} 
						{{ method_field('DELETE') }} 
						<a href="{{ url('/') }}/job/{{ $row->ID_Job }}" class="btn btn-outline btn-primary">View</a>
						<a href="{{ url('/') }}/job/{{ $row->ID_Job }}/edit" class="btn btn-outline btn-success">edit</a>
						<button type="submit" class="btn btn-danger">Delete</button> 
					</form>
				</td>
			</tr>
			@endforeach
		</table>
@endsection
