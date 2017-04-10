@extends('layouts.customer.master')
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">
                LOL
            </h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb font-large">
                <a href="{{route('index')}}">
                    Trang chủ
                </a>
                /
                <span>
                    Thông tin chi tiết sản phẩm
                </span>
            </div>
        </div>
        <div class="clearfix">
        </div>
    </div>
</div>
<div class="container">
    <div id="content">
        <div class="row">
            <div class="col-md-9">
            @foreach ($posts as $post)
                 <div class="row post">
                    <div class="col-md-2 pull-left">
                        <h5>
                            <strong>{{$post->created_at->format('d')}}</strong>
                        </h5>
                        <h5>
                             {{substr($post->created_at->format('F'),0,3)}}
                        </h5>
                    </div>
                    <div class="col-md-10">
                        <div class="title">
                            <h4>
                                {{ $post->title}}
                            </h4>
                        </div>
                        <div class="sapo">
                            {!! substr($post->content, 150)!!}
                        </div>
                        <div class="utility block pull-right">
                            <span class="glyphicon glyphicon-thumbs-up"></span>{{ $post->likes->count() }} Likes
                            <span class="glyphicon glyphicon-comment"></span>{{ $post->comments->count() }} Comment
                            <span><a href="{{ route('post.show', $post->slug) }}">Read More...</a></span>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="row">{{$posts->links()}}</div>
            </div>
             <div class="col-sm-3 aside">
                <div class="widget">
                    <h3 class="widget-title">
                        Hot Product
                    </h3>
                    <div class="widget-body">
                        <div class="beta-sales beta-lists">
                            @foreach ($hotProducts as $product)
                            <div class="media beta-sales-item">
                                <a class="pull-left" href="{{ route('product.show', ['categorySlug' => $product->category->slug, 'productSlug' => $product->slug]) }}">
                                    <img alt="" src="{{Config::get('headphone.products', '/images/products/')}}{{ $product->image['main']}}"/>
                                </a>
                                <div class="media-body">
                                    {{ $product->name }}
                                    <span class="beta-sales-price">
                                        {{ $product->price }} VND
                                    </span>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- best sellers widget -->
                <div class="widget">
                    <h3 class="widget-title">
                        New Products
                    </h3>
                    <div class="widget-body">
                        <div class="beta-sales beta-lists">
                            @foreach ($newProducts as $product)
                            <div class="media beta-sales-item">
                                <a class="pull-left" href="{{ route('product.show', ['categorySlug' => $product->category->slug, 'productSlug' => $product->slug]) }}">
                                    <img alt="" src="{{Config::get('headphone.products', '/images/products/')}}{{ $product->image['main']}}"/>
                                </a>
                                <div class="media-body">
                                    {{ $product->name }}
                                    <span class="beta-sales-price">
                                        {{ $product->price }} VND
                                    </span>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- best sellers widget -->
            </div>
        </div>
    </div>
</div>
@stop