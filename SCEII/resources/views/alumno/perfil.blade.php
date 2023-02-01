@extends('templates.alumno')

@if(isset($_SESSION["data"]))
    @section('title', 'Perfil de '.$_SESSION["data"]->nombre )
    @section('content')
        <div class="home">
            Perfil de {{$_SESSION["data"]->nombre}} uwu
        </div>
    @endsection
@endif