<?php

namespace App\DataTables\suscripciones;

use App\Models\Clientes;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Carbon\Carbon;

class ClientesDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     * 
     * $btn .= '<form data-id="'.$row->id.'" action="'.route('socios.destroy', $row->id).'" method="POST" class="d-inline">';
     *           $btn .= csrf_field();
     *           $btn .= method_field('DELETE');
     *           $btn .= '<button class="btn btn-danger btn-sm eliminar-boton" type="submit">Eliminar</button>';
     *           $btn .= '</form>';
     * 
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->editColumn('created_at', function($row){
                return $row->created_at->format('d/m/Y');
            });
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Clientes $model): QueryBuilder
    {
        return $model->newQuery()
        ->select('clientes.*')
        ->orderBy('created_at', 'desc');
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('clientes-table')
                    ->setTableAttribute('class', 'table table-bordered table-striped')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(4, 'desc') // Ordena por 'created_at' en orden descendente
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
            //Column::make(null)->title('#')->data('DT_RowIndex')->name('DT_RowIndex')->orderable(false)->searchable(false),
            Column::make('nombre'),
            Column::make('apellidos'),
            Column::make('correo'),
            Column::make('telefono'),
            Column::make('Fecha de Inscripción'),
            Column::make('paquete'),
            Column::make('foto'),
            Column::make('activo'),
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
        return 'Clientes_' . date('YmdHis');
    }
}