<header class="header-main_area">
    <div class="header-middle_area d-none d-lg-block">
        <div class="container">
            <div class="row">

                <div class="col-lg-3">
                    <div class="header-logo">
                        <a href="{{ route('shop.home.index') }}">

                            @if ($logo = core()->getCurrentChannel()->logo_url)
                                <img class="logo" src="{{ $logo }}"/>
                            @else
                                <img class="logo" src="{{ bagisto_asset('images/logo.svg') }}"/>
                            @endif
                        </a>

                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hm-form_area">
                        <form role="search" action="{{ route('shop.search.index') }}" method="GET" class="hm-searchbox">
                            <input type="text" required name="term"
                                   placeholder="{{ __('shop::app.header.search-text') }}">
                            <button class="li-btn" type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                    <?php
                    $query = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);
                    $searchTerm = explode("&", $query);

                    foreach ($searchTerm as $term) {
                        if (strpos($term, 'term') !== false) {
                            $serachQuery = $term;
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    @include('shop::layouts.header.nav-menu.navmenu')
</header>

@push('scripts')
    <script>
        $(document).ready(function () {

            $('body').delegate('#search, .icon-menu-close, .icon.icon-menu', 'click', function (e) {
                toggleDropdown(e);
            });

            function toggleDropdown(e) {
                var currentElement = $(e.currentTarget);

                if (currentElement.hasClass('icon-search')) {
                    currentElement.removeClass('icon-search');
                    currentElement.addClass('icon-menu-close');
                    $('#hammenu').removeClass('icon-menu-close');
                    $('#hammenu').addClass('icon-menu');
                    $("#search-responsive").css("display", "block");
                    $("#header-bottom").css("display", "none");
                } else if (currentElement.hasClass('icon-menu')) {
                    currentElement.removeClass('icon-menu');
                    currentElement.addClass('icon-menu-close');
                    $('#search').removeClass('icon-menu-close');
                    $('#search').addClass('icon-search');
                    $("#search-responsive").css("display", "none");
                    $("#header-bottom").css("display", "block");
                } else {
                    currentElement.removeClass('icon-menu-close');
                    $("#search-responsive").css("display", "none");
                    $("#header-bottom").css("display", "none");
                    if (currentElement.attr("id") == 'search') {
                        currentElement.addClass('icon-search');
                    } else {
                        currentElement.addClass('icon-menu');
                    }
                }
            }
        });
    </script>
@endpush
