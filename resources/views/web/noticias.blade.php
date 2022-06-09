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
  
        <div class="col-lg-8 mb-5 mb-lg-0" data-aos="fade-right">
          @foreach ($noticia as $n)
          <div class="post">
            <div class="post-media post-image">
              <img loading="lazy" src="{{$n->url_imagen}}" class="img-fluid" alt="post-image">
            </div>
            <div class="post-body">
              <div class="entry-header">
                <div class="post-meta">
                  <span class="post-cat">
                    <i class="far fa-folder-open"></i><a href="/noticias"> Noticias</a>
                  </span>
                  <span class="post-meta-date"><i class="far fa-calendar"></i> {{$n->fecha}}</span>
                </div>
                <h2 class="entry-title">
                  <a href="{{ route('noticiaeventoactividad', $n->id) }}">{{$n->titulo}}</a>
                </h2>
              </div><!-- header end -->
  
              <div class="entry-content">
                <p style="width: 400px; white-space: nowrap; text-overflow: ellipsis;
                  overflow: hidden;">{{$n->descripcion}}</p>
              </div>
  
              <div class="post-footer">
                <a href="{{ route('noticiaeventoactividad', $n->id) }}" class="btn btn-primary">Continuar Leyendo</a>
              </div>
  
            </div><!-- post-body end -->
          </div><!-- 1st post end -->
          @endforeach 
  
          <nav class="paging" aria-label="Page navigation example">
            <ul class="pagination">
              <li class="page-item"><a class="page-link" href="#"><i class="fas fa-angle-double-left"></i></a></li>
              <li class="page-item"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item"><a class="page-link" href="#"><i class="fas fa-angle-double-right"></i></a></li>
            </ul>
          </nav>
  
        </div><!-- Content Col end -->
  
        <div class="col-lg-4" data-aos="fade-left">
  
          <div class="sidebar sidebar-right">
            <div class="widget recent-posts">
              <h3 class="widget-title">Noticias Recientes</h3>
              <ul class="list-unstyled">
                @foreach ($noticianuevas as $nn)
                  <li class="d-flex align-items-center">
                    <div class="posts-thumb">
                      <a href="{{ route('noticiaeventoactividad', $nn->id) }}"><img loading="lazy" alt="img" src="{{$nn->url_imagen}}"></a>
                    </div>
                    <div class="post-info">
                      <h4 class="entry-title">
                        <a href="{{ route('noticiaeventoactividad', $nn->id) }}">{{$nn->titulo}}</a>
                      </h4>
                    </div>
                  </li><!-- 1st post end-->
                @endforeach
  
              </ul>  
            </div><!-- Recent post end -->
          </div><!-- Sidebar end -->
        </div><!-- Sidebar Col end -->  
      </div><!-- Main row end -->  
    </div><!-- Container end -->
  </section><!-- Main container end -->
@endsection