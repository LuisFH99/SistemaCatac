@extends('layouts.web')
@section('contenido')
  @foreach ($banner as $b)
    <div id="banner-area" class="banner-area" style="background-image:url({{asset($b->url_imagen)}}) }})">
      <div class="banner-text">
        <div class="container">
            <div class="row">
              <div class="col-lg-12">
                  <div class="banner-heading">
                    <h1 class="banner-title">Noticias</h1>
                    <h1 class="banner-subtitle">Comunidad Campesina de Catac</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                          <li class="breadcrumb-item">Noticias y Eventos</li>
                          <li class="breadcrumb-item active" aria-current="page"><a href="/noticias">Noticias</a></li>
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
  
        <div class="col-lg-8 mb-5 mb-lg-0" style="text-align: justify" data-aos="fade-right">
          @foreach ($noticia as $n)
            <div class="post-content post-single">
                <div class="post-media post-image">
                <img loading="lazy" src="{{asset($n->url_imagen)}}" class="img-fluid" alt="post-image">
                </div>
    
                <div class="post-body">
                <div class="entry-header">
                    <div class="post-meta">
                        <span class="post-cat">
                            <i class="far fa-folder-open"></i><a href="/noticias"> Noticias</a>
                        </span>
                        <span class="post-meta-date"><i class="far fa-calendar"></i>{{$n->fecha}}</span>
                    </div>
                    <h2 class="entry-title">{{$n->titulo}}</h2>
                </div><!-- header end -->
    
                <div class="entry-content">
                    <p>{{$n->descripcion}}</p>
                </div>
    
                <div class="tags-area d-flex align-items-center justify-content-between">
                    <div class="share-items">
                    <ul class="post-social-icons list-unstyled">
                        <li class="social-icons-head">Compartir en:</li>
                        <li><div class="fb-share-button" data-href=" " data-layout="button_count"></div></li>
                    </ul>
                    </div>
                </div>
    
                </div><!-- post-body end -->
            </div><!-- post content end -->
          @endforeach  
  
          <div class="author-box d-nlock d-sm-flex">
            @foreach ($encargado as $e)
              <div class="author-img mb-4 mb-md-0">
                <img loading="lazy" src="{{asset($e->url_imagen)}}" alt="author">
              </div>
              <div class="author-info">
                <h3>{{$e->apell_pat}}&nbsp;{{$e->apell_mat}}&nbsp;{{$e->nombre}}<span>Administrador</span></h3>
                <p class="mb-2">Encargado de ingresar las noticias al portal web</p>
              </div>
            @endforeach
          </div> <!-- Author box end -->
  
          <!-- Post comment start -->
          <div id="comments" class="comments-area">
            <h2>Comentarios</h2>
    
            <div class="fb-comments" data-

            <div id="fb-root"></div>    
                <script> (function(d, s, id){
                    var js, fjs=d.getElementsByTagName (s) [0];
                    if (d.getElementById (id)) return;
                    js=d.createElement(s); js.id=id;
                    js.src=
                    "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.5";
                    fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));
                </script>   
            
            <div class="fb-comments" data-href="http://127.0.0.1:8000/noticiaeventoactividad" data-width="100%" 
                data-numposts="3" data-order-by="reverse_time">
            </div>   
          </div><!-- Post comment end -->
        </div><!-- Content Col end -->
  
        <div class="col-lg-4" data-aos="fade-left">
  
          <div class="sidebar sidebar-right">
            <div class="widget recent-posts">
              <h3 class="widget-title">Noticias nuevas</h3>
              <ul class="list-unstyled">
                @foreach ($noticianuevas as $nn)
                  <li class="d-flex align-items-center">
                    <div class="posts-thumb">
                      <a href="{{ route('noticiaeventoactividad', $nn->id) }}"><img loading="lazy" alt="img" src="{{asset($nn->url_imagen)}}"></a>
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
  
    </div><!-- Conatiner end -->
  </section><!-- Main container end -->
@endsection