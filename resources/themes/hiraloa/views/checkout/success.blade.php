@extends('shop::layouts.master')

@section('page_title')
    {{ __('shop::app.checkout.success.title') }}
@stop

@section('content-wrapper')
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                <h2>نتیجه تراکنش</h2>
                <ul>
                    <li><a href="{{ route('customer.account.index') }}">مشخصات من</a></li>
                    <li><a href="/">خانه</a></li>
                </ul>
            </div>
        </div>
    </div>
    <section>
        <div class="container">
            <div class="order-success-content pt-5" style="min-height: 300px;">

                <h1 class="pt-5 text-center">{{ __('shop::app.checkout.success.thanks') }}</h1>
                <p class="text-center pt-2">{{ __('shop::app.checkout.success.order-id-info', ['order_id' => $order->increment_id]) }}</p>

                <p class="text-center pt-5">{{ __('shop::app.checkout.success.info') }}</p>

                {{ view_render_event('bagisto.shop.checkout.continue-shopping.before', ['order' => $order]) }}

                <div class="misc-controls text-center py-5">
                    <a style="display: inline-block" href="{{ route('shop.home.index') }}"
                       class="hiraola-btn center">
                        {{ __('shop::app.checkout.cart.continue-shopping') }}
                    </a>
                </div>

                {{ view_render_event('bagisto.shop.checkout.continue-shopping.after', ['order' => $order]) }}

            </div>
        </div>
    </section>
@endsection
