@extends('adminlte::cliente')

@section('title', 'Gym')

@section('')
@stop

@section('content')
    <h1 class="text-muted">Body Gym WebApp CONTROL DE ACCESO</h1>
    <h2 class="lead">Bienvenido, ¡Tú éxito es nuestro compromiso!</h2>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="card">
        <div class="card-body row">
            <div class="col-6 ">
                <!--Columna Izquierda-->
                <div class="">
                    <h2>Nombre del Usuario</h2>
                    <h2 class="text-danger">Espacio de aviso si es cumpleaños del cliente</h2>
                    <div class="post">
                        <div class="user-block">
                            <img class="img-circle img-bordered-sm" src="{{asset('img-usuarios/imagen-prueba.png')}}" alt="user image" style="width: 150px; height: 150px;">
                            
                                <span class="username">
                                    Inicio del paquete: 12-12-2024
                                </span>
                                <span class="username">Termino del paquete: 12-12-2024</span>
                                <span class="username">Paquete: Mensualidad</span>

                                <div class="knob-container d-flex justify-content-center">
                                    <input type="text" class="knob" value="30" data-width="120" data-height="120"
                                            data-fgColor="#f56954">
                
                                    <div class="knob-label">Avance del Paquete</div>
                                </div>

                        </div>
                        <!-- /.user-block -->
                        <h3 class="card-title">Espacio para aviso del socio(si esta vigente o si esta vencido)</h3>
                    </div>
                </div>
            </div>
            <!--Columna Derecha-->
            <div class="col-6 d-flex justify-content-center flex-column ">
                <div>
                    <h1 class="mb-3">Titulo del Anuncio</h1>
                </div>
                <div>
                    <p class="mb-3">Texto del anuncio</p>
                </div>
                <div>
                    <img src="{{asset('img-usuarios/imagen-prueba.png')}}" alt="imagen del anuncio" style="width: 250px; height: 250px;">
                </div>
            </div>
        </div>
    </div>

</section>
<!-- /.content -->
@stop

@section('js')

<script src="{{asset('vendor/jquery-knob/jquery.knob.min.js')}}"></script>

<script>
    $(function () {
    /* jQueryKnob */

    $('.knob').knob({
    /*change : function (value) {
        //console.log("change : " + value);
        },
        release : function (value) {
        console.log("release : " + value);
        },
        cancel : function () {
        console.log("cancel : " + this.value);
        },*/
    draw: function () {

        // "tron" case
        if (this.$.data('skin') == 'tron') {

        var a   = this.angle(this.cv)  // Angle
            ,
            sa  = this.startAngle          // Previous start angle
            ,
            sat = this.startAngle         // Start angle
            ,
            ea                            // Previous end angle
            ,
            eat = sat + a                 // End angle
            ,
            r   = true

        this.g.lineWidth = this.lineWidth

        this.o.cursor
        && (sat = eat - 0.3)
        && (eat = eat + 0.3)

        if (this.o.displayPrevious) {
            ea = this.startAngle + this.angle(this.value)
            this.o.cursor
            && (sa = ea - 0.3)
            && (ea = ea + 0.3)
            this.g.beginPath()
            this.g.strokeStyle = this.previousColor
            this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sa, ea, false)
            this.g.stroke()
        }

        this.g.beginPath()
        this.g.strokeStyle = r ? this.o.fgColor : this.fgColor
        this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sat, eat, false)
        this.g.stroke()

        this.g.lineWidth = 2
        this.g.beginPath()
        this.g.strokeStyle = this.o.fgColor
        this.g.arc(this.xy, this.xy, this.radius - this.lineWidth + 1 + this.lineWidth * 2 / 3, 0, 2 * Math.PI, false)
        this.g.stroke()

        return false
        }
    }
    })
    /* END JQUERY KNOB */
    })
</script>
@stop
