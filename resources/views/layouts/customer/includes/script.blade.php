<script src="{{ asset('customer/js/jquery.js') }}">
</script>
<script src="{{ asset('customer/vendors/jqueryui/jquery-ui-1.10.4.custom.min.js') }}">
</script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js">
</script>
<script src="{{ asset('customer/vendors/bxslider/jquery.bxslider.min.js') }}">
</script>
<script src="{{ asset('customer/vendors/colorbox/jquery.colorbox-min.js') }}">
</script>
<script src="{{ asset('customer/vendors/animo/Animo.js') }}">
</script>
<script src="{{ asset('customer/vendors/dug/dug.js') }}">
</script>
<script src="{{ asset('customer/js/scripts.min.js') }}">
</script>
<script src="{{ asset('customer/rs-plugin/js/jquery.themepunch.tools.min.js') }}">
</script>
<script src="{{ asset('customer/rs-plugin/js/jquery.themepunch.revolution.min.js') }}">
</script>
<script src="{{ asset('customer/js/waypoints.min.js') }}">
</script>
<script src="{{ asset('customer/js/wow.min.js') }}">
</script>
<!--customjs-->
<script src="{{ asset('customer/js/custom2.js') }}">
</script>
<script>
    $(document).ready(function($) {    
		$(window).scroll(function(){
			if($(this).scrollTop()>150){
			$(".header-bottom").addClass('fixNav')
			}else{
				$(".header-bottom").removeClass('fixNav')
			}}
		)
		
	})
</script>
@if(session('status') === 'success')
<script>
    swal({
		 title: 'Success!!!',
		 type: 'success',
		 text:'Thanks you',
		 timer:2000
		})
</script>
@elseif(session('status') === 'error')
<script type="text/javascript">
    swal({
		 title: 'Whoops, something went wrong',
		 type: 'error',
		 text:'Try again'
		})
</script>
@endif 
@stack('js')
@stack('script')
