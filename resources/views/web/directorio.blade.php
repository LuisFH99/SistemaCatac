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
          </div>
        </div>
    </div>
  </div>
</div>
@endforeach


  <section id="main-container" class="main-container">
    <div class="container">
      
      <form method="get" >
        <div class="col-lg-6" style="margin-bottom: 2%">
          <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
            <input type="text" name="buscar" class="form-control" placeholder="Buscar Integrante..."  value="{{$buscar}}">
          </div><br>
        </div>
      </form>

      <div class="row" style="margin-top: 0%">
        @if ($funcionarios->count())
          @foreach ($funcionarios as $f)
          <div class="col-lg-3 col-md-4 col-sm-6 mb-5"> 
            <div id="zoom" class="card ts-team-wrapper ml-0">

              <div class="team-img-wrapper">
                <img  loading="lazy" src="{{$f->url_imagen}}" style="width: 330px;height: 330px;align-content: center" class="img-fluid rounded mt-0 " alt="team-img">
              </div>

              <div class="ts-team-content-classic mb-4 m-2">
                <p class="ts-name" style="font-size: 88%; font-weight: bolder">{{$f->apep}} {{$f->apem}} {{$f->name}}</p>
                <!-- <p class="ts-designation">Oficina: {{$f->nombre}}</p> -->
                <p class="ts-designation">Organo: {{$f->organo}}</p>
                <p class="ts-designation">Cargo: {{$f->cargo }}</p>
                <div class="team-social-icons">
                  <a style="cursor: pointer"><i class="fas fa-at" style="color: #64dd17"> {{$f->email}}</i></a><br>
                  <a style="cursor: pointer"><i class="fab fa-whatsapp" style="color: #64dd17"> {{$f->telefono}}</i></a><br>
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <a class="link-secondary mb-0" href="perfiles/{{$f->id}}"><strong>Perfil <i class="fas fa-arrow-circle-right" style="color: greenyellow"></i></strong></a>  
                </div> 
              </div>

            </div>
          </div>
          @endforeach
        @else
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <img src="{{ url('img\not-found.png') }}" alt="">
        @endif


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
        </div>
    </div>
  </section>
@endsection