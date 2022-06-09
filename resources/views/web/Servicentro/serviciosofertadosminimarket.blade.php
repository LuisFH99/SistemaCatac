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
                <li class="active"><a href="/serviciosofertadosminimarket">Productos</a></li>
                <li><a href="/serviciosadquirirminimarket">Como comprar</a></li>
                <li><a href="/serviciocontactominimarket">Personal</a></li>
              </ul>
            </div><!-- Widget end -->
  
          </div><!-- Sidebar end -->
        </div><!-- Sidebar Col end -->
  
        <div class="col-xl-9 col-lg-9 row row-cols-1 row-cols-sm-2 row-cols-md-2 g-3" style="text-align: justify">
          @foreach ($producto as $p)
          <div class="col">
            <div class="card shadow-sm mb-3 ">
              <img loading="lazy" class="img-fluid rounded p-1" src="{{ asset($p->url_imagen) }}" style="width:400px ; height: 300px;" alt="service-image">            
              <div class="card-body">
                <p class="card-text card-title" style="width: 180px; white-space: nowrap; text-overflow: ellipsis  ;
                overflow: hidden; font-weight: bold">{{strtoupper($p->producto)}}</p>
                <p class="card-text p-2" style="width: 250px; white-space: nowrap; text-overflow: ellipsis  ;
                overflow: hidden;">{{$p->descripcion}}</p>
                  <!-- Button trigger modal -->
                  <center>
                    <button type="button" class="btn btn-primary" style="background: #64cc17;" data-toggle="modal" data-target="#productoModal-{{$p->id}}">
                      Ver mas
                    </button>
                  </center>
                  <!-- Modal -->
                  <div class="modal fade" id="productoModal-{{$p->id}}" tabindex="-1" aria-labelledby="productoModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="productoModalLabel" style="text-align: justify">{{$p->producto}}</h5>
                        </div>
                        <div class="modal-body">
                          {{$p->descripcion}}
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
          </div>            
          @endforeach
        </div>
  
  
      </div><!-- Main row end -->
    </div><!-- Conatiner end -->
  </section><!-- Main container end -->
@endsection