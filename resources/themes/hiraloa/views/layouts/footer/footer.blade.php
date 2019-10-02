<!-- Begin Hiraola's Footer Area -->
<div class="hiraola-footer_area">
    <div class="footer-top_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="footer-widgets_info row">
                        {!! DbView::make(core()->getCurrentChannel())->field('footer_content')->render() !!}



                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="footer-widgets_area">
                        <div class="row">
                            <div class="col-lg-5">
                                <?php
                                $categories = [];

                                foreach (app('Webkul\Category\Repositories\CategoryRepository')->getVisibleCategoryTree(core()->getCurrentChannel()->root_category_id) as $category){
                                    if ($category->slug)
                                        array_push($categories, $category);
                                }
                                ?>


                                    @if (count($categories))

                                    <div class="footer-widgets_title">
                                    <h6>Product</h6>
                                </div>
                                    <div class="footer-widgets">
                                    <ul>

                                        @foreach ($categories as $key => $category)
                                            <li>
                                                <a href="{{ route('shop.categories.index', $category->slug) }}">{{ $category->name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                    @endif

                            </div>

                            <div class="col-lg-7">
                                @if(core()->getConfigData('customer.settings.newsletter.subscription'))
                                <div class="instagram-container footer-widgets_area">
                                    <div class="footer-widgets_title">
                                        <h6>{{ __('shop::app.footer.subscribe-newsletter') }}</h6>
                                    </div>
                                    <div class="widget-short_desc">
                                        <p>Subscribe to our newsletters now and stay up-to-date with new collections</p>
                                    </div>
                                    <div class="newsletter-form_wrap">
                                        <form action="{{ route('shop.subscribe') }}"  id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" required class="newsletters-form validate"  >
                                            <div id="mc_embed_signup_scroll" :class="[errors.has('subscriber_email') ? 'has-error' : '']">
                                                <div id="mc-form" class="mc-form subscribe-form">
                                                    <input  name="subscriber_email" id="mc-email" class="newsletter-input" type="email" autocomplete="off" placeholder="Enter your email" />
                                                    <button class="newsletter-btn" id="mc-submit">
                                                        <i class="ion-android-mail" aria-hidden="true"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom_area">
        <div class="container">
            <div class="footer-bottom_nav">
                <div class="row">

                    <div class="col-lg-12">
                        <div class="copyright">
                            <p>
                                @if (core()->getConfigData('general.content.footer.footer_content'))
                                    {{ core()->getConfigData('general.content.footer.footer_content') }}
                                @else
                                    {{ trans('admin::app.footer.copy-right') }}
                                @endif
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Hiraola's Footer Area End Here -->
<!-- Begin Hiraola's Modal Area -->
<div class="modal fade modal-wrapper" id="exampleModalCenter">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal-inner-area sp-area row">
                    <div class="col-lg-5 col-md-5">
                        <div class="sp-img_area">
                            <div class="sp-img_slider-2 slick-img-slider hiraola-slick-slider arrow-type-two" data-slick-options='{
                                                        "slidesToShow": 1,
                                                        "arrows": false,
                                                        "fade": true,
                                                        "draggable": false,
                                                        "swipe": false,
                                                        "asNavFor": ".sp-img_slider-nav"
                                                        }'>
                                <div class="single-slide red">
                                    <img src="assets/images/single-product/large-size/1.jpg" alt="Hiraola's Product Image">
                                </div>
                                <div class="single-slide orange">
                                    <img src="assets/images/single-product/large-size/2.jpg" alt="Hiraola's Product Image">
                                </div>
                                <div class="single-slide brown">
                                    <img src="assets/images/single-product/large-size/3.jpg" alt="Hiraola's Product Image">
                                </div>
                                <div class="single-slide umber">
                                    <img src="assets/images/single-product/large-size/4.jpg" alt="Hiraola's Product Image">
                                </div>
                            </div>
                            <div class="sp-img_slider-nav slick-slider-nav hiraola-slick-slider arrow-type-two" data-slick-options='{
                                   "slidesToShow": 4,
                                    "asNavFor": ".sp-img_slider-2",
                                   "focusOnSelect": true
                                  }' data-slick-responsive='[
                                                        {"breakpoint":768, "settings": {"slidesToShow": 3}},
                                                        {"breakpoint":577, "settings": {"slidesToShow": 3}},
                                                        {"breakpoint":481, "settings": {"slidesToShow": 2}},
                                                        {"breakpoint":321, "settings": {"slidesToShow": 2}}
                                                    ]'>
                                <div class="single-slide red">
                                    <img src="{{asset('public/themes/hiraloa/assets/images/single-product/small-size/1.jpg')}}" alt="Hiraola's Product Thumnail">
                                </div>
                                <div class="single-slide orange">
                                    <img src="assets/images/single-product/small-size/2.jpg" alt="Hiraola's Product Thumnail">
                                </div>
                                <div class="single-slide brown">
                                    <img src="assets/images/single-product/small-size/3.jpg" alt="Hiraola's Product Thumnail">
                                </div>
                                <div class="single-slide umber">
                                    <img src="assets/images/single-product/small-size/4.jpg" alt="Hiraola's Product Thumnail">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-7 col-lg-6 col-md-6">
                        <div class="sp-content">
                            <div class="sp-heading">
                                <h5><a href="#">Light Inverted Pendant Quis Justo Condimentum</a></h5>
                            </div>
                            <div class="rating-box">
                                <ul>
                                    <li><i class="fa fa-star-of-david"></i></li>
                                    <li><i class="fa fa-star-of-david"></i></li>
                                    <li><i class="fa fa-star-of-david"></i></li>
                                    <li><i class="fa fa-star-of-david"></i></li>
                                    <li><i class="fa fa-star-of-david"></i></li>
                                </ul>
                            </div>
                            <div class="price-box">
                                <span class="new-price">£82.84</span>
                                <span class="old-price">£93.68</span>
                            </div>
                            <div class="essential_stuff">
                                <ul>
                                    <li>EX Tax:<span>£453.35</span></li>
                                    <li>Price in reward points:<span>400</span></li>
                                </ul>
                            </div>
                            <div class="list-item">
                                <ul>
                                    <li>10 or more £81.03</li>
                                    <li>20 or more £71.09</li>
                                    <li>30 or more £61.15</li>
                                </ul>
                            </div>
                            <div class="list-item last-child">
                                <ul>
                                    <li>Brand<a href="javascript:void(0)">Buxton</a></li>
                                    <li>Product Code: Product 15</li>
                                    <li>Reward Points: 100</li>
                                    <li>Availability: In Stock</li>
                                </ul>
                            </div>
                            <div class="color-list_area">
                                <div class="color-list_heading">
                                    <h4>Available Options</h4>
                                </div>
                                <span class="sub-title">Color</span>
                                <div class="color-list">
                                    <a href="javascript:void(0)" class="single-color active" data-swatch-color="red">
                                        <span class="bg-red_color"></span>
                                        <span class="color-text">Red (+£3.61)</span>
                                    </a>
                                    <a href="javascript:void(0)" class="single-color" data-swatch-color="orange">
                                        <span class="burnt-orange_color"></span>
                                        <span class="color-text">Orange (+£2.71)</span>
                                    </a>
                                    <a href="javascript:void(0)" class="single-color" data-swatch-color="brown">
                                        <span class="brown_color"></span>
                                        <span class="color-text">Brown (+£0.90)</span>
                                    </a>
                                    <a href="javascript:void(0)" class="single-color" data-swatch-color="umber">
                                        <span class="raw-umber_color"></span>
                                        <span class="color-text">Umber (+£1.81)</span>
                                    </a>
                                </div>
                            </div>
                            <div class="quantity">
                                <label>Quantity</label>
                                <div class="cart-plus-minus">
                                    <input class="cart-plus-minus-box" value="1" type="text">
                                    <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                    <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                </div>
                            </div>
                            <div class="hiraola-group_btn">
                                <ul>
                                    <li><a href="cart.html" class="add-to_cart">Cart To Cart</a></li>
                                    <li><a href="cart.html"><i class="ion-android-favorite-outline"></i></a></li>
                                    <li><a href="cart.html"><i class="ion-ios-shuffle-strong"></i></a></li>
                                </ul>
                            </div>
                            <div class="hiraola-tag-line">
                                <h6>Tags:</h6>
                                <a href="javascript:void(0)">Ring</a>,
                                <a href="javascript:void(0)">Necklaces</a>,
                                <a href="javascript:void(0)">Braid</a>
                            </div>
                            <div class="hiraola-social_link">
                                <ul>
                                    <li class="facebook">
                                        <a href="https://www.facebook.com" data-toggle="tooltip" target="_blank" title="Facebook">
                                            <i class="fab fa-facebook"></i>
                                        </a>
                                    </li>
                                    <li class="twitter">
                                        <a href="https://twitter.com" data-toggle="tooltip" target="_blank" title="Twitter">
                                            <i class="fab fa-twitter-square"></i>
                                        </a>
                                    </li>
                                    <li class="youtube">
                                        <a href="https://www.youtube.com" data-toggle="tooltip" target="_blank" title="Youtube">
                                            <i class="fab fa-youtube"></i>
                                        </a>
                                    </li>
                                    <li class="google-plus">
                                        <a href="https://www.plus.google.com/discover" data-toggle="tooltip" target="_blank" title="Google Plus">
                                            <i class="fab fa-google-plus"></i>
                                        </a>
                                    </li>
                                    <li class="instagram">
                                        <a href="https://rss.com" data-toggle="tooltip" target="_blank" title="Instagram">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Hiraola's Modal Area End Here -->



