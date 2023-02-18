<!DOCTYPE html>
<html lang="es">

<!-- Cabeceras -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Icono de la página -->
    <link rel="icon" href="{{ asset('public/assets/logo.png') }}">
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
    <!-- Customs Styles -->
    <!--<link rel="stylesheet" href= "public/css/login.css">-->
    <link rel="stylesheet" href="public/css/login.css?v=<?php rand(); ?>">

    <!--=============== LOGIN JS ===============-->
    <script  type="text/javascript" src="{{ asset('public/js/login.js')}}"></script>
    <title>SCEII</title>
</head>
<!-- FIN Cabeceras -->

{{-- @if(session()->exists('registrado'))
    <script type="text/javascript">
        var msj = '{{ Session::get("registrado"); }}';
        $.alert({
            title: msj,
            icon: 'fa fa-user-plus',
            theme: 'modern',
            closeIcon: true,
            animation: 'rotate',
            type: 'green',
            content: 'Para poder iniciar sesión verifique su cuenta de correo electronico',
        });
    </script>
@endif
 --}}

<!-- Cuerpo de la página -->
<body>
    <div class="container">
        <div class="formulario">
            <img src="{{ asset('public/assets/logo.png') }}" alt="logo" class="mx-auto d-block mb-3 icon-logo">
            <!-- Formulario de sesión -->
            <form method="post" action="{{route('redireccion.login')}}" class="form-login">
                @csrf
                {{-- <input type="hidden" name="operacion" value="login" /> --}}
                <h3 class="titulo">Iniciar Sesión
                    <!--<label class="switch">
                        <input type="checkbox">
                        <div class="slider round"></div>
                    </label>-->
                </h3>

                <div class="inputContainer">
                    <input name="correo" type="email" class="{{(session()->exists('error')?"input-login-error":"input-login") }}" id= "correo" placeholder="a" required/>
                    <label class="labelform">
                        <i class="fa-solid fa-envelope"></i> Correo:
                    </label>
                </div>
                <p class="{{(session()->exists('error')?"labelformErrorAct":"labelformError") }}" id="label_email_error" >Usuario o contraseña incorrecta</p>
                <div class="inputContainer">
                    <input name="clave" type="password" class="{{(session()->exists('error')?"input-login-error":"input-login") }}" id= "clave" placeholder="a" required />
                    <label class="labelform">
                        <i class="fa-solid fa-key"></i> Contraseña:
                    </label>
                    <i class="fa-solid fa-eye-slash eye" id="showPassword"></i>
                </div>
                <p class="{{(session()->exists('error')?"labelformErrorAct":"labelformError") }}"  id="label_clave_error">Usuario o contraseña incorrecta</p>
                <a href="recuperar">Olvide mi contraseña</a>
                <input type="submit" class="submitBtn mx-auto" value="Entrar"  id ="btn_send_request"  />
                <label>¿No tienes una cuenta?</label>
                <br>
                <a href="registro">Crear una cuenta</a>
                <br>
                <!-- Iconos con vinculos a redes sociales -->
                <!--
                <a href="https://www.facebook.com/" target="_bank">
                    <i class="fa-brands fa-facebook fa-2x"></i>
                </a>
                <a href="https://discord.com/" target="_bank">
                    <i class="fa-brands fa-discord fa-2x"></i>
                </a>
                <a href="https://web.whatsapp.com/" target="_bank">
                    <i class="fa-brands fa-whatsapp fa-2x"></i>
                </a>
                -->
                <!-- FIN Iconos con vinculos a redes sociales -->
                <!-- Iconos con vinculos a la Tienda -->
                <!--
                    <a href="https://play.google.com/store?hl=es" target="_bank">
                    <i class="fa-brands fa-google-play fa-2x"></i>
                </a>
                <a href="https://www.apple.com/mx/app-store/" target="_bank">
                    <i class="fa-brands fa-apple fa-2x"></i>
                </a>
                -->
                <!-- FIN Iconos con vinculos a la Tienda -->
            </form>
        </div>
    </div>
</body>
<!-- FIN Cuerpo de la página -->

</html>