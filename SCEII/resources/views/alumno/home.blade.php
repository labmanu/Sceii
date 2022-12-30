@extends('templates.alumno')
@section('title', 'Home Alumno')

@section('content')

    @if(session()->exists('message'))
        <script type="text/javascript">
            //var message = {{ Session::get('message') }};
            $.confirm({
                title: 'Que pasa calabaza',
                icon: 'fa fa-user',
                theme: 'supervan',
                closeIcon: true,
                animation: 'scale',
                type: 'orange',
                content: 'uwu ',
            });
        </script>
    @endif

    @if(!session()->exists('data'))
        <?php 
            // Por si el Controller falla xd
            header("location: /SCEII");
            exit; 
        ?>
    @endif

    <div id="mySidebar" class="sidebar">
        <!--<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>-->
        <div class="sidebar-header text-center">
            <a href="/SCEII/inicio">
                <h3 class="">SCEII</h3>
                <img src="public/assets/logo.png" style="width:100px;heigth:100px;" class="center-block"></img>
            </a>
        </div>
        <a href=""><i class="fas fa-bell fa-1x"></i> Notificaciones</a>
        <a href=""><i class="fas fa-gear fa-1x"></i> Configuración</a>
        <a href=""><i class="fas fa-user fa-1x"></i> Perfil</a>
        <a href=""><i class="fa-solid fa-book"></i> IDK</a>
        <a class="text-danger" href="/SCEII"><i class="fa-solid fa-arrow-right-from-bracket"></i> Cerrar Sesión</a>
        
    </div>
    <div id="main">
        <button class="openbtn" onclick="side()"><i class="fa-solid fa-bars"></i> OPCIONES SCEII</button>
        <div class="container contenido">
        
            <!-- Contenido -->
            <h2>Usuario: <?=session()->get('data')->nombre?> <?=session()->get('data')->apellidos?></h2> 
            
            <p>Message: <?=session()->get('data')->tipoUsuario?></p>
            <div class="container">
                <p>Laboratorios del id: <?=session()->get('data')->tipoUsuario?></p>
                <a href="">
                    <div class="form-lab text-white">
                        <i class="fa-solid fa-star" style="color:yellow;"></i> Laboratorio 1
                    </div>
                </a>
                <br>
                <div class="form-lab">
                    <i class="fa-solid fa-star-half-stroke"></i> Laboratorio 2
                </div>
            </div>
            <br>
            <input  class="btn btn-success btn-circle"type="file" capture="camera">
            <br>
            <button type="button" class="btn btn-success btn-circle"><i class="fa-solid fa-plus"></i></button>
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
            document.getElementById("mySidebar").style.width = "250px";
            document.getElementById("main").style.marginLeft = "250px";
        }

        function closeNav() {
            document.getElementById("mySidebar").style.width = "0";
            document.getElementById("main").style.marginLeft = "0";
        }
    </script>
@endsection
