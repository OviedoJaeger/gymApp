    @extends('adminlte::page')

    @section('title', 'Gym')

    @section('content_header')
        <h1>HIRD Gym WebApp</h1>
    @stop

    @section('content')
        <p>Bienvenido a Reportes Ventas</p>

        
        
        <div class="card">
            <div class="card-header">

                <div class="d-flex justify-content-between">

                    <button type="button" class="btn btn-default" id="daterange-btn">
            
                    <span>
                        <i class="fa fa-calendar"></i> Rango de fecha
                    </span>
            
                    <i class="fa fa-caret-down"></i>
            
                    </button>
                    
                    <button type="button" class="btn btn-success" id="descargar-excel">
            
                        <span>
                            <i class="fa fa-file-excel"></i> Descargar Reporte en Excel
                        </span>
                
                    </button>
            
                </div>
                <hr>
                <h3 class="card-title">Ventas de Productos</h3>
            </div>
            <div class="card-body">

                <!-- Grafica de Ventas -->
                <div class="card bg-gradient-gray">
                    <div class="card-header border-0">
                        <h3 class="card-title">
                        <i class="fas fa-th mr-1"></i>
                        Sales Graph
                        </h3>

                        <div class="card-tools">
                            <button type="button" class="btn bg-info btn-sm" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <canvas class="chart" id="line-chart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer bg-transparent">
                        <div class="row">
                            <div class="col-4 text-center">
                                <input type="text" class="knob" data-readonly="true" value="20" data-width="60" data-height="60"
                                    data-fgColor="#39CCCC">
        
                                <div class="text-white">Mail-Orders</div>
                            </div>
                            <!-- ./col -->
                            <div class="col-4 text-center">
                                    <input type="text" class="knob" data-readonly="true" value="50" data-width="60" data-height="60"
                                        data-fgColor="#39CCCC">
        
                                    <div class="text-white">Online</div>
                            </div>
                            <!-- ./col -->
                            <div class="col-4 text-center">
                                <input type="text" class="knob" data-readonly="true" value="30" data-width="60" data-height="60"
                                    data-fgColor="#39CCCC">

                                <div class="text-white">In-Store</div>
                            </div>
                            <!-- ./col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.card-footer -->
                </div>
                <!-- /.card -->

                

                <!--GRAFICA DONA DE PRODUCTOS MAS VENDIDOS-->

                <div class="row d-flex justify-content-between">
                    <div class="card col-lg-5 mb-3 ">
                        <div class="card-header ">
                            <h3 class="card-title">Browser Usage</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8">
                                <div class="chart-responsive">
                                    <canvas id="pieChart" height="150"></canvas>
                                </div>
                                <!-- ./chart-responsive -->
                                </div>
                                <!-- /.col -->
                                <div class="col-md-4">
                                <ul class="chart-legend clearfix">
                                    <li><i class="far fa-circle text-danger"></i> Chrome</li>
                                    <li><i class="far fa-circle text-success"></i> IE</li>
                                    <li><i class="far fa-circle text-warning"></i> FireFox</li>
                                    <li><i class="far fa-circle text-info"></i> Safari</li>
                                    <li><i class="far fa-circle text-primary"></i> Opera</li>
                                    <li><i class="far fa-circle text-secondary"></i> Navigator</li>
                                </ul>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                        
                        <!-- /.card-body -->
                        <div class="card-footer p-0">
                            <ul class="nav nav-pills flex-column">
                                <li class="nav-item">
                                <a href="#" class="nav-link">
                                    United States of America
                                    <span class="float-right text-danger">
                                    <i class="fas fa-arrow-down text-sm"></i>
                                    12%</span>
                                </a>
                                </li>
                                <li class="nav-item">
                                <a href="#" class="nav-link">
                                    India
                                    <span class="float-right text-success">
                                    <i class="fas fa-arrow-up text-sm"></i> 4%
                                    </span>
                                </a>
                                </li>
                                <li class="nav-item">
                                <a href="#" class="nav-link">
                                    China
                                    <span class="float-right text-warning">
                                    <i class="fas fa-arrow-left text-sm"></i> 0%
                                    </span>
                                </a>
                                </li>
                            </ul>
                        </div>
                        
                        <!-- /.footer -->
                </div>
                    <!-- /.card -->
                    <!--TABLA DE PRODUCTOS CON MENOS STOCK-->
                <div class="card col-md-6 mb-3">
                <div class="card-header border-0">
                    <h3 class="card-title">Products</h3>
                    <div class="card-tools">
                    <a href="#" class="btn btn-tool btn-sm">
                        <i class="fas fa-download"></i>
                    </a>
                    <a href="#" class="btn btn-tool btn-sm">
                        <i class="fas fa-bars"></i>
                    </a>
                    </div>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-striped table-valign-middle">
                    <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Precio compra</th>
                        <th>Stock</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                        <img src="dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
                        Agua Bonafont 1.5L
                        </td>
                        <td>$11 MXN</td>
                        <td>
                        0
                        </td>
                    </tr>
                    <tr>
                    </tbody>
                    </table>
                </div>
                </div>
            </div>
                <!-- /.card -->
            </div>

                
                <!-- /.card -->
                
            </div>

            


    </div>
    @stop

    @section('css')
        <link rel="stylesheet" href="/css/admin_custom.css">
    @stop

    @section('js')
        <script src="{{ asset('vendor/jquery-knob/jquery.knob.min.js') }}"></script>
        <script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>
        <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/knob-chart.js')}}"></script>

        
        <!--script src="{//{ asset('vendor/adminlte/dist/js/adminlte.min.js') }}"></script-->

    @stop