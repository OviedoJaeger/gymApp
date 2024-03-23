@extends('adminlte::page')

@section('title', 'Gym')

@section('content_header')
    <h1>HIRD Gym WebApp</h1>
@stop

@section('content')
    <p>Detalles del socio</p>

    <div class="card">
        <div class="card-header">

        </div>
        <div class="card-body">

            <!-- DATOS COMPLETOS DEL SOCIO CONSULTADO-->

            <label>Nombre Completo</label>
            <div class="form-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                    <input type="text"  name="nombreDetalles"  class="form-control"  placeholder="Nombre" value="{{$clientesDetalles->nombre}}" readonly>
                </div>
            </div>

            
            <div class="form-group" hidden>
                <label>Adeudo</label>
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                    <input type="number"  name="adeudoDetalles"  class="form-control"  placeholder="0" value="{{$clientesDetalles->adeudo}}" readonly>
                </div>
            </div>

            <label>Teléfono / Telefono de Emergencia</label>
            <div class="form-group row">
                <div class="input-group-prepend col-xs-12 col-sm-6">
                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                    <input type="text" name="telefonoDetalles" class="form-control" value="{{$clientesDetalles->telefono}}" data-inputmask="'mask': '(99) 9999-9999'" placeholder="Telefono" data-mask value="" readonly>
                </div>
                <div class="input-group-prepend col-xs-12 col-sm-6">
                    <span class="input-group-text"><i class="fas fa-phone-volume"></i></span>
                    <input type="text" name="telefono_emergenciaDetalles" value="{{$clientesDetalles->telefono_emergencia}}" class="form-control" placeholder="Telefono de emergencia" data-inputmask="'mask':'(99) 9999-9999'" data-mask readonly>
                </div>
            </div>

            <label>Dirección</label>
            <div class="form-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-house-user"></i></span>
                    <input type="text" name="direccionDetalles" value="{{$clientesDetalles->direccion}}" class="form-control" placeholder="Direccion" readonly>
                </div>
            </div>

            <label>Correo Electrónico</label>
            <div class="form-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                    <input type="email" name="correoDetalles" value="{{$clientesDetalles->correo}}" class="form-control" placeholder="Correo" readonly>
                </div>
            </div>

            <label>Fecha de Cumpleaños</label>
            <div class="form-group">
                <div class="input-group-prepend">
                    
                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                    <input type="date" name="fecha_cumpleDetalles" value="{{$clientesDetalles->fecha_cumple}}" class="form-control" placeholder="Fecha Cumpleaños" readonly>
                </div>
            </div>

            <label>Edad / Sexo</label>
            <div class="form-group row">
                <div class="input-group-prepend col-xs-12 col-sm-6">
                        <span class="input-group-text"><i class="fas fa-arrow-up"></i></span>
                        <input type="text" name="edadDetalles" value="{{$clientesDetalles->edad}}" lass="form-control" placeholder="Edad" readonly>
                </div>
                <div class="input-group-prepend col-xs-12 col-sm-6">
                    <span class="input-group-text"><i class="fas fa-venus-mars"></i></span>
                    <input type="text" name="sexoDetalles" value="{{$clientesDetalles->sexo}}" class="form-control" placeholder="Sexo" readonly>
                </div>
            </div>

            <label>Paquete Actual</label>
            <div class="form-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-clipboard"></i></span>
                    <input type="text" name="observacionesDetalles" value="{{$clientesDetalles->paquete}}" class="form-control" placeholder="Observaciones" readonly>
                </div>
            </div>

            <label>Socio desde:</label>
            <div class="form-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                    <input type="text" name="fechaRegistroDetalles" value="{{$clientesDetalles->created_at}}" class="form-control" placeholder="Observaciones" readonly>
                </div>
            </div>

            <label>Inicio / Termino del paquete actual</label>
            <div class="form-group row">
                <div class="input-group-prepend col-xs-12 col-sm-6">
                        <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                        <input type="text" name="fechaInicioDetalles" value="{{$clientesDetalles->fecha_inicio}}" class="form-control" placeholder="Edad" readonly>
                </div>
                <div class="input-group-prepend col-xs-12 col-sm-6">
                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                    <input type="text" name="fechaTerminoDetalles" value="{{$clientesDetalles->fecha_termino}}" class="form-control" placeholder="Sexo" readonly>
                </div>
            </div>

            <label>Observaciones</label>
            <div class="form-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-clipboard"></i></span>
                    <input type="text" name="observacionesDetalles" value="{{$clientesDetalles->observaciones}}" class="form-control" placeholder="Observaciones" readonly>
                </div>
            </div>

            <label>Foto</label>
            <div class="form-group">
                <div class="input-group-prepend panel">
                    <img src="{{asset($clientesDetalles->foto)}}" class="mt-2 img-thumbnail" id="foto-previewDetalles" width="450 px">
                </div>
            </div>
    
            
        </div>

                
        
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    
@stop

@section('js')
    <script src="{{ asset('vendor/inputmask/inputmask.min.js') }}"></script>
    <script src="{{ asset('vendor/inputmask/jquery.inputmask.min.js') }}"></script>
    <script src="{{ asset('js/app.js')}}"></script>
    <script src="{{ asset('js/general.js')}}"></script>


@stop