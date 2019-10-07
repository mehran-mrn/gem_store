<div class="your-order">
    <h3 class="text-center">{{ __('shop::app.checkout.total.order-summary') }}</h3>
    <div class="your-order-table table-responsive">
        <table class="table text-center">
            <thead>
            <tr>
                <th class="cart-product-name">محصول</th>
                <th class="cart-product-name">تعداد</th>
                <th class="cart-product-total">جمع کل</th>
            </tr>
            </thead>
            <tbody>
            @foreach($cart['items'] as $item)
                <tr class="cart_item">
                    <td class="cart-product-name"> {{$item['name']}}</td>
                    <td><strong class="product-quantity">{{$item['quantity']}}</strong></td>
                    <td class="cart-product-total"><span class="amount">{{number_format($item['price'])}}</span></td>
                </tr>
            @endforeach
            </tbody>
            <tfoot>
            @if ($cart->selected_shipping_rate)
                <tr class="cart-subtotal">
                    <th>{{ __('shop::app.checkout.total.delivery-charges') }}</th>
                    <th></th>
                    <td><strong class="amount">{{ core()->currency($cart->selected_shipping_rate->base_price) }}</strong>
                    </td>
                </tr>
            @endif

            @if ($cart->base_tax_total)
                <tr class="cart-subtotal">
                    <th>{{ __('shop::app.checkout.total.tax') }}</th>
                    <th></th>
                    <td><strong class="amount">{{ core()->currency($cart->base_tax_total) }}</strong></td>
                </tr>

            @endif
            <tr class="order-total">
                <th>{{ __('shop::app.checkout.total.grand-total') }}</th>
                <td></td>
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
                            <div class="control-group mt-20">
                                <input type="text" class="control form-control" value="" name="code">
                                <button class="hiraola-btn hiraola-btn_sm col-6 my-2 float-right">{{ __('shop::app.checkout.onepage.apply-coupon') }}</button>
                            </div>
                        </form>
                        <div class="clearfix"></div>
                    </div>
                </div>
            @else
                <div class="discount-details-group">
                    <div class="item-detail">
                        <label>{{ __('shop::app.checkout.total.coupon-applied') }}</label>
                        <label class="right" style="display: inline-flex; align-items: center;">
                            <b>{{ $cart->coupon_code }}</b>
                            <span class="icon cross-icon"
                                  title="{{ __('shop::app.checkout.total.remove-coupon') }}"></span>
                        </label>
                    </div>
                </div>
            @endif
        @endif

    </div>
</div>
<div class="order-summary">
    <div @if (! request()->is('checkout/cart')) v-if="parseInt(discount)" @endif>
    </div>
</div>