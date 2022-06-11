@extends('layouts.web')
@section('contenido')
@foreach ($banner as $b)
<div id="banner-area" class="banner-area" style="background-image:url({{$b->url_imagen}})">
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
                        <li class="breadcrumb-item active" aria-current="page">Objetivos Institucionales</li>
                      </ol>
                  </nav>
                </div>
            </div><!-- Col end -->
          </div><!-- Row end -->
      </div><!-- Container end -->
    </div><!-- Banner text end --> 
</div>
@endforeach

  <section class="container mt-0">
        @foreach ($tipos as $t)
        <h3 class="column-title; text-center mt-0" data-aos="fade-zoom-in">{{$t->tipo}}</h3>
        @endforeach
        @foreach ($ogenerales as $o)
        <div  class="row mb-2">
          @if ($o->posicion == 1)
          <div data-aos="fade-right" class="card mb-3 rounded shadow-sm" style="max-width: 1700px; max-height: 1200px;">
            <div  class="row no-gutters">
              <div class="col-lg-4 p-2">
                <img src="{{ url($o->url_imagen) }}" class="rounded mt-1" style="width: 100%;">
              </div>
              <div class="col-lg-8">
                <div class="card-body">
                  <h5 class="card-title" >Objetivo General 0{{$con1++}}</h5>
                  <p class="card-text text-muted pt-4" style="text-align: justify">{{$o->objetivo}}</p>
                </div>
              </div>
            </div>
          </div>
          @else
          <div data-aos="fade-left" class="card mb-3 rounded shadow-sm" style="max-width: 1700px; max-height: 1200px;">
            <div  class="row no-gutters">
              <div class="col-lg-8">
                <div class="card-body">
                  <h5 class="card-title" >Objetivo General 0{{$con1++}}</h5>
                  <p class="card-text text-muted pt-3" style="text-align: justify">{{$o->objetivo}}</p>
                </div>
              </div>
              <div class="col-lg-4 p-2 pb-0">
                <img src="{{ url($o->url_imagen) }}" class="rounded mt-1" style="width: 100%;">
              </div>
            </div>
          </div>
          @endif
        </div> 
        @endforeach
        <hr style="height: 0.5px;background: yellowgreen">

        <!-- objetivos especificos -->


        @foreach ($tipos1 as $t)
        <h3 class="column-title; text-center" data-aos="fade-zoom-in">{{$t->tipo}}</h3>
        @endforeach

        @foreach ($oespecificos as $o)
        <div class="row">
          @if ($o->posicion == 1)
          <div data-aos="fade-right" class="card mb-3 rounded shadow-sm" style="max-width: 1700px; max-height: 1200px;">
            <div  class="row no-gutters">
              <div class="col-lg-4 p-2">
                <img src="{{ url($o->url_imagen) }}" class="rounded mt-1" style="width: 100%;">
              </div>
              <div class="col-lg-8">
                <div class="card-body">
                  <h5 class="card-title" >Objetivo Especifico 0{{$con++}}</h5>
                  <p class="card-text text-muted pt-4" style="text-align: justify">{{$o->objetivo}}</p>
                </div>
              </div>
            </div>
          </div>
          @else
          <div data-aos="fade-left" class="card mb-3 rounded shadow-sm" style="max-width: 1700px; max-height: 1200px;">
            <div  class="row no-gutters">
              <div class="col-lg-8">
                <div class="card-body">
                  <h5 class="card-title" >Objetivo Especifico 0{{$con++}}</h5>
                  <p class="card-text text-muted pt-3" style="text-align: justify">{{$o->objetivo}}</p>
                </div>
              </div>
              <div class="col-lg-4 p-2 pb-0">
                <img src="{{ url($o->url_imagen) }}" class="rounded mt-1" style="width: 100%;">
              </div>
            </div>
          </div>
          @endif
        </div>  
        @endforeach
        
        @foreach ($obejtivos3 as $o)
        <div class="row">
          @if ($o->posicion == 1)
          <div data-aos="fade-right" class="card mb-3 rounded shadow-sm" style="max-width: 1700px; max-height: 1200px;">
            <div  class="row no-gutters">
              <div class="col-lg-4 p-2">
                <img src="{{ url($o->url_imagen) }}" class="rounded mt-1" style="width: 100%;">
              </div>
              <div class="col-lg-8">
                <div class="card-body">
                  <h5 class="card-title" >Objetivo Especifico 0{{$con++}}</h5>
                  <p class="card-text text-muted pt-4" style="text-align: justify">{{$o->objetivo}}</p>
                </div>
              </div>
            </div>
          </div>
          @else
          <div data-aos="fade-left" class="card mb-3 rounded shadow-sm" style="max-width: 1700px; max-height: 1200px;">
            <div  class="row no-gutters">
              <div class="col-lg-8">
                <div class="card-body">
                  <h5 class="card-title" >Objetivo Especifico 0{{$con++}}</h5>
                  <p class="card-text text-muted pt-3" style="text-align: justify">{{$o->objetivo}}</p>
                </div>
              </div>
              <div class="col-lg-4 p-2 pb-0">
                <img src="{{ url($o->url_imagen) }}" class="rounded mt-1" style="width: 100%;">
              </div>
            </div>
          </div>
          @endif
        </div>        
        @endforeach
      </div>
    </div>
  </section>
  
@endsection