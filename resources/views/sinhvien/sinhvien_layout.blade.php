@include('sinhvien/includes/adminleft')
@include('sinhvien/includes/topcontent')

@yield('content')

<div style="height: 200px;">
</div>
@include('sinhvien/includes/footer')

<script>  


	function load(removeid,showid){	
// $("#load2").click(function(){

	
	var _token = $('input[name="_token"]').val();

	
	load_data( _token);

	function load_data( _token)
	{
		
		$(removeid).hide();
		$(showid).show();

	}

}
</script>