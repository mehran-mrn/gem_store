{!! view_render_event('bagisto.shop.products.list.card.before', ['product' => $product]) !!}
<div class="slide-item">
    <div class="single_product">
        <div class="product-img">
            @inject ('productImageHelper', 'Webkul\Product\Helpers\ProductImage')

            <?php $productBaseImage = $productImageHelper->getProductBaseImage($product); ?>
            <?php $productGallery = $productImageHelper->getGalleryImages($product); ?>
            <a href="{{ route('shop.products.index', $product->url_key) }}" title="{{ $product->name }}">
                <img class="primary-img" src="{{ $productBaseImage['large_image_url'] }}"

                     onerror="this.src='{{ asset('vendor/webkul/ui/assets/images/product/meduim-product-placeholder.png') }}'"
                >
                <img class="secondary-img" src="{{ $productGallery[rand(0,count($productGallery)-1)]['large_image_url'] }}"

                     onerror="this.src='{{ asset('vendor/webkul/ui/assets/images/product/meduim-product-placeholder.png') }}'"
                >
            </a>

            @if ($product->featured)
                <span class="sticker-2">{{__('shop::app.products.sale')}}</span>
            @endif
            @if ($product->new)
                <span class="sticker">{{__('shop::app.products.new')}}</span>
            @endif

            <div class="add-actions">
                <ul>
                    <li><a class="hiraola-add_cart" href="{{ route('shop.product.buynow', $product->product_id)}}" data-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="ion-bag"></i></a>
                    </li>

{{--                    <li class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Quick View"><i--}}
{{--                                    class="ion-eye"></i></a></li>--}}
                </ul>
            </div>

        </div>
        <div class="hiraola-product_content">
            <div class="product-desc_info">
                <h6><a class="product-name" href="{{ url()->to('/').'/products/' . $product->url_key }}" title="{{ $product->name }}">
                        {{ $product->name }}</a></h6>
                @include ('hiraloa::products.price', ['product' => $product])

                <div class="additional-add_action">
                    <ul>
                        <li>
                            @include('hiraloa::products.wishlist')

                        </li>
                    </ul>
                </div>
                <div class="rating-box">
                    @include ('hiraloa::products.review', ['product' => $product])

                </div>
            </div>
        </div>
    </div>
</div>
{{--<div class="list-slide_item">--}}
{{--    <div class="single_product">--}}
{{--        <div class="product-img">--}}
{{--            <a href="{{ route('shop.products.index', $product->url_key) }}" title="{{ $product->name }}">--}}
{{--                <img class="primary-img" src="{{ $productBaseImage['medium_image_url'] }}"--}}
{{--                     alt="Hiraola's Product Image"--}}
{{--                     onerror="this.src='{{ asset('vendor/webkul/ui/assets/images/product/meduim-product-placeholder.png') }}'"--}}
{{--                >--}}
{{--            </a>--}}
{{--        </div>--}}
{{--        <div class="hiraola-product_content">--}}
{{--            <div class="product-desc_info">--}}
{{--                <h6><a class="product-name" href="single-product.html">{{ $product->name }}</a></h6>--}}
{{--                <div class="rating-box">--}}
{{--                    <ul>--}}
{{--                        <li><i class="fa fa-star"></i></li>--}}
{{--                        <li><i class="fa fa-star"></i></li>--}}
{{--                        <li><i class="fa fa-star"></i></li>--}}
{{--                        <li><i class="fa fa-star"></i></li>--}}
{{--                        <li class="silver-color"><i class="fa fa-star"></i></li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--                @include ('shop::products.price', ['product' => $product])--}}

{{--                <div class="product-short_desc">--}}
{{--                    <p>{!! $product->short_description !!}</p>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="add-actions">--}}
{{--                <ul>--}}







{{--                    <li>--}}
{{--                        @if ($product->type == "configurable")--}}
{{--                            <a class="btn li-btn hiraola-add_cart" href="{{ route('cart.add.configurable', $product->url_key) }}"--}}
{{--                               data-toggle="tooltip" data-placement="top" title="{{ __('shop::app.products.add-to-cart') }}">{{ __('shop::app.products.add-to-cart') }}</a>--}}
{{--                        @else--}}
{{--                            <form action="{{ route('cart.add', $product->product_id) }}" method="POST">--}}
{{--                                @csrf--}}
{{--                                <input type="hidden" name="product" value="{{ $product->product_id }}">--}}
{{--                                <input type="hidden" name="quantity" value="1">--}}
{{--                                <input type="hidden" value="false" name="is_configurable">--}}
{{--                                <a class="btn li-btn hiraola-add_cart" data-toggle="tooltip" data-placement="top" title="Add To Cart">--}}
{{--                                    {{ __('shop::app.products.add-to-cart') }}--}}
{{--                                </a>--}}

{{--                            </form>--}}

{{--                        @endif--}}

{{--                    </li>--}}
{{--                    <li><a class="hiraola-add_compare" href="compare.html" data-toggle="tooltip" data-placement="top" title="Compare This Product"><i--}}
{{--                                    class="ion-ios-shuffle-strong"></i></a></li>--}}
{{--                    <li class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><a href="{{ route('shop.products.index', $product->url_key) }}" data-toggle="tooltip" data-placement="top" title="Quick View"><i--}}
{{--                                    class="ion-eye"></i></a></li>--}}
{{--                    <li>--}}
{{--                        @include('hiraloa::products.wishlist')--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{!! view_render_event('bagisto.shop.products.list.card.after', ['product' => $product]) !!}