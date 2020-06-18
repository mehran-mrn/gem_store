@extends('hiraloa::layouts.master')
@section('page_title')
    {{ __('shop::app.customer.signup-form.page-title') }}
@endsection
@section('content-wrapper')

    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">

            </div>
        </div>
    </div>
    <div class="hiraola-login-register_area">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-7 col-centered col-xs-12">
                    {!! view_render_event('bagisto.shop.customers.signup.before') !!}
                    <form method="post" action="{{ route('customer.register.create') }}" @submit.prevent="onSubmit">
                        {{ csrf_field() }}
                        <div class="login-form">
                            <h4 class="login-title">{{ __('shop::app.customer.signup-form.title') }}</h4>
                            {!! view_render_event('bagisto.shop.customers.signup_form_controls.before') !!}
                            <div class="row">
                                <div class="col-md-6 col-12 mb--20">
                                    <label for="first_name"
                                           class="required">{{ __('shop::app.customer.signup-form.firstname') }}</label>
                                    <input type="text" name="first_name" v-validate="'required'"
                                           value="{{ old('first_name') }}"
                                           data-vv-as="&quot;{{ __('shop::app.customer.signup-form.firstname') }}&quot;">
                                </div>
                                <div class="col-md-6 col-12 mb--20">
                                    <label for="last_name"
                                           class="required">{{ __('shop::app.customer.signup-form.lastname') }}</label>
                                    <input type="text" class="control" name="last_name" v-validate="'required'"
                                           value="{{ old('last_name') }}"
                                           data-vv-as="&quot;{{ __('shop::app.customer.signup-form.lastname') }}&quot;">
                                </div>
                                <div class="col-md-12">
                                    <label for="email"
                                           class="required">{{ __('shop::app.customer.signup-form.email') }}</label>
                                    <input type="email" class="control" name="email" v-validate="'required|email'"
                                           value="{{ old('email') }}"
                                           data-vv-as="&quot;{{ __('shop::app.customer.signup-form.email') }}&quot;">
                                </div>
                                <div class="col-md-6">
                                    <label for="password"
                                           class="required">{{ __('shop::app.customer.signup-form.password') }}</label>
                                    <input type="password" class="control" name="password" v-validate="'required|min:6'"
                                           ref="password" value="{{ old('password') }}"
                                           data-vv-as="&quot;{{ __('shop::app.customer.signup-form.password') }}&quot;">
                                </div>
                                <div class="col-md-6">
                                    <label for="password_confirmation"
                                           class="required">{{ __('shop::app.customer.signup-form.confirm_pass') }}</label>
                                    <input type="password" class="control" name="password_confirmation"
                                           v-validate="'required|min:6|confirmed:password'"
                                           data-vv-as="&quot;{{ __('shop::app.customer.signup-form.confirm_pass') }}&quot;">
                                </div>
                                <div class="col-md-6"></div>
                                <div class="col-md-6">
                                    <div class="forgotton-password_info">
                                        <a href="{{ route('customer.session.index') }}"> {{ __('shop::app.customer.signup-text.account_exists') }} {{ __('shop::app.customer.signup-text.title') }}</a>

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
                                <div class="col-12">
                                    <button class="hiraola-register_btn"
                                            type="submit">{{ __('shop::app.customer.signup-form.button_title') }}</button>
                                </div>
                            </div>
                            {!! view_render_event('bagisto.shop.customers.signup_form_controls.after') !!}
                        </div>
                    </form>
                    {!! view_render_event('bagisto.shop.customers.signup.after') !!}
                </div>
            </div>
        </div>
    </div>

@endsection


{{--    <div class="auth-content">--}}

{{--        <div class="sign-up-text">--}}
{{--        </div>--}}


{{--        <form method="post" action="{{ route('customer.register.create') }}" @submit.prevent="onSubmit">--}}


{{--            <div class="login-form">--}}
{{--                <div class="login-text"></div>--}}


{{-- <div class="signup-confirm" :class="[errors.has('agreement') ? 'has-error' : '']">
    <span class="checkbox">
        <input type="checkbox" id="checkbox2" name="agreement" v-validate="'required'">
        <label class="checkbox-view" for="checkbox2"></label>
        <span>{{ __('shop::app.customer.signup-form.agree') }}
            <a href="">{{ __('shop::app.customer.signup-form.terms') }}</a> & <a href="">{{ __('shop::app.customer.signup-form.conditions') }}</a> {{ __('shop::app.customer.signup-form.using') }}.
        </span>
    </span>
    <span class="control-error" v-if="errors.has('agreement')">@{{ errors.first('agreement') }}</span>
</div> --}}


{{-- <div class="control-group" :class="[errors.has('agreement') ? 'has-error' : '']">

    <input type="checkbox" id="checkbox2" name="agreement" v-validate="'required'" data-vv-as="&quot;{{ __('shop::app.customer.signup-form.agreement') }}&quot;">
    <span>{{ __('shop::app.customer.signup-form.agree') }}
        <a href="">{{ __('shop::app.customer.signup-form.terms') }}</a> & <a href="">{{ __('shop::app.customer.signup-form.conditions') }}</a> {{ __('shop::app.customer.signup-form.using') }}.
    </span>
    <span class="control-error" v-if="errors.has('agreement')">@{{ errors.first('agreement') }}</span>
</div> --}}


{{--            </div>--}}
{{--        </form>--}}

