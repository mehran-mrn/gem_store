@inject ('productImageHelper', 'Webkul\Product\Helpers\ProductImage')

<?php $cart = cart()->getCart(); ?>

@if ($cart)

    @php
        Cart::collectTotals();
    @endphp

    <?php $items = $cart->items; ?>
    <div class="minicart-content">
        <div class="minicart-heading">
            <h4>{{ __('shop::app.header.cart') }} ({{ $cart->items->count() }})</h4>
        </div>
    <ul class="minicart-list">
        @foreach($cart->items as $item)
        <li class="minicart-product">
            <a class="product-item_remove" href="javascript:void(0)"><i class="ion-android-close"></i></a>
            <div class="product-item_img">
                <?php
                if ($item->type == "configurable"){
                    $images = $productImageHelper->getProductBaseImage($item->child->product);
                    $product = $item->child->product;
                }
                else{
                    $images = $productImageHelper->getProductBaseImage($item->product);
                    $product = $item->product;
                }
                ?>
                <a href="{{url('products')."/".$product['url_key']}}">
                    <img src="{{$images['small_image_url']}}" alt="Hiraola's Product Image">
                </a>
            </div>
            <div class="product-item_content">
                {!! view_render_event('bagisto.shop.checkout.cart-mini.item.name.before', ['item' => $item]) !!}

                <a class="product-item_title " href="{{url('products')."/".$product['url_key']}}">{{$item->name}}</a>

                {!! view_render_event('bagisto.shop.checkout.cart-mini.item.name.after', ['item' => $item]) !!}
                {!! view_render_event('bagisto.shop.checkout.cart-mini.item.options.before', ['item' => $item]) !!}

                @if ($item->type == "configurable")
                    <div class="item-options ">
                        {{ trim(Cart::getProductAttributeOptionDetails($item->child->product)['html']) }}
                    </div>
                @endif

                {!! view_render_event('bagisto.shop.checkout.cart-mini.item.options.after', ['item' => $item]) !!}
                {!! view_render_event('bagisto.shop.checkout.cart-mini.item.price.before', ['item' => $item]) !!}

                <span class="product-item_quantity float-right">{{core()->currency($item->base_total)}}

                {!! view_render_event('bagisto.shop.checkout.cart-mini.item.price.after', ['item' => $item]) !!}
                {!! view_render_event('bagisto.shop.checkout.cart-mini.item.quantity.before', ['item' => $item]) !!}

               x {{$item->quantity}} </span>

                {!! view_render_event('bagisto.shop.checkout.cart-mini.item.quantity.after', ['item' => $item]) !!}


            </div>
        </li>
        @endforeach
    </ul>
    </div>


    <div class="minicart-item_total">
        <span>Subtotal</span>
        {!! view_render_event('bagisto.shop.checkout.cart-mini.subtotal.before', ['cart' => $cart]) !!}

        <span class="ammount">{{core()->currency($cart->base_sub_total)}}</span>

        {!! view_render_event('bagisto.shop.checkout.cart-mini.subtotal.after', ['cart' => $cart]) !!}

    </div>


    <div class="minicart-btn_area">
        <a href="{{ route('shop.checkout.cart.index') }}" class="hiraola-btn hiraola-btn_dark hiraola-btn_fullwidth">{{ __('shop::app.minicart.view-cart') }}</a>
    </div>
    <div class="minicart-btn_area">
        <a href="{{ route('shop.checkout.onepage.index') }}" class="hiraola-btn hiraola-btn_dark hiraola-btn_fullwidth">{{ __('shop::app.minicart.checkout') }}</a>
    </div>

@else
    <div class="minicart-content">
        <div class="minicart-heading">
            <h4>{{ __('shop::app.header.cart') }} </h4>
            <h6>{{ __('shop::app.checkout.cart.empty') }}</h6>
        </div>
    </div>

@endif