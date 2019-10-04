@extends('shop::layouts.master')

@section('page_title')
    {{ __('shop::app.customer.login-form.page-title') }}
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
                <div class="col-sm-12 col-md-12 col-xs-12 col-centered col-lg-6 ">
            {!! view_render_event('bagisto.shop.customers.login.before') !!}
            <form method="POST" action="{{ route('customer.session.create') }}" @submit.prevent="onSubmit">
                {{ csrf_field() }}
                <div class="login-form">
                    <h4 class="login-title">{{ __('shop::app.customer.login-form.title') }}</h4>
                    {!! view_render_event('bagisto.shop.customers.login_form_controls.before') !!}
                    <div class="row">
                        <div class="col-md-12 col-12">
                            <label for="email" class="required">{{ __('shop::app.customer.login-form.email') }}</label>
                            <input type="text" class="control" name="email" v-validate="'required|email'"
                                   value="{{ old('email') }}"
                                   data-vv-as="&quot;{{ __('shop::app.customer.login-form.email') }}&quot;">
                        </div>
                        <div class="col-12 mb--20">
                            <label for="password"
                                   class="required">{{ __('shop::app.customer.login-form.password') }}</label>
                            <input type="password" class="control" name="password" v-validate="'required'"
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
@endsection
