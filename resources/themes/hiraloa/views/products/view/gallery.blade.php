@inject ('productImageHelper', 'Webkul\Product\Helpers\ProductImage')
@inject ('wishListHelper', 'Webkul\Customer\Helpers\Wishlist')

<?php $images = $productImageHelper->getGalleryImages($product); ?>

{!! view_render_event('bagisto.shop.products.view.gallery.before', ['product' => $product]) !!}

{{--<div class="product-image-group">--}}

{{--    <div class="cp-spinner cp-round" id="loader">--}}
{{--    </div>--}}

    <div class="zoompro-border">
        <img class="zoompro" src="{{$images[0]['large_image_url']}}"   />
    </div>
    <div id="gallery" class="sp-img_slider">
        @foreach($images as $image)
        <a class="active" data-image="{{$image['large_image_url']}}" >
            <img src="{{$image['small_image_url']}}" >
        </a>
        @endforeach
    </div>

{!! view_render_event('bagisto.shop.products.view.gallery.after', ['product' => $product]) !!}

@push('scripts')


{{--    <script type="text/x-template" id="product-gallery-template">--}}
{{--        <div class="sp-img_area">--}}
{{--            <div class="zoompro-border">--}}
{{--                <img class="zoompro"--}}
{{--                     :src="currentLargeImageUrl"--}}
{{--                     :data-image="currentOriginalImageUrl"--}}
{{--                     :data-zoom-image="currentOriginalImageUrl"--}}
{{--                     alt="Hiraola's Product Image" />--}}
{{--                @auth('customer')--}}
{{--                    <a @if ($wishListHelper->getWishlistProduct($product)) class="add-to-wishlist already" @else class="add-to-wishlist" @endif href="{{ route('customer.wishlist.add', $product->product_id) }}">--}}
{{--                    </a>--}}
{{--                @endauth--}}
{{--            </div>--}}
{{--            <div id="gallery" class="sp-img_slider">--}}
{{--                <a  class="active" :class="[thumb.large_image_url == currentLargeImageUrl ? 'active' : '']"--}}
{{--                    v-for='(thumb, index) in thumbs'--}}
{{--                    @mouseover="changeImage(thumb)"--}}
{{--                    data-image="assets/images/single-product/large-size/1.jpg" data-zoom-image="assets/images/single-product/large-size/1.jpg">--}}
{{--                    <img :src="thumb.small_image_url" alt="Hiraola's Product Image">--}}
{{--                </a>--}}
{{--            </div>--}}
{{--        </div>--}}


{{--    </script>--}}


@endpush