<!DOCTYPE html>
<html lang="es">

    <!-- Cabeceras -->
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- Icono de la página -->
        <link rel="icon" href="{{ asset('public/assets/logo.png?v='.rand()) }}">
        <!-- Bootstrap CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <!-- Bootstrap JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
        <!-- Customs Styles -->
        
        @yield('headers')
        <!-- Titulo de la página -->
        <title>@yield('title')</title>
    </head>
    <!-- FIN Cabeceras -->

    <!-- Cuerpo de la página -->
    <body>
        @yield('content')
        @yield('scripts')
    </body>
    <!-- FIN Cuerpo de la página -->

</html>