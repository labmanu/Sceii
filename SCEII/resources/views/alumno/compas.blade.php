@if(isset($_SESSION["data"]))

    @extends('templates.alumno')
    @section('title', 'Compañeros de Laboratorio')

    <!-- -->
    <script >
        var token = '<?php echo $_SESSION["data"]->token; ?>';
    </script>
    <!-- -->

    @section('content')

        <!-- Contenido -->
        <div class="home">

        </div>
    @endsection

@endif