@forelse($table as $row)
<script src="{!! asset('theme/vendor/jquery/jquery.min.js') !!}"></script>
<script type="text/javascript">

		function onClick(){
				$.ajax({
				   type: "POST",	//ชนิด
				   url: "{{ url('/') }}/test/{{ $row->ID_Job }}", //action 
				   data: {
				   			//name:value
						   	"District_Sum": document.getElementById('District_Sum').value,
						   	"Time_Sum": document.getElementById('Time_Sum').value,
						   	"_method": "PUT",
						   	"_token":"{{ csrf_token() }}",
						   },
				   success: function(msg){ //ทำงานเสร็จจะทำอะไรต่อ
				   }
				 });
		}

</script>
	<form action="{{ url('/') }}/test/{{ $row->ID_Job }}" method="POST">
		{{ csrf_field() }}
		{{ method_field('PUT') }}
		

		<div class="line" >
			<strong>ระยะทาง : </strong>
			<input type="number" name="District_Sum" value="{{ $row->District_Sum }}" id="District_Sum">
		</div>

		<div class="line">
			<strong>เวลา : </strong>
			<input type="number" name="Time_Sum" value="{{ $row->Time_Sum }}" id="Time_Sum">
		</div>

		<div class="line">
			<button type="button" onclick="onClick();">Update</button>
		</div>
	</form>
@empty	
	<div>This updis id does not exist</div>
@endforelse
