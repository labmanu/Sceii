@if(isset($_SESSION["data"]))

    @extends('templates.alumno')
    @section('title', 'Asistencias en '.$_SESSION["laboratorio"]->nombre)
    
    <!-- NO FUNCIONO EL HIDDEN AAAAAAAAA -->
    
    <!-- -->
    <script >
        var asistencias = '<?php echo json_encode($_SESSION["asistencias"]) ?>';
    </script>
    <!-- -->

    @section('content')
        <div class="cal">

            <!--Año de Asistencias: 
            <select name="anio" id="anio">
                <option value="2023">2023</option>
                <option value="2024">2024</option>
                <option value="2025">2025</option>
                <option value="2026">2026</option>
                <option value="2027">2027</option>
                <option value="2028">2028</option>
                <option value="2029">2029</option>
            </select>
            -->
           

            <div class="cal1"></div>

        
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script>
            <script  type="text/javascript" src="{{ asset('public/js/clndr.js') }}"></script>
            <script  type="text/javascript" src="{{ asset('public/js/calendar.js') }}"></script>

        </div>
    @endsection

@else
    <!-- -->
@endif