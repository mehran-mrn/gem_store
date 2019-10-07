@extends('shop::layouts.master')

@section('page_title')
    {{ __('shop::app.customer.account.address.create.page-title') }}
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
                                        <span class="back-icon"><a href="{{ route('customer.account.index') }}"><i
                                                        class="icon icon-menu-back"></i></a></span>
                                        <span class="account-heading">{{ __('shop::app.customer.account.address.create.title') }}</span>
                                        <span></span>
                                    </div>
                                    {!! view_render_event('bagisto.shop.customers.account.address.create.before') !!}
                                    <form method="post" action="{{ route('customer.address.create') }}"
                                          @submit.prevent="onSubmit" class="hiraola-form border-0">
                                        <div class="hiraola-form-inner">
                                            @csrf
                                            {!! view_render_event('bagisto.shop.customers.account.address.create_form_controls.before') !!}
                                            <div class="single-input">
                                                <label for="address_0"
                                                       class="required">{{ __('shop::app.customer.account.address.create.street-address') }}</label>
                                                <input type="text" class="control" name="address1[]" id="address_0"
                                                       v-validate="'required'"
                                                       data-vv-as="&quot;{{ __('shop::app.customer.account.address.create.street-address') }}&quot;">
                                            </div>
                                            @if (core()->getConfigData('customer.settings.address.street_lines') && core()->getConfigData('customer.settings.address.street_lines') > 1)
                                                <div class="single-input">
                                                    @for ($i = 1; $i < core()->getConfigData('customer.settings.address.street_lines'); $i++)
                                                        <input type="text" class="control" name="address1[{{ $i }}]"
                                                               id="address_{{ $i }}">
                                                    @endfor
                                                </div>
                                            @endif
                                            <div class="single-input">
                                                @include ('hiraloa::customers.account.address.country-state', ['countryCode' => old('country'), 'stateCode' => old('state')])
                                            </div>
                                            <div class="single-input">
                                                <label for="city"
                                                       class="required">{{ __('shop::app.customer.account.address.create.city') }}</label>
                                                <input type="text" class="control" name="city" v-validate="'required'"
                                                       data-vv-as="&quot;{{ __('shop::app.customer.account.address.create.city') }}&quot;">
                                            </div>
                                            <div class="single-input single-input-half">
                                                <label for="postcode"
                                                       class="required">{{ __('shop::app.customer.account.address.create.postcode') }}</label>
                                                <input type="text" class="control" name="postcode"
                                                       v-validate="'required'"
                                                       data-vv-as="&quot;{{ __('shop::app.customer.account.address.create.postcode') }}&quot;">
                                            </div>
                                            <div class="single-input single-input-half">
                                                <label for="phone"
                                                       class="required">{{ __('shop::app.customer.account.address.create.phone') }}</label>
                                                <input type="text" class="control" name="phone" v-validate="'required'"
                                                       data-vv-as="&quot;{{ __('shop::app.customer.account.address.create.phone') }}&quot;">
                                            </div>
                                            {!! view_render_event('bagisto.shop.customers.account.address.create_form_controls.after') !!}
                                            <div class="single-input">
                                                <button class="hiraola-btn float-right"
                                                        type="submit">{{ __('shop::app.customer.account.address.create.submit') }}</button>
                                                {{-- <button class="btn btn-primary btn-lg" type="submit">
                                                    {{ __('shop::app.customer.account.address.edit.submit') }}
                                                </button> --}}
                                            </div>
                                        </div>
                                    </form>
                                    {!! view_render_event('bagisto.shop.customers.account.address.create.after') !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection