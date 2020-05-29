<?php

namespace MkKardgar\BagistoWeblog\DataGrids;


use Illuminate\Support\Facades\DB;

class MkKardgarbagistoWebLogCommentDataGrid extends \Webkul\Ui\DataGrid\DataGrid
{
    protected $index = 'id'; //the column that needs to be treated as index column

    protected $sortOrder = 'asc'; //asc or desc

    protected $itemsPerPage = 10;

    public function prepareQueryBuilder()
    {
        // TODO: Implement prepareQueryBuilder() method.

        $queryBuilder = DB::table('mk_kardgar_weblog_post_comments as comment')
            ->addSelect('comment.id', 'comment.author_name', 'comment.comment', 'comment.approved',
                'comment.author_mobile', 'comment.created_at')->where('parent_id', '=', null);
        $this->addFilter('id', 'mk_kardgar_weblog_post_comments.id');
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
            'index' => 'author_name',
            'label' => 'نام کاربر',
            'type' => 'string',
            'searchable' => false,
            'sortable' => false,
            'filterable' => false
        ]);
        $this->addColumn([
            'index' => 'comment',
            'label' => 'نظر',
            'type' => 'string',
            'searchable' => false,
            'sortable' => false,
            'filterable' => false
        ]);

        $this->addColumn([
            'index' => 'created_at',
            'label' => 'زمان ایجاد',
            'type' => 'string',
            'searchable' => false,
            'sortable' => false,
            'filterable' => false,
            'wrapper' => function ($value) {
                return jdate("Y-m-d H:i:s", strtotime($value->created_at));
            }
        ]);

        $this->addColumn([
            'index' => 'approved',
            'label' => 'وضعیت',
            'type' => 'string',
            'searchable' => false,
            'sortable' => false,
            'filterable' => false,
            'wrapper' => function ($value) {
                if ($value->approved == 1)
                    return 'فعال';
                else
                    return 'غیر فعال';
            }
        ]);
    }

    public function prepareActions()
    {
        $this->addAction([
            'method' => 'GET', // use GET request only for redirect purposes
            'route' => 'bagistoweblog.comment.edit',
            'icon' => 'icon eye-icon',
            'title' => "نمایش"
        ]);


    }
}