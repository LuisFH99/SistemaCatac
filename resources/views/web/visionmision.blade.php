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

<section style="margin:3%">
  <!-- MISION -->
  @foreach ($mision as $m)
  
      <div  id="transicionderecho" class="row" style="margin-bottom: 5%">
        @if ($m->posicion == 1)
        <div class="col-lg-6 shadow-sm p-4 bg-white"  style="text-align: justify;border-radius: 10px;">
          <div class="col-lg-12"><h3 class="column-title text-center">Mision</h3></div>    
          <div class="col-lg-12 text-muted"><p>{{$m->descripcion}}</p> </div>
        </div>
        <div class="col-lg-6 mt-5 mt-lg-0">
        <div id="page-slider"  class="page-slider small-bg">
            <div class="item rounded img-fluid" style="background-image:url({{$m->url_imagen}});width: 50%; height: 50%">
                <div class="container"></div> 
            </div>
          </div> 
                   
        </div>

        
        @else
        <div class="col-lg-6 mt-5 mt-lg-0">
          <div id="page-slider" class="page-slider small-bg">
              <div class="item rounded" style="background-image:url({{$m->url_imagen}});width: 50%; height: 50%">
                  <div class="container"></div> 
              </div>
            </div>          
          </div>
        <div class="col-lg-6 shadow-sm p-4 bg-white" style="text-align: justify;border-radius: 10px;">
          <div class="col-lg-12"><h3 class="column-title text-center">Misión</h3></div>    
          <div class="col-lg-12 text-muted"><p>{{$m->descripcion}}</p></div>
        </div>
        @endif
      </div>
  @endforeach 
  <hr style="height: 0.5px;background: yellowgreen">
  <!--VISION -->
  @foreach ($vision as $m)
  <div class="row" id="transicionizquierda" style="margin-bottom: 5%">
    @if ($m->posicion == 1)
    <div class="col-lg-6 shadow-sm p-4 bg-white" style="text-align: justify;border-radius: 10px;border: blue">
      <div class="col-lg-12"><h3 class="column-title text-center">Vision</h3></div>    
      <div class="col-lg-12 text-muted"><p>{{$m->descripcion}}</p></div>
    </div>
    <div class="col-lg-6 mt-5 mt-lg-0">
    <div id="page-slider" class="page-slider small-bg">
        <div class="item rounded" style="background-image:url({{$m->url_imagen}})">
            <div class="container"></div> 
        </div>
      </div>          
    </div>
    @else
    <div class="col-lg-6 mt-5 mt-lg-0">
      <div id="page-slider" class="page-slider small-bg">
          <div class="item rounded" style="background-image:url({{$m->url_imagen}})">
              <div class="container"></div> 
          </div>
        </div>          
      </div>
    <div class="col-lg-6 shadow-sm p-4 bg-white rounded" style="text-align: justify;border-radius: 10px;border: blue">
      <div class="col-lg-12"><h3 class="column-title text-center">Vision</h3></div>    
      <div class="col-lg-12 text-muted"><p>{{$m->descripcion}}</p></div>
    </div>
    @endif
  </div>
@endforeach
</section><!-- Main container end -->
@endsection