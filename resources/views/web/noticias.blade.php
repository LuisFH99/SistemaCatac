@extends('layouts.web')
@section('contenido')
  @foreach ($banner as $b)
    <div id="banner-area" class="banner-area" style="background-image:url({{$b->url_imagen}})">
      <div class="banner-text">
        <div class="container">
            <div class="row">
              <div class="col-lg-12">
                  <div class="banner-heading">
                    <h1 class="banner-title">Noticias</h1>
                    <h1 class="banner-subtitle">Comunidad Campesina de Catac</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                          <li class="breadcrumb-item"><a href="#">Noticias y Eventos</a></li>
                          <li class="breadcrumb-item active" aria-current="page">Noticias</li>
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
        <div class="col-lg-0  mb-5 mb-lg-0 order-0 order-lg-1">          
            <div class="row row-cols-1 row-cols-md-2">
              @foreach ($noticia as $n)
              <div class="col mb-4">                
                <div class="card">
                  <img src="{{$n->url_imagen}}" class="card-img-top" alt="..." style="width: 553px; height: 300px;">
                  <div class="card-body">
                    <div class="post-meta">
                      <span class="post-cat">
                        <i class="far fa-folder-open"></i><a href="/noticias"> Noticias</a>
                      </span>
                      <span class="post-meta-date"><i class="far fa-calendar"></i> {{$n->fecha}}</span>
                    </div>
                    <h5 class="card-title"><a href="{{ route('noticiaeventoactividad', $n->id) }}">{{$n->titulo}}</a></h5>
                    <p class="card-text" style="width: 400px; white-space: nowrap; text-overflow: ellipsis;
                    overflow: hidden;">{{$n->descripcion}}</p>
                  </div>
                </div>
              </div>
              @endforeach 
            </div> 
        </div><!-- Content Col end --> 
      </div><!-- Main row end -->  
    </div><!-- Container end -->
  </section><!-- Main container end -->
@endsection