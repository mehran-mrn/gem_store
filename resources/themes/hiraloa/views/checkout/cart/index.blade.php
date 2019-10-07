@extends('hiraloa::layouts.master')

@section('page_title')
    {{ __('shop::app.checkout.cart.title') }}
@stop

@section('content-wrapper')
    @inject ('productImageHelper', 'Webkul\Product\Helpers\ProductImage')
    <!-- Begin Hiraola's Breadcrumb Area -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                <h2>{{ __('shop::app.checkout.cart.title') }}</h2>

            </div>
        </div>
    </div>
    <!-- Hiraola's Breadcrumb Area End Here -->
    <!-- Begin Hiraola's Cart Area -->
    <div class="hiraola-cart-area">
        @if ($cart)
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <form action="{{ route('shop.checkout.cart.update') }}" method="POST"
                              @submit.prevent="onSubmit">
                            <div class="table-content table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th class="hiraola-product-remove">remove</th>
                                        <th class="hiraola-product-thumbnail">images</th>
                                        <th class="cart-product-name">Product</th>
                                        <th class="hiraola-product-quantity">Quantity</th>
                                        <th class="hiraola-product-subtotal">unit price</th>
                                        <th class="hiraola-product-subtotal">Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @csrf
                                    @foreach ($cart->items as $key => $item)
                                        <?php
                                        if ($item->type == "configurable")
                                            $productBaseImage = $productImageHelper->getProductBaseImage($item->child->product);
                                        else
                                            $productBaseImage = $productImageHelper->getProductBaseImage($item->product);
                                        ?>
                                        <tr>
                                            <td class="hiraola-product-remove">
                                                <a href="{{ route('shop.checkout.cart.remove', $item->id) }}"
                                                   onclick="removeLink('{{ __('shop::app.checkout.cart.cart-remove-action') }}')">
                                                    {{ __('shop::app.checkout.cart.remove-link') }}
                                                </a></span>
                                            <td class="hiraola-product-thumbnail">
                                                <a href="{{ url()->to('/').'/products/'.$item->product->url_key }}">
                                                    <img src="{{ $productBaseImage['small_image_url'] }}">
                                                </a>
                                            </td>
                                            <td class="hiraola-product-name">
                                                {!! view_render_event('bagisto.shop.checkout.cart.item.name.before', ['item' => $item]) !!}
                                                <a href="{{ url()->to('/').'/products/'.$item->product->url_key }}">{{ $item->product->name }}</a>
                                                {!! view_render_event('bagisto.shop.checkout.cart.item.name.after', ['item' => $item]) !!}
                                                {!! view_render_event('bagisto.shop.checkout.cart.item.options.before', ['item' => $item]) !!}
                                                @if ($item->type == 'configurable')
                                                    <span class="text-muted summary">
                                                {{ Cart::getProductAttributeOptionDetails($item->child->product)['html'] }}
                                            </span>
                                                @endif
                                                @if (! cart()->isItemHaveQuantity($item))
                                                    <div class="error-message mt-15">
                                                        * {{ __('shop::app.checkout.cart.quantity-error') }}
                                                    </div>
                                                @endif

                                                {!! view_render_event('bagisto.shop.checkout.cart.item.options.after', ['item' => $item]) !!}

                                            </td>
                                            <td class="quantity">
                                                {!! view_render_event('bagisto.shop.checkout.cart.item.quantity.before', ['item' => $item]) !!}

                                                <label>{{ __('shop::app.checkout.cart.quantity.quantity') }}</label>
                                                <div class="cart-plus-minus">
                                                    <input name="qty[{{$item->id}}]" value="{{ $item->quantity }}"
                                                           class="cart-plus-minus-box" type="text">
                                                    <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                                    <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                                </div>
                                                @auth('customer')
                                                    <span class="towishlist">
                                                    @if ($item->parent_id != 'null' ||$item->parent_id != null)
                                                            <a href="{{ route('shop.movetowishlist', $item->id) }}"
                                                               onclick="removeLink('{{ __('shop::app.checkout.cart.cart-remove-action') }}')">{{ __('shop::app.checkout.cart.move-to-wishlist') }}</a>
                                                        @else
                                                            <a href="{{ route('shop.movetowishlist', $item->child->id) }}"
                                                               onclick="removeLink('{{ __('shop::app.checkout.cart.cart-remove-action') }}')">{{ __('shop::app.checkout.cart.move-to-wishlist') }}</a>
                                                        @endif
                                                </span>
                                                @endauth

                                                {!! view_render_event('bagisto.shop.checkout.cart.item.quantity.after', ['item' => $item]) !!}

                                            </td>
                                            <td class="hiraola-product-price"><span class="amount">
                                            {!! view_render_event('bagisto.shop.checkout.cart.item.price.before', ['item' => $item]) !!}
                                                    {{ core()->currency($item->base_price) }}
                                                    {!! view_render_event('bagisto.shop.checkout.cart.item.price.after', ['item' => $item]) !!}
                                        </span></td>
                                            <td class="hiraola-product-price"><span class="amount">
                                            {!! view_render_event('bagisto.shop.checkout.cart.item.price.before', ['item' => $item]) !!}
                                                    {{ core()->currency($item->total) }}
                                                    {!! view_render_event('bagisto.shop.checkout.cart.item.price.after', ['item' => $item]) !!}
                                        </span></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                {!! view_render_event('bagisto.shop.checkout.cart.controls.after', ['cart' => $cart]) !!}

                                <div class="col-12">
                                    <div class="coupon-all">
                                        <div class="coupon">
                                            <input id="coupon_code" class="input-text" name="coupon_code" value=""
                                                   placeholder="Coupon code" type="text">
                                            <input class="button" name="apply_coupon" value="Apply coupon"
                                                   type="submit">
                                        </div>
                                        <div class="coupon2 ml-2">
                                            <input class="button" name="update_cart"
                                                   value="{{ __('shop::app.checkout.cart.update-cart') }}"
                                                   type="submit">
                                        </div>


                                    </div>

                                </div>
                                {!! view_render_event('bagisto.shop.checkout.cart.controls.after', ['cart' => $cart]) !!}

                            </div>
                        </form>

                        <div class="row">
                            <div class="col-md-5 ml-auto">
                                <div class="cart-page-total">
                                    {!! view_render_event('bagisto.shop.checkout.cart.summary.after', ['cart' => $cart]) !!}

                                    @include('shop::checkout.total.summary', ['cart' => $cart])

                                    {!! view_render_event('bagisto.shop.checkout.cart.summary.after', ['cart' => $cart]) !!}


                                    @if (! cart()->hasError())
                                        <a href="{{ route('shop.checkout.onepage.index') }}">
                                            {{ __('shop::app.checkout.cart.proceed-to-checkout') }}
                                        </a>
                                    @endif
                                    <a href="{{ route('shop.home.index') }}">
                                        {{ __('shop::app.checkout.cart.continue-shopping') }}
                                    </a>

                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            @include ('shop::products.view.cross-sells')

        @else
            <div class="row">
                <div class="col-sm-12 col-md-12 col-xs-12 col-centered col-lg-6 ">
                    <div class="title text-center">
                        {{ __('shop::app.checkout.cart.empty') }}
                        <div class="cart-page-total">
                            <a href="{{ route('shop.home.index') }}">
                                {{ __('shop::app.checkout.cart.continue-shopping') }}
                            </a>
                        </div>
                    </div>

                </div>
            </div>




        @endif
    <!-- Hiraola's Cart Area End Here -->


        @endsection

        @push('scripts')
            <script>
                function removeLink(message) {
                    if (!confirm(message))
                        event.preventDefault();
                }

                function updateCartQunatity(operation, index) {
                    var quantity = document.getElementById('cart-quantity' + index).value;

                    if (operation == 'add') {
                        quantity = parseInt(quantity) + 1;
                    } else if (operation == 'remove') {
                        if (quantity > 1) {
                            quantity = parseInt(quantity) - 1;
                        } else {
                            alert('{{ __('shop::app.products.less-quantity') }}');
                        }
                    }
                    document.getElementById('cart-quantity' + index).value = quantity;
                    event.preventDefault();
                }
            </script>
    @endpush