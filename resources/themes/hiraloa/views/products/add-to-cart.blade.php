{!! view_render_event('bagisto.shop.products.add_to_cart.before', ['product' => $product]) !!}

<button type="submit" data-href="{{ route('shop.product.buynow', $product->product_id)}}" class="qty-cart_btn {{ $product->type != 'configurable' && ! $product->haveSufficientQuantity(1) ? 'disabled' : '' }}" >
    {{ __('shop::app.products.add-to-cart') }}
</button>
{!! view_render_event('bagisto.shop.products.add_to_cart.after', ['product' => $product]) !!}