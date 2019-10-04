@extends('shop::layouts.master')

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
                                        <p>سلام <b>  </b>میلاد نیستید؟ (<a
                                                    href="login-register.html"> خارج شوید</a>)</p>
                                        <p>به پروفایل کاربری خود در سایت جم سواروسکی خوش آمدید. <br/><br/><a
                                                    href="javascript:void(0)">برای ویرایش مشخصات و کلمه عبور اینجا کلیک
                                                کنید.</a>.</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
@endsection
