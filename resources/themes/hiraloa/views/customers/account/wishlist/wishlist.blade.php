@extends('hiraloa::layouts.master')

@section('content-wrapper')
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                <h2>{{ __('shop::app.customer.account.wishlist.wishlist.title') }}</h2>
                <ul>
                    <li><a href="{{ route('customer.account.index') }}">مشخصات من</a></li>
                    <li><a href="/">خانه</a></li>
                </ul>
            </div>
        </div>
    </div>
    <main class="page-content">
        @inject ('productImageHelper', 'Webkul\Product\Helpers\ProductImage')
        <div class="account-page-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        @include('shop::customers.account.partials.sidemenu')
                    </div>
                    <div class="col-lg-9">
                        <div class="tab-content myaccount-tab-content" id="account-page-tab-content">
                            <div class="account-items-list">
                                @if (count($items))
                                    <div class="account-action">
                                        <a href="{{ route('customer.wishlist.removeall') }}"
                                           class="hiraola-btn hiraola-btn_sm col-2 float-right">{{ __('shop::app.wishlist.deleteall') }}</a>
                                    </div>
                                @endif
                                <div class="hiraola-wishlist_area">
                                        <form action="javascript:void(0)">
                                            <div class="table-content table-responsive ">
                                                {!! view_render_event('bagisto.shop.customers.account.wishlist.list.before', ['wishlist' => $items]) !!}
                                                @if ($items->count())
                                                    <table class="table" style="border-width:unset!important;">
                                                        <thead>
                                                        <tr>
                                                            <th class="hiraola-product_remove">حذف</th>
                                                            <th class="hiraola-product-thumbnail">تصویر</th>
                                                            <th class="cart-product-name">محصول</th>
                                                            <th class="hiraola-cart_btn">افزودن به سبک خرید</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach ($items as $item)
                                                            @php
                                                                $image = $productImageHelper->getProductBaseImage($item->product);
                                                            @endphp
                                                            @inject ('reviewHelper', 'Webkul\Product\Helpers\Review')
                                                            <tr>
                                                                <td class="hiraola-product_remove"><a
                                                                            href="{{ route('customer.wishlist.remove', $item->id) }}"><i
                                                                                class="fa fa-trash"
                                                                                title="Remove"></i></a></td>
                                                                <td class="hiraola-product-thumbnail"><a
                                                                            href="javascript:void(0)"><img
                                                                                src="{{ $image['small_image_url'] }}"
                                                                                alt="Hiraola's Wishlist Thumbnail"></a>
                                                                </td>
                                                                <td class="hiraola-product-name"><a
                                                                            href="javascript:void(0)">
                                                                        {{$item->product->name}}
                                                                        @for($i=1;$i<=$reviewHelper->getAverageRating($item->product);$i++)
                                                                            <span class="icon star-icon"></span>
                                                                        @endfor
                                                                    </a></td>

                                                                <td class="hiraola-cart_btn"><a
                                                                            href="{{ route('customer.wishlist.move', $item->id) }}">{{ __('shop::app.wishlist.move-to-cart') }}</a>
                                                                </td>
                                                            </tr>

                                                        @endforeach

                                                        </tbody>
                                                    </table>
                                                    {!! view_render_event('bagisto.shop.customers.account.wishlist.list.after', ['wishlist' => $items]) !!}
                                                @else
                                                    <div class="empty">
                                                        {{ __('shop::app.wishlist.empty') }}
                                                    </div>
                                                @endif
                                            </div>
                                        </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection