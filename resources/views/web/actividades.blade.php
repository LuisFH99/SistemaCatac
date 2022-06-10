 @extends('layouts.web')
 @section('contenido')
  @foreach ($banner as $b)
    <div id="banner-area" class="banner-area" style="background-image:url({{$b->url_imagen}})">
      <div class="banner-text">
        <div class="container">
            <div class="row">
              <div class="col-lg-12">
                  <div class="banner-heading">
                    <h1 class="banner-title">Actividades Programadas</h1>
                    <h1 class="banner-subtitle">Comunidad Campesina de Catac</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                          <li class="breadcrumb-item"><a href="#">Noticias y Eventos</a></li>
                          <li class="breadcrumb-item active" aria-current="page">Actividades Programadas</li>
                        </ol>
                    </nav>
                  </div>
              </div>
            </div>
        </div>
      </div>
    </div>
  @endforeach 
  
  <section id="main-container" class="main-container">
    
    <div class="container">
      <div class="row">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 g-3">
          @foreach ($comunicado as $n)
          <div class="col">
            <div data-aos="flip-right" class="card shadow-sm mb-3 ">
              <img loading="lazy" class="img-fluid rounded p-1" src="{{ asset($n->url_imagen) }}" style="width:555px ; height: 350px;" alt="service-image">            
              <div class="card-body">
                <p class="card-text card-title" style="font-weight: bold ">{{strtoupper($n->titulo)}}</p>
                <p class="card-text p-2" style="width: 350px; white-space: nowrap; text-overflow: ellipsis  ;
                overflow: hidden;">{{$n->descripcion}}</p>              
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-outline-secondary"><i class="fas fa-calendar-alt"></i></button>
                    <a type="button" class="btn btn-sm btn-outline-secondary">{{$n->fecha}}</a>
                  </div>
                  <small class="text-muted"> <a class="learn-more d-inline-block" href="{{ route('actividadindividual', $n->id) }}" aria-label="service-details"><i class="fa fa-caret-right"></i> <b>Leer más</b></a></small>
                </div>
              </div>
            </div>
          </div>            
          @endforeach
        </div> 
      </div><!-- Main row end -->  
    </div><!-- Container end -->
  </section><!-- Main container end -->
@endsection