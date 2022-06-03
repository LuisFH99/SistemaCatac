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
                      <li class="breadcrumb-item active" aria-current="page">Organo de direccion</li>
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
      @foreach ($organos as $o)
        <div class="col-lg-12" style="text-align: justify;">
          <h3 class="column-title" style="text-align: center">{{$o->nombre}}</h3>
          <p style="text-align: justify">{{$o->descripcion}}</p><br>
        </div>
      @endforeach

      <div class="col-lg-12" style="text-align: justify;">
          <h4 class="column-title">Lista de los Miembros</h4>
          <form method="get" > 
            <div class="col-lg-6">
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
                <input type="text" name="buscar" class="form-control" placeholder="Buscar Integrante..."  value="{{$buscar}}">
              </div><br>
            </div>
          </form>
      </div>
    </div>

    <div class="row mt-0 ">
      @if ($funcionarios->count())
      @foreach ($funcionarios as $f)
      <div class="col-lg-3 col-md-4 col-sm-6 mb-5 mr-1" style="align-content: center;">
        <div id="zoom" class="card ts-team-wrapper ml-0">

          <div class="team-img-wrapper">
            <img loading="lazy" src="{{ url($f->url_imagen) }}" style="width: 350px;height: 350px;align-content: center" class="img-fluid rounded mt-0" alt="team-img">
          </div>
      
          <div class="ts-team-content-classic mb-4 m-2">
            <p class="ts-name" style="font-size: 88%; font-weight: bolder">{{$f->apep}} {{$f->apem}} {{$f->name}}</p><br>
            <p class="ts-designation">Procedencia: {{$f->lugar_procedencia}}</p><br>
            <div class="team-social-icons">
              <a style="cursor: pointer"><i class="fas fa-at" style="color: black"> <b>{{$f->email}}</b></i></a>
              <a style="cursor: pointer"><i class="fab fa-whatsapp" style="color: black"> <b>{{$f->telefono}}</b></i></a><br><br>
            </div>
          </div>

        </div>
      </div>    
      @endforeach
      <div class="col-lg-12 mb-5 mb-lg-0">
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
              <li  class="page-item">{{ $funcionarios->links() }}</li>
            </ul>
        </nav>
      </div>  
      @else
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <img src="{{ url('img\not-found.png') }}" alt="">
      @endif
    </div>
  </div>
</section>
  
@endsection