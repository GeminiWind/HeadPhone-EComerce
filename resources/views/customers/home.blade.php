@extends('layouts/customer/master')
@section('content')
<div class="fullwidthbanner-container">
    <div class="fullwidthbanner">
        <div class="bannercontainer">
            <div class="banner">
                <ul>
                    <!-- THE FIRST SLIDE -->
                    <li class="active-revslide" data-slotamount="20" data-transition="boxfade" style="width: 100%; height: 100%; overflow: hidden; z-index: 18; visibility: hidden; opacity: 0;">
                        <div class="slotholder" data-bgfit="undefined" data-bgfitend="undefined" data-bgposition="undefined" data-bgpositionend="undefined" data-duration="undefined" data-ease="undefined" data-easeme="undefined" data-kenburns="undefined" data-oheight="undefined" data-owidth="undefined" data-rotationend="undefined" data-rotationstart="undefined" data-zoomend="undefined" data-zoomstart="undefined" style="width:100%;height:100%;">
                            <div class="tp-bgimg defaultimg" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat" data-lazydone="undefined" data-lazyload="undefined" data-src="/customer/images/slide/banner_3c59dc04.jpg" src="/customer/images/slide/banner_3c59dc04.jpg" style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url('/customer/images/slide/banner_3c59dc04.jpg'); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
                            </div>
                        </div>
                    </li>
                      <li class="active-revslide" data-slotamount="20" data-transition="boxfade" style="width: 100%; height: 100%; overflow: hidden; z-index: 18; visibility: hidden; opacity: 0;">
                        <div class="slotholder" data-bgfit="undefined" data-bgfitend="undefined" data-bgposition="undefined" data-bgpositionend="undefined" data-duration="undefined" data-ease="undefined" data-easeme="undefined" data-kenburns="undefined" data-oheight="undefined" data-owidth="undefined" data-rotationend="undefined" data-rotationstart="undefined" data-zoomend="undefined" data-zoomstart="undefined" style="width:100%;height:100%;">
                            <div class="tp-bgimg defaultimg" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat" data-lazydone="undefined" data-lazyload="undefined" data-src="/customer/images/slide/banner_4e732ced.jpg" src="/customer/images/slide/banner_4e732ced.jpg" style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url('/customer/images/slide/banner_4e732ced.jpg'); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
                            </div>
                        </div>
                    </li>
                      <li class="active-revslide" data-slotamount="20" data-transition="boxfade" style="width: 100%; height: 100%; overflow: hidden; z-index: 18; visibility: hidden; opacity: 0;">
                        <div class="slotholder" data-bgfit="undefined" data-bgfitend="undefined" data-bgposition="undefined" data-bgpositionend="undefined" data-duration="undefined" data-ease="undefined" data-easeme="undefined" data-kenburns="undefined" data-oheight="undefined" data-owidth="undefined" data-rotationend="undefined" data-rotationstart="undefined" data-zoomend="undefined" data-zoomstart="undefined" style="width:100%;height:100%;">
                            <div class="tp-bgimg defaultimg" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat" data-lazydone="undefined" data-lazyload="undefined" data-src="/customer/images/slide/banner_98f13708.jpg" src="/customer/images/slide/banner_98f13708.jpg" style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url('/customer/images/slide/banner_98f13708.jpg'); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
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
</div>
<div class="container">
        <div id="content" class="space-top-none">
            <div class="main-content">
                <div class="space60">&nbsp;</div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="beta-products-list">
                            <h4>Sản phẩm mới</h4>
                            <div class="beta-products-details">
                                <p class="pull-left">Tìm thấy {{count($newProducts)}} sản phẩm</p>
                                <div class="clearfix"></div>
                            </div>

                            <div class="row">
                            @foreach($newProducts as $new)
                                <div class="col-sm-3">
                                    <div class="single-item">
s                                        <div class="single-item-header">
                                            <a href="#"><img src="{{Config::get('headphone.products', '/images/products/')}}{{ $new->image['main']}}" alt="" height="250px"></a>
                                        </div>
                                        <div class="single-item-body">
                                            <p class="single-item-title">{{$new->name}}</p>
                                            <p class="single-item-price" style="font-size: 18px">
                                        
                                                <span class="flash-sale">{{number_format($new->price)}}
                                            </p>
                                        </div>
                                        <div class="single-item-caption">
                                            <a class="add-to-cart pull-left" href="#" data-product-slug="{{ $new->slug}}"><i class="fa fa-heart"></i></a>
                                            <a class="add-to-cart pull-left" href="{{ route('cart.quick-add', $new->slug) }}"><i class="fa fa-shopping-cart"></i></a>
                                            <a class="beta-btn primary" href="{{ route('product.show', ['categorySlug' => $new->category->slug, 'productSlug' => $new->slug]) }}">Chi tiết <i class="fa fa-chevron-right"></i></a>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            </div>
                            <div class="row">{{$newProducts->links()}}</div>
                        </div> <!-- .beta-products-list -->

                        <div class="space50">&nbsp;</div>

                        <div class="beta-products-list">
                            <h4>Sản phẩm bán chạy</h4>
                            <div class="beta-products-details">
                                <p class="pull-left">Tìm thấy {{count($hotProducts)}} sản phẩm</p>
                                <div class="clearfix"></div>
                            </div>
                            <div class="row">
                            @foreach($hotProducts as $hot)
                                <div class="col-sm-3">
                                    <div class="single-item">
s                                        <div class="single-item-header">
                                            <a href="#"><img src="{{Config::get('headphone.products', '/images/products/')}}{{ $hot->image['main']}}" alt="" height="250px"></a>
                                        </div>
                                        <div class="single-item-body">
                                            <p class="single-item-title">{{$hot->name}}</p>
                                            <p class="single-item-price" style="font-size: 18px">
                                        
                                                <span class="flash-sale">{{number_format($hot->price)}}
                                            </p>
                                        </div>
                                        <div class="single-item-caption">
                                            <a class="add-to-cart pull-left" href="{{ route('cart.quick-add', $hot->slug) }}"><i class="fa fa-shopping-cart"></i></a>
                                            <a class="beta-btn primary" href="{{ route('product.show', ['categorySlug' => $hot->category->slug, 'productSlug' => $hot->slug]) }}">Chi tiết <i class="fa fa-chevron-right"></i></a>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            </div>
                            <div class="row">{{$hotProducts->links()}}</div>
                        </div> <!-- .beta-products-list -->
                    </div>
                </div> <!-- end section with sidebar and main content -->


            </div> <!-- .main-content -->
        </div> <!-- #content -->
@stop