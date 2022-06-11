@extends('layouts.web')
@section('contenido')
  @foreach ($banner as $b)
    <div id="banner-area" class="banner-area" style="background-image:url({{$b->url_imagen}})">
      <div class="banner-text">
        <div class="container">
            <div class="row">
              <div class="col-lg-12">
                  <div class="banner-heading">
                    <h1 class="banner-title">Transporte de materiales</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                          <li class="breadcrumb-item"><a href="#">Servicios</a></li>
                          <li class="breadcrumb-item"><a href="#">Servicentro</a></li>
                          <li class="breadcrumb-item active" aria-current="page">Transporte de materiales</li>
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
                <li><a href="/serviciosprincipaltransporte">Detalles</a></li>
                <li><a href="/serviciosofertadostransporte">Productos</a></li>
                <li class="active"><a href="/serviciosadquirirtransporte">Como adquirir el servicio</a></li>
                <li><a href="/serviciocontactotransporte">Personal</a></li>
              </ul>
            </div><!-- Widget end -->
  
          </div><!-- Sidebar end -->
        </div><!-- Sidebar Col end -->
  
        <div class="col-xl-8 col-lg-8">
          <div class="content-inner-page">
            <div class="row">
              <div class="col-md-14">
                <h3 class="column-title-small">Como adquirir el servicio</h3>
  
                <p>Para adquirir el servicio tiene que seguir los siguientes pasos:</p>
                <ul class="list-arrow">
                  <li>Para adquirir el servicio se tiene que enviar solicitud por mesa de partes.</li>
                  <li>Una vez recepcionada la solicitud esta se envía para que la revisen.</li>
                  <li>El tiempo de respuesta es de máximo una semana.</li>
                  <li>Una vez enviada la respuesta contactarse o acercarse a las oficinas de la comunidad.</li>
                  <li>Los pagos se pueden realizar en efectivo o con tarjeta.</li>
                </ul>
              </div>  
            </div>
          </div><!-- Content inner end -->
        </div><!-- Content Col end -->
  
  
      </div><!-- Main row end -->
    </div><!-- Conatiner end -->
  </section><!-- Main container end -->
@endsection