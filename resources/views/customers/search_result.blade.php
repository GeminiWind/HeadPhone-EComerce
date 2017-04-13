@extends('layouts.customer.master')
@section('title', "Headphone.Dev-Search Results")
@section('content')
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Kết quả tìm kiếm</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{route('index')}}">Home</a> / <span>Tìm kiếm </span>
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
					</ul>
				</div>
				<div class="col-sm-9">
					<div class="beta-products-list">
						<h4>Results</h4>
						<div class="beta-products-details">
							<p class="pull-left">{{ $results->count()}} products</p>
							<div class="clearfix"></div>
						</div>

						<div class="row">
						@foreach($results as $product)
							<div class="col-sm-4">
								<div class="single-item">
									<div class="single-item-header">
										<a href="{{route('product.show',['slugCategory' => $product->category->slug, 'slugProduct' => $product->slug])}}"><img src="{{Config::get('headphone.products', '/images/products/')}}{{ $product->image['main']}}" alt="" height="250px"></a>
									</div>
									<div class="single-item-body">
										<p class="single-item-title">{{$product->name}}</p>
										<p class="single-item-price" style="font-size: 18px">
										<span>{{number_format($product->price)}} đồng</span>
										</p>
									</div>
									<div class="single-item-caption">
										<a class="add-to-cart pull-left" href="{{ route('cart.quick-add', $product->slug) }}"><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="{{ route('product.show', ['categorySlug' => $product->category->slug, 'productSlug' => $product->slug]) }}">Details <i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
						@endforeach
						</div>
						<div class="row">{{$results->links()}}</div>
					</div> <!-- .beta-products-list -->

					<div class="space50">&nbsp;</div>

					
				</div>
			</div> <!-- end section with sidebar and main content -->


		</div> <!-- .main-content -->
	</div> <!-- #content -->
</div> <!-- .container -->
@stop