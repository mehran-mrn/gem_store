@extends('admin::layouts.content')

@section('page_title')
    ویرایش مطلب | {{$post['title']}}
@stop

@section('content')
    <div class="content">
        <form method="POST" action="{{ route('bagistoweblog.post.update',['id'=>$post['id']]) }}"
              @submit.prevent="onSubmit"
              enctype="multipart/form-data">
            <div class="page-header">
                <div class="page-title">
                    <h1>
                        <i class="icon angle-left-icon back-link"
                           onclick="history.length > 1 ? history.go(-1) : window.location = '{{ url('/admin/dashboard') }}';"></i>
                        ویرایش مطلب |‌ <strong class="text-danger">{{$post['title']}}</strong>
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
                    <div class="control-group" :class="[errors.has('title') ? 'has-error' : '']">
                        <label for="title" class="required">عنوان</label>
                        <input type="text" class="control" name="title" v-validate="'required'"
                               value="{{ $post['title'] }}" data-vv-as="&quot;عنوان&quot;">
                        <span class="control-error" v-if="errors.has('title')">@{{ errors.first('title') }}</span>
                    </div>
                    <div class="control-group" :class="[errors.has('slug') ? 'has-error' : '']">
                        <label for="slug" class="required">اسلاگ</label>
                        <input type="text" class="control" name="slug" v-validate="'required'"
                               value="{{ $post['slug'] }}" disabled="disabled" data-vv-as="&quot;عنوان&quot;">
                        <span class="control-error" v-if="errors.has('slug')">@{{ errors.first('slug') }}</span>
                    </div>

                    <div class="control-group" :class="[errors.has('subtitle') ? 'has-error' : '']">
                        <label for="subtitle" class="required">توضیحات کوتاه</label>
                        <textarea name="subtitle" class="control" v-validate="'required'"
                                  value="{{ $post['subtitle'] }}"
                                  data-vv-as="&quot;توضیحات کوتاه&quot;">{{ $post['subtitle'] }}</textarea>
                        <span class="control-error" v-if="errors.has('subtitle')">@{{ errors.first('subtitle') }}</span>
                    </div>

                    <div class="control-group" :class="[errors.has('meta_description') ? 'has-error' : '']">
                        <label for="meta_description">توضیحات متا</label>
                        <textarea class="control" id="meta_description" name="meta_description" v-validate="'required'"
                                  value="{{ $post['meta_description'] }}"
                                  data-vv-as="&quot;توضیحات متا&quot;">{{ $post['meta_description'] }}</textarea>
                        <span class="control-error" v-if="errors.has('meta_description')">@{{ errors.first('meta_description') }}</span>

                    </div>

                    <div class="control-group" :class="[errors.has('post_body') ? 'has-error' : '']">
                        <label for="post_body" class="required">متن اصلی</label>

                        <textarea type="text" class="control" id="content" name="post_body" v-validate="'required'"
                                  data-vv-as="&quot;متن اصلی&quot;">{{ $post['post_body'] }}</textarea>

                        <div class="mt-10 mb-10">
                            {{--                            <a target="_blank" href="{{ route('ui.helper.classes') }}" class="btn btn-sm btn-primary">--}}
                            {{--                                {{ __('admin::app.cms.pages.helper-classes') }}--}}
                            {{--                            </a>--}}
                        </div>

                        <span class="control-error"
                              v-if="errors.has('post_body')">@{{ errors.first('post_body') }}</span>
                    </div>

                    <div class="control-group">
                        <label for="cat" class="required" style="margin-bottom: 10px">دسته بندی</label>
                        @foreach($categories as $category)
                            <div class="control-group">
                            <span class="checkbox">
                                <input type="checkbox"
                                       id="cat_{{$category['id']}}"
                                       name="category[]"
                                       value="{{$category['id']}}"
                                       @foreach($post['category'] as $cat)
                                       @if($cat['category_id']==$category['id'])
                                       checked="checked"
                                       @endif
                                        @endforeach
                                >
                                <label class="checkbox-view" for="cat_{{$category['id']}}"></label>
                                    {{$category['category_name']}}
                            </span>
                            </div>
                        @endforeach
                    </div>

                    <div class="control-group ">
                        <label class="required">تصویر</label>
                        <image-wrapper :button-label="'{{ __('admin::app.settings.sliders.image') }}'"
                                       input-name="image" :multiple="false"
                                       :images='"{{ url('storage/'.$post['media']['url']) }}"'></image-wrapper>
                        <span class="control-error" v-if="">
                        </span>
                    </div>

                    <div class="control-group">
                        <label for="status">وضعیت</label>
                        <select class="control" name="status" id="status">
                            <option value="1" {{$post['is_published']==1?'selected':''}}>فعال</option>
                            <option value="0" {{$post['is_published']==0?'selected':''}}>غیر فعال</option>
                        </select>
                    </div>
                </div>
            </div>
        </form>
    </div>
@stop
@push('scripts')
    <script src="{{ asset('vendor/webkul/admin/assets/js/tinyMCE/tinymce.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            tinymce.init({
                selector: 'textarea#content',
                height: 200,
                width: "70%",
                plugins: 'image imagetools media wordcount save fullscreen code',
                toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify | numlist bullist outdent indent  | removeformat | code',
                image_advtab: true,
                valid_elements: '*[*]'
            });

            $("input[name='title']").on('keyup', function () {
                $("input[name='slug']").val(string_to_slug($(this).val()))
            })

            function string_to_slug(titleStr) {
                titleStr = titleStr.replace(/^\s+|\s+$/g, '');
                titleStr = titleStr.toLowerCase();
                //persian support
                titleStr = titleStr.replace(/[^a-z0-9_\s-ءاأإآؤئبتثجحخدذرزسشصضطظعغفقكلمنهويةى]#u/, '')
                    // Collapse whitespace and replace by -
                    .replace(/\s+/g, '-')
                    // Collapse dashes
                    .replace(/-+/g, '-');
                slugStr = titleStr;
                return slugStr;
            }
        });
    </script>
@endpush