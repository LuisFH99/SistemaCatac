@extends('layouts.web')
@section('contenido')
  @foreach ($banner as $b)
    <div id="banner-area" class="banner-area" style="background-image:url({{$b->url_imagen}})">
      <div class="banner-text">
        <div class="container">
            <div class="row">
              <div class="col-lg-12">
                  <div class="banner-heading">
                    <h1 class="banner-title">Agroveterinaria</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                          <li class="breadcrumb-item"><a href="#">Servicios</a></li>
                          <li class="breadcrumb-item"><a href="#">Agroveterinaria</a></li>
                        </ol>
                    </nav>
                  </div>
              </div><!-- Col end -->
            </div><!-- Row end -->
        </div><!-- Container end -->
      </div><!-- Banner text end -->
    </div><!-- Banner area end --> 
  @endforeach
  
  <section id="main-container" class="main-container">
    <div class="container">
      <div class="row">
  
        <div class="col-xl-3 col-lg-4">
          <div class="sidebar sidebar-left">
            <div class="widget">
              <h3 class="widget-title">Opciones</h3>
              <ul class="nav service-menu">
                <li><a href="/serviciosprincipalagroveterinaria">Detalles</a></li>
                <li><a href="/serviciosofertadosagroveterinaria">Servicios</a></li>
                <li><a href="/serviciosadquiriragroveterinaria">Como comprar</a></li>
                <li class="active"><a href="/serviciocontactoagroveterinaria">Contacto</a></li>
              </ul>
            </div><!-- Widget end -->
  
          </div><!-- Sidebar end -->
        </div><!-- Sidebar Col end -->
  
        <div class="col-xl-8 col-lg-8">
          <div class="content-inner-page">
            <div class="row">
              <div class="container">          
                @foreach ($encargado as $e)
                <div class="row">
                  <div class="col-lg-7">
                    <div id="page-slider" class="page-slider small-bg">
                      <div class="item">
                        <img loading="lazy" class="img-fluid" src="{{$e->url_imagen}}" style="width: 450px; height: 330px;"/>
                      </div>
                    </div><!-- Page slider end -->
                  </div><!-- Slider col end -->
            
                  <div class="col-lg-4 mt-5 mt-lg-0">          
                    <ul class="project-info list-unstyled">
                      <li>
                        <p class="project-info-label">Nombres y Apellidos:</p>
                        <p class="project-info-content">{{$e->apell_pat}}&nbsp;{{$e->apell_mat}}&nbsp;{{$e->nombre}}</p>
                      </li>
                      <li>
                        <p class="project-info-label">Telefono</p>
                        <p class="project-info-content">+51 {{$e->telefono}}</p>
                      </li>
                      <li>
                        <p class="project-info-label">Correo</p>
                        <p class="project-info-content">{{$e->email}}</p>
                      </li>
                      <li>
                        <p class="project-info-label">Categorías</p>
                        <p class="project-info-content">Commercial, Interiors</p>
                      </li>
                    </ul>
            
                  </div><!-- Content col end -->
            
                </div><!-- Row end -->
                @endforeach            
              </div><!-- Conatiner end -->
            </div><!-- 1st row end-->
          </div>
        </div><!-- Content inner end -->
  
      </div><!-- Main row end -->
    </div><!-- Conatiner end -->
  </section><!-- Main container end -->
@endsection