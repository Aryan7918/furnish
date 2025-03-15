<?php

namespace App\DataTables\Admin;

use App\Models\Brand;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class BrandDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($row) {
                $html = "<div class='d-flex gap-1'>";
                $html .= "<a href='#' data-url=" .  route('admin.brands.edit', $row->id) . " data-title='Edit Brand' data-btn-text='Update'
                            class='btn btn-primary btn-sm'><i class='fa fa-pencil'></i></a>";
                $html .= "<a class='btn btn-danger delete-btn btn-sm' data-id='$row->id'><i class='fa fa-trash'></i></a>";
                $html .= "</div>";
                return $html;
            })
            ->editColumn('logo', function ($row) {
                return "<img src='" . asset($row->logo) . "'>";
            })
            ->setRowId('id')
            ->rawColumns(['action', 'logo']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Brand $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('data-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            // ->dom('Bfrtip')
            ->orderBy(0)
            ->selectStyleSingle();
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('id')->width(20),
            Column::make('logo'),
            Column::make('name'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(100)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Brand_' . date('YmdHis');
    }
}
