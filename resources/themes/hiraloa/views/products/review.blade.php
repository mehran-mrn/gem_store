@inject ('reviewHelper', 'Webkul\Product\Helpers\Review')

{!! view_render_event('bagisto.shop.products.review.before', ['product' => $product]) !!}

@if ($total = $reviewHelper->getTotalReviews($product))
    <ul class="text-center">
        @for ($i = 1; $i <= round($reviewHelper->getAverageRating($product)); $i++)
            <li><i class="fa fa-star" style="color: #a5a2a240!important;"></i></li>
        @endfor
        @if($i<=5)
            @for ($i ; $i <= 5; $i++)
            <li class="silver-color"><i class="fa fa-star"></i></li>
            @endfor
        @endif

    </ul>
@else
    <ul  class="text-center">
        @for ($i = 1; $i <= 5; $i++)
            <li><i class="fa fa-star-half-alt" style="color: #a5a2a240!important;"></i></li>
    @endfor
    </ul>
@endif

{!! view_render_event('bagisto.shop.products.review.after', ['product' => $product]) !!}