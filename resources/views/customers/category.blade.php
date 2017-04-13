@extends('layouts.customer.master')
@section('title', "Headphone.Dev-Category")
@section('content')
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Sản phẩm {{$category->name}}</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{route('index')}}">Home</a> / <span>Loại sản phẩm</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
</div>
<div class="container">
	<div id="content" class="space-top-none">
		<div class="main-content">
			<div class="space60">&nbsp;</div>
			<div class="row">
				<div class="col-sm-3">
					<ul class="aside-menu">
					@foreach($categoryList as $category)
						<li><a href="{{route('category.show',$category->slug)}}">{{$category->name}}</a></li>
					@endforeach
					</ul>
				</div>
				<div class="col-sm-9">
					<div class="beta-products-list">
						<h4>List</h4>
						<div class="beta-products-details">
							<p class="pull-left">{{ $category->products->count()}} products</p>
							<div class="clearfix"></div>
						</div>

						<div class="row">
						@foreach($products as $product)
							<div class="col-sm-4">
								@include('customers.components.product',['product' => $product ])
							</div>
						@endforeach
						</div>
						<div class="row">{{$products->links()}}</div>
					</div> <!-- .beta-products-list -->

					<div class="space50">&nbsp;</div>

					
				</div>
			</div> <!-- end section with sidebar and main content -->


		</div> <!-- .main-content -->
	</div> <!-- #content -->
</div> <!-- .container -->
@stop