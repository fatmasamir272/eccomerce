<?php

namespace App\DataTables;

use App\Admin;
use Yajra\DataTables\Services\DataTable;

class AdminDatatable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables($query)
            ->addColumn('checkbox', 'admin.admins.btn.checkbox')
            ->addColumn('edit', 'admin.admins.btn.edit')
             ->addColumn('delete', 'admin.admins.btn.delete')
            ->rawColumns([
              'edit','delete','checkbox',
            ]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
       // return $model->newQuery()->select('id', 'add-your-columns-here', 'created_at', 'updated_at');
        return Admin::query();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                  //  ->addAction(['width' => '80px'])
                   // ->parameters($this->getBuilderParameters());
                    ->parameters([
'dom'=>'Blfrtip',
'lengthMenu'=>[[10,25,50,100],[10,25,50,'All Records']],
'buttons'=>[
['extend'=>'print','className'=>'btn btn-primary','text'=>'<i class="fa fa-print"></i> Print'],

['extend'=>'csv','className'=>'btn btn-primary','text'=>'<i class="fa fa-file"></i> Export CSV'],
['extend'=>'excel','className'=>'btn btn-primary','text'=>'<i class="fa fa-print"></i>Export excel'],
['extend'=>'reload','className'=>'btn btn-danger','text'=>'<i class="fa fa-fresh"></i>Reload'],

['text'=>'<i class="fa fa-plus"></i> Create Admin','className'=>'btn btn-danger' ,"action" => "function(){window.location.href = '".\URL::current()."/create'; }"],

['text' => '<i class="fa fa-trash"></i>', 'className' => 'btn btn-danger delBtn '],
],
'initComplete' => " function () {
                    this.api().columns([2,3,4]).every(function () {
                        var column = this;
                        var input = document.createElement(\"input\");
                        $(input).appendTo($(column.footer()).empty())
                        .on('keyup', function () {
                            column.search($(this).val(), false, false, true).draw();
                        });
                    });
                }",
                
                'language'         => [
                    'sProcessing'     => trans('admin.sProcessing'),
                    'sLengthMenu'     => trans('admin.sLengthMenu'),
                    'sZeroRecords'    => trans('admin.sZeroRecords'),
                    'sEmptyTable'     => trans('admin.sEmptyTable'),
                    'sInfo'           => trans('admin.sInfo'),
                    'sInfoEmpty'      => trans('admin.sInfoEmpty'),
                    'sInfoFiltered'   => trans('admin.sInfoFiltered'),
                    'sInfoPostFix'    => trans('admin.sInfoPostFix'),
                    'sSearch'         => trans('admin.sSearch'),
                    'sUrl'            => trans('admin.sUrl'),
                    'sInfoThousands'  => trans('admin.sInfoThousands'),
                    'sLoadingRecords' => trans('admin.sLoadingRecords'),
                    'oPaginate'       => [
                        'sFirst'         => trans('admin.sFirst'),
                        'sLast'          => trans('admin.sLast'),
                        'sNext'          => trans('admin.sNext'),
                        'sPrevious'      => trans('admin.sPrevious'),
                    ],
                    'oAria'            => [
                        'sSortAscending'  => trans('admin.sSortAscending'),
                        'sSortDescending' => trans('admin.sSortDescending'),
                    ],
                ],

                    ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            [
                'name'       => 'checkbox',
                'data'       => 'checkbox',
                'title'      => '<input type="checkbox" class="check_all" onclick="check_all()" />',
                'exportable' => false,
                'printable'  => false,
                'orderable'  => false,
                'searchable' => false,
            ],
            [
'name'=>'id',
'data'=>'id',
'title'=>'ID',
            ],
              [
'name'=>'name',
'data'=>'name',
'title'=>'Name',
            ],
              [
'name'=>'email',
'data'=>'email',
'title'=>'Email',
            ],
              [
'name'=>'created_at',
'data'=>'created_at',
'title'=>'Created At',
            ],
              [
'name'=>'updated_at',
'data'=>'updated_at',
'title'=>'Updated At',
            ],
        [
'name'=>'edit',
'data'=>'edit',
'title'=>'Edit',
'exportable'=>false,
'orderable'=>false,
'printable'=>false,
'searchable'=>false,

            ],
 [
'name'=>'delete',
'data'=>'delete',
'title'=>'Delete',
'exportable'=>false,
'orderable'=>false,
'printable'=>false,
'searchable'=>false,

            ],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Admin_' . date('YmdHis');
    }
}
