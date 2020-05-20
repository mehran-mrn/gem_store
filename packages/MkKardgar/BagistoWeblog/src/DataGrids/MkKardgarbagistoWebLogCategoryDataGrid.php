<?php

namespace MkKardgar\BagistoWeblog\DataGrids;


use Illuminate\Support\Facades\DB;

class MkKardgarbagistoWebLogCategoryDataGrid extends \Webkul\Ui\DataGrid\DataGrid
{

    protected $index = 'id'; //the column that needs to be treated as index column

    protected $sortOrder = 'asc'; //asc or desc

    protected $itemsPerPage = 10;
    public function prepareQueryBuilder()
    {
        // TODO: Implement prepareQueryBuilder() method.
        $queryBuilder = DB::table('mk_kardgar_weblog_categories')
            ->addSelect('id', 'category_name', 'description');
        $this->addFilter('id', 'mk_kardgar_weblog_categories.id');

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
            'index' => 'category_name',
            'label' => 'نام دسته بندی',
            'type' => 'string',
            'searchable' => false,
            'sortable' => false,
            'filterable' => false
        ]);
        $this->addColumn([
            'index' => 'description',
            'label' => 'توضیحات',
            'type' => 'string',
            'searchable' => false,
            'sortable' => false,
            'filterable' => false
        ]);
    }

    public function prepareActions() {
        $this->addAction([
            'method' => 'GET', // use GET request only for redirect purposes
            'route' => 'bagistoweblog.category.edit',
            'icon' => 'icon pencil-lg-icon',
            'title' => "ویرایش"
        ]);

        $this->addAction([
            'method' => 'POST', // use GET request only for redirect purposes
            'route' => 'bagistoweblog.category.delete',
            'icon' => 'icon trash-icon',
            'title' => 'حذف'
        ]);
    }

    /**
     * Customer Mass Action To Delete And Change Their
     */
    public function prepareMassActions()
    {
//        $this->addMassAction([
//            'type' => 'delete',
//            'label' => 'Delete',
//            'action' => route('admin.customer.mass-delete'),
//            'method' => 'PUT',
//        ]);
//
//        $this->addMassAction([
//            'type' => 'update',
//            'label' => 'Update Status',
//            'action' => route('admin.customer.mass-update'),
//            'method' => 'PUT',
//            'options' => [
//                'Active' => 1,
//                'Inactive' => 0
//            ]
//        ]);

        $this->enableMassAction = true;
    }


}