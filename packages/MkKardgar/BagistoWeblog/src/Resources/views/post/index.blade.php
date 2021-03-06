@extends('admin::layouts.content')

@section('page_title')
    مطالب
@stop
@section('content')
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h1>لیست مطالب</h1>
            </div>
            <div class="page-action">
                <div class="export-import" @click="showModal('downloadDataGrid')">

                </div>

                <a href="{{ route('bagistoweblog.post.create') }}" class="btn btn-lg btn-primary">
                    افزودن پست جدید
                </a>
            </div>
        </div>

        <div class="page-content">
            @inject('posts','MkKardgar\BagistoWeblog\DataGrids\MkKardgarbagistoWebLogPostDataGrid')
            {!! $posts->render() !!}

        </div>
    </div>
@endsection