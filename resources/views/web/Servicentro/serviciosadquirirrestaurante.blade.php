@extends('layouts.web')
@section('contenido')
  <div id="banner-area" class="banner-area" style="background-image:url(images/banner/bannerservi.jpg)">
    <div class="banner-text">
      <div class="container">
          <div class="row">
            <div class="col-lg-12">
                <div class="banner-heading">
                  <h1 class="banner-title">Restaurante</h1>
                  <nav aria-label="breadcrumb">
                      <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a href="#">Servicios</a></li>
                        <li class="breadcrumb-item"><a href="#">Servicentro</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Restaurante</li>
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
                <li><a href="/serviciosprincipalrestaurante">Detalles</a></li>
                <li><a href="/serviciosofertadosrestaurante">Servicios</a></li>
                <li class="active"><a href="/serviciosadquirirrestaurante">Como comprar</a></li>
                <li><a href="/serviciocontactorestaurante">Contacto</a></li>
              </ul>
            </div><!-- Widget end -->
  
          </div><!-- Sidebar end -->
        </div><!-- Sidebar Col end -->
  
        <div class="col-xl-8 col-lg-8">
          <div class="content-inner-page">
            <div class="row">
              <div class="col-md-14">
                <h3 class="column-title-small">Como adquirir el servicio</h3>
  
                <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf
                  moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                  Consectetur adipiscing elit. Integer adipiscing erat eget risus sollicitudin pellentesque et non erat
                  tincidunt nunc posuere.</p>
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