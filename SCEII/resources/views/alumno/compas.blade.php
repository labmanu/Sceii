@if(isset($_SESSION["data"]))

    @extends('templates.alumno')
    @section('title', 'Compañeros de Laboratorio')

    @section('content')
        <!-- Contenido -->
        <div class="home">
            <h3 class="titulo text-center mt-2">
                {{$_SESSION["laboratorio"]->nombre}}
            </h3>
            <br>
            <div class="conp">
                <h5>Compañeros</h5>
                <?php $rd = "?v=".rand(); ?>
                @foreach ($_SESSION["compas"] as $compa)
                    <div class="comp py-1">
                        <img class="img-compas" src="{{$compa->foto.$rd}}" alt="img" /> 
                         {{$compa->nombre}}
                    </div>
                @endforeach
            </div>
        </div>
    @endsection

@endif