@if(isset($_SESSION["data"]))

    @extends('templates.alumno')
    @section('title', 'Laboratorios del Alumno')

    <!-- -->
    <script >
        var token = '<?php echo $_SESSION["data"]->token; ?>';
    </script>
    <!-- -->

    @section('content')

        <!-- Contenido -->
        <div class="home">
            <!-- Listado de laboratorios -->
            @if(isset($_SESSION["laboratorios"]))
                <div class="album">
                    <h3 class="titulo py-2">Laboratorios</h3>
                    <div class="row row-cols-2 row-cols-sm-2 row-cols-md-3 g-3">
                        @foreach($_SESSION["laboratorios"] as $lab)
                            <a href="alumno/laboratorio/{{ $lab->id }}">
                                <div class="col">
                                    <div class="form-lab text-white animate__animated animate__bounceInLeft">
                                        <div class="fondolab" style="background-image: url({{ $lab->imagen }});"></div>
                                        <div class="contentlab">
                                            <div class="nomlab">
                                                {{ $lab->nombre }}
                                            </div>
                                            <div class="jefelab">
                                                {{ $lab->jefe_laboratorio }}
                                            </div>
                                            <div class="icon-detalle">
                                                <i class="fa-solid fa-flask-vial"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                    
                    <input type="hidden" value="{{ $_SESSION["data"]->token }}" id="token">
                    <button type="button" class="btn btn-success btn-circle" onclick='addLab(token)'><i class="fa-solid fa-plus"></i></button>
                    <br>

                </div>
            <!-- SIN Laboratorios -->
            @else
                <h3>No existen Laboratorios</h3>
            @endif
            <!--
            <input class="btn btn-success btn-circle" type="file" capture="camera">
            <button type="button" class="btn btn-success btn-circle" onclick="alertSuccess()"><i class="fa-solid fa-plus"></i></button>
            -->
        </div>
        <!-- Fin de Contenido -->

    @endsection

@else
    <!-- REDIRECT -->
@endif