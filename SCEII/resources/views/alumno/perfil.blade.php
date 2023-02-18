@if(isset($_SESSION["data"]) && isset($_SESSION["perfil"]))

    @extends('templates.alumno')
    @section('title', 'Perfil de '.$_SESSION["perfil"]->nombre )

    @section('content')
        <div class="home">
            <img src="{{ $_SESSION["perfil"]->fotoPerfil }}" class="center-block imgperfil" />
            <div class="user">
                {{ $_SESSION["perfil"]->nombre }}
                <br>
                {{ $_SESSION["perfil"]->apellidos }}
            </div>
            <div class="tipouser">
                {{ $_SESSION["perfil"]->tipoUsuario }}
            </div>
            <div class="conp"> 
                <div class="">
                    <p class="ai">
                        <i class="fa-solid fa-address-card"></i> No control: 
                    </p>
                    <p class="ad">
                        {{ $_SESSION["perfil"]->no_control }}
                    </p>
                    <div style="clear: both;"></div>
                    <hr>
                </div>
                <div class="">
                    <p class="ai">
                        <i class="fa-solid fa-house-flag"></i> Carrera: 
                    </p>
                    <p class="ad">
                        {{ $_SESSION["perfil"]->carrera }}
                    </p>
                    <div style="clear: both;"></div>
                    <hr>
                </div>
                <div class="">
                    <p class="ai">
                        <i class="fa-solid fa-graduation-cap"></i> Semestre: 
                    </p>
                    <p class="ad">
                        {{ $_SESSION["perfil"]->id_semestre }}
                    </p>
                    <div style="clear: both;"></div>
                    <hr>
                </div>
                <div class="">
                    <p class="ai">
                        <i class="fa-solid fa-envelope"></i> Correo: 
                    </p>
                    <p class="ad">
                        {{ $_SESSION["perfil"]->correo }}
                    </p>
                    <div style="clear: both;"></div>
                    <hr>
                </div>
                <div class="">
                    <p class="ai">
                        <i class="fa-solid fa-venus-mars"></i> Genero:  
                    </p>
                    <p class="ad">
                        @if($_SESSION["perfil"]->genero == "o")
                            Otro
                        @elseif($_SESSION["perfil"]->genero == "m")
                            Masculino
                        @elseif($_SESSION["perfil"]->genero == "f")
                            Femenino
                        @endif
                    </p>
                    <div style="clear: both;"></div>
                    <hr>
                </div>
                <div class="">
                    <p class="ai">
                        <i class="fa-regular fa-calendar"></i> F. Nacimiento:  
                    </p>
                    <p class="ad">
                        {{ $_SESSION["perfil"]->fecha_Nac }}
                    </p>
                    <div style="clear: both;"></div>
                    <hr>
                </div>
            </div> 
        </div>
    @endsection
    
@else
    <!-- REDIRECT -->
@endif