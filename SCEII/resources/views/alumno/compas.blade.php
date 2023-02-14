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
            <h3 class="titulo text-center">
                {{$_SESSION["laboratorio"]->nombre}}
            </h3>

            <div class="conp">
                <h5>Compañeros</h5>

                @foreach ($_SESSION["compas"] as $compa)
                    <div class="comp py-1">
                        <img class="img-compas" src="{{$compa->foto}}" alt="img" />
                        {{$compa->nombre}}
                    </div>
                    {{-- <br> --}}
                @endforeach
                
            </div>
            
            {{-- {{var_dump($_SESSION["compas"])}} --}}
        </div>
    @endsection

@endif