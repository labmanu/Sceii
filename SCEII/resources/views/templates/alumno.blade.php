<!DOCTYPE html>
<html lang="es">
<?php date_default_timezone_set('America/Mexico_City');?>
<!-- Cabeceras -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Icono de la página -->
    <link rel="icon" href="public/assets/logo.png">
    <!-- Bootstrap CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- Bootstrap JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.2.js"></script>
    <!-- JQuery Confirm -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Customs Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-circle-progress/1.2.2/circle-progress.min.js"></script>
    <link rel="icon" href="{{ asset('public/assets/logo.png')}}">
    <link rel="stylesheet" href="{{ asset('public/css/alumno.css')}}">
    @yield('headers')
    <!-- Titulo de la página -->
    <title>@yield('title')</title>
</head>
<!-- FIN Cabeceras -->
<!-- Cuerpo de la página -->
<body>
    
    @if(session()->exists('message'))
        <script type="text/javascript">
            /*
            //var message = {{ Session::get('message') }};
            Swal.fire({
                icon: 'success',
                title: 'Login exitoso',
                text: 'Bienvenido uwu',
                color: 'white',
                background: '#131414',
                confirmButtonColor: '#46a525'
            });
            */
        </script>
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
        <a class="config"><i class="fas fa-gear fa-1x"></i> Configuración</a>
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
        @if(date('G') >= 7 && date('G') < 12)
            <?=$saludo="Buenos días"?>
        @elseif(date('G') >= 12 && date('G') <= 19)
            <?=$saludo="Buenas tardes"?>
        @elseif(date('G') < 7 || date('G') > 19)
            <?=$saludo="Buenas noches"?>
        @endif
        
        <div class="openbtn" onclick="side()">
            <img src="<?=session()->get('data')->fotoPerfil?>" class="icon-sm" />
            <b>
                <div class="text-center">
                    SCEII
                </div>
                <!--<i class="fa-solid fa-bars"></i>-->
                <div class="saludo">
                    <?=$saludo?> 
                    <script>
                        if(screen.width < 767){
                            document.write("<br>");
                        }
                    </script>
                    <?=session()->get('data')->nombre?> 
                </div>
            </b>
        </div>
        
        @yield('content')

    </div>

    <script  type="text/javascript" src="{{ asset('public/js/alumno.js')}}"></script>
</body>
<!-- FIN Cuerpo de la página -->
</html>