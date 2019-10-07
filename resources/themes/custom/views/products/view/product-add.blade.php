{!! view_render_event('bagisto.shop.products.view.product-add.after', ['product' => $product]) !!}

<div class="add-to-buttons">
    @include ('custom::products.add-to-cart', ['product' => $product])

    @include ('custom::products.buy-now')
</div>

{!! view_render_event('bagisto.shop.products.view.product-add.after', ['product' => $product]) !!}