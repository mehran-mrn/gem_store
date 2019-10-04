@extends('shop::layouts.master')

@section('page_title')
 {{ __('shop::app.customer.reset-password.title') }}
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
                    {!! view_render_event('bagisto.shop.customers.reset_password.before') !!}
                    <form method="post" action="{{ route('customer.reset-password.store') }}" @submit.prevent="onSubmit">
                        {{ csrf_field() }}
                        <div class="login-form">
                            <h4 class="login-title">{{ __('shop::app.customer.reset-password.title') }}</h4>
                            <div class="row">
                                {!! view_render_event('bagisto.shop.customers.reset_password_form_controls.before') !!}

                                <div class="col-md-12 col-12">
                                    <label for="email" class="required">{{ __('shop::app.customer.forgot-password.email') }}</label>
                                    <input type="email" class="control" name="email" v-validate="'required|email'"
                                           value="{{ old('email') }}">
                                </div>
                                <div class="col-md-12 col-12 " :class="[errors.has('password') ? 'has-error' : '']">
                                    <label for="password" >{{ __('shop::app.customer.reset-password.password') }}</label>
                                    <input type="password" class="control" name="password" v-validate="required|min:6"
                                           >
                                </div>
                                <div class="col-md-12 col-12" :class="[errors.has('confirm_password') ? 'has-error' : '']">
                                    <label for="password_confirmation" class="required">{{ __('shop::app.customer.reset-password.confirm-password') }}</label>
                                    <input type="password" class="control" name="password_confirmation" v-validate="'required|min:6|confirmed:password'"
                                           >
                                </div>
                                {!! view_render_event('bagisto.shop.customers.reset_password_form_controls.before') !!}



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
                                        {{ __('shop::app.customer.reset-password.submit-btn-title') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                    {!! view_render_event('bagisto.shop.customers.reset_password.before') !!}                </div>
            </div>
        </div>
    </div>



@endsection