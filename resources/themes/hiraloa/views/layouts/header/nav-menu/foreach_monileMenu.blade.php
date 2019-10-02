@foreach($categories->children as $category)
    <li class="{{count($category->children)>0?"menu-item-has-children":""}}"><a href="{{ route('shop.categories.index', $category->slug) }}">{{$category->translations->where('locale',core()->getCurrentLocale()->code)->first()->name}}</a>
        @if(count($category->children)>0)
            <ul class="sub-menu">
                @include("hiraloa::layouts.header.nav-menu.foreach_navmenu",["categories"=>$category])
            </ul>
    @endif
@endforeach
