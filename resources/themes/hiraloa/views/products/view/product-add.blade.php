{!! view_render_event('bagisto.shop.products.view.product-add.after', ['product' => $product]) !!}

<div class="add-to-buttons">

</div>
<div class="qty-btn_area">
    <ul>
        <li>@include ('hiraloa::products.add-to-cart', ['product' => $product])</li>
        <li>@include ('shop::products.buy-now')</li>
        <li>@include ('hiraloa::products.wishlist')</li>
        <li><a class="qty-compare_btn" href="compare.html" data-toggle="tooltip" title="Compare This Product"><i class="ion-ios-shuffle-strong"></i></a></li>
    </ul>
</div>
{!! view_render_event('bagisto.shop.products.view.product-add.after', ['product' => $product]) !!}