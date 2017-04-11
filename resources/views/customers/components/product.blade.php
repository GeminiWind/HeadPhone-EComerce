<div class="single-item">
    @if($product->isSale()!= null)
    <div class="ribbon-wrapper">
        <div class="ribbon sale">
            Sale
        </div>
    </div>
    @endif
    <div class="single-item-header">
        <a href="{{ route('product.show', ['categorySlug' => $product->category->slug, 'productSlug' => $product->slug]) }}">
            <img alt="" height="250px" src="{{Config::get('headphone.products', '/images/products/')}}{{ $product->image['main']}}"/>
        </a>
    </div>
    <div class="single-item-body">
        <p class="single-item-title">
            {{$product->name}}
        </p>
        <p class="single-item-price" style="font-size: 18px">
            @if($product->isSale()!= null)
            <span class="flash-del">
                {{number_format($product->price)}} đồng
            </span>
            <span class="flash-sale">
                {{number_format($product->current_price)}} đồng
            </span>
            @else
            <span>
                {{number_format($product->current_price)}} đồng
            </span>
            @endif
        </p>
    </div>
    <div class="single-item-caption">
        <a class="add-to-cart pull-left" href="{{ route('cart.quick-add', $product->slug) }}">
            <i class="fa fa-shopping-cart">
            </i>
        </a>
        <a class="beta-btn primary" href="{{ route('product.show', ['categorySlug' => $product->category->slug, 'productSlug' => $product->slug]) }}">
            Chi tiết
            <i class="fa fa-chevron-right">
            </i>
        </a>
        <div class="clearfix">
        </div>
    </div>
</div>