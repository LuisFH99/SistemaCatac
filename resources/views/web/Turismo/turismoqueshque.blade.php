@extends('layouts.web')
@section('contenido')
    <center>
        <section id="main-container" class="main-container">    
            <div class="container">            
                @foreach ($queshque as $q)
                    <div class="row">
                        <div class="col-lg-0 mb-5 mb-lg-0">
                            <div class="post-content post-single">
                                <div class="post-media post-image">
                                    <center><img loading="lazy" class="img-fluid" src="{{ asset($q->url_imagen) }}" style="width: 950px;height:600px ;" alt="project-image" /></center>
                                </div>                        
                                <div class="post-body">
                                    <div class="entry-header">
                                        <div class="post-meta">
                                            <span class="post-cat">
                                            <i class="far fa-folder-open"></i><a href="/serviciosofertadosturismo"> Servicio Turismo</a>
                                            </span>
                                        </div>
                                        <h2 class="entry-title">
                                            {{$q->producto}}
                                        </h2>
                                    </div><!-- header end -->
                                    <div class="entry-content">
                                        <p style="text-align: justify">{{$q->descripcion}}</p>    
                                    </div><!-- post-body end -->
                                    <div >
                                        <img src="constra\IMAGENES CARPETA\circuito queshque.jpg" alt="img" style="width: 1000px; height: 600px;">    
                                    </div>
                                </div><!-- post content end -->  
                            </div>
                        </div><!-- Sidebar Col end -->
                    </div><!-- Main row end -->
                @endforeach
            </div><!-- Conatiner end -->
        </section><!-- Main container end -->
    </center>
@endsection