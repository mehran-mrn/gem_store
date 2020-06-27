@inject ('productImageHelper', 'Webkul\Product\Helpers\ProductImage')
@inject ('wishListHelper', 'Webkul\Customer\Helpers\Wishlist')

<?php $images = $productImageHelper->getGalleryImages($product); ?>

{!! view_render_event('bagisto.shop.products.view.gallery.before', ['product' => $product]) !!}

<div class="product-image-group">

    <div class="cp-spinner cp-round" id="loader">
    </div>

    <product-gallery></product-gallery>

    @include ('custom::products.view.product-add')

</div>

{!! view_render_event('bagisto.shop.products.view.gallery.after', ['product' => $product]) !!}

@push('scripts')



    <script>
        $(document).ready(function() {
            $(".zoomWindowContainer").css("width",0);
        });


    </script>

@endpush