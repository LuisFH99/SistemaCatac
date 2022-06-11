@extends('layouts.web')
@section('contenido')


<div class="banner-carousel banner-carousel-1 mb-0">
  <div class="banner-carousel-item" style="background-image:url(constra/images/slider-main/bg7.jpg)">
    <div class="slider-content">
        <div class="container h-100">
          <div class="row align-items-center h-100">
              <div class="col-md-12 text-center">
                <h2 class="slide-title" data-animation-in="slideInLeft">BIENVENIDOS</h2>
                <h3 class="slide-sub-title" data-animation-in="slideInRight">COMUNIDAD CAMPESINA DE CATAC</h3>
                <p data-animation-in="slideInLeft" data-duration-in="1.2">
                  <!--
                    <a href="#project-area" class="slider btn btn-primary" data-spy="affix" data-offset-top="10">Servicios</a>
                    <a href="contact.html" class="slider btn btn-primary">Contactenos</a> -->
                </p>
              </div>
          </div>
        </div>
    </div>
  </div>

  <div class="banner-carousel-item" style="background-image:url(constra/images/slider-main/bg6.jpg)">
    <div class="slider-content text-left">
        <div class="container h-100">
          <div class="row align-items-center h-100">
              <div class="col-md-12">
                <h2 class="slide-title-box" data-animation-in="slideInDown">Nuestas Normas</h2>
                <h3 class="slide-title" data-animation-in="fadeIn">Transparencia total con ustedes y para ustedes</h3>
                <h3 class="slide-sub-title" data-animation-in="slideInLeft">No nos hacemos problemas</h3>
                <p data-animation-in="slideInRight">
                    <a href="/estatuto" class="slider btn btn-primary">Estatuto</a>
                </p>
              </div>
          </div>
        </div>
    </div>
  </div>

  <div class="banner-carousel-item" style="background-image:url(constra/images/slider-main/bg8.jpg)">
    <div class="slider-content text-right">
        <div class="container h-100">
          <div class="row align-items-center h-100">
              <div class="col-md-12">
                <h2 class="slide-title-box" data-animation-in="slideInDown">Nuestra Actualidad</h2>
                <h3 class="slide-sub-title" data-animation-in="fadeIn">Noticias y Eventos</h3>
                <p class="slider-description lead" data-animation-in="slideInRight">Te mantenemos informados desde cualquier lugar y momento.</p>
                <div data-animation-in="slideInLeft">
                    <a href="/noticias" class="slider btn btn-primary" aria-label="contact-with-us">Noticias</a>
                    <a href="/eventos" class="slider btn btn-primary" aria-label="learn-more-about-us">Eventos</a>
                </div>
              </div>
          </div>
        </div>
    </div>
  </div>
