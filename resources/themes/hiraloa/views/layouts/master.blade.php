<!DOCTYPE html>
<html class="no-js" lang="{{ app()->getLocale() }}">

<head>

    <title>@yield('page_title')</title>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="content-language" content="{{ app()->getLocale() }}">
    @if ($favicon = core()->getCurrentChannel()->favicon_url)
        <link rel="shortcut icon" sizes="16x16" href="{{ $favicon }}"/>
    @else
        <link rel="shortcut icon" sizes="16x16" href="{{ bagisto_asset('images/favicon.ico') }}"/>
    @endif

    <link rel="stylesheet" href="{{url('themes/hiraloa/assets/css/vendor/bootstrapRTL.css')}}">
    {{--    <link rel="stylesheet" href="{{url('themes/hiraloa/assets/css/vendor/bootstrap.min.css')}}">--}}
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
    <link rel="stylesheet" href="{{url('themes/hiraloa/assets/css/styleRTL.css')}}?i=6">
    <link rel="stylesheet" href="{{url('themes/hiraloa/assets/css/fonts.css')}}">
    <style>
        .product-img a img{
            /*object-fit: none;*/
        }
    </style>
    <!--<link rel="stylesheet" href="assets/css/style.min.css">-->
    <!--
    <script src="assets/js/vendor/vendor.min.js"></script>
    <script src="assets/js/plugins/plugins.min.js"></script>
    -->


    <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <meta name="description" content="فروشگاه آنلاین محصولات سواروسکی در ایران به طور مستقیم"/>
    <meta name="keywords" content="swarovski,سواروسکی,انگشتر,حلقه,نگین,کریستال"/>
    <meta name="author" content="Mehran Marandi - m.marandi@gmail.com"/>
    <meta name="author" content="Milad Kardgar - mk.kardgar@gmail.com"/>
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="https://mycubic.ir"/>
    <meta name="copyright" content="کلیه حقوق این وب سایت متعلق به سایت mycubic می باشد">
    <meta name="language" content="fa">
    <meta name="google" content="notranslate">
    <meta name="robots" content="index follow">
    <meta name="googlebot" content="index follow">
    <!--        <meta name="samandehi" content="712692104"/>-->
    <meta property="og:title" content="فروشگاه آنلاین نگین های سواروسکی"/>
    <meta property="og:type" content="website"/>
    <meta property="og:url" content="https://mycubic.ir"/>
    <meta property="og:image" content="{{asset(url('/public/favico.ico'))}}"/>
    <meta property="og:site_name" content="فروشگاه آنلاین نگین های سواروسکی"/>
    <meta property="og:description" content="فروشگاه آنلاین محصولات سواروسکی در ایران به طور مستقیم"/>

    <meta name="twitter:card" content="summary"/>
    <meta name="twitter:description" content="فروشگاه آنلاین محصولات سواروسکی در ایران به طور مستقیم"/>
    <meta name="twitter:title" content="فروشگاه آنلاین نگین های سواروسکی"/>
    <meta name="viewport" content="width=device-width">
    <meta name="google-site-verification" content="D7OWf7fGZ0rXlwfA5klkfxzFKa9lxevnDUwxL4NR3-I" />
    @yield('head')
    @section('seo')
        @if (! request()->is('/'))
            <meta name="description" content="{{ core()->getCurrentChannel()->description }}"/>
        @endif
    @show
    @stack('css')
    {!! view_render_event('bagisto.shop.layout.head') !!}
</head>

