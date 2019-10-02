<div class="slider-with-category_menu">
    <div class="container-fluid">
        <div class="row">
            <div class="col grid-half order-md-2 order-lg-1">
                <div class="category-menu">
                    <div class="category-heading">
                        <h2 class="categories-toggle"><span>Shop by categories</span></h2>
                    </div>
                    <div id="cate-toggle" class="category-menu-list">
                        <?php

                        $categories = [];
                        foreach (app('Webkul\Category\Repositories\CategoryRepository')->getVisibleCategoryTree(core()->getCurrentChannel()->root_category_id) as $category) {
                            if ($category->slug)
                                array_push($categories, $category);
                        }
                        ?>

                        <ul>
                            @foreach($categories as $category)
                                @if(count($category->children)>1)
                                    <li class="right-menu"><a
                                                href="{{ route('shop.categories.index', $category->slug) }}">{{$category->translations->where('locale',core()->getCurrentLocale()->code)->first()->name}}</a>
                                        @if(count($category->children)>0)
                                            <ul class="cat-mega-menu">
                                                @include("hiraloa::layouts.header.nav-menu.foreach_navmenu",["categories"=>$category])
                                            </ul>
                                        @endif
                                    </li>
                                @else
                                    <li><a href="{{ route('shop.categories.index', $category->slug) }}">{{$category->translations->where('locale',core()->getCurrentLocale()->code)->first()->name}}</a></li>
                                @endif

                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col grid-full order-md-1 order-lg-2">
                <div class="hiraola-slider_area">
                    <div class="main-slider" dir="rtl">
                        @forelse($sliderData as $data)
                            <div class="single-slide animation-style-0{{random_int(1,2)}} bg-1"
                                 style="background-image:url('{{url()->to('/storage')."/".$data['path']}}')!important;">
                                <div class="container">
                                    <div class="slider-content">
                                        <h5><span>{{$data['title']}}</span></h5>
                                        <h3>{!!  $data['content']!!}</h3>
                                        <div class="hiraola-btn-ps_left slide-btn">
                                            {{--                                            <a class="hiraola-btn"--}}
                                            {{--                                               href="shop-left-sidebar.html">{{__('shop::app.home.shop')}}</a>--}}
                                        </div>
                                    </div>
                                    <div class="slider-progress"></div>
                                </div>
                            </div>
                        @empty
                            <div class="single-slide animation-style-02 bg-2">
                                <div class="container">
                                    <div class="slider-content">
                                        <h5><span>-10% Off</span> This Week</h5>
                                        <h2>Phantom4</h2>
                                        <h3>Pro+ Obsidian</h3>
                                        <h4>Starting at <span>£809.00</span></h4>
                                        <div class="hiraola-btn-ps_left slide-btn">
                                            <a class="hiraola-btn" href="shop-left-sidebar.html">Shopping Now</a>
                                        </div>
                                    </div>
                                    <div class="slider-progress"></div>
                                </div>
                            </div>
                            <div class="single-slide animation-style-02 bg-3">
                                <div class="container">
                                    <div class="slider-content">
                                        <h5><span>Black Friday</span> This Week</h5>
                                        <h2>Work Desk</h2>
                                        <h3>Surface Studio 2019</h3>
                                        <h4>Starting at <span>£1599.00</span></h4>
                                        <div class="hiraola-btn-ps_left slide-btn">
                                            <a class="hiraola-btn" href="shop-left-sidebar.html">Shopping Now</a>
                                        </div>
                                    </div>
                                    <div class="slider-progress"></div>
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
            <div class="col grid-half grid-md_half order-md-2 order-lg-3">
                <div class="banner-item img-hover_effect">
                    <a href="shop-left-sidebar.html">
                        <img class="img-full" src="assets/images/banner/1_1.jpg" alt="Hiraola's Banner">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

{{--<?php--}}
{{--$productUpSells = $product->up_sells()->get();--}}
{{--?>--}}
{{--<div class="hiraola-banner_area">--}}
{{--    <div class="container-fluid">--}}
{{--        <div class="row">--}}
{{--            @foreach ($productUpSells as $up_sell_product)--}}
{{--                {{dd($up_sell_product)}}--}}
{{--                <div class="col-lg-4">--}}
{{--                    <div class="banner-item img-hover_effect">--}}
{{--                        <a href="shop-left-sidebar.html">--}}
{{--                            <img class="img-full" src="assets/images/banner/1_2.jpg" alt="Hiraola's Banner">--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            @endforeach--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}