</div>
  <!--
  <section class="call-to-action-box no-padding" >
    <div class="container">
      <div class="action-style-box" style="background-color: #1faa00;"> 
          <div class="row align-items-center">
            <div class="col-md-8 text-center text-md-left">
                <div class="call-to-action-text">
                  <h3 class="action-title">Puede contactarnos en diferentes redes sociales</h3>
                </div>
            </div>
            <div class="col-md-4 text-center text-md-right mt-3 mt-md-0">
                <div class="call-to-action-btn">
                  <a class="btn btn-dark" href="contacto.html">Contacto</a>
                </div>
            </div>
          </div>
      </div>
    </div>
  </section> -->


   <!-- Bienvenida -->
  <section id="ts-features"  class="ts-features" style="background: #ffffff;">
    <div class="container">
      <div class="row">
          <div class="col-lg-6">
            <div class="ts-intro wow animate__animated animate__fadeInLeft" >
                <h3 class="into-sub-title">BIENVENIDO</h3>
                <h4 >Al portal de la Comunidad Campesina de Catac</h4>
                <p style="text-align: justify">La Comunidad Campesina de Catac les da la bienvenida a su nuevo Portal Web. Descubre nuestras actividades, servicios entre otros que tenemos para ti.</p>
            </div>
  
            <div class="gap-20"></div>
  
            <div class="row wow animate__animated animate__fadeInLeft">
                <div class="col-md-6">
                  <div class="ts-service-box">
                      <span class="ts-service-icon">
                        <i class="fas fa-trophy"></i>
                      </span>
                      <div class="ts-service-box-content">
                        <h3 class="service-box-title">Tenemos reputacion de excelencia</h3>
                      </div>
                  </div>
                </div>
  
                <div class="col-md-6">
                  <div class="ts-service-box">
                      <span class="ts-service-icon">
                        <i class="fas fa-sliders-h"></i>
                      </span>
                      <div class="ts-service-box-content">
                        <h3 class="service-box-title">Contruimos un mejor futuro</h3>
                      </div>
                  </div>
                </div>
            </div>
  
            <div class="row wow animate__animated animate__fadeInLeft">
                <div class="col-md-6">
                  <div class="ts-service-box">
                      <span class="ts-service-icon">
                        <i class="fas fa-thumbs-up"></i>
                      </span>
                      <div class="ts-service-box-content">
                        <h3 class="service-box-title">Guiados por reglas</h3>
                      </div>
                  </div>
                </div>
  
                <div class="col-md-6">
                  <div class="ts-service-box">
                      <span class="ts-service-icon">
                        <i class="fas fa-users"></i>
                      </span>
                      <div class="ts-service-box-content">
                        <h3 class="service-box-title">Trabajamos en equipo</h3>
                      </div>
                  </div>
                </div>

            </div>
          </div>
  
          <div class="col-lg-6 mt-4 mt-lg-0 wow animate__animated animate__fadeInRight">
            <img loading="lazy" class="img-fluid shadow p-1 mb-3 bg-white rounded" src="{{ asset('constra/images/slider-main/bienvenida.jpg') }}" width="100%">
          </div>
      </div>
    </div>
  </section>
  
  <!-- noticias -->
  <section id="facts" class="facts-area" style="background: #fff5e3">
    <div class="container">
      <div class="row text-center">
        <div class="col-12">
          <h3 class="section-sub-title wow animate__animated animate__fadeInRight">Ultimas NOTICIAS</h3>
        </div>
      </div>
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        @foreach ($noticia as $n)
        <div class="col">
          <div   class="card shadow-sm mb-3 wow animate__animated animate__zoomIn">
            <img loading="lazy" class="img-fluid rounded p-1" src="{{ asset($n->url_imagen) }}" style="width:350px ; height: 350px;" alt="service-image">            
            <div class="card-body">
              <p class="card-text card-title" style="font-weight: bold">{{strtoupper($n->titulo)}}</p>
              <p class="card-text p-2" style="width: 250px; white-space: nowrap; text-overflow: ellipsis  ;
              overflow: hidden;">{{$n->descripcion}}</p>              
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary"><i class="fas fa-calendar-alt"></i></button>
                  <a type="button" class="btn btn-sm btn-outline-secondary">{{$n->fecha}}</a>
                </div>
                <small class="text-muted"> <a class="learn-more d-inline-block" href="{{ route('noticiaeventoactividad', $n->id) }}" aria-label="service-details"><i class="fa fa-caret-right"></i> <b>Leer más</b></a></small>
              </div>
            </div>
          </div>
        </div>            
        @endforeach
      </div>
      <div class="general-btn text-center mt-4 wow animate__animated animate__fadeIn">
        <a class="btn btn-primary" href="/noticias">Ver todas las Noticias</a>
      </div>
    </div>
  </section>
  
  <!-- eventos -->
  <section id="news" class="news" style="background: #ffffff">
    <div class="container">
      <div class="row text-center">
          <div class="col-12" >
            <h3 class="section-sub-title wow animate__animated animate__fadeInRight" >NUESTROS EVENTOS </h3>
          </div>
      </div>
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        @foreach ($evento as $e)
        <div class="col">
          <div class="card shadow-sm mb-3 wow animate__animated animate__zoomIn">
            <img loading="lazy" class="img-fluid rounded p-1" src="{{ asset($e->url_imagen) }}" style="width:350px ; height: 350px;" alt="service-image">            
            <div class="card-body">
              <p class="card-text card-title" style="font-weight: bold">{{strtoupper($e->titulo)}}</p>
              <p class="card-text p-2" style="width: 250px; white-space: nowrap; text-overflow: ellipsis  ;
              overflow: hidden;">{{$n->descripcion}}</p>              
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary"><i class="fas fa-calendar-alt"></i></button>
                  <a type="button" class="btn btn-sm btn-outline-secondary">{{$e->fecha}}</a>
                </div>
                <small class="text-muted"> <a class="learn-more d-inline-block" href="{{ route('eventoindividual', $e->id) }}" aria-label="service-details"><i class="fa fa-caret-right"></i> <b>Leer más</b></a></small>
              </div>
            </div>
          </div>
        </div> 
        @endforeach
      </div>
  
      <div class="general-btn text-center mt-4 wow animate__animated animate__fadeIn">
          <a class="btn btn-primary" href="/eventos">Ver todos los Eventos</a>
      </div>
    </div>
  </section>
  
  <!-- servicios -->
  <section id="project-area" class="project-area solid-bg" style="background: #fff5e3">
    <div class="container ">
      <div class="row text-center">
        <div class="col-lg-12">
          <h3 class="section-sub-title wow animate__animated animate__fadeInRight" >SERVICIOS</h3>
        </div>
      </div>

      <div class="row " >
        <div class="col-14">
          <div class="shuffle-btn-group">
            <label class="active wow animate__animated animate__zoomIn" for="all">
              <input type="radio" name="shuffle-filter" id="all" value="all" checked="checked">Todos
            </label>
            <label for="servicentro" class="wow animate__animated animate__zoomIn">
              <input type="radio" name="shuffle-filter" id="servicentro" value="servicentro" >Servicentro
            </label>
            <label for="agropecuaria" class="wow animate__animated animate__zoomIn">
              <input type="radio" name="shuffle-filter" id="agropecuaria" value="agropecuaria">Agropecuaria
            </label>
            <label for="transporte" class="wow animate__animated animate__zoomIn">
              <input type="radio" name="shuffle-filter" id="transporte" value="transporte">Transporte
            </label>
            <label for="cantera" class="wow animate__animated animate__zoomIn">
              <input type="radio" name="shuffle-filter" id="cantera" value="cantera">Cantera
            </label>
            <label for="agroveterinaria" class="wow animate__animated animate__zoomIn">
              <input type="radio" name="shuffle-filter" id="agroveterinaria" value="agroveterinaria">Agroveterinaria
            </label>
            <label for="turismo" class="wow animate__animated animate__zoomIn">
              <input type="radio" name="shuffle-filter" id="turismo" value="turismo">Turismo
            </label>
            <label for="forestacion" class="wow animate__animated animate__zoomIn">
              <input type="radio" name="shuffle-filter" id="forestacion" value="forestacion">Forestación
            </label>
          </div>
  
  
          <div class="row shuffle-wrapper ">
            <div class="col-1 shuffle-sizer"></div>
  
            <div class="col-lg-4 col-sm-6 shuffle-item" data-groups="[&quot;servicentro&quot;]">
              <div class="project-img-container">
                <a class="gallery-popup" href=" {{ asset('constra/images/projects/project1.jpg') }}" style="width: 500px;height: 300px; " aria-label="project-img">
                  <img class="img-fluid" src=" {{ asset('constra/images/projects/project1.jpg') }}"  style="width: 500px;height: 300px; "alt="project-img">
                  <span class="gallery-icon"><i class="fa fa-plus"></i></span>
                </a>
                <div class="project-item-info">
                  <div class="project-item-info-content">
                    <h3 class="project-item-title">
                      <a href="/serviciosprincipal">ESTACIÓN DE SERVICIO</a>
                    </h3>
                    <p class="project-cat">Servicentro</p>
                  </div>
                </div>
              </div>
            </div>
  
            <div class="col-lg-4 col-sm-6 shuffle-item" data-groups="[&quot;agropecuaria&quot;]">
              <div class="project-img-container">
                <a class="gallery-popup" href="{{ asset('constra/images/projects/project2.jpg') }}" style="width: 500px;height: 300px; " aria-label="project-img">
                  <img class="img-fluid" src="{{ asset('constra/images/projects/project2.jpg') }}" style="width: 500px;height: 300px; " alt="project-img">
                  <span class="gallery-icon"><i class="fa fa-plus"></i></span>
                </a>
                <div class="project-item-info">
                  <div class="project-item-info-content">
                    <h3 class="project-item-title">
                      <a href="/serviciosprincipalganaderia">Ganaderia</a>
                    </h3>
                    <p class="project-cat">Agropecuaria</p>
                  </div>
                </div>
              </div>
            </div>
  
            <div class="col-lg-4 col-sm-6 shuffle-item" data-groups="[&quot;transporte&quot;]">
              <div class="project-img-container">
                <a class="gallery-popup" href="{{ asset('constra/images/projects/project3.jpg') }}" style="width: 500px;height: 300px; " aria-label="project-img">
                  <img class="img-fluid" src="{{ asset('constra/images/projects/project3.jpg') }}" style="width: 500px;height: 300px; " alt="project-img">
                  <span class="gallery-icon"><i class="fa fa-plus"></i></span>
                </a>
                <div class="project-item-info">
                  <div class="project-item-info-content">
                    <h3 class="project-item-title">
                      <a href="/serviciosprincipaltransporte">Transporte de materiales</a>
                    </h3>
                    <p class="project-cat">Transporte</p>
                  </div>
                </div>
              </div>
            </div>
  
            <div class="col-lg-4 col-sm-6 shuffle-item " data-groups="[&quot;cantera&quot;]">
              <div class="project-img-container">
                <a class="gallery-popup" href="{{ asset('constra/images/projects/project4.jpg') }} " style="width: 500px;height: 300px; " aria-label="project-img">
                  <img class="img-fluid" src="{{ asset('constra/images/projects/project4.jpg') }} "  style="width: 500px;height: 300px; "alt="project-img">
                  <span class="gallery-icon"><i class="fa fa-plus"></i></span>
                </a>
                <div class="project-item-info">
                  <div class="project-item-info-content">
                    <h3 class="project-item-title">
                      <a href="/serviciosprincipalcantera">Cantera</a>
                    </h3>
                    <p class="project-cat">Cantera</p>
                  </div>
                </div>
              </div>
            </div>
  
            <div class="col-lg-4 col-sm-6 shuffle-item" data-groups="[&quot;agroveterinaria&quot;]">
              <div class="project-img-container">
                <a class="gallery-popup" href="{{ asset('constra/images/projects/project5.jpg') }} " style="width: 500px;height: 300px; " aria-label="project-img">
                  <img class="img-fluid" src="{{ asset('constra/images/projects/project5.jpg') }} " style="width: 500px;height: 300px; " alt="project-img">
                  <span class="gallery-icon"><i class="fa fa-plus"></i></span>
                </a>
                <div class="project-item-info">
                  <div class="project-item-info-content">
                    <h3 class="project-item-title">
                      <a href="/serviciosprincipalagroveterinaria">Agroveterinaria</a>
                    </h3>
                    <p class="project-cat">Agroveterinaria</p>
                  </div>
                </div>
              </div>
            </div>
  
            <div class="col-lg-4 col-sm-6 shuffle-item" data-groups="[&quot;servicentro&quot;]">
              <div class="project-img-container">
                <a class="gallery-popup" href=" {{ asset('constra/images/projects/project9.jpg') }}" style="width: 500px;height: 300px; " aria-label="project-img">
                  <img class="img-fluid" src=" {{ asset('constra/images/projects/project9.jpg') }}" style="width: 500px;height: 300px; " alt="project-img">
                  <span class="gallery-icon"><i class="fa fa-plus"></i></span>
                </a>
                <div class="project-item-info">
                  <div class="project-item-info-content">
                    <h3 class="project-item-title">
                      <a href="/serviciosprincipalrestaurante">Restaurant</a>
                    </h3>
                    <p class="project-cat">Servicentro</p>
                  </div>
                </div>
              </div>
            </div>
  
            <div class="col-lg-4 col-sm-6 shuffle-item" data-groups="[&quot;forestacion&quot;]">
              <div class="project-img-container">
                <a class="gallery-popup" href="{{ asset('constra/images/projects/project8.jpg') }} " style="width: 500px;height: 300px; " aria-label="project-img">
                  <img class="img-fluid" src="{{ asset('constra/images/projects/project8.jpg') }} " style="width: 500px;height: 300px; " alt="project-img">
                  <span class="gallery-icon"><i class="fa fa-plus"></i></span>
                </a>
                <div class="project-item-info">
                  <div class="project-item-info-content">
                    <h3 class="project-item-title">
                      <a href="/serviciosprincipalforestacion">Forestacion</a>
                    </h3>
                    <p class="project-cat">Forestación</p>
                  </div>
                </div>
              </div>
            </div>
  
            <div class="col-lg-4 col-sm-6 shuffle-item" data-groups="[&quot;agropecuaria&quot;]">
              <div class="project-img-container">
                <a class="gallery-popup" href="{{ asset('constra/images/projects/project10.jpg') }} " style="width: 500px;height: 300px; " aria-label="project-img">
                  <img class="img-fluid" src="{{ asset('constra/images/projects/project10.jpg') }} " style="width: 500px;height: 300px; " alt="project-img">
                  <span class="gallery-icon"><i class="fa fa-plus"></i></span>
                </a>
                <div class="project-item-info">
                  <div class="project-item-info-content">
                    <h3 class="project-item-title">
                      <a href="/serviciosprincipalagricultura">AGRICULTURA</a>
                    </h3>
                    <p class="project-cat">Agropecuaria</p>
                  </div>
                </div>
              </div>
            </div>
  
            <div class="col-lg-4 col-sm-6 shuffle-item" data-groups="[&quot;turismo&quot;]">
              <div class="project-img-container">
                <a class="gallery-popup" href="{{ asset('constra/images/projects/project6.jpg') }}" style="width: 500px;height: 300px; " aria-label="project-img">
                  <img class="img-fluid" src="{{ asset('constra/images/projects/project6.jpg') }}" style="width: 500px;height: 300px; " alt="project-img">
                  <span class="gallery-icon"><i class="fa fa-plus"></i></span>
                </a>
                <div class="project-item-info">
                  <div class="project-item-info-content">
                    <h3 class="project-item-title">
                      <a href="/serviciosprincipalturismo">Turismo</a>
                    </h3>
                    <p class="project-cat">Turismo</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  
  <!-- contacto data-aos="fade-zoom-in" data-aos-duration="400"-->
  <section class="subscribe no-padding" >
    <div class="container mb-0 p-0" >
      <div class="row" >
          <div class="col-md-4">
            <div class="subscribe-call-to-acton">
                <h4>¿Necesitas algún producto?</h4>
            </div>
          </div>
          <div class="col-md-8">
            <div class="ts-newsletter row align-items-center">
              <div class="subscribe-call-to-acton">
                <h4>Contáctanos (43) 444687</h4>
            </div>
            </div>
          </div>
      </div>
    </div>
  </section>

@endsection