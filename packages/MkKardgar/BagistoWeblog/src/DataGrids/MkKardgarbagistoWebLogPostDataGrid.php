<?php

namespace MkKardgar\BagistoWeblog\DataGrids;


use Illuminate\Support\Facades\DB;

class MkKardgarbagistoWebLogPostDataGrid extends \Webkul\Ui\DataGrid\DataGrid
{
    protected $index = 'id'; //the column that needs to be treated as index column

    protected $sortOrder = 'asc'; //asc or desc

    protected $itemsPerPage = 10;

    public function prepareQueryBuilder()
    {
        // TODO: Implement prepareQueryBuilder() method.

        $queryBuilder = DB::table('mk_kardgar_weblog_posts')
        ->addSelect('mk_kardgar_weblog_posts.id', 'mk_kardgar_weblog_posts.title', 'mk_kardgar_weblog_posts.subtitle',
                'mk_kardgar_weblog_posts.is_published',
                'mk_kardgar_weblog_posts.image_url');
        $this->addFilter('id', 'mk_kardgar_weblog_posts.id');

        $this->setQueryBuilder($queryBuilder);
    }

    public function addColumns()
    {
        // TODO: Implement addColumns() method.

        $this->addColumn([
            'index' => 'id',
            'label' => 'ردیف',
            'type' => 'number',
            'searchable' => false,
            'sortable' => true,
            'filterable' => false
        ]);

        $this->addColumn([
            'index' => 'title',
            'label' => 'عنوان',
            'type' => 'string',
            'searchable' => false,
            'sortable' => false,
            'filterable' => false
        ]);
        $this->addColumn([
            'index' => 'subtitle',
            'label' => 'توضیحات کوتاه',
            'type' => 'string',
            'searchable' => false,
            'sortable' => false,
            'filterable' => false
        ]);
        $this->addColumn([
            'index' => 'is_published',
            'label' => 'وضعیت',
            'type' => 'string',
            'searchable' => false,
            'sortable' => false,
            'filterable' => false,
            'wrapper' => function($value) {
                if ($value->is_published == 1)
                    return 'فعال';
                else
                    return 'غیر فعال';
            }
        ]);
    }

    public function prepareActions() {
        $this->addAction([
            'method' => 'GET', // use GET request only for redirect purposes
            'route' => 'bagistoweblog.post.edit',
            'icon' => 'icon pencil-lg-icon',
            'title' => "ویرایش"
        ]);

        $this->addAction([
            'method' => 'POST', // use GET request only for redirect purposes
            'route' => 'bagistoweblog.post.delete',
            'icon' => 'icon trash-icon',
            'title' => 'حذف'
        ]);
    }
}