@extends('layouts.web')
@section('contenido')
    <center>
        <section id="main-container" class="main-container">    
            <div class="container">            
                @foreach ($evento as $e)
                    <div class="row">
                        <div class="col-lg-0 mb-5 mb-lg-0">
                            <div class="post-content post-single">
                                <div class="post-media post-image">
                                    <center><img loading="lazy" class="img-fluid" src="{{ asset($e->url_imagen) }}" style="width: 850px;height:500px ;" alt="project-image" /></center>
                                </div>                        
                                <div class="post-body">
                                    <div class="entry-header">
                                        <div class="post-meta">
                                            <span class="post-cat">
                                            <i class="far fa-folder-open"></i><a href="/eventos"> Eventos</a>
                                            </span>
                                            <span class="post-meta-date"><i class="far fa-calendar"></i> {{$e->fecha}}</span>
                                        </div>
                                        <h2 class="entry-title">
                                            {{$e->titulo}}
                                        </h2>
                                    </div><!-- header end -->
                                    <div class="entry-content">
                                        <p style="text-align: justify">{{$e->descripcion}}</p>    
                                    </div><!-- post-body end -->
                                </div><!-- post content end -->  
                            </div>
                        </div><!-- Sidebar Col end -->
                    </div><!-- Main row end -->
                @endforeach
            </div><!-- Conatiner end -->
        </section><!-- Main container end -->
    </center>
@endsection