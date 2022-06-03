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
          </div>
        </div>
    </div>
  </div>
</div>
@endforeach

<section class="container mt-0">
  <!-- MISION -->
  @foreach ($mision as $m)
    <div  class="row mb-2">
      @if ($m->posicion == 1)
      <div id="transicionderecho" class="card mb-3 rounded shadow-sm" style="max-width: 1700px; max-height: 1200px;">
        <div  class="row no-gutters">
          <div class="col-lg-4 p-2">
            <img src="{{ url($m->url_imagen) }}" class="rounded mt-1" style="width: 100%;">
          </div>
          <div class="col-lg-8">
            <div class="card-body ">
              <h5 class="card-title pt-2" style="font-size: 140%">Mision</h5>
              <br><p class="card-text text-muted pt-4" style="text-align: justify">{{$m->descripcion}}</p>
            </div>
          </div>
        </div>
      </div>
      @else
      <div id="transicionizquierda" class="card mb-3 rounded shadow-sm" style="max-width: 1700px; max-height: 1200px;">
        <div  class="row no-gutters">
          <div class="col-lg-8">
            <div class="card-body">
              <h5 class="card-title pt-2" style="font-size: 140%">Mision</h5>
              <br><p class="card-text text-muted pt-3" style="text-align: justify">{{$m->descripcion}}</p>
            </div>
          </div>
          <div class="col-lg-4 p-2 pb-0">
            <img src="{{ url($m->url_imagen) }}" class="rounded mt-1" style="width: 100%;">
          </div>
        </div>
      </div>
      @endif
    </div> 
  @endforeach 

  <hr style="height: 0.5px;background: yellowgreen">

  <!--VISION -->
  @foreach ($vision as $m)
    <div  class="row mb-2">
      @if ($m->posicion == 1)
      <div id="transicionderecho" class="card mb-3 rounded shadow-sm" style="max-width: 1700px; max-height: 1200px;">
        <div  class="row no-gutters">
          <div class="col-lg-4 p-2">
            <img src="{{ url($m->url_imagen) }}" class="rounded mt-1" style="width: 100%;">
          </div>
          <div class="col-lg-8 p-6">
            <div class="card-body">
              <h5 class="card-title pt-2" style="font-size: 140%">Vision</h5>
              <br><p class="card-text text-muted pt-4" style="text-align: justify">{{$m->descripcion}}</p>
            </div>
          </div>
        </div>
      </div>
      @else
      <div id="transicionizquierda" class="card mb-3 rounded shadow-sm" style="max-width: 1700px; max-height: 1200px;">
        <div  class="row no-gutters">
          <div class="col-lg-8 p-6">
            <div class="card-body">
              <h5 class="card-title pt-2" style="font-size: 140%">Vision</h5>
              <br><p class="card-text text-muted pt-3" style="text-align: justify">{{$m->descripcion}}</p>
            </div>
          </div>
          <div class="col-lg-4 p-2 pb-0">
            <img src="{{ url($m->url_imagen) }}" class="rounded mt-1" style="width: 100%;">
          </div>
        </div>
      </div>
      @endif
    </div> 
  @endforeach
</section>
@endsection