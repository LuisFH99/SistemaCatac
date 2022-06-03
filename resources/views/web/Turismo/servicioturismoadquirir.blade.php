@extends('layouts.web')
@section('contenido')
  @foreach ($banner as $b)
    <div id="banner-area" class="banner-area" style="background-image:url({{$b->url_imagen}})">
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
  @endforeach
  
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
                <li class="active"><a href="/serviciosadquirirturismo">Como comprar</a></li>
                <li><a href="/serviciocontactoturismo">Personal</a></li>
              </ul>
            </div><!-- Widget end -->
  
          </div><!-- Sidebar end -->
        </div><!-- Sidebar Col end -->
  
        <div class="col-xl-8 col-lg-8">
          <div class="content-inner-page">
            <div class="row">
              <div class="col-md-14">
                <h3 class="column-title-small">Como adquirir el servicio</h3>
  
                <p>Para contratar las dos rutas de turismo que se esta manejando tiene:</p>
                <ul class="list-arrow">
                  <li>Ponerse en contacto con el encargado de dicho servicio.</li>
                  <li>Programar el día en el que se realizará el servicio.</li>
                  <li>Todo servicio será de forma guiada y con el(los) responsable(s).</li>
                  <li>Luego realizar el pago del servicio.</li>
                  <li>Todo pago de este servicio se realiza por medio de cobranza.</li>
                </ul>
              </div>  
            </div>
          </div><!-- Content inner end -->
        </div><!-- Content Col end -->
  
  
      </div><!-- Main row end -->
    </div><!-- Conatiner end -->
  </section><!-- Main container end -->
@endsection