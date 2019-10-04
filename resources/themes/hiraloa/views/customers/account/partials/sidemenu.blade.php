<ul class="nav myaccount-tab-trigger">
    @foreach ($menu->items as $menuItem)
        <li class="nav-link">
            <a href="/customer/account/index">{{ trans($menuItem['name']) }}</a>
        </li>
        @if($menuItem['children'])
                @foreach ($menuItem['children'] as $subMenuItem)
                    <li class="nav-link {{ $menu->getActive($subMenuItem) }}">
                        <a href="{{ $subMenuItem['url'] }}">
                            {{ trans($subMenuItem['name']) }}
                        </a>
                    </li>
                @endforeach
        @endif
    @endforeach
</ul>
