<footer id="footer" class="footer bg-overlay">
  <div class="footer-main" style="background-color: #1faa00;">
    <div class="container">
      <div class="row justify-content-between">
        <div class="col-lg-4 col-md-6 footer-widget footer-about">
          <h3 class="widget-title">Sobre Nosotros</h3>
          <img loading="lazy" width="150px" src="{{ asset('/img/logo_catac.png') }}" alt="Constra">
          <p style="text-align: justify"><br>La Comunidad Campesina de Cátac, una Asociación con casi 900 socios, ademas es una Empresa Comunal, una de las mas grandes en el Perú.</p>
          <div class="footer-social">
            <ul>
              <li><a href="https://facebook.com/themefisher" aria-label="Facebook"><i
                    class="fab fa-facebook-f"></i></a></li>
              <li><a href="https://twitter.com/themefisher" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
              </li>
              <li><a href="https://instagram.com/themefisher" aria-label="Instagram"><i
                    class="fab fa-instagram"></i></a></li>

            </ul>
          </div><!-- Footer social end -->
        </div><!-- Col end -->

        <div class="col-lg-4 col-md-6 footer-widget mt-5 mt-md-0">
          <h3 class="widget-title">Horario de Trabajo</h3>
          <div class="working-hours">
            Nosotros trabajamos 5 días a la semana, excepto los principales días festivos. Contáctenos si tiene una emergencia, con nuestro
            Línea directa y formulario de contacto.
            <br><br> Lunes - Viernes: <span class="text-right">8:30 - 17:00 </span>
            <br> Sabados: <span class="text-right">No hay atención</span>
            <br> Feriados: <span class="text-right">No hay atención</span>
          </div>
        </div><!-- Col end -->

        <div class="col-lg-3 col-md-6 mt-5 mt-lg-0 footer-widget">
          <h3 class="widget-title">Servicios</h3>
          <ul class="list-arrow">
            <li><a href="service-single.html">Servicentro</a></li>
            <li><a href="service-single.html">Agropecuaria</a></li>
            <li><a href="service-single.html">Transporte</a></li>
            <li><a href="service-single.html">Cantera</a></li>
            <li><a href="service-single.html">Agroveterinaria</a></li>
            <li><a href="service-single.html">Turismo</a></li>
            <li><a href="service-single.html">Forestación</a></li>
          </ul>
        </div><!-- Col end -->
      </div><!-- Row end -->
    </div><!-- Container end -->
  </div><!-- Footer main end -->

  <div class="copyright" style="background-color: #1faa00;">
    <div class="" style="margin-left: 50px; margin-right: 100px;">
      <div class="row align-items-center">
        <div class="col-md-6">
          <div class="copyright-info text-center text-md-left">
            <span>Copyright &copy; <script>
                document.write(new Date().getFullYear())
              </script>, Diseñado &amp; Desarrollado por <a href="">Oficina General de Tecnologías de Información Sistemas y Estadistica</a></span>  
        </div>
        </div>

        <div class="col-md-6">
          <div class="footer-menu text-center text-md-right">
            <ul class="list-unstyled">
              <li><a href="about.html">Sobre Nosotros</a></li>
              <li><a href="team.html">Directivos</a></li>
              <li><a href="faq.html">Preguntas Frecuentes</a></li>
              <li>
                @if (Route::has('login'))
                @auth
                    <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Admin</a>

                    <!-- @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                    @endif -->
                @endauth
              @endif
              </li>
            </ul>
          </div>
        </div>
      </div><!-- Row end -->

      <div id="back-to-top" data-spy="affix" data-offset-top="10" class="back-to-top position-fixed">
        <button class="btn btn-primary" title="Back to Top">
          <i class="fa fa-angle-double-up"></i>
        </button>
      </div>

    </div><!-- Container end -->
  </div><!-- Copyright end -->
</footer><!-- Footer end -->