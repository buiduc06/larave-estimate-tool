<?php

namespace App\DataTables;

use App\Models\Layout;
use App\Models\User;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class LayoutDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable
            ->addColumn('action', 'layouts.datatables_actions')
            ->editColumn('user_id', function($layout) {
                return optional($layout->user)->name;
            })
            ->editColumn('created_at', function($layout) {
                return $layout->created_at->format('Y/m/d H:i:s');
            })
            ->editColumn('updated_at', function($layout) {
                return $layout->updated_at->format('Y/m/d H:i:s');
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Layout $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Layout $model)
    {
        return $model->newQuery();
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
            ->addAction(['width' => '120px', 'printable' => false])
            ->parameters([
                'dom'       => 'Bfrtip',
                'stateSave' => true,
                'order'     => [[0, 'desc']],
                'buttons'   => [
                    ['extend' => 'create', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'export', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'print', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'reset', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'reload', 'className' => 'btn btn-default btn-sm no-corner',],
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
            'id' => ['title' => 'No.'],
            'name' => ['title' => 'name'],
            'file_path' => ['title' => 'file'],
            'user_id' => ['title' => 'user'],
            'created_at' => ['searchable' => false, 'title' => 'created at'],
            'updated_at' => ['searchable' => false, 'title' => 'updated at']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'layouts_datatable_' . time();
    }
}
