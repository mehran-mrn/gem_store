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


@push('scripts')
<script>
    $(document).ready(function() {
        $(".icon.icon-arrow-down.right").on('click', function(e){
            var currentElement = $(e.currentTarget);
            if (currentElement.hasClass('icon-arrow-down')) {
                $(this).parents('.menu-block').find('.menubar').show();
                currentElement.removeClass('icon-arrow-down');
                currentElement.addClass('icon-arrow-up');
            } else {
                $(this).parents('.menu-block').find('.menubar').hide();
                currentElement.removeClass('icon-arrow-up');
                currentElement.addClass('icon-arrow-down');
            }
        });
    });
</script>
@endpush