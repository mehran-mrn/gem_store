@extends('hiraloa::layouts.master')

@section('page_title')
    {{ trim($product->meta_title) != "" ? $product->meta_title : $product->name }}
@stop

@section('seo')
    <meta name="description"
          content="{{ trim($product->meta_description) != "" ? $product->meta_description : str_limit(strip_tags($product->description), 120, '') }}"/>
    <meta name="keywords" content="{{ $product->meta_keywords }}"/>
@stop

@section('content-wrapper')

    {!! view_render_event('bagisto.shop.products.view.before', ['product' => $product]) !!}
    <!-- Begin Hiraola's Single Product Area -->
    <section class="product-detail">

        <div class="sp-area">
            <div class="container">
                <div class="sp-nav">
                    <div class="form-container row">

                        {{--    <product-gallery></product-gallery>--}}
                        <div class="clearfix"></div>
                        <div class="col-lg-6 col-md-6">
                            @include ('hiraloa::products.view.gallery')

                        </div>

                        <div class="col-lg-6 col-md-6">
                            <form method="POST" id="product-form" action="{{ route('cart.add', $product->product_id) }}" class="product-detail-frame"
                                  @click="onSubmit($event)">
                                @csrf()
                                <input type="hidden" name="product" value="{{ $product->product_id }}">
                                <div class="sp-heading mt-2 text-center text-sm-left">
                                    <h5 style="color: #576784!important;">{{ $product->name }}</h5>
                                </div>
                                {!! view_render_event('bagisto.shop.products.view.short_description.before', ['product' => $product]) !!}
                                <strong class="reference text-center text-sm-left">کد: {!! strtoupper($product->sku) !!}</strong>
                                {!! view_render_event('bagisto.shop.products.view.short_description.after', ['product' => $product]) !!}

                                <div class="rating-box text-center text-sm-left">
                                    @include ('hiraloa::products.review', ['product' => $product])
                                    @inject ('reviewHelper', 'Webkul\Product\Helpers\Review')

                                    {!! view_render_event('bagisto.shop.products.review.before', ['product' => $product]) !!}
                                    <div>
                                        {{--                                {{--}}
                                        {{--                        __('shop::app.products.total-rating', [--}}
                                        {{--                                'total_rating' => $reviewHelper->getTotalRating($product),--}}
                                        {{--                                'total_reviews' => $reviewHelper->getTotalReviews($product),--}}
                                        {{--                            ])--}}
                                        {{--                                }}--}}
                                    </div>
                                </div>
                                <hr>
                                <div class="sp-essential_stuff text-center text-sm-left">
                                    <ul>
                                        <li class="pb-lg-1"><h4
                                                    class="text-danger">@include ('hiraloa::products.price', ['product' => $product])</h4>
                                        </li>
                                        <li>
                                            <span>@include ('hiraloa::products.view.stock', ['product' => $product])</span>
                                        </li>
                                    </ul>
                                    <hr>
                                </div>
                                <div class="quantity" :class="[errors.has('quantity') ? 'has-error' : '']">
                                    {!! view_render_event('bagisto.shop.products.view.quantity.before', ['product' => $product]) !!}

                                    <label class="required">{{ __('shop::app.products.quantity') }}</label>
                                    <div class="cart-plus-minus">
                                        <input name="quantity" id="quantity"
                                               class="cart-plus-minus-box"
                                               value="1"
                                               min="1"
                                               max="10"
                                               type="text">
                                        <div class="dec qtybutton" onclick="updateQunatity('remove')">
                                            <i class="fa fa-angle-down"></i>
                                        </div>
                                        <div class="inc qtybutton" onclick=updateQunatity('add')>
                                            <i class="fa fa-angle-up"></i>
                                        </div>
                                    </div>

                                </div>
                                {!! view_render_event('bagisto.shop.products.view.quantity.after', ['product' => $product]) !!}

                                <hr>
                                @if ($product->type == 'configurable')
                                    <input type="hidden" value="true" name="is_configurable">
                                    <div class="color-list_area">
                                        @include ('hiraloa::products.view.configurable-options')
                                    </div>
                                @else
                                    <input type="hidden" value="false" name="is_configurable">
                                @endif
                                <div class="sp-content">
                                    @include ('hiraloa::products.view.product-add')
                                </div>
                            </form>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="hiraola-product-tab_area-2 sp-product-tab_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="sp-product-tab_nav ">
                        <div class="product-tab">
                            <ul class="nav product-menu">
                                <li><a class="active" data-toggle="tab"
                                       href="#description"><span>{{ __('shop::app.products.description') }}</span></a>
                                </li>
                                <li><a data-toggle="tab"
                                       href="#specification"><span>{{ __('shop::app.products.specification') }}</span></a>
                                </li>
                                @inject ('reviewHelper', 'Webkul\Product\Helpers\Review')
                                <li><a data-toggle="tab" href="#reviews"><span>{{ __('shop::app.reviews.product-review-page-title') }} ({{$reviewHelper->getTotalReviews($product)}})</span></a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content hiraola-tab_content">
                            <div id="description" class="tab-pane active show" role="tabpanel">
                                <div class="product-description">
                                    {!! view_render_event('bagisto.shop.products.view.description.before', ['product' => $product]) !!}
                                    {!! $product->description !!}
                                    {!! view_render_event('bagisto.shop.products.view.description.before', ['product' => $product]) !!}
                                </div>
                            </div>
                            <div id="specification" class="tab-pane" role="tabpanel">
                                @include ('hiraloa::products.view.attributes')
                            </div>
                            <div id="reviews" class="tab-pane" role="tabpanel">
                                <div class="tab-pane active" id="tab-review">
                                    @include ('hiraloa::products.view.reviews')
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="py-3">
        @include ('hiraloa::products.view.related-products')
    </div>
    <div class="py-3">

        @include ('hiraloa::products.view.up-sells')
    </div>

    {!! view_render_event('bagisto.shop.products.view.after', ['product' => $product]) !!}

    @push('scripts')
        <script>
            function updateQunatity(operation) {
                e.preventDefault();
                console.log(1);
                var quantity = document.getElementById('quantity').value;

                if (operation == 'add') {
                    quantity = parseInt(quantity) + 1;
                } else if (operation == 'remove') {
                    if (quantity > 1) {
                        quantity = parseInt(quantity) - 1;
                    } else {
                        alert('{{ __('shop::app.products.less-quantity') }}');
                    }
                }
                document.getElementById("quantity").value = quantity;

            }
        </script>
    @endpush
@endsection

