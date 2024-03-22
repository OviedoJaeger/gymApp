<?php

namespace App\DataTables\suscripciones;

use App\Models\ClientesVisitas;
use App\Models\Visita;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Carbon\Carbon;

class VisitasDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * 
     * 
     * 
     * @param QueryBuilder $query Results from query() method.
     */

    /*  ->addColumn('accion', function($row){
                $btn = '<button data-id="'.$row->id.'" class="btn btn-info btn-sm boton-visita">Registro Visita</button>';
                $btn .= '<button data-id="'.$row->id.'" class="btn btn-warning btn-sm boton-editarVisita">Editar</button>';
                
                return $btn;
            })*/

            /* ->addColumn('foto', function($row){
                if ($row->foto) {
                    return '<a href="'.asset($row->foto).'" data-toggle="lightbox" data-title="Foto de: '.$row->nombre.'" data-gallery="gallery">
                                <img src="'.asset($row->foto).'" class="img-thumbnail" width="50 px">
                            </a>';
                } else {
                    return 'Sin Foto';
                }
            }) */

            // ->rawColumns(['foto', 'accion']);

    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->editColumn('created_at', function($row){
                return $row->created_at->format('d/m/Y');
            })
            ->editColumn('updated_at', function($row){
                return $row->created_at->format('d/m/Y');
            });
            
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(ClientesVisitas $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('visitas-table')
                    ->setTableAttribute('class','table table-bordered table-striped')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    //->orderBy('created_at', 'desc') // Ordena por 'created_at' en orden descendente
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
            Column::make('apellido'),
            Column::make('telefono'),
            Column::make('domicilio'),
            Column::make('fecha registro'),
            Column::make('ultima visita'),
            Column::make('foto'),
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
        return 'registroVisitas' . date('YmdHis');
    }
}
