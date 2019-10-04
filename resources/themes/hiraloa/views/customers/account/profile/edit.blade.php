@extends('shop::layouts.master')

@section('page_title')
    {{ __('shop::app.customer.account.profile.edit-profile.page-title') }}
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
                                            <span class="back-icon">
                                                <a href="{{ route('customer.account.index') }}">
                                                    <i class="icon icon-menu-back"></i></a>
                                            </span>

                                        <span class="account-heading">{{ __('shop::app.customer.account.profile.edit-profile.title') }}</span>
                                    </div>
                                    {!! view_render_event('bagisto.shop.customers.account.profile.edit.before', ['customer' => $customer]) !!}
                                    <form method="post" action="{{ route('customer.profile.edit') }}"
                                          @submit.prevent="onSubmit" class="hiraola-form border-0">
                                        <div class="hiraola-form-inner">
                                            @csrf
                                            {!! view_render_event('bagisto.shop.customers.account.profile.edit_form_controls.before', ['customer' => $customer]) !!}
                                            <div class="single-input single-input-half">
                                                <label for="first_name"
                                                       class="required">{{ __('shop::app.customer.account.profile.fname') }}</label>
                                                <input type="text" class="control" name="first_name"
                                                       value="{{ old('first_name') ?? $customer->first_name }}"
                                                       v-validate="'required'"
                                                       data-vv-as="&quot;{{ __('shop::app.customer.account.profile.fname') }}&quot;">
                                            </div>
                                            <div class="single-input single-input-half">
                                                <label for="last_name"
                                                       class="required">{{ __('shop::app.customer.account.profile.lname') }}</label>
                                                <input type="text" class="control" name="last_name"
                                                       value="{{ old('last_name') ?? $customer->last_name }}"
                                                       v-validate="'required'"
                                                       data-vv-as="&quot;{{ __('shop::app.customer.account.profile.lname') }}&quot;">
                                            </div>
                                            <div class="single-input">
                                                <label for="email"
                                                       class="required">{{ __('shop::app.customer.account.profile.email') }}</label>
                                                <input type="email" class="control" name="email"
                                                       value="{{ old('email') ?? $customer->email }}"
                                                       v-validate="'required'"
                                                       data-vv-as="&quot;{{ __('shop::app.customer.account.profile.email') }}&quot;">
                                            </div>
                                            <div class="single-input">
                                                <div class="control-group"
                                                     :class="[errors.has('gender') ? 'has-error' : '']">
                                                    <label for="email"
                                                           class="required">{{ __('shop::app.customer.account.profile.gender') }}</label>

                                                    <select name="gender" class="control" v-validate="'required'"
                                                            data-vv-as="&quot;{{ __('shop::app.customer.account.profile.gender') }}&quot;">
                                                        <option value=""
                                                                @if ($customer->gender == "") selected @endif></option>
                                                        <option value="Other"
                                                                @if ($customer->gender == "Other") selected @endif>
                                                            Other
                                                        </option>
                                                        <option value="Male"
                                                                @if ($customer->gender == "Male") selected @endif>
                                                            Male
                                                        </option>
                                                        <option value="Female"
                                                                @if ($customer->gender == "Female") selected @endif>
                                                            Female
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="single-input">
                                                <label for="date_of_birth">{{ __('shop::app.customer.account.profile.dob') }}</label>
                                                <input type="date" class="control" name="date_of_birth"
                                                       value="{{ old('date_of_birth') ?? $customer->date_of_birth }}"
                                                       v-validate=""
                                                       data-vv-as="&quot;{{ __('shop::app.customer.account.profile.dob') }}&quot;">
                                            </div>
                                            <div class="single-input">
                                                <label for="password">{{ __('shop::app.customer.account.profile.opassword') }}</label>
                                                <input type="password" class="control" name="oldpassword"
                                                       data-vv-as="&quot;{{ __('shop::app.customer.account.profile.opassword') }}&quot;"
                                                       v-validate="'min:6'">
                                            </div>
                                            <div class="single-input">
                                                <label for="password">{{ __('shop::app.customer.account.profile.password') }}</label>

                                                <input type="password" id="password" class="control" name="password"
                                                       data-vv-as="&quot;{{ __('shop::app.customer.account.profile.password') }}&quot;"
                                                       v-validate="'min:6'">
                                            </div>
                                            <div class="single-input">
                                                <label for="password">{{ __('shop::app.customer.account.profile.cpassword') }}</label>

                                                <input type="password" id="password_confirmation" class="control"
                                                       name="password_confirmation"
                                                       data-vv-as="&quot;{{ __('shop::app.customer.account.profile.cpassword') }}&quot;"
                                                       v-validate="'min:6|confirmed:password'">
                                            </div>
                                            {!! view_render_event('bagisto.shop.customers.account.profile.edit_form_controls.after', ['customer' => $customer]) !!}
                                            <div class="single-input">
                                                <button class="hiraola-btn hiraola-btn_dark" type="submit">
                                                    <span>{{ __('shop::app.customer.account.profile.submit') }}</span>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                    {!! view_render_event('bagisto.shop.customers.account.profile.edit.after', ['customer' => $customer]) !!}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
