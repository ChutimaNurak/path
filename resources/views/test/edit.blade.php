@forelse($table as $row)
<script src="{!! asset('theme/vendor/jquery/jquery.min.js') !!}"></script>
<script type="text/javascript">

		function onClick(){
				$.ajax({
				   type: "POST",	//ชนิด
				   url: "{{ url('/') }}/test/{{ $row->ID_Route }}", //action 
				   data: {
				   			//name:value
						   	"District": document.getElementById('District').value,
						   	"Time": document.getElementById('Time').value,
						   	"_method": "PUT",
						   	"_token":"{{ csrf_token() }}",
						   },
				   success: function(msg){ //ทำงานเสร็จจะทำอะไรต่อ
				   }
				 });
		}

</script>
	<form action="{{ url('/') }}/test/{{ $row->ID_Route }}" method="POST">
		{{ csrf_field() }}
		{{ method_field('PUT') }}
		

		<div class="line" >
			<strong>ระยะทาง : </strong>
			<input type="number" name="District" value="{{ $row->District }}" id="District">
		</div>

		<div class="line">
			<strong>เวลา : </strong>
			<input type="number" name="Time" value="{{ $row->Time }}" id="Time">
		</div>

		<div class="line">
			<button type="button" onclick="onClick();">Update</button>
		</div>
	</form>
@empty	
	<div>This updis id does not exist</div>
@endforelse
