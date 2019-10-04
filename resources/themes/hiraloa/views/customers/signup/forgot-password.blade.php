@extends('shop::layouts.master')

@section('page_title')
 {{ __('shop::app.customer.forgot-password.page_title') }}
@stop

@push('css')
    <style>
        .button-group {
            margin-bottom: 25px;
        }
        .primary-back-icon {
            vertical-align: middle;
        }
    </style>
@endpush

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
                    {!! view_render_event('bagisto.shop.customers.forget_password.before') !!}
                    <form method="post" action="{{ route('customer.forgot-password.store') }}" @submit.prevent="onSubmit">
                        {{ csrf_field() }}
                        <div class="login-form">
                            <h4 class="login-title">{{ __('shop::app.customer.forgot-password.title') }}</h4>
                            <div class="row">
                                {!! view_render_event('bagisto.shop.customers.forget_password_form_controls.before') !!}

                                <div class="col-md-12 col-12">
                                    <label for="email" class="required">{{ __('shop::app.customer.forgot-password.email') }}</label>
                                    <input type="email" class="control" name="email" v-validate="'required|email'"
                                           value="{{ old('email') }}"
                                           data-vv-as="&quot;{{ __('shop::app.customer.login-form.email') }}&quot;">
                                </div>
                                {!! view_render_event('bagisto.shop.customers.forget_password_form_controls.before') !!}

                                <div class="col-md-4">
                                    <div class="check-box">
                                        {{--                                        <input type="checkbox" id="remember_me">--}}
                                        {{--                                        <label for="remember_me">{{ __('shop::app.customer.login-form.remember_me') }}</label>--}}
                                    </div>
                                </div>
                                <div class="col-md-8">

                                    <div class="forgotton-password_info">
                                        <a href="{{ route('customer.session.index') }}"> {{ __('shop::app.customer.reset-password.back-link-title') }} {{ __('shop::app.customer.login-text.title') }}</a>

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
                                        {{ __('shop::app.customer.forgot-password.submit') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                    {!! view_render_event('bagisto.shop.customers.forget_password.before') !!}
                </div>
            </div>
        </div>
    </div>
@endsection