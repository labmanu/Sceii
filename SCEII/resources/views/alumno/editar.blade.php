@if(isset($_SESSION["data"]))

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
                <img src="{{$_SESSION["data"]->fotoPerfil}}" alt="editar" class="imgeditar">
                <div class="conticon">
                    <div class="iconeditar">
                        <i class="fa-solid fa-camera-rotate"></i>
                    </div>
                </div>
                <div class="inputContainer">
                    <input name="nombre" type="text" class="input-edit" id="nombre" placeholder="a" required />
                    <label class="labelform">
                        <i class="fa-solid fa-circle-user"></i> Nombre:
                    </label>
                </div>
                <div class="inputContainer">
                    <input name="apellidos" type="text" class="input-edit" id="apellidos" placeholder="a" required />
                    <label class="labelform">
                        <i class="fa-solid fa-circle-user"></i> Apellidos:
                    </label>
                </div>
                <div class="inputContainer">
                    <input name="clave" type="password" class="input-edit" id="clave" placeholder="a" required />
                    <label class="labelform">
                        <i class="fa-solid fa-key"></i> Nueva contraseña:
                    </label>
                </div>
                <select name="genero" id="genero">
                    <option value="f">Femenino</option>
                    <option value="m">Masculino</option>
                    <option value="o">Otro</option>
                </select>
                <div class="inputContainer">
                    <input name="fecha_nacimiento" type="date" class="input-edit" id="date" placeholder="a" required />
                    <label class="labelform">
                        <i class="fa-solid fa-calendar-days"></i> Fecha de Nacimiento:
                    </label>
                </div>
                <div class="inputContainer">
                    <input name="clave" type="password" class="input-edit" id="clave" placeholder="a" required />
                    <label class="labelform">
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
    <!-- -->
@endif