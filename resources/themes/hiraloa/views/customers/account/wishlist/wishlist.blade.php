@extends('hiraloa::layouts.master')

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
        @inject ('productImageHelper', 'Webkul\Product\Helpers\ProductImage')
        <div class="account-page-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        @include('shop::customers.account.partials.sidemenu')
                    </div>
                    <div class="col-lg-9">
                        <div class="account-items-list">

                        @if (count($items))
                            <div class="account-action">
                                <a href="{{ route('customer.wishlist.removeall') }}">{{ __('shop::app.wishlist.deleteall') }}</a>
                            </div>
                    @endif
                    <!--Begin Hiraola's Wishlist Area -->
                        <div class="hiraola-wishlist_area">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12">
                                        <form action="javascript:void(0)">
                                            <div class="table-content table-responsive">
                                                {!! view_render_event('bagisto.shop.customers.account.wishlist.list.before', ['wishlist' => $items]) !!}
                                                @if ($items->count())




                                                    <table class="table">
                                                        <thead>
                                                        <tr>
                                                            <th class="hiraola-product_remove">remove</th>
                                                            <th class="hiraola-product-thumbnail">images</th>
                                                            <th class="cart-product-name">Product</th>
                                                            <th class="hiraola-cart_btn">add to cart</th>
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
                        <!-- Hiraola's Wishlist Area End Here -->
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection