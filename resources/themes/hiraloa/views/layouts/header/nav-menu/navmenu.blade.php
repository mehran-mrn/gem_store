{!! view_render_event('bagisto.shop.layout.header.category.before') !!}
<?php
$categories = [];
foreach (app('Webkul\Category\Repositories\CategoryRepository')->getVisibleCategoryTree(core()->getCurrentChannel()->root_category_id) as $category) {
    if ($category->slug)
        array_push($categories, $category);
}
?>

<div class="header-bottom_area header-sticky stick pr-3 pl-3 pt-3 pb-2" style="background-color: #003765d9!important;">
    <div class="">
        <div class="row">
            <div class="col-md-4 col-sm-4 d-lg-none d-block">
                <div class="header-logo">
                    <a href="{{ route('shop.home.index') }}">
                        @if ($logo = core()->getCurrentChannel()->logo_url)
                            <img class="w-50" alt="cubicjewelry.ir" src="{{ $logo }}"/>
                        @else
                            <img class="w-50" alt="cubicjewelry.ir" src="{{ bagisto_asset('images/logo.svg') }}"/>
                        @endif
                    </a>

                </div>
            </div>
            <div class="col-lg-9 d-none d-lg-block position-static">
                <div class="main-menu_area">
                    <nav>
                        <ul>
                            <li><a href="/">صفحه اصلی</a></li>
                            @foreach($categories as $category)
                                <li style="padding-left: 30px!important;"><a style="font-size: 16px!important;" href="{{ route('shop.categories.index', $category->slug) }}">{{$category->translations->where('locale',core()->getCurrentLocale()->code)->first()->name}}</a>
                                @if(count($category->children)>0)
                                        <ul class="hm-dropdown hm-sub_dropdown">
                                        @include("hiraloa::layouts.header.nav-menu.foreach_navmenu",["categories"=>$category])
                                        </ul>
                                @endif
                            @endforeach
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="col-lg-3 col-md-8 col-sm-8">
                <div class="header-right_area">
                    <ul>
                        <li>
                            <a href="#" onclick="open_mini_cart('mobileMenu')"
                               class="mobile-menu_btn toolbar-btn color--white d-lg-none d-block">
                                <i class="ion-navicon"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" onclick="open_mini_cart('accountCart')" class="minicart-btn toolbar-btn">
                                <i class="ion-ios-person-outline"></i>
                            </a>
                        </li>

                        <li>
                            <a href="#" onclick="open_mini_cart('miniCart')" class="minicart-btn toolbar-btn">
                                @inject ('productImageHelper', 'Webkul\Product\Helpers\ProductImage')

                                <?php $cart = cart()->getCart(); ?>

                            @if($cart and $cart->items)
                                    <span class="badge badge-danger ">{{ $cart->items->count() }}</span>
                                @endif
                                <i class="ion-bag"></i>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="mobile-menu_wrapper" id="mobileMenu">
    <div class="offcanvas-menu-inner"
         style="background-image: url({{url('themes/hiraloa/assets/images/cubes.png')}});">
        <div class="container">
            <a href="#" class="btn-close" onclick="close_mini_cart('mobileMenu')"><i class="ion-android-close"></i></a>
            <div class="offcanvas-inner_search">
                <form action="#" class="hm-searchbox">
                    <input type="text" placeholder="{{__('shop::app.header.search-text')}}">
                    <button class="search_btn" type="submit"><i class="ion-ios-search-strong"></i></button>
                </form>
            </div>
            <nav class="offcanvas-navigation">
                <ul class="mobile-menu">
                    @foreach($categories as $category)
                        <li class="{{count($category->children)>0?"menu-item-has-children":""}}"><a href="{{ route('shop.categories.index', $category->slug) }}">{{$category->translations->where('locale',core()->getCurrentLocale()->code)->first()->name}}</a>
                            @if(count($category->children)>0)
                                <ul class="sub-menu">
                                    @include("hiraloa::layouts.header.nav-menu.foreach_navmenu",["categories"=>$category])
                                </ul>
                        @endif
                    @endforeach
                </ul>
            </nav>
        </div>
    </div>
