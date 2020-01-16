<!DOCTYPE HTML> <!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en-us"><![endif]--> <!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8 ie7" lang="en-us"><![endif]--> <!--[if IE 8]>
<html class="no-js lt-ie9 ie8" lang="en-us"><![endif]--> <!--[if gt IE 8]>
<html class="no-js ie9" lang="{{ app()->getLocale() }}"><![endif]-->
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8"/>
    <title>@yield('page_title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description"
          content="Oliver Weber Collection is an international jewellery company based in Austria. All pieces of jewellery are made with Swarovski® Crystals."/>
    <meta name="keywords" content="Oliver Weber Collection"/>
    <meta name="generator" content="PrestaShop"/>
    <meta name="robots" content="index,follow"/>
    <meta name="viewport" content="width=device-width, minimum-scale=0.25, maximum-scale=1.0, initial-scale=1.0"/>
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <meta property="og:locale" content="en_US"/>
    <meta property="og:locale" content="en_GB"/>
    <meta property="og:locale:alternate" content="it_IT"/>
    <meta property="og:locale:alternate" content="es_ES"/>
    <meta property="og:locale:alternate" content="de_DE"/>
    <meta property="og:locale:alternate" content="el_GR"/>
    <meta property="og:image" content="http://owshop.net/img/img-fb.png"/>
    <meta property="og:image:type" content="image/png"/>
    <meta property="og:image:width" content="300"/>
    <meta property="og:image:height" content="300"/>
    <link rel="icon" type="image/vnd.microsoft.icon" href="/img/favicon-2.ico?1574067679"/>
    <link rel="stylesheet"
          href="/public/themes/jewellery/assets/css/style.css"
          media="all"/>
    @if ($favicon = core()->getCurrentChannel()->favicon_url)
        <link rel="shortcut icon" sizes="16x16" href="{{ $favicon }}"/>
    @else
        <link rel="shortcut icon" sizes="16x16" href="{{ bagisto_asset('images/favicon.ico') }}"/>
    @endif
    <script type="text/javascript" data-keepinline>// Google Analytics Features
        var guaTrackingFeatures = {
            "sendLimit": 25,
            "anonymizeIp": 0,
            "enhancedLink": 0,
            "userIdFeature": 0,
            "remarketing": 0,
            "prodIdIndex": 1,
            "pageTypeIndex": 2,
            "totalValueIndex": 3,
            "merchantPrefix": "",
            "merchantSuffix": "",
            "merchantVariant": null,
            "crossDomainList": null,
            "cartAjax": 1,
            "userId": null,
            "token": "512b2c939c1836732155e6affcdb7724",
            "debug": 0,
            "orderLog": 0
        };
        var currencyIso = 'USD';
        var allowLinker = false;

        if (typeof guaTrackingFeatures === 'object') {

            (function (i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function () {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
                a = s.createElement(o),
                    m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');


            if (guaTrackingFeatures.crossDomainList) {
                allowLinker = true;
            }

            ga('create', 'UA-42046905-2', 'auto', {'allowLinker': allowLinker});

            // Initialize Enhanced Ecommerce
            ga('require', 'ec');
            // Set currency to GA
            ga('set', 'currencyCode', currencyIso);

            if (guaTrackingFeatures.remarketing) {
                // Enables the Display Features Tracking
                ga('require', 'displayfeatures');
            }

            if (guaTrackingFeatures.enhancedLink) {
                // Enables the Enhanced Linking Tracking
                ga('require', 'linkid');
            }

            if (guaTrackingFeatures.crossDomainList) {
                ga('require', 'linker');
                ga('linker:autoLink', guaTrackingFeatures.crossDomainList);
            }

            if (guaTrackingFeatures.anonymizeIp) {
                ga('set', 'anonymizeIp', true);
            }

            if (guaTrackingFeatures.userIdFeature && guaTrackingFeatures.userId) {
                // User-ID Tracking Feature.
                ga('set', 'userId', guaTrackingFeatures.userId);
            }
        }</script>
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Open+Sans:300,600&amp;subset=latin,latin-ext,cyrillic-ext"
          type="text/css" media="all"/>
    <!--[if IE 8]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script> <![endif]-->
    <noscript>
        <img height="1" width="1" style="display:none"
                   src="https://www.facebook.com/tr?id=289350344815899&ev=PageView&noscript=1"/></noscript>
</head>
<body id="index" class="index hide-left-column hide-right-column lang_en one-column"> <!--[if IE 8]>
<div style='clear:both;height:59px;padding:0 15px 0 15px;position:relative;z-index:10000;text-align:center;'><a
        href="//www.microsoft.com/windows/internet-explorer/default.aspx?ocid=ie6_countdown_bannercode"><img
        src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42"
        width="820"
        alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."/></a>
</div> <![endif]-->
<div id="page">
    {!! view_render_event('bagisto.shop.layout.header.before') !!}

    @include('jewellery::layouts.header.index')

    {!! view_render_event('bagisto.shop.layout.header.after') !!}

    <div class="content-container">

        {!! view_render_event('bagisto.shop.layout.content.before') !!}

        @yield('content-wrapper')

        {!! view_render_event('bagisto.shop.layout.content.after') !!}

    </div>


    <div class="columns-container">
        @yield('slider')


        <div id="columns" class="container">
            <div class="row">
                <div class="large-left col-sm-12">
                    <div class="row">
                        <div id="center_column" class="center_column col-xs-12 col-sm-12">
                            <ul id="home-page-tabs" class="nav nav-tabs clearfix">
                                <li class="blockbestsellers"><a data-toggle="tab" href="#blockbestsellers"
                                                                class="blockbestsellers">Best Sellers</a></li>
                            </ul>
                            <div class="tab-content">
                                <ul id="blockbestsellers" class="product_list grid row blockbestsellers tab-pane">
                                    <li class="ajax_block_product col-xs-12 col-sm-3 col-md-3 first-in-line first-item-of-tablet-line first-item-of-mobile-line">
                                        <div class="product-container" itemscope itemtype="http://schema.org/Product">
                                            <div class="left-block">
                                                <div class="product-image-container"><a class="product_img_link"
                                                                                        href="https://www.oliverweber.com/en/jewelry/1422-ohrstecker-edelweiss-rhod-crystal-9005617000673.html"
                                                                                        title="Post earring Edelweiss rhod. crystal"
                                                                                        itemprop="url"> <img
                                                                class="replace-2x img-responsive"
                                                                src="https://www.oliverweber.com/1420-tm_home_default/ohrstecker-edelweiss-rhod-crystal.jpg"
                                                                alt="Post earring Edelweiss rhod. crystal"
                                                                title="Post earring Edelweiss rhod. crystal"
                                                                itemprop="image"/> </a></div>
                                            </div>
                                            <div class="right-block"><h5 itemprop="name"><a class="product-name"
                                                                                            href="https://www.oliverweber.com/en/jewelry/1422-ohrstecker-edelweiss-rhod-crystal-9005617000673.html"
                                                                                            title="Post earring Edelweiss rhod. crystal"
                                                                                            itemprop="url"> <span
                                                                class="list-name">Post earring Edelweiss rhod. crystal</span>
                                                        <span class="grid-name">Post earring Edelweiss rhod. crystal</span>
                                                    </a></h5>
                                                <div itemprop="offers" itemscope itemtype="http://schema.org/Offer"
                                                     class="content_price"><span itemprop="price"
                                                                                 class="price product-price"> $66.00 </span>
                                                    <meta itemprop="priceCurrency" content="USD"/>
                                                </div>
                                                <p class="product-desc" itemprop="description"><span class="list-desc">Finished with Swarovski crystals, 2-year warranty, nickel-safe</span>
                                                </p>
                                                <div class="button-container"><a itemprop="url"
                                                                                 class="lnk_view btn btn-default"
                                                                                 href="https://www.oliverweber.com/en/jewelry/1422-ohrstecker-edelweiss-rhod-crystal-9005617000673.html"
                                                                                 title="View"> <span>Show Details</span>
                                                    </a></div>
                                                <div class="product-flags"></div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="ajax_block_product col-xs-12 col-sm-3 col-md-3 last-item-of-mobile-line">
                                        <div class="product-container" itemscope itemtype="http://schema.org/Product">
                                            <div class="left-block">
                                                <div class="product-image-container"><a class="product_img_link"
                                                                                        href="https://www.oliverweber.com/en/jewelry/1330-anhänger-edelweiss-classic-rhod-crystal-9005617200677.html"
                                                                                        title="Pendant Edelweiss classic rhod. crystal"
                                                                                        itemprop="url"> <img
                                                                class="replace-2x img-responsive"
                                                                src="https://www.oliverweber.com/1328-tm_home_default/anhänger-edelweiss-classic-rhod-crystal.jpg"
                                                                alt="Pendant Edelweiss classic rhod. crystal"
                                                                title="Pendant Edelweiss classic rhod. crystal"
                                                                itemprop="image"/> </a></div>
                                            </div>
                                            <div class="right-block"><h5 itemprop="name"><a class="product-name"
                                                                                            href="https://www.oliverweber.com/en/jewelry/1330-anhänger-edelweiss-classic-rhod-crystal-9005617200677.html"
                                                                                            title="Pendant Edelweiss classic rhod. crystal"
                                                                                            itemprop="url"> <span
                                                                class="list-name">Pendant Edelweiss classic rhod. crystal</span>
                                                        <span class="grid-name">Pendant Edelweiss classic rhod. crystal</span>
                                                    </a></h5>
                                                <div itemprop="offers" itemscope itemtype="http://schema.org/Offer"
                                                     class="content_price"><span itemprop="price"
                                                                                 class="price product-price"> $60.00 </span>
                                                    <meta itemprop="priceCurrency" content="USD"/>
                                                </div>
                                                <p class="product-desc" itemprop="description"><span class="list-desc">Finished with Swarovski crystals, 2-year warranty, nickel-safe</span>
                                                </p>
                                                <div class="button-container"><a itemprop="url"
                                                                                 class="lnk_view btn btn-default"
                                                                                 href="https://www.oliverweber.com/en/jewelry/1330-anhänger-edelweiss-classic-rhod-crystal-9005617200677.html"
                                                                                 title="View"> <span>Show Details</span>
                                                    </a></div>
                                                <div class="product-flags"></div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="ajax_block_product col-xs-12 col-sm-3 col-md-3 first-item-of-mobile-line">
                                        <div class="product-container" itemscope itemtype="http://schema.org/Product">
                                            <div class="left-block">
                                                <div class="product-image-container"><a class="product_img_link"
                                                                                        href="https://www.oliverweber.com/en/jewelry/572-ohrstecker-twice-rhod-crystal-9005617248280.html"
                                                                                        title="Post earring Twice rhod. crystal"
                                                                                        itemprop="url"> <img
                                                                class="replace-2x img-responsive"
                                                                src="https://www.oliverweber.com/569-tm_home_default/ohrstecker-twice-rhod-crystal.jpg"
                                                                alt="Post earring Twice rhod. crystal"
                                                                title="Post earring Twice rhod. crystal"
                                                                itemprop="image"/> </a></div>
                                            </div>
                                            <div class="right-block"><h5 itemprop="name"><a class="product-name"
                                                                                            href="https://www.oliverweber.com/en/jewelry/572-ohrstecker-twice-rhod-crystal-9005617248280.html"
                                                                                            title="Post earring Twice rhod. crystal"
                                                                                            itemprop="url"> <span
                                                                class="list-name">Post earring Twice rhod. crystal</span>
                                                        <span class="grid-name">Post earring Twice rhod. crystal</span>
                                                    </a></h5>
                                                <div itemprop="offers" itemscope itemtype="http://schema.org/Offer"
                                                     class="content_price"><span itemprop="price"
                                                                                 class="price product-price"> $29.00 </span>
                                                    <meta itemprop="priceCurrency" content="USD"/>
                                                </div>
                                                <p class="product-desc" itemprop="description"><span class="list-desc">Finished with Swarovski crystals, 2-year warranty, nickel-safe</span>
                                                </p>
                                                <div class="button-container"><a itemprop="url"
                                                                                 class="lnk_view btn btn-default"
                                                                                 href="https://www.oliverweber.com/en/jewelry/572-ohrstecker-twice-rhod-crystal-9005617248280.html"
                                                                                 title="View"> <span>Show Details</span>
                                                    </a></div>
                                                <div class="product-flags"></div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="ajax_block_product col-xs-12 col-sm-3 col-md-3 last-in-line last-item-of-tablet-line last-item-of-mobile-line">
                                        <div class="product-container" itemscope itemtype="http://schema.org/Product">
                                            <div class="left-block">
                                                <div class="product-image-container"><a class="product_img_link"
                                                                                        href="https://www.oliverweber.com/en/jewelry/551-ohrstecker-dual-rhod-crystal-9005617649490.html"
                                                                                        title="Post earring Dual rhod. crystal"
                                                                                        itemprop="url"> <img
                                                                class="replace-2x img-responsive"
                                                                src="https://www.oliverweber.com/549-tm_home_default/ohrstecker-dual-rhod-crystal.jpg"
                                                                alt="Post earring Dual rhod. crystal"
                                                                title="Post earring Dual rhod. crystal"
                                                                itemprop="image"/> </a></div>
                                            </div>
                                            <div class="right-block"><h5 itemprop="name"><a class="product-name"
                                                                                            href="https://www.oliverweber.com/en/jewelry/551-ohrstecker-dual-rhod-crystal-9005617649490.html"
                                                                                            title="Post earring Dual rhod. crystal"
                                                                                            itemprop="url"> <span
                                                                class="list-name">Post earring Dual rhod. crystal</span>
                                                        <span class="grid-name">Post earring Dual rhod. crystal</span>
                                                    </a></h5>
                                                <div itemprop="offers" itemscope itemtype="http://schema.org/Offer"
                                                     class="content_price"><span itemprop="price"
                                                                                 class="price product-price"> $40.00 </span>
                                                    <meta itemprop="priceCurrency" content="USD"/>
                                                </div>
                                                <p class="product-desc" itemprop="description"><span class="list-desc">Finished with Swarovski crystals, 2-year warranty, nickel-safe</span>
                                                </p>
                                                <div class="button-container"><a itemprop="url"
                                                                                 class="lnk_view btn btn-default"
                                                                                 href="https://www.oliverweber.com/en/jewelry/551-ohrstecker-dual-rhod-crystal-9005617649490.html"
                                                                                 title="View"> <span>Show Details</span>
                                                    </a></div>
                                                <div class="product-flags"></div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="ajax_block_product col-xs-12 col-sm-3 col-md-3 first-in-line first-item-of-tablet-line first-item-of-mobile-line">
                                        <div class="product-container" itemscope itemtype="http://schema.org/Product">
                                            <div class="left-block">
                                                <div class="product-image-container"><a class="product_img_link"
                                                                                        href="https://www.oliverweber.com/en/jewelry/528-ohrstecker-reach-rhod-lt-turquoise-9005617549578.html"
                                                                                        title="Post earring Reach rhod. lt. turquoise"
                                                                                        itemprop="url"> <img
                                                                class="replace-2x img-responsive"
                                                                src="https://www.oliverweber.com/526-tm_home_default/ohrstecker-reach-rhod-lt-turquoise.jpg"
                                                                alt="Post earring Reach rhod. lt. turquoise"
                                                                title="Post earring Reach rhod. lt. turquoise"
                                                                itemprop="image"/> </a></div>
                                            </div>
                                            <div class="right-block"><h5 itemprop="name"><a class="product-name"
                                                                                            href="https://www.oliverweber.com/en/jewelry/528-ohrstecker-reach-rhod-lt-turquoise-9005617549578.html"
                                                                                            title="Post earring Reach rhod. lt. turquoise"
                                                                                            itemprop="url"> <span
                                                                class="list-name">Post earring Reach rhod. lt. turquoise</span>
                                                        <span class="grid-name">Post earring Reach rhod. lt. turquoise</span>
                                                    </a></h5>
                                                <div itemprop="offers" itemscope itemtype="http://schema.org/Offer"
                                                     class="content_price"><span itemprop="price"
                                                                                 class="price product-price"> $68.00 </span>
                                                    <meta itemprop="priceCurrency" content="USD"/>
                                                </div>
                                                <p class="product-desc" itemprop="description"><span class="list-desc">Finished with Swarovski crystals, 2-year warranty, nickel-safe, Made in Austria</span>
                                                </p>
                                                <div class="button-container"><a itemprop="url"
                                                                                 class="lnk_view btn btn-default"
                                                                                 href="https://www.oliverweber.com/en/jewelry/528-ohrstecker-reach-rhod-lt-turquoise-9005617549578.html"
                                                                                 title="View"> <span>Show Details</span>
                                                    </a></div>
                                                <div class="product-flags"></div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="ajax_block_product col-xs-12 col-sm-3 col-md-3 last-item-of-mobile-line">
                                        <div class="product-container" itemscope itemtype="http://schema.org/Product">
                                            <div class="left-block">
                                                <div class="product-image-container"><a class="product_img_link"
                                                                                        href="https://www.oliverweber.com/en/jewelry/370-ohrstecker-würfel-crystal-9005617830355.html"
                                                                                        title="Post earring Würfel crystal."
                                                                                        itemprop="url"> <img
                                                                class="replace-2x img-responsive"
                                                                src="https://www.oliverweber.com/368-tm_home_default/ohrstecker-würfel-crystal.jpg"
                                                                alt="Post earring Würfel crystal."
                                                                title="Post earring Würfel crystal." itemprop="image"/>
                                                    </a></div>
                                            </div>
                                            <div class="right-block"><h5 itemprop="name"><a class="product-name"
                                                                                            href="https://www.oliverweber.com/en/jewelry/370-ohrstecker-würfel-crystal-9005617830355.html"
                                                                                            title="Post earring Würfel crystal."
                                                                                            itemprop="url"> <span
                                                                class="list-name">Post earring Würfel crystal.</span>
                                                        <span class="grid-name">Post earring Würfel crystal.</span> </a>
                                                </h5>
                                                <div itemprop="offers" itemscope itemtype="http://schema.org/Offer"
                                                     class="content_price"><span itemprop="price"
                                                                                 class="price product-price"> $20.00 </span>
                                                    <meta itemprop="priceCurrency" content="USD"/>
                                                </div>
                                                <p class="product-desc" itemprop="description"><span class="list-desc">Finished with Swarovski crystals, 2-year warranty, nickel-safe, Made in Austria</span>
                                                </p>
                                                <div class="button-container"><a itemprop="url"
                                                                                 class="lnk_view btn btn-default"
                                                                                 href="https://www.oliverweber.com/en/jewelry/370-ohrstecker-würfel-crystal-9005617830355.html"
                                                                                 title="View"> <span>Show Details</span>
                                                    </a></div>
                                                <div class="product-flags"></div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="ajax_block_product col-xs-12 col-sm-3 col-md-3 first-item-of-mobile-line">
                                        <div class="product-container" itemscope itemtype="http://schema.org/Product">
                                            <div class="left-block">
                                                <div class="product-image-container"><a class="product_img_link"
                                                                                        href="https://www.oliverweber.com/en/jewelry/1460-armband-easy-round-cord-rhod-ab-9005617900867.html"
                                                                                        title="Bracelet Easy round cord rhod. AB"
                                                                                        itemprop="url"> <img
                                                                class="replace-2x img-responsive"
                                                                src="https://www.oliverweber.com/1458-tm_home_default/armband-easy-round-cord-rhod-ab.jpg"
                                                                alt="Bracelet Easy round cord rhod. AB"
                                                                title="Bracelet Easy round cord rhod. AB"
                                                                itemprop="image"/> </a></div>
                                            </div>
                                            <div class="right-block"><h5 itemprop="name"><a class="product-name"
                                                                                            href="https://www.oliverweber.com/en/jewelry/1460-armband-easy-round-cord-rhod-ab-9005617900867.html"
                                                                                            title="Bracelet Easy round cord rhod. AB"
                                                                                            itemprop="url"> <span
                                                                class="list-name">Bracelet Easy round cord rhod. AB</span>
                                                        <span class="grid-name">Bracelet Easy round cord rhod. AB</span>
                                                    </a></h5>
                                                <div itemprop="offers" itemscope itemtype="http://schema.org/Offer"
                                                     class="content_price"><span itemprop="price"
                                                                                 class="price product-price"> $29.00 </span>
                                                    <meta itemprop="priceCurrency" content="USD"/>
                                                </div>
                                                <p class="product-desc" itemprop="description"><span class="list-desc">Finished with Swarovski crystals, 2-year warranty, nickel-safe</span>
                                                </p>
                                                <div class="button-container"><a itemprop="url"
                                                                                 class="lnk_view btn btn-default"
                                                                                 href="https://www.oliverweber.com/en/jewelry/1460-armband-easy-round-cord-rhod-ab-9005617900867.html"
                                                                                 title="View"> <span>Show Details</span>
                                                    </a></div>
                                                <div class="product-flags"></div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="ajax_block_product col-xs-12 col-sm-3 col-md-3 last-in-line last-item-of-tablet-line last-item-of-mobile-line">
                                        <div class="product-container" itemscope itemtype="http://schema.org/Product">
                                            <div class="left-block">
                                                <div class="product-image-container"><a class="product_img_link"
                                                                                        href="https://www.oliverweber.com/en/jewelry/1339-anhänger-gaudi-croix-small-rhod-multi-9005617200691.html"
                                                                                        title="Pendant Gaudi Croix small rhod. multi"
                                                                                        itemprop="url"> <img
                                                                class="replace-2x img-responsive"
                                                                src="https://www.oliverweber.com/1337-tm_home_default/anhänger-gaudi-croix-small-rhod-multi.jpg"
                                                                alt="Pendant Gaudi Croix small rhod. multi"
                                                                title="Pendant Gaudi Croix small rhod. multi"
                                                                itemprop="image"/> </a></div>
                                            </div>
                                            <div class="right-block"><h5 itemprop="name"><a class="product-name"
                                                                                            href="https://www.oliverweber.com/en/jewelry/1339-anhänger-gaudi-croix-small-rhod-multi-9005617200691.html"
                                                                                            title="Pendant Gaudi Croix small rhod. multi"
                                                                                            itemprop="url"> <span
                                                                class="list-name">Pendant Gaudi Croix small rhod. multi</span>
                                                        <span class="grid-name">Pendant Gaudi Croix small rhod. multi</span>
                                                    </a></h5>
                                                <div itemprop="offers" itemscope itemtype="http://schema.org/Offer"
                                                     class="content_price"><span itemprop="price"
                                                                                 class="price product-price"> $75.00 </span>
                                                    <meta itemprop="priceCurrency" content="USD"/>
                                                </div>
                                                <p class="product-desc" itemprop="description"><span class="list-desc">Finished with Swarovski crystals, 2-year warranty, nickel-safe</span>
                                                </p>
                                                <div class="button-container"><a itemprop="url"
                                                                                 class="lnk_view btn btn-default"
                                                                                 href="https://www.oliverweber.com/en/jewelry/1339-anhänger-gaudi-croix-small-rhod-multi-9005617200691.html"
                                                                                 title="View"> <span>Show Details</span>
                                                    </a></div>
                                                <div class="product-flags"></div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="ajax_block_product col-xs-12 col-sm-3 col-md-3 first-in-line last-line first-item-of-tablet-line first-item-of-mobile-line last-mobile-line">
                                        <div class="product-container" itemscope itemtype="http://schema.org/Product">
                                            <div class="left-block">
                                                <div class="product-image-container"><a class="product_img_link"
                                                                                        href="https://www.oliverweber.com/en/jewelry/711-armband-dance-crystal-9005617852142.html"
                                                                                        title="Bracelet Dance crystal"
                                                                                        itemprop="url"> <img
                                                                class="replace-2x img-responsive"
                                                                src="https://www.oliverweber.com/708-tm_home_default/armband-dance-crystal.jpg"
                                                                alt="Bracelet Dance crystal"
                                                                title="Bracelet Dance crystal" itemprop="image"/> </a>
                                                </div>
                                            </div>
                                            <div class="right-block"><h5 itemprop="name"><a class="product-name"
                                                                                            href="https://www.oliverweber.com/en/jewelry/711-armband-dance-crystal-9005617852142.html"
                                                                                            title="Bracelet Dance crystal"
                                                                                            itemprop="url"> <span
                                                                class="list-name">Bracelet Dance crystal</span> <span
                                                                class="grid-name">Bracelet Dance crystal</span> </a>
                                                </h5>
                                                <div itemprop="offers" itemscope itemtype="http://schema.org/Offer"
                                                     class="content_price"><span itemprop="price"
                                                                                 class="price product-price"> $33.00 </span>
                                                    <meta itemprop="priceCurrency" content="USD"/>
                                                </div>
                                                <p class="product-desc" itemprop="description"><span class="list-desc">Finished with Swarovski crystals, 2-year warranty, nickel-safe</span>
                                                </p>
                                                <div class="button-container"><a itemprop="url"
                                                                                 class="lnk_view btn btn-default"
                                                                                 href="https://www.oliverweber.com/en/jewelry/711-armband-dance-crystal-9005617852142.html"
                                                                                 title="View"> <span>Show Details</span>
                                                    </a></div>
                                                <div class="product-flags"></div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="ajax_block_product col-xs-12 col-sm-3 col-md-3 last-line last-item-of-mobile-line last-mobile-line">
                                        <div class="product-container" itemscope itemtype="http://schema.org/Product">
                                            <div class="left-block">
                                                <div class="product-image-container"><a class="product_img_link"
                                                                                        href="https://www.oliverweber.com/en/jewelry/579-ohrstecker-sissi-rhod-crystal-9005617148436.html"
                                                                                        title="Post earring Sissi rhod. crystal"
                                                                                        itemprop="url"> <img
                                                                class="replace-2x img-responsive"
                                                                src="https://www.oliverweber.com/576-tm_home_default/ohrstecker-sissi-rhod-crystal.jpg"
                                                                alt="Post earring Sissi rhod. crystal"
                                                                title="Post earring Sissi rhod. crystal"
                                                                itemprop="image"/> </a></div>
                                            </div>
                                            <div class="right-block"><h5 itemprop="name"><a class="product-name"
                                                                                            href="https://www.oliverweber.com/en/jewelry/579-ohrstecker-sissi-rhod-crystal-9005617148436.html"
                                                                                            title="Post earring Sissi rhod. crystal"
                                                                                            itemprop="url"> <span
                                                                class="list-name">Post earring Sissi rhod. crystal</span>
                                                        <span class="grid-name">Post earring Sissi rhod. crystal</span>
                                                    </a></h5>
                                                <div itemprop="offers" itemscope itemtype="http://schema.org/Offer"
                                                     class="content_price"><span itemprop="price"
                                                                                 class="price product-price"> $41.00 </span>
                                                    <meta itemprop="priceCurrency" content="USD"/>
                                                </div>
                                                <p class="product-desc" itemprop="description"><span class="list-desc">Finished with Swarovski crystals, 2-year warranty, nickel-safe</span>
                                                </p>
                                                <div class="button-container"><a itemprop="url"
                                                                                 class="lnk_view btn btn-default"
                                                                                 href="https://www.oliverweber.com/en/jewelry/579-ohrstecker-sissi-rhod-crystal-9005617148436.html"
                                                                                 title="View"> <span>Show Details</span>
                                                    </a></div>
                                                <div class="product-flags"></div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                <ul id="homepage-carousel" class="homepage-carousel product_list grid"></ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="home-column">
            <div class="container">
                <style>.vc_custom_1558606251688 {
                        margin-top: 0px !important;
                        margin-bottom: 0px !important;
                        padding: 0px !important;
                    }</style>
                <div class="vc_row wpb_row vc_row-fluid bgwhite vc_custom_1558606251688">
                    <style>.vc_custom_1558606268582 {
                            margin: 20px 0px 0px !important;
                            padding: 0px 10px !important;
                        }</style>
                    <div class="vc_col-sm-12 vc_hidden-md vc_hidden-sm vc_hidden-xs box_w wpb_column vc_column_container vc_custom_1558606268582">
                        <div class="wpb_wrapper">
                            <style>.vc_custom_1558605188268 {
                                    background-color: #f0f0f0 !important;
                                }</style>
                            <div class="vc_row wpb_row vc_row-fluid vc_custom_1558605188268 vc_row-has-fill">
                                <style>.vc_custom_1558598104363 {
                                        margin: 0px !important;
                                        padding: 0px !important;
                                    }</style>
                                <div class="vc_col-sm-8 wpb_column vc_column_container vc_custom_1558598104363">
                                    <div class="wpb_wrapper">
                                        <style>.vc_custom_1568024148489 {
                                                margin-bottom: 0px !important;
                                                padding: 0px !important;
                                            }</style>
                                        <div class="wpb_single_image wpb_content_element vc_single_image vc_custom_1568024148489 vc_align_center">
                                            <div class="wpb_wrapper"><a
                                                        href="https://www.oliverweber.com/en/654-ohrringe"
                                                        target="_self"><img class=" vc_box_border_grey " alt=""
                                                                            src="//www.oliverweber.com/modules/jscomposer/uploads/Earrigns_092019.jpg"/></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <style>.vc_custom_1558605193463 {
                                        margin: 0px !important;
                                        padding: 0px !important;
                                    }</style>
                                <div class="vc_col-sm-4 outer_w_desktop wpb_column vc_column_container vc_custom_1558605193463">
                                    <div class="wpb_wrapper">
                                        <div class="wpb_text_column wpb_content_element ">
                                            <div class="wpb_wrapper"><p style="text-align: center;"><a
                                                            href="https://www.oliverweber.com/en/654-ohrringe">Earrings</a>
                                                </p></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <style>.vc_custom_1558606184140 {
                        margin-top: 0px !important;
                        margin-bottom: 0px !important;
                        padding: 0px !important;
                    }</style>
                <div class="vc_row wpb_row vc_row-fluid bgwhite vc_custom_1558606184140">
                    <style>.vc_custom_1558606189311 {
                            margin: 20px 0px 0px !important;
                            padding: 0px 10px !important;
                        }</style>
                    <div class="vc_col-sm-12 vc_hidden-lg vc_hidden-sm vc_hidden-xs box_w wpb_column vc_column_container vc_custom_1558606189311">
                        <div class="wpb_wrapper">
                            <style>.vc_custom_1558605188268 {
                                    background-color: #f0f0f0 !important;
                                }</style>
                            <div class="vc_row wpb_row vc_row-fluid vc_custom_1558605188268 vc_row-has-fill">
                                <style>.vc_custom_1568024463523 {
                                        margin: 0px !important;
                                        padding: 0px !important;
                                    }</style>
                                <div class="vc_col-sm-8 wpb_column vc_column_container vc_custom_1568024463523">
                                    <div class="wpb_wrapper">
                                        <style>.vc_custom_1568024155159 {
                                                margin-bottom: 0px !important;
                                                padding: 0px !important;
                                            }</style>
                                        <div class="wpb_single_image wpb_content_element vc_single_image vc_custom_1568024155159 vc_align_center">
                                            <div class="wpb_wrapper"><a
                                                        href="https://www.oliverweber.com/en/654-ohrringe"
                                                        target="_self"><img class=" vc_box_border_grey " alt=""
                                                                            src="//www.oliverweber.com/modules/jscomposer/uploads/Earrigns_092019.jpg"/></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <style>.vc_custom_1558605995428 {
                                        margin: 0px !important;
                                        padding: 0px !important;
                                    }</style>
                                <div class="vc_col-sm-4 outer_w_tablet wpb_column vc_column_container vc_custom_1558605995428">
                                    <div class="wpb_wrapper">
                                        <div class="wpb_text_column wpb_content_element ">
                                            <div class="wpb_wrapper"><p style="text-align: center;"><a
                                                            href="https://www.oliverweber.com/en/654-ohrringe">Earrings</a>
                                                </p></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <style>.vc_custom_1558606122548 {
                        margin-top: 0px !important;
                        margin-bottom: 0px !important;
                        padding: 0px !important;
                    }</style>
                <div class="vc_row wpb_row vc_row-fluid bgwhite vc_custom_1558606122548">
                    <style>.vc_custom_1558606196828 {
                            margin: 20px 0px 0px !important;
                            padding: 0px 10px !important;
                        }</style>
                    <div class="vc_col-sm-12 vc_hidden-lg vc_hidden-md vc_hidden-xs box_w wpb_column vc_column_container vc_custom_1558606196828">
                        <div class="wpb_wrapper">
                            <style>.vc_custom_1558605188268 {
                                    background-color: #f0f0f0 !important;
                                }</style>
                            <div class="vc_row wpb_row vc_row-fluid vc_custom_1558605188268 vc_row-has-fill">
                                <style>.vc_custom_1558598104363 {
                                        margin: 0px !important;
                                        padding: 0px !important;
                                    }</style>
                                <div class="vc_col-sm-8 wpb_column vc_column_container vc_custom_1558598104363">
                                    <div class="wpb_wrapper">
                                        <style>.vc_custom_1568024162102 {
                                                margin-bottom: 0px !important;
                                                padding: 0px !important;
                                            }</style>
                                        <div class="wpb_single_image wpb_content_element vc_single_image vc_custom_1568024162102 vc_align_center">
                                            <div class="wpb_wrapper"><a
                                                        href="https://www.oliverweber.com/en/654-ohrringe"
                                                        target="_self"><img class=" vc_box_border_grey " alt=""
                                                                            src="//www.oliverweber.com/modules/jscomposer/uploads/Earrigns_092019.jpg"/></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <style>.vc_custom_1558606077226 {
                                        margin: 0px !important;
                                        padding: 0px !important;
                                    }</style>
                                <div class="vc_col-sm-4 outer_w_mobile wpb_column vc_column_container vc_custom_1558606077226">
                                    <div class="wpb_wrapper">
                                        <div class="wpb_text_column wpb_content_element ">
                                            <div class="wpb_wrapper"><p style="text-align: center;"><a
                                                            href="https://www.oliverweber.com/en/654-ohrringe">Earrings</a>
                                                </p></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <style>.vc_custom_1558606102372 {
                        margin-top: 0px !important;
                        margin-bottom: 0px !important;
                        padding: 0px !important;
                    }</style>
                <div class="vc_row wpb_row vc_row-fluid bgwhite vc_custom_1558606102372">
                    <style>.vc_custom_1558606200641 {
                            margin: 20px 0px 0px !important;
                            padding: 0px 10px !important;
                        }</style>
                    <div class="vc_col-sm-12 vc_hidden-lg vc_hidden-md vc_hidden-sm box_w wpb_column vc_column_container vc_custom_1558606200641">
                        <div class="wpb_wrapper">
                            <style>.vc_custom_1558605188268 {
                                    background-color: #f0f0f0 !important;
                                }</style>
                            <div class="vc_row wpb_row vc_row-fluid vc_custom_1558605188268 vc_row-has-fill">
                                <style>.vc_custom_1558598104363 {
                                        margin: 0px !important;
                                        padding: 0px !important;
                                    }</style>
                                <div class="vc_col-sm-8 wpb_column vc_column_container vc_custom_1558598104363">
                                    <div class="wpb_wrapper">
                                        <style>.vc_custom_1568024168337 {
                                                margin-bottom: 0px !important;
                                                padding: 0px !important;
                                            }</style>
                                        <div class="wpb_single_image wpb_content_element vc_single_image vc_custom_1568024168337 vc_align_center">
                                            <div class="wpb_wrapper"><a
                                                        href="https://www.oliverweber.com/en/654-ohrringe"
                                                        target="_self"><img class=" vc_box_border_grey " alt=""
                                                                            src="//www.oliverweber.com/modules/jscomposer/uploads/Earrigns_092019.jpg"/></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <style>.vc_custom_1558606089267 {
                                        margin: 0px !important;
                                        padding: 0px !important;
                                    }</style>
                                <div class="vc_col-sm-4 outer_w_desktop wpb_column vc_column_container vc_custom_1558606089267">
                                    <div class="wpb_wrapper">
                                        <div class="wpb_text_column wpb_content_element ">
                                            <div class="wpb_wrapper"><p style="text-align: center;"><a
                                                            href="https://www.oliverweber.com/en/654-ohrringe">Earrings</a>
                                                </p></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <style>.vc_custom_1558599467249 {
                        margin-top: 20px !important;
                        margin-bottom: 0px !important;
                        padding: 0px !important;
                    }</style>
                <div class="vc_row wpb_row vc_row-fluid bgwhite vc_custom_1558599467249">
                    <style>.vc_custom_1558599488195 {
                            margin-right: 0px !important;
                            margin-bottom: 0px !important;
                            margin-left: 0px !important;
                            padding: 0px 10px !important;
                        }</style>
                    <div class="vc_col-sm-4 box_w wpb_column vc_column_container vc_custom_1558599488195">
                        <div class="wpb_wrapper">
                            <style>.vc_custom_1568024175625 {
                                    margin-bottom: 0px !important;
                                    padding: 0px !important;
                                }</style>
                            <div class="wpb_single_image wpb_content_element vc_single_image vc_custom_1568024175625 vc_align_center">
                                <div class="wpb_wrapper"><a href="https://www.oliverweber.com/en/642-ringe"
                                                            target="_self"><img class=" vc_box_border_grey " alt=""
                                                                                src="//www.oliverweber.com/modules/jscomposer/uploads/ring_092019_02.jpg"/></a>
                                </div>
                            </div>
                            <style>.vc_custom_1558592749408 {
                                    margin: 0px !important;
                                    padding: 0px !important;
                                }</style>
                            <div class="vc_row wpb_row vc_row-fluid vc_custom_1558592749408">
                                <style>.vc_custom_1558593395411 {
                                        margin: 0px !important;
                                        padding: 0px !important;
                                    }</style>
                                <div class="vc_col-sm-12 outer_w wpb_column vc_column_container vc_custom_1558593395411">
                                    <div class="wpb_wrapper">
                                        <div class="wpb_text_column wpb_content_element ">
                                            <div class="wpb_wrapper"><p style="text-align: center;"><a
                                                            href="https://www.oliverweber.com/en/642-ringe">Rings</a>
                                                </p></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <style>.vc_custom_1558599483307 {
                            margin-right: 0px !important;
                            margin-bottom: 0px !important;
                            margin-left: 0px !important;
                            padding: 0px 10px !important;
                        }</style>
                    <div class="vc_col-sm-4 box_w wpb_column vc_column_container vc_custom_1558599483307">
                        <div class="wpb_wrapper">
                            <style>.vc_custom_1568024181965 {
                                    margin-bottom: 0px !important;
                                    padding: 0px !important;
                                }</style>
                            <div class="wpb_single_image wpb_content_element vc_single_image vc_custom_1568024181965 vc_align_center">
                                <div class="wpb_wrapper"><a
                                            href="https://www.oliverweber.com/en/653-halsketten-anh%C3%A4nger"
                                            target="_self"><img class=" vc_box_border_grey " alt=""
                                                                src="//www.oliverweber.com/modules/jscomposer/uploads/pendant092019.jpg"/></a>
                                </div>
                            </div>
                            <style>.vc_custom_1558592749408 {
                                    margin: 0px !important;
                                    padding: 0px !important;
                                }</style>
                            <div class="vc_row wpb_row vc_row-fluid vc_custom_1558592749408">
                                <style>.vc_custom_1558594155484 {
                                        margin: 0px !important;
                                        padding: 0px !important;
                                    }</style>
                                <div class="vc_col-sm-12 outer_w wpb_column vc_column_container vc_custom_1558594155484">
                                    <div class="wpb_wrapper">
                                        <div class="wpb_text_column wpb_content_element ">
                                            <div class="wpb_wrapper"><p style="text-align: center;"><a
                                                            href="https://www.oliverweber.com/en/653-halsketten-anh%C3%A4nger">Pendants</a>
                                                </p></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <style>.vc_custom_1558599492918 {
                            margin-right: 0px !important;
                            margin-bottom: 0px !important;
                            margin-left: 0px !important;
                            padding: 0px 10px !important;
                        }</style>
                    <div class="vc_col-sm-4 box_w wpb_column vc_column_container vc_custom_1558599492918">
                        <div class="wpb_wrapper">
                            <style>.vc_custom_1568024189153 {
                                    margin-bottom: 0px !important;
                                    padding: 0px !important;
                                }</style>
                            <div class="wpb_single_image wpb_content_element vc_single_image vc_custom_1568024189153 vc_align_center">
                                <div class="wpb_wrapper"><a href="https://www.oliverweber.com/en/655-armbaender"
                                                            target="_self"><img class=" vc_box_border_grey " alt=""
                                                                                src="//www.oliverweber.com/modules/jscomposer/uploads/bracelet_0919_03.jpg"/></a>
                                </div>
                            </div>
                            <style>.vc_custom_1558592749408 {
                                    margin: 0px !important;
                                    padding: 0px !important;
                                }</style>
                            <div class="vc_row wpb_row vc_row-fluid vc_custom_1558592749408">
                                <style>.vc_custom_1558592832291 {
                                        margin: 0px !important;
                                        padding: 0px !important;
                                    }</style>
                                <div class="vc_col-sm-12 outer_w wpb_column vc_column_container vc_custom_1558592832291">
                                    <div class="wpb_wrapper">
                                        <div class="wpb_text_column wpb_content_element ">
                                            <div class="wpb_wrapper"><p style="text-align: center;"><a
                                                            href="https://www.oliverweber.com/en/655-armbaender">Bracelets</a>
                                                </p></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <style>.vc_custom_1558606251688 {
                        margin-top: 0px !important;
                        margin-bottom: 0px !important;
                        padding: 0px !important;
                    }</style>
                <div class="vc_row wpb_row vc_row-fluid bgwhite vc_custom_1558606251688">
                    <style>.vc_custom_1558606268582 {
                            margin: 20px 0px 0px !important;
                            padding: 0px 10px !important;
                        }</style>
                    <div class="vc_col-sm-12 vc_hidden-md vc_hidden-sm vc_hidden-xs box_w wpb_column vc_column_container vc_custom_1558606268582">
                        <div class="wpb_wrapper">
                            <style>.vc_custom_1558605188268 {
                                    background-color: #f0f0f0 !important;
                                }</style>
                            <div class="vc_row wpb_row vc_row-fluid vc_custom_1558605188268 vc_row-has-fill">
                                <style>.vc_custom_1568024342385 {
                                        margin: 0px !important;
                                        padding: 0px !important;
                                    }</style>
                                <div class="vc_col-sm-8 wpb_column vc_column_container vc_custom_1568024342385">
                                    <div class="wpb_wrapper">
                                        <style>.vc_custom_1568024241004 {
                                                margin-bottom: 0px !important;
                                                padding: 0px !important;
                                            }</style>
                                        <div class="wpb_single_image wpb_content_element vc_single_image vc_custom_1568024241004 vc_align_center">
                                            <div class="wpb_wrapper"><a
                                                        href="https://www.oliverweber.com/en/644-accessoires?categories=sunglasses"
                                                        target="_self"><img class=" vc_box_border_grey " alt=""
                                                                            src="//www.oliverweber.com/modules/jscomposer/uploads/watches_092019.jpg"/></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <style>.vc_custom_1568024344966 {
                                        margin: 0px !important;
                                        padding: 0px !important;
                                    }</style>
                                <div class="vc_col-sm-4 outer_w_desktop wpb_column vc_column_container vc_custom_1568024344966">
                                    <div class="wpb_wrapper">
                                        <div class="wpb_text_column wpb_content_element ">
                                            <div class="wpb_wrapper"><p style="text-align: center;"><a
                                                            href="https://www.oliverweber.com/en/644-accessoires?categories=sunglasses">Watches</a>
                                                </p></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <style>.vc_custom_1558606184140 {
                        margin-top: 0px !important;
                        margin-bottom: 0px !important;
                        padding: 0px !important;
                    }</style>
                <div class="vc_row wpb_row vc_row-fluid bgwhite vc_custom_1558606184140">
                    <style>.vc_custom_1558606189311 {
                            margin: 20px 0px 0px !important;
                            padding: 0px 10px !important;
                        }</style>
                    <div class="vc_col-sm-12 vc_hidden-lg vc_hidden-sm vc_hidden-xs box_w wpb_column vc_column_container vc_custom_1558606189311">
                        <div class="wpb_wrapper">
                            <style>.vc_custom_1558605188268 {
                                    background-color: #f0f0f0 !important;
                                }</style>
                            <div class="vc_row wpb_row vc_row-fluid vc_custom_1558605188268 vc_row-has-fill">
                                <style>.vc_custom_1568024348639 {
                                        margin: 0px !important;
                                        padding: 0px !important;
                                    }</style>
                                <div class="vc_col-sm-8 wpb_column vc_column_container vc_custom_1568024348639">
                                    <div class="wpb_wrapper">
                                        <style>.vc_custom_1568024307322 {
                                                margin-bottom: 0px !important;
                                                padding: 0px !important;
                                            }</style>
                                        <div class="wpb_single_image wpb_content_element vc_single_image vc_custom_1568024307322 vc_align_center">
                                            <div class="wpb_wrapper"><a
                                                        href="https://www.oliverweber.com/en/644-accessoires?categories=sunglasses"
                                                        target="_self"><img class=" vc_box_border_grey " alt=""
                                                                            src="//www.oliverweber.com/modules/jscomposer/uploads/watches_092019.jpg"/></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <style>.vc_custom_1568024351012 {
                                        margin: 0px !important;
                                        padding: 0px !important;
                                    }</style>
                                <div class="vc_col-sm-4 outer_w_tablet wpb_column vc_column_container vc_custom_1568024351012">
                                    <div class="wpb_wrapper">
                                        <div class="wpb_text_column wpb_content_element ">
                                            <div class="wpb_wrapper"><p style="text-align: center;"><a
                                                            href="https://www.oliverweber.com/en/644-accessoires?categories=sunglasses">Watches</a>
                                                </p></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <style>.vc_custom_1558606122548 {
                        margin-top: 0px !important;
                        margin-bottom: 0px !important;
                        padding: 0px !important;
                    }</style>
                <div class="vc_row wpb_row vc_row-fluid bgwhite vc_custom_1558606122548">
                    <style>.vc_custom_1558606196828 {
                            margin: 20px 0px 0px !important;
                            padding: 0px 10px !important;
                        }</style>
                    <div class="vc_col-sm-12 vc_hidden-lg vc_hidden-md vc_hidden-xs box_w wpb_column vc_column_container vc_custom_1558606196828">
                        <div class="wpb_wrapper">
                            <style>.vc_custom_1558605188268 {
                                    background-color: #f0f0f0 !important;
                                }</style>
                            <div class="vc_row wpb_row vc_row-fluid vc_custom_1558605188268 vc_row-has-fill">
                                <style>.vc_custom_1568024354268 {
                                        margin: 0px !important;
                                        padding: 0px !important;
                                    }</style>
                                <div class="vc_col-sm-8 wpb_column vc_column_container vc_custom_1568024354268">
                                    <div class="wpb_wrapper">
                                        <style>.vc_custom_1568024322557 {
                                                margin-bottom: 0px !important;
                                                padding: 0px !important;
                                            }</style>
                                        <div class="wpb_single_image wpb_content_element vc_single_image vc_custom_1568024322557 vc_align_center">
                                            <div class="wpb_wrapper"><a
                                                        href="https://www.oliverweber.com/en/644-accessoires?categories=sunglasses"
                                                        target="_self"><img class=" vc_box_border_grey " alt=""
                                                                            src="//www.oliverweber.com/modules/jscomposer/uploads/watches_092019.jpg"/></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <style>.vc_custom_1568024357716 {
                                        margin: 0px !important;
                                        padding: 0px !important;
                                    }</style>
                                <div class="vc_col-sm-4 outer_w_mobile wpb_column vc_column_container vc_custom_1568024357716">
                                    <div class="wpb_wrapper">
                                        <div class="wpb_text_column wpb_content_element ">
                                            <div class="wpb_wrapper"><p style="text-align: center;"><a
                                                            href="https://www.oliverweber.com/en/644-accessoires?categories=sunglasses">Watches</a>
                                                </p></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <style>.vc_custom_1558606102372 {
                        margin-top: 0px !important;
                        margin-bottom: 0px !important;
                        padding: 0px !important;
                    }</style>
                <div class="vc_row wpb_row vc_row-fluid bgwhite vc_custom_1558606102372">
                    <style>.vc_custom_1558606200641 {
                            margin: 20px 0px 0px !important;
                            padding: 0px 10px !important;
                        }</style>
                    <div class="vc_col-sm-12 vc_hidden-lg vc_hidden-md vc_hidden-sm box_w wpb_column vc_column_container vc_custom_1558606200641">
                        <div class="wpb_wrapper">
                            <style>.vc_custom_1558605188268 {
                                    background-color: #f0f0f0 !important;
                                }</style>
                            <div class="vc_row wpb_row vc_row-fluid vc_custom_1558605188268 vc_row-has-fill">
                                <style>.vc_custom_1568024475716 {
                                        margin: 0px !important;
                                        padding: 0px !important;
                                    }</style>
                                <div class="vc_col-sm-4 outer_w_desktop wpb_column vc_column_container vc_custom_1568024475716">
                                    <div class="wpb_wrapper">
                                        <div class="wpb_text_column wpb_content_element ">
                                            <div class="wpb_wrapper"><p style="text-align: center;"><a
                                                            href="https://www.oliverweber.com/en/644-accessoires?categories=sunglasses">Watches</a>
                                                </p></div>
                                        </div>
                                    </div>
                                </div>
                                <style>.vc_custom_1568024473577 {
                                        margin: 0px !important;
                                        padding: 0px !important;
                                    }</style>
                                <div class="vc_col-sm-8 wpb_column vc_column_container vc_custom_1568024473577">
                                    <div class="wpb_wrapper">
                                        <style>.vc_custom_1568024460859 {
                                                margin-bottom: 0px !important;
                                                padding: 0px !important;
                                            }</style>
                                        <div class="wpb_single_image wpb_content_element vc_single_image vc_custom_1568024460859 vc_align_center">
                                            <div class="wpb_wrapper"><a
                                                        href="https://www.oliverweber.com/en/644-accessoires?categories=sunglasses"
                                                        target="_self"><img class=" vc_box_border_grey " alt=""
                                                                            src="//www.oliverweber.com/modules/jscomposer/uploads/watches_092019.jpg"/></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <style>.vc_custom_1558606251688 {
                        margin-top: 0px !important;
                        margin-bottom: 0px !important;
                        padding: 0px !important;
                    }</style>
                <div class="vc_row wpb_row vc_row-fluid bgwhite vc_custom_1558606251688">
                    <style>.vc_custom_1558606268582 {
                            margin: 20px 0px 0px !important;
                            padding: 0px 10px !important;
                        }</style>
                    <div class="vc_col-sm-12 vc_hidden-md vc_hidden-sm vc_hidden-xs box_w wpb_column vc_column_container vc_custom_1558606268582">
                        <div class="wpb_wrapper">
                            <style>.vc_custom_1558605188268 {
                                    background-color: #f0f0f0 !important;
                                }</style>
                            <div class="vc_row wpb_row vc_row-fluid vc_custom_1558605188268 vc_row-has-fill">
                                <style>.vc_custom_1558605193463 {
                                        margin: 0px !important;
                                        padding: 0px !important;
                                    }</style>
                                <div class="vc_col-sm-4 outer_w_desktop wpb_column vc_column_container vc_custom_1558605193463">
                                    <div class="wpb_wrapper">
                                        <div class="wpb_text_column wpb_content_element ">
                                            <div class="wpb_wrapper"><p style="text-align: center;"><a
                                                            href="https://www.oliverweber.com/en/644-accessoires?categories=sunglasses">Sunglasses</a>
                                                </p></div>
                                        </div>
                                    </div>
                                </div>
                                <style>.vc_custom_1558598104363 {
                                        margin: 0px !important;
                                        padding: 0px !important;
                                    }</style>
                                <div class="vc_col-sm-8 wpb_column vc_column_container vc_custom_1558598104363">
                                    <div class="wpb_wrapper">
                                        <style>.vc_custom_1558948476382 {
                                                margin-bottom: 0px !important;
                                                padding: 0px !important;
                                            }</style>
                                        <div class="wpb_single_image wpb_content_element vc_single_image vc_custom_1558948476382 vc_align_center">
                                            <div class="wpb_wrapper"><a
                                                        href="https://www.oliverweber.com/en/644-accessoires?categories=sunglasses"
                                                        target="_self"><img class=" vc_box_border_grey " alt=""
                                                                            src="//www.oliverweber.com/modules/jscomposer/uploads/Collection Summer 2019/sunglasses_052019.jpg"/></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <style>.vc_custom_1558606184140 {
                        margin-top: 0px !important;
                        margin-bottom: 0px !important;
                        padding: 0px !important;
                    }</style>
                <div class="vc_row wpb_row vc_row-fluid bgwhite vc_custom_1558606184140">
                    <style>.vc_custom_1558606189311 {
                            margin: 20px 0px 0px !important;
                            padding: 0px 10px !important;
                        }</style>
                    <div class="vc_col-sm-12 vc_hidden-lg vc_hidden-sm vc_hidden-xs box_w wpb_column vc_column_container vc_custom_1558606189311">
                        <div class="wpb_wrapper">
                            <style>.vc_custom_1558605188268 {
                                    background-color: #f0f0f0 !important;
                                }</style>
                            <div class="vc_row wpb_row vc_row-fluid vc_custom_1558605188268 vc_row-has-fill">
                                <style>.vc_custom_1558605995428 {
                                        margin: 0px !important;
                                        padding: 0px !important;
                                    }</style>
                                <div class="vc_col-sm-4 outer_w_tablet wpb_column vc_column_container vc_custom_1558605995428">
                                    <div class="wpb_wrapper">
                                        <div class="wpb_text_column wpb_content_element ">
                                            <div class="wpb_wrapper"><p style="text-align: center;"><a
                                                            href="https://www.oliverweber.com/en/644-accessoires?categories=sunglasses">Sunglasses</a>
                                                </p></div>
                                        </div>
                                    </div>
                                </div>
                                <style>.vc_custom_1558598104363 {
                                        margin: 0px !important;
                                        padding: 0px !important;
                                    }</style>
                                <div class="vc_col-sm-8 wpb_column vc_column_container vc_custom_1558598104363">
                                    <div class="wpb_wrapper">
                                        <style>.vc_custom_1558948473002 {
                                                margin-bottom: 0px !important;
                                                padding: 0px !important;
                                            }</style>
                                        <div class="wpb_single_image wpb_content_element vc_single_image vc_custom_1558948473002 vc_align_center">
                                            <div class="wpb_wrapper"><a
                                                        href="https://www.oliverweber.com/en/644-accessoires?categories=sunglasses"
                                                        target="_self"><img class=" vc_box_border_grey " alt=""
                                                                            src="//www.oliverweber.com/modules/jscomposer/uploads/Collection Summer 2019/sunglasses_052019.jpg"/></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <style>.vc_custom_1558606122548 {
                        margin-top: 0px !important;
                        margin-bottom: 0px !important;
                        padding: 0px !important;
                    }</style>
                <div class="vc_row wpb_row vc_row-fluid bgwhite vc_custom_1558606122548">
                    <style>.vc_custom_1558606196828 {
                            margin: 20px 0px 0px !important;
                            padding: 0px 10px !important;
                        }</style>
                    <div class="vc_col-sm-12 vc_hidden-lg vc_hidden-md vc_hidden-xs box_w wpb_column vc_column_container vc_custom_1558606196828">
                        <div class="wpb_wrapper">
                            <style>.vc_custom_1558605188268 {
                                    background-color: #f0f0f0 !important;
                                }</style>
                            <div class="vc_row wpb_row vc_row-fluid vc_custom_1558605188268 vc_row-has-fill">
                                <style>.vc_custom_1558606077226 {
                                        margin: 0px !important;
                                        padding: 0px !important;
                                    }</style>
                                <div class="vc_col-sm-4 outer_w_mobile wpb_column vc_column_container vc_custom_1558606077226">
                                    <div class="wpb_wrapper">
                                        <div class="wpb_text_column wpb_content_element ">
                                            <div class="wpb_wrapper"><p style="text-align: center;"><a
                                                            href="https://www.oliverweber.com/en/644-accessoires?categories=sunglasses">Sunglasses</a>
                                                </p></div>
                                        </div>
                                    </div>
                                </div>
                                <style>.vc_custom_1558598104363 {
                                        margin: 0px !important;
                                        padding: 0px !important;
                                    }</style>
                                <div class="vc_col-sm-8 wpb_column vc_column_container vc_custom_1558598104363">
                                    <div class="wpb_wrapper">
                                        <style>.vc_custom_1558948469385 {
                                                margin-bottom: 0px !important;
                                                padding: 0px !important;
                                            }</style>
                                        <div class="wpb_single_image wpb_content_element vc_single_image vc_custom_1558948469385 vc_align_center">
                                            <div class="wpb_wrapper"><a
                                                        href="https://www.oliverweber.com/en/644-accessoires?categories=sunglasses"
                                                        target="_self"><img class=" vc_box_border_grey " alt=""
                                                                            src="//www.oliverweber.com/modules/jscomposer/uploads/Collection Summer 2019/sunglasses_052019.jpg"/></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <style>.vc_custom_1558606102372 {
                        margin-top: 0px !important;
                        margin-bottom: 0px !important;
                        padding: 0px !important;
                    }</style>
                <div class="vc_row wpb_row vc_row-fluid bgwhite vc_custom_1558606102372">
                    <style>.vc_custom_1558606200641 {
                            margin: 20px 0px 0px !important;
                            padding: 0px 10px !important;
                        }</style>
                    <div class="vc_col-sm-12 vc_hidden-lg vc_hidden-md vc_hidden-sm box_w wpb_column vc_column_container vc_custom_1558606200641">
                        <div class="wpb_wrapper">
                            <style>.vc_custom_1558605188268 {
                                    background-color: #f0f0f0 !important;
                                }</style>
                            <div class="vc_row wpb_row vc_row-fluid vc_custom_1558605188268 vc_row-has-fill">
                                <style>.vc_custom_1567681203646 {
                                        margin: 0px !important;
                                        padding: 0px !important;
                                    }</style>
                                <div class="vc_col-sm-8 wpb_column vc_column_container vc_custom_1567681203646">
                                    <div class="wpb_wrapper">
                                        <style>.vc_custom_1558948466386 {
                                                margin-bottom: 0px !important;
                                                padding: 0px !important;
                                            }</style>
                                        <div class="wpb_single_image wpb_content_element vc_single_image vc_custom_1558948466386 vc_align_center">
                                            <div class="wpb_wrapper"><a
                                                        href="https://www.oliverweber.com/en/644-accessoires?categories=sunglasses"
                                                        target="_self"><img class=" vc_box_border_grey " alt=""
                                                                            src="//www.oliverweber.com/modules/jscomposer/uploads/Collection Summer 2019/sunglasses_052019.jpg"/></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <style>.vc_custom_1567681205592 {
                                        margin: 0px !important;
                                        padding: 0px !important;
                                    }</style>
                                <div class="vc_col-sm-4 outer_w_desktop wpb_column vc_column_container vc_custom_1567681205592">
                                    <div class="wpb_wrapper">
                                        <div class="wpb_text_column wpb_content_element ">
                                            <div class="wpb_wrapper"><p style="text-align: center;"><a
                                                            href="https://www.oliverweber.com/en/644-accessoires?categories=sunglasses">Sunglasses</a>
                                                </p></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <style>.vc_custom_1558594733911 {
                        margin-top: 20px !important;
                        margin-bottom: 20px !important;
                        padding: 0px !important;
                    }</style>
                <div class="vc_row wpb_row vc_row-fluid bgwhite vc_custom_1558594733911">
                    <style>.vc_custom_1558599513519 {
                            margin-right: 0px !important;
                            margin-bottom: 0px !important;
                            margin-left: 0px !important;
                            padding: 0px 10px !important;
                        }</style>
                    <div class="vc_col-sm-4 box_w wpb_column vc_column_container vc_custom_1558599513519">
                        <div class="wpb_wrapper">
                            <style>.vc_custom_1558948667687 {
                                    margin: 0px !important;
                                    padding: 0px !important;
                                }</style>
                            <div class="wpb_single_image wpb_content_element vc_single_image vc_custom_1558948667687 vc_align_center">
                                <div class="wpb_wrapper"><a
                                            href="https://www.oliverweber.com/smartblog/Wedding---Details-are-important-----so-are-yo.html"
                                            target="_self"><img class=" vc_box_border_grey " alt=""
                                                                src="//www.oliverweber.com/modules/jscomposer/uploads/hochzeit_052019.jpg"/></a>
                                </div>
                            </div>
                            <style>.vc_custom_1558594129056 {
                                    margin: 0px !important;
                                    padding: 0px !important;
                                }</style>
                            <div class="vc_row wpb_row vc_row-fluid vc_custom_1558594129056">
                                <style>.vc_custom_1558594170723 {
                                        margin: 0px !important;
                                        padding: 0px !important;
                                    }</style>
                                <div class="vc_col-sm-12 outer_w wpb_column vc_column_container vc_custom_1558594170723">
                                    <div class="wpb_wrapper">
                                        <div class="wpb_text_column wpb_content_element ">
                                            <div class="wpb_wrapper"><p style="text-align: center;"><a
                                                            href="https://www.oliverweber.com/smartblog/Wedding---Details-are-important-----so-are-yo.html">Wedding</a>
                                                </p></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <style>.vc_custom_1558599504172 {
                            margin-right: 0px !important;
                            margin-bottom: 0px !important;
                            margin-left: 0px !important;
                            padding: 0px 10px !important;
                        }</style>
                    <div class="vc_col-sm-4 box_w wpb_column vc_column_container vc_custom_1558599504172">
                        <div class="wpb_wrapper">
                            <style>.vc_custom_1558948685844 {
                                    margin: 0px !important;
                                    padding: 0px !important;
                                }</style>
                            <div class="wpb_single_image wpb_content_element vc_single_image vc_custom_1558948685844 vc_align_center">
                                <div class="wpb_wrapper"><a
                                            href="https://www.oliverweber.com/en/smartblog/Gentlemens-Selection.html"
                                            target="_self"><img class=" vc_box_border_grey " alt=""
                                                                src="//www.oliverweber.com/modules/jscomposer/uploads/mens_052019.jpg"/></a>
                                </div>
                            </div>
                            <style>.vc_custom_1558592749408 {
                                    margin: 0px !important;
                                    padding: 0px !important;
                                }</style>
                            <div class="vc_row wpb_row vc_row-fluid vc_custom_1558592749408">
                                <style>.vc_custom_1558594175819 {
                                        margin: 0px !important;
                                        padding: 0px !important;
                                    }</style>
                                <div class="vc_col-sm-12 outer_w wpb_column vc_column_container vc_custom_1558594175819">
                                    <div class="wpb_wrapper">
                                        <div class="wpb_text_column wpb_content_element ">
                                            <div class="wpb_wrapper"><p style="text-align: center;"><a
                                                            href="https://www.oliverweber.com/en/smartblog/Gentlemens-Selection.html">Men's
                                                        Best</a></p></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <style>.vc_custom_1558599509232 {
                            margin-right: 0px !important;
                            margin-bottom: 0px !important;
                            margin-left: 0px !important;
                            padding: 0px 10px !important;
                        }</style>
                    <div class="vc_col-sm-4 box_w wpb_column vc_column_container vc_custom_1558599509232">
                        <div class="wpb_wrapper">
                            <style>.vc_custom_1558948707400 {
                                    margin-bottom: 0px !important;
                                    padding: 0px !important;
                                }</style>
                            <div class="wpb_single_image wpb_content_element vc_single_image vc_custom_1558948707400 vc_align_center">
                                <div class="wpb_wrapper"><a
                                            href="https://www.oliverweber.com/en/644-accessoires?kategorien=hair-accessories,pens,brooches,handbags,nailfile"
                                            target="_self"><img class=" vc_box_border_grey " alt=""
                                                                src="//www.oliverweber.com/modules/jscomposer/uploads/accesoirres_062019.jpg"/></a>
                                </div>
                            </div>
                            <style>.vc_custom_1558592749408 {
                                    margin: 0px !important;
                                    padding: 0px !important;
                                }</style>
                            <div class="vc_row wpb_row vc_row-fluid vc_custom_1558592749408">
                                <style>.vc_custom_1558594180594 {
                                        margin: 0px !important;
                                        padding: 0px !important;
                                    }</style>
                                <div class="vc_col-sm-12 outer_w wpb_column vc_column_container vc_custom_1558594180594">
                                    <div class="wpb_wrapper">
                                        <div class="wpb_text_column wpb_content_element ">
                                            <div class="wpb_wrapper"><p style="text-align: center;"><a
                                                            href="https://www.oliverweber.com/en/644-accessoires?kategorien=hair-accessories,pens,brooches,handbags,nailfile">Accessoires</a>
                                                </p></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <style type="text/css">.outer_w {
                        line-height: 100px;
                        background-color: #f0f0f0;
                        font-size: 20px;
                        letter-spacing: 2px;
                        text-transform: uppercase;
                    }

                    .outer_w_desktop {
                        line-height: 250px;
                        font-size: 20px;
                        letter-spacing: 2px;
                        text-transform: uppercase;
                    }

                    .outer_w_tablet {
                        line-height: 209.4px;
                        font-size: 20px;
                        letter-spacing: 2px;
                        text-transform: uppercase;
                    }

                    .outer_w_mobile {
                        line-height: 162.383px;
                        font-size: 20px;
                        letter-spacing: 2px;
                        text-transform: uppercase;
                    }

                    body#index .home-column {
                        background: white;
                    }</style>
                <div id="htmlcontent_home">
                    <ul class="htmlcontent-home clearfix">
                        <li class="htmlcontent-item-1 ">
                            <div class="item-html"><h4 style="font-size:20px;color:#fff;">ABOUT</h4>
                                <h3>OLIVER WEBER</h3><h4 style="font-size:18px;color:#fff;">Our philosophy: Accessible
                                    Luxury which can be adapted to the most varied occasions and tastes.</h4> <br/>
                                <p> More than anything, the jewelry we wear is a wordless expression of our inner
                                    feelings and our state of mind. We wear it not only to feel beautiful, but also to
                                    make a personal statement: <br/></p><h4 style="font-size:18px;color:#fff;">This is
                                    me today!</h4> <br/>
                                <p> I feel lovely and delicate…fancy and glamorous…stylish and sophisticated or exotic
                                    and flirty… <br/> Just like the many facets of our crystals, our varied jewelry
                                    embodies different statements and will allow you to express yourself in the most
                                    self-confident manner.</p><a
                                        href="index.php?id_cms=4&amp;controller=cms&amp;id_lang=1">
                                    <button class="btn btn-default" type="button">READ MORE ABOUT US</button>
                                </a></div>
                        </li>
                    </ul>
                </div>
                <section id="homepage-blog" class="block container"><h4 class='title_block'><a
                                href="https://www.oliverweber.com/en/smartblog.html">Latest News</a></h4>
                    <div class="block_content">
                        <ul class="row">
                            <li class="col-xs-12 col-sm-6 col-md-3 first-in-line last-line first-item-of-tablet-line first-item-of-mobile-line">
                                <div class="blog-image"><a
                                            href="https://www.oliverweber.com/en/smartblog/Gaudí-Collection.html"><img
                                                alt="Gaudí Collection" class="img-responsive"
                                                src="/modules/smartblog/images/31-home-default.jpg"></a></div>
                                <div class="blog-caption"><h5><a class="product-name"
                                                                 href="https://www.oliverweber.com/en/smartblog/Gaudí-Collection.html">Gaudí
                                            Collection</a></h5>
                                    <p class="post-descr"> Take a look to our Gaud&iacute; Collection with Swarovksi
                                        Crystals...</p> <a class="date-added"
                                                           href="https://www.oliverweber.com/en/smartblog/Gaudí-Collection.html"
                                                           class="btn btn-default btn-sm icon-right">Juni 14, 2019</a>
                                </div>
                            </li>
                            <li class="col-xs-12 col-sm-6 col-md-3 last-line last-item-of-tablet-line last-item-of-mobile-line">
                                <div class="blog-image"><a
                                            href="https://www.oliverweber.com/en/smartblog/Gentlemens-Selection.html"><img
                                                alt="Gentlemen´s Selection" class="img-responsive"
                                                src="/modules/smartblog/images/28-home-default.jpg"></a></div>
                                <div class="blog-caption"><h5><a class="product-name"
                                                                 href="https://www.oliverweber.com/en/smartblog/Gentlemens-Selection.html">Gentlemen´s
                                            Selection</a></h5>
                                    <p class="post-descr"> The masculine colors and the strong line characterize ...</p>
                                    <a class="date-added"
                                       href="https://www.oliverweber.com/en/smartblog/Gentlemens-Selection.html"
                                       class="btn btn-default btn-sm icon-right">August 2, 2018</a></div>
                            </li>
                            <li class="col-xs-12 col-sm-6 col-md-3 last-line first-item-of-tablet-line first-item-of-mobile-line last-mobile-line">
                                <div class="blog-image"><a
                                            href="https://www.oliverweber.com/en/smartblog/FRIENDS-FOR-LIFE-BY-OLIVER-WEBER.html"><img
                                                alt="FRIENDS FOR LIFE BY OLIVER WEBER" class="img-responsive"
                                                src="/modules/smartblog/images/27-home-default.jpg"></a></div>
                                <div class="blog-caption"><h5><a class="product-name"
                                                                 href="https://www.oliverweber.com/en/smartblog/FRIENDS-FOR-LIFE-BY-OLIVER-WEBER.html">FRIENDS
                                            FOR LIFE BY OLIVER WEBER</a></h5>
                                    <p class="post-descr"> This dedicated collection underlines the unconditional love
                                        you receive from your pet, capturing that...</p> <a class="date-added"
                                                                                            href="https://www.oliverweber.com/en/smartblog/FRIENDS-FOR-LIFE-BY-OLIVER-WEBER.html"
                                                                                            class="btn btn-default btn-sm icon-right">März
                                        26, 2018</a></div>
                            </li>
                            <li class="col-xs-12 col-sm-6 col-md-3 last-in-line last-line last-item-of-tablet-line last-item-of-mobile-line last-mobile-line">
                                <div class="blog-image"><a
                                            href="https://www.oliverweber.com/en/smartblog/Wedding---Details-are-important-----so-are-yo.html"><img
                                                alt="Wedding - Details are important ... so are you!"
                                                class="img-responsive"
                                                src="/modules/smartblog/images/26-home-default.jpg"></a></div>
                                <div class="blog-caption"><h5><a class="product-name"
                                                                 href="https://www.oliverweber.com/en/smartblog/Wedding---Details-are-important-----so-are-yo.html">Wedding
                                            - Details are important ... so are you!</a></h5>
                                    <p class="post-descr"> This magical day marks the beginning of your new life,
                                        celebrates the love you have for each other and the...</p> <a class="date-added"
                                                                                                      href="https://www.oliverweber.com/en/smartblog/Wedding---Details-are-important-----so-are-yo.html"
                                                                                                      class="btn btn-default btn-sm icon-right">März
                                        22, 2018</a></div>
                            </li>
                        </ul>
                    </div>
                </section>
            </div>
        </div>
    </div>


    {!! view_render_event('bagisto.shop.layout.footer.before') !!}

    @include('jewellery::layouts.footer.footer')

    {!! view_render_event('bagisto.shop.layout.footer.after') !!}
</div>
<script type="text/javascript">var CUSTOMIZE_TEXTFIELD = 1;
    var FancyboxI18nClose = 'Close';
    var FancyboxI18nNext = 'Next';
    var FancyboxI18nPrev = 'Previous';
    var added_to_wishlist = 'Added to your wishlist.';
    var ajax_allowed = true;
    var ajaxsearch = true;
    var baseDir = 'https://www.oliverweber.com/';
    var baseUri = 'https://www.oliverweber.com/';
    var carousel_auto = 1;
    var carousel_auto_control = 0;
    var carousel_auto_hover = 1;
    var carousel_auto_pause = 3000;
    var carousel_control = 1;
    var carousel_hide_control = 1;
    var carousel_item_margin = 30;
    var carousel_item_nb = 4;
    var carousel_item_scroll = 1;
    var carousel_item_width = 290;
    var carousel_loop = 0;
    var carousel_pager = 0;
    var carousel_random = 0;
    var carousel_speed = 500;
    var carousel_status = 1;
    var comparator_max_item = 2;
    var comparedProductsIds = [];
    var contentOnly = false;
    var customizationIdMessage = 'Customization #';
    var delete_txt = 'Delete';
    var displayList = false;
    var freeProductTranslation = 'Free!';
    var freeShippingTranslation = 'Free shipping!';
    var generated_date = 1578936843;
    var hasDeliveryAddress = false;
    var homeslider_loop = 1;
    var homeslider_pause = 4000;
    var homeslider_speed = 1000;
    var homeslider_width = 10000;
    var id_lang = 2;
    var img_dir = 'https://www.oliverweber.com/themes/theme1240/img/';
    var instantsearch = true;
    var isGuest = 0;
    var isLogged = 0;
    var isMobile = false;
    var loggin_required = 'You must be logged in to manage your wishlist.';
    var max_item = 'You cannot add more than 2 product(s) to the product comparison';
    var min_item = 'Please select at least one product';
    var module_url = 'https://www.oliverweber.com/en/module/tmnewsletter/default';
    var mywishlist_url = 'https://www.oliverweber.com/en/module/blockwishlist/mywishlist';
    var nbItemsPerLine = 4;
    var nbItemsPerLineMobile = 2;
    var nbItemsPerLineTablet = 4;
    var page_name = 'index';
    var placeholder_blocknewsletter = 'Enter your e-mail';
    var popup_status = false;
    var priceDisplayMethod = 0;
    var priceDisplayPrecision = 2;
    var quickView = false;
    var removingLinkText = 'remove this product from my cart';
    var roundMode = 2;
    var scroll_step = 150;
    var scrool_speed = 800;
    var search_url = 'https://www.oliverweber.com/en/search';
    var search_url_local = 'https://www.oliverweber.com/en/module/tmsearch/search';
    var static_token = 'd20dcb435c40dfbf6535fab46f0e4e51';
    var text_close = 'Close';
    var text_description = 'Enter your email address to receive all news, updates on new arrivals, special offers and other discount information.';
    var text_email = 'Your E-Mail';
    var text_heading = 'Melden Sie sich für unseren Newsletter an';
    var text_heading_1 = 'Melden Sie sich für unseren Newsletter an';
    var text_heading_2 = 'Success';
    var text_heading_3 = 'Error';
    var text_placeholder = 'Geben Sie Ihre E-Mail Adresse an';
    var text_remove = 'Do not show again';
    var text_sign = 'Subscribe';
    var tmsearch_description = true;
    var tmsearch_height = 180;
    var tmsearch_image = true;
    var tmsearch_limit = true;
    var tmsearch_limit_num = 3;
    var tmsearch_manufacturer = true;
    var tmsearch_price = true;
    var tmsearch_reference = true;
    var tmsearch_scroll = false;
    var toBeDetermined = 'To be determined';
    var token = 'd8dae428418b7bef2c0f2b9779ef2e60';
    var user_newsletter_status = 0;
    var usingSecureMode = true;
    var wishlistProductsIds = false;</script>
<script type="text/javascript"
        src="https://www.oliverweber.com/themes/theme1240/cache/v_38_20c6cbea7133ade7d077834c9e6a063e.js"></script>
<script type="text/javascript">function addVideoParallax(selector, path, filename) {
        var selector = $(selector);

        selector.addClass('parallax_section');
        selector.attr('data-type-media', 'video_html');
        selector.attr('data-mp4', 'true');
        selector.attr('data-webm', 'true');
        selector.attr('data-ogv', 'true');
        selector.attr('data-poster', 'true');
        selector.wrapInner('<div class="container parallax_content"></div>');
        selector.append('<div class="parallax_inner"><video class="parallax_media" width="100%" height="100%" autoplay loop poster="/' + path + filename + '.jpg"><source src="/' + path + filename + '.mp4" type="video/mp4"><source src="/' + path + filename + '.webdm" type="video/webm"><source src="/' + path + filename + '.ogv" type="video/ogg"></video></div>');

        selector.tmMediaParallax();
    }

    function addImageParallax(selector, path, filename, width, height) {
        var selector = $(selector);

        selector.addClass('parallax_section');
        selector.attr('data-type-media', 'image');
        selector.wrapInner('<div class="container parallax_content"></div>');
        selector.append('<div class="parallax_inner"><img class="parallax_media" src="/' + path + filename + '" data-base-width="' + width + '" data-base-height="' + height + '"/></div>');

        selector.tmMediaParallax();
    }

    $(window).load(function () {
        addImageParallax('#htmlcontent_home', 'modules/tmmediaparallax/media/', 'hintergrund2019.jpg', '1920', '1293');
    });
    var fblogin_appid = '1595460867195078';

    /* * 2007-2018 PrestaShop * * NOTICE OF LICENSE * * This source file is subject to the Academic Free License (AFL 3.0) * that is bundled with this package in the file LICENSE.txt. * It is also available through the world-wide-web at this URL: * http://opensource.org/licenses/afl-3.0.php * If you did not receive a copy of the license and are unable to * obtain it through the world-wide-web, please send an email * to license@prestashop.com so we can send you a copy immediately. * * DISCLAIMER * * Do not edit or add to this file if you wish to upgrade PrestaShop to newer * versions in the future. If you wish to customize PrestaShop for your * needs please refer to http://www.prestashop.com for more information. * * @author PrestaShop SA <contact@prestashop.com> * @copyright 2007-2018 PrestaShop SA * @license http://opensource.org/licenses/afl-3.0.php Academic Free License (AFL 3.0) * International Registered Trademark & Property of PrestaShop SA */
    function updateFormDatas() {
        var nb = $('#quantity_wanted').val();
        var id = $('#idCombination').val();
        $('.paypal_payment_form input[name=quantity]').val(nb);
        $('.paypal_payment_form input[name=id_p_attr]').val(id);
    }

    $(document).ready(function () {
        if ($('#in_context_checkout_enabled').val() != 1) {
            $('#payment_paypal_express_checkout').click(function () {
                $('#paypal_payment_form_cart').submit();
                return false;
            });
        }
        var jquery_version = $.fn.jquery.split('.');
        if (jquery_version[0] >= 1 && jquery_version[1] >= 7) {
            $('body').on('submit', ".paypal_payment_form", function () {
                updateFormDatas();
            });
        } else {
            $('.paypal_payment_form').live('submit', function () {
                updateFormDatas();
            });
        }

        function displayExpressCheckoutShortcut() {
            var id_product = $('input[name="id_product"]').val();
            var id_product_attribute = $('input[name="id_product_attribute"]').val();
            $.ajax({
                type: "GET",
                url: baseDir + '/modules/paypal/express_checkout/ajax.php',
                data: {get_qty: "1", id_product: id_product, id_product_attribute: id_product_attribute},
                cache: false,
                success: function (result) {
                    if (result == '1') {
                        $('#container_express_checkout').slideDown();
                    } else {
                        $('#container_express_checkout').slideUp();
                    }
                    return true;
                }
            });
        }

        $('select[name^="group_"]').change(function () {
            setTimeout(function () {
                displayExpressCheckoutShortcut()
            }, 500);
        });
        $('.color_pick').click(function () {
            setTimeout(function () {
                displayExpressCheckoutShortcut()
            }, 500);
        });
        if ($('body#product').length > 0) setTimeout(function () {
            displayExpressCheckoutShortcut()
        }, 500);
        var modulePath = 'modules/paypal';
        var subFolder = '/integral_evolution';
        var baseDirPP = baseDir.replace('http:', 'https:');
        var fullPath = baseDirPP + modulePath + subFolder;
        var confirmTimer = false;
        if ($('form[target="hss_iframe"]').length == 0) {
            if ($('select[name^="group_"]').length > 0) displayExpressCheckoutShortcut();
            return false;
        } else {
            checkOrder();
        }

        function checkOrder() {
            if (confirmTimer == false) confirmTimer = setInterval(getOrdersCount, 1000);
        }
    });
    var productsexport = 'Select format and fields for import';
    !function (f, b, e, v, n, t, s) {
        if (f.fbq) return;
        n = f.fbq = function () {
            n.callMethod ?
                n.callMethod.apply(n, arguments) : n.queue.push(arguments)
        };
        if (!f._fbq) f._fbq = n;
        n.push = n;
        n.loaded = !0;
        n.version = '2.0';
        n.queue = [];
        t = b.createElement(e);
        t.async = !0;
        t.src = v;
        s = b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t, s)
    }(window,
        document, 'script', 'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '289350344815899'); // Insert your pixel ID here.
    fbq('track', 'PageView');
    fbq('track', 'AddToCart');
    fbq('track', 'AddToWishlist');
    fbq('track', 'Purchase', {value: 0.00, currency: 'USD'});
    fbq('track', 'Purchase', {value: 0.00, currency: 'EUR'})
    var vmt_pi = {
        'trackingId': 'de-UK5N94WIX6',
        'version': 's_0.0.1'
    };
    var vmt = {};
    (function (d, p) {
        var vmtr = d.createElement('script');
        vmtr.type = 'text/javascript';
        vmtr.async = true;
        var cachebuster = Math.round(new Date().getTime() / 1000);
        vmtr.src = ('https:' == p ? 'https' : 'http') + '://www.ladenzeile.de/controller/visualMetaTrackingJs?cb=' + cachebuster;
        var s = d.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(vmtr, s);
    })(document, document.location.protocol);
    // fixes safari back cache button
    window.onpageshow = function (event) {
        if (event.persisted) {
            window.location.reload()
        }
    };

    // Instantiate the tracking class
    var analyticsEvents = new AnalyticsEvents();

    // page controller
    var controllerName = 'index';
    var compliantModuleName = '';
    var isOrder = 0;
    var isCheckout = 0;
    //////////////////

    var idShop;
    var order;
    var pageTrack;
    var product;
    var products;

    // value for register the checkoutEvent
    var checkoutEvent;
    ////////////////////////////

    // pass tracking features
    analyticsEvents.trackingFeatures = guaTrackingFeatures;

    // scroll tracking values
    analyticsEvents.initPosition = 1;

    // list names
    analyticsEvents.list = 'Home Page';
    analyticsEvents.filterList = 'Filtered Results';
    analyticsEvents.instantSearchList = 'Instant Search Results';
    analyticsEvents.productViewList = 'Product Page';

    // Google remarketing - page type
    analyticsEvents.ecommPageType = 'home';

    // init checkout values
    analyticsEvents.shippingEventName = 'shipping selected';
    analyticsEvents.paymentEventName = 'payment selected';
    analyticsEvents.opcEventName = 'payment / shipping';
    analyticsEvents.pageStep = 1;
    pageTrack = '';

    /////////////////////////////////


    // send Page view to GA
    analyticsEvents.onPageView(pageTrack);
    ///////////////////////////////////////////////

    // Initialize all user events when DOM ready
    document.addEventListener('DOMContentLoaded', initGaEvents, false);

    function initGaEvents() {
        // remove from cart event is visible on all pages
        // Events binded to document.body to avoid firefox fire events on right/central click
        document.body.addEventListener('click', analyticsEvents.eventRemoveFromCart, false);

        // ALL PAGES EXCEPT CHECKOUT OR ORDER
        if (!isCheckout && !isOrder) {
            window.addEventListener('scroll', analyticsEvents.eventScrollList.bind(analyticsEvents), false);

            // init Event Listeners
            document.body.addEventListener('click', analyticsEvents.eventClickProductList, false);
            document.body.addEventListener('click', analyticsEvents.eventAddCartProductList, false);
            document.body.addEventListener('click', analyticsEvents.eventAddCartProductView, false);
        }
        ////////////////////////

        // CHECKOUT PAGE
        if (isCheckout) {
            // Common events for checkout process
            if (analyticsEvents.pageStep === 1 || analyticsEvents.pageStep === 4) {
                // events on summary Cart
                document.body.addEventListener('click', analyticsEvents.eventCartQuantityDelete, false);
                document.body.addEventListener('click', analyticsEvents.eventCartQuantityUp, false);
                document.body.addEventListener('click', analyticsEvents.eventCartQuantityDown, false);
            }

            // specific events for 5 step checkout
            if (controllerName === 'order') {
                if (analyticsEvents.pageStep === 3) {
                    // Detect the carrier selected
                    checkoutEvent = document.querySelector('button[name="processCarrier"]');
                    checkoutEvent.addEventListener('click', analyticsEvents.eventCheckoutStepThree, false);

                } else if (analyticsEvents.pageStep === 4) {
                    // Detect payment method classic || EU compliance (advanced checkout)
                    checkoutEvent = document.querySelector('#HOOK_PAYMENT') || document.querySelector('#confirmOrder');
                    checkoutEvent.addEventListener('click', analyticsEvents.eventCheckoutStepFour, false);
                }

            } else if (controllerName === 'orderopc' && !compliantModuleName) {
                // Detect carrier selected and payment method in OPC
                checkoutEvent = document.querySelector('#HOOK_PAYMENT') || document.querySelector('#confirmOrder');
                checkoutEvent.addEventListener('click', analyticsEvents.eventOpcPrestashop, false);

            } else if (controllerName === 'orderopc' && compliantModuleName === 'onepagecheckout') {
                // Compatible with OPC by Zelarg
                checkoutEvent = document.querySelectorAll('.confirm_button');

                if (!checkoutEvent.length) {
                    checkoutEvent = document.querySelectorAll('.payment_module');
                }

                checkoutEvent.forEach(function (checkoutElement) {
                    checkoutElement.addEventListener('click', analyticsEvents.eventOpcZelarg, false);
                });

            } else if (controllerName === 'orderopc' && compliantModuleName === 'onepagecheckoutps') {
                // Compatible with OPC by PresTeam - don't set the button id because this module has a load delay
                document.body.addEventListener('click', analyticsEvents.eventOpcPrestaTeam, false);

            } else if (controllerName === 'orderopc' && compliantModuleName === 'bestkit_opc') {
                // Compatible with OPC by Best-Kit
                document.body.addEventListener('click', analyticsEvents.eventOpcBestKit, false);

            } else if (controllerName === 'supercheckout') {
                // Compatible with super-checkout by Knowband
                checkoutEvent = document.querySelector('#supercheckout_confirm_order');
                checkoutEvent.addEventListener('click', analyticsEvents.eventOpcSuperCheckout, false);
            }
        }
    }</script>
</body>
</html>