@extends('shop::layouts.master')

@section('page_title')
    {{ __('shop::app.customer.account.order.index.page-title') }}
@endsection
@push('scripts')
    <script src="{{ asset('themes/default/assets/js/shop.js') }}" type="text/javascript"></script>
@endpush
@section('content-wrapper')
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                <h2>{{ __('shop::app.customer.account.order.index.title') }}</h2>
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
                                <div class="myaccount-details">
                                    {!! view_render_event('bagisto.shop.customers.account.orders.list.before', ['orders' => $orders]) !!}
                                    <div class="account-items-list">
                                        <div class="account-table-content">
                                            @inject('order','Webkul\Shop\DataGrids\OrderDataGrid')
                                            {!! $order->render() !!}
                                        </div>
                                    </div>
                                    {!! view_render_event('bagisto.shop.customers.account.orders.list.after', ['orders' => $orders]) !!}

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
