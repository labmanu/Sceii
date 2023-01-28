@extends('templates.alumno')
@section('title', 'Home Alumno')

@section('content')

    <!-- Contenido -->
    <div class="home">
        <!-- Listado de laboratorios -->
        @if(session()->exists('laboratorios'))
            <div class="album">
                <h3 class="py-2">Laboratorios</h3>
                <div class="row row-cols-2 row-cols-sm-2 row-cols-md-3 g-3">
                    @foreach(session()->get('laboratorios')->data as $lab)
                        <a href="./laboratorio/{{$lab->id}}">
                            <div class="col">
                                <div class="form-lab text-white animate__animated animate__bounceInLeft">
                                    <div class="fondolab" style="background-image: url({{$lab->imagen}});"></div>
                                    <div class="contentlab">
                                        <!--<i class="fa-solid fa-star" style="color:yellow;"></i> -->
                                        <div class="nomlab">
                                            {{$lab->nombre}}
                                        </div>
                                        <div class="jefelab">
                                            {{$lab->jefe_laboratorio}}
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
                <button type="button" class="btn btn-success btn-circle addlab"><i class="fa-solid fa-plus"></i></button>
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