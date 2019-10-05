{!! view_render_event('bagisto.shop.products.view.up-sells.after', ['product' => $product]) !!}

<?php
    $productUpSells = $product->up_sells()->get();
?>

@if ($productUpSells->count())


    <!-- Begin Hiraola's Product Area Two -->
    <div class="hiraola-product_area hiraola-product_area-2 ">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="hiraola-section_title">
                        <h4>{{ __('shop::app.products.up-sell-title') }}</h4>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="hiraola-product_slider-3">
                    @foreach ($productUpSells as $up_sell_product)

                        <!-- Begin Hiraola's Slide Item Area -->
                            <div class="slide-item">
                                <div class="single_product">
                                    @include ('hiraloa::products.list.card', ['product' => $up_sell_product])
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hiraola's Product Area Two End Here -->

@endif

{!! view_render_event('bagisto.shop.products.view.up-sells.after', ['product' => $product]) !!}