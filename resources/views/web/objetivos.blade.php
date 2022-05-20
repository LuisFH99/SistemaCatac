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
</div><!-- Banner area end --> 
  @endforeach
  <section style="margin: 2%">
        @foreach ($tipos as $t)
        <h3 class="column-title; text-center">{{$t->tipo}}</h3>
        @endforeach

        @foreach ($ogenerales as $o)
        <div class="row">
          @if ($o->posicion == 1)

          <div class="col-lg-6 shadow-sm p-4 bg-white rounded" style="text-align: justify;height: 250px">
            <p>{{$o->objetivo}} </p>
           </div>
          <div class="col-lg-6 mt-5 mt-lg-0" >
            <div id="page-slider" class="page-slider small-bg">
                <div class="item" style="background-image:url({{$o->url_imagen}});">
                  <div class="container" style="height: 5%">
                      <!-- <div class="box-slider-content">
                        <div class="box-slider-text">
                            <h2 class="box-slide-title">Leadership</h2>
                        </div>    
                      </div> -->
                  </div>
                </div>
            </div>          
          </div>
          @else
          <div class="col-lg-6 mt-5 mt-lg-0">
            <div id="page-slider" class="page-slider small-bg">
                <div class="item" style="background-image:url(constra/images/slider-pages/slide-centro2.jpg)">
                  <div class="container">
                      <!-- <div class="box-slider-content">
                        <div class="box-slider-text">
                            <h2 class="box-slide-title">Leadership</h2>
                        </div>    
                      </div> -->
                  </div>
                </div>
            </div>          
          </div>
          <div class="col-lg-6 shadow-sm p-4 bg-white rounded" style="text-align: justify;">
            <!-- <h3 class="column-title">Mejorar</h3> -->
            <p>{{$o->objetivo}} </p>
           </div>
          @endif
        </div>
        <br><br>     
        @endforeach
        <hr style="height: 0.5px;background: yellowgreen">

        @foreach ($tipos1 as $t)
        <h3 class="column-title; text-center" >{{$t->tipo}}</h3>
        @endforeach

        @foreach ($oespecificos as $o)
        <div class="row">
          @if ($o->posicion == 1)

          <div class="col-lg-6 shadow-sm p-4 bg-white rounded" style="text-align: justify;height: 5%;">
            <p>{{$o->objetivo}} </p>
           </div>
          <div class="col-lg-6 mt-5 mt-lg-0">
            <div id="page-slider" class="page-slider small-bg">
                <div class="item" style="background-image:url({{$o->url_imagen}}); height: 5%">
                  <div class="container">
                      <!-- <div class="box-slider-content">
                        <div class="box-slider-text">
                            <h2 class="box-slide-title">Leadership</h2>
                        </div>    
                      </div> -->
                  </div>
                </div>
            </div>          
          </div>
          @else
          <div class="col-lg-6 mt-5 mt-lg-0">
            <div id="page-slider" class="page-slider small-bg">
                <div class="item" style="background-image:url({{$o->url_imagen}})">
                  <div class="container">
                      <!-- <div class="box-slider-content">
                        <div class="box-slider-text">
                            <h2 class="box-slide-title">Leadership</h2>
                        </div>    
                      </div> -->
                  </div>
                </div>
            </div>          
          </div>
          <div class="col-lg-6 shadow-sm p-4 bg-white rounded" style="text-align: justify;">
            <!-- <h3 class="column-title">Mejorar</h3> -->
            <p>{{$o->objetivo}} </p>
           </div>
          @endif

        </div>
        <br><br>     
        @endforeach
          @foreach ($obejtivos3 as $o)
          <small><p>{{$o->objetivo}}</p></small>                
          @endforeach
      </div><!-- Content row end -->
    </div><!-- Container end -->
  </section><!-- Main container end -->
  
@endsection