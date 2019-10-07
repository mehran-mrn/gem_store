@extends('hiraloa::layouts.master')

@section('page_title')
    {{ __('shop::app.customer.account.profile.index.title') }}
@endsection

@section('content-wrapper')


    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                <h2>{{ __('shop::app.customer.account.profile.index.title') }}</h2>
                <ul>
                    <li><a href="{{ route('customer.account.index') }}">مشخصات من</a></li>
                    <li><a href="/">خانه</a></li>
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
                                <div class="myaccount-dashboard">
                                    {!! view_render_event('bagisto.shop.customers.account.profile.view.before', ['customer' => $customer]) !!}
                                    <div class="account-table-content pt-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <h6 class="text-black-50">{{ __('shop::app.customer.account.profile.fname') }}</h6>
                                                            <strong>{{ $customer->first_name }}</strong>
                                                            <hr>
                                                        </div>
                                                        <div class="form-group">
                                                            <h6 class="text-black-50">{{ __('shop::app.customer.account.profile.lname') }}</h6>
                                                            <strong>{{ $customer->last_name }}</strong>
                                                            <hr>
                                                        </div>
                                                        <div class="form-group">
                                                            <h6 class="text-black-50">{{ __('shop::app.customer.account.profile.gender') }}</h6>
                                                            <strong>{{ $customer->gender }}</strong>
                                                            <hr>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <h6 class="text-black-50">{{ __('shop::app.customer.account.profile.dob') }}</h6>
                                                            <strong>{{ $customer->date_of_birth }}</strong>
                                                            <hr>
                                                        </div>
                                                        <div class="form-group">
                                                            <h6 class="text-black-50">{{ __('shop::app.customer.account.profile.email') }}</h6>
                                                            <strong>{{ $customer->email }}</strong>
                                                            <hr>
                                                        </div>
                                                        <div class="form-group">
                                                            <h6 class="text-black-50">تاریخ عضویت</h6>
                                                            <strong>{{ $customer->created_at }}</strong>
                                                            <hr>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <a href="{{ route('customer.profile.edit') }}"
                                                           class="hiraola-btn hiraola-btn_sm col-2 float-right">{{ __('shop::app.customer.account.profile.index.edit') }}</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="clearfix"></div>
                                    </div>
                                    {!! view_render_event('bagisto.shop.customers.account.profile.view.after', ['customer' => $customer]) !!}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
