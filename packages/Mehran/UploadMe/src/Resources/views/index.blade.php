@extends('admin::layouts.content')

@section('page_title')
    {{ __('admin::app.settings.sliders.title') }}
@stop
@section('content-wrapper')
    <div class="content full-page">
        <form method="POST" action="{{route('UploadMe.store')}}" @submit.prevent="onSubmit"
              enctype="multipart/form-data">
            <div class="page-header">
                <div class="page-title">
                    <h1>
                        <i class="icon angle-left-icon back-link"
                           onclick="history.length > 1 ? history.go(-1) : window.location = '{{ url('/admin/dashboard') }}';"></i>

                        <span>افزودن فایل</span>
                    </h1>
                </div>

                <div class="page-action">
                    <button type="submit" class="btn btn-lg btn-primary">بارگزاری فایل</button>
                </div>
            </div>
            <div class="page-content">
                <div class="form-container">
                    @csrf()
                    <div class="control-group" :class="[errors.has('title') ? 'has-error' : '']">
                        <label for="title"
                               class="required">{{ __('admin::app.settings.sliders.title') }}</label>
                        <input type="text" class="control" name="title" v-validate="'required'"
                               data-vv-as="&quot;{{ __('admin::app.settings.sliders.title') }}&quot;">
                        <span class="control-error"
                              v-if="errors.has('title')">@{{ errors.first('title') }}</span>
                    </div>
                    <?php $channels = core()->getAllChannels() ?>
                    <div class="control-group" :class="[errors.has('channel_id') ? 'has-error' : '']">
                        <label for="channel_id">{{ __('admin::app.settings.sliders.channels') }}</label>
                        <select class="control" id="channel_id" name="channel_id" v-validate="'required'"
                                data-vv-as="&quot;{{ __('admin::app.settings.sliders.channels') }}&quot;">
                            @foreach ($channels as $channel)
                                <option value="{{ $channel->id }}"
                                        @if ($channel->id == old('channel_id')) selected @endif>
                                    {{ __($channel->name) }}
                                </option>
                            @endforeach
                        </select>
                        <span class="control-error"
                              v-if="errors.has('channel_id')">@{{ errors.first('channel_id') }}</span>
                    </div>
                    <div class="control-group ">
                        <label class="required">{{ __('admin::app.catalog.categories.image') }}</label>

                        <image-wrapper :button-label="'{{ __('admin::app.settings.sliders.image') }}'"
                                       input-name="image" :multiple="false"></image-wrapper>

                        <span class="control-error" v-if="">

                        </span>
                    </div>
                    <div class="control-group" :class="[errors.has('content') ? 'has-error' : '']">
                        <label for="content">{{ __('admin::app.settings.sliders.content') }}</label>
                        <textarea id="tiny" class="control" id="add_content" name="content" rows="5"></textarea>
                        <span class="control-error"
                              v-if="errors.has('content')">@{{ errors.first('content') }}</span>
                    </div>
                </div>
            </div>
            <hr>
            <div class="form-container">
                <div class="page-header">
                    <div class="page-title">
                        <h1>
                            <i class="icon angle-left-icon back-link"
                               onclick="history.length > 1 ? history.go(-1) : window.location = '{{ url('/admin/dashboard') }}';"></i>
                            <span>لیست فایل ها</span>
                        </h1>
                    </div>
                </div>
                @inject('medias', 'Mehran\UploadMe\DataGrids\MediasDataGrid')
                {!! $medias->render() !!}
                @foreach($medias as $media)
                    <div class="card">
                        <img src="{{\Illuminate\Support\Facades\Storage::url('/storage/'.$media['url'])}}" alt="" class="card-img-top text-center"
                             width="200">
                        <div class="card-body">
                            <div class="control-group">
                                <label>آدرس تصویر</label>
                                <input type="text" class="control" readonly value="{{$media['url']}}">
                            </div>
                            <button class="btn btn-danger">حذف</button>
                        </div>
                    </div>
                @endforeach
            </div>
        </form>
    </div>

@stop
