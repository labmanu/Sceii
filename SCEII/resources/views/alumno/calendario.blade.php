@if(isset($_SESSION["data"]) && isset($_GET["anio"]))

    @extends('templates.alumno')
    @section('title', 'Asistencias en '.$_SESSION["laboratorio"]->nombre)
    
    <!-- NO FUNCIONO EL HIDDEN AAAAAAAAA -->
    <!-- -->
    <script >
        var asistencias = '<?php echo json_encode($_SESSION["asistencias"]) ?>';
        var id = '<?php echo $_SESSION["id_laboratorio"] ?>';
        var url = '/SCEII/alumno/laboratorio/'+id+'/calendario?anio=';
    </script>
    <!-- -->
    @section('content')
        <div class="cal">

            
            <div class="text-center">
                {{-- filtro --}}
                Año de Asistencias: 
                <select name="anio" id="anio" style="width: auto">
                    <option value="2023">2023</option>
                    <option value="2024">2024</option>
                    <option value="2025">2025</option>
                    <option value="2026">2026</option>
                    <option value="2027">2027</option>
                    <option value="2028">2028</option>
                    <option value="2029">2029</option>
                </select>
                <input type="button" value="Filtrar" onclick="window.location.href=url+anio.value">
                {{-- fin filtro --}}
            </div>
            

            {{-- Aquí esta toda la magia uwu --}}
            <div class="cal1"></div>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script>
            <script  type="text/javascript" src="{{ asset('public/js/clndr.js') }}"></script>
            <script  type="text/javascript" src="{{ asset('public/js/calendar.js') }}"></script>
        </div>
    @endsection

@else
    <!-- REDIRECT -->
@endif