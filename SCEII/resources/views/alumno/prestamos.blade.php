@if(isset($_SESSION["data"]) && isset($_SESSION["id_laboratorio"]))

    @extends('templates.alumno')
    @section('title', 'Prestamos')

    <!-- NO FUNCIONO EL HIDDEN AAAAAAAAA -->
    <!-- -->
    <script >
        var token = '<?php echo $_SESSION["data"]->token; ?>';
        var id = '<?php echo $_SESSION["id_laboratorio"] ?>';
    </script>
    <!-- -->
    @section('content')
        
    <div class="home">
        <h3 class="titulo py-2">Laboratorio {{ $_SESSION['laboratorio']->nombre }}</h3>
        
        <div class="text-center">
            <img src="{{ asset('public/assets/prestamos.png')}}" alt="proximamente" class="mx-auto d-block imgprox">
            <br>
            Por el momento no tienes prestamos pendientes
        </div>
    </div>

    @endsection

@else
    <!-- REDIRECT -->
@endif