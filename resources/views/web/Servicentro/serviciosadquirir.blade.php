@extends('layouts.web')
@section('contenido')
  @foreach ($banner as $b)
    <div id="banner-area" class="banner-area" style="background-image:url({{$b->url_imagen}})">
      <div class="banner-text">
        <div class="container">
            <div class="row">
              <div class="col-lg-12">
                  <div class="banner-heading">
                    <h1 class="banner-title">Estación de Servicio</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                          <li class="breadcrumb-item"><a href="#">Servicios</a></li>
                          <li class="breadcrumb-item"><a href="#">Servicentro</a></li>
                          <li class="breadcrumb-item active" aria-current="page">Estación de Servicio</li>
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
                <li><a href="/serviciosprincipal">Detalles</a></li>
                <li><a href="/serviciosofertados">Productos</a></li>
                <li class="active"><a href="/serviciosadquirir">Como comprar</a></li>
                <li><a href="/serviciocontacto">Personal</a></li>
              </ul>
            </div><!-- Widget end -->
  
          </div><!-- Sidebar end -->
        </div><!-- Sidebar Col end -->
  
        <div class="col-xl-8 col-lg-8">
          <div class="content-inner-page">
            <div class="row">
              <div class="col-md-14" style="text-align: justify;">
                <h3 class="column-title-small">Como adquirir el servicio</h3>
  
                <p>Para adquirir el servicio tiene que seguir los siguientes pasos.</p>
                <ul class="list-arrow">
                  <li>Ingresar a la estación de servicio y estacionarse en el lugar donde se expenda el tipo de producto que desea adquirir.</li>
                  <li>Preguntar al grifero si esta disponible ese producto.</li>
                  <li>Apagar el motor para mayor seguridad.</li>
                  <li>Dejar que el grifero acabe el llenado al tanque y proceder a pagar.</li>
                  <li>Los pagos se pueden hacer en efectivo o con tarjeta de crédito.</li>
                  <li>Recibir el vuelto o vaucher, verificar que todo esté bien y luego retirarse.</li>
                </ul>
              </div>  
            </div>
          </div><!-- Content inner end -->
        </div><!-- Content Col end -->
  
  
      </div><!-- Main row end -->
    </div><!-- Conatiner end -->
  </section><!-- Main container end -->
@endsection