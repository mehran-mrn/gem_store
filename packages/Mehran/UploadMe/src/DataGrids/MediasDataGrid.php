<?php

namespace Mehran\UploadMe\DataGrids;

use Webkul\Ui\DataGrid\DataGrid;
use DB;

/**
 * ProductDataGrid Class
 *
 * @author Prashant Singh <prashant.singh852@webkul.com> @prashant-webkul
 * @copyright 2018 Webkul Software Pvt Ltd (http://www.webkul.com)
 */
class MediasDataGrid extends DataGrid
{

    protected $index = 'id';

    protected $sortOrder = 'asc'; //asc or desc

    protected $itemsPerPage = 20;

    public function prepareQueryBuilder()
    {
        $queryBuilder = DB::table('Medias')->addSelect('id', 'url', 'org_name', 'type');
        $this->addFilter('id', 'Medias.id');
        $this->addFilter('url', 'Medias.url');
        $this->addFilter('org_name', 'Medias.org_name');
        $this->addFilter('type', 'Medias.type');

        $this->setQueryBuilder($queryBuilder);
    }

    public function addColumns()
    {
        $this->addColumn([
            'index' => 'id',
            'label' => 'ردیف',
            'type' => 'number',
            'searchable' => false,
            'sortable' => true,
            'filterable' => false
        ]);
        $this->addColumn([
            'index' => 'url',
            'label' => 'آدرس فایل',
            'type' => 'string',
            'searchable' => false,
            'sortable' => false,
            'filterable' => false
        ]);

        $this->addColumn([
            'index' => 'name',
            'label' => 'فایل',
            'type' => 'link',
            'searchable' => true,
            'sortable' => true,
            'filterable' => false,
            'closure' => true,
            'wrapper' => function ($value) {
                return '<img src="storage/'.$value->url.'" width="100"/>';

            }
        ]);
        $this->addColumn([
            'index' => 'org_name',
            'label' => 'نمایش',
            'type' => 'link',
            'searchable' => true,
            'sortable' => true,
            'filterable' => false,
            'closure' => true,
            'wrapper' => function ($value) {
                return '<a target="_blank" href="storage/'.$value->url.'" class="control">نمایش</a>';
            }
        ]);

        $this->addColumn([
            'index' => 'type',
            'label' => 'نوع فایل',
            'type' => 'string',
            'searchable' => true,
            'sortable' => true,
            'filterable' => true
        ]);

    }

    public function prepareActions()
    {

        $this->addAction([
            'title' => 'حذف',
            'method' => 'POST', // use GET request only for redirect purposes
            'route' => 'UploadMe.delete',
            'icon' => 'icon trash-icon'
        ]);


        $this->enableAction = true;
    }

}