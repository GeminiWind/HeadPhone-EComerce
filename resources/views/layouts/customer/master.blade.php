<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
@include('layouts/customer/includes/head')
<body>
	@include('layouts/customer/includes/header')
	<div class="rev-slider">
		@yield('content')
	</div>
	@include('layouts/customer/includes/footer')
	
</body>
</html>