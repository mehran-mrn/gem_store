<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>

    <title>@yield('page_title')</title>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="content-language" content="{{ app()->getLocale() }}">

    <link rel="stylesheet" href="{{ bagisto_asset('css/shop.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/custom/ui/assets/css/ui.css') }}">

    @if ($favicon = core()->getCurrentChannel()->favicon_url)
        <link rel="icon" sizes="16x16" href="{{ $favicon }}" />
    @else
        <link rel="icon" sizes="16x16" href="{{ bagisto_asset('images/favicon.ico') }}" />
    @endif

    @yield('head')

    @section('seo')
        @if (! request()->is('/'))
            <meta name="description" content="{{ core()->getCurrentChannel()->description }}"/>
        @endif
    @show

    @stack('css')
    <link rel="stylesheet" href="{{url('themes/hiraloa/assets/css/vendor/bootstrapRTL.css')}}">
    <link rel="stylesheet" href="{{url('themes/hiraloa/assets/css/vendor/font-awesome.css')}}">
    <link rel="stylesheet" href="{{url('themes/hiraloa/assets/css/vendor/fontawesome-stars.css')}}">
    <link rel="stylesheet" href="{{url('themes/hiraloa/assets/css/vendor/ion-fonts.css')}}">
    <link rel="stylesheet" href="{{url('themes/hiraloa/assets/css/plugins/slick.css')}}">
    <link rel="stylesheet" href="{{url('themes/hiraloa/assets/css/plugins/animate.css')}}">
    <link rel="stylesheet" href="{{url('themes/hiraloa/assets/css/plugins/jquery-ui.min.css')}}">
    <link rel="stylesheet" href="{{url('themes/hiraloa/assets/css/plugins/lightgallery.min.css')}}">
    <link rel="stylesheet" href="{{url('themes/hiraloa/assets/css/plugins/nice-select.css')}}">
    <link rel="stylesheet" href="{{url('themes/hiraloa/assets/css/plugins/pnotify/PNotifyBrightTheme.css')}}">
    {{--    <link rel="stylesheet" href="{{url('themes/hiraloa/assets/css/style.css')}}">--}}
    <link rel="stylesheet" href="{{url('themes/hiraloa/assets/css/styleRTL.css')}}?i=3">
    <link rel="stylesheet" href="{{url('themes/hiraloa/assets/css/fonts.css')}}">
    {!! view_render_event('bagisto.shop.layout.head') !!}

</head>


