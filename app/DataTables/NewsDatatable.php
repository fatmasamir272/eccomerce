<?php

namespace App\DataTables;

use App\Model\News;
use Yajra\DataTables\Services\DataTable;

class NewsDatatable extends DataTable
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
            ->addColumn('checkbox', 'admin.news.btn.checkbox')
            ->addColumn('edit', 'admin.news.btn.edit')
             ->addColumn('delete', 'admin.news.btn.delete')
               ->addColumn('show', 'admin.news.btn.show')
            ->rawColumns([
              'edit','delete','checkbox','show'
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
     
      //  return User::query();
            return News::query();

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

['text'=>'<i class="fa fa-plus"></i> Create User','className'=>'btn btn-danger' ,"action" => "function(){window.location.href = '".\URL::current()."/create'; }"],

['text' => '<i class="fa fa-trash"></i>', 'className' => 'btn btn-danger delBtn '],
],
'initComplete' => " function () {
                    this.api().columns([2]).every(function () {
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
'name'=>'title',
'data'=>'title',
'title'=>'Title',
            ],
              [
'name'=>'desc',
'data'=>'desc',
'title'=>'Desc',
            ],
 [
'name'  => 'content',
'data'  => 'content',
 'title' => 'Content',
],
              [
'name'=>'status',
'data'=>'status',
'title'=>'Status',
            ],
            [
'name'=>'user_id',
'data'=>'user_id',
'title'=>'Add By',
            ],
             [
'name'=>'created_at',
'data'=>'created_at',
'title'=>'Created At',
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
            [
'name'=>'show',
'data'=>'show',
'title'=>'Show',
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
        return 'News_' . date('YmdHis');
    }
}
