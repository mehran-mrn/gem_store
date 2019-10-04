//
{!! view_render_event('bagisto.shop.products.add_to.before', ['product' => $product]) !!}

<div class="cart-fav-seg">
    @include ('hiraloa::products.add-to-cart', ['product' => $product])

    @include('hiraloa::products.wishlist')
</div>

{!! view_render_event('bagisto.shop.products.add_to.after', ['product' => $product]) !!}