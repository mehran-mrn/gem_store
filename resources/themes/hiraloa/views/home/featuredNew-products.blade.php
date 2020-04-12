@if (app('Webkul\Product\Repositories\ProductRepository')->getFeaturedProducts()->count())
    <div class="hiraola-product_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="hiraola-section_title">
                        <h4>{{ __('shop::app.home.featured-products') }}</h4>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="hiraola-product_slider">
                        @foreach (app('Webkul\Product\Repositories\ProductRepository')->getFeaturedProducts() as $product)
                            <div class="slide-item">
                                @inject ('productImageHelper', 'Webkul\Product\Helpers\ProductImage')
                                <?php $productBaseImage = $productImageHelper->getProductBaseImage($product); ?>
                                <?php $productGallery = $productImageHelper->getGalleryImages($product); ?>
                                <div class="single_product" style="border-radius: 10px 10px 0 0">
                                    <div class="product-img">
                                        <a href="{{ route('shop.products.index', $product->url_key) }}">
                                            <img class=" " style="border-radius: 10px 10px 0 0"
                                                 src="{{ $productBaseImage['medium_image_url'] }}"
                                                 alt="{{ $product->name }}">

                                        </a>
                                    </div>
                                    <div class="hiraola-product_content">
                                        <div class="product-desc_info">
                                            <h6 class=" pt-1">
                                                <a class="product-name" href="{{ route('shop.products.index', $product->url_key) }}">{{ $product->name }}</a>
                                            </h6>
                                            <div class="price-box" style="display: block;text-align: center">
                                                @inject ('priceHelper', 'Webkul\Product\Helpers\Price')

                                                @if ($product->type == 'configurable')
                                                    <span class="new-price" style="display: block">{{ core()->currency($priceHelper->getMinimalPrice($product)) }}</span>
                                                @else
                                                    @if ($priceHelper->haveSpecialPrice($product))

                                                        <strong class="new-price text-center text-bold text-danger ">{{ core()->currency($priceHelper->getSpecialPrice($product)) }}</strong>
                                                    @else
                                                        <h5 class="new-price text-center"
                                                            style="color: #3a598a !important;text-align: center!important;">{{ core()->currency($product->price) }}</h5>
                                                    @endif
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif