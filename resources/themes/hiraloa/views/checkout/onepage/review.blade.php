<div class="form-container">
    <div class="address-summary row">
        @if ($billingAddress = $cart->billing_address)
            <div class="billing-address col-md-6">
                <div class="card-title mb-20">
                    <b>{{ __('shop::app.checkout.onepage.billing-address') }}</b>
                </div>

                <div class="card-content ">
                    <ul class="address-card-list ">
                        <li class="mb-2">
                            {{ $billingAddress->name }}
                        </li>
                        <li class="mb-1">
                            {{ $billingAddress->address1 }},<br/> {{ $billingAddress->state }}
                        </li>
                        <li class="mb-1">
                            {{ core()->country_name($billingAddress->country) }} {{ $billingAddress->postcode }}
                        </li>

                        <span class="horizontal-rule mb-2 mt-2"></span>

                        <li class="mb-2">
                            {{ __('shop::app.checkout.onepage.contact') }} : {{ $billingAddress->phone }}
                        </li>
                    </ul>
                </div>
            </div>
        @endif

        @if ($shippingAddress = $cart->shipping_address)
            <div class="shipping-address  col-md-6">
                <div class="card-title mb-20">
                    <b>{{ __('shop::app.checkout.onepage.shipping-address') }}</b>
                </div>

                <div class="card-content address-box">
                    <ul>
                        <li class="mb-2">
                            {{ $shippingAddress->name }}
                        </li>
                        <li class="mb-1">
                            {{ $shippingAddress->address1 }},<br/> {{ $shippingAddress->state }}
                        </li>
                        <li class="mb-1">
                            {{ core()->country_name($shippingAddress->country) }} {{ $shippingAddress->postcode }}
                        </li>

                        <span class="horizontal-rule mb-15 mt-15"></span>

                        <li class="mb-1">
                            {{ __('shop::app.checkout.onepage.contact') }} : {{ $shippingAddress->phone }}
                        </li>
                    </ul>
                </div>
            </div>
        @endif

    </div>

    @inject ('productImageHelper', 'Webkul\Product\Helpers\ProductImage')

    <div class=" bg mt-20">

        @foreach ($cart->items as $item)

            <?php
                $product = $item->product;

                if ($product->type == "configurable")
                    $productBaseImage = $productImageHelper->getProductBaseImage($item->child->product);
                else
                    $productBaseImage = $productImageHelper->getProductBaseImage($item->product);
            ?>


            <div class="panel border-b row" style="margin-bottom: 5px;">
                <div class=" col-md-4">
                    <img src="{{ $productBaseImage['small_image_url'] }}" />
                </div>

                <div class=" col-md-6">

                    {!! view_render_event('bagisto.shop.checkout.name.before', ['item' => $item]) !!}

                    <div class="item-title">
                        {{ $product->name }}
                    </div>

                    {!! view_render_event('bagisto.shop.checkout.name.after', ['item' => $item]) !!}
                    {!! view_render_event('bagisto.shop.checkout.price.before', ['item' => $item]) !!}

                    <div class="row">
                        <span class="title">
                            {{ __('shop::app.checkout.onepage.price') }}
                        </span>
                        <span class="value">
                            {{ core()->currency($item->base_price) }}
                        </span>
                    </div>

                    {!! view_render_event('bagisto.shop.checkout.price.after', ['item' => $item]) !!}
                    {!! view_render_event('bagisto.shop.checkout.quantity.before', ['item' => $item]) !!}

                    <div class="row">
                        <span class="title">
                            {{ __('shop::app.checkout.onepage.quantity') }}
                        </span>
                        <span class="value">
                            {{ $item->quantity }}
                        </span>
                    </div>

                    {!! view_render_event('bagisto.shop.checkout.quantity.after', ['item' => $item]) !!}

                    @if ($product->type == 'configurable')
                        {!! view_render_event('bagisto.shop.checkout.options.after', ['item' => $item]) !!}

                        <div class="summary" >
                            {{ Cart::getProductAttributeOptionDetails($item->child->product)['html'] }}
                        </div>

                        {!! view_render_event('bagisto.shop.checkout.options.after', ['item' => $item]) !!}
                    @endif
                </div>

            </div>
        @endforeach
    </div>

    <div class="panel order-description mt-20">
        <div class="pull-left" >
            <div class="shipping">
                <div class="decorator">
                    <i class="icon shipping-icon"></i>
                </div>

                <div class="text">
                    {{ core()->currency($cart->selected_shipping_rate->base_price) }}

                    <div class="info">
                        {{ $cart->selected_shipping_rate->method_title }}
                    </div>
                </div>
            </div>

            <div class="payment">
                <div class="decorator">
                    <i class="icon payment-icon"></i>
                </div>

                <div class="text">
                    {{ core()->getConfigData('sales.paymentmethods.' . $cart->payment->method . '.title') }}
                </div>
            </div>

        </div>

        <div class="pull-right" style="width: 40%; float: left;">
            <slot name="summary-section"></slot>
        </div>
    </div>
</div>