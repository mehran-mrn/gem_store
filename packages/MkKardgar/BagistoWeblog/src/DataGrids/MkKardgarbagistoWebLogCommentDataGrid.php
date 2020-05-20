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

        $queryBuilder = DB::table('mk_kardgar_weblog_post_comments')
        ->addSelect('mk_kardgar_weblog_post_comments.id', 'mk_kardgar_weblog_post_comments.author_name', 'mk_kardgar_weblog_post_comments.comment',
                'mk_kardgar_weblog_post_comments.approved',
                'mk_kardgar_weblog_post_comments.author_mobile');
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
            'index' => 'approved',
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
            'route' => 'bagistoweblog.comment.edit',
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