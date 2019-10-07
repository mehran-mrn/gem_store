@extends('hiraloa::layouts.master')

@section('page_title')
    {{ __('shop::app.search.page-title') }}
@endsection

@section('content-wrapper')
    @if (! $results)
        <div class="error404-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 ml-auto mr-auto text-center">
                        <div class="search-error-wrapper">
                            <h1><i class="fa fa-exclamation-triangle"></i></h1>
                            <h4>{{  __('shop::app.search.no-results') }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endif

    @if ($results)
        <div class="main mb-30" style="min-height: 27vh;">
            @if ($results->isEmpty())
                <div class="error404-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 ml-auto mr-auto text-center">
                                <div class="search-error-wrapper">
                                    <h1><i class="fa fa-exclamation-triangle"></i></h1>
                                    <h4>{{  __('shop::app.search.no-results') }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
            <!-- Begin Hiraola's Content Wrapper Area -->
                <div class="hiraola-content_wrapper">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 order-2 order-lg-2">



                            <div class="shop-product-wrap grid gridview-4 row">
                                @foreach ($results as $productFlat)
                                    <div class="col-lg-3">
                                        @include('hiraloa::products.list.card', ['product' => $productFlat->product])
                                    </div>
                                @endforeach
                            </div>

                            @include('ui::datagrid.pagination')
                            </div>

                        </div>
                    </div>
                </div>
            @endif
        </div>
    @endif
@endsection