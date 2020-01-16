<div class="is-megamenu">
    <div id="megamenu-row-1" class="megamenu-row row megamenu-row-1">
        <div id="column-1-1" class="megamenu-col megamenu-col-1-1 col-sm-4 ">
            <ul class="content">
                <li class="html"><h3>Cat</h3>
                    <ul>
                        @foreach($categories->children as $category)
                            <li>
                                <a href="https://www.oliverweber.com/en/655-armbaender">{{$category->translations->where('locale',core()->getCurrentLocale()->code)->first()->name}}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>
            </ul>
        </div>
        <div id="column-1-2" class="megamenu-col megamenu-col-1-2 col-sm-4 ">
            <ul class="content">
                <li class="html"><h3>Occasions</h3>
                    <ul>
                        <li>
                            <a href="https://www.oliverweber.com/en/638-schmuck?occasion=first-communion">First
                                Communion</a></li>
                        <li>
                            <a href="https://www.oliverweber.com/en/638-schmuck?occasion=birthday">Birthday</a>
                        </li>
                        <li>
                            <a href="https://www.oliverweber.com/en/638-schmuck?occasion=wedding">Marriage</a>
                        </li>
                        <li>
                            <a href="https://www.oliverweber.com/en/638-schmuck?occasion=valentine-s-day">Valentine`s
                                day</a></li>
                        <li>
                            <a href="https://www.oliverweber.com/en/638-schmuck?occasion=christmas">Christmas</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <div id="column-1-3" class="megamenu-col megamenu-col-1-3 col-sm-4 ">
            <ul class="content">
                <li class="img-menu html"><h3>&nbsp;</h3>
                    <p><img src="/img/cms/submenu_1_032018_de.jpg" alt=""
                            width="100%" height="auto"/></p></li>
            </ul>
        </div>
    </div>
</div>