@extends('layouts/customer/master')
@section('content')
<div class="fullwidthbanner-container">
    <div class="fullwidthbanner">
        <div class="bannercontainer">
            <div class="banner">
                <ul>
                    {{-- @foreach($slide as $sl) --}}
						{{--
                    <!--- THE FIRST SLIDE -->
                    --}}
                    <li class="active-revslide" data-slotamount="20" data-transition="boxfade" style="width: 100%; height: 100%; overflow: hidden; z-index: 18; visibility: hidden; opacity: 0;">
                        <div class="slotholder" data-bgfit="undefined" data-bgfitend="undefined" data-bgposition="undefined" data-bgpositionend="undefined" data-duration="undefined" data-ease="undefined" data-easeme="undefined" data-kenburns="undefined" data-oheight="undefined" data-owidth="undefined" data-rotationend="undefined" data-rotationstart="undefined" data-zoomend="undefined" data-zoomstart="undefined" style="width:100%;height:100%;">
                            <div class="tp-bgimg defaultimg" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat" data-lazydone="undefined" data-lazyload="undefined" data-src="/public/customer/images/slide/1482376460426527413.jpg{{-- {{$sl->image}} --}}" src="/public/customer/images/slide/1482376460426527413.jpg{{-- {{$sl->image}} --}}" style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url('public/customer/images/slide/1482376460426527413.jpg'); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="tp-bannertimer">
        </div>
    </div>
</div>
<!--slider-->
<div class="container">
    <div class="space-top-none" id="content">
        <div class="main-content">
            <div class="space60">
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="beta-products-list">
                        <h4>
                            Sản phẩm mới
                        </h4>
                        <div class="beta-products-details">
                            <p class="pull-left">
                                Tìm thấy {{-- {{count($new_product)}} --}} sản phẩm
                            </p>
                            <div class="clearfix">
                            </div>
                        </div>
                        <div class="row">
                            {{-- @foreach($new_product as $new)
                            <div class="col-sm-3">
                                <div class="single-item">
                                    @if($new->promotion_price!=0)
                                    <div class="ribbon-wrapper">
                                        <div class="ribbon sale">
                                            Sale
                                        </div>
                                    </div>
                                    @endif
                                    <div class="single-item-header">
                                        <a href="{{route('chitietsanpham',$new->id)}}">
                                            <img alt="" height="250px" src="source/image/product/{{$new->image}}"/>
                                        </a>
                                    </div>
                                    <div class="single-item-body">
                                        <p class="single-item-title">
                                            {{$new->name}}
                                        </p>
                                        <p class="single-item-price" style="font-size: 18px">
                                            @if($new->promotion_price==0)
                                            <span class="flash-sale">
                                                {{number_format($new->unit_price)}} đồng
                                            </span>
                                            @else
                                            <span class="flash-del">
                                                {{number_format($new->unit_price)}} đồng
                                            </span>
                                            <span class="flash-sale">
                                                {{number_format($new->promotion_price)}} đồng
                                            </span>
                                            @endif
                                        </p>
                                    </div>
                                    <div class="single-item-caption">
                                        <a class="add-to-cart pull-left" href="{{route('themgiohang',$new->id)}}">
                                            <i class="fa fa-shopping-cart">
                                            </i>
                                        </a>
                                        <a class="beta-btn primary" href="product.html">
                                            Chi tiết
                                            <i class="fa fa-chevron-right">
                                            </i>
                                        </a>
                                        <div class="clearfix">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach --}}
                        </div>
                        <div class="row">
                            {{-- {{$new_product->links()}} --}}
                        </div>
                    </div>
                    <!-- .beta-products-list -->
                    <div class="space50">
                    </div>
                    <div class="beta-products-list">
                        <h4>
                            Sản phẩm khuyến mãi
                        </h4>
                        <div class="beta-products-details">
                            <p class="pull-left">
                                Tìm thấy {{-- {{count($sanpham_khuyenmai)}} --}} sản phẩm
                            </p>
                            <div class="clearfix">
                            </div>
                        </div>
                        <div class="row">
                            {{-- @foreach($sanpham_khuyenmai as $spkm)
                            <div class="col-sm-3">
                                <div class="single-item">
                                    <div class="single-item-header">
                                        <a href="{{route('chitietsanpham',$spkm->id)}}">
                                            <img alt="" height="250px" src="source/image/product/{{$spkm->image}}"/>
                                        </a>
                                    </div>
                                    <div class="single-item-body">
                                        <p class="single-item-title">
                                            {{$spkm->name}}
                                        </p>
                                        <p class="single-item-price" style="font-size: 18px">
                                            <span class="flash-del">
                                                {{number_format($spkm->unit_price)}} đồng
                                            </span>
                                            <span class="flash-sale">
                                                {{number_format($spkm->promotion_price)}} đồng
                                            </span>
                                        </p>
                                    </div>
                                    <div class="single-item-caption">
                                        <a class="add-to-cart pull-left" href="shopping_cart.html">
                                            <i class="fa fa-shopping-cart">
                                            </i>
                                        </a>
                                        <a class="beta-btn primary" href="product.html">
                                            Details
                                            <i class="fa fa-chevron-right">
                                            </i>
                                        </a>
                                        <div class="clearfix">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach --}}
                        </div>
                        <div class="row">
                            {{-- {{$sanpham_khuyenmai->links()}} --}}
                        </div>
                    </div>
                    <!-- .beta-products-list -->
                </div>
            </div>
            <!-- end section with sidebar and main content -->
        </div>
        <!-- .main-content -->
    </div>
    <!-- #content -->
</div>
@stop