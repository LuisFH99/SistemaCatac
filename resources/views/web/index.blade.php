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
                      <a href="#project-area" class="slider btn btn-primary" data-spy="affix" data-offset-top="10">Servicios</a>
                      <a href="contact.html" class="slider btn btn-primary">Contactenos</a>
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
                      <a href="estatuto.html" class="slider btn btn-primary">Estatuto</a>
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
                  <h2 class="slide-title-box" data-animation-in="slideInDown">Reuniones con otras comunidades</h2>
                  <h3 class="slide-sub-title" data-animation-in="fadeIn">Noticias y Eventos</h3>
                  <p class="slider-description lead" data-animation-in="slideInRight">Te mantenemos informados desde cualquier lugar y momento.</p>
                  <div data-animation-in="slideInLeft">
                      <a href="noticias.html" class="slider btn btn-primary" aria-label="contact-with-us">Noticias</a>
                      <a href="eventos.html" class="slider btn btn-primary" aria-label="learn-more-about-us">Eventos</a>
                  </div>
                </div>
            </div>
          </div>
      </div>
    </div>
  </div>
  
  <section class="call-to-action-box no-padding" >
    <div class="container" >
      <div class="action-style-box" style="background-color: #1faa00;"> 
          <div class="row align-items-center">
            <div class="col-md-8 text-center text-md-left">
                <div class="call-to-action-text">
                  <h3 class="action-title">Puede contactarnos en diferentes redes sociales</h3>
                </div>
            </div><!-- Col end -->
            <div class="col-md-4 text-center text-md-right mt-3 mt-md-0">
                <div class="call-to-action-btn">
                  <a class="btn btn-dark" href="contacto.html">Contacto</a>
                </div>
            </div><!-- col end -->
          </div><!-- row end -->
      </div><!-- Action style box -->
    </div><!-- Container end -->
  </section><!-- Action end -->
  
  <section id="ts-features" class="ts-features">
    <div class="container">
      <div class="row">
          <div class="col-lg-6">
            <div class="ts-intro">
                <h3 class="into-sub-title">BIENVENIDOS</h3>
                <p>Al portal de la Comunindad Campesina de CATAC <br> La Comunidad campesina de catac les da la bienvenida a su Portal Web. Descubre las actividades, servicios entre otros que tenemos para ti.</p>
            </div><!-- Intro box end -->
  
            <div class="gap-20"></div>
  
            <div class="row">
                <div class="col-md-6">
                  <div class="ts-service-box">
                      <span class="ts-service-icon">
                        <i class="fas fa-trophy"></i>
                      </span>
                      <div class="ts-service-box-content">
                        <h3 class="service-box-title">Tenemos reputacion de excelencia</h3>
                      </div>
                  </div><!-- Service 1 end -->
                </div><!-- col end -->
  
                <div class="col-md-6">
                  <div class="ts-service-box">
                      <span class="ts-service-icon">
                        <i class="fas fa-sliders-h"></i>
                      </span>
                      <div class="ts-service-box-content">
                        <h3 class="service-box-title">Contruimos un mejor futuro</h3>
                      </div>
                  </div><!-- Service 2 end -->
                </div><!-- col end -->
            </div><!-- Content row 1 end -->
  
            <div class="row">
                <div class="col-md-6">
                  <div class="ts-service-box">
                      <span class="ts-service-icon">
                        <i class="fas fa-thumbs-up"></i>
                      </span>
                      <div class="ts-service-box-content">
                        <h3 class="service-box-title">Guiados por reglas</h3>
                      </div>
                  </div><!-- Service 1 end -->
                </div><!-- col end -->
  
                <div class="col-md-6">
                  <div class="ts-service-box">
                      <span class="ts-service-icon">
                        <i class="fas fa-users"></i>
                      </span>
                      <div class="ts-service-box-content">
                        <h3 class="service-box-title">Trabajamos en equipo</h3>
                      </div>
                  </div><!-- Service 2 end -->
                </div><!-- col end -->
            </div><!-- Content row 1 end -->
          </div><!-- Col end -->
  
          <div class="col-lg-6 mt-4 mt-lg-0">
            <img loading="lazy" src="{{ asset('constra/images/slider-main/bienvenida.jpg') }}" width="100%">
          </div><!-- Col end -->
      </div><!-- Row end -->
    </div><!-- Container end -->
  </section><!-- Feature are end -->
  
  <section id="facts" class="facts-area dark-bg">
    <div class="container">
      <div class="row text-center">
        <div class="col-12">
          <h3 class="section-sub-title">NOTICIAS</h3>
        </div>
      </div>
      <div class="row">
          <div class="col-lg-4 col-md-6 mb-5">
            <div class="ts-service-box">
                <div class="ts-service-image-wrapper">
                  <img loading="lazy" class="w-100" src="{{ asset('constra/images/paro1.webp') }}" alt="service-image">
                </div>
                <div class="d-flex">
                  <div class="card-date"><span>03</span><br>Abril</div>
                  <div class="ts-service-info">
                      <h3 class="service-box-title"><a href="noticiaeventoactividad.html">Paro Nacional Indefinido</a></h3>
                      <p>You have ideas, goals, and dreams. We have a culturally diverse, forward thinking team looking for talent like. Lorem ipsum dolor suscipit.</p>
                      <a class="learn-more d-inline-block" href="noticiaeventoactividad.html" aria-label="service-details"><i class="fa fa-caret-right"></i> Leer más</a>
                  </div>
                </div>
            </div><!-- Service1 end -->
          </div><!-- Col 1 end -->
  
          <div class="col-lg-4 col-md-6 mb-5">
            <div class="ts-service-box">
                <div class="ts-service-image-wrapper">
                  <img loading="lazy" class="w-100" src="{{ asset('constra/images/paro2.jpg') }}" alt="service-image">
                </div>
                <div class="d-flex">
                  <div class="ts-service-box-img">
                    <div class="card-date"><span>04</span><br>Abril</div>
                  </div>
                  <div class="ts-service-info">
                      <h3 class="service-box-title"><a href="noticiaeventoactividad.html">Paro Nacional Indefinido</a></h3>
                      <p>You have ideas, goals, and dreams. We have a culturally diverse, forward thinking team looking for talent like. Lorem ipsum dolor suscipit.</p>
                      <a class="learn-more d-inline-block" href="noticiaeventoactividad.html" aria-label="service-details"><i class="fa fa-caret-right"></i> Leer más</a>
                  </div>
                </div>
            </div><!-- Service2 end -->
          </div><!-- Col 2 end -->
  
          <div class="col-lg-4 col-md-6 mb-5">
            <div class="ts-service-box">
                <div class="ts-service-image-wrapper">
                  <img loading="lazy" class="w-100" src="{{ asset('constra/images/paro1.webp') }}" alt="service-image">
                </div>
                <div class="d-flex">
                  <div class="ts-service-box-img">
                    <div class="card-date"><span>25</span><br>December</div>
                  </div>
                  <div class="ts-service-info">
                      <h3 class="service-box-title"><a href="noticiaeventoactividad.html">Paro Nacional Indefinido</a></h3>
                      <p>You have ideas, goals, and dreams. We have a culturally diverse, forward thinking team looking for talent like. Lorem ipsum dolor suscipit.</p>
                      <a class="learn-more d-inline-block" href="noticiaeventoactividad.html" aria-label="service-details"><i class="fa fa-caret-right"></i> Leer más</a>
                  </div>
                </div>
            </div><!-- Service3 end -->
          </div><!-- Col 3 end -->
      </div><!-- Content row end -->
      <div class="general-btn text-center mt-4">
        <a class="btn btn-primary" href="noticias.html">Más Noticias</a>
    </div>
    </div><!-- Container end -->
    <!--/ Container end -->
  </section><!-- Facts end -->
  
  <section id="news" class="news">
    <div class="container">
      <div class="row text-center">
          <div class="col-12">
            <h3 class="section-sub-title">EVENTOS</h3>
          </div>
      </div>
      <!--/ Title row end -->
  
      <div class="row">
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="latest-post">
                <div class="latest-post-media">
                  <a href="noticiaeventoactividad.html" class="latest-post-img">
                      <img loading="lazy" class="img-fluid" src="{{ asset('constra/images/paro1.webp') }} " alt="img">
                  </a>
                </div>
                <div class="post-body">
                  <h4 class="post-title">
                      <a href="noticiaeventoactividad1.html" class="d-inline-block">Paro Nacional Indefinido</a>
                  </h4>
                  <div class="latest-post-meta">
                      <span class="post-item-date">
                        <i class="fa fa-clock-o"></i> Abril 03, 2022
                      </span>
                  </div>
                </div>
            </div><!-- Latest post end -->
          </div><!-- 1st post col end -->
  
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="latest-post">
                <div class="latest-post-media">
                  <a href="noticiaeventoactividad.html" class="latest-post-img">
                      <img loading="lazy" class="img-fluid" src="{{ asset('constra/images/paro2.jpg') }} " alt="img">
                  </a>
                </div>
                <div class="post-body">
                  <h4 class="post-title">
                      <a href="noticiaeventoactividad2.html" class="d-inline-block">Paro Nacional Indefinido</a>
                  </h4>
                  <div class="latest-post-meta">
                      <span class="post-item-date">
                        <i class="fa fa-clock-o"></i> Abril 03, 2022
                      </span>
                  </div>
                </div>
            </div><!-- Latest post end -->
          </div><!-- 2nd post col end -->
  
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="latest-post">
                <div class="latest-post-media">
                  <a href="noticiaeventoactividad.html" class="latest-post-img">
                      <img loading="lazy" class="img-fluid" src="{{ asset('constra/images/paro1.webp') }}" alt="img">
                  </a>
                </div>
                <div class="post-body">
                  <h4 class="post-title">
                      <a href="noticiaeventoactividad2.html" class="d-inline-block">Paro Nacional Indefinido</a>
                  </h4>
                  <div class="latest-post-meta">
                      <span class="post-item-date">
                        <i class="fa fa-clock-o"></i> Abril 3, 2022
                      </span>
                  </div>
                </div>
            </div><!-- Latest post end -->
          </div><!-- 3rd post col end -->
      </div>
      <!--/ Content row end -->
  
      <div class="general-btn text-center mt-4">
          <a class="btn btn-primary" href="eventos.html">Más Eventos</a>
      </div>
  
    </div>
    <!--/ Container end -->
  </section>
  <!--/ News end -->
  
  <section id="project-area" class="project-area solid-bg">
    <div class="container">
      <div class="row text-center">
        <div class="col-lg-12">
          <h3 class="section-sub-title">SERVICIOS</h3>
        </div>
      </div>
      <!--/ Title row end -->
  
      <div class="row">
        <div class="col-14">
          <div class="shuffle-btn-group">
            <label class="active" for="all">
              <input type="radio" name="shuffle-filter" id="all" value="all" checked="checked">Todos
            </label>
            <label for="servicentro">
              <input type="radio" name="shuffle-filter" id="servicentro" value="servicentro" >Servicentro
            </label>
            <label for="agropecuaria">
              <input type="radio" name="shuffle-filter" id="agropecuaria" value="agropecuaria">Agropecuaria
            </label>
            <label for="transporte">
              <input type="radio" name="shuffle-filter" id="transporte" value="transporte">Transporte
            </label>
            <label for="cantera">
              <input type="radio" name="shuffle-filter" id="cantera" value="cantera">Cantera
            </label>
            <label for="agroveterinaria">
              <input type="radio" name="shuffle-filter" id="agroveterinaria" value="agroveterinaria">Agroveterinaria
            </label>
            <label for="turismo">
              <input type="radio" name="shuffle-filter" id="turismo" value="turismo">Turismo
            </label>
            <label for="forestacion">
              <input type="radio" name="shuffle-filter" id="forestacion" value="forestacion">Forestación
            </label>
          </div><!-- project filter end -->
  
  
          <div class="row shuffle-wrapper">
            <div class="col-1 shuffle-sizer"></div>
  
            <div class="col-lg-4 col-sm-6 shuffle-item" data-groups="[&quot;servicentro&quot;]">
              <div class="project-img-container">
                <a class="gallery-popup" href=" {{ asset('constra/images/projects/project1.jpg') }}" aria-label="project-img">
                  <img class="img-fluid" src=" {{ asset('constra/images/projects/project1.jpg') }}" alt="project-img">
                  <span class="gallery-icon"><i class="fa fa-plus"></i></span>
                </a>
                <div class="project-item-info">
                  <div class="project-item-info-content">
                    <h3 class="project-item-title">
                      <a href="gasolinera.html">Gasolinera</a>
                    </h3>
                    <p class="project-cat">Servicentro</p>
                  </div>
                </div>
              </div>
            </div><!-- shuffle item 1 end -->
  
            <div class="col-lg-4 col-sm-6 shuffle-item" data-groups="[&quot;agropecuaria&quot;]">
              <div class="project-img-container">
                <a class="gallery-popup" href="{{ asset('constra/images/projects/project2.jpg') }}" aria-label="project-img">
                  <img class="img-fluid" src="{{ asset('constra/images/projects/project2.jpg') }}" alt="project-img">
                  <span class="gallery-icon"><i class="fa fa-plus"></i></span>
                </a>
                <div class="project-item-info">
                  <div class="project-item-info-content">
                    <h3 class="project-item-title">
                      <a href="ganaderia.html">Ganaderia</a>
                    </h3>
                    <p class="project-cat">Agropecuaria</p>
                  </div>
                </div>
              </div>
            </div><!-- shuffle item 2 end -->
  
            <div class="col-lg-4 col-sm-6 shuffle-item" data-groups="[&quot;transporte&quot;]">
              <div class="project-img-container">
                <a class="gallery-popup" href="{{ asset('constra/images/projects/project3.jpg') }}" aria-label="project-img">
                  <img class="img-fluid" src="{{ asset('constra/images/projects/project3.jpg') }}" alt="project-img">
                  <span class="gallery-icon"><i class="fa fa-plus"></i></span>
                </a>
                <div class="project-item-info">
                  <div class="project-item-info-content">
                    <h3 class="project-item-title">
                      <a href="projects-single.html">Transporte de material de canteras</a>
                    </h3>
                    <p class="project-cat">Transporte</p>
                  </div>
                </div>
              </div>
            </div><!-- shuffle item 3 end -->
  
            <div class="col-lg-4 col-sm-6 shuffle-item" data-groups="[&quot;cantera&quot;]">
              <div class="project-img-container">
                <a class="gallery-popup" href="{{ asset('constra/images/projects/project4.jpg') }} " aria-label="project-img">
                  <img class="img-fluid" src="{{ asset('constra/images/projects/project4.jpg') }} " alt="project-img">
                  <span class="gallery-icon"><i class="fa fa-plus"></i></span>
                </a>
                <div class="project-item-info">
                  <div class="project-item-info-content">
                    <h3 class="project-item-title">
                      <a href="cantera.html">Cantera</a>
                    </h3>
                    <p class="project-cat">Cantera</p>
                  </div>
                </div>
              </div>
            </div><!-- shuffle item 4 end -->
  
            <div class="col-lg-4 col-sm-6 shuffle-item" data-groups="[&quot;agroveterinaria&quot;]">
              <div class="project-img-container">
                <a class="gallery-popup" href="{{ asset('constra/images/projects/project5.jpg') }} " aria-label="project-img">
                  <img class="img-fluid" src="{{ asset('constra/images/projects/project5.jpg') }} " alt="project-img">
                  <span class="gallery-icon"><i class="fa fa-plus"></i></span>
                </a>
                <div class="project-item-info">
                  <div class="project-item-info-content">
                    <h3 class="project-item-title">
                      <a href="agroveterinaria.html">Kalas Metrorail</a>
                    </h3>
                    <p class="project-cat">Infrastructure</p>
                  </div>
                </div>
              </div>
            </div><!-- shuffle item 5 end -->
  
            <div class="col-lg-4 col-sm-6 shuffle-item" data-groups="[&quot;turismo&quot;]">
              <div class="project-img-container">
                <a class="gallery-popup" href=" {{ asset('constra/images/projects/project6.jpg') }}" aria-label="project-img">
                  <img class="img-fluid" src=" {{ asset('constra/images/projects/project6.jpg') }}" alt="project-img">
                  <span class="gallery-icon"><i class="fa fa-plus"></i></span>
                </a>
                <div class="project-item-info">
                  <div class="project-item-info-content">
                    <h3 class="project-item-title">
                      <a href="turismo.html">Ancraft Avenue House</a>
                    </h3>
                    <p class="project-cat">Residential</p>
                  </div>
                </div>
              </div>
            </div><!-- shuffle item 6 end -->
  
            <div class="col-lg-4 col-sm-6 shuffle-item" data-groups="[&quot;forestacion&quot;]">
              <div class="project-img-container">
                <a class="gallery-popup" href="{{ asset('constra/images/projects/project8.jpg') }} " aria-label="project-img">
                  <img class="img-fluid" src="{{ asset('constra/images/projects/project8.jpg') }} " alt="project-img">
                  <span class="gallery-icon"><i class="fa fa-plus"></i></span>
                </a>
                <div class="project-item-info">
                  <div class="project-item-info-content">
                    <h3 class="project-item-title">
                      <a href="mineria.html">Mineria</a>
                    </h3>
                    <p class="project-cat">Forestación</p>
                  </div>
                </div>
              </div>
            </div><!-- shuffle item 7 end -->
  
            <div class="col-lg-4 col-sm-6 shuffle-item" data-groups="[&quot;servicentro&quot;]">
              <div class="project-img-container">
                <a class="gallery-popup" href="{{ asset('constra/images/projects/project1.jpg') }} " aria-label="project-img">
                  <img class="img-fluid" src="{{ asset('constra/images/projects/project1.jpg') }} " alt="project-img">
                  <span class="gallery-icon"><i class="fa fa-plus"></i></span>
                </a>
                <div class="project-item-info">
                  <div class="project-item-info-content">
                    <h3 class="project-item-title">
                      <a href="projects-single.html">Ancraft Avenue House</a>
                    </h3>
                    <p class="project-cat">Residential</p>
                  </div>
                </div>
              </div>
            </div><!-- shuffle item 8 end -->
  
            <div class="col-lg-4 col-sm-6 shuffle-item" data-groups="[&quot;agropecuaria&quot;]">
              <div class="project-img-container">
                <a class="gallery-popup" href="{{ asset('constra/images/projects/project2.jpg') }}" aria-label="project-img">
                  <img class="img-fluid" src="{{ asset('constra/images/projects/project2.jpg') }}" alt="project-img">
                  <span class="gallery-icon"><i class="fa fa-plus"></i></span>
                </a>
                <div class="project-item-info">
                  <div class="project-item-info-content">
                    <h3 class="project-item-title">
                      <a href="projects-single.html">Ancraft Avenue House</a>
                    </h3>
                    <p class="project-cat">Residential</p>
                  </div>
                </div>
              </div>
            </div><!-- shuffle item 9 end -->
          </div><!-- shuffle end -->
        </div>
      </div><!-- Content row end -->
    </div>
    <!--/ Container end -->
  </section><!-- Project area end -->
  
  <section class="subscribe no-padding">
    <div class="container">
      <div class="row">
          <div class="col-md-4">
            <div class="subscribe-call-to-acton">
                <h4>Necesitas algún producto?</h4>
            </div>
          </div><!-- Col end -->
          <div class="col-md-8">
            <div class="ts-newsletter row align-items-center">
              <div class="subscribe-call-to-acton">
                <h4>Contáctanos (43) 444687</h4>
            </div>
            </div><!-- Newsletter end -->
          </div><!-- Col end -->
  
      </div><!-- Content row end -->
    </div>
    <!--/ Container end -->
  </section>
@endsection