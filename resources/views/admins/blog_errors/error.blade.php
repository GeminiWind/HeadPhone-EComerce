@if (count($errors)>0) {{-- $errors la thanh phan cua laravel, bat buoc phai ghi vay --}}
<div class="alert alert-danger">
	<ul>
		@foreach ($errors->all() as $error)  {{-- $error co the thay bang tu khac, ko anh huong gi --}}
		<li>{!! $error !!}</li>
		@endforeach
	</ul>
	
</div>
@endif