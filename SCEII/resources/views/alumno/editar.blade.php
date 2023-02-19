@if(isset($_SESSION["data"]) && isset($_SESSION["perfil"]))

    @extends('templates.alumno')
    @section('title', 'Editar perfil de '.$_SESSION["data"]->nombre )
   
    @section('content')

        <script>
            Swal.fire({
                background: '#131414',
                color: 'white',
                title: 'Funcionalidad en desarrollo',
                icon: 'warning',
                text: "Se estan perfeccionando las funcionalidades [Vista previa del diseño final]",
                //confirmButtonColor: '#46a525',
                showClass: {
                    popup: 'animate__animated animate__bounceInUp'
                },
                hideClass: {
                    popup: 'animate__animated animate__bounceOutDown'
                },
            })
        </script>

        <div class="home">

            <form class="editar">

                <!--<input type="hidden" name="operacion" value="registro" />-->
                <h3 class="titulo py-2 text-end">Editar perfil</h3>

                <div class="fotop" for="profile_pic">
                    <img src="{{$_SESSION["data"]->fotoPerfil}}" alt="editar" class="imgeditar" id="imgeditar">
                    <div class="texto-encima">
                        <div class="container-input">
                            <input type="file" name="file-5" id="file-5" class="inputfile inputfile-5" accept=".jpg, .jpeg, .png" />
                            <label for="file-5">
                                <figure>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                        <path d="M149.1 64.8L138.7 96H64C28.7 96 0 124.7 0 160V416c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V160c0-35.3-28.7-64-64-64H373.3L362.9 64.8C356.4 45.2 338.1 32 317.4 32H194.6c-20.7 0-39 13.2-45.5 32.8zM384 256c0 8.8-7.2 16-16 16H291.3c-6.2 0-11.3-5.1-11.3-11.3c0-3 1.2-5.9 3.3-8L307 229c-13.6-13.4-31.9-21-51-21c-19.2 0-37.7 7.6-51.3 21.3L185 249c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l19.7-19.7C193.4 172.7 224 160 256 160c31.8 0 62.4 12.6 85 35l23.7-23.7c2.1-2.1 5-3.3 8-3.3c6.2 0 11.3 5.1 11.3 11.3V256zM128 320c0-8.8 7.2-16 16-16h76.7c6.2 0 11.3 5.1 11.3 11.3c0 3-1.2 5.9-3.3 8L205 347c13.6 13.4 31.9 21 51 21c19.2 0 37.7-7.6 51.3-21.3L327 327c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-19.7 19.7C318.6 403.3 288 416 256 416c-31.8 0-62.4-12.6-85-35l-23.7 23.7c-2.1 2.1-5 3.3-8 3.3c-6.2 0-11.3-5.1-11.3-11.3V320z"/>
                                    </svg>   
                                </figure>
                                <span class="iborrainputfile">Seleccionar archivo</span>
                            </label>
                        </div>
                    </div>
                </div>
                <br>
                <br>
                <div class="inputContainer mt-3">
                    <input name="nombre" type="text" class="input-edit" id="nombre" placeholder="a" value="{{ $_SESSION['perfil']->nombre }}" required />
                    <label class="labelform" style="background: #131414;">
                        <i class="fa-solid fa-circle-user"></i> Nombre:
                    </label>
                </div>
                <div class="inputContainer">
                    <input name="apellidos" type="text" class="input-edit" id="apellidos" placeholder="a" value="{{ $_SESSION['perfil']->apellidos }}" required />
                    <label class="labelform" style="background: #131414;">
                        <i class="fa-solid fa-circle-user"></i> Apellidos:
                    </label>
                </div>
                <div class="inputContainer">
                    <input name="clave" type="password" class="input-edit" id="clave" placeholder="a" required />
                    <label class="labelform" style="background: #131414;">
                        <i class="fa-solid fa-key"></i> Nueva contraseña:
                    </label>
                </div>
                <select name="genero" id="genero">
                    <option value="f" {{ $_SESSION['perfil']->genero == "f" ? "selected" : "" }} >Femenino</option>
                    <option value="m" {{ $_SESSION['perfil']->genero == "m" ? "selected" : "" }} >Masculino</option>
                    <option value="o" {{ $_SESSION['perfil']->genero == "o" ? "selected" : "" }} >Otro</option>
                </select>
                <div class="inputContainer">
                    <input name="fecha_nacimiento" type="date" class="input-edit" id="date" placeholder="a" value="{{ $_SESSION['perfil']->fecha_Nac }}" required />
                    <label class="labelform" style="background: #131414;">
                        <i class="fa-solid fa-calendar-days"></i> Fecha de Nacimiento:
                    </label>
                </div>
                <h6 class="mt-3">Confirma tu contraseña actual: </h6>
                <div class="inputContainer">
                    <input name="clave" type="password" class="input-edit" id="clave" placeholder="a" required />
                    <label class="labelform" style="background: #131414;">
                        <i class="fa-solid fa-key"></i> Confirma tu contraseña:
                    </label>
                </div>
                <!-- Botones -->
                <table align="center">
                    <td>
                        <a href="/SCEII/">
                            <input type="button" class="btn-cancelar2 mx-auto" value="Cancelar" />
                        </a>
                    </td>
                    <td>
                        <input type="button" id="" class="btn-registrar" value="Guardar" />
                    </td>
                </table>

            </form>

        </div>
    @endsection

@else
    <!-- REDIRECT -->
@endif