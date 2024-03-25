<?php

namespace App\DataTables;

use App\Models\FooterSocialLink;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class FooterSocialLinksDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('icon', function($query){
                return '<i class="'.$query->icon.'" style="font-size:20px"></i>';
            })
            ->addColumn('action', function($query){
                return "<a href='". route('admin.footerSocial.edit', $query->id) . "' class='btn btn-primary'><i class='fas fa-edit'></i> </a>
                        <a href='". route('admin.footerSocial.destroy',$query->id)."' class='btn btn-danger delete-btn'><i class='fas fa-trash'></i> </a>
                ";
            })
            ->addColumn('created_at', function ($query) {
                return date('d-M-Y', strtotime($query->created_at));
            })
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(FooterSocialLink $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('footer_social_links-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(0)
                    ->selectStyleSingle()
                    ->buttons([]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('id')->width(80),
            Column::make('icon'),
            Column::make('url'),
            Column::make('created_at'),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(250)
                  ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'FooterSocialLinks_' . date('YmdHis');
    }
}
