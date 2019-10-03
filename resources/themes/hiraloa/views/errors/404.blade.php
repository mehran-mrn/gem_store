@extends('hiraloa::layouts.master')

@section('page_title')
    {{ __('admin::app.error.404.page-title') }}
@stop
@section('content-wrapper')
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                <h2>Other</h2>
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li class="active">Error 404</li>
                </ul>asd
            </div>
        </div>
    </div>
    <div class="error404-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 ml-auto mr-auto text-center">
                    <div class="search-error-wrapper">
                        <h1>404</h1>
                        <h2>PAGE NOT BE FOUND</h2>
                        <p class="short_desc">Sorry but the page you are looking for does not exist, have been removed, name
                            changed or is temporarily unavailable.</p>
                        <form action="javascript:void(0)" class="error-form">
                            <div class="inner-error_form">
                                <input type="text" placeholder="Search..." class="error-input-text">
                                <button type="submit" class="error-search_btn"><i class="fa fa-search"></i></button>
                            </div>
                        </form>
                        <div class="hiraola-btn-ps_center"></div>
                        <a href="index.html" class="hiraola-error_btn">Back To Home Page</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="hiraola-footer_area">
        <div class="footer-top_area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="footer-widgets_info">

                            <div class="footer-widgets_logo">
                                <a href="#">
                                    <img src="assets/images/footer/logo/1.png" alt="Hiraola's Footer Logo">
                                </a>
                            </div>


                            <div class="widget-short_desc">
                                <p>We are a team of designers and developers that create high quality HTML Template & Woocommerce, Shopify Theme.
                                </p>
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
                    <div class="col-lg-8">
                        <div class="footer-widgets_area">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="footer-widgets_title">
                                        <h6>Product</h6>
                                    </div>
                                    <div class="footer-widgets">
                                        <ul>
                                            <li><a href="#">Prices drop</a></li>
                                            <li><a href="#">New products</a></li>
                                            <li><a href="#">Best sales</a></li>
                                            <li><a href="#">Contact us</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="footer-widgets_info">
                                        <div class="footer-widgets_title">
                                            <h6>About Us</h6>
                                        </div>
                                        <div class="widgets-essential_stuff">
                                            <ul>
                                                <li class="hiraola-address"><i class="ion-ios-location"></i><span>Address:</span> The Barn, Ullenhall, Henley
                                                    in
                                                    Arden B578 5CC, England</li>
                                                <li class="hiraola-phone"><i class="ion-ios-telephone"></i><span>Call Us:</span> <a href="tel://+123123321345">+123 321 345</a>
                                                </li>
                                                <li class="hiraola-email"><i class="ion-android-mail"></i><span>Email:</span> <a href="mailto://info@yourdomain.com">info@yourdomain.com</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="instagram-container footer-widgets_area">
                                        <div class="footer-widgets_title">
                                            <h6>Sign Up For Newslatter</h6>
                                        </div>
                                        <div class="widget-short_desc">
                                            <p>Subscribe to our newsletters now and stay up-to-date with new collections</p>
                                        </div>
                                        <div class="newsletter-form_wrap">
                                            <form action="http://devitems.us11.list-manage.com/subscribe/post?u=6bbb9b6f5827bd842d9640c82&amp;id=05d85f18ef" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="newsletters-form validate" target="_blank" novalidate>
                                                <div id="mc_embed_signup_scroll">
                                                    <div id="mc-form" class="mc-form subscribe-form">
                                                        <input id="mc-email" class="newsletter-input" type="email" autocomplete="off" placeholder="Enter your email" />
                                                        <button class="newsletter-btn" id="mc-submit">
                                                            <i class="ion-android-mail" aria-hidden="true"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
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
                            <div class="footer-links">
                                <ul>
                                    <li><a href="#">Online Shopping</a></li>
                                    <li><a href="#">Promotions</a></li>
                                    <li><a href="#">My Orders</a></li>
                                    <li><a href="#">Help</a></li>
                                    <li><a href="#">Customer Service</a></li>
                                    <li><a href="#">Support</a></li>
                                    <li><a href="#">Most Populars</a></li>
                                    <li><a href="#">New Arrivals</a></li>
                                    <li><a href="#">Special Products</a></li>
                                    <li><a href="#">Manufacturers</a></li>
                                    <li><a href="#">Our Stores</a></li>
                                    <li><a href="#">Shipping</a></li>
                                    <li><a href="#">Payments</a></li>
                                    <li><a href="#">Warantee</a></li>
                                    <li><a href="#">Refunds</a></li>
                                    <li><a href="#">Checkout</a></li>
                                    <li><a href="#">Discount</a></li>
                                    <li><a href="#">Refunds</a></li>
                                    <li><a href="#">Policy Shipping</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="payment">
                                <a href="#">
                                    <img src="assets/images/footer/payment/1.png" alt="Hiraola's Payment Method">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="copyright">
                                <span>Copyright &copy; 2019 <a href="#">Hiraola.</a> All rights reserved.</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>





    <div class="error-container" style="width: 100%; display: flex; justify-content: center;">

        <div class="wrapper" style="display: flex; height: 60vh; width: 100%;
            justify-content: start; align-items: center;">

            <div class="error-box"  style="width: 50%">

                <div class="error-title" style="font-size: 100px;color: #5E5E5E">
                    {{ __('admin::app.error.404.name') }}
                </div>

                <div class="error-messgae" style="font-size: 24px;color: #5E5E5E; margin-top: 40px">
                    {{ __('admin::app.error.404.title') }}
                </div>

                <div class="error-description" style="margin-top: 20px;margin-bottom: 20px;color: #242424">
                    {{ __('admin::app.error.404.message') }}
                </div>

                <a href="{{ route('shop.home.index') }}">
                    {{ __('admin::app.error.go-to-home') }}
                </a>

            </div>

            <div class="error-graphic icon-404" style="margin-left: 10% ;"></div>

        </div>

    </div>

@endsection