</div>
<div class="offcanvas-minicart_wrapper" id="accountCart">


    <div class="offcanvas-menu-inner"
         style="background-image: url({{url('themes/hiraloa/assets/images/cubes.png')}});">
        <a href="#" class="btn-close" onclick="close_mini_cart('accountCart')"><i class="ion-android-close"></i></a>
        {!! view_render_event('bagisto.shop.layout.header.account-item.before') !!}
        <div class="minicart-heading">
            <h4>{{__('shop::app.layouts.my-account')}}</h4>
        </div>
        <ul class="minicart-list">


            @guest('customer')


                <li class="p-2">
                    <a  href="{{ route('customer.session.index') }}">{{ __('shop::app.header.sign-in') }}</a>
                </li>
                <li class="p-2">
                    <a  href="{{ route('customer.register.index') }}">{{ __('shop::app.header.sign-up') }}</a>
                </li>

            @endguest

            @auth('customer')
                <li class=""><a
                            href="{{ route('customer.profile.index') }}">{{ __('shop::app.header.profile') }}</a>
                </li>
                <li>
                    <a href="{{ route('customer.wishlist.index') }}">{{ __('shop::app.header.wishlist') }}</a>
                </li>

                <li>
                    <a href="{{ route('shop.checkout.cart.index') }}">{{ __('shop::app.header.cart') }}</a>
                </li>

                <li>
                    <a href="{{ route('customer.session.destroy') }}">{{ __('shop::app.header.logout') }}</a>
                </li>

            @endauth
        </ul>
        {!! view_render_event('bagisto.shop.layout.header.account-item.after') !!}

    </div>
</div>

<div class="offcanvas-minicart_wrapper" id="miniCart">

    <div class="offcanvas-menu-inner"
         style="background-image: url({{url('themes/hiraloa/assets/images/cubes.png')}});">

        <a href="#" class="btn-close" onclick="close_mini_cart('miniCart')"><i class="ion-android-close"></i></a>
        {!! view_render_event('bagisto.shop.layout.header.cart-item.before') !!}
        @include('hiraloa::checkout.cart.mini-cart')
        {!! view_render_event('bagisto.shop.layout.header.cart-item.after') !!}


    </div>
</div>
{!! view_render_event('bagisto.shop.layout.header.category.after') !!}

@push('scripts')
    <script >
        function open_mini_cart(id) {
            var element = document.getElementById(id);
            $('.offcanvas-minicart_wrapper').removeClass('open');
            element.classList.add("open");

        }
        function close_mini_cart(id) {
            var element = document.getElementById(id);
            $('.offcanvas-minicart_wrapper').removeClass('open');
            element.classList.remove("open");

        }
    </script>
<script type="text/x-template" id="category-nav-template">

    <ul class="nav">
        <category-item
            v-for="(item, index) in items"
            :key="index"
            :url="url"
            :item="item"
            :parent="index">
        </category-item>
    </ul>

</script>
<script>
    Vue.component('category-nav', {

        template: '#category-nav-template',

        props: {
            categories: {
                type: [Array, String, Object],
                required: false,
                default: (function () {
                    return [];
                })
            },

            url: String
        },

        data: function(){
            return {
                items_count:0
            };
        },

        computed: {
            items: function() {
                return JSON.parse(this.categories)
            }
        },
    });
</script>
<script type="text/x-template" id="category-item-template">
    <li>
        <a :href="url+'/categories/'+this.item['translations'][0].slug">
            @{{ name }}&emsp;
            <i class="icon dropdown-right-icon" v-if="haveChildren && item.parent_id != null"></i>
        </a>

        <i :class="[show ? 'icon icon-arrow-down mt-15' : 'icon dropdown-right-icon left mt-15']"
        v-if="haveChildren"  @click="showOrHide"></i>

        <ul v-if="haveChildren && show">
            <category-item
                v-for="(child, index) in item.children"
                :key="index"
                :url="url"
                :item="child">
            </category-item>
        </ul>
    </li>
</script>
<script>
    Vue.component('category-item', {

        template: '#category-item-template',

        props: {
            item:  Object,
            url: String,
        },

        data: function() {
            return {
                items_count:0,
                show: false,
            };
        },

        mounted: function() {
            if(window.innerWidth > 770){
                this.show = true;
            }
        },

        computed: {
            haveChildren: function() {
                return this.item.children.length ? true : false;
            },

            name: function() {
                if (this.item.translations && this.item.translations.length) {
                    this.item.translations.forEach(function(translation) {
                        if (translation.locale == document.documentElement.lang)
                            return translation.name;
                    });
                }

                return this.item.name;
            }
        },

        methods: {
            showOrHide: function() {
                this.show = !this.show;
            }
        }
    });
</script>
@endpush