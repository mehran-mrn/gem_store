@extends('hiraloa::layouts.master')

@section('page_title')
    {{ __('shop::app.home.page-title') }}
@endsection

@php
    $channel = core()->getCurrentChannel();

    $homeSEO = $channel->home_seo;

    if (isset($homeSEO)) {
        $homeSEO = json_decode($channel->home_seo);

        $metaTitle = $homeSEO->meta_title;

        $metaDescription = $homeSEO->meta_description;

        $metaKeywords = $homeSEO->meta_keywords;
    }
@endphp

@section('head')

    @if (isset($homeSEO))
        @isset($metaTitle)
            <meta name="title" content="{{ $metaTitle }}"/>
        @endisset

        @isset($metaDescription)
            <meta name="description" content="{{ $metaDescription }}"/>
        @endisset

        @isset($metaKeywords)
            <meta name="keywords" content="{{ $metaKeywords }}"/>
        @endisset
    @endif
@endsection

@section('content-wrapper')
    {!! view_render_event('bagisto.shop.home.content.before') !!}
    {{--    {!! DbView::make($channel)->field('home_page_content')->with(['sliderData' => $sliderData])->render() !!}--}}

    {!!  $__env->make("shop::home.slider", array_except(get_defined_vars(), array('__data', '__path')))->render() !!}
    <div class="hiraola-banner_area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4">
                    <div class="banner-item img-hover_effect">
                        <a href="shop-left-sidebar.html">
                            <img class="img-full" src="{{asset(url('/themes/hiraloa/assets/images/banner/1_2.jpg'))}}"
                                 alt="Hiraola's Banner">
                        </a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="banner-item img-hover_effect">
                        <a href="shop-left-sidebar.html">
                            <img class="img-full" src="{{asset(url('/themes/hiraloa/assets/images/banner/1_3.jpg'))}}"
                                 alt="Hiraola's Banner">
                        </a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="banner-item img-hover_effect">
                        <a href="shop-left-sidebar.html">
                            <img class="img-full" src="{{asset(url('/themes/hiraloa/assets/images/banner/1_4.jpg'))}}"
                                 alt="Hiraola's Banner">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {!! $__env->make("shop::home.new-products", array_except(get_defined_vars(), array('__data', '__path')))->render()  !!}
    <div class="static-banner_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="static-banner-image"></div>
                    <div class="static-banner-content">
                        <p><span>-25% Off</span>This Week</p>
                        <h2>Featured Product</h2>
                        <h3>Meito Accessories 2019</h3>
                        <p class="schedule">
                            Starting at
                            <span> £1209.00</span>
                        </p>
                        <div class="hiraola-btn-ps_left">
                            <a href="shop-left-sidebar.html" class="hiraola-btn">Shopping Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {!!  $__env->make("shop::home.featured-products", array_except(get_defined_vars(), array('__data', '__path')))->render() !!}
    <div class="hiraola-banner_area-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="banner-item img-hover_effect">
                        <a href="shop-left-sidebar.html">
                            <img class="img-full" src="{{asset(url('/themes/hiraloa/assets/images/banner/1_5.jpg'))}}"
                                 alt="Hiraola's Banner">
                        </a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="banner-item img-hover_effect">
                        <a href="shop-left-sidebar.html">
                            <img class="img-full" src="{{asset(url('/themes/hiraloa/assets/images/banner/1_6.jpg'))}}"
                                 alt="Hiraola's Banner">
                        </a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="banner-item img-hover_effect">
                        <a href="shop-left-sidebar.html">
                            <img class="img-full" src="{{asset(url('/themes/hiraloa/assets/images/banner/1_5.jpg'))}}"
                                 alt="Hiraola's Banner">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>


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
                        <div class="hiraola-tab_title">
                            <h4>{{ __('shop::app.home.featured-products') }}</h4>
                        </div>
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
                                <div class="hiraola-product-tab_slider-3">
                                    @foreach (app('Webkul\Product\Repositories\ProductRepository',['featured'=>1])->getAll($category->id) as $productFlat)
                                        @include ('shop::products.list.card', ['product' => $productFlat])
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

    <div class="hiraola-shipping_area">
        <div class="container">
            <div class="shipping-nav">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="shipping-item">
                            <div class="shipping-icon">
                                <img src="{{asset(url('/themes/hiraloa/assets/images/shipping-icon/1.png'))}}" alt="Hiraola's Shipping Icon">
                            </div>
                            <div class="shipping-content">
                                <h6>ارسال رایگان</h6>
                                <p>تحویل در روز تایین شده</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="shipping-item">
                            <div class="shipping-icon">
                                <img src="{{asset(url('/themes/hiraloa/assets/images/shipping-icon/2.png'))}}" alt="Hiraola's Shipping Icon">
                            </div>
                            <div class="shipping-content">
                                <h6>تضمین بازگشت وجه</h6>
                                <p>100% برگشت وجه در صورت عدم رضایت</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="shipping-item">
                            <div class="shipping-icon">
                                <img src="{{asset(url('/themes/hiraloa/assets/images/shipping-icon/3.png'))}}" alt="Hiraola's Shipping Icon">
                            </div>
                            <div class="shipping-content">
                                <h6>تضمین اصل بودن کالا</h6>
                                <p>مقایسه محصول اصل و غیر اصل</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="shipping-item">
                            <div class="shipping-icon">
                                <img src="{{asset(url('/themes/hiraloa/assets/images/shipping-icon/4.png'))}}" alt="Hiraola's Shipping Icon">
                            </div>
                            <div class="shipping-content">
                                <h6>برنده بهترین جایزه سال</h6>
                                <p>جایزه سال جواهر در سال 2019</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{ view_render_event('bagisto.shop.home.content.after') }}

@endsection
