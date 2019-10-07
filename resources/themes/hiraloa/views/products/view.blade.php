@extends('hiraloa::layouts.master')

@section('page_title')
    {{ trim($product->meta_title) != "" ? $product->meta_title : $product->name }}
@stop

@section('seo')
    <meta name="description" content="{{ trim($product->meta_description) != "" ? $product->meta_description : str_limit(strip_tags($product->description), 120, '') }}"/>
    <meta name="keywords" content="{{ $product->meta_keywords }}"/>
@stop

@section('content-wrapper')

    {!! view_render_event('bagisto.shop.products.view.before', ['product' => $product]) !!}
    <!-- Begin Hiraola's Single Product Area -->
    <section class="product-detail">

    <div class="sp-area">
        <div class="container">
            <div class="sp-nav">
                <form method="POST" id="product-form" action="{{ route('cart.add', $product->product_id) }}" @click="onSubmit($event)">
                <div class="form-container row">

                    @csrf()

                    <input type="hidden" name="product" value="{{ $product->product_id }}">

                    {{--    <product-gallery></product-gallery>--}}
                    <div class="col-lg-6 col-md-6">
                        @include ('hiraloa::products.view.gallery')

                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="sp-heading">
                            <h5>{{ $product->name }}</h5>
                        </div>

                        {!! view_render_event('bagisto.shop.products.view.short_description.before', ['product' => $product]) !!}
                        <span class="reference">{!! $product->short_description !!}</span>
                        {!! view_render_event('bagisto.shop.products.view.short_description.after', ['product' => $product]) !!}

                        <div class="rating-box">
                            @include ('hiraloa::products.review', ['product' => $product])

                        </div>
                        <div class="sp-essential_stuff">
                            <ul>
                                <li>@include ('hiraloa::products.price', ['product' => $product])</li>
                                <li>@include ('hiraloa::products.view.stock', ['product' => $product])</li>
                            </ul>
                        </div>
                        <div class="quantity" :class="[errors.has('quantity') ? 'has-error' : '']">
                            {!! view_render_event('bagisto.shop.products.view.quantity.before', ['product' => $product]) !!}

                            <label class="required">{{ __('shop::app.products.quantity') }}</label>
                            <div class="cart-plus-minus">
                                <input name="quantity" id="quantity" class="cart-plus-minus-box" value="1" v-validate="'required|numeric|min_value:1'" data-vv-as="&quot;{{ __('shop::app.products.quantity') }}&quot;" type="text">
                                <div class="dec qtybutton" onclick="updateQunatity('remove')"><i class="fa fa-angle-down"></i></div>
                                <div class="inc qtybutton" onclick=updateQunatity('add')><i class="fa fa-angle-up"></i></div>
                            </div>

                            {!! view_render_event('bagisto.shop.products.view.quantity.after', ['product' => $product]) !!}

                        </div>
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

                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    </section>
    <!-- Hiraola's Single Product Area End Here -->


    <!-- Begin Hiraola's Single Product Tab Area -->
    <div class="hiraola-product-tab_area-2 sp-product-tab_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="sp-product-tab_nav ">
                        <div class="product-tab">
                            <ul class="nav product-menu">
                                <li><a class="active" data-toggle="tab" href="#description"><span>{{ __('shop::app.products.description') }}</span></a>
                                </li>
                                <li><a data-toggle="tab" href="#specification"><span>Specification</span></a></li>
                                @inject ('reviewHelper', 'Webkul\Product\Helpers\Review')
                                <li><a data-toggle="tab" href="#reviews"><span>Reviews ({{$reviewHelper->getTotalReviews($product)}})</span></a></li>
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
    <!-- Hiraola's Single Product Tab Area End Here -->

    @include ('hiraloa::products.view.related-products')

    @include ('hiraloa::products.view.up-sells')


    {!! view_render_event('bagisto.shop.products.view.after', ['product' => $product]) !!}
@endsection

@push('scripts')

    <script type="text/x-template" id="product-view-template">
        <form method="POST" id="product-form" action="{{ route('cart.add', $product->product_id) }}" @click="onSubmit($event)">

            <slot></slot>

        </form>
    </script>

    <script>

        Vue.component('product-view', {

            template: '#product-view-template',

            inject: ['$validator'],

            methods: {
                onSubmit: function(e) {
                    if (e.target.getAttribute('type') != 'submit')
                        return;

                    e.preventDefault();

                    this.$validator.validateAll().then(function (result) {
                        if (result) {
                          if (e.target.getAttribute('data-href')) {
                            window.location.href = e.target.getAttribute('data-href');
                          } else {
                            document.getElementById('product-form').submit();
                          }
                        }
                    });
                }
            }
        });

        $(document).ready(function() {
            var addTOButton = document.getElementsByClassName('add-to-buttons')[0];
            document.getElementById('loader').style.display="none";
            addTOButton.style.display="flex";
        });

        window.onload = function() {
            var thumbList = document.getElementsByClassName('thumb-list')[0];
            var thumbFrame = document.getElementsByClassName('thumb-frame');
            var productHeroImage = document.getElementsByClassName('product-hero-image')[0];

            if (thumbList && productHeroImage) {

                for(let i=0; i < thumbFrame.length ; i++) {
                    thumbFrame[i].style.height = (productHeroImage.offsetHeight/4) + "px";
                    thumbFrame[i].style.width = (productHeroImage.offsetHeight/4)+ "px";
                }

                if (screen.width > 720) {
                    thumbList.style.width = (productHeroImage.offsetHeight/4) + "px";
                    thumbList.style.minWidth = (productHeroImage.offsetHeight/4) + "px";
                    thumbList.style.height = productHeroImage.offsetHeight + "px";
                }
            }

            window.onresize = function() {
                if (thumbList && productHeroImage) {

                    for(let i=0; i < thumbFrame.length; i++) {
                        thumbFrame[i].style.height = (productHeroImage.offsetHeight/4) + "px";
                        thumbFrame[i].style.width = (productHeroImage.offsetHeight/4)+ "px";
                    }

                    if (screen.width > 720) {
                        thumbList.style.width = (productHeroImage.offsetHeight/4) + "px";
                        thumbList.style.minWidth = (productHeroImage.offsetHeight/4) + "px";
                        thumbList.style.height = productHeroImage.offsetHeight + "px";
                    }
                }
            }
        };

        function updateQunatity(operation) {
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

            event.preventDefault();
        }
    </script>
@endpush