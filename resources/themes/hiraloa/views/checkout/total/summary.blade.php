<div class="your-order">
    <h3>{{ __('shop::app.checkout.total.order-summary') }}</h3>
    <div class="your-order-table table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th class="cart-product-name">Product</th>
                <th class="cart-product-total">Total</th>
            </tr>
            </thead>
            <tbody>
            @foreach($cart['items'] as $item)
                <tr class="cart_item">
                    <td class="cart-product-name"> {{$item['name']}}<strong class="product-quantity">
                            × {{$item['quantity']}}</strong></td>
                    <td class="cart-product-total"><span class="amount">{{$item['price']}}</span></td>
                </tr>
            @endforeach
            </tbody>
            <tfoot >

            @if ($cart->selected_shipping_rate)
                <tr class="cart-subtotal">
                    <th>{{ __('shop::app.checkout.total.delivery-charges') }}</th>
                    <td><span class="amount">{{ core()->currency($cart->selected_shipping_rate->base_price) }}</span></td>
                </tr>
            @endif

            @if ($cart->base_tax_total)
                <tr class="cart-subtotal">
                    <th>{{ __('shop::app.checkout.total.tax') }}</th>
                    <td><span class="amount">{{ core()->currency($cart->base_tax_total) }}</span></td>
                </tr>

            @endif
            <tr class="order-total">
                <th>{{ __('shop::app.checkout.total.grand-total') }}</th>
                <td><strong><span class="amount">{{ core()->currency($cart->base_grand_total) }}</span></strong></td>
            </tr>
            </tfoot>
        </table>
    </div>

    <div class="payment-method">
        @if (! request()->is('checkout/cart'))
            @if (!$cart->coupon_code)
                <div class="discount">
                    <div class="discount-group">
                        <form class="coupon-form" method="post" @submit.prevent="onSubmit">
                            <div class="control-group mt-20" >
                                <input type="text" class="control" value=""  name="code"  >
                                <button class="btn btn-lg btn-black">{{ __('shop::app.checkout.onepage.apply-coupon') }}</button>

                            </div>
                        </form>
                    </div>
                </div>
            @else
                <div class="discount-details-group">
                    <div class="item-detail">
                        <label>{{ __('shop::app.checkout.total.coupon-applied') }}</label>

                        <label class="right" style="display: inline-flex; align-items: center;">
                            <b>{{ $cart->coupon_code }}</b>

                            <span class="icon cross-icon" title="{{ __('shop::app.checkout.total.remove-coupon') }}" ></span>
                        </label>
                    </div>
                </div>
            @endif
        @endif

    </div>
    <div class="payment-method">
        <div class="payment-accordion">
            <div id="accordion">

                <div class="card">
                    <div class="card-header" id="#payment-3">
                        <h5 class="panel-title">
                            <a href="javascript:void(0)" class="collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                PayPal
                            </a>
                        </h5>
                    </div>
                    <div id="collapseThree" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                            <p>Make your payment directly into our bank account. Please use your Order
                                ID as the payment
                                reference. Your order won’t be shipped until the funds have cleared in
                                our account.</p>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>


<div class="order-summary">


    <div @if (! request()->is('checkout/cart')) v-if="parseInt(discount)" @endif>

    </div>
</div>