@extends('layouts.web')
@section('contenido')
  @foreach ($banner as $b)
  <div id="banner-area" class="banner-area" style="background-image:url({{$b->url_imagen}})">
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
  @endforeach
  
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
                <li><a href="/serviciocontactorestaurante">Personal</a></li>
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
                  <li>Ingresar als servicentro comunal y dirigirse al restaurante comunal.</li>
                  <li>Preguntar al encargado si ya se esta atendiendo.</li>
                  <li>Escoger una mesa para sentarse y solicitar la carta de productos que se ofrecen.</li>
                  <li>Llamar al mesero para que tome la orden y esperar que traiga los productos solicitados.</li>
                  <li>Los pagos se hacen en efectivo.</li>
                  <li>Recibir el vuelto, verificar que todo esté bien y luego retirarse.</li>
                </ul>
              </div>  
            </div>
          </div><!-- Content inner end -->
        </div><!-- Content Col end -->
  
  
      </div><!-- Main row end -->
    </div><!-- Conatiner end -->
  </section><!-- Main container end -->
@endsection