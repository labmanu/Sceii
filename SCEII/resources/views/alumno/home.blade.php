@extends('templates.alumno')
@section('title', 'Home Alumno')

<?php
    // Formato para horario sincronizado
    date_default_timezone_set('America/Mexico_City');
?>

@section('content')

    @if(session()->exists('message'))
        <script type="text/javascript">
            var message = {{ Session::get('message') }};
            $.alert({
                title: 'Que pasa calabaza',
                icon: 'fa fa-user',
                theme: 'supervan',
                closeIcon: true,
                animation: 'scale',
                opacity: 0.5,
                type: 'blue',
                content: 'uwu '+message,
            });
        </script>
    @endif

    @if(!session()->exists('data'))
        <?=header("location: /SCEII")?>
    @endif

    <div id="mySidebar" class="sidebar">
        <!--<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>-->
        <div class="sidebar-header text-center">
            <a href="/SCEII/inicio">
                <h3>Mi perfil</h3>
                <img src="<?=session()->get('data')->fotoPerfil?>" class="center-block icon-logo" />
            </a>
        </div>
        <p class="user">
            <?=session()->get('data')->nombre?> <?=session()->get('data')->apellidos?>
            <br>
            <?=session()->get('data')->tipoUsuario?>
        </p>
        <!--<a href=""><i class="fas fa-bell fa-1x"></i> Notificaciones</a>-->
        <a class=""><i class="fas fa-gear fa-1x"></i> Configuración</a>
        <hr class="separador">
        <a class=""><i class="fas fa-circle-user fa-1x"></i> Ver perfil</a>
        <hr class="separador">
        <a class=""><i class="fa-solid fa-user-astronaut"></i> Acerca de nosotros</a>
        <hr class="separador">
        <a class="text-danger logout"><i class="fa-solid fa-arrow-right-from-bracket"></i> Cerrar sesión</a>
        <hr class="separador">
        
    </div>
    <div id="main">

        <!-- Navbar de saludo -->
        @if(date('G') < 12)
            <button class="openbtn" onclick="side()"><i class="fa-solid fa-bars"></i> SCEII Buenos Días <?=session()->get('data')->nombre?></button>
        @elseif(date('G') >= 12 && date('G') <= 20)
            <button class="openbtn" onclick="side()"><i class="fa-solid fa-bars"></i> SCEII Buenas Tardes <?=session()->get('data')->nombre?></button>
        @elseif(date('G') > 20)
            <button class="openbtn" onclick="side()"><i class="fa-solid fa-bars"></i> SCEII Buenas Noches <?=session()->get('data')->nombre?><img src="<?=session()->get('data')->fotoPerfil?> " class="icon-sm" /></button>
        @endif

        <!-- Contenido -->
        <div class="contenido">
            <!-- Listado de laboratorios -->
            @if(session()->exists('laboratorios'))
                <div class="album">
                    <div class="">
                        <h3 class="py-2">Laboratorios</h3>
                        <div class="row row-cols-2 row-cols-sm-2 row-cols-md-3 g-3">
                            @foreach(session()->get('laboratorios')->data as $lab)
                                    <div class="col">
                                        <div class="form-lab text-white animate__animated animate__bounceInLeft" style="background-image: url({{$lab->imagen}});background-repeat: no-repeat;background-size: cover;background-attachment: fixed;">
                                            <i class="fa-solid fa-star" style="color:yellow;"></i> 
                                                {{$lab->nombre}}
                                                <br>
                                                
                                        </div>
                                    </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            <!-- SIN Laboratorios -->
            @else
                <h3>No existen Laboratios</h3>
            @endif

            <input class="btn btn-success btn-circle" type="file" capture="camera">
            <button type="button" class="btn btn-success btn-circle"><i class="fa-solid fa-plus"></i></button>
            
        </div>
        <!-- Fin de Contenido -->
    </div>
@endsection

@section('scripts')
    <script>
        var barra = true;
        openNav();

        function side() {
            if (barra) {
                closeNav();
                barra = false;
            } else {
                openNav();
                barra = true;
            }
        }

        function openNav() {
            document.getElementById("mySidebar").classList.add("openside");
            document.getElementById("main").classList.add("openmain");
        }

        function closeNav() {
            document.getElementById("mySidebar").classList.remove("openside");
            document.getElementById("main").classList.remove("openmain");
        }

        $('.logout').on('click', function(){
            $.confirm({
                icon: 'fa-solid fa-right-to-bracket',
                theme: 'modern',
                closeIcon: true,
                animation: 'rotate',
                type: 'red',
                title: 'Cerrar Sesión',
                content: 'La sesión se cerrará automáticamente.',
                autoClose: 'logoutUser|10000',
                buttons: {
                    logoutUser: {
                        text: 'Cerrar Sesión',
                        action: function(){
                            window.location.href = "/SCEII";
                        }
                    },
                }
            });
        });

    </script>
@endsection
