@extends('shop::layouts.master')

@section('page_title')
    {{ __('shop::app.customer.account.address.edit.page-title') }}
@endsection

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
        <div class="account-page-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        @include('shop::customers.account.partials.sidemenu')
                    </div>
                    <div class="col-lg-9">
                        <div class="tab-content myaccount-tab-content" id="account-page-tab-content">
                            <div class="tab-pane fade show active" id="account-dashboard" role="tabpanel"
                                 aria-labelledby="account-dashboard-tab">
                                <div class="myaccount-details">
                                    <div class="account-head mb-10">
                                        <span class="back-icon"><a href="{{ route('customer.account.index') }}"><i class="icon icon-menu-back"></i></a></span>
                                        <span class="account-heading">{{ __('shop::app.customer.account.address.edit.title') }}</span>
                                        <span></span>
                                    </div>
                                    {!! view_render_event('bagisto.shop.customers.account.address.edit.before', ['address' => $address]) !!}
                                    <form method="post" action="{{ route('customer.address.edit', $address->id) }}" @submit.prevent="onSubmit" class="hiraola-form border-0">
                                        <div class="hiraola-form-inner">
                                            @method('PUT')
                                            @csrf
                                            {!! view_render_event('bagisto.shop.customers.account.address.edit_form_controls.before', ['address' => $address]) !!}
                                            <?php $addresses = explode(PHP_EOL, $address->address1); ?>
                                            <div class="single-input" :class="[errors.has('address1[]') ? 'has-error' : '']">
                                                <label for="address_0" class="required">{{ __('shop::app.customer.account.address.edit.street-address') }}</label>
                                                <input type="text" class="control" name="address1[]" id="address_0" v-validate="'required'" value="{{ isset($addresses[0]) ? $addresses[0] : '' }}" data-vv-as="&quot;{{ __('shop::app.customer.account.address.create.street-address') }}&quot;">
                                                <span class="control-error" v-if="errors.has('address1[]')">@{{ errors.first('address1[]') }}</span>
                                            </div>
                                            @if (core()->getConfigData('customer.settings.address.street_lines') && core()->getConfigData('customer.settings.address.street_lines') > 1)
                                                <div class="single-input">
                                                    @for ($i = 1; $i < core()->getConfigData('customer.settings.address.street_lines'); $i++)
                                                        <input type="text" class="control" name="address1[{{ $i }}]" id="address_{{ $i }}" value="{{ isset($addresses[$i]) ? $addresses[$i] : '' }}">
                                                    @endfor
                                                </div>
                                            @endif
                                            @include ('shop::customers.account.address.country-state', ['countryCode' => old('country') ?? $address->country, 'stateCode' => old('state') ?? $address->state])
                                            <div class="single-input" :class="[errors.has('city') ? 'has-error' : '']">
                                                <label for="city" class="required">{{ __('shop::app.customer.account.address.create.city') }}</label>
                                                <input type="text" class="control" name="city" v-validate="'required|alpha_spaces'" value="{{ $address->city }}" data-vv-as="&quot;{{ __('shop::app.customer.account.address.create.city') }}&quot;">
                                                <span class="control-error" v-if="errors.has('city')">@{{ errors.first('city') }}</span>
                                            </div>
                                            <div class="single-input" :class="[errors.has('postcode') ? 'has-error' : '']">
                                                <label for="postcode" class="required">{{ __('shop::app.customer.account.address.create.postcode') }}</label>
                                                <input type="text" class="control" name="postcode" v-validate="'required'" value="{{ $address->postcode }}" data-vv-as="&quot;{{ __('shop::app.customer.account.address.create.postcode') }}&quot;">
                                                <span class="control-error" v-if="errors.has('postcode')">@{{ errors.first('postcode') }}</span>
                                            </div>
                                            <div class="single-input" :class="[errors.has('phone') ? 'has-error' : '']">
                                                <label for="phone" class="required">{{ __('shop::app.customer.account.address.create.phone') }}</label>
                                                <input type="text" class="control" name="phone" v-validate="'required'" value="{{ $address->phone }}" data-vv-as="&quot;{{ __('shop::app.customer.account.address.create.phone') }}&quot;">
                                                <span class="control-error" v-if="errors.has('phone')">@{{ errors.first('phone') }}</span>
                                            </div>
                                            {!! view_render_event('bagisto.shop.customers.account.address.edit_form_controls.after', ['address' => $address]) !!}

                                            <div class="single-input">
                                                <button class="hiraola-btn float-right" type="submit">
                                                    {{ __('shop::app.customer.account.address.create.submit') }}
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                    {!! view_render_event('bagisto.shop.customers.account.address.edit.after', ['address' => $address]) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection