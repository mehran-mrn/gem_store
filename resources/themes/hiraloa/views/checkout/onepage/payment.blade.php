<form data-vv-scope="payment-form">
    <div class="form-container">
        <div class="form-header mb-30">
            <span class="checkout-step-heading">{{ __('shop::app.checkout.onepage.payment-methods') }}</span>
        </div>

        <div class="payment-methods">
            <div class="control-group" :class="[errors.has('payment-form.payment[method]') ? 'has-error' : '']">
                <div class="row">
                    @foreach ($paymentMethods as $payment)
                        <div class="col-4 col-xs-12">
                            <div class="card">
                                <div class="card-body">
                                    {!! view_render_event('bagisto.shop.checkout.payment-method.before', ['payment' => $payment]) !!}
                                    <div class="checkout-method-group mb-20">
                                        <div class="line-one text-center">
                                            <label class="radio-container">
                                                <input v-validate="'required'" type="radio"
                                                       id="{{ $payment['method'] }}" name="payment[method]"
                                                       value="{{ $payment['method'] }}" v-model="payment.method"
                                                       @change="methodSelected()"
                                                       data-vv-as="&quot;{{ __('shop::app.checkout.onepage.payment-method') }}&quot;">
                                                <span>انتخاب</span>
                                                {{-- <label class="radio-view" for="{{ $payment['method'] }}"></label> --}}
                                            </label>
                                            <hr>
                                            <strong class="payment-method method-label text-center">{{ $payment['method_title'] }}</strong>
                                        </div>
                                    </div>
                                    {!! view_render_event('bagisto.shop.checkout.payment-method.after', ['payment' => $payment]) !!}
                                </div>
                                <div class="card-footer">
                                        <span class="text-center method-summary">{{ __($payment['description']) }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <span class="control-error" v-if="errors.has('payment-form.payment[method]')">
                    @{{ errors.first('payment-form.payment[method]') }}
                </span>

            </div>
        </div>
    </div>
</form>