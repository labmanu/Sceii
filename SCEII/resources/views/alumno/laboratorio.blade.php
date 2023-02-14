@if(isset($_SESSION["data"]) && isset($_SESSION["laboratorio"]))

    @extends('templates.alumno')
    @section('title', 'Laboratorio de '.$_SESSION["laboratorio"]->nombre )
    
    @section('content')

        <div class="lab animate__animated animate__fadeIn"
            style="background-image: linear-gradient(to bottom, rgba(238, 238, 238, 0.52), rgba(23, 32, 42, 0.73)), url('{{ $_SESSION["laboratorio"]->imagen }}');">
            <div class="containerimg">

                <i class="top-right fa-solid fa-bars" onclick="sidebar()"></i>
                
                <img src="{{ $_SESSION["laboratorio"]->imagen }}" class="imglab img-fluid"
                    alt="{{ $_SESSION["laboratorio"]->nombre }}" />
                <div class="bottom-left">{{ $_SESSION["laboratorio"]->nombre }}</div>
            </div>

            <div id="menu" class="menu">
                <i class="icon-close fa-solid fa-xmark" onclick="closebar()"></i>
                <img src="{{ $_SESSION["laboratorio"]->imagen }}" class="img-fluid"
                    alt="{{ $_SESSION["laboratorio"]->nombre }}" />
                <div class="menucont">

                    <div class="pb-2">
                        <input type="hidden" value="{{ $_SESSION["laboratorio"]->encargado }}" id="encargado">
                        <input type="hidden" value="{{ $_SESSION["laboratorio"]->correo }}" id="correo">
                        <input type="hidden" value="{{ $_SESSION["laboratorio"]->fotoPerfil }}" id="fotoPerfil">
                        <a class="encargado"><i class="fa-solid fa-circle-user"></i> Encargado</a>
                    </div>

                    <div class="pb-2">
                        
                        <a class="compas"><i class="fa-solid fa-user-group"></i> Compañeros</a>
                    </div>

                    <div class="pb-2">
                        <a class="" id="asistencia"><i class="fa-solid fa-qrcode"></i> Tomar asistencia</a>
                    </div>

                    <div class="pb-2">
                        <a class="calendario"><i class="fa-solid fa-calendar-days"></i> Asistencias</a>
                    </div>

                    <div class="pb-2">
                        <a class="help"><i class="fa-solid fa-circle-info"></i> Ayuda</a>
                    </div>

                    <div class="pb-2">
                        <a class=""><i class="fa-solid fa-screwdriver-wrench"></i> Prestamos</a>
                    </div>

                    <div class="pb-2">
                        <a class="text-danger"><i class="fa-solid fa-trash"></i> Abandonar laboratorio</a>
                    </div>

                </div>
            </div>

            <div id="lab" class="infolab">
                <h3 class="titulo">Enlaces</h3>
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


                {{-- <div class="enlaces">
                    
                </div> --}}

                <br>
                <h3 class="titulo">Practicas</h3>
                <br>
                <div class="text-center">
                    <img src="{{ asset('public/assets/practicas.png')}}" alt="proximamente" class="mx-auto d-block imgprox">
                    <br>
                    Por el momento no estan disponibles las practicas
                </div>
                <!-- Listado de practicas -->
                
                <button type="button" class="btn btn-success btn-circle" onclick="location.href= window.location+'/asistencia'"><i class="fa-solid fa-qrcode"></i></button>

                <br>

            </div>
        </div>

    @endsection

@else
    <!-- -->
@endif