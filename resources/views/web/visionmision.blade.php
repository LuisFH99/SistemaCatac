@extends('layouts.web')

@section('contenido')
<div id="banner-area" class="banner-area" style="background-image:url(constra/images/banner/bannerMision.jpg)">
    <div class="banner-text">
      <div class="container">
          <div class="row">
            <div class="col-lg-12">
                <div class="banner-heading">
                  <h1 class="banner-title">Misión y Visión</h1>
                  <h1 class="banner-subtitle">Comunidad Campesina de Catac</h1>
                  <nav aria-label="breadcrumb">
                      <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a href="#">Comunidad</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Misión y Visión</li>
                      </ol>
                  </nav>
                </div>
            </div><!-- Col end -->
          </div><!-- Row end -->
      </div><!-- Container end -->
    </div><!-- Banner text end -->
</div><!-- Banner area end --> 
  
  <section id="main-container" class="main-container">
    <div class="container">
      <div class="row">
          <div class="row">
            <div class="col-lg-6" style="text-align: justify;">
              <h3 class="column-title">Misión</h3>
              @foreach ($mision as $m)
              <p>{{$m->descripcion}}</p>
              @endforeach
  
            </div><!-- Col end -->
    
            <div class="col-lg-6 mt-5 mt-lg-0">
              
              <div id="page-slider" class="page-slider small-bg">
                @foreach ($mision as $m)
                <!-- constra/images/slider-pages/slide-comunero.jpg -->
                <div class="item" style="background-image:url({{$m->url_imagen}})">
                    <div class="container">
                       <!-- <div class="box-slider-content">
                          <div class="box-slider-text">
                              <h2 class="box-slide-title">Leadership</h2>
                          </div>    
                        </div> -->
                    </div>
                </div>
                @endforeach
              </div><!-- Page slider end-->          
            </div><!-- Col end -->
          </div>
          <br><br>        
          <div class="row">
            <div class="col-lg-6 mt-5 mt-lg-0">
            
              <div id="page-slider" class="page-slider small-bg">
                @foreach ($vision as $m)
                <!-- constra/images/slider-pages/slide-comunero.jpg -->
                <div class="item" style="background-image:url({{$m->url_imagen}})">
                    <div class="container">
                       <!-- <div class="box-slider-content">
                          <div class="box-slider-text">
                              <h2 class="box-slide-title">Leadership</h2>
                          </div>    
                        </div> -->
                    </div>
                </div>
                @endforeach
              </div><!-- Page slider end-->          
            </div><!-- Col end -->
    
            <div class="col-lg-6" style="text-align: justify;">
              <h3 class="column-title">Visión</h3>
              @foreach ($vision as $v)
              <p>{{$v->descripcion}}</p>
              @endforeach
            </div><!-- Col end -->
          </div>
      </div><!-- Content row end -->
  
    </div><!-- Container end -->
  </section><!-- Main container end -->
@endsection