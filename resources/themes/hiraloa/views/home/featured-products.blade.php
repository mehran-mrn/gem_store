@if (app('Webkul\Product\Repositories\ProductRepository')->getFeaturedProducts()->count())
    <div class="hiraola-product-tab_area-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="product-tab">
                        <div class="hiraola-tab_title">
                            <h4>{{ __('shop::app.home.featured-products') }}</h4>
                        </div>
                        <ul class="nav product-menu">
                            <li><a class="active" data-toggle="tab" href="#necklaces-2"><span>Necklaces</span></a></li>
                            <li><a data-toggle="tab" href="#earrings-2"><span>Earrings</span></a></li>
                            <li><a data-toggle="tab" href="#bracelet-2"><span>Bracelet</span></a></li>
                            <li><a data-toggle="tab" href="#anklet-2"><span>Anklet</span></a></li>
                        </ul>
                    </div>
                    <div class="tab-content hiraola-tab_content">
                        <div id="necklaces-2" class="tab-pane active show" role="tabpanel">
                            <div class="hiraola-product-tab_slider-2">
                                @foreach (app('Webkul\Product\Repositories\ProductRepository')->getFeaturedProducts() as $productFlat)
                                    @include ('shop::products.list.card', ['product' => $productFlat])
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif