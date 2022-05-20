@extends('layouts.web')
@section('contenido')
  <div id="banner-area" class="banner-area" style="background-image:url(images/banner/bannerservi.jpg)">
    <div class="banner-text">
      <div class="container">
          <div class="row">
            <div class="col-lg-12">
                <div class="banner-heading">
                  <h1 class="banner-title">Agroveterinaria</h1>
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
                <li class="active"><a href="/serviciosprincipalagroveterinaria">Detalles</a></li>
                <li><a href="/serviciosofertadosagroveterinaria">Servicios</a></li>
                <li><a href="/serviciosadquiriragroveterinaria">Como comprar</a></li>
                <li><a href="/serviciocontactoagroveterinaria">Contacto</a></li>
              </ul>
            </div><!-- Widget end -->
  
          </div><!-- Sidebar end -->
        </div><!-- Sidebar Col end -->
  
        <div class="col-xl-8 col-lg-8">
          <div class="content-inner-page">
  
            <h2 class="column-title mrt-0">Que es?</h2>
  
            <div class="row">
              <div class="col-md-12">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer adipiscing erat eget risus
                  sollicitudin pellentesque et non erat. Maecenas nibh dolor, malesuada et bibendum a, sagittis accumsan
                  ipsum. Pellentesque ultrices ultrices sapien.</p>
              </div><!-- col end -->
            </div><!-- 1st row end-->
  
            <h2 class="column-title mrt-0">Funciones</h2>
            <div class="row"> 
              <div class="col-md-12">
                <ul class="list-arrow">
                  <li>Partnership Strategy tristique eleifend.</li>
                  <li>Opporutnity to work with amet elit a.</li>
                  <li>Saving Time to Deal with commodo iaculis.</li>
                  <li>Leadership skills to manage erat volutpat.</li>
                  <li>Cut cost without sacrificing dolore magna.</li>
                  <li>Automate your business elis tristique.</li>
                </ul>
              </div>
            </div>
          </div><!-- Content inner end -->
        </div><!-- Content Col end -->
  
  
      </div><!-- Main row end -->
    </div><!-- Conatiner end -->
  </section><!-- Main container end -->
@endsection