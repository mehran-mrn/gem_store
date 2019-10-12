@if (app('Webkul\Product\Repositories\ProductRepository')->getFeaturedProducts()->count())
    <?php
    $categories = [];
    $i = 1;
    foreach (app('Webkul\Category\Repositories\CategoryRepository')->getVisibleCategoryTree(core()->getCurrentChannel()->root_category_id) as $category) {
        if ($i < 5)
            if ($category->slug)
                array_push($categories, $category);
        $i++;
    }
    ?>
    <div class="hiraola-product-tab_area-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="product-tab">
                        <ul class="nav product-menu">
                            <?php
                            $active = 'active';
                            $x = 1;
                            ?>
                            @foreach($categories as $category)
                                <li>
                                    <a class="{{$active}}" data-toggle="tab"
                                       href="#cat_{{$x}}"><span>{{$category->translations->where('locale',core()->getCurrentLocale()->code)->first()->name}}</span></a>
                                </li>
                                <?php
                                $active = '';
                                $x++;
                                ?>
                            @endforeach
                        </ul>
                    </div>
                    <div class="tab-content hiraola-tab_content">
                        <?php
                        $active = array('active', 'show');
                        $x = 1;
                        ?>
                        @foreach($categories as $category)
                            <div id="cat_{{$x}}" class="tab-pane {{$active[0]}} {{$active[1]}}" role="tabpanel">
                                <div class="hiraola-product-tab_slider-3 hiraola-product_slider">
                                    @foreach (app('Webkul\Product\Repositories\ProductRepository',['featured'=>1])->getAll($category->id) as $productFlat)
                                        @include ('shop::products.list.card', ['product' => $productFlat])
                                    @endforeach
                                </div>
                            </div>
                            <?php
                            $active = array('', '');
                            $x++;
                            ?>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif



