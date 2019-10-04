@inject ('productImageHelper', 'Webkul\Product\Helpers\ProductImage')

@extends('shop::layouts.master')

@section('page_title')
    {{ __('shop::app.customer.account.review.view.page-title') }}
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
                                        <span class="account-heading">Reviews</span>
                                        <div class="horizontal-rule"></div>
                                    </div>
                                    @if (count($reviews))
                                        @foreach ($reviews as $review)
                                            <div class="account-item-card mt-15 mb-15">
                                                <div class="media-info">
                                                    <?php $image = $productImageHelper->getGalleryImages($review->product); ?>
                                                    <img class="media" src="{{ $image[0]['small_image_url'] }}" />

                                                    <div class="info mt-20">
                                                        <div class="product-name">{{$review->product->name}}</div>

                                                        <div>
                                                            @for($i=0;$i<$review->rating;$i++)
                                                                <span class="icon star-icon"></span>
                                                            @endfor
                                                        </div>

                                                        <div>
                                                            {{ $review->comment }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="horizontal-rule mb-10 mt-10"></div>
                                        @endforeach
                                    @else
                                        <div class="empty">
                                            {{ __('customer::app.reviews.empty') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection