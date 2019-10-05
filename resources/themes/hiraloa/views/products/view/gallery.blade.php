@inject ('productImageHelper', 'Webkul\Product\Helpers\ProductImage')
@inject ('wishListHelper', 'Webkul\Customer\Helpers\Wishlist')

<?php $images = $productImageHelper->getGalleryImages($product); ?>

{!! view_render_event('bagisto.shop.products.view.gallery.before', ['product' => $product]) !!}

{{--<div class="product-image-group">--}}

{{--    <div class="cp-spinner cp-round" id="loader">--}}
{{--    </div>--}}

<div class="sp-img_area">
    <div class="zoompro-border">
        <img class="zoompro" src="{{$images[0]['large_image_url']}}" data-zoom-image="{{$images[0]['original_image_url']}}" alt="Hiraola's Product Image" />
    </div>
    <div id="gallery" class="sp-img_slider">
        @foreach($images as $image)
        <a class="active" data-image="{{$image['large_image_url']}}" data-zoom-image="{{$image['original_image_url']}}">
            <img src="{{$image['small_image_url']}}" alt="Hiraola's Product Image">
        </a>
        @endforeach
    </div>
</div>


    <div class="cp-spinner cp-round" id="loader">
    </div>

    <product-gallery></product-gallery>


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


    <script>
        var galleryImages = @json($images);

        Vue.component('product-gallery', {

            template: '#product-gallery-template',

            data: function () {
                return {
                    images: galleryImages,

                    thumbs: [],

                    currentLargeImageUrl: '',

                    currentOriginalImageUrl: '',

                    counter: {
                        up: 0,
                        down: 0,
                    },

                    is_move: {
                        up: true,
                        down: true,
                    }
                }
            },

            watch: {
                'images': function (newVal, oldVal) {
                    this.changeImage(this.images[0])

                    this.prepareThumbs()
                }
            },

            created: function () {
                this.changeImage(this.images[0])

                this.prepareThumbs()
            },

            methods: {
                prepareThumbs: function () {
                    var this_this = this;

                    this_this.thumbs = [];

                    this.images.forEach(function (image) {
                        this_this.thumbs.push(image);
                    });
                },

                changeImage: function (image) {
                    this.currentLargeImageUrl = image.large_image_url;

                    this.currentOriginalImageUrl = image.original_image_url;

                    if ($(window).width() > 580) {
                        $('img#pro-img').data('zoom-image', image.original_image_url).ezPlus();
                    }
                },

                moveThumbs: function (direction) {
                    let len = this.thumbs.length;

                    if (direction === "top") {
                        const moveThumb = this.thumbs.splice(len - 1, 1);

                        this.thumbs = [moveThumb[0]].concat((this.thumbs));

                        this.counter.up = this.counter.up + 1;

                        this.counter.down = this.counter.down - 1;

                    } else {
                        const moveThumb = this.thumbs.splice(0, 1);

                        this.thumbs = [].concat((this.thumbs), [moveThumb[0]]);

                        this.counter.down = this.counter.down + 1;

                        this.counter.up = this.counter.up - 1;
                    }

                    if ((len - 4) == this.counter.down) {
                        this.is_move.down = false;
                    } else {
                        this.is_move.down = true;
                    }

                    if ((len - 4) == this.counter.up) {
                        this.is_move.up = false;
                    } else {
                        this.is_move.up = true;
                    }
                },
            }
        });

    </script>

    <script>
        $(document).ready(function () {
            if ($(window).width() > 580) {
                $('img#pro-img').data('zoom-image', $('img#pro-img').data('image')).ezPlus();
            }

            var wishlist = " <?php echo $wishListHelper->getWishlistProduct($product);  ?> ";

            $(document).mousemove(function (event) {
                if ($('.add-to-wishlist').length && wishlist != 1) {
                    if (event.pageX > $('.add-to-wishlist').offset().left && event.pageX < $('.add-to-wishlist').offset().left + 32 && event.pageY > $('.add-to-wishlist').offset().top && event.pageY < $('.add-to-wishlist').offset().top + 32) {

                        $(".zoomContainer").addClass("show-wishlist");

                    } else {
                        $(".zoomContainer").removeClass("show-wishlist");
                    }
                }
                ;

                if ($("body").hasClass("rtl")) {
                    $(".zoomWindow").addClass("zoom-image-direction");
                } else {
                    $(".zoomWindow").removeClass("zoom-image-direction");
                }
            });
        })
    </script>

@endpush