@if (app('Webkul\Product\Repositories\ProductRepository')->getFeaturedProducts()->count())
    <div class="hiraola-product-tab_area-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="hiraola-section_title">
                        <h4>{{ __('shop::app.home.feature-products') }}</h4>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="tab-content hiraola-tab_content">
                        <div class="hiraola-product-tab_slider-3">
                            @foreach (app('Webkul\Product\Repositories\ProductRepository')->getFeaturedProducts() as $productFlat)
                                @include ('shop::products.list.card', ['product' => $productFlat])
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif