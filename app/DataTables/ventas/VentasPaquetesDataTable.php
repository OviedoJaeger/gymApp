<?php

namespace App\DataTables\ventas;

use App\Models\VentasPaquetes;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class VentasPaquetesDataTable extends DataTable
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
    public function query(VentasPaquetes $model): QueryBuilder
    {
        return $model->newQuery()
        ->join('clientes', 'ventas_paquetes.id_cliente', '=', 'clientes.id')
        ->select('ventas_paquetes.*', 'clientes.nombre', 'clientes.apellido');
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('ventaspaquetes-table')
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
            Column::make('tipo de paquete'),
            Column::make('costo'),
            Column::make('duración (días)'),
            Column::make('fecha de venta'),
            Column::make('nombre', 'clientes.nombre'),
            Column::make('apellido', 'clientes.apellido'),
            Column::make('administrador'),
            Column::computed('accion')
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
        return 'VentasPaquetes_' . date('YmdHis');
    }
}
