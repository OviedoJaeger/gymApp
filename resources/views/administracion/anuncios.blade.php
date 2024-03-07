@extends('adminlte::page')

@section('title', 'Gym')

@section('content_header')
    <h1>HIRD Gym WebApp</h1>
@stop

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">Anuncio en la Ventana del Cliente</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <div class="input-group-prepend">
                            <!--ENTRADA PARA TITULO-->
                            <span class="input-group-text"><i class="fas fa-quote-left"></i></span>
                            <input type="text" class="form-control" placeholder="Título del Anuncio">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group-prepend">
                            <!--ENTRADA PARA DESCRIPCION-->
                            <span class="input-group-text"><i class="fas fa-comment"></i></span>
                            <textarea class="form-control" rows="4" placeholder="Descripción del Anuncio"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group-prepend  panel">
                            <!--ENTRADA PARA IMAGEN-->
                            <span class="input-group-text"><i class="fas fa-image"></i></span>
                            <input type="file" class="" id="">
                            <img src="" class="mt-2 img-thumbnail previsualizar-foto" width="100 px">
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="float-right">
                        <button type="submit" class="btn btn-success"><i class="fas fa-check"></i>Mostrar</button>
                    </div>
                    <button type="reset" class="btn btn-danger"><i class="fas fa-times"></i>Cancelar</button>
            </div>
            
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
        <div class="row">
            </div>
            <div class="card card-primary card-outline">
                <div class="card-header">
                <h3 class="card-title">Anuncio o Promoción Vía Correo Electrónico</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                        <input class="form-control" placeholder="Para:">
                        </div>
                        <div class="form-group">
                        <input class="form-control" placeholder="Asunto:">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control summernote" id="compose-textarea" class="form-control" style="height: 300px">
                            <h1><u>BODY GYM</u></h1>
                            <h4>Estimado cliente </h4>
                            <p>
                                ¡Descubre una nueva era en tu bienestar físico y mental en nuestro Body Gym! 
                                <br>
                                <br>
                                Te invitamos a embarcarte en un viaje transformador hacia una versión más fuerte, saludable y en forma de ti mismo.
                                <br>
                                <br>
                                ¿Qué hace a nuestro Gym Fitness Plus único?
                                <br>
                                Variedad de Clases:
                                Desde entrenamiento cardiovascular de alta intensidad hasta relajantes sesiones de yoga, 
                                ofrecemos una amplia gama de clases diseñadas para todos los niveles de condición física.
                                <br>
                                <br>
                                Equipamiento de Vanguardia:
                                <br>
                                Nuestro gimnasio cuenta con equipos de última generación que te permitirán alcanzar tus objetivos de manera eficiente y efectiva.
                                <br>
                                <br>
                                Entrenadores Expertos: 
                                <br>
                                Nuestro equipo de entrenadores altamente calificados está aquí para brindarte orientación personalizada, 
                                motivación constante y un plan de entrenamiento adaptado a tus necesidades individuales.
                                <br>
                                <br>
                                Ambiente Motivador:
                                <br> 
                                Creemos que el ambiente en el que entrenas es crucial. En nuestro Body Gym, 
                                te sumergirás en una atmósfera motivadora y amigable que te inspirará a alcanzar tus metas.
                                <br>
                                <br>
                                ¡Inscríbete hoy y descubre el poder de una vida más saludable en el Body Gym!
                                <br>
                                <br>
                                Tu viaje hacia un cuerpo más fuerte y una mente más saludable comienza aquí.
                                <br>
                                ¡No esperes más para ser la mejor versión de ti mismo!</p>
                            <p>Gracias</p>
                            <p>Equipo de Body Gym</p>
                            <a href="https://www.bodygym.com.mx/"> Body Gym</a>
                            </textarea>
                        </div>
                        <div class="form-group">
                        <div class="btn btn-default btn-file">
                            <i class="fas fa-paperclip"></i>Insertar
                            <input type="file" name="attachment">
                        </div>
                        <p class="help-block">Max. 32MB</p>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <div class="float-right">
                        <button type="button" class="btn btn-default"><i class="fas fa-pencil-alt"></i>Editar</button>
                        <button type="submit" class="btn btn-primary"><i class="far fa-envelope"></i>Enviar</button>
                        </div>
                        <button type="reset" class="btn btn-default"><i class="fas fa-times"></i>Cancelar</button>
                    </div>
                </div>
            <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="{{ asset('vendor/summernote/summernote-bs4.css') }}">
    
@stop

@section('js')
    <script src="{{ asset('vendor/summernote/summernote-bs4.js') }}"></script>
    <script>
        $(function () {
          //Add text editor
        $('#compose-textarea').summernote()
        })
    </script>
@stop