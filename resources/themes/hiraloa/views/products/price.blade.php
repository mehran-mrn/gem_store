{!! view_render_event('bagisto.shop.products.price.before', ['product' => $product]) !!}


<div class="rating-box">
    @inject ('priceHelper', 'Webkul\Product\Helpers\Price')

    @if ($product->type == 'configurable')
        <span class="new-price"  style="color: rgb(165, 162, 162) !important;">{{ core()->currency($priceHelper->getMinimalPrice($product)) }}</span>
    @else
        @if ($priceHelper->haveSpecialPrice($product))
            <h6 class="old-price text-muted ml-2 mr-2 mt-2" style="color: rgb(165, 162, 162) !important;">{{ core()->currency($product->price) }}</h6>
            <h6 class="new-price text-bold  mt-2" style="color: #FF1800">{{ core()->currency($priceHelper->getSpecialPrice($product)) }}</h6>
        @else
            <h4 class="new-price text-success mt-2"  style="color: #3a598a !important;">{{ core()->currency($product->price) }}</h4>
        @endif
    @endif
</div>

{!! view_render_event('bagisto.shop.products.price.after', ['product' => $product]) !!}