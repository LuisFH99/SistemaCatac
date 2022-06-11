@extends('layouts.web')
@section('contenido')
  @foreach ($banner as $b)
    <div id="banner-area" class="banner-area" style="background-image:url({{ asset('$b->url_imagen') }})">
      <div class="banner-text">
        <div class="container">
            <div class="row">
              <div class="col-lg-12">
                  <div class="banner-heading">
                    <h1 class="banner-title">Eventos</h1>
                    <h1 class="banner-subtitle">Comunidad Campesina de Catac</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                          <li class="breadcrumb-item"><a href="#">Noticias y Eventos</a></li>
                          <li class="breadcrumb-item active" aria-current="page">Eventos</li>
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
        <div class="col-lg-4 order-1 order-lg-0" data-aos="fade-right">  
          <div class="sidebar sidebar-left">
            <div class="widget recent-posts">
              <h3 class="widget-title">Eventos Recientes</h3>
              <ul class="list-unstyled">
                @foreach ($eventosnuevos as $en)
                  <li class="d-flex align-items-center">
                    <div class="posts-thumb">
                      <a href="#"><img loading="lazy" alt="img" src="{{ asset($en->url_imagen) }}"></a>
                    </div>
                    <div class="post-info">
                      <h4 class="entry-title">
                        <a href="{{ route('eventoindividual', $en->id) }}">{{$en->titulo}}</a>
                      </h4>
                    </div>
                  </li><!-- 1st post end-->
                @endforeach  
              </ul>
  
            </div><!-- Recent post end -->
  
  
          </div><!-- Sidebar end -->
        </div><!-- Sidebar Col end -->
  
        <div class="col-lg-8 mb-5 mb-lg-0 order-0 order-lg-1" data-aos="fade-left">
          @foreach ($evento as $e)
          <div class="post">
            <div class="post-media post-image">
              <img loading="lazy" src="{{ asset($e->url_imagen) }}" class="img-fluid" alt="post-image">
            </div>
  
            <div class="post-body">
              <div class="entry-header">
                <div class="post-meta">
                  <span class="post-cat">
                    <i class="far fa-folder-open"></i><a href="/eventos"> Eventos</a>
                  </span>
                  <span class="post-meta-date"><i class="far fa-calendar"></i>{{$e->fecha}}</span>
                </div>
                <h2 class="entry-title">
                  {{$e->titulo}}
                </h2>
              </div><!-- header end -->
  
              <div class="entry-content">
                <p>{{$e->descripcion}}</p>
              </div>  
            </div><!-- post-body end -->
          </div><!-- 1st post end -->
          @endforeach 
  
        </div><!-- Content Col end -->
  
      </div><!-- Main row end -->
  
    </div><!-- Container end -->
  </section><!-- Main container end -->
@endsection