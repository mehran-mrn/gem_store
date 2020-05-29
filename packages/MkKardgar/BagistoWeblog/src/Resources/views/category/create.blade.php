@extends('admin::layouts.content')

@section('page_title')
    افزودن دسته بندی
@stop

@section('content')
    <div class="content">
        <form method="POST" action="{{ route('bagistoweblog.category.store') }}" @submit.prevent="onSubmit">
            <div class="page-header">
                <div class="page-title">
                    <h1>
                        <i class="icon angle-left-icon back-link" onclick="history.length > 1 ? history.go(-1) : window.location = '{{ url('/admin/dashboard') }}';"></i>
                        دسته بندی
                        {{ Config::get('carrier.social.facebook.url') }}
                    </h1>
                </div>

                <div class="page-action">
                    <button type="submit" class="btn btn-lg btn-primary">
                       افزودن دسته بندی
                    </button>
                </div>
            </div>
            <div class="page-content">
                <div class="form-container">
                    @csrf()
                    <div class="control-group" :class="[errors.has('categoryName') ? 'has-error' : '']">
                        <label for="categoryName" class="required">نام دسته بندی</label>
                        <input type="text" class="control" name="categoryName" v-validate="'required'" value="{{ old('categoryName') }}" data-vv-as="&quot;نام دسته بندی&quot;">
                        <span class="control-error" v-if="errors.has('categoryName')">@{{ errors.first('categoryName') }}</span>
                    </div>
                    <div class="control-group" :class="[errors.has('slug') ? 'has-error' : '']">
                        <label for="slug" class="required">اسلاگ</label>
                        <input type="text" readonly="readonly" class="control" name="slug" v-validate="'required'" value="{{ old('slug') }}" data-vv-as="&quot;نام دسته بندی&quot;">
                        <span class="control-error" v-if="errors.has('slug')">@{{ errors.first('slug') }}</span>
                    </div>

                    <div class="control-group" :class="[errors.has('description') ? 'has-error' : '']">
                        <label for="description" class="required">توضیحات</label>
                        <textarea name="description" class="control" v-validate="'required'" value="{{ old('description') }}" data-vv-as="&quot;توضیحات&quot;"></textarea>
                        <span class="control-error" v-if="errors.has('description')">@{{ errors.first('description') }}</span>
                    </div>
                </div>
            </div>
        </form>
    </div>
@stop
@push('scripts')
    <script>
        $(document).ready(function () {
            $("input[name='categoryName']").on('keyup', function () {
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