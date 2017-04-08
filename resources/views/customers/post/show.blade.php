@extends('layouts.customer.master')
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">
                {{ $post->title }}
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
                <div class="post-detail">
                    <div class="title">
                        <h4>
                            <strong>
                                {{ $post->title }}
                            </strong>
                        </h4>
                    </div>
                    <div class="content">
                        {!! $post->content !!}
                    </div>
                </div>
                <hr>
                <div class="comment">
                <h5>Leave your comment here</h5>
                <br>
                    @foreach ($post->comments as $comment)
                             <div class="row comment-block">
                            <div class="col-md-3">
                                <strong>{{ $comment->user->name}}</strong>
                            </div>
                            <div class="col-md-9">
                                <p>{{ $comment->content}}</p>
                                <p style="text-align: right;"><i><span class="glyphicon glyphicon-time"></span> {{ $comment->created_at->diffForHumans() }}</i></p>
                            </div>
                        </div>
                        <hr/>
                      @endforeach
                      @if(Auth::guard('web')->check())
                      <div class="row comment-area">
                      <h6>Leave your comment here</h6>
                        <form action="{{ route('comment.store') }}" method="POST">
                            {!! csrf_field()!!}
                            <input type="hidden" name="target" value="post">
                            <input type="hidden" name="post_slug" value="{{ $post->slug }}">
                            <textarea name="content" rows="3" columns="10"></textarea>
                            <button type="submit" class="btn btn-primary pull-right">Send</button>
                        </form>
                      </div>
                      @endif
                </div>
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
