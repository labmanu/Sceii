@extends('templates.alumno')
@section('title', 'Home Alumno')

<?php
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
                <h3>SCEII</h3>
                <img src="public/assets/logo.png" class="center-block icon-logo" />
            </a>
        </div>
        <a href=""><i class="fas fa-bell fa-1x"></i> Notificaciones</a>
        <a href=""><i class="fas fa-gear fa-1x"></i> Configuración</a>
        <a href=""><i class="fas fa-user fa-1x"></i> Perfil</a>
        <a href=""><i class="fa-solid fa-book"></i> IDK</a>
        <a class="text-danger example21"><i class="fa-solid fa-arrow-right-from-bracket"></i> Cerrar sesión</a>
        
    </div>
    <div id="main">

        @if(date('G') < 12)
            <button class="openbtn" onclick="side()"><i class="fa-solid fa-bars"></i> SCEII Buenos Días <?=session()->get('data')->nombre?></button>
        @elseif(date('G') >= 12 && date('G') <= 20)
            <button class="openbtn" onclick="side()"><i class="fa-solid fa-bars"></i> SCEII Buenas Tardes <?=session()->get('data')->nombre?></button>
        @elseif(date('G') > 20)
            <button class="openbtn" onclick="side()"><i class="fa-solid fa-bars"></i> SCEII Buenas Noches <?=session()->get('data')->nombre?></button>
        @endif

        <div class="contenido">
        
            <!-- Contenido -->
            <div class="album">
                <div class="container">

                    <h3>Laboratorios</h3>

                    <div class="row row-cols-2 row-cols-sm-2 row-cols-md-3 g-3">

                        <div class="col">
                            <div class="form-lab text-white">
                                <i class="fa-solid fa-star" style="color:yellow;"></i> 
                                Laboratorio 1
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-lab">
                                <i class="fa-solid fa-star-half-stroke"></i> 
                                Laboratorio 2
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-lab">
                                <i class="fa-solid fa-star-half-stroke"></i> 
                                Laboratorio 3
                            </div>
                        </div>
                        
                    </div>

                </div>
            </div>
            
            <input class="btn btn-success btn-circle" type="file" capture="camera">
            <button type="button" class="btn btn-success btn-circle example21"><i class="fa-solid fa-plus"></i></button>
            
            <script type="text/javascript">
                $('.example21').on('click', function(){
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
                                    /*$.alert({
                                        title: 'Sesión cerrada',
                                        icon: 'fa-solid fa-right-to-bracket',
                                        theme: 'material',
                                        closeIcon: true,
                                        animation: 'scale',
                                        type: 'red',
                                        content: 'La sesión fue cerrada con éxito',
                                    });*/
                                    window.location.href = "/SCEII";
                                }
                            },
                            /*cancel: function(){
                                $.alert({
                                    title: 'No se cerro la sesión',
                                    icon: 'fa fa-user',
                                    theme: 'material',
                                    closeIcon: true,
                                    animation: 'scale',
                                    type: 'blue',
                                    content: 'Cancelando, la sesión se mantiene abierta actualmente',
                                });
                            }*/
                        }
                    });
                });
            </script>

            <!-- Fin de Contenido -->

        </div>
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
            //document.getElementById("mySidebar").style.width = "20%";
            //document.getElementById("main").style.marginLeft = "20%";
            
            document.getElementById("mySidebar").classList.add("openside");
            document.getElementById("main").classList.add("openmain");
        }

        function closeNav() {
            //document.getElementById("mySidebar").style.width = "0";
            //document.getElementById("main").style.marginLeft = "0";
            
            document.getElementById("mySidebar").classList.remove("openside");
            document.getElementById("main").classList.remove("openmain");
        }

    </script>
@endsection
