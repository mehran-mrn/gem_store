@extends('admin::layouts.content')

@section('page_title')
    نمایش نظر | {{$comment['author_name']}}
@stop

@section('content')
    <div class="content">
        <form method="POST" action="{{ route('bagistoweblog.comment.update',['id'=>$comment['id']]) }}"
              @submit.prevent="onSubmit"
              enctype="multipart/form-data">
            <div class="page-header">
                <div class="page-title">
                    <h1>
                        <i class="icon angle-left-icon back-link"
                           onclick="history.length > 1 ? history.go(-1) : window.location = '{{ url('/admin/dashboard') }}';"></i>
                        نمایش نظر |‌ <strong class="text-danger">{{$comment['author_name']}}</strong>
                        {{ Config::get('carrier.social.facebook.url') }}
                    </h1>
                </div>
                <div class="page-action">
                    <button type="submit" class="btn btn-lg btn-primary">
                        ذخیره تغییرات
                    </button>
                </div>
            </div>
            <div class="page-content">
                <div class="form-container">
                    @csrf()
                    @if(isset($comment['author_name']) && $comment['author_name']!="")
                        <div class="control-group">
                            <span>نام: </span><strong>{{ $comment['author_name'] }}</strong>
                        </div>
                    @endif
                    @if(isset($comment['author_email']) && $comment['author_email']!="")
                        <div class="control-group">
                            <span>ایمیل: </span><strong>{{ $comment['author_email'] }}</strong>
                        </div>
                    @endif
                    @if(isset($comment['author_mobile']) && $comment['author_mobile']!="")
                        <div class="control-group">
                            <span>شماره تماس: </span><strong>{{ $comment['author_mobile'] }}</strong>
                        </div>
                    @endif
                    @if(isset($comment['author_website']) && $comment['author_website']!="")
                        <div class="control-group">
                            <span>وب سایت: </span><strong>{{ $comment['author_website'] }}</strong>
                        </div>
                    @endif
                    @if(isset($comment['comment']))
                        <div class="control-group">
                            <span>نظر: </span>
                            <h4>{{ $comment['comment'] }}</h4>
                        </div>
                    @endif
                    @if($comment['parent_id']==null)
                        <div class="control-group">
                            <label for="post_body">پاسخ نظر</label>
                            <textarea type="text" class="control" name="response"></textarea>
                        </div>
                    @endif
                    <div class="control-group">
                        <label for="status">وضعیت</label>
                        <select class="control" name="status" id="status">
                            <option value="1" {{$comment['approved']==1?'selected':''}}>تایید</option>
                            <option value="0" {{$comment['approved']==0?'selected':''}}>عدم تایید</option>
                        </select>
                    </div>
                </div>
                <hr>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <td>نام نویسنده</td>
                        <td>موبایل</td>
                        <td>وب سایت</td>
                        <td>ایمیل</td>
                        <td>پاسخ</td>
                        <td>زمان پاسخ</td>
                        <td>عملیات</td>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($response as $res)
                        <tr>
                            <td>{{$res['author_name']}}</td>
                            <td>{{$res['author_mobile']}}</td>
                            <td>{{$res['author_website']}}</td>
                            <td>{{$res['author_email']}}</td>
                            <td>{{$res['comment']}}</td>
                            <td>{{jdate("Y-m-d H:i:s",strtotime($res['created_at']))}}</td>
                            <td><a href="{{route('bagistoweblog.comment.delete',['id'=>$res['id']])}}"><i class="icon trash-icon"></i></a></td>
                        </tr>
                    @empty
                    @endforelse
                    </tbody>
                </table>

            </div>
        </form>
    </div>
@stop
