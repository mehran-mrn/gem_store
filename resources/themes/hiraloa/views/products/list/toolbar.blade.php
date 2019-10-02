@inject ('toolbarHelper', 'Webkul\Product\Helpers\Toolbar')

{!! view_render_event('bagisto.shop.products.list.toolbar.before') !!}
{{ __('shop::app.products.pager-info', ['showing' => $products->firstItem() . '-' . $products->lastItem(), 'total' => $products->total()]) }}

<div class="shop-toolbar">

    <div class="product-item-selection_area">
        <div class="product-short mr-2">
            <label class="select-label">{{ __('shop::app.products.show') }}</label>
            <select onchange="window.location.href = this.value" class="nice-select">
                @foreach ($toolbarHelper->getAvailableLimits() as $limit)

                    <option value="{{ $toolbarHelper->getLimitUrl($limit) }}" {{ $toolbarHelper->isLimitCurrent($limit) ? 'selected' : '' }}>
                        {{ $limit }}
                    </option>

                @endforeach

            </select>
        </div>
        <div class="product-short mr-2">
            <label class="select-label">{{ __('shop::app.products.sort-by') }}</label>
            <select onchange="window.location.href = this.value" class="nice-select">
                @foreach ($toolbarHelper->getAvailableOrders() as $key => $order)

                    <option value="{{ $toolbarHelper->getOrderUrl($key) }}" {{ $toolbarHelper->isOrderCurrent($key) ? 'selected' : '' }}>
                        {{ __('shop::app.products.' . $order) }}
                    </option>

                @endforeach
            </select>
        </div>

    </div>
    <div class="product-view-mode">
            <a href="{{$toolbarHelper->isModeActive('grid')? "": $toolbarHelper->getModeUrl('grid')}}"
               class="{{$toolbarHelper->isModeActive('grid')? "active":""}} grid-3" data-target="gridview-3" data-toggle="tooltip" data-placement="top" title="Grid View"><i class="fa fa-th"></i></a>
            <a href="{{$toolbarHelper->isModeActive('list')? "":$toolbarHelper->getModeUrl('list')}}"
               class="{{$toolbarHelper->isModeActive('list')? "active":""}} list" data-target="listview" data-toggle="tooltip" data-placement="top" title="List View"><i class="fa fa-th-list"></i></a>

        </div>

</div>


{!! view_render_event('bagisto.shop.products.list.toolbar.after') !!}


<div class="responsive-layred-filter mb-20">
    <layered-navigation></layered-navigation>
</div>