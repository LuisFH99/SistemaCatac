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
                <li class="active"><a href="/serviciosofertadosturismo">Servicios</a></li>
                <li><a href="/serviciosadquirirturismo">Como comprar</a></li>
                <li><a href="/serviciocontactoturismo">Personal</a></li>
              </ul>
            </div><!-- Widget end -->
  
          </div><!-- Sidebar end -->
        </div><!-- Sidebar Col end -->

        <div class="col-xl-9 col-lg-9 row row-cols-1 row-cols-sm-2 row-cols-md-2 g-3" style="text-align: justify">
          @foreach ($pastoruri as $p)
          <div class="col">
            <div data-aos="zoom-in-left" class="card shadow-sm mb-3 ">
              <img loading="lazy" class="img-fluid rounded p-1" src="{{ asset($p->url_imagen) }}" style="width:400px ; height: 300px;" alt="service-image">            
              <div class="card-body">
                <p class="card-text card-title" style="font-weight: bold">{{strtoupper($p->producto)}}</p>
                <p class="card-text p-2" style="width: 250px; white-space: nowrap; text-overflow: ellipsis  ;
                overflow: hidden;">{{$p->descripcion}}</p>
                <center>
                  <a href="/pastoruri">
                    <button type="button" class="btn btn-primary" style="background: #64cc17;" >
                      Ver mas
                    </button>
                  </a>
                </center>
              </div>
            </div>
          </div>            
          @endforeach
          @foreach ($queshque as $q)
          <div class="col">
            <div data-aos="zoom-in-left" class="card shadow-sm mb-3 ">
              <img loading="lazy" class="img-fluid rounded p-1" src="{{ asset($q->url_imagen) }}" style="width:400px ; height: 300px;" alt="service-image">            
              <div class="card-body">
                <p class="card-text card-title" style="font-weight: bold">{{strtoupper($q->producto)}}</p>
                <p class="card-text p-2" style="width: 250px; white-space: nowrap; text-overflow: ellipsis  ;
                overflow: hidden;">{{$p->descripcion}}</p>
                <center>
                  <a href="/queshque">
                    <button type="button" class="btn btn-primary" style="background: #64cc17;" >
                      Ver mas
                    </button>
                  </a>
                </center>
              </div>
            </div>
          </div>            
          @endforeach
        </div>
  
  
      </div><!-- Main row end -->
    </div><!-- Conatiner end -->
  </section><!-- Main container end -->
@endsection