<body class="template-color-1 "
      style="scroll-behavior: smooth;direction: {{core()->getCurrentLocale()->direction}}">
{!! view_render_event('bagisto.shop.layout.body.before') !!}
<div class="main-wrapper" id="app">
    {{--        <div class="loading">--}}
    {{--            <div class="text-center middle">--}}
    {{--                <div class="lds-ellipsis">--}}
    {{--                    <div></div>--}}
    {{--                    <div></div>--}}
    {{--                    <div></div>--}}
    {{--                    <div></div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}


    {{--        <div class="popup_wrapper">--}}
    {{--            <div class="test">--}}
    {{--                <span class="popup_off"><i class="ion-android-close"></i></span>--}}
    {{--                <div class="subscribe_area text-center">--}}
    {{--                    <h2>Sign up for send newsletter?</h2>--}}
    {{--                    <p>Subscribe to our newsletters now and stay up-to-date with new collections, the latest lookbooks and exclusive offers.</p>--}}
    {{--                    <div class="subscribe-form-group">--}}
    {{--                        <form action="#">--}}
    {{--                            <input autocomplete="off" type="text" name="message" id="message" placeholder="Enter your email address">--}}
    {{--                            <button type="submit">subscribe</button>--}}
    {{--                        </form>--}}
    {{--                    </div>--}}
    {{--                    <div class="subscribe-bottom">--}}
    {{--                        <input type="checkbox" id="newsletter-permission">--}}
    {{--                        <label for="newsletter-permission">Don't show this popup again</label>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}

    {!! view_render_event('bagisto.shop.layout.header.before') !!}

    @include('hiraloa::layouts.header.index')

    {!! view_render_event('bagisto.shop.layout.header.after') !!}

    @yield('slider')

    <div class="content-container">

        {!! view_render_event('bagisto.shop.layout.content.before') !!}

        @yield('content-wrapper')

        {!! view_render_event('bagisto.shop.layout.content.after') !!}

    </div>


    {!! view_render_event('bagisto.shop.layout.footer.before') !!}

    @include('hiraloa::layouts.footer.footer')

    {!! view_render_event('bagisto.shop.layout.footer.after') !!}


</div>


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

<!--
<script src="assets/js/vendor/vendor.min.js"></script>
<script src="assets/js/plugins/plugins.min.js"></script>
-->
<script src="{{url('themes/hiraloa/assets/js/main.js')}}"></script>

{{--<script type="text/javascript" src="{{ asset('vendor/webkul/ui/assets/js/ui.js') }}"></script>--}}
<script src="{{ url('themes/hiraloa/assets/js/plugins/pnotify/PNotify.js') }}"></script>
<script>
    $(document).ready(function () {
        @if(!$errors->isEmpty())
        @foreach ($errors->all() as $key => $error)
        PNotify.error({
            title: '{{$key}}',
            text: '{{ $error }}',
            delay: 5000,
        });
        @endforeach
        @endif
        @if ($message = Session::get('success'))
        PNotify.success({
            text: '{{$message}}',
            delay: 3000,
        });
        @endif
        {{Session::forget('success')}}
        @if ($message = Session::get('warning'))
        PNotify.error({
            text: '{{$message}}',
            delay: 3000,
        });
        @endif
        {{Session::forget('warning')}}
    });
</script>


<script type="text/javascript">
    window.flashMessages = [];

    @if ($success = session('success'))
        window.flashMessages = [{'type': 'alert-success', 'message': "{{ $success }}"}];
    @elseif ($warning = session('warning'))
        window.flashMessages = [{'type': 'alert-warning', 'message': "{{ $warning }}"}];
    @elseif ($error = session('error'))
        window.flashMessages = [{'type': 'alert-error', 'message': "{{ $error }}"}
    ];
    @elseif ($info = session('info'))
        window.flashMessages = [{'type': 'alert-info', 'message': "{{ $info }}"}
    ];
    @endif

        window.serverErrors = [];
    @if(isset($errors))
            @if (count($errors))
        window.serverErrors = @json($errors->getMessages());
    @endif
    @endif
</script>

{{--<script src="https://unpkg.com/vue" ></script>--}}
{{--<script type="text/javascript" src="{{ url('/themes/default/assets/js/shop.js') }}"></script>--}}

@stack('scripts')
{!! view_render_event('bagisto.shop.layout.body.after') !!}
</body>
</html>