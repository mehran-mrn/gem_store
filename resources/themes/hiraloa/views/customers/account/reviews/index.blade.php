@inject ('productImageHelper', 'Webkul\Product\Helpers\ProductImage')

@extends('shop::layouts.master')

@section('page_title')
    {{ __('shop::app.customer.account.review.index.page-title') }}
@endsection

@section('content-wrapper')
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                <h2>{{ __('shop::app.customer.account.review.index.title') }}</h2>
                <ul>
                    <li><a href="{{ route('customer.account.index') }}">مشخصات من</a></li>
                    <li><a href="/">خانه</a></li>
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
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-3 p-0">
                                                                <div class="card-img">
                                                                    <?php $image = $productImageHelper->getProductBaseImage($review->product); ?>
                                                                    <a href="{{ url()->to('/').'/products/'.$review->product->url_key }}"
                                                                       title="{{ $review->product->name }}"
                                                                       class="text-center">
                                                                        <img class="img-full"
                                                                             src="{{ $image['small_image_url'] }}"/>
                                                                    </a>
                                                                </div>
                                                                <div class="text-center">
                                                                    <a href="{{ url()->to('/').'/products/'.$review->product->url_key }}"
                                                                       title="{{ $review->product->name }}">
                                                                        {{$review->product->name}}
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="col-9 p-0">
                                                                <div class="card-header bg--white">
                                                                    <h6>
                                                                        <strong class="card-title">{{$review->title}}</strong>
                                                                        @if($review['status']=='approved')
                                                                            <span class="badge badge-success float-right">{{$review->status}}</span>
                                                                    </h6>
                                                                    @elseif($review['status']=='pending')
                                                                        <span class="badge badge-warning float-right">{{$review->status}}</span></h6>
                                                                    @endif
                                                                </div>
                                                                <div class="description m-3">
                                                                    {{ $review->comment }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card-footer">
                                                            <div class="row">
                                                                <div class="col-10">
                                                                    <div class="stars mt-2">
                                                                        @for($i=0 ; $i < $review->rating ; $i++)
                                                                            <span class="fa fa-star"></span>
                                                                        @endfor
                                                                    </div>
                                                                </div>
                                                                <div class="col-2">
                                                                    <a class="hiraola-btn hiraola-btn_sm  float-right"
                                                                       href="{{ route('customer.review.delete', $review->id) }}"><span
                                                                                class="fa fa-trash"></span></a>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="account-item-card mt-15 mb-15">


                                                    <div class="operations">

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