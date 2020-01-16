{!! view_render_event('bagisto.shop.products.price.before', ['product' => $product]) !!}


<div class="rating-box text-center">
    @inject ('priceHelper', 'Webkul\Product\Helpers\Price')

    @if ($product->type == 'configurable')
        <span class="new-price">{{ core()->currency($priceHelper->getMinimalPrice($product)) }}</span>
    @else
        @if ($priceHelper->haveSpecialPrice($product))
            <h6 class="old-price text-muted ml-2 mr-2 mt-2">{{ core()->currency($product->price) }}</h6>
            <h6 class="new-price text-bold text-danger mt-2">{{ core()->currency($priceHelper->getSpecialPrice($product)) }}</h6>
        @else
            <h6 class="new-price text-success mt-2">{{ core()->currency($product->price) }}</h6>
        @endif
    @endif
</div>

{!! view_render_event('bagisto.shop.products.price.after', ['product' => $product]) !!}