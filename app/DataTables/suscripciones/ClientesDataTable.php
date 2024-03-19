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
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function($row){
                $btn = '<button  class="btn btn-warning btn-sm boton-editar">Editar</button>';
                $btn .= '<form id="form-eliminar-'.$row->id.'" action="'.route('socios.destroy', $row->id).'" method="POST" class="d-inline">';
                $btn .= csrf_field();
                $btn .= method_field('DELETE');
                $btn .= '<button class="btn btn-danger btn-sm eliminar-boton" type="submit">Eliminar</button>';
                $btn .= '</form>';
                return $btn;
            })
            ->addColumn('foto', function($row){
                if ($row->foto) {
                    return '<a href="'.asset($row->foto).'" data-toggle="lightbox" data-title="Foto de: '.$row->nombre.'" data-gallery="gallery">
                                <img src="'.asset($row->foto).'" class="img-thumbnail" width="50 px">
                            </a>';
                } else {
                    return 'Sin Foto';
                }
            })
            ->editColumn('activo', function($row){
                $fecha_actual = Carbon::now();
                if ($row->fecha_termino !== null && $row->fecha_inicio !== null 
                    && $fecha_actual->between($row->fecha_inicio, $row->fecha_termino)) {
                    return '<small class="badge badge-success">Activo</small>';
                } else {
                    return '<small class="badge badge-danger">Inactivo</small>';
                }
            })
            ->editColumn('created_at', function($row){
                return $row->created_at->format('d/m/Y');
            })
            ->rawColumns(['foto', 'action','activo']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Clientes $model): QueryBuilder
    {
        return $model->newQuery();
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
            Column::make('apellidos'),
            Column::make('correo'),
            Column::make('telefono'),
            Column::make('Fecha de Inscripción'),
            Column::make('paquete'),
            Column::make('foto'),
            Column::make('activo'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(80)
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
