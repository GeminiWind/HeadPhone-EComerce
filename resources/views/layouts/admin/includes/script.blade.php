<!-- jQuery 2.2.3 -->
<script src="/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="/css/admin/bootstrap/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="/js/admin/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="js/admin/demo.js"></script>
<script src"{{ asset('js/admin/myscript.js') }}"></script>
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