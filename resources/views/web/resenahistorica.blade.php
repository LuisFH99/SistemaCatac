@extends('layouts.web')
@section('contenido')
    <!--/ Header end -->
@foreach ($banner as $b) 
<div id="banner-area" class="banner-area" style="background-image:url({{$b->url_imagen}})">
    <div class="banner-text">
      <div class="container">
          <div class="row">
            <div class="col-lg-12">
                <div class="banner-heading">
                  <h1 class="banner-title">{{$b->titulo}}</h1>
@endforeach
                  <h1 class="banner-subtitle">Comunidad Campesina de Catac</h1>
                  <nav aria-label="breadcrumb">
                      <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a href="#">Comunidad</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Reseña Histórica</li>
                      </ol>
                  </nav>
                </div>
            </div>
          </div>
      </div>
    </div>
  </div>
  
  <section style="margin:5%">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 mt-5 mt-lg-0">
          <div id="page-slider" class="page-slider small-bg">
            @foreach ($slider as $s)
              <div class="item" style="background-image:url({{$s->url_imagen}})">
                <div class="container">
                  <!-- <div class="box-slider-content">
                      <div class="box-slider-text">
                          <h2 class="box-slide-title">Leadership</h2> 
                      </div>    
                    </div> -->
                </div>
              </div>
            @endforeach
          </div>     
        </div>
          <div class="col-lg-12"><br><br>
            @foreach ($historia as $h)
                <div class="col-lg-12 shadow-sm p-4 bg-white rounded" style="text-align: justify;">
                  <h3 class="column-title" style="color: #cc5c34"><center>{{$h->titulo}}</center></h3>
                  <p style=" text-muted text-align: justify">{{$h->descripcion}}</p>  
                </div>
            @endforeach
        </div>
      </div>
    </div>
  </section>
@endsection