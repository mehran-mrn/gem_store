<?php
    $relatedProducts = $product->related_products()->get();
?>

@if ($relatedProducts->count())

    <!-- Begin Hiraola's Product Area Two -->
    <div class="hiraola-product_area hiraola-product_area-2 ">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                    <div class="hiraola-section_title">
                        <h4>{{ __('shop::app.products.related-product-title') }}</h4>
                    </div>


                </div>
                <div class="col-lg-12">
                    <div class="hiraola-product_slider-3">
                    @foreach ($relatedProducts as $related_product)

                        <!-- Begin Hiraola's Slide Item Area -->
                            <div class="slide-item">
                                <div class="single_product">
                                    @include ('hiraloa::products.list.card', ['product' => $related_product])
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