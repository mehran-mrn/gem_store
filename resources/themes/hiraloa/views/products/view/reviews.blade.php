@inject ('reviewHelper', 'Webkul\Product\Helpers\Review')

{!! view_render_event('bagisto.shop.products.view.reviews.after', ['product' => $product]) !!}
@if ($total = $reviewHelper->getTotalReviews($product))
    <span class="number">
                    {{ $reviewHelper->getAverageRating($product) }}
                </span>

    <span class="stars">
        @for ($i = 1; $i <= round($reviewHelper->getAverageRating($product)); $i++)
            <li><i class="fa fa-star"></i></li>
        @endfor
        @if($i<5)
            @for ($i ; $i <= 5; $i++)
                <li class="silver-color"><i class="fa fa-star"></i></li>
            @endfor
        @endif

                </span>

    <div class="total-reviews">
        {{ __('shop::app.products.total-reviews', ['total' => $total]) }}
    </div>


    <form class="form-horizontal" id="form-review">
        <div id="review">
            @foreach ($reviewHelper->getReviews($product)->paginate(10) as $review)
                <table class="table table-striped table-bordered">
                    <tbody>
                    <tr>
                        <td style="width: 30%;">
                            <strong>{{ __('shop::app.products.by', ['name' => $review->name]) }}</strong></td>
                        <td style="width: 39%;"><strong>{{ $review->title }}</strong></td>
                        <td class="text-right">{{ core()->formatDate($review->created_at, 'F d, Y') }}</td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <p>{{ $review->comment }}</p>
                            <div class="rating-box">
                                <ul>
                                    @for ($i = 1; $i <= $review->rating; $i++)
                                        <li><i class="fa fa-star"></i></li>
                                    @endfor
                                    @if($i<5)
                                        @for ($i ; $i <= 5; $i++)
                                            <li class="silver-color"><i class="fa fa-star"></i></li>
                                        @endfor
                                    @endif
                                </ul>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            @endforeach

            <a href="{{ route('shop.reviews.index', $product->url_key) }}" class="view-all">
                {{ __('shop::app.products.view-all') }}
            </a>
        </div>

        @if (core()->getConfigData('catalog.products.review.guest_review') || auth()->guard('customer')->check())

            <a href="{{ route('shop.reviews.create', $product->url_key) }}" class="hiraola-btn hiraola-btn_dark">{{ __('shop::app.products.write-review-btn') }}</a>

        @endif

    </form>
    {!! view_render_event('bagisto.shop.products.view.reviews.after', ['product' => $product]) !!}


@else
    @if (core()->getConfigData('catalog.products.review.guest_review') || auth()->guard('customer')->check())
        <a href="{{ route('shop.reviews.create', $product->url_key) }}" class="hiraola-btn hiraola-btn_dark">{{ __('shop::app.products.write-review-btn') }}</a>
    @endif
@endif

