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
    {{--    <link rel="stylesheet" href="{{url('themes/hiraloa/assets/css/style.css')}}">--}}
    <link rel="stylesheet" href="{{url('themes/hiraloa/assets/css/styleRTL.css')}}">
    <link rel="stylesheet" href="{{url('themes/hiraloa/assets/css/fonts.css')}}">
    <!--<link rel="stylesheet" href="assets/css/style.min.css">-->
    <!--
    <script src="assets/js/vendor/vendor.min.js"></script>
    <script src="assets/js/plugins/plugins.min.js"></script>
    -->
    @yield('head')
    @section('seo')
        @if (! request()->is('/'))
            <meta name="description" content="{{ core()->getCurrentChannel()->description }}"/>
        @endif
    @show
    @stack('css')
    {!! view_render_event('bagisto.shop.layout.head') !!}
</head>

<body class="template-color-1 {{core()->getCurrentLocale()->direction}}"
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

{{--<script src="{{url('themes/hiraloa/assets/js/vendor/vendor.min.js')}}"></script>--}}
{{--<script src="{{url('themes/hiraloa/assets/js/plugins/plugins.min.js')}}"></script>--}}

<script src="{{url('themes/hiraloa/assets/js/main.js')}}"></script>

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

@stack('scripts')
{!! view_render_event('bagisto.shop.layout.body.after') !!}
</body>
</html>