<form data-vv-scope="shipping-form">
    <div class="form-container">
        <div class="form-header mb-30">
            <span class="checkout-step-heading">{{ __('shop::app.checkout.onepage.shipping-method') }}</span>
        </div>
        <div class="shipping-methods">
            <div class="control-group" :class="[errors.has('shipping-form.shipping_method') ? 'has-error' : '']">
                <div class="row">
                    @foreach ($shippingRateGroups as $rateGroup)
                        <div class="col-6 col-xs-12 ">
                            {!! view_render_event('bagisto.shop.checkout.shipping-method.before', ['rateGroup' => $rateGroup]) !!}
                            <div class="card">
                                <div class="card-header text-center">
                                    <strong class="carrier-title text-center"
                                            id="carrier-title">{{ $rateGroup['carrier_title'] }}</strong>
                                </div>
                                <div class="card-body">
                                    @foreach ($rateGroup['rates'] as $rate)
                                        <div class="checkout-method-group mb-20">
                                            <div class="line-one text-center">
                                                <label class="radio-container">
                                                    <input v-validate="'required'" type="radio" id="{{ $rate->method }}"
                                                           name="shipping_method"
                                                           data-vv-as="&quot;{{ __('shop::app.checkout.onepage.shipping-method') }}&quot;"
                                                           value="{{ $rate->method }}"
                                                           v-model="selected_shipping_method"
                                                           @change="methodSelected()">
                                                    <span>انتخاب</span>
                                                </label>
                                                <hr>
                                                {{-- <label class="radio-view" for="{{ $rate->method }}"></label> --}}
                                                <strong class="text-center">هزینه ارسال</strong>
                                                <h5 class="ship-rate method-label">{{ core()->currency($rate->base_price) }}</h5>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="card-footer">
                                    <div class="method-summary text-center">
                                        <b>{{ $rate->method_title }}</b>
                                        - {{ __($rate->method_description) }}
                                    </div>
                                </div>
                            </div>
                            {!! view_render_event('bagisto.shop.checkout.shipping-method.after', ['rateGroup' => $rateGroup]) !!}
                        </div>
                    @endforeach
                </div>
            </div>
            <span class="control-error" v-if="errors.has('shipping-form.shipping_method')">@{{ errors.first('shipping-form.shipping_method') }}</span>
        </div>
    </div>
</form>