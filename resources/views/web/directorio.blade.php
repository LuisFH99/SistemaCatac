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
                      <li class="breadcrumb-item active" aria-current="page">Directorio</li>
                    </ol>
                </nav>
              </div>
          </div><!-- Col end -->
        </div><!-- Row end -->
    </div><!-- Container end -->
  </div><!-- Banner text end -->
</div><!-- Banner area end --> 
@endforeach

  
  
  <section id="main-container" class="main-container pb-4">
    <div class="container">
      <!--/ Title row end -->
  
      <div class="col-lg-12" style="text-align: justify">
        <p>La Asamblea General es el órgano supremo de la Comunidad. Está constituido por todos los Comuneros y Comuneras Calificados(as) y debidamente inscritos en el Padrón Comunal. Es presidida por un Director de Debates elegido en el mismo acto.</p><br>
      </div><!-- Col end -->
  
      <div class="col-lg-6" style="margin-bottom: 2%">
        <div class="input-group mb-3">
          <span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
          <input type="text" class="form-control" placeholder="Buscar Integrante de la comunidad">
        </div>
      </div><!-- Col end -->
  
      <div class="row" style="margin-top: 0%">
        @foreach ($funcionarios as $f)
        <div class="card col-lg-3 col-md-4 col-sm-6 mb-5 shadow-none p-2 mb-5 bg-light rounded" style="margin: 5px">
          <div  class="ts-team-wrapper">
            <div  class="team-img-wrapper">
              <img  loading="lazy" src="{{$f->url_imagen}}" style="width: 300px;height: 250px;align-content: center" class="img-fluid rounded" alt="team-img">
            </div>
            <div  class=" p-2 ts-team-content-classic rounded" style="margin-top: 2%">
              <h6 class="ts-name">{{$f->apep}} {{$f->apem}} {{$f->name}}</h6><br>
              <p class="ts-designation">Oficina: {{$f->nombre}}</p>
              <p class="ts-designation">Organo: {{$f->organo}}</p>
              <!-- <p class="ts-designation">Cargo Administrativo: {{$f->cargo}}</p>
              <p class="ts-designation">FECHA INICIO: {{$f->fech_inicio}}</p>
              <p class="ts-designation">FECHA FIN: {{$f->fech_fin}}</p> -->
              
              <!-- <p class="ts-description" style="text-align: justify">{{$f->perfil}}</p> -->
              <div class="team-social-icons" style="margin-top: 5%">
                <!-- <a target="_blank" href="#"><i class="fab fa-facebook-f"></i></a> -->
                <!-- <a target="_blank" href="#"><i class="fab fa-twitter"></i></a> -->
                <a style="cursor: pointer"><i class="fas fa-at"> {{$f->email}}</i></a>
                <a style="cursor: pointer"><i class="fab fa-whatsapp"> {{$f->telefono}}</i></a><br><br> 
                <a class="link-secondary" href="perfiles/{{$f->persona}}"><strong>Ver Perfil Prosefional</strong></a>
              </div>  
              <!--/ social-icons-->
            </div>
          </div>
          <!--/ Team wrapper 3 end -->
        </div><!-- Col end -->            
        @endforeach

  <!--
        <div class="col-lg-12 mb-5 mb-lg-0">
          <nav aria-label="Page navigation example">
              <ul class="pagination justify-content-center">
                <li class="page-item"><a class="page-link" href="#"><i class="fas fa-chevron-left"></i></a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">4</a></li>
                <li class="page-item"><a class="page-link" href="#">5</a></li>
                <li class="page-item"><a class="page-link" href="#">6</a></li>
                <li class="page-item"><a class="page-link" href="#">7</a></li>
                <li class="page-item"><a class="page-link" href="#">8</a></li>
                <li class="page-item"><a class="page-link" href="#">9</a></li>
                <li class="page-item"><a class="page-link" href="#">10</a></li>
                <li class="page-item"><a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a></li>
              </ul>
          </nav>
  
        </div> -->
        <div class="col-lg-12 mb-5 mb-lg-0">
          <nav aria-label="Page navigation example">
              <ul class="pagination justify-content-center">
                <li  class="page-item">{{ $funcionarios->links() }}</li>
              </ul>
          </nav>
  
  
  
          
      </div><!-- Content row end -->
    </div><!-- Container end -->
  </section><!-- Main container end -->
@endsection