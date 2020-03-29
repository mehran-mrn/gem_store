@if (app('Webkul\Product\Repositories\ProductRepository')->getFeaturedProducts()->count())
    <?php
    $categories = [];
    $i = 1;
    foreach (app('Webkul\Category\Repositories\CategoryRepository')->getVisibleCategoryTree(core()->getCurrentChannel()->root_category_id) as $category) {
        if ($i < 5)
            if ($category->slug)
                array_push($categories, $category);
        $i++;
    }
    ?>
    <div class="hiraola-product-tab_area-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="product-tab">
                        <ul class="nav product-menu">
                            <?php
                            $active = 'active';
                            $x = 1;
                            ?>
                            @foreach($categories as $category)
                                <li>
                                    <a class="{{$active}}" data-toggle="tab"
                                       href="#cat_{{$x}}"><span>{{$category->translations->where('locale',core()->getCurrentLocale()->code)->first()->name}}</span></a>
                                </li>
                                <?php
                                $active = '';
                                $x++;
                                ?>
                            @endforeach
                        </ul>
                    </div>
                    <div class="tab-content hiraola-tab_content">
                        <?php
                        $active = array('active', 'show');
                        $x = 1;
                        ?>
                        @foreach($categories as $category)
                            <div id="cat_{{$x}}" class="tab-pane {{$active[0]}} {{$active[1]}}" role="tabpanel">
                                <div class="hiraola-product-tab_slider-3 hiraola-product_slider">
                                    @foreach (app('Webkul\Product\Repositories\ProductRepository',['featured'=>1])->getAll($category->id) as $product)
                                        <div class="slide-item">
                                            @inject ('productImageHelper', 'Webkul\Product\Helpers\ProductImage')
                                            <?php $productBaseImage = $productImageHelper->getProductBaseImage($product); ?>
                                            <?php $productGallery = $productImageHelper->getGalleryImages($product); ?>
                                            <div class="single_product" style="border-radius: 10px">
                                                <div class="product-img">
                                                    <a href="{{ route('shop.products.index', $product->url_key) }}">
                                                        <img class="primary-img" style="border-radius: 10px"
                                                             src="{{ $productBaseImage['medium_image_url'] }}"
                                                             alt="{{ $product->name }}">
                                                        <img class="secondary-img"  style="border-radius: 10px"
                                                             src="{{ $productGallery[rand(0,count($productGallery)-1)]['medium_image_url'] }}"
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
                            <?php
                            $active = array('', '');
                            $x++;
                            ?>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif



