@extends('hiraloa::layouts.master')

@section('page_title')
    {{ __('shop::app.customer.account.address.index.page-title') }}
@endsection

@section('content-wrapper')
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                <h2>{{ __('shop::app.customer.account.address.index.title') }}</h2>
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
                                    <div class="account-head mb-10">
                                        @if (! $addresses->isEmpty())
                                            <a href="{{ route('customer.address.create') }}"
                                               class="col-2 float-right hiraola-btn hiraola-btn_sm">{{ __('shop::app.customer.account.address.index.add') }}</a>
                                        @else
                                            <span></span>
                                        @endif
                                        <div class="horizontal-rule"></div>
                                    </div>
                                    {!! view_render_event('bagisto.shop.customers.account.address.list.before', ['addresses' => $addresses]) !!}
                                    <div class="account-table-content">
                                        @if ($addresses->isEmpty())
                                            <div>{{ __('shop::app.customer.account.address.index.empty') }}</div>
                                            <br/>
                                            <span class="cart-page-total">
                                            <a href="{{ route('customer.address.create') }}">{{ __('shop::app.customer.account.address.index.add') }}</a>
                                            </span>
                                        @else
                                            <div class="clearfix"></div>
                                            <div class="myaccount-address">
                                                @foreach ($addresses as $address)
                                                    <div class="card mt-2">
                                                        <div class="card-header">
                                                            <strong class="card-title"> {{ auth()->guard('customer')->user()->name }}
                                                                -{{ $address->name }}</strong>
                                                        </div>
                                                        <div class="card-body">
                                                            <strong>استان</strong> <span>{{ $address->city }}</span>
                                                            <strong>شهر</strong> <span>{{ $address->state }}</span>
                                                            <strong>محله</strong> <span>{{ $address->address1 }}</span>
                                                        </div>
                                                        <div class="card-footer">
                                                            <div class="row">
                                                                <div class="col-7">
                                                                    <div class="row">
                                                                        <div class="col-1"><i
                                                                                    class="fa fa-mail-bulk "></i></div>
                                                                        <div class="col-3"><h6 class="px-2">کد پستی</h6>
                                                                        </div>
                                                                        <div class="col-8">
                                                                            <strong>{{ $address->postcode }}</strong>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row pt-2">
                                                                        <div class="col-1"><i
                                                                                    class="fa fa-mobile-alt text-center"></i>
                                                                        </div>
                                                                        <div class="col-3"><h6
                                                                                    class="px-2">{{ __('shop::app.customer.account.address.index.contact') }}</h6>
                                                                        </div>
                                                                        <div class="col-8">
                                                                            <strong>{{ $address->phone }}</strong></div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-5">
                                                                    <div class="row">
                                                                        <div class="col-6">
                                                                            <a href="{{ route('customer.address.edit', $address->id) }}"
                                                                               class="hiraola-btn hiraola-btn_sm m-2 py-0 px-0">
                                                                                {{ __('shop::app.customer.account.address.index.edit') }}</a>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <a href="{{ route('address.delete', $address->id) }}"
                                                                               class="hiraola-btn hiraola-btn_sm m-2 py-0 px-0"
                                                                               onclick="deleteAddress('{{ __('shop::app.customer.account.address.index.confirm-delete') }}')">
                                                                                {{ __('shop::app.customer.account.address.index.delete') }}</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                    {!! view_render_event('bagisto.shop.customers.account.address.list.after', ['addresses' => $addresses]) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection

@push('scripts')
    <script>
        function deleteAddress(message) {
            if (!confirm(message))
                event.preventDefault();
        }
    </script>
@endpush
