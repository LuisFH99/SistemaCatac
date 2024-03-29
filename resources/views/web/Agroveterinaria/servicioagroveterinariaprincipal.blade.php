@extends('layouts.web')
@section('contenido')
  @foreach ($banner as $b)
    <div id="banner-area" class="banner-area" style="background-image:url({{ asset($b->url_imagen) }})">
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
  @endforeach
  
  <section id="main-container" class="main-container">
    <div class="container">
      <div class="row">
  
        <div class="col-xl-3 col-lg-4">
          <div class="sidebar sidebar-left">
            <div class="widget">
              <h3 class="widget-title">Opciones</h3>
              <ul class="nav service-menu">
                <li class="active"><a href="/serviciosprincipalagroveterinaria">Detalles</a></li>
                <li><a href="/serviciosofertadosagroveterinaria">Productos</a></li>
                <li><a href="/serviciosadquiriragroveterinaria">Como comprar</a></li>
                <li><a href="/serviciocontactoagroveterinaria">Personal</a></li>
              </ul>
            </div><!-- Widget end -->
  
          </div><!-- Sidebar end -->
        </div><!-- Sidebar Col end -->
  
        <div class="col-xl-8 col-lg-8" style="text-align: justify">
          <div class="content-inner-page">

            @foreach ($subservicio as $ss)
            <div class="row">
              <div class="col-md-12">
                <p>{{$ss->descripcion}}</p>
              </div><!-- col end -->
            </div><!-- 1st row end-->
            @endforeach
            <h2 class="column-title mrt-0">Funciones</h2>
            @foreach ($funciones as $f)
            <div class="row"> 
              <div class="col-md-12">
                <ul class="list-arrow">
                  <li>{{$f->funcion}}</li>
                </ul>
              </div>
            </div>
            @endforeach
          </div><!-- Content inner end -->
        </div><!-- Content Col end -->
  
  
      </div><!-- Main row end -->
    </div><!-- Conatiner end -->
  </section><!-- Main container end -->
@endsection