<?php

namespace App\DataTables\asistencia;

use App\Models\Asistencias;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class AsistenciasSociosDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->editColumn('created_at', function($row){
                return $row->created_at->format('d/m/Y H:i:s');
            });
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Asistencias $model): QueryBuilder
    {
        return $model->newQuery()
        ->join('clientes', 'asistencias.id_cliente', '=', 'clientes.id')
        ->select('asistencias.*', 'clientes.nombre', 'clientes.apellido', 'clientes.correo', 'clientes.telefono', 'clientes.paquete');
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('asistenciasSocios-table')
                    ->setTableAttribute('class', 'table table-bordered table-striped')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('nombre'),
            Column::make('apellido(s)'),
            Column::make('correo'),
            Column::make('telefono'),
            Column::make('fecha de asistencia'),
            Column::make('paquete actual'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'AsistenciasSocios_' . date('YmdHis');
    }
}
