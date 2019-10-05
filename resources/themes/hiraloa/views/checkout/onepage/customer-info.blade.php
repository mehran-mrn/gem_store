        <div class="checkbox-form">
            <div class="row">
                <div class="col-md-12">
                    <div class="country-select clearfix">
                        <label for="billing[country]" class="required">
                            {{ __('shop::app.checkout.onepage.country') }} <span class="required">*</span></label>
                        <select name="billing[country]" class="myniceselect nice-select wide">

                            @foreach (core()->countries() as $country)
                                <option value="{{ $country->code }}">{{ $country->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="checkout-form-list">
                        <label for="billing[first_name]">{{ __('shop::app.checkout.onepage.first-name') }} <span class="required">*</span></label>
                        <input placeholder="" type="text" id="billing[first_name]" name="billing[first_name]">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="checkout-form-list">
                        <label for="billing[last_name]" class="required">{{ __('shop::app.checkout.onepage.last-name') }} <span class="required">*</span></label>
                        <input id="billing[last_name]" name="billing[last_name]" placeholder="" type="text">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="checkout-form-list">
                        <label for="billing[email]" class="required">
                            {{ __('shop::app.checkout.onepage.email') }}</label>
                        <input id="billing[email]" name="billing[email]" placeholder="" type="email">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="checkout-form-list">
                        <label for="billing_address_0" class="required">
                            {{ __('shop::app.checkout.onepage.address1') }}
                            <span class="required">*</span>
                        </label>
                        <input id="billing_address_0" name="billing[address1][]" type="text">
                    </div>
                </div>
                @if (core()->getConfigData('customer.settings.address.street_lines') && core()->getConfigData('customer.settings.address.street_lines') > 1)
                    <div class="col-md-12">
                        @for ($i = 1; $i < core()->getConfigData('customer.settings.address.street_lines'); $i++)
                            <input type="text" class="control" name="billing[address1][{{ $i }}]" id="billing_address_{{ $i }}" >
                        @endfor
                    </div>
                @endif
                <div class="col-md-12">
                    <div class="checkout-form-list">
                        <label>{{ __('shop::app.checkout.onepage.city') }}
                            <span class="required">*</span></label>
                        <input id="billing[city]" name="billing[city]"  type="text">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="checkout-form-list">
                        <label for="billing[state]">{{ __('shop::app.checkout.onepage.state') }} <span class="required">*</span></label>
                        <input id="billing[state]" name="billing[state]" placeholder="" type="text">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="checkout-form-list">
                        <label for="billing[postcode]" class="required">
                            {{ __('shop::app.checkout.onepage.postcode') }} <span class="required">*</span>
                        </label>
                        <input id="billing[postcode]" name="billing[postcode]" placeholder="" type="text">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="checkout-form-list">
                        <label for="billing[phone]" class="required">{{ __('shop::app.checkout.onepage.phone') }}
                            <span class="required">*</span>
                        </label>
                        <input id="billing[phone]" name="billing[phone]" type="text">
                    </div>
                </div>
                <div class="col-md-6">
                    @auth('customer')
                        <div class="control-group">
                <span class="checkbox">
                    <input type="checkbox" id="billing[save_as_address]" name="billing[save_as_address]" v-model="address.billing.save_as_address"/>
                    <label class="checkbox-view" for="billing[save_as_address]"></label>
                    {{ __('shop::app.checkout.onepage.save_as_address') }}
                </span>
                        </div>
                    @endauth
                </div>
            </div>
            <div class="different-address">
                <div class="ship-different-title">
                    <h3>
                        <label class="checkbox-view" for="billing[use_for_shipping]">
                            {{ __('shop::app.checkout.onepage.use_for_shipping') }}
                        </label>
                        <input  id="ship-box" name="billing[use_for_shipping]" type="checkbox">
                    </h3>
                </div>
                <div id="ship-box-info" class="row">
                    <div class="col-md-12">
                        <div class="country-select clearfix">
                            <label for="shipping[country]" class="required">
                                {{ __('shop::app.checkout.onepage.country') }} <span class="required">*</span></label>
                            <select name="shipping[country]" class="myniceselect nice-select wide">

                                @foreach (core()->countries() as $country)
                                    <option value="{{ $country->code }}">{{ $country->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="checkout-form-list">
                            <label for="shipping[first_name]">{{ __('shop::app.checkout.onepage.first-name') }} <span class="required">*</span></label>
                            <input placeholder="" type="text" id="shipping[first_name]" name="shipping[first_name]">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="checkout-form-list">
                            <label for="shipping[last_name]" class="required">{{ __('shop::app.checkout.onepage.last-name') }} <span class="required">*</span></label>
                            <input id="shipping[last_name]" name="shipping[last_name]" placeholder="" type="text">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="checkout-form-list">
                            <label for="shipping[email]" class="required">
                                {{ __('shop::app.checkout.onepage.email') }}</label>
                            <input id="shipping[email]" name="shipping[email]" placeholder="" type="email">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="checkout-form-list">
                            <label for="shipping_address_0" class="required">
                                {{ __('shop::app.checkout.onepage.address1') }}
                                <span class="required">*</span>
                            </label>
                            <input id="shipping_address_0" name="shipping[address1][]" type="text">
                        </div>
                    </div>
                    @if (core()->getConfigData('customer.settings.address.street_lines') && core()->getConfigData('customer.settings.address.street_lines') > 1)
                        <div class="col-md-12">
                            @for ($i = 1; $i < core()->getConfigData('customer.settings.address.street_lines'); $i++)
                                <input type="text" class="control" name="shipping[address1][{{ $i }}]" id="shipping_address_{{ $i }}" >
                            @endfor
                        </div>
                    @endif
                    <div class="col-md-12">
                        <div class="checkout-form-list">
                            <label>{{ __('shop::app.checkout.onepage.city') }}
                                <span class="required">*</span></label>
                            <input id="shipping[city]" name="shipping[city]"  type="text">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="checkout-form-list">
                            <label for="shipping[state]">{{ __('shop::app.checkout.onepage.state') }} <span class="required">*</span></label>
                            <input id="shipping[state]" name="shipping[state]" placeholder="" type="text">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="checkout-form-list">
                            <label for="shipping[postcode]" class="required">
                                {{ __('shop::app.checkout.onepage.postcode') }} <span class="required">*</span>
                            </label>
                            <input id="shipping[postcode]" name="shipping[postcode]" placeholder="" type="text">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="checkout-form-list">
                            <label for="shipping[phone]" class="required">{{ __('shop::app.checkout.onepage.phone') }}
                                <span class="required">*</span>
                            </label>
                            <input id="shipping[phone]" name="shipping[phone]" type="text">
                        </div>
                    </div>
                </div>
            </div>
        </div>

