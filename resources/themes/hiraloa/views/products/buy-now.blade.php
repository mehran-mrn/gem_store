{!! view_render_event('bagisto.shop.products.buy_now.before', ['product' => $product]) !!}

<a style="background-color: #60769a!important;"
        href="{{ route('shop.product.buynow', $product->product_id)}}"
        class="qty-cart_btn buynow" {{ $product->type != 'configurable' && ! $product->haveSufficientQuantity(1) ? 'disabled' : '' }}>
    {{ __('shop::app.products.buy-now') }}
</a>

{!! view_render_event('bagisto.shop.products.buy_now.after', ['product' => $product]) !!}