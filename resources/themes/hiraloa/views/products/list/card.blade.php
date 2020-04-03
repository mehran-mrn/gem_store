{!! view_render_event('bagisto.shop.products.list.card.before', ['product' => $product]) !!}

<div class="slide-item">
    <div class="single_product" style="border-radius: 10px!important;">
        <div class="product-img">
            @inject ('productImageHelper', 'Webkul\Product\Helpers\ProductImage')

            <?php $productBaseImage = $productImageHelper->getProductBaseImage($product); ?>
            <?php $productGallery = $productImageHelper->getGalleryImages($product); ?>
            <a href="{{ route('shop.products.index', $product->url_key) }}" title="{{ $product->name }}">
                <img class="primary-img"
                     src="{{ $productBaseImage['medium_image_url'] }}"
                     alt="{{ $product->name }}"
                     onerror="this.src='{{ asset('themes/hiraloa/assets/images/banner/meduim-product-placeholder.png') }}'">
                <img class="secondary-img"
                     src="{{ $productGallery[rand(0,count($productGallery)-1)]['medium_image_url'] }}"
                     alt="{{ $product->name }}"
                     onerror="this.src='{{ asset('themes/hiraloa/assets/images/banner/meduim-product-placeholder.png') }}'">
            </a>
            <div class="add-actions">
                <ul>
                    <li><a class="hiraola-add_cart" href="{{ route('shop.product.buynow', $product->product_id)}}"
                           data-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="ion-bag"></i></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="hiraola-product_content">
            <div class="product-desc_info">
                <h6 class="text-center pt-1">
                    <a class="product-name" title="{{ $product->name }}"
                       href="{{ url()->to('/').'/products/' . $product->url_key }}">{{ $product->name }}</a>
                </h6>
                <div class="price-box text-center" style="display: block!important;padding: 5px!important;">
                    @inject ('priceHelper', 'Webkul\Product\Helpers\Price')

                    @if ($product->type == 'configurable')
                        <span class="new-price text-center">{{ core()->currency($priceHelper->getMinimalPrice($product)) }}</span>
                    @else
                        @if ($priceHelper->haveSpecialPrice($product))
                            <h6 class="old-price text-center text-muted ml-2 mr-2 mt-2"
                                style="color: rgb(165, 162, 162) !important;">{{ core()->currency($product->price) }}</h6>
                            <h6 class="new-price text-center text-bold text-danger mt-2">{{ core()->currency($priceHelper->getSpecialPrice($product)) }}</h6>
                        @else
                            <h5 class="new-price text-center"
                                style="color: #3a598a !important;text-align: center!important;">{{ core()->currency($product->price) }}</h5>
                        @endif
                    @endif
                </div>
                <div class="additional-add_action">
                    <ul>
                        <li>@include('hiraloa::products.wishlist')</li>
                    </ul>
                </div>
                <div class="rating-box">
                    @include ('hiraloa::products.review', ['product' => $product])
                </div>
            </div>
        </div>
    </div>
</div>
<div class="list-slide_item">
    <div class="single_product"  style="border-radius: 10px!important;">
        <div class="product-img">
            @inject ('productImageHelper', 'Webkul\Product\Helpers\ProductImage')

            <?php $productBaseImage = $productImageHelper->getProductBaseImage($product); ?>
            <?php $productGallery = $productImageHelper->getGalleryImages($product); ?>
            <a href="{{ route('shop.products.index', $product->url_key) }}">
                <img class="primary-img"
                     src="{{ $productBaseImage['medium_image_url'] }}"
                     alt="{{ $product->name }}"
                     onerror="this.src='{{ asset('vendor/webkul/ui/assets/images/product/medium-product-placeholder.png') }}'">
                <img class="secondary-img"
                     src="{{ $productGallery[rand(0,count($productGallery)-1)]['medium_image_url'] }}"
                     alt="{{ $product->name }}"
                     onerror="this.src='{{ asset('vendor/webkul/ui/assets/images/product/medium-product-placeholder.png') }}'">
            </a>
        </div>
        <div class="hiraola-product_content">
            <div class="product-desc_info">
                <h6><a class="product-name" title="{{ $product->name }}"
                       href="{{ url()->to('/').'/products/' . $product->url_key }}">
                        {{ $product->name }}</a></h6>
                <div class="rating-box">
                    @include ('hiraloa::products.review', ['product' => $product])
                </div>
                <div class="price-box">
                    @inject ('priceHelper', 'Webkul\Product\Helpers\Price')

                    @if ($product->type == 'configurable')
                        <span class="new-price text-center">{{ core()->currency($priceHelper->getMinimalPrice($product)) }}</span>
                    @else
                        @if ($priceHelper->haveSpecialPrice($product))
                            <h6 class="old-price text-center text-muted ml-2 mr-2 mt-2"
                                style="color: rgb(165, 162, 162) !important;">{{ core()->currency($product->price) }}</h6>
                            <h6 class="new-price text-center text-bold text-danger mt-2">{{ core()->currency($priceHelper->getSpecialPrice($product)) }}</h6>
                        @else
                            <h5 class="new-price text-center"
                                style="color: #3a598a !important;text-align: center!important;">{{ core()->currency($product->price) }}</h5>
                        @endif
                    @endif
                </div>
                <div class="product-short_desc">
                    <p>{{strip_tags($product->short_description)}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
{!! view_render_event('bagisto.shop.products.list.card.after', ['product' => $product]) !!}