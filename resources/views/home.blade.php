@extends('adminlte::page')

@section('title', 'Gym')

@section('content_header')
    <h1>HIRD Gym WebApp</h1>
@stop

@section('content')
    <p>Bienvenido al Inicio</p>
    <a class="btn btn-app bg-success" href="javascript:void(0);" onclick="window.open('{{ route('ventana_cliente') }}', '_blank', 'width=1000,height=800');">
        <i class="fas fa-window-restore"></i> Abrir Ventana Cliente
    </a>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                
                <!-- Barra de búsqueda -->
                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 550px;">
                        <input type="text" name="table_search" class="form-control float-right" placeholder="Buscar Socio">

                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </div>
                <!-- Fin de la barra de búsqueda -->
            </div><!--/.card-header -->
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                        <div class="row">
                            <div class="col-12 col-sm-3">
                                    <div class="info-box bg-warning">
                                        <span class="info-box-icon"><i class="far fa-id-card"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-text">Accesos del día</span>
                                            <span class="info-box-number">35</span>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="col-12 col-sm-3">
                                    <div class="info-box bg-warning">
                                        <span class="info-box-icon"><i class="far fa-user-tag"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-text">Socios registrados</span>
                                            <span class="info-box-number">35</span>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="col-12 col-sm-3">
                                    <div class="info-box bg-warning">
                                        <span class="info-box-icon"><i class="far fa-users-rectangle"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-text">Visitas del Día</span>
                                            <span class="info-box-number">35</span>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="col-12 col-sm-3">
                                    <div class="info-box bg-warning">
                                        <span class="info-box-icon"><i class="far fa-user-plus"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-text">Socios Activos</span>
                                            <span class="info-box-number">35</span>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <h2>Nombre del Usuario</h2>
                                    <h2 class="text-danger">Espacio de aviso si es cumpleaños del cliente</h2>
                                    <div class="post row">
                                        <div class="user-block">
                                        <img class="img-circle img-bordered-sm" src="{{asset('images/img-usuarios/imagen-prueba.png')}}" alt="user image" style="width: 250px; height: 250px;">
                                        <span class="username">
                                            Inicio del paquete: 12-12-2024
                                        </span>
                                        <span class="username">Termino del paquete: 12-12-2024</span>
                                        <span class="username">Paquete: Mensualidad</span>
                                        </div>
                                        <!-- /.user-block -->
                                        <h3 class="card-title">Espacio para aviso del socio(si esta vigente o si esta vencido)</h3>
                                        <hr>
                                        
                                        <hr>
                                        
                                </div>

                                <div class="col-12">

                                    <div class="d-flex justify-content-between">
                                        <a href="#" class="link-black text-sm"><i class="fas fa-link mr-1"></i> Editar Cliente</a>
                                        <a href="#" class="link-black text-sm"><i class="fas fa-link mr-1"></i> Renovar Membresía</a>
                                        <a href="#" class="link-black text-sm"><i class="fas fa-link mr-1"></i> Asistencias</a>
                                    </div>

                                </div>
        
                            </div>
                        </div>
                    </div>

                    <!--SECCION DE LAS ULTIMAS VISITAS DEL DÍA-->

                    <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                        <h3 class="lead">Ultimas Visitas</h3>
                        <div class="card">
                            <div class="card-body p-0" style="max-height: 500px; overflow-y: auto;">
                                <ul class="products-list product-list-in-card pl-2 pr-2">
                                    <li class="item">
                                        <div class="product-img">
                                            <img src="{{asset('images/img-usuarios/imagen-prueba.png')}}" alt="Product Image" class="img-size-80 mr-3" style="width: 100px; height: 100px;">
                                        </div>
                                        <div class="product-info">
                                            <a href="javascript:void(0)" class="product-title text-info">Charly Quesadilla</a>
                                            <span class="product-description">
                                                12-12-2024 15:30:20
                                            </span>
                                        </div>
                                    </li>
                                    <li class="item">
                                        <div class="product-img">
                                            <img src="{{asset('img-usuarios/imagen-prueba.png')}}" alt="Product Image" class="img-size-80 mr-3" style="width: 100px; height: 100px;">
                                        </div>
                                        <div class="product-info">
                                            <a href="javascript:void(0)" class="product-title">Charly Quesadilla</a>
                                                
                                            <span class="product-description">
                                                12-12-2024
                                            </span>
                                        </div>
                                    </li>
                                    <li class="item">
                                        <div class="product-img">
                                            <img src="{{asset('img-usuarios/imagen-prueba.png')}}" alt="Product Image" class="img-size-80 mr-3" style="width: 100px; height: 100px;">
                                        </div>
                                        <div class="product-info">
                                            <a href="javascript:void(0)" class="product-title">Charly Quesadilla></a>
                                            <span class="product-description">
                                                12-12-2024
                                            </span>
                                        </div>
                                    </li>
                                    <li class="item">
                                        <div class="product-img">
                                            <img src="{{asset('img-usuarios/imagen-prueba.png')}}" alt="Product Image" class="img-size-80 mr-3" style="width: 100px; height: 100px;">
                                        </div>
                                        <div class="product-info">
                                            <a href="javascript:void(0)" class="product-title">Charly Quesadilla></a>
                                            <span class="product-description">
                                                12-12-2024
                                            </span>
                                        </div>
                                    </li>
                                    <li class="item">
                                        <div class="product-img">
                                            <img src="{{asset('img-usuarios/imagen-prueba.png')}}" alt="Product Image" class="img-size-80 mr-3" style="width: 100px; height: 100px;">
                                        </div>
                                        <div class="product-info">
                                            <a href="javascript:void(0)" class="product-title">Charly Quesadilla></a>
                                            <span class="product-description">
                                                12-12-2024
                                            </span>
                                        </div>
                                    </li>
                                    <li class="item">
                                        <div class="product-img">
                                            <img src="{{asset('img-usuarios/imagen-prueba.png')}}" alt="Product Image" class="img-size-80 mr-3" style="width: 100px; height: 100px;">
                                        </div>
                                        <div class="product-info">
                                            <a href="javascript:void(0)" class="product-title">Charly Quesadilla></a>
                                            <span class="product-description">
                                                12-12-2024
                                            </span>
                                        </div>
                                    </li>
                                    <li class="item">
                                        <div class="product-img">
                                            <img src="{{asset('img-usuarios/imagen-prueba.png')}}" alt="Product Image" class="img-size-80 mr-3" style="width: 100px; height: 100px;">
                                        </div>
                                        <div class="product-info">
                                            <a href="javascript:void(0)" class="product-title">Charly Quesadilla></a>
                                            <span class="product-description">
                                                12-12-2024
                                            </span>
                                        </div>
                                    </li>
                                    <li class="item">
                                        <div class="product-img">
                                            <img src="{{asset('img-usuarios/imagen-prueba.png')}}" alt="Product Image" class="img-size-80 mr-3" style="width: 100px; height: 100px;">
                                        </div>
                                        <div class="product-info">
                                            <a href="javascript:void(0)" class="product-title">Charly Quesadilla></a>
                                            <span class="product-description">
                                                12-12-2024
                                            </span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    
    </section>
    <!-- /.content -->
@stop

@section('css')
    <link rel="stylesheet" href="{{asset('vendor/adminlte/dist/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

@stop

@section('js')
@stop
