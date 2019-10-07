@extends('shop::layouts.master')

@section('page_title')
    {{ __('shop::app.home.page-title') }}
@endsection

@php
    $channel = core()->getCurrentChannel();

    $homeSEO = $channel->home_seo;

    if (isset($homeSEO)) {
        $homeSEO = json_decode($channel->home_seo);

        $metaTitle = $homeSEO->meta_title;

        $metaDescription = $homeSEO->meta_description;

        $metaKeywords = $homeSEO->meta_keywords;
    }
@endphp

@section('head')

    @if (isset($homeSEO))
        @isset($metaTitle)
            <meta name="title" content="{{ $metaTitle }}" />
        @endisset

        @isset($metaDescription)
            <meta name="description" content="{{ $metaDescription }}" />
        @endisset

        @isset($metaKeywords)
            <meta name="keywords" content="{{ $metaKeywords }}" />
        @endisset
    @endif
@endsection

@section('content-wrapper')
    {!! view_render_event('bagisto.shop.home.content.before') !!}
    <div class="">
        <div class="banner-item img-hover_effect">
            <a href="shop-left-sidebar.html">
                <img class="img-full" src="themes/hiraloa/assets/images/banner/1_1.jpg" alt="Hiraola's Banner">
            </a>
        </div>
    </div>


    {!! DbView::make($channel)->field('home_page_content')->with(['sliderData' => $sliderData])->render() !!}




    {{ view_render_event('bagisto.shop.home.content.after') }}

@endsection
