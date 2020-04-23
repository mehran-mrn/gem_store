<?php
$relatedProducts = $product->related_products()->get();
?>

@if ($relatedProducts->count())
    <div class="hiraola-product_area hiraola-product_area-2 section-space_add">
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
                            <div class="slide-item">
                                <div class="single_product">
                                    @include ('hiraloa::products.list.cardReated', ['product' => $related_product])
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif