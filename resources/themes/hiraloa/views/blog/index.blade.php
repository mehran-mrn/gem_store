@extends('hiraloa::layouts.master')
@section('page_title')
    وبلاگ
@stop
@push('css')
    <link rel="stylesheet" href="{{url('themes/hiraloa/assets/css/plugins/timecircles.css')}}">
@endpush
@section('seo')
    <meta name="description" content="وبلاگ  مای کوبیک مطالب در مورد جواهرات "/>
    <meta name="keywords" content="جواهرات کوبیک مای کوبیک سواروسکی ایران"/>
@stop
@section('content-wrapper')
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">

            </div>
        </div>
    </div>
    <div class="hiraola-blog_area hiraola-blog_area-2 blog-grid-view_area blog-column-two_area">
        <div class="container rtl">
            <div class="row">
                <div class="col-12">
                    @if(isset($category))
                        <h4 class="hiraola-blog-sidebar-title">مطالب دسته بندی {!! isset($category)?"<strong class='text-info'>".$category."</strong>":'' !!} </h4>
                        <hr>
                    @endif
                </div>
                <div class="col-lg-12">
                    <div class="row blog-item_wrap">

                        @forelse($posts as $post)
                            <div class="col-lg-6">
                                <div class="blog-item">
                                    <div class="blog-img img-hover_effect">
                                        <a href="/blog/{{trim($post['slug'])}}">
                                            <img src="{{url('storage/'.$post['media']['url'])}}"
                                                 alt="{{$post['slug']}}">
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
                                                <a href="/blog/{{trim($post['slug'])}}">{{$post['title']}}</a>
                                            </h5>
                                        </div>
                                        <div class="blog-short_desc">
                                            <p>{{$post['subtitle']}}</p>
                                        </div>
                                        <div class="hiraola-read-more_area">
                                            <a href="/blog/{{trim($post['slug'])}}"
                                               class="hiraola-read_more float-right">ادامه
                                                مطلب</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            @if(isset($search))
                                <div class="alert alert-danger col-12 text-center"><h3>هیچ مطلبی مطابق با
                                        کلمه {!! isset($search)?"<strong class='text-info'>".$search."</strong>":'' !!}
                                        یافت نشد.</h3></div>
                                <a href="/blog"
                                   class="hiraola-btn hiraola-btn-ps_center text-center align-items-center">بازگشت با
                                    وبلاگ</a>
                            @endif
                            @if(isset($category))
                                <div class="alert alert-danger col-12 text-center"><h3>هیچ مطلبی مطابق با دسته بندی {!! isset($category)?"<strong class='text-info'>".$category."</strong>":'' !!} یافت نشد. </h3></div>
                                <a href="/blog"
                                   class="hiraola-btn hiraola-btn-ps_center text-center align-items-center">بازگشت با
                                    وبلاگ</a>
                            @endif
                        @endforelse
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="hiraola-paginatoin-area">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <ul class="hiraola-pagination-box">
                                            {{$posts->links('vendor.pagination.bootstrap-4')}}
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@push('scripts')
    <script src="{{ url('themes/hiraloa/assets/js/plugins/timecircles.js')}}"></script>
@endpush