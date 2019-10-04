@extends('hiraloa::layouts.master')

@section('page_title')
    {{ __('admin::app.error.401.page-title') }}
@stop

@section('content-wrapper')
    <!-- Begin Hiraola's Breadcrumb Area -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">

            </div>
        </div>
    </div>
    <!-- Hiraola's Breadcrumb Area End Here -->

    <!-- Begin Hiraola's Error 404 Page Area -->
    <div class="error404-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 ml-auto mr-auto text-center">
                    <div class="search-error-wrapper">
                        <h1>{{ __('admin::app.error.401.name') }}</h1>
                        <h2>{{ __('admin::app.error.401.title') }}</h2>
                        <p class="short_desc">{{ __('admin::app.error.401.message') }}</p>
                        <form action="javascript:void(0)" class="error-form">
                            <div class="inner-error_form">
                                <input type="text" placeholder="Search..." class="error-input-text">
                                <button type="submit" class="error-search_btn"><i class="fa fa-search"></i></button>
                            </div>
                        </form>
                        <div class="hiraola-btn-ps_center"></div>
                        <a href="{{ route('shop.home.index') }}" class="hiraola-error_btn">{{ __('admin::app.error.go-to-home') }}</a>
                        <div class="error-graphic icon-404" style="margin-left: 10% ;"></div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hiraola's Error 404 Page End Here -->



@endsection