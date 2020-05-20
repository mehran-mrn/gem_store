@extends('admin::layouts.content')

@section('page_title')
    دسته بندی ها
@stop
@section('content')
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h1>لیست دسته بندی ها</h1>
            </div>
            <div class="page-action">
                <div class="export-import" @click="showModal('downloadDataGrid')">

                </div>

                <a href="{{ route('bagistoweblog.category.add') }}" class="btn btn-lg btn-primary">
                    افزودن دسته بندی جدید
                </a>
            </div>
        </div>

        <div class="page-content">
            @inject('categories','MkKardgar\BagistoWeblog\DataGrids\MkKardgarbagistoWebLogCategoryDataGrid')
            {!! $categories->render() !!}

        </div>
    </div>
@endsection