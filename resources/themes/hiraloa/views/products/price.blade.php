{!! view_render_event('bagisto.shop.products.price.before', ['product' => $product]) !!}


<div class="price-box">
    @inject ('priceHelper', 'Webkul\Product\Helpers\Price')

    @if ($product->type == 'configurable')

        <span class="new-price">{{ core()->currency($priceHelper->getMinimalPrice($product)) }}</span>
    @else
        @if ($priceHelper->haveSpecialPrice($product))

            <span class="old-price text-muted ml-2 mr-2">{{ core()->currency($product->price) }}</span>

            <span class="new-price text-bold">{{ core()->currency($priceHelper->getSpecialPrice($product)) }}</span>
        @else
            <span class="new-price">{{ core()->currency($product->price) }}</span>
        @endif
    @endif
</div>

{!! view_render_event('bagisto.shop.products.price.after', ['product' => $product]) !!}