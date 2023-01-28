@extends('templates.alumno')
@section('title', 'Laboratorio')

@section('content')

    <div class="lab animate__animated animate__fadeInLeft"
        style="background-image: linear-gradient(to bottom, rgba(238, 238, 238, 0.52), rgba(23, 32, 42, 0.73)), url('<?= session()->get('laboratorio')->imagen ?>');">
        <div class="containerimg">
            <i class="top-right fa-solid fa-bars"></i>
            <img src="<?= session()->get('laboratorio')->imagen ?>" class="imglab img-fluid"
                alt="<?= session()->get('laboratorio')->nombre ?>" />
            <div class="bottom-left"><?= session()->get('laboratorio')->nombre ?></div>
        </div>
        <div id="lab" class="infolab">
            <h2>Enlaces</h2>
            <div class="scrollmenu">
                <a href="#home">Home</a>
                <a href="#news">News</a>
                <a href="#contact">Contact</a>
                <a href="#about">About</a>
                <a href="#support">Support</a>
                <a href="#blog">Blog</a>
                <a href="#tools">Tools</a>
                <a href="#base">Base</a>
                <a href="#custom">Custom</a>
                <a href="#more">More</a>
                <a href="#logo">Logo</a>
                <a href="#friends">Friends</a>
                <a href="#partners">Partners</a>
                <a href="#people">People</a>
                <a href="#work">Work</a>
            </div>
            <br>
            <h2>Practicas</h2>
            <!-- Listado de laboratorios -->
            @if (session()->exists('laboratorios'))
                <div class="album">
                    <div class="row row-cols-2 row-cols-sm-2 row-cols-md-2 g-3">
                        @foreach (session()->get('laboratorios')->data as $lab)
                            <a href="">
                                <div class="col">
                                    <div class="form-prac text-white animate__animated animate__bounceInLeft">
                                        <div class="wrapper">
                                            <div class="card">
                                                <div class="circle">
                                                    <div class="bar"></div>
                                                    <div class="box"><span></span></div>
                                                </div>
                                                <div class="text">Practica [example]</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
                <!-- SIN Laboratorios -->
            @else
                <h3>No existen Laboratorios</h3>
            @endif
            <!-- SIN Laboratorios -->
            <br>

            
        </div>
    </div>

    <script>
        let options = {
            startAngle: -1.55,
            size: 150,
            value: 0.85,
            fill: {
                gradient: ['#34E237', '#09df70']
            }
        }
        $(".circle .bar").circleProgress(options).on('circle-animation-progress',
            function(event, progress, stepValue) {
                $(this).parent().find("span").text(String(stepValue.toFixed(2).substr(2)) + "%");
            });
        $(".js .bar").circleProgress({
            value: 0.70
        });
        $(".node .bar").circleProgress({
            value: 0.90
        });
        $(".react .bar").circleProgress({
            value: 0.60
        });
    </script>

@endsection
