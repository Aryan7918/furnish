<?php

namespace App\DataTables\Admin;

use App\Models\Category;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class CategoryDataTable extends DataTable
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
                $html .= "<a href='#' data-url=" .  route('admin.categories.edit', $row->id) . " data-title='Edit Category' data-btn-text='Update'
                            class='btn btn-primary btn-sm'><i class='fa fa-pencil'></i></a>";
                $html .= "<a class='btn btn-danger delete-btn btn-sm' data-id='$row->id'><i class='fa fa-trash'></i></a>";
                $html .= "</div>";
                return $html;
            })
            ->editColumn('parent_id', function ($row) {
                return $row->parent_id ? $row->parent->name : "-";
            })
            ->setRowId('id')
            ->rawColumns(['action']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Category $model): QueryBuilder
    {
        return $model->newQuery()->with('parent');
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
            Column::make('id'),
            Column::make('name'),
            Column::make('parent_id')->title('Parent Category'),
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
        return 'Category_' . date('YmdHis');
    }
}
