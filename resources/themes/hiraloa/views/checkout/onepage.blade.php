@extends('shop::layouts.master')

@section('page_title')
    {{ __('shop::app.checkout.onepage.title') }}
@stop

@section('content-wrapper')
    <script type="text/javascript" src="{{ url('/themes/default/assets/js/shop.js') }}"></script>
    <checkout></checkout>
@endsection

@push('scripts')
    <script type="text/x-template" id="checkout-template">
        <div id="checkout" class="checkout-area">
            <div class="container">
                <div class="row">
                    <div id="address-section" class="step-content information col-lg-6 col-12"
                         v-show="currentStep == 1">
                        @include('hiraloa::checkout.onepage.customer-info')

                    </div>
                    <div id="shipping-section" class="step-content shipping col-lg-6 col-12" v-show="currentStep == 2">
                        <shipping-section v-if="currentStep == 2"
                                          @onShippingMethodSelected="shippingMethodSelected($event)"></shipping-section>

                    </div>
                    <div class="step-content payment col-lg-6 col-12" v-show="currentStep == 3" id="payment-section">
                        <payment-section v-if="currentStep == 3"
                                         @onPaymentMethodSelected="paymentMethodSelected($event)"></payment-section>


                    </div>
                    <div class="step-content review col-lg-6 col-12" v-show="currentStep == 4" id="summary-section">
                        <review-section v-if="currentStep == 4" :key="reviewComponentKey">
                            <div slot="summary-section">


                            </div>
                        </review-section>

                    </div>

                    <div class="col-lg-6 col-12">
                        <summary-section :key="summeryComponentKey"
                                         @onApplyCoupon="getOrderSummary"
                                         @onRemoveCoupon="getOrderSummary"
                        ></summary-section>
                        <div class="order-button-payment">

                            <button v-if="currentStep == 1" type="button" class="btn btn-success btn-lg btn-block "
                                    @click="validateForm('address-form')"
                                    :disabled="disable_button" id="checkout-address-continue-button">
                                {{ __('shop::app.checkout.onepage.continue') }}
                            </button>
                            <button v-if="currentStep == 2" type="button" class="btn btn-success btn-lg btn-block "
                                    @click="validateForm('shipping-form')"
                                    :disabled="disable_button" id="checkout-shipping-continue-button">
                                {{ __('shop::app.checkout.onepage.continue') }}
                            </button>
                            <button v-if="currentStep == 3" type="button" class="btn btn-success btn-lg btn-block "
                                    @click="validateForm('payment-form')"
                                    :disabled="disable_button" id="checkout-payment-continue-button">
                                {{ __('shop::app.checkout.onepage.continue') }}
                            </button>

                            <button v-if="currentStep == 4" type="button" class="btn btn-success btn-lg btn-block "
                                    @click="placeOrder()"
                                    :disabled="disable_button" id="checkout-place-order-button">
                                {{ __('shop::app.checkout.onepage.place-order') }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </script>
    <script>
        var shippingHtml = '';
        var paymentHtml = '';
        var reviewHtml = '';
        var summaryHtml = '';
        var customerAddress = '';
        var shippingMethods = '';
        var paymentMethods = '';

        @auth('customer')
                @if(auth('customer')->user()->addresses)
            customerAddress = @json(auth('customer')->user()->addresses);
        customerAddress.email = "{{ auth('customer')->user()->email }}";
        customerAddress.first_name = "{{ auth('customer')->user()->first_name }}";
        customerAddress.last_name = "{{ auth('customer')->user()->last_name }}";
        @endif
        @endauth

        Vue.component('checkout', {
            template: '#checkout-template',
            inject: ['$validator'],

            data: function () {
                return {
                    currentStep: 1,
                    completedStep: 0,
                    address: {
                        billing: {
                            address1: [''],

                            use_for_shipping: true,
                        },

                        shipping: {
                            address1: ['']
                        },
                    },
                    selected_shipping_method: '',
                    selected_payment_method: '',
                    disable_button: false,
                    new_shipping_address: false,
                    new_billing_address: false,
                    allAddress: {},
                    countryStates: @json(core()->groupedStatesByCountries()),
                    country: @json(core()->countries()),
                    summeryComponentKey: 0,
                    reviewComponentKey: 0
                }
            },

            created: function () {
                this.getOrderSummary();

                if (!customerAddress) {
                    this.new_shipping_address = true;
                    this.new_billing_address = true;
                } else {
                    this.address.billing.first_name = this.address.shipping.first_name = customerAddress.first_name;
                    this.address.billing.last_name = this.address.shipping.last_name = customerAddress.last_name;
                    this.address.billing.email = this.address.shipping.email = customerAddress.email;

                    if (customerAddress.length < 1) {
                        this.new_shipping_address = true;
                        this.new_billing_address = true;
                    } else {
                        this.allAddress = customerAddress;

                        for (var country in this.country) {
                            for (var code in this.allAddress) {
                                if (this.allAddress[code].country) {
                                    if (this.allAddress[code].country == this.country[country].code) {
                                        this.allAddress[code]['country'] = this.country[country].name;
                                    }
                                }
                            }
                        }
                    }
                }
            },

            methods: {
                navigateToStep: function (step) {
                    if (step <= this.completedStep) {
                        this.currentStep = step
                        this.completedStep = step - 1;
                    }
                },

                haveStates: function (addressType) {
                    if (this.countryStates[this.address[addressType].country] && this.countryStates[this.address[addressType].country].length)
                        return true;

                    return false;
                },

                validateForm: function (scope) {
                    var this_this = this;

                    this.$validator.validateAll(scope).then(function (result) {
                        if (result) {
                            if (scope == 'address-form') {
                                this_this.saveAddress();
                            } else if (scope == 'shipping-form') {
                                this_this.saveShipping();
                            } else if (scope == 'payment-form') {
                                this_this.savePayment();
                            }
                        }
                    });
                },

                getOrderSummary() {
                    var this_this = this;

                    this.$http.get("{{ route('shop.checkout.summary') }}")
                        .then(function (response) {
                            summaryHtml = Vue.compile(response.data.html)

                            this_this.summeryComponentKey++;
                            this_this.reviewComponentKey++;
                        })
                        .catch(function (error) {
                        })
                },

                saveAddress: function () {
                    var this_this = this;

                    this.disable_button = true;

                    this.$http.post("{{ route('shop.checkout.save-address') }}", this.address)
                        .then(function (response) {
                            this_this.disable_button = false;

                            if (response.data.jump_to_section == 'shipping') {
                                shippingHtml = Vue.compile(response.data.html)
                                shippingMethods = response.data.shippingMethods;
                                this_this.completedStep = 1;
                                this_this.currentStep = 2;

                                this_this.getOrderSummary();
                            }
                        })
                        .catch(function (error) {
                            this_this.disable_button = false;

                            this_this.handleErrorResponse(error.response, 'address-form')
                        })
                },

                saveShipping: function () {
                    var this_this = this;

                    this.disable_button = true;

                    this.$http.post("{{ route('shop.checkout.save-shipping') }}", {'shipping_method': this.selected_shipping_method})
                        .then(function (response) {
                            this_this.disable_button = false;

                            if (response.data.jump_to_section == 'payment') {
                                paymentHtml = Vue.compile(response.data.html)
                                paymentMethods = response.data.paymentMethods;
                                this_this.completedStep = 2;
                                this_this.currentStep = 3;

                                this_this.getOrderSummary();
                            }
                        })
                        .catch(function (error) {
                            this_this.disable_button = false;

                            this_this.handleErrorResponse(error.response, 'shipping-form')
                        })
                },

                savePayment: function () {
                    var this_this = this;

                    this.disable_button = true;

                    this.$http.post("{{ route('shop.checkout.save-payment') }}", {'payment': this.selected_payment_method})
                        .then(function (response) {
                            this_this.disable_button = false;

                            if (response.data.jump_to_section == 'review') {
                                reviewHtml = Vue.compile(response.data.html)
                                this_this.completedStep = 3;
                                this_this.currentStep = 4;

                                this_this.getOrderSummary();
                            }
                        })
                        .catch(function (error) {
                            this_this.disable_button = false;

                            this_this.handleErrorResponse(error.response, 'payment-form')
                        });
                },

                placeOrder: function () {
                    var this_this = this;

                    this.disable_button = false;
                    this.$http.post("{{ route('shop.checkout.save-order') }}", {'_token': "{{ csrf_token() }}"})
                        .then(function (response) {
                            alert(response);
                            console.log(response);

                            if (response.data.success) {
                                if (response.data.redirect_url) {
                                    console.log(response);
                                    window.location.href = response.data.redirect_url;
                                } else {
                                    console.log(1);
                                    window.location.href = "{{ route('shop.checkout.success') }}";
                                }
                            }
                        })
                        .catch(function (error) {
                            this_this.disable_button = true;

                            window.flashMessages = [{
                                'type': 'alert-error',
                                'message': "{{ __('shop::app.common.error') }}"
                            }];

                            this_this.$root.addFlashMessages()
                        })
                },

                handleErrorResponse: function (response, scope) {
                    if (response.status == 422) {
                        serverErrors = response.data.errors;
                        this.$root.addServerErrors(scope)
                    } else if (response.status == 403) {
                        if (response.data.redirect_url) {
                            window.location.href = response.data.redirect_url;
                        }
                    }
                },

                shippingMethodSelected: function (shippingMethod) {
                    this.selected_shipping_method = shippingMethod;
                },

                paymentMethodSelected: function (paymentMethod) {
                    this.selected_payment_method = paymentMethod;
                },

                newBillingAddress: function () {
                    this.new_billing_address = true;
                },

                newShippingAddress: function () {
                    this.new_shipping_address = true;
                },

                backToSavedBillingAddress: function () {
                    this.new_billing_address = false;
                },

                backToSavedShippingAddress: function () {
                    this.new_shipping_address = false;
                },
            }
        })

        var shippingTemplateRenderFns = [];

        Vue.component('shipping-section', {
            inject: ['$validator'],

            data: function () {
                return {
                    templateRender: null,

                    selected_shipping_method: '',
                }
            },

            staticRenderFns: shippingTemplateRenderFns,

            mounted: function () {
                for (method in shippingMethods) {
                    if (shippingMethods[method]['default'] == 'yes' || shippingMethods[method]['default'] == 1) {
                        for (rate in shippingMethods[method]['rates']) {
                            this.selected_shipping_method = shippingMethods[method]['rates'][rate]['method'];

                            this.methodSelected();
                        }
                    }
                }

                this.templateRender = shippingHtml.render;
                for (var i in shippingHtml.staticRenderFns) {
                    shippingTemplateRenderFns.push(shippingHtml.staticRenderFns[i]);
                }

                eventBus.$emit('after-checkout-shipping-section-added');
            },

            render: function (h) {
                return h('div', [
                    (this.templateRender ?
                        this.templateRender() :
                        '')
                ]);
            },

            methods: {
                methodSelected: function () {
                    this.$emit('onShippingMethodSelected', this.selected_shipping_method)

                    eventBus.$emit('after-shipping-method-selected');
                }
            }
        })

        var paymentTemplateRenderFns = [];

        Vue.component('payment-section', {
            inject: ['$validator'],

            data: function () {
                return {
                    templateRender: null,

                    payment: {
                        method: ""
                    },
                }
            },

            staticRenderFns: paymentTemplateRenderFns,

            mounted: function () {
                for (method in paymentMethods) {
                    if (paymentMethods[method]['default'] == 'yes' || paymentMethods[method]['default'] == 1) {
                        this.payment.method = paymentMethods[method]['method'];

                        this.methodSelected();
                    }
                }

                this.templateRender = paymentHtml.render;
                for (var i in paymentHtml.staticRenderFns) {
                    paymentTemplateRenderFns.push(paymentHtml.staticRenderFns[i]);
                }

                eventBus.$emit('after-checkout-payment-section-added');
            },

            render: function (h) {
                return h('div', [
                    (this.templateRender ?
                        this.templateRender() :
                        '')
                ]);
            },

            methods: {
                methodSelected: function () {
                    this.$emit('onPaymentMethodSelected', this.payment)

                    eventBus.$emit('after-payment-method-selected');
                }
            }
        })

        var reviewTemplateRenderFns = [];

        Vue.component('review-section', {
            data: function () {
                return {
                    templateRender: null,

                    error_message: ''
                }
            },

            staticRenderFns: reviewTemplateRenderFns,

            render: function (h) {
                return h('div', [
                    (this.templateRender ?
                        this.templateRender() :
                        '')
                ]);
            },

            mounted: function () {
                this.templateRender = reviewHtml.render;

                for (var i in reviewHtml.staticRenderFns) {
                    // reviewTemplateRenderFns.push(reviewHtml.staticRenderFns[i]);
                    reviewTemplateRenderFns[i] = reviewHtml.staticRenderFns[i];
                }

                this.$forceUpdate();
            }
        });


        var summaryTemplateRenderFns = [];

        Vue.component('summary-section', {
            inject: ['$validator'],

            props: {
                discount: {
                    type: [String, Number],

                    default: 0,
                }
            },

            data: function () {
                return {
                    templateRender: null,

                    coupon_code: null,

                    error_message: null,

                    couponChanged: false,

                    changeCount: 0
                }
            },

            staticRenderFns: summaryTemplateRenderFns,

            mounted: function () {
                this.templateRender = summaryHtml.render;

                for (var i in summaryHtml.staticRenderFns) {
                    // summaryTemplateRenderFns.push(summaryHtml.staticRenderFns[i]);
                    summaryTemplateRenderFns[i] = summaryHtml.staticRenderFns[i];
                }

                this.$forceUpdate();
            },

            render: function (h) {
                return h('div', [
                    (this.templateRender ?
                        this.templateRender() :
                        '')
                ]);
            },

            methods: {
                onSubmit: function () {
                    var this_this = this;

                    axios.post('{{ route('shop.checkout.check.coupons') }}', {code: this_this.coupon_code})
                        .then(function (response) {
                            this_this.$emit('onApplyCoupon');

                            this_this.couponChanged = true;
                        })
                        .catch(function (error) {
                            this_this.couponChanged = true;

                            this_this.error_message = error.response.data.message;
                        });
                },

                changeCoupon: function () {
                    if (this.couponChanged == true && this.changeCount == 0) {
                        this.changeCount++;

                        this.error_message = null;

                        this.couponChanged = false;
                    } else {
                        this.changeCount = 0;
                    }
                },

                removeCoupon: function () {
                    var this_this = this;

                    axios.post('{{ route('shop.checkout.remove.coupon') }}')
                        .then(function (response) {
                            this_this.$emit('onRemoveCoupon')
                        })
                        .catch(function (error) {
                            window.flashMessages = [{'type': 'alert-error', 'message': error.response.data.message}];

                            this_this.$root.addFlashMessages();
                        });
                }
            }
        })
    </script>

@endpush