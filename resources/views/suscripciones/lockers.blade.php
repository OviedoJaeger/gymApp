@extends('adminlte::page')

@section('title', 'Gym')

@section('plugins.Datatables', true)

@section('plugins.Sweetalert2', true)

@section('content_header')
    <h1>HIRD Gym WebApp</h1>
@stop

@section('content')
    <p>Bienvenido a la vista de Lockers</p>

    <div class="card">
        <div class="card-header">

            <div>
                <button type="button" class="btn btn-primary float-left" data-toggle="modal" data-target="#modal-agregar-locker">
                    Agregar Registro Locker
                </button>
            </div>

        </div>
        <div class="card-body">

            {!! $dataTable->table()!!}

        </div>

        <!-- Modal -->
        <div class="modal fade" id="modal-agregar-locker" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="{{route('lockers.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalLabel">Agregar Registro de Locker</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <!--=========================================
                                        CUERPO DEL MODAL
                        ==========================================-->
                        <div class="modal-body">
                            <div class="form-group">
                                <div class="input-group-prepend">
                                    <!--ENTRADA PARA SELECCIONAR EL PAQUETE-->
                                    <span class="input-group-text"><i class="fas fa-hashtag"></i></span>
                                    <input type="number"  name="numero" class="form-control" placeholder="Numero de locker" requires>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    <input type="text" name="cliente" class="form-control" placeholder="Nombre del Cliente" required>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Fin del Modal -->
        </div>

    </div>

@stop

@section('css')
    <link rel="stylesheet" href="{{asset('css/app.css')}}">

@stop

@section('js')
    <script src="{{asset('js/ini_datatable.js')}}"></script>
    <script src="{{asset('js/suscripciones/lockers.js')}}"></script>
    <script src="{{asset('js/general.js')}}"></script>

    <script> var destroyUrlBase = "{{ url('lockers/') }}";
        var lockersIndexUrl = "{{ route('lockers.index') }}";
        var csrfToken = "{{ csrf_token() }}";
    </script>



        <script>
        @if(session('success'))
            Swal.fire({
                title: '¡Éxito!',
                text: "{{ session('success') }}",
                icon: 'success',
                confirmButtonText: 'OK'
            });
        @endif

        @if ($errors->any())
        let contentHtml = '<ul>';
        @foreach ($errors->all() as $error)
                contentHtml += '<li>{{ $error }}</li>';
            @endforeach
            contentHtml += '</ul>';

            Swal.fire({
                title: '¡Error!',
                html: contentHtml,
                icon: 'error',
                confirmButtonText: 'OK'
            });
            @endif
    </script>
@stop
