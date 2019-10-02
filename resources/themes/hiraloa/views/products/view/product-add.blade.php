{!! view_render_event('bagisto.shop.products.view.product-add.after', ['product' => $product]) !!}

<div class="add-to-buttons">
    @include ('hiraloa::products.add-to-cart', ['product' => $product])

    @include ('hiraloa::products.buy-now')
</div>

{!! view_render_event('bagisto.shop.products.view.product-add.after', ['product' => $product]) !!}