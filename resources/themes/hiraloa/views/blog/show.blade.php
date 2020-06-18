@extends('hiraloa::layouts.master')
@section('page_title')
    وبلاگ
@stop
@push('css')
    <link rel="stylesheet" href="{{url('themes/hiraloa/assets/css/plugins/timecircles.css')}}">
@endpush
@section('seo')
    <meta name="description" content="{{$post['meta_description']}}"/>
    <meta name="keywords" content="جواهرات کوبیک مای کوبیک سواروسکی ایران"/>
@stop
@section('content-wrapper')
    <!-- Begin Hiraola's Breadcrumb Area -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                <h2>{{$post['title']}}</h2>
                <ul>
                    <li><a href="/blog">وبلاگ</a></li>
                    <li class="active">{{$post['slug']}}</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Hiraola's Breadcrumb Area End Here -->

    <!-- Begin Hiraola's Blog Details Left Sidebar Area -->
    <div class="hiraola-blog_area hiraola-blog_area-2 hiraola-blog-details hiraola-banner_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 order-lg-1 order-2">
                    <div class="hiraola-blog-sidebar-wrapper">
                        <div class="hiraola-blog-sidebar">
                            <div class="hiraola-sidebar-search-form">
                                <form action="{{route('bagistoweblog.post.search')}}" method="post">
                                    @csrf
                                    <input type="text" class="hiraola-search-field" placeholder="جست و جو کنید..."
                                           name="search">
                                    <button type="submit" class="hiraola-search-btn"><i class="fa fa-search"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="hiraola-blog-sidebar">
                            <h4 class="hiraola-blog-sidebar-title">دسته بندی ها</h4>
                            <ul class="hiraola-blog-archive">
                                @foreach($categories as $category)
                                    <li>
                                        <a href="{{route('bagistoweblog.post.category',['slug'=>$category['slug']])}}">{{$category['category_name']}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="hiraola-blog-sidebar">
                            <h4 class="hiraola-blog-sidebar-title">آرشیو وبلاگ</h4>
                            <ul class="hiraola-blog-archive">
                                @for($i=0;$i<7;$i++)
                                    <li>
                                        <a href="{{route('bagistoweblog.post.archive',['year'=>jdate("Y",strtotime("-".$i." month",time()),'','','en'),'month'=>jdate("m",strtotime("-".$i." month",time()),'','','en')])}}">{{jdate("F y",strtotime("-".$i." month",time()))}}</a>
                                    </li>
                                @endfor
                            </ul>
                        </div>
                        <div class="hiraola-blog-sidebar">
                            <h4 class="hiraola-blog-sidebar-title">آخرین مطالب</h4>
                            <div class="hiraola-recent-post">
                                @foreach($lastPost as $last)
                                    <div class="hiraola-recent-post-thumb">
                                        <a href="/blog/{{$last['slug']}}">
                                            <img class="img-full" src="{{url('storage/'.$last['media']['url'])}}"
                                                 alt="{{$last['slug']}}">
                                        </a>
                                    </div>
                                    <div class="hiraola-recent-post-des">
                                        <span><a href="/blog/{{$last['slug']}}">{{$last['title']}}</a></span>
                                        <span class="hiraola-post-date">{{jdate("Y-m-d",strtotime($last['created_at']))}}</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="hiraola-blog-sidebar">
                            <h4 class="hiraola-blog-sidebar-title">تگ ها</h4>
                            <ul class="hiraola-blog-tags">
                                <li><a href="javascript:void(0)">کوبیک</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 order-lg-2 order-1">
                    <div class="blog-item">
                        <div class="blog-img img-hover_effect">
                            <a href="/blog/{{$post['slug']}}">
                                <img src="{{url('storage/'.$post['media']['url'])}}" alt="{{$post['slug']}}">
                            </a>
                            <div class="blog-meta-2">
                                <div class="blog-time_schedule">
                                    <span class="day">{{jdate("d",strtotime($post['created_at']))}}</span>
                                    <span class="month">{{jdate("F",strtotime($post['created_at']))}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="blog-content">
                            <div class="blog-heading">
                                <h5>
                                    <a href="javascrip:void(0)">{{$post['title']}}</a>
                                </h5>
                            </div>
                            <div class="blog-short_desc">
                                <div class="hiraola-blog-blockquote">
                                    <blockquote>
                                        <p>{{$post['subtitle']}}</p>
                                    </blockquote>
                                </div>
                            </div>
                        </div>
                        <div class="blog-additional_information">
                            {!! $post['post_body'] !!}
                        </div>
                        <div class="hiraola-tag-line">
                            <h4>تگ ها:</h4>
                            <a href="javascript:void(0)">کوبیک</a>,
                            <a href="javascript:void(0)">مای کوبیک</a>,
                            <a href="javascript:void(0)">جواهرات</a>
                        </div>
                        <div class="hiraola-social_link">
                            <ul>
                                <li class="facebook">
                                    <a href="https://www.facebook.com" data-toggle="tooltip" target="_blank"
                                       title="Facebook">
                                        <i class="fab fa-facebook"></i>
                                    </a>
                                </li>
                                <li class="twitter">
                                    <a href="https://twitter.com" data-toggle="tooltip" target="_blank" title="Twitter">
                                        <i class="fab fa-twitter-square"></i>
                                    </a>
                                </li>
                                <li class="google-plus">
                                    <a href="https://www.plus.google.com/discover" data-toggle="tooltip" target="_blank"
                                       title="Google Plus">
                                        <i class="fab fa-google-plus"></i>
                                    </a>
                                </li>
                                <li class="instagram">
                                    <a href="https://instagram.com/mycubic.ir" data-toggle="tooltip" target="_blank"
                                       title="Instagram">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        @if(sizeof($post['comments'])>=1)
                            <div class="hiraola-comment-section">
                                <h3>نظرات</h3>
                                <ul>
                                    @foreach($post['comments'] as $comment)
                                        @if($comment['parent_id']==null)
                                            <li>
                                                <div class="author-avatar">
                                                    <i class="fa fa-user fa-4x"></i>
                                                </div>
                                                <div class="comment-body">
                                                    {{--                                        <span class="reply-btn"><a href="javascript:void(0)">reply</a></span>--}}
                                                    <h5 class="comment-author">{{$comment['author_name']}}</h5>
                                                    <div class="comment-post-date">
                                                        {{jdate("d F y",strtotime($comment['created_at']))}}
                                                    </div>
                                                    <p>{{$comment['comment']}}</p>
                                                    <hr>
                                                    <div class="comment-children">
                                                        <ul>
                                                            @foreach($post['comments'] as $commentRes)
                                                                @if($commentRes['parent_id']==$comment['id'] && $commentRes['approved']==1)
                                                                    <li>
                                                                        <div class="author-avatar">
                                                                            <i class="fa fa-user fa-4x"></i>
                                                                        </div>
                                                                        <div class="comment-body">
                                                                            {{--                                        <span class="reply-btn"><a href="javascript:void(0)">reply</a></span>--}}
                                                                            <h5 class="comment-author">{{$commentRes['author_name']}}</h5>
                                                                            <div class="comment-post-date">
                                                                                {{jdate("d F y",strtotime($commentRes['created_at']))}}
                                                                            </div>
                                                                            <p>{{$commentRes['comment']}}</p>
                                                                        </div>
                                                                    </li>
                                                                @endif
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>


                                            </li>
                                        @endif
                                    @endforeach

                                </ul>
                            </div>
                        @endif
                        <div class="hiraola-blog-comment-wrapper">
                            <h3>نظر دهید</h3>
                            <p>پست الکترونیکی شما نمایش داده نخواهد شد. تمامی فیلد هایی که دارای *‌ هستند اجباری می
                                باشند.</p>
                            <form action="{{route('bagistoweblog.comment.store')}}" method="post">
                                @csrf
                                <input type="hidden" name="g-recaptcha-response">
                                <input type="hidden" name="post_id" value="{{$post['id']}}">
                                <div class="comment-post-box">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <label>نظر *‌</label>
                                            <textarea required="required" name="comment"
                                                      placeholder="یک نظر بنویسید"></textarea>
                                        </div>
                                        <div class="col-lg-4 col-md-4">
                                            <label>نام شما *‌</label>
                                            <input type="text" class="coment-field" name="author_name"
                                                   required="required" placeholder="نام">
                                        </div>
                                        <div class="col-lg-4 col-md-4">
                                            <label>پست الکترونیکی</label>
                                            <input type="text" class="coment-field" name="author_email"
                                                   placeholder="ایمیل">
                                        </div>
                                        <div class="col-lg-4 col-md-4">
                                            <label>وب سایت</label>
                                            <input type="text" class="coment-field" name="author_website"
                                                   placeholder="وب سایت">
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="comment-btn_wrap f-left">
                                                <div class="hiraola-post-btn_area">
                                                    <button class="hiraola-post_btn float-right" type="submit">ارسال
                                                        نظر
                                                    </button>
                                                </div>
                                                <!-- <input class="hiraola-post_btn" type="submit" name="submit" value="post comment"> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection