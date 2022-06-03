@extends('layouts.web')
@section('contenido')
@foreach ($banner as $b)
<div id="banner-area" class="banner-area" style="background-image:url({{$b->url_imagen}});">
  <div class="banner-text">
    <div class="container">
        <div class="row">
          <div class="col-lg-12">
              <div class="banner-heading">
                <h1 class="banner-title">{{$b->titulo}}</h1>
                <h1 class="banner-subtitle">{{$b->subtitulo}}</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                      <li class="breadcrumb-item"><a href="#">Comunidad</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Misión y Visión</li>
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
        @foreach ($organos as $o)
          <div class="col-lg-12" style="text-align: justify;">
            <h3 class="column-title" style="text-align: center">{{$o->nombre}}</h3>
            <p style="text-align: justify">{{$o->descripcion}}</p><br>
          </div><!-- Col end -->
        @endforeach

  
          <div class="col-lg-12" style="text-align: justify;">
            <h4 class="column-title">Lista de los Miembros</h4>
          </div>
      </div><!-- Content row end -->
  
      <div class="row" style="margin-top: 0%">
        @foreach ($funcionarios as $f)
        <div class="col-lg-3 col-md-4 col-sm-6 mb-5">
          <div class="ts-team-wrapper">
            <div class="team-img-wrapper">
              <img loading="lazy" src="{{ url($f->url_imagen) }}" style="width: 300px;height: 350px;" class="img-fluid rounded" alt="team-img">
            </div>
            <div class="ts-team-content-classic">
              <h3 class="ts-name">{{$f->apep}} {{$f->apem}} {{$f->name}}</h3>
              <p class="ts-designation">Cargo: {{$f->cargo}}</p>
              <p class="ts-description">Sus funciones son Nats Stenman began his career in construction with boots on the ground</p>
              <div class="team-social-icons">
                <a><i class="fas fa-at"> {{$f->email}}</i></a>
                <a><i class="fab fa-whatsapp"> {{$f->telefono}}</i></a><br><br>
                <a class="link-secondary" href="perfiles/{{$f->id}}"><strong>Ver Perfil Profesional <i class="fas fa-arrow-circle-right"></i></strong></a>              
              </div>
              <!--/ social-icons-->
            </div>
          </div>
          <!--/ Team wrapper 3 end -->
        </div><!-- Col end -->
             
        @endforeach

        <div class="col-lg-12 mb-5 mb-lg-0">
          <nav aria-label="Page navigation example">
              <ul class="pagination justify-content-center">
                <li  class="page-item">{{ $funcionarios->links() }}</li>
              </ul>
          </nav>
        </div>  
      </div><!-- Content row end -->
    </div><!-- Container end -->
  </section><!-- Main container end -->
@endsection