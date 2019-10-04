@extends('hiraloa::layouts.master')

@section('page_title')
    {{ $category->meta_title ?? $category->name }}
@stop

@section('seo')
    <meta name="description" content="{{ $category->meta_description }}"/>
    <meta name="keywords" content="{{ $category->meta_keywords }}"/>
@stop

@section('content-wrapper')
    @inject ('productRepository', 'Webkul\Product\Repositories\ProductRepository')

    <div class="main">
        {!! view_render_event('bagisto.shop.products.index.before', ['category' => $category]) !!}

        <div class="category-container">

            @if (in_array($category->display_mode, [null, 'products_only', 'products_and_description']))
                @include ('hiraloa::products.list.layered-navigation')
            @endif

            <div class="category-block" @if ($category->display_mode == 'description_only') style="width: 100%" @endif>
                <div class="hero-image mb-35">
                    @if (!is_null($category->image))
                        <img class="logo" src="{{ $category->image_url }}" />
                    @endif
                </div>

                @if (in_array($category->display_mode, [null, 'description_only', 'products_and_description']))
                    @if ($category->description)
                        <div class="breadcrumb-area">
                            <div class="container">
                            {!! $category->description !!}
                            </div>
                        </div>
                    @endif
                @endif

                @if (in_array($category->display_mode, [null, 'products_only', 'products_and_description']))
                    <?php $products = $productRepository->getAll($category->id); ?>

                    @if ($products->count())
                        <!-- Begin Hiraola's Content Wrapper Area -->
                            <div class="hiraola-content_wrapper">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-3 order-2 order-lg-2">
                                            @include ('hiraloa::products.list.layered-navigation')

                                        </div>
                                        <div class="col-lg-12 order-1 order-lg-1">
                                            @include ('hiraloa::products.list.toolbar')
                                            <div class="shop-product-wrap grid gridview-4 row">

                                            @foreach ($products as $productFlat)
                                                    <div class="col-lg-3">
                                                @include ('hiraloa::products.list.card', ['product' => $productFlat])
                                                    </div>
                                            @endforeach
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Hiraola's Content Wrapper Area End Here -->



                        @inject ('toolbarHelper', 'Webkul\Product\Helpers\Toolbar')


                        {!! view_render_event('bagisto.shop.products.index.pagination.before', ['category' => $category]) !!}


                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="hiraola-paginatoin-area">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                {{ $products->appends(request()->input())->links() }}

                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <div class="product-select-box">
                                                    <div class="product-short">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        {!! view_render_event('bagisto.shop.products.index.pagination.after', ['category' => $category]) !!}

                    @else
                        <!-- Begin Hiraola's Error 404 Page Area -->
                            <div class="error404-area">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-8 ml-auto mr-auto text-center">
                                            <div class="search-error-wrapper">
                                                <h2>{{ __('shop::app.products.whoops') }}</h2>
                                                <p class="short_desc">{{ __('shop::app.products.empty') }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Hiraola's Error 404 Page End Here -->


                    @endif
                @endif
            </div>
        </div>

        {!! view_render_event('bagisto.shop.products.index.after', ['category' => $category]) !!}
    </div>
@stop

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.responsive-layred-filter').css('display','none');
            $(".sort-icon, .filter-icon").on('click', function(e){
                var currentElement = $(e.currentTarget);
                if (currentElement.hasClass('sort-icon')) {
                    currentElement.removeClass('sort-icon');
                    currentElement.addClass('icon-menu-close-adj');
                    currentElement.next().removeClass();
                    currentElement.next().addClass('icon filter-icon');
                    $('.responsive-layred-filter').css('display','none');
                    $('.pager').css('display','flex');
                    $('.pager').css('justify-content','space-between');
                } else if (currentElement.hasClass('filter-icon')) {
                    currentElement.removeClass('filter-icon');
                    currentElement.addClass('icon-menu-close-adj');
                    currentElement.prev().removeClass();
                    currentElement.prev().addClass('icon sort-icon');
                    $('.pager').css('display','none');
                    $('.responsive-layred-filter').css('display','block');
                    $('.responsive-layred-filter').css('margin-top','10px');
                } else {
                    currentElement.removeClass('icon-menu-close-adj');
                    $('.responsive-layred-filter').css('display','none');
                    $('.pager').css('display','none');
                    if ($(this).index() == 0) {
                        currentElement.addClass('sort-icon');
                    } else {
                        currentElement.addClass('filter-icon');
                    }
                }
            });
        });
    </script>
@endpush