<ul class="nav myaccount-tab-trigger">
    @foreach ($menu->items as $menuItem)

        @if($menuItem['children'])
            <?php
            $active = '';
            ?>
            @foreach ($menuItem['children'] as $subMenuItem)
                <li class="nav-item">
                    <a class="nav-link {{$active}} {{ $menu->getActive($subMenuItem) }}"
                       href="{{ url($subMenuItem['url']) }}"
                       aria-selected="true">{{ trans($subMenuItem['name']) }}</a>
                </li>
                    <?php
                    $active = '';
                    ?>
            @endforeach
        @endif
    @endforeach
</ul>



