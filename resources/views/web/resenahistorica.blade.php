@extends('layouts.web')
@section('contenido')
    <!--/ Header end -->
<div id="banner-area" class="banner-area" style="background-image:url(constra/images/banner/banner5.jpg)">
    <div class="banner-text">
      <div class="container">
          <div class="row">
            <div class="col-lg-12">
                <div class="banner-heading">
                  <h1 class="banner-title">Reseña Histórica</h1>
                  <h1 class="banner-subtitle">Comunidad Campesina de Catac</h1>
                  <nav aria-label="breadcrumb">
                      <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a href="#">Comunidad</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Reseña Histórica</li>
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
        <div class="col-lg-12 mt-5 mt-lg-0">
            
          <div id="page-slider" class="page-slider small-bg">
  
              <div class="item" style="background-image:url(constra/images/slider-pages/slide-reseña.jpg);background-size: contain;">
                <div class="container">
                   <!-- <div class="box-slider-content">
                      <div class="box-slider-text">
                           <h2 class="box-slide-title">Leadership</h2> 
                      </div>    
                    </div> -->
                </div>
              </div><!-- Item 1 end -->
  
              <div class="item" style="background-image:url(constra/images/slider-pages/slide-centro2.jpg);background-size: contain;">
                <div class="container">
                     <!-- <div class="box-slider-content">
                      <div class="box-slider-text">
                        <h2 class="box-slide-title">Relationships</h2>
                      </div>    
                    </div> -->
                </div>
              </div><!-- Item 1 end -->
  
              <div class="item" style="background-image:url(constra/images/slider-pages/slide-ganado.jpg);background-size: contain;">
                <div class="container"> 
                    <div class="box-slider-content">
                      <div class="box-slider-text">
                          <!-- <h2 class="box-slide-title">Performance</h2> -->
                      </div>    
                    </div>
                </div>
              </div><!-- Item 1 end -->
          </div><!-- Page slider end-->          
        </div><!-- Col end -->
          <div class="col-lg-12"><br><br>
            @foreach ($historia as $h)
                <h3 class="column-title"><center>{{$h->titulo}}</center></h3>
                <p style="text-align: justify">{{$h->descripcion}}</p>
            @endforeach
          
        </div><!-- Col end -->
         
  
      </div><!-- Content row end -->
  
    </div><!-- Container end -->
  </section><!-- Main container end -->
@endsection