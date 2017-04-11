<div class="widget-body">
    <div class="beta-sales beta-lists">
        @foreach ($products as $product)
        <div class="media beta-sales-item">
            <a class="pull-left" href="{{ route('product.show', ['categorySlug' => $product->category->slug, 'productSlug' => $product->slug]) }}">
                <img alt="" src="{{Config::get('headphone.products', '/images/products/')}}{{ $product->image['main']}}"/>
            </a>
            <div class="media-body">
                {{ $product->name }}
                <span class="beta-sales-price">
                    {{ $product->current_price }} đồng
                </span>
            </div>
        </div>
        @endforeach
    </div>
</div>