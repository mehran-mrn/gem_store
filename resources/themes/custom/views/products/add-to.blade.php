{!! view_render_event('bagisto.shop.products.add_to.before', ['product' => $product]) !!}

<div class="cart-fav-seg">
    @include ('custom::products.add-to-cart', ['product' => $product])

    @include('shop::products.wishlist')
</div>

{!! view_render_event('bagisto.shop.products.add_to.after', ['product' => $product]) !!}