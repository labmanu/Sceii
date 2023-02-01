@extends('templates.alumno')

@if(isset($_SESSION["laboratorio"]))
    @section('title', 'Laboratorio de '.$_SESSION["laboratorio"]->nombre )
    @section('content')

    <div class="lab animate__animated animate__fadeIn"
        style="background-image: linear-gradient(to bottom, rgba(238, 238, 238, 0.52), rgba(23, 32, 42, 0.73)), url('{{ $_SESSION["laboratorio"]->imagen }}');">
        <div class="containerimg">
            <i class="top-right fa-solid fa-bars"></i>
            <img src="{{ $_SESSION["laboratorio"]->imagen }}" class="imglab img-fluid"
                alt="{{ $_SESSION["laboratorio"]->nombre }}" />
            <div class="bottom-left">{{ $_SESSION["laboratorio"]->nombre }}</div>
        </div>
        <div id="lab" class="infolab">
            <h2>Enlaces</h2>
            <!--
            <div class="scrollmenu animate__animated animate__bounceInLeft">
                <a href=""><i class="fa-brands fa-youtube bg-danger bg-gradient"></i></a>
                <a href=""><i class="fa-brands fa-google bg-warning bg-gradient"></i></a>
                <a href=""><i class="fa-brands fa-facebook bg-primary bg-gradient"></i></a>
                <a href=""><i class="fa-brands fa-twitter bg-info bg-gradient"></i></a>
                <a href=""><i class="fa-brands fa-spotify bg-success bg-gradient"></i></a>
                <a href=""><i class="fa-sharp fa-solid fa-earth-americas bg-secondary bg-gradient"></i></a>
                <a href=""><i class="fa-sharp fa-solid fa-earth-americas bg-secondary bg-gradient"></i></a>
                <a href=""><i class="fa-sharp fa-solid fa-earth-americas bg-secondary bg-gradient"></i></a>
                <a href=""><i class="fa-sharp fa-solid fa-earth-americas bg-secondary bg-gradient"></i></a>
            </div>
            -->
            <br>
            <h2>Practicas</h2>
            <br>
            <div class="text-center">
                Por el momento no estan disponibles las practicas
                <br>
                <img src="https://labmanufactura.net/SCEII/public/assets/working.png" alt="proximamente" class="mx-auto d-block imgprox">
            </div>
            <!-- Listado de practicas -->
            <!-- 
            @if (isset($_SESSION["laboratorios"]))
                <div class="album">
                    <div class="row row-cols-2 row-cols-sm-2 row-cols-md-2 g-3">
                        @foreach ($_SESSION["laboratorios"] as $lab)
                            <a href="">
                                <div class="col">
                                    <div class="form-prac text-white animate__animated animate__bounceInLeft">
                                        <div class="wrapper">
                                            <div class="card">
                                                <div class="circle">
                                                    <div class="bar"></div>
                                                    <div class="box"><span></span></div>
                                                </div>
                                                <div class="text">Practica [example]</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            @else
                <h3>No existen Practicas</h3>
            @endif
            -->

            <button type="button" class="btn btn-success btn-circle" onclick="location.href= window.location+'/asistencia'"><i class="fa-solid fa-qrcode"></i></button>

            <br>

        </div>
    </div>

    <script>
        /*
        let options = {
            startAngle: -1.55,
            size: 150,
            value: 0.85,
            fill: {
                gradient: ['#34E237', '#09df70']
            }
        }
        $(".circle .bar").circleProgress(options).on('circle-animation-progress',
            function(event, progress, stepValue) {
                $(this).parent().find("span").text(String(stepValue.toFixed(2).substr(2)) + "%");
            });
        $(".js .bar").circleProgress({
            value: 0.70
        });
        $(".node .bar").circleProgress({
            value: 0.90
        });
        $(".react .bar").circleProgress({
            value: 0.60
        });
        */
    </script>
@else
    {{ header("location: /SCEII/inicio") }}
@endif

@endsection
