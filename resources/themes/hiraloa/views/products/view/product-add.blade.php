{!! view_render_event('bagisto.shop.products.view.product-add.after', ['product' => $product]) !!}
<div class="qty-btn_area add-to-buttons">
    <ul>
        <li>@include ('hiraloa::products.add-to-cart', ['product' => $product])</li>
{{--        <li>@include ('shop::products.buy-now')</li>--}}
        <li>@include ('hiraloa::products.wishlist')</li>
    </ul>
</div>
{!! view_render_event('bagisto.shop.products.view.product-add.after', ['product' => $product]) !!}