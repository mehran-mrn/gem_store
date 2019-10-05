@if (app('Webkul\Product\Repositories\ProductRepository')->getFeaturedProducts()->count())

    <?php
    $categories = [];
    $i = 1;
    foreach (app('Webkul\Category\Repositories\CategoryRepository')->getVisibleCategoryTree(core()->getCurrentChannel()->root_category_id) as $category) {
        if ($i < 3)
            if ($category->slug && $category->image_url)
                array_push($categories, $category);
        $i++;
    }
    ?>
    <div class="hiraola-banner_area-2">
        <div class="container">
            <div class="row">
                @foreach($categories as $category)
                    <div class="col-lg-6">
                        <div class="banner-item img-hover_effect">
                            <a href="shop-left-sidebar.html">
                                <img class="img-full" src="{{$category->image_url}}" alt="Hiraola's Banner">
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endif