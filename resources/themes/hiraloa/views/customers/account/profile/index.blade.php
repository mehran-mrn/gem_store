@extends('shop::layouts.master')

@section('page_title')
    {{ __('shop::app.customer.account.profile.index.title') }}
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
                                <div class="myaccount-dashboard">
                                    <div class="account-head">

                                        <span class="account-heading">{{ __('shop::app.customer.account.profile.index.title') }}</span>

                                        <span class="account-action">
                                            <a href="{{ route('customer.profile.edit') }}">{{ __('shop::app.customer.account.profile.index.edit') }}</a>
                                        </span>
                                        <div class="horizontal-rule"></div>
                                    </div>

                                    {!! view_render_event('bagisto.shop.customers.account.profile.view.before', ['customer' => $customer]) !!}

                                    <div class="account-table-content pt-4">
                                        <table class="table table-responsive">
                                            <tbody>
                                            <tr>
                                                <td>{{ __('shop::app.customer.account.profile.fname') }}</td>
                                                <td>{{ $customer->first_name }}</td>
                                            </tr>

                                            <tr>
                                                <td>{{ __('shop::app.customer.account.profile.lname') }}</td>
                                                <td>{{ $customer->last_name }}</td>
                                            </tr>

                                            <tr>
                                                <td>{{ __('shop::app.customer.account.profile.gender') }}</td>
                                                <td>{{ $customer->gender }}</td>
                                            </tr>

                                            <tr>
                                                <td>{{ __('shop::app.customer.account.profile.dob') }}</td>
                                                <td>{{ $customer->date_of_birth }}</td>
                                            </tr>

                                            <tr>
                                                <td>{{ __('shop::app.customer.account.profile.email') }}</td>
                                                <td>{{ $customer->email }}</td>
                                            </tr>

                                            {{-- @if ($customer->subscribed_to_news_letter == 1)
                                                <tr>
                                                    <td> {{ __('shop::app.footer.subscribe-newsletter') }}</td>
                                                    <td>
                                                        <a class="btn btn-sm btn-primary" href="{{ route('shop.unsubscribe', $customer->email) }}">{{ __('shop::app.subscription.unsubscribe') }} </a>
                                                    </td>
                                                </tr>
                                            @endif --}}
                                            </tbody>
                                        </table>
                                    </div>

                                    <accordian :title="'{{ __('shop::app.customer.account.profile.index.title') }}'" :active="true">
                                        <div slot="body">
                                            <div class="page-action">
                                                <form method="POST" action="{{ route('customer.profile.destroy') }}">
                                                    @csrf
                                                    <input type="submit" class="hiraola-login_btn mt-10"
                                                           value="{{ __('shop::app.delete') }}">
                                                </form>
                                            </div>
                                        </div>
                                    </accordian>
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
