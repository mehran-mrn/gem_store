{!! view_render_event('bagisto.shop.products.list.card.before', ['product' => $product]) !!}

<div class="slide-item">
    <div class="single_product">
        <div class="product-img">
            @inject ('productImageHelper', 'Webkul\Product\Helpers\ProductImage')

            <?php $productBaseImage = $productImageHelper->getProductBaseImage($product); ?>

            <a href="{{ route('shop.products.index', $product->url_key) }}" title="{{ $product->name }}">
                <img class="primary-img" src="{{ $productBaseImage['medium_image_url'] }}"
                     alt="Hiraola's Product Image"
                     onerror="this.src='{{ asset('vendor/webkul/ui/assets/images/product/meduim-product-placeholder.png') }}'"
                >
            </a>
            @if ($product->featured)
                <span class="sticker-2">Sale</span>
            @endif
            @if ($product->new)
                <span class="sticker">{{__('shop::app.products.new')}}</span>
            @endif

            <div class="add-actions">
                <ul>
                    <li><a class="hiraola-add_cart" href="cart.html" data-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="ion-bag"></i></a>
                    </li>
                    <li><a class="hiraola-add_compare" href="compare.html" data-toggle="tooltip" data-placement="top" title="Compare This Product"><i
                                    class="ion-ios-shuffle-strong"></i></a>
                    </li>
                    <li class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Quick View"><i
                                    class="ion-eye"></i></a></li>
                </ul>
            </div>

        </div>
        <div class="hiraola-product_content">
            <div class="product-desc_info">
                <h6><a class="product-name" href="{{ url()->to('/').'/products/' . $product->url_key }}" title="{{ $product->name }}">
                        {{ $product->name }}</a></h6>
                @include ('shop::products.price', ['product' => $product])

                <div class="additional-add_action">
                    <ul>
                        <li>
                            @include('hiraloa::products.wishlist')

                        </li>
                    </ul>
                </div>
                <div class="rating-box">
                    <ul>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li class="silver-color"><i class="fa fa-star"></i></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

{!! view_render_event('bagisto.shop.products.list.card.after', ['product' => $product]) !!}