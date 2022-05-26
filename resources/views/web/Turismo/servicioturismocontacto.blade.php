@extends('layouts.web')
@section('contenido')
  <div id="banner-area" class="banner-area" style="background-image:url(images/banner/bannerservi.jpg)">
    <div class="banner-text">
      <div class="container">
          <div class="row">
            <div class="col-lg-12">
                <div class="banner-heading">
                  <h1 class="banner-title">Turismo</h1>
                  <nav aria-label="breadcrumb">
                      <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a href="#">Servicios</a></li>
                        <li class="breadcrumb-item"><a href="#">Turismo</a></li>
                      </ol>
                  </nav>
                </div>
            </div><!-- Col end -->
          </div><!-- Row end -->
      </div><!-- Container end -->
    </div><!-- Banner text end -->
  </div><!-- Banner area end --> 
  
  <section id="main-container" class="main-container">
    <div class="container">
      <div class="row">
  
        <div class="col-xl-3 col-lg-4">
          <div class="sidebar sidebar-left">
            <div class="widget">
              <h3 class="widget-title">Opciones</h3>
              <ul class="nav service-menu">
                <li><a href="/serviciosprincipalturismo">Detalles</a></li>
                <li><a href="/serviciosofertadosturismo">Servicios</a></li>
                <li><a href="/serviciosadquirirturismo">Como comprar</a></li>
                <li class="active"><a href="/serviciocontactoturismo">Contacto</a></li>
              </ul>
            </div><!-- Widget end -->
  
          </div><!-- Sidebar end -->
        </div><!-- Sidebar Col end -->
  
        <div class="col-xl-8 col-lg-8">
          <div class="content-inner-page">
            <div class="row">
              <div class="container">          
                <div class="row">
                  <div class="col-lg-9">
                    <div id="page-slider" class="page-slider small-bg">
                      <div class="item">
                        <img loading="lazy" class="img-fluid" src="images/projects/project7.jpg" alt="project-image" />
                      </div>
                    </div><!-- Page slider end -->
                  </div><!-- Slider col end -->
            
                  <div class="col-lg-3 mt-5 mt-lg-0">          
                    <ul class="project-info list-unstyled">
                      <li>
                        <p class="project-info-label">Nombres y Apellidos:</p>
                        <p class="project-info-content">Antonio Cartagena Almendariz</p>
                      </li>
                      <li>
                        <p class="project-info-label">Localización</p>
                        <p class="project-info-content">McLean, VA</p>
                      </li>
                      <li>
                        <p class="project-info-label">Año de gestión</p>
                        <p class="project-info-content">2022</p>
                      </li>
                      <li>
                        <p class="project-info-label">Categorías</p>
                        <p class="project-info-content">Commercial, Interiors</p>
                      </li>
                    </ul>
            
                  </div><!-- Content col end -->
            
                </div><!-- Row end -->
            
              </div><!-- Conatiner end -->
            </div><!-- 1st row end-->
          </div>
        </div><!-- Content inner end -->
  
      </div><!-- Main row end -->
    </div><!-- Conatiner end -->
  </section><!-- Main container end -->
@endsection