<body @if (core()->getCurrentLocale()->direction == 'rtl') class="rtl" @endif style="scroll-behavior: smooth;">

    {!! view_render_event('bagisto.shop.layout.body.before') !!}

    <div id="app">
        <flash-wrapper ref='flashes'></flash-wrapper>

        <div class="main-container-wrapper">

            {!! view_render_event('bagisto.shop.layout.header.before') !!}

            @include('shop::layouts.header.index')

            {!! view_render_event('bagisto.shop.layout.header.after') !!}

            @yield('slider')

            <div class="content-container">

                {!! view_render_event('bagisto.shop.layout.content.before') !!}

                @yield('content-wrapper')

                {!! view_render_event('bagisto.shop.layout.content.after') !!}

            </div>

        </div>

        {!! view_render_event('bagisto.shop.layout.footer.before') !!}

        @include('shop::layouts.footer.footer')

        {!! view_render_event('bagisto.shop.layout.footer.after') !!}

        <div class="footer-bottom">
            <p>
                @if (core()->getConfigData('general.content.footer.footer_content'))
                    {{ core()->getConfigData('general.content.footer.footer_content') }}
                @else
                    {{ trans('admin::app.footer.copy-right') }}
                @endif
            </p>
        </div>

    </div>

    <script type="text/javascript">
        window.flashMessages = [];

        @if ($success = session('success'))
            window.flashMessages = [{'type': 'alert-success', 'message': "{{ $success }}" }];
        @elseif ($warning = session('warning'))
            window.flashMessages = [{'type': 'alert-warning', 'message': "{{ $warning }}" }];
        @elseif ($error = session('error'))
            window.flashMessages = [{'type': 'alert-error', 'message': "{{ $error }}" }
            ];
        @elseif ($info = session('info'))
            window.flashMessages = [{'type': 'alert-info', 'message': "{{ $info }}" }
            ];
        @endif

        window.serverErrors = [];
        @if(isset($errors))
            @if (count($errors))
                window.serverErrors = @json($errors->getMessages());
            @endif
        @endif
    </script>




    <script type="text/javascript" src="{{ bagisto_asset('js/shop.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/webkul/ui/assets/js/ui.js') }}"></script>

    <script src="{{url('themes/hiraloa/assets/js/vendor/jquery-1.12.4.min.js')}}"></script>
    {{--    <script src="{{url('themes/hiraloa/assets/js/vendor/jquery-3.3.1.slim.min.js')}}"></script>--}}
    <script src="{{url('themes/hiraloa/assets/js/vendor/modernizr-2.8.3.min.js')}}"></script>
    <script src="{{url('themes/hiraloa/assets/js/vendor/popperRTL.min.js')}}"></script>
    {{--    <script src="{{url('themes/hiraloa/assets/js/vendor/popper.min.js')}}"></script>--}}
    {{--    <script src="{{url('themes/hiraloa/assets/js/vendor/bootstrap.min.js')}}"></script>--}}
    <script src="{{url('themes/hiraloa/assets/js/vendor/bootstrapRTL.min.js')}}"></script>
    <script src="{{url('themes/hiraloa/assets/js/plugins/slick.min.js')}}"></script>
    <script src="{{url('themes/hiraloa/assets/js/plugins/countdown.js')}}"></script>
    <script src="{{url('themes/hiraloa/assets/js/plugins/jquery.barrating.min.js')}}"></script>
    <script src="{{url('themes/hiraloa/assets/js/plugins/jquery.counterup.js')}}"></script>
    <script src="{{url('themes/hiraloa/assets/js/plugins/jquery.nice-select.js')}}"></script>
    <script src="{{url('themes/hiraloa/assets/js/plugins/jquery.sticky-sidebar.js')}}"></script>
    <script src="{{url('themes/hiraloa/assets/js/plugins/jquery-ui.min.js')}}"></script>
    <script src="{{url('themes/hiraloa/assets/js/plugins/jquery.ui.touch-punch.min.js')}}"></script>
    <script src="{{url('themes/hiraloa/assets/js/plugins/lightgallery.min.js')}}"></script>
    <script src="{{url('themes/hiraloa/assets/js/plugins/scroll-top.js')}}"></script>
    <script src="{{url('themes/hiraloa/assets/js/plugins/theia-sticky-sidebar.min.js')}}"></script>
    <script src="{{url('themes/hiraloa/assets/js/plugins/waypoints.min.js')}}"></script>
    <script src="{{url('themes/hiraloa/assets/js/plugins/instafeed.min.js')}}"></script>
    <script src="{{url('themes/hiraloa/assets/js/plugins/jquery.elevateZoom-3.0.8.min.js')}}"></script>
    <script>
        (function ($) {
            'use strict';
            /*-----------------------------
                Hiraola's Window When Loading
        ---------------------------------*/
            $(window).on('load', function () {
                var wind = $(window);
                /* ----------------------------------------------------------------
                    [ Preloader ]
        -----------------------------------------------------------------*/

                $('.loading').fadeOut(500);
            });
            /*----------------------------------------*/
            /* Hiraola's Newsletter Popup
        /*----------------------------------------*/
            setTimeout(function () {
                $('.popup_wrapper').css({
                    opacity: '1',
                    visibility: 'visible'
                });
                $('.popup_off').on('click', function () {
                    $('.popup_wrapper').fadeOut(500);
                });
            }, 2500);
            /*----------------------------------------*/
            /*  Hiraola's Sticky Menu Activation
        /*----------------------------------------*/
            $(window).on('scroll', function () {
                if ($(this).scrollTop() > 300) {
                    $('.header-sticky').addClass('sticky');
                } else {
                    $('.header-sticky').removeClass('sticky');
                }
            });
            /*----------------------------------------*/
            /*  Hiraola's Main Slider
        /*----------------------------------------*/
            $('.main-slider').slick({
                infinite: true,
                arrows: true,
                autoplay: true,
                fade: true,
                dots: true,
                autoplaySpeed: 7000,
                speed: 1000,
                adaptiveHeight: true,
                easing: 'ease-in-out',
                slidesToShow: 1,
                slidesToScroll: 1,
                rtl: true,
                prevArrow: '<button class="slick-prev"><i class="ion-ios-arrow-forward"></i></button>',
                nextArrow: '<button class="slick-next"><i class="ion-ios-arrow-back"></i></button>'
            });
        })(jQuery);
    </script>
    @stack('scripts')

    {!! view_render_event('bagisto.shop.layout.body.after') !!}

    <div class="modal-overlay"></div>

</body>

</html>