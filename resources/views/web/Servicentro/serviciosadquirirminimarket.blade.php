@extends('layouts.web')
@section('contenido')
  @foreach ($banner as $b)
  <div id="banner-area" class="banner-area" style="background-image:url({{$b->url_imagen}})">
    <div class="banner-text">
      <div class="container">
          <div class="row">
            <div class="col-lg-12">
                <div class="banner-heading">
                  <h1 class="banner-title">Minimarket</h1>
                  <nav aria-label="breadcrumb">
                      <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a href="#">Servicios</a></li>
                        <li class="breadcrumb-item"><a href="#">Servicentro</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Minimarket</li>
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
                <li><a href="/serviciosprincipalminimarket">Detalles</a></li>
                <li><a href="/serviciosofertadosminimarket">Productos</a></li>
                <li class="active"><a href="/serviciosadquirirminimarket">Como comprar</a></li>
                <li><a href="/serviciocontactominimarket">Personal</a></li>
              </ul>
            </div><!-- Widget end -->
  
          </div><!-- Sidebar end -->
        </div><!-- Sidebar Col end -->
  
        <div class="col-xl-8 col-lg-8">
          <div class="content-inner-page">
            <div class="row">
              <div class="col-md-14">
                <h3 class="column-title-small">Como adquirir el servicio</h3>
  
                <p>Para adquirir el servicio tiene que seguir los siguientes pasos.</p>
                <ul class="list-arrow">
                  <li>Ingresar al establecimiento y revisar los productos que desee adquirir.</li>
                  <li>Preguntar a la encargada del minimarket por si no encuentra el producto que desea.</li>
                  <li>Pedir la cantidad qe desee comprar de determinado producto.</li>
                  <li>Pagar el producto o productos que se adquieran.</li>
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