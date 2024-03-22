<?php

namespace App\DataTables\asistencia;

use App\Models\RegistroVisitas;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class AsistenciasVisitasDataTable extends DataTable
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
    public function query(RegistroVisitas $model): QueryBuilder
    {
        return $model->newQuery()
        ->join('clientes_visitas', 'registro_visitas.id_visita', '=', 'clientes_visitas.id')
        ->select('registro_visitas.*', 'clientes_visitas.nombre', 'clientes_visitas.apellido');
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('asistenciasVisitas-table')
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
            Column::make('administrador'),
            Column::make('metodo de pago'),
            Column::make('costo'),
            Column::make('referencia'),
            Column::make('fecha de registro'),
            Column::make('nombre', 'clientes_visitas.nombre'), // Asume que 'nombre' es una columna en la tabla 'clientes'
            Column::make('apellido', 'clientes_visitas.apellido'), // Asume que 'apellido' es una columna en la tabla 'clientes'
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'AsistenciasVisitas_' . date('YmdHis');
    }
}
