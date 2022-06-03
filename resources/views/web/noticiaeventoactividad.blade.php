@extends('layouts.web')
@section('contenido')
    <center>
        <section id="main-container" class="main-container">    
            <div class="container">
                @foreach ($noticia as $n)
                    <div class="row">
                        <div class="col-lg-0 mb-5 mb-lg-0">
                            <div class="post-content post-single">
                                <div class="post-media post-image">
                                    <center><img loading="lazy" class="img-fluid" src="{{asset($n->url_imagen)}}" style="width: 850px;height:500px ;" alt="project-image" /></center>
                                </div>                      
                                <div class="post-body">
                                    <div class="entry-header">
                                        <div class="post-meta">
                                            <span class="post-cat">
                                            <i class="far fa-folder-open"></i><a href="/noticias">Noticias</a>
                                            </span>
                                            <span class="post-meta-date"><i class="far fa-calendar"></i>{{$n->fecha}}</span>
                                        </div>
                                        <h2 class="entry-title">
                                            {{$n->titulo}}
                                        </h2>
                                    </div><!-- header end -->
    
                                    <div class="entry-content">
                                        <p style="text-align: justify">{{$n->descripcion}}</p>                        
    
                                        <div class="tags-area d-flex align-items-center justify-content-between">
                                            <div class="share-items">
                                                <ul class="post-social-icons list-unstyled">
                                                <li class="social-icons-head">Compartir en:</li>
                                                <li><div class="fb-share-button" data-href=" " data-layout="button_count"></div></li>
                                                <li><a href="https://twitter.com/intent/tweet?button_hashtag=share&ref_src=twsrc%5Etfw" data-show-count="false"><i class="fab fa-twitter"></i></a></li>
                                            </div>
                                        </div>
    
                                    </div><!-- post-body end -->
                                </div><!-- post content end -->
    
    
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
                            </div>
                        </div><!-- Sidebar Col end -->
    
                    </div><!-- Main row end -->
                @endforeach
            </div><!-- Conatiner end -->
        </section><!-- Main container end -->
    </center>
@endsection