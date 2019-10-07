<div class="row">
    @guest('customer')
        <div class="col-12">
            <div class="coupon-accordion">
                <h3>عضو سایت هستید؟ <span id="showlogin">برای ورود لطفاً کلیک نمایید.</span></h3>
                <div id="checkout-login" class="coupon-content">
                    <div class="coupon-info">
                        <div class="col-sm-12 col-md-12 col-xs-12 col-centered col-lg-6 ">
                            {!! view_render_event('bagisto.shop.customers.login.before') !!}
                            <form method="POST" action="{{ route('customer.session.create') }}"
                                  @submit.prevent="onSubmit">
                                {{ csrf_field() }}
                                <div class="login-form">
                                    <h4 class="login-title">{{ __('shop::app.customer.login-form.title') }}</h4>
                                    {!! view_render_event('bagisto.shop.customers.login_form_controls.before') !!}
                                    <div class="row">
                                        <div class="col-md-12 col-12">
                                            <label for="email"
                                                   class="required">{{ __('shop::app.customer.login-form.email') }}</label>
                                            <input type="text" class="control" name="email"
                                                   v-validate="'required|email'"
                                                   value="{{ old('email') }}"
                                                   data-vv-as="&quot;{{ __('shop::app.customer.login-form.email') }}&quot;">
                                        </div>
                                        <div class="col-12 mb--20">
                                            <label for="password"
                                                   class="required">{{ __('shop::app.customer.login-form.password') }}</label>
                                            <input type="password" class="control" name="password"
                                                   v-validate="'required'"
                                                   value="{{ old('password') }}"
                                                   data-vv-as="&quot;{{ __('shop::app.customer.login-form.password') }}&quot;">
                                        </div>
                                        <div class="col-md-6">
                                            <div class="check-box">
                                                {{--                                        <input type="checkbox" id="remember_me">--}}
                                                {{--                                        <label for="remember_me">{{ __('shop::app.customer.login-form.remember_me') }}</label>--}}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="forgotton-password_info">
                                                <a href="{{ route('customer.forgot-password.create') }}"> {{ __('shop::app.customer.login-form.forgot_pass') }}</a>
                                                @if (Cookie::has('enable-resend'))
                                                    @if (Cookie::get('enable-resend') == true)
                                                        <a href="{{ route('customer.resend.verification-email', Cookie::get('email-for-resend')) }}">{{ __('shop::app.customer.login-form.resend-verification') }}</a>
                                                    @endif
                                                @endif
                                            </div>
                                            <div class="forgotton-password_info">
                                                <a href="{{ route('customer.register.index') }}"> {{ __('shop::app.customer.login-text.no_account') }} {{ __('shop::app.customer.login-text.title') }}</a>

                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            @if($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach($errors->all() as $error)
                                                            <li>{{$error}}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-md-12">
                                            <button type="submit" class="hiraola-login_btn">
                                                {{ __('shop::app.customer.login-form.button_title') }}
                                            </button>
                                        </div>
                                    </div>
                                    {!! view_render_event('bagisto.shop.customers.login_form_controls.after') !!}
                                </div>
                            </form>
                            {!! view_render_event('bagisto.shop.customers.login.after') !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endguest

</div>


<form data-vv-scope="address-form">

    <div class="form-container" v-if="!this.new_billing_address">
        <span class="checkout-step-heading">{{ __('shop::app.checkout.onepage.billing-address') }}</span>
        <div class="address-holder">
            <div class="address-card w-100" v-for='(addresses, index) in this.allAddress'>
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">
                            <label class="radio-container mb-0">
                                <input type="radio" v-validate="'required'" id="billing[address_id]"
                                       name="billing[address_id]"
                                       :value="addresses.id" v-model="address.billing.address_id"
                                       data-vv-as="&quot;{{ __('shop::app.checkout.onepage.billing-address') }}&quot;">
                                <span>انتخاب</span>
                            </label>
                        </strong>
                        <strong class="float-right">@{{ allAddress.first_name }} @{{ allAddress.last_name }}</strong>
                    </div>
                    <div class="card-body">
                        <div class="checkout-address-content">
                            <div class="address-box">
                                <ul class="address-card-list">
                                    <li class="mb-1">
                                        {{--                                        <strong><span>کشور: </span> @{{ addresses.country }}</strong>--}}
                                        <span><strong>استان: </strong> @{{ addresses.state }}</span>
                                        <span class="float-right"><strong>شهر: </strong> @{{ addresses.city }}</span>
                                        <hr>
                                    </li>
                                    <li class="mb-1">
                                        <span><strong>محله: </strong> @{{ addresses.address1 }}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <span>{{ __('shop::app.customer.account.address.index.contact') }} <strong>@{{addresses.phone }}</strong></span>
                        <span class="float-right">کد پستی: <strong>@{{addresses.postcode }}</strong></span>
                    </div>
                </div>
            </div>
            <div class="control-group"
                 :class="[errors.has('address-form.billing[address_id]') ? 'has-error' : '']">
                <span class="control-error" v-if="errors.has('address-form.billing[address_id]')">
                    @{{ errors.first('address-form.billing[address_id]') }}
                </span>
            </div>
        </div>
        <div class="form-header py-2">
            <a class="hiraola-btn hiraola-btn_sm col-6 float-right " href="javascript:;" @click=newBillingAddress()>
                {{ __('shop::app.checkout.onepage.new-address') }}
            </a>
        </div>
    </div>
    <div class="form-container checkbox-form hiraola-form" v-if="this.new_billing_address">
        <div class="row">
            <div class="col-12">
                @auth('customer')
                    @if(count(auth('customer')->user()->addresses))
                        <a class="hiraola-btn hiraola-btn_sm col-2 float-right" href="javascript:;"
                           @click=backToSavedBillingAddress()>
                            {{ __('shop::app.checkout.onepage.back') }}
                        </a>
                    @endif
                @endauth
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="country-select clearfix"
                     :class="[errors.has('address-form.billing[country]') ? 'has-error' : '']">
                    <label for="billing[country]" class="required">
                        {{ __('shop::app.checkout.onepage.country') }} <span class="required">*</span></label>
                    <select v-validate="'required'" name="billing[country]"
                            class=" nice-select wide form-control"
                            v-model="address.billing.country"
                            data-vv-as="&quot;{{ __('shop::app.checkout.onepage.country') }}&quot;">
                        @foreach (core()->countries() as $country)
                            @if($country['code']=="IR")
                                <option value="{{ $country->code }}">{{ $country->name }}</option>
                            @endif
                        @endforeach
                    </select>
                    <span class="control-error" v-if="errors.has('address-form.billing[country]')">
                        @{{ errors.first('address-form.billing[country]') }}
                    </span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="checkout-form-list"
                     :class="[errors.has('address-form.billing[first_name]') ? 'has-error' : '']">
                    <label for="billing[first_name]">{{ __('shop::app.checkout.onepage.first-name') }} <span
                                class="required">*</span></label>
                    <input placeholder="" v-validate="'required'" class="form-control"
                           type="text" id="billing[first_name]" name="billing[first_name]"
                           v-model="address.billing.first_name"
                           data-vv-as="&quot;{{ __('shop::app.checkout.onepage.first-name') }}&quot;"/>
                    <span class="control-error" v-if="errors.has('address-form.billing[first_name]')">
                @{{ errors.first('address-form.billing[first_name]') }}
            </span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="checkout-form-list"
                     :class="[errors.has('address-form.billing[last_name]') ? 'has-error' : '']">
                    <label for="billing[last_name]" class="required">{{ __('shop::app.checkout.onepage.last-name') }}
                        <span class="required">*</span></label>
                    <input id="billing[last_name]" v-validate="'required'" class="form-control"
                           name="billing[last_name]" placeholder="" type="text"
                           v-model="address.billing.last_name"
                           data-vv-as="&quot;{{ __('shop::app.checkout.onepage.last-name') }}&quot;"/>
                    <span class="control-error" v-if="errors.has('address-form.billing[last_name]')">
                @{{ errors.first('address-form.billing[last_name]') }}
            </span>
                </div>
            </div>
            <div class="col-md-12">
                <div class="checkout-form-list" :class="[errors.has('address-form.billing[email]') ? 'has-error' : '']">
                    <label for="billing[email]" class="required">
                        {{ __('shop::app.checkout.onepage.email') }}</label>
                    <input v-validate="'required|email'"
                           id="billing[email]" name="billing[email]" class="form-control"
                           type="email"
                           v-model="address.billing.email"
                           data-vv-as="&quot;{{ __('shop::app.checkout.onepage.email') }}&quot;"/>
                    <span class="control-error" v-if="errors.has('address-form.billing[email]')">
                @{{ errors.first('address-form.billing[email]') }}
            </span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="checkout-form-list">
                    <label for="billing[state]">{{ __('shop::app.checkout.onepage.state') }} <span
                                class="required">*</span></label>
                    <input type="text" v-validate="'required'" class="control form-control" id="billing[state]"
                           name="billing[state]"
                           v-model="address.billing.state" v-if="!haveStates('billing')"
                           data-vv-as="&quot;{{ __('shop::app.checkout.onepage.state') }}&quot;"/>

                    <select v-validate="'required'" class="control form-control" id="billing[state]"
                            name="billing[state]"
                            v-model="address.billing.state" v-if="haveStates('billing')"
                            data-vv-as="&quot;{{ __('shop::app.checkout.onepage.state') }}&quot;">

                        <option value="">{{ __('shop::app.checkout.onepage.select-state') }}</option>

                        <option v-for='(state, index) in countryStates[address.billing.country]' :value="state.code">
                            @{{ state.default_name }}
                        </option>

                    </select>

                    <span class="control-error" v-if="errors.has('address-form.billing[state]')">
                @{{ errors.first('address-form.billing[state]') }}
            </span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="checkout-form-list">
                    <label>{{ __('shop::app.checkout.onepage.city') }}
                        <span class="required">*</span></label>
                    <input type="text" v-validate="'required'" class="control form-control" id="billing[city]"
                           name="billing[city]"
                           v-model="address.billing.city"
                           data-vv-as="&quot;{{ __('shop::app.checkout.onepage.city') }}&quot;"/>

                    <span class="control-error" v-if="errors.has('address-form.billing[city]')">
                @{{ errors.first('address-form.billing[city]') }}
                    </span>
                </div>
            </div>
            <div class="col-md-12">
                <div class="checkout-form-list">
                    <label for="billing_address_0" class="required">
                        {{ __('shop::app.checkout.onepage.address1') }}
                        <span class="required">*</span>
                    </label>
                    <input type="text" v-validate="'required'" class="control form-control" id="billing_address_0"
                           name="billing[address1][]" v-model="address.billing.address1[0]"
                           data-vv-as="&quot;{{ __('shop::app.checkout.onepage.address1') }}&quot;"/>

                    <span class="control-error" v-if="errors.has('address-form.billing[address1][]')">
                @{{ errors.first('address-form.billing[address1][]') }}
            </span>
                </div>
            </div>
            @if (core()->getConfigData('customer.settings.address.street_lines') && core()->getConfigData('customer.settings.address.street_lines') > 1)
                <div class="col-md-12">
                    @for ($i = 1; $i < core()->getConfigData('customer.settings.address.street_lines'); $i++)
                        <input type="text" class="control" name="billing[address1][{{ $i }}]"
                               id="billing_address_{{ $i }}" v-model="address.billing.address1[{{$i}}]">
                    @endfor
                </div>
            @endif
            <div class="col-md-6">
                <div class="checkout-form-list">
                    <label for="billing[postcode]" class="required">
                        {{ __('shop::app.checkout.onepage.postcode') }} <span class="required">*</span>
                    </label>

                    <input type="text" v-validate="'required'" class="control form-control" id="billing[postcode]"
                           name="billing[postcode]" v-model="address.billing.postcode"
                           data-vv-as="&quot;{{ __('shop::app.checkout.onepage.postcode') }}&quot;"/>

                    <span class="control-error" v-if="errors.has('address-form.billing[postcode]')">
                @{{ errors.first('address-form.billing[postcode]') }}
            </span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="checkout-form-list">
                    <label for="billing[phone]" class="required">{{ __('shop::app.checkout.onepage.phone') }}
                        <span class="required">*</span>
                    </label>
                    <input type="text" v-validate="'required'" class="control form-control" id="billing[phone]"
                           name="billing[phone]"
                           v-model="address.billing.phone"
                           data-vv-as="&quot;{{ __('shop::app.checkout.onepage.phone') }}&quot;"/>

                    <span class="control-error" v-if="errors.has('address-form.billing[phone]')">
                @{{ errors.first('address-form.billing[phone]') }}
            </span>
                </div>
            </div>
            <div class="col-md-6">
                @auth('customer')
                    <div class="control-group">
                <span class="checkbox">
                    <input type="checkbox" id="billing[save_as_address]" name="billing[save_as_address]"
                           v-model="address.billing.save_as_address"/>
                    <label class="checkbox-view" for="billing[save_as_address]"></label>
                    {{ __('shop::app.checkout.onepage.save_as_address') }}
                </span>
                    </div>
                @endauth
            </div>
            <div class="control-group">
                @auth(!'customer')
                    @if(!count(auth('customer')->user()->addresses))
                        <span class="checkbox">
                            <input type="checkbox" id="billing[use_for_shipping]" name="billing[use_for_shipping]"
                                   v-model="address.billing.use_for_shipping"/>
                            <label class="checkbox-view" for="billing[use_for_shipping]"></label>{{ __('shop::app.checkout.onepage.use_for_shipping') }}
                        </span>
                    @endif
                @endauth


            </div>
        </div>
    </div>

    <div class="form-container"
         v-if="!address.billing.use_for_shipping && !this.new_shipping_address">
        <div class="form-header mb-30">
            <span class="checkout-step-heading">
                {{ __('shop::app.checkout.onepage.shipping-address') }}</span>
            <a class="btn btn-lg btn-primary" @click=newShippingAddress()>
                {{ __('shop::app.checkout.onepage.new-address') }}
            </a>
        </div>

        <div class="address-holder">
            <div class="address-card" v-for='(addresses, index) in this.allAddress'>
                <div class="checkout-address-content"
                     style="display: flex; flex-direction: row; justify-content: space-between; width: 100%;">
                    <label class="radio-container" style="float: right; width: 10%;">
                        <input v-validate="'required'" type="radio" id="shipping[address_id]"
                               name="shipping[address_id]" v-model="address.shipping.address_id" :value="addresses.id"
                               data-vv-as="&quot;{{ __('shop::app.checkout.onepage.shipping-address') }}&quot;">
                        <span class="checkmark"></span>
                    </label>

                    <ul class="address-card-list" style="float: right; width: 85%;">
                        <li class="mb-2">
                            <b>@{{ allAddress.first_name }} @{{ allAddress.last_name }},</b>
                        </li>

                        <li class="mb-1">
                            @{{ addresses.address1 }},
                        </li>

                        <li class="mb-1">
                            @{{ addresses.city }},
                        </li>

                        <li class="mb-1">
                            @{{ addresses.state }},
                        </li>

                        <li class="mb-2">
                            @{{ addresses.country }}.
                        </li>

                        <li>
                            <b>{{ __('shop::app.customer.account.address.index.contact') }}</b> : @{{ addresses.phone }}
                        </li>
                    </ul>
                </div>
            </div>

            <div class="control-group" :class="[errors.has('address-form.shipping[address_id]') ? 'has-error' : '']">
                <span class="control-error" v-if="errors.has('address-form.shipping[address_id]')">
                    @{{ errors.first('address-form.shipping[address_id]') }}
                </span>
            </div>

        </div>
    </div>

    <div class="form-container different-address checkbox-form"
         v-if="!address.billing.use_for_shipping && this.new_shipping_address">
        <div class="row">

            <div class="ship-different-title">

                <div class="address-holder">
                    <div class="address-card" v-for='(addresses, index) in this.allAddress'>
                        <div class="checkout-address-content"
                             style="display: flex; flex-direction: row; justify-content: space-between; width: 100%;">
                            <label class="radio-container" style="float: right; width: 10%;">
                                <input v-validate="'required'" type="radio" id="shipping[address_id]"
                                       name="shipping[address_id]" v-model="address.shipping.address_id"
                                       :value="addresses.id"
                                       data-vv-as="&quot;{{ __('shop::app.checkout.onepage.shipping-address') }}&quot;">
                                <span class="checkmark"></span>
                            </label>

                            <ul class="address-card-list" style="float: right; width: 85%;">
                                <li class="mb-10">
                                    <b>@{{ allAddress.first_name }} @{{ allAddress.last_name }},</b>
                                </li>

                                <li class="mb-5">
                                    @{{ addresses.address1 }},
                                </li>

                                <li class="mb-5">
                                    @{{ addresses.city }},
                                </li>

                                <li class="mb-5">
                                    @{{ addresses.state }},
                                </li>

                                <li class="mb-15">
                                    @{{ addresses.country }}.
                                </li>

                                <li>
                                    <b>{{ __('shop::app.customer.account.address.index.contact') }}</b> : @{{
                                    addresses.phone }}
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="control-group"
                         :class="[errors.has('address-form.shipping[address_id]') ? 'has-error' : '']">
                <span class="control-error" v-if="errors.has('address-form.shipping[address_id]')">
                    @{{ errors.first('address-form.shipping[address_id]') }}
                </span>
                    </div>

                </div>
                <div class="form-header mb-30">
            <span class="checkout-step-heading">
                {{ __('shop::app.checkout.onepage.shipping-address') }}</span>
                    <a class="btn btn-lg btn-primary" @click=newShippingAddress()>
                        {{ __('shop::app.checkout.onepage.new-address') }}
                    </a>
                </div>
            </div>

            <div class="col-md-12">
                <div class="country-select clearfix"
                     :class="[errors.has('address-form.shipping[country]') ? 'has-error' : '']">
                    <label for="shipping[country]" class="required">
                        {{ __('shop::app.checkout.onepage.country') }} <span class="required">*</span></label>
                    <select name="shipping[country]" v-validate="'required'" id="shipping[country]"
                            class="myniceselect nice-select wide"
                            v-model="address.shipping.country"
                            data-vv-as="&quot;{{ __('shop::app.checkout.onepage.country') }}&quot;">

                        @foreach (core()->countries() as $country)
                            <option value="{{ $country->code }}">{{ $country->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="checkout-form-list"
                     :class="[errors.has('address-form.shipping[first_name]') ? 'has-error' : '']">
                    <label for="shipping[first_name]">{{ __('shop::app.checkout.onepage.first-name') }} <span
                                class="required">*</span></label>
                    <input type="text" v-validate="'required'" class="control" id="shipping[first_name]"
                           name="shipping[first_name]" v-model="address.shipping.first_name"
                           data-vv-as="&quot;{{ __('shop::app.checkout.onepage.first-name') }}&quot;"/>

                </div>
            </div>
            <div class="col-md-6">
                <div class="checkout-form-list"
                     :class="[errors.has('address-form.shipping[last_name]') ? 'has-error' : '']">
                    <label for="shipping[last_name]"
                           class="required">{{ __('shop::app.checkout.onepage.last-name') }} <span
                                class="required">*</span></label>
                    <input type="text" v-validate="'required'" class="control" id="shipping[last_name]"
                           name="shipping[last_name]" v-model="address.shipping.last_name"
                           data-vv-as="&quot;{{ __('shop::app.checkout.onepage.last-name') }}&quot;"/>
                </div>
            </div>
            <div class="col-md-12">
                <div class="checkout-form-list"
                     :class="[errors.has('address-form.shipping[email]') ? 'has-error' : '']">
                    <label for="shipping[email]" class="required">
                        {{ __('shop::app.checkout.onepage.email') }}</label>
                    <input type="text" v-validate="'required|email'" class="control" id="shipping[email]"
                           name="shipping[email]" v-model="address.shipping.email"
                           data-vv-as="&quot;{{ __('shop::app.checkout.onepage.email') }}&quot;"/>
                </div>
            </div>
            <div class="col-md-12">
                <div class="checkout-form-list"
                     :class="[errors.has('address-form.shipping[address1][]') ? 'has-error' : '']">
                    <label for="shipping_address_0" class="required">
                        {{ __('shop::app.checkout.onepage.address1') }}
                        <span class="required">*</span>
                    </label>
                    <input type="text" v-validate="'required'" class="control" id="shipping_address_0"
                           name="shipping[address1][]" v-model="address.shipping.address1[0]"
                           data-vv-as="&quot;{{ __('shop::app.checkout.onepage.address1') }}&quot;"/>
                </div>
            </div>
            @if (core()->getConfigData('customer.settings.address.street_lines') && core()->getConfigData('customer.settings.address.street_lines') > 1)
                <div class="col-md-12">
                    @for ($i = 1; $i < core()->getConfigData('customer.settings.address.street_lines'); $i++)
                        <input type="text" class="control" name="shipping[address1][{{ $i }}]"
                               id="shipping_address_{{ $i }}">
                    @endfor
                </div>
            @endif
            <div class="col-md-12">
                <div class="checkout-form-list" :class="[errors.has('address-form.shipping[city]') ? 'has-error' : '']">
                    <label>{{ __('shop::app.checkout.onepage.city') }}
                        <span class="required">*</span></label>
                    <input type="text" v-validate="'required'" class="control" id="shipping[city]" name="shipping[city]"
                           v-model="address.shipping.city"
                           data-vv-as="&quot;{{ __('shop::app.checkout.onepage.city') }}&quot;"/>
                </div>
            </div>
            <div class="col-md-6">
                <div class="checkout-form-list"
                     :class="[errors.has('address-form.shipping[state]') ? 'has-error' : '']">
                    <label for="shipping[state]">{{ __('shop::app.checkout.onepage.state') }} <span
                                class="required">*</span></label>
                    <input type="text" v-validate="'required'" class="control" id="shipping[state]"
                           name="shipping[state]" v-model="address.shipping.state" v-if="!haveStates('shipping')"
                           data-vv-as="&quot;{{ __('shop::app.checkout.onepage.state') }}&quot;"/>
                </div>
            </div>
            <div class="col-md-6" :class="[errors.has('address-form.shipping[postcode]') ? 'has-error' : '']">
                <div class="checkout-form-list">
                    <label for="shipping[postcode]" class="required">
                        {{ __('shop::app.checkout.onepage.postcode') }} <span class="required">*</span>
                    </label>
                    <input type="text" v-validate="'required'" class="control" id="shipping[postcode]"
                           name="shipping[postcode]" v-model="address.shipping.postcode"
                           data-vv-as="&quot;{{ __('shop::app.checkout.onepage.postcode') }}&quot;"/>
                </div>
            </div>
            <div class="col-md-6">
                <div class="checkout-form-list"
                     :class="[errors.has('address-form.shipping[phone]') ? 'has-error' : '']">
                    <label for="shipping[phone]" class="required">{{ __('shop::app.checkout.onepage.phone') }}
                        <span class="required">*</span>
                    </label>
                    <input type="text" v-validate="'required'" class="control" id="shipping[phone]"
                           name="shipping[phone]" v-model="address.shipping.phone"
                           data-vv-as="&quot;{{ __('shop::app.checkout.onepage.phone') }}&quot;"/>
                </div>
            </div>
        </div>
    </div>
</form>
