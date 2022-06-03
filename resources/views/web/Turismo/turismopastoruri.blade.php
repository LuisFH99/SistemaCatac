@extends('layouts.web')
@section('contenido')
    <center>
        <section id="main-container" class="main-container">    
            <div class="container">            
                @foreach ($pastoruri as $p)
                    <div class="row">
                        <div class="col-lg-0 mb-5 mb-lg-0">
                            <div class="post-content post-single">
                                <div class="post-media post-image">
                                    <center><img loading="lazy" class="img-fluid" src="{{ asset($p->url_imagen) }}" style="width: 950px;height:600px ;" alt="project-image" /></center>
                                </div>                        
                                <div class="post-body">
                                    <div class="entry-header">
                                        <div class="post-meta">
                                            <span class="post-cat">
                                            <i class="far fa-folder-open"></i><a href="/serviciosofertadosturismo"> Servicio Turismo</a>
                                            </span>
                                        </div>
                                        <h2 class="entry-title">
                                            {{$p->producto}}
                                        </h2>
                                    </div><!-- header end -->
                                    <div class="entry-content">
                                        <p style="text-align: justify">{{$p->descripcion}}</p>    
                                    </div><!-- post-body end -->
                                    <div >
                                        <iframe src="https://www.google.com/maps/embed?pb=!1m28!1m12!1m3!1d251497.79999287837!2d-77.4502349645616!3d-9.962790618289453!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e0!4m5!1s0x91a9a4ff32f1cb8f%3A0x2389562e52c38e45!2sPueb%20Catac%2C%2002410!3m2!1d-9.802211!2d-77.430753!4m5!1s0x91a84b53ce00a42f%3A0xb6eae4025254244!2sNevado%20Pastoruri%2C%2002420!3m2!1d-9.930131399999999!2d-77.18951229999999!5e0!3m2!1ses-419!2spe!4v1654097227722!5m2!1ses-419!2spe" 
                                        width="250" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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