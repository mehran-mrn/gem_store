@foreach($categories->children as $category)
    <li><a href="{{ route('shop.categories.index', $category->slug) }}">{{$category->translations->where('locale',core()->getCurrentLocale()->code)->first()->name}}</a>
        @if(count($category->children)>0)
            <ul class="hm-dropdown hm-sub_dropdown">
                @include("hiraloa::layouts.header.nav-menu.foreach_navmenu",["categories"=>$category])
            </ul>
    @endif
@endforeach
