@extends('layouts.customer.master')
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">
                Sản phẩm {{$product->name}}
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
            <div class="col-sm-9">
                <div class="row">
                    <div class="col-sm-4">
                        <img alt="" src="{{Config::get('headphone.products', '/images/products/')}}{{ $product->image['main']}}">
                        </img>
                    </div>
                    <div class="col-sm-8">
                        <div class="single-item-body">
                            <p class="single-item-title">
                                <h2>
                                    {{$product->name}}
                                </h2>
                            </p>
                            <p class="single-item-price">
                               @if($product->isSale() != null)
                                    <span class="flash-del">{{number_format($product->price)}} đồng</span>
                                    <span class="flash-sale">{{number_format($product->current_price)}} đồng</span>
                                @else
                                    <span class="flash-sale">{{number_format($product->current_price)}} đồng</span>
                                @endif
                            </p>
                        </div>
                        <div class="clearfix">
                        </div>
                        <div class="space20">
                        </div>
                        <div class="single-item-desc">
                            <p>
                                  {!! $product->description !!}
                            </p>
                        </div>
                        <div class="space20">
                        </div>
                        <p>
                            Số lượng:
                        </p>
                        <form action="{{ route('cart.add', $product->slug) }}" method="POST">
                            {!! csrf_field() !!}
                            <div class="single-item-options">
                            <select class="wc-select" name="qty">
                                <option>
                                    Số lượng
                                </option>
                              @for($i=1;$i<= $product->stock->quantity; $i++)
                               <option value="{{$i}}">
                                    {{$i}}
                                </option>
                              @endfor
                            </select>
                            <button type="submit">
                            <a class="add-to-cart">
                                <i class="fa fa-shopping-cart">
                                </i>
                            </a>
                            </button>
                            <div class="clearfix">
                            </div>
                        </div>
                        </form>
                       
                    </div>
                </div>
                <div class="space40">
                </div>
                <div class="woocommerce-tabs">
                    <ul class="tabs">
                        <li>
                            <a href="#tab-description">
                                Mô tả
                            </a>
                             <a href="#tab-comment">
                                Comment
                            </a>
                        </li>
                    </ul>
                    <div class="panel active" id="tab-description">
                        <p>
                            {!! $product->description !!}
                        </p>
                    </div>
                      <div class="panel " id="tab-comment">
                      @foreach ($product->comments as $comment)
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
                            <input type="hidden" name="target" value="product">
                            <input type="hidden" name="product_slug" value="{{ $product->slug }}">
                            <textarea name="content" rows="3" columns="10"></textarea>
                            <button type="submit" class="btn btn-primary pull-right">Send</button>
                        </form>
                      </div>
                      @endif
                     
                    </div>
                </div>
                <div class="space50">
                </div>
                <div class="beta-products-list">
                    <h4>
                        Sản phẩm tương tự
                    </h4>
                    <div class="row">
                        @foreach($relatedProducts as $rp)
                        <div class="col-sm-4">
                            @include('customers.components.product',['product' => $rp ])
                        </div>
                        @endforeach
                    </div>
                    <div class="row">
                        {{$relatedProducts->links()}}
                    </div>
                </div>
                <!-- .beta-products-list -->
            </div>
            <div class="col-sm-3 aside">
                <div class="widget">
                    <h3 class="widget-title">
                        Hot Product
                    </h3>
                    @include('customers.components.widget.product', ['products' => $hotProducts])
                </div>
                <!-- best sellers widget -->
                <div class="widget">
                    <h3 class="widget-title">
                        New Products
                    </h3>
                    @include('customers.components.widget.product', ['products' => $newProducts])
                </div>
                <!-- best sellers widget -->
            </div>
        </div>
    </div>
    <!-- #content -->
</div>
<!-- .container -->
@endsection