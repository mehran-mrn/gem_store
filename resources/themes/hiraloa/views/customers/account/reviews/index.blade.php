@inject ('productImageHelper', 'Webkul\Product\Helpers\ProductImage')

@extends('shop::layouts.master')

@section('page_title')
    {{ __('shop::app.customer.account.review.index.page-title') }}
@endsection

@section('content-wrapper')
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                <h2>Other</h2>
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li class="active">My Account</li>
                </ul>
            </div>
        </div>
    </div>
    <main class="page-content">
        <div class="account-page-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        @include('shop::customers.account.partials.sidemenu')
                    </div>
                    <div class="col-lg-9">
                        <div class="tab-content myaccount-tab-content" id="account-page-tab-content">
                            <div class="tab-pane fade show active" id="account-dashboard" role="tabpanel"
                                 aria-labelledby="account-dashboard-tab">
                                <div class="myaccount-details">
                                    <div class="account-head mb-10">
                                        <span class="back-icon"><a href="{{ route('customer.account.index') }}"><i class="icon icon-menu-back"></i></a></span>

                                        <span class="account-heading">{{ __('shop::app.customer.account.review.index.title') }}</span>

                                        @if (count($reviews) > 1)
                                            <div class="account-action">
                                                <a href="{{ route('customer.review.deleteall') }}">{{ __('shop::app.wishlist.deleteall') }}</a>
                                            </div>
                                        @endif

                                        <span></span>
                                        <div class="horizontal-rule"></div>
                                    </div>
                                    {!! view_render_event('bagisto.shop.customers.account.reviews.list.before', ['reviews' => $reviews]) !!}
                                    <div class="account-items-list">
                                        @if (! $reviews->isEmpty())
                                            @foreach ($reviews as $review)
                                                <div class="account-item-card mt-15 mb-15">
                                                    <div class="media-info">
                                                        <?php $image = $productImageHelper->getProductBaseImage($review->product); ?>

                                                        <a href="{{ url()->to('/').'/products/'.$review->product->url_key }}" title="{{ $review->product->name }}">
                                                            <img class="media" src="{{ $image['small_image_url'] }}"/>
                                                        </a>

                                                        <div class="info">
                                                            <div class="product-name">
                                                                <a href="{{ url()->to('/').'/products/'.$review->product->url_key }}" title="{{ $review->product->name }}">
                                                                    {{$review->product->name}}
                                                                </a>
                                                            </div>

                                                            <div class="stars mt-10">
                                                                @for($i=0 ; $i < $review->rating ; $i++)
                                                                    <span class="icon star-icon"></span>
                                                                @endfor
                                                            </div>

                                                            <div class="mt-10">
                                                                {{ $review->comment }}
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="operations">
                                                        <a class="mb-50" href="{{ route('customer.review.delete', $review->id) }}"><span class="icon trash-icon"></span></a>
                                                    </div>
                                                </div>
                                                <div class="horizontal-rule mb-10 mt-10"></div>
                                            @endforeach
                                        @else
                                            <div class="empty mt-15">
                                                {{ __('customer::app.reviews.empty') }}
                                            </div>
                                        @endif

                                    </div>
                                    {!! view_render_event('bagisto.shop.customers.account.reviews.list.after', ['reviews' => $reviews]) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection