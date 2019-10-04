@foreach ($cart->items as $item)
    <?php
        $product = $item->product;

        if ($product->cross_sells()->count()) {
            $products[] = $product;
            $products = array_unique($products);
        }
    ?>
@endforeach

@if (isset($products))

    <!-- Begin Hiraola's Product Area Two -->
    <div class="hiraola-product_area hiraola-product_area-2 ">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                    <div class="hiraola-section_title">
                        <h4>{{ __('shop::app.products.cross-sell-title') }}</h4>
                    </div>


                </div>
                <div class="col-lg-12">
                    <div class="hiraola-product_slider-3">
                        @foreach($products as $product)

                            @foreach ($product->cross_sells()->paginate(2) as $cross_sell_product)

                        <!-- Begin Hiraola's Slide Item Area -->
                            <div class="slide-item">
                                <div class="single_product">
                                    @include ('hiraloa::products.list.card', ['product' => $cross_sell_product])
                                </div>
                            </div>
                        @endforeach
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hiraola's Product Area Two End Here -->

@endif