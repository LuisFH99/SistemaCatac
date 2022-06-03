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
  
        <div class="col-xl-9 col-lg-9" style="text-align: justify">
          <div class="content-inner-page">
            @foreach ($pastoruri as $p)
            <div class="row" >
              <div class="card mb-3" style="width: 850px; height: 185px;">
                <div class="row no-gutters">
                  <div class="col-md-4" >
                    <img src="{{$p->url_imagen}}" alt="..." style="width: 260pX; height: 183px;">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title">{{$p->producto}}</h5>
                      <p class="card-text" style="width: 400px; white-space: nowrap; text-overflow: ellipsis;
                      overflow: hidden;">{{$p->descripcion}}</p>
                    </div>
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
            </div><!-- 1st row end-->
            @endforeach
            @foreach ($queshque as $q)
            <div class="row" >
              <div class="card mb-3" style="width: 850px; height: 185px;">
                <div class="row no-gutters">
                  <div class="col-md-4" >
                    <img src="{{$q->url_imagen}}" alt="..." style="width: 260pX; height: 183px;">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title">{{$q->producto}}</h5>
                      <p class="card-text" style="width: 400px; white-space: nowrap; text-overflow: ellipsis;
                      overflow: hidden;">{{$q->descripcion}}</p>
                    </div>
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
            </div><!-- 1st row end-->
            @endforeach
            <div class="gap-40"></div>
          </div><!-- Content inner end -->
        </div><!-- Content Col end -->
  
  
      </div><!-- Main row end -->
    </div><!-- Conatiner end -->
  </section><!-- Main container end -->
@endsection