@inject ('reviewHelper', 'Webkul\Product\Helpers\Review')

{!! view_render_event('bagisto.shop.products.view.reviews.after', ['product' => $product]) !!}

<form class="form-horizontal" id="form-review">
    <div id="review">
        <table class="table table-striped table-bordered">
            <tbody>
            <tr>
                <td style="width: 50%;"><strong>Customer</strong></td>
                <td class="text-right">25/04/2019</td>
            </tr>
            <tr>
                <td colspan="2">
                    <p>Good product! Thank you very much</p>
                    <div class="rating-box">
                        <ul>
                            <li><i class="fa fa-star-of-david"></i></li>
                            <li><i class="fa fa-star-of-david"></i></li>
                            <li><i class="fa fa-star-of-david"></i></li>
                            <li><i class="fa fa-star-of-david"></i></li>
                            <li><i class="fa fa-star-of-david"></i></li>
                        </ul>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>

    <h2>Write a review</h2>
    <div class="form-group required">
        <div class="col-sm-12 p-0">
            <label>Your Email <span class="required">*</span></label>
            <input class="review-input" type="email" name="con_email" id="con_email" required>
        </div>
    </div>
    <div class="form-group required second-child">
        <div class="col-sm-12 p-0">
            <label class="control-label">Share your opinion</label>
            <textarea class="review-textarea" name="con_message" id="con_message"></textarea>
            <div class="help-block"><span class="text-danger">Note:</span> HTML is not
                translated!</div>
        </div>
    </div>
    <div class="form-group last-child required">
        <div class="col-sm-12 p-0">
            <div class="your-opinion">
                <label>Your Rating</label>
                <span>
                                                        <select class="star-rating">
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                        </select>
                                                    </span>
            </div>
        </div>
        <div class="hiraola-btn-ps_right">
            <a href="javascript:void(0)" class="hiraola-btn hiraola-btn_dark">Continue</a>
        </div>
    </div>
</form>
{!! view_render_event('bagisto.shop.products.view.reviews.after', ['product' => $product]) !!}












@if ($total = $reviewHelper->getTotalReviews($product))
    <div class="rating-reviews">
        <div class="rating-header">
            {{ __('shop::app.products.reviews-title') }}
        </div>

        <div class="overall">
            <div class="review-info">

                <span class="number">
                    {{ $reviewHelper->getAverageRating($product) }}
                </span>

                <span class="stars">
                    @for ($i = 1; $i <= round($reviewHelper->getAverageRating($product)); $i++)

                        <span class="icon star-icon"></span>

                    @endfor
                </span>

                <div class="total-reviews">
                    {{ __('shop::app.products.total-reviews', ['total' => $total]) }}
                </div>

            </div>

            @if (core()->getConfigData('catalog.products.review.guest_review') || auth()->guard('customer')->check())
                <a href="{{ route('shop.reviews.create', $product->url_key) }}" class="btn btn-lg btn-primary">
                    {{ __('shop::app.products.write-review-btn') }}
                </a>
            @endif

        </div>

        <div class="reviews">

            @foreach ($reviewHelper->getReviews($product)->paginate(10) as $review)
                <div class="review">
                    <div class="title">
                        {{ $review->title }}
                    </div>

                    <span class="stars">
                        @for ($i = 1; $i <= $review->rating; $i++)

                            <span class="icon star-icon"></span>

                        @endfor
                    </span>

                    <div class="message">
                        {{ $review->comment }}
                    </div>

                    <div class="reviewer-details">
                        <span class="by">
                            {{ __('shop::app.products.by', ['name' => $review->name]) }},
                        </span>

                        <span class="when">
                            {{ core()->formatDate($review->created_at, 'F d, Y') }}
                        </span>
                    </div>
                </div>
            @endforeach

            <a href="{{ route('shop.reviews.index', $product->url_key) }}" class="view-all">
                {{ __('shop::app.products.view-all') }}
            </a>

        </div>
    </div>
@else
    @if (core()->getConfigData('catalog.products.review.guest_review') || auth()->guard('customer')->check())
        <div class="rating-reviews">
            <div class="rating-header">
                <a href="{{ route('shop.reviews.create', $product->url_key) }}" class="btn btn-lg btn-primary">
                    {{ __('shop::app.products.write-review-btn') }}
                </a>
            </div>
        </div>
    @endif
@endif

