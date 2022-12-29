<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!--=============== FAVICON ===============-->
    <link
      rel="shortcut icon"
      href="{{ asset('public/img/faviconLight.png')}}"
      type="image/x-icon"
    />

    <!--=============== REMIX ICONS ===============-->
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css"
      rel="stylesheet"
    />

    <!--=============== CSS ===============-->
    <link rel="stylesheet" href= "{{ asset('public/css/confirmar.css') }}">

    <script src="https://code.jquery.com/jquery-3.6.2.js" integrity="sha256-pkn2CUZmheSeyssYw3vMp1+xyub4m+e+QK4sQskvuo4=" crossorigin="anonymous"></script>
   


    <title>SCEII | Confirmar cuenta</title>
  </head>
  <body>
    <!--==================== HEADER ====================-->
    <header class="header" id="header">
      <nav class="nav container">
        <a href="https://labmanufactura.net/" class="nav__logo">
         <img src="{{asset('public/img/faviconLight.png')}}" width="40" height="40" id="logo_img"> SCEII
        </a>

        <div class="nav__menu" id="nav-menu">
          <ul class="nav__list">
            <li class="nav__item">
              <a href="https://labmanufactura.net/" class="nav__link active-link">Inicio</a>
            </li>
            <li class="nav__item">
              <a href="https://labmanufactura.net/SCEII/" class="nav__link">Iniciar sesión</a>
          </li>
            <li class="nav__item">
              <a href="https://labmanufactura.net/SCEII/registro" class="nav__link">Registrate</a>
            </li>
          </ul>

          <div class="nav__close" id="nav-close">
            <i class="ri-close-line"></i>
          </div>
        </div>

        <div class="nav__btns">
          <!-- Theme change button -->
          <i class="ri-moon-line change-theme" id="theme-button"></i>

          <div class="nav__toggle" id="nav-toggle">
            <i class="ri-menu-line"></i>
          </div>
        </div>
      </nav>
    </header>

    <main class="main">
      <!--==================== HOME ====================-->
      <section class="home" id="home">
        <div class="home__container container grid">
          <img src={{(!isset($error))?"../public/img/welcome.png":"../public/img/error.png"}}   alt="" class="home__img" />

          <div class="home__data">
            <h2 class="home__title">
              @if(isset($nombre))
              El SCEII Te da la bienvenida {{$nombre}}
              @endif

              @if(isset($anterior))
              Tu cuenta ya fue dada de alta con anterioridad
              @endif

              @if(isset($error))
              Ha ocurrido un error inesperado
              @endif
            </h2>
            
              @if(isset($nombre) || isset($anterior))
              <p class="home__description">
              Gracias por ser parte de nostros, ya puedes usar te cuenta. 
              <br>
              para continuar dirigete al login con el boton de abajo
              </p>
              @endif
              @if(isset($error))
              <p class="home__description">
              Si el error persiste comunicate con nostros al siguiente correo para solucionarlo 
              lo mas pronto posible
              <br>
              example@email.com
              </p>
              @endif


              
            
            <a href="https://labmanufactura.net/SCEII/" class="button button--flex">
              Iniciar <i class="ri-arrow-right-down-line button__icon"></i>
            </a>
            <a href="#about" class="button button--flex">
                Versión móvil <i class="ri-android-fill"></i>
              </a>
          </div>

          <div class="home__social">
            <span class="home__social-follow">Siguenos</span>

            <div class="home__social-links">
              <a
                href="https://www.facebook.com/"
                target="_blank"
                class="home__social-link"
              >
                <i class="ri-facebook-fill"></i>
              </a>
              <a
                href="https://www.instagram.com/"
                target="_blank"
                class="home__social-link"
              >
                <i class="ri-instagram-line"></i>
              </a>
              <a
                href="https://twitter.com/"
                target="_blank"
                class="home__social-link"
              >
                <i class="ri-twitter-fill"></i>
              </a>
            </div>
          </div>
        </div>
      </section>

    <!--==================== FOOTER ====================-->
    <footer class="footer section">
      <div class="footer__container container grid">
        <div class="footer__content">
          <a href="#" class="footer__logo">
            <i class="ri-leaf-line footer__logo-icon"></i> SCEII
          </a>

          <h3 class="footer__title">
            Registrate para empezar
          </h3>

          <div class="footer__subscribe">
            <a class="button button--flex footer__button" href="https://labmanufactura.net/SCEII/registro">
              Registrate
              <i class="ri-arrow-right-up-line button__icon"></i>
            </a >
          </div>
        </div>

        <div class="footer__content">
          <h3 class="footer__title">Ubicación</h3>

          <ul class="footer__data">
            <li class="footer__information">Antonio García Cubas</li>
            <li class="footer__information">Pte #1200 esq. Ignacio Borunda</li>
            <li class="footer__information">Celaya, Gto. México</li>
          </ul>
        </div>

        <div class="footer__content">
          <h3 class="footer__title">Contactanos</h3>

          <ul class="footer__data">
            <li class="footer__information">+999 888 777</li>

            <div class="footer__social">
              <a href="https://www.facebook.com/" class="footer__social-link">
                <i class="ri-facebook-fill"></i>
              </a>
              <a href="https://www.instagram.com/" class="footer__social-link">
                <i class="ri-instagram-line"></i>
              </a>
              <a href="https://twitter.com/" class="footer__social-link">
                <i class="ri-twitter-fill"></i>
              </a>
            </div>
          </ul>
        </div>

        <div class="footer__content">
            <h3 class="footer__title">Desarrolladores</h3>
  
            <ul class="footer__data">
              <li class="footer__information"><a href="https://www.facebook.com/sare.isaias">Ramírez García Marco Isaías </a></li>
              <li class="footer__information"><a href="https://www.facebook.com/luis.davidraw">García Ramírez Luis David</a></li>
              <li class="footer__information"><a href="https://www.facebook.com/">Martinez Hernandez Edgar Gabriel</a></li>
            </ul>
          </div>
      </div>

      <p class="footer__copy">SCEII</p>
    </footer>

    <!--=============== SCROLL UP ===============-->
    <a href="#" class="scrollup" id="scroll-up">
      <i class="ri-arrow-up-fill scrollup__icon"></i>
    </a>

    <!--=============== SCROLL REVEAL ===============-->
    <script type="text/javascript" src="{{ asset('public/js/scrollreveal.min.js')}}" > </script>

    <!--=============== MAIN JS ===============-->
    <script  type="text/javascript" src="{{ asset('public/js/confirmar.js')}}"></script>

    <!--=============== JQUERY =================-->
  </body>
</html>

