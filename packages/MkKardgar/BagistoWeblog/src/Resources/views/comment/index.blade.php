@extends('admin::layouts.content')

@section('page_title')
    نظرات کاربران
@stop
@section('content')
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h1>لیست نظرات کاربران</h1>
            </div>
            <div class="page-action">
                <div class="export-import" @click="showModal('downloadDataGrid')">
                </div>
            </div>
        </div>

        <div class="page-content">
            @inject('comments','MkKardgar\BagistoWeblog\DataGrids\MkKardgarbagistoWebLogCommentDataGrid')
            {!! $comments->render() !!}

        </div>
    </div>
@endsection