@extends('hiraloa::layouts.master')

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
                            @foreach ($menu->items as $menuItem)
                                @if($menuItem['children'])
                                    <?php
                                    $active = 'active';
                                    $show = 'show';
                                    ?>
                                    @foreach ($menuItem['children'] as $subMenuItem)
                                        <div class="tab-pane fade {{$show}} {{$active}}"
                                             id="tab_{{ $subMenuItem['sort'] }}" role="tabpanel"
                                             aria-labelledby="{{$subMenuItem['sort']}}">
                                            <div class="myaccount-dashboard">
                                                {{$subMenuItem['sort']}}
{{--                                                @include('hiraloa::customers.account.profile.index')--}}
                                            </div>
                                        </div>
                                        <?php
                                        $active = '';
                                        $show = '';
                                        ?>
                                    @endforeach
                                @endif
                            @endforeach


                            <div class="tab-pane fade" id="account-orders" role="tabpanel"
                                 aria-labelledby="account-orders-tab">
                                <div class="myaccount-orders">
                                    <h4 class="small-title">MY ORDERS</h4>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover">
                                            <tbody>
                                            <tr>
                                                <th>ORDER</th>
                                                <th>DATE</th>
                                                <th>STATUS</th>
                                                <th>TOTAL</th>
                                                <th></th>
                                            </tr>
                                            <tr>
                                                <td><a class="account-order-id" href="javascript:void(0)">#5364</a></td>
                                                <td>Mar 27, 2019</td>
                                                <td>On Hold</td>
                                                <td>£162.00 for 2 items</td>
                                                <td><a href="javascript:void(0)"
                                                       class="hiraola-btn hiraola-btn_dark hiraola-btn_sm"><span>View</span></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><a class="account-order-id" href="javascript:void(0)">#5356</a></td>
                                                <td>Mar 27, 2019</td>
                                                <td>On Hold</td>
                                                <td>£162.00 for 2 items</td>
                                                <td><a href="javascript:void(0)"
                                                       class="hiraola-btn hiraola-btn_dark hiraola-btn_sm"><span>View</span></a>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="account-address" role="tabpanel"
                                 aria-labelledby="account-address-tab">
                                <div class="myaccount-address">
                                    <p>The following addresses will be used on the checkout page by default.</p>
                                    <div class="row">
                                        <div class="col">
                                            <h4 class="small-title">BILLING ADDRESS</h4>
                                            <address>
                                                1234 Heaven Stress, Beverly Hill OldYork UnitedState of Lorem
                                            </address>
                                        </div>
                                        <div class="col">
                                            <h4 class="small-title">SHIPPING ADDRESS</h4>
                                            <address>
                                                1234 Heaven Stress, Beverly Hill OldYork UnitedState of Lorem
                                            </address>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="account-details" role="tabpanel"
                                 aria-labelledby="account-details-tab">
                                <div class="myaccount-details">
                                    <form action="#" class="hiraola-form">
                                        <div class="hiraola-form-inner">
                                            <div class="single-input single-input-half">
                                                <label for="account-details-firstname">First Name*</label>
                                                <input type="text" id="account-details-firstname">
                                            </div>
                                            <div class="single-input single-input-half">
                                                <label for="account-details-lastname">Last Name*</label>
                                                <input type="text" id="account-details-lastname">
                                            </div>
                                            <div class="single-input">
                                                <label for="account-details-email">Email*</label>
                                                <input type="email" id="account-details-email">
                                            </div>
                                            <div class="single-input">
                                                <label for="account-details-oldpass">Current Password(leave blank to
                                                    leave
                                                    unchanged)</label>
                                                <input type="password" id="account-details-oldpass">
                                            </div>
                                            <div class="single-input">
                                                <label for="account-details-newpass">New Password (leave blank to leave
                                                    unchanged)</label>
                                                <input type="password" id="account-details-newpass">
                                            </div>
                                            <div class="single-input">
                                                <label for="account-details-confpass">Confirm New Password</label>
                                                <input type="password" id="account-details-confpass">
                                            </div>
                                            <div class="single-input">
                                                <button class="hiraola-btn hiraola-btn_dark" type="submit"><span>SAVE
                                                    CHANGES</span></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
