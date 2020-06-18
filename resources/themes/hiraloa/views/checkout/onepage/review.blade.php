<div class="form-container">
        <div class="row">
{{--            @if ($billingAddress = $cart->billing_address)--}}
{{--                <div class="col-12 col-xs-12">--}}
{{--                    <div class="card billing-address">--}}
{{--                        <div class="card-header">--}}
{{--                            <strong class="card-title">{{ __('shop::app.checkout.onepage.billing-address') }}</strong>--}}
{{--                            <strong class="float-right">{{ $billingAddress->name }}</strong>--}}
{{--                        </div>--}}
{{--                        <div class="card-body">--}}
{{--                            <ul class="address-card-list ">--}}
{{--                                <li class="mb-1">--}}
{{--                                    --}}{{--                            <strong><span>کشور: </span> {{ core()->country_name($billingAddress->country) }}</strong>--}}
{{--                                    <span><strong>استان: </strong> {{ $billingAddress->state }}</span>--}}
{{--                                    <span class="float-right"><strong>شهر: </strong> {{ $billingAddress->city }}</span>--}}
{{--                                </li>--}}
{{--                                <li class="mb-1">--}}
{{--                                    <span><strong>محله: </strong> {{ $billingAddress->address1 }}</span>--}}
{{--                                </li>--}}
{{--                                <span class="horizontal-rule mb-2 mt-2"></span>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                        <div class="card-footer">--}}
{{--                            <h6><span>کد پستی: </span>{{ $billingAddress->postcode }}</h6>--}}
{{--                            <h6><span>شماره تماس: </span>{{ $billingAddress->phone }}</h6>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            @endif--}}
            @if ($shippingAddress = $cart->shipping_address)
                <div class="col-12 col-md-12 col-xs-12">
                    <div class="card billing-address">
                        <div class="card-header">
                            <strong class="card-title">{{ __('shop::app.checkout.onepage.shipping-address') }}</strong>
                            <strong class="float-right">{{ $shippingAddress->name }}</strong>
                        </div>
                        <div class="card-body">
                            <ul class="address-card-list ">
                                <li class="mb-1">
                                    {{--                            <strong><span>کشور: </span> {{ core()->country_name($billingAddress->country) }}</strong>--}}
                                    <span><strong>استان: </strong> {{ $shippingAddress->state }}</span>
                                    <span class="float-right"><strong>شهر: </strong> {{ $shippingAddress->city }}</span>
                                </li>
                                <li class="mb-1">
                                    <span><strong>محله: </strong> {{ $shippingAddress->address1 }}</span>
                                </li>
                                <span class="horizontal-rule mb-2 mt-2"></span>
                            </ul>
                        </div>
                        <div class="card-footer">
                            <h6><span>کد پستی: </span>{{ $shippingAddress->postcode }}</h6>
                            <h6><span>شماره تماس: </span>{{ $shippingAddress->phone }}</h6>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    @inject ('productImageHelper', 'Webkul\Product\Helpers\ProductImage')
    <div class="row pt-2">
        @foreach ($cart->items as $item)
            <div class="col-6 col-xs-12">
                <div class="card">
                    <div class="card-img-top">
                        <?php
                        $product = $item->product;
                        if ($product->type == "configurable")
                            $productBaseImage = $productImageHelper->getProductBaseImage($item->child->product);
                        else
                            $productBaseImage = $productImageHelper->getProductBaseImage($item->product);
                        ?>
                        <img class="img-full" src="{{ $productBaseImage['small_image_url'] }}"/>

                    </div>
                    <div class="card-body">
                        {!! view_render_event('bagisto.shop.checkout.name.before', ['item' => $item]) !!}
                        <div class="row">
                            <div class="col-12 text-center"><strong>{{ $product->name }}</strong></div>
                            {!! view_render_event('bagisto.shop.checkout.name.after', ['item' => $item]) !!}
                            {!! view_render_event('bagisto.shop.checkout.price.before', ['item' => $item]) !!}
                        </div>
                        <div class="row text-center">
                            <div class="col-6">
                                <span class="title">قیمت:</span>
                            </div>
                            <div class="col-6">
                                <span class="value">{{ core()->currency($item->base_price) }}</span>
                            </div>
                        </div>
                        {!! view_render_event('bagisto.shop.checkout.price.after', ['item' => $item]) !!}
                        {!! view_render_event('bagisto.shop.checkout.quantity.before', ['item' => $item]) !!}

                        <div class="row text-center">
                            <div class="col-6">
                                <span class="title">تعداد:</span>
                            </div>
                            <div class="col-6">
                                <span class="value">{{ $item->quantity }}</span>
                            </div>
                        </div>
                        {!! view_render_event('bagisto.shop.checkout.quantity.after', ['item' => $item]) !!}

                        @if ($product->type == 'configurable')
                            {!! view_render_event('bagisto.shop.checkout.options.after', ['item' => $item]) !!}
                            <div class="summary">
                                {{ Cart::getProductAttributeOptionDetails($item->child->product)['html'] }}
                            </div>
                            {!! view_render_event('bagisto.shop.checkout.options.after', ['item' => $item]) !!}
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="card order-description mt-3">
        <div class="card-bod">
            <div class="shipping pt-2">
                <div class="decorator text-center">
                    <i class="fa fa-shipping-fast fa-3x"></i>
                </div>
                <div class="text-center">
                    <strong>{{ core()->currency($cart->selected_shipping_rate->base_price) }}</strong>
                    <span class="info">{{ $cart->selected_shipping_rate->method_title }}</span>
                </div>
            </div>
            <div class="payment pt-2 text-center">
                <div class="decorator text-center"><i class="fa fa-wallet"></i></div>
                <div class="text">{{ core()->getConfigData('sales.paymentmethods.' . $cart->payment->method . '.title') }}</div>
            </div>
            <div class="pull-right" style="width: 40%; float: left;">
                <slot name="summary-section"></slot>
            </div>
        </div>
    </div>
</div>