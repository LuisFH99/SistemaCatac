@extends('layouts.web')
@section('contenido')
  <div id="banner-area" class="banner-area" style="background-image:url(images/banner/bannerservi.jpg)">
    <div class="banner-text">
      <div class="container">
          <div class="row">
            <div class="col-lg-12">
                <div class="banner-heading">
                  <h1 class="banner-title">Minimarket</h1>
                  <nav aria-label="breadcrumb">
                      <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a href="#">Servicios</a></li>
                        <li class="breadcrumb-item"><a href="#">Servicentro</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Minimarket</li>
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
  
        <div class="col-xl-3 col-lg-4">
          <div class="sidebar sidebar-left">
            <div class="widget">
              <h3 class="widget-title">Opciones</h3>
              <ul class="nav service-menu">
                <li><a href="/serviciosprincipalminimarket">Detalles</a></li>
                <li class="active"><a href="/serviciosofertadosminimarket">Servicios</a></li>
                <li><a href="/serviciosadquirirminimarket">Como comprar</a></li>
                <li><a href="/serviciocontactominimarket">Contacto</a></li>
              </ul>
            </div><!-- Widget end -->
  
          </div><!-- Sidebar end -->
        </div><!-- Sidebar Col end -->
  
        <div class="col-xl-9 col-lg-9">
          <div class="content-inner-page">
            
            <div class="row">
              <div class="col-lg-6">
                <h3 class="column-title">ANTAMINA</h3>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                  Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, 
                  when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
                  It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. </p>
                <a class="btn btn-primary" href="https://www.antamina.com/">Conocer mas >></a>
              </div><!-- Col end -->
              <div class="col-lg-6 mt-5  mt-lg-0">
                <div id="page-slider" class="page-slider small-bg">
                    <div class="item" style="background-image:url(images/minera1.jpg)">
                      <div class="container">
                          <div class="box-slider-content">  
                          </div>
                      </div>
                    </div><!-- Item 1 end -->
                </div><!-- Page slider end-->          
              </div><!-- Col end -->
            </div><!-- 1st row end-->
  
            <div class="gap-40"></div>
  
            <div class="row">
              <div class="col-lg-6 mt-5  mt-lg-0">
                <div id="page-slider" class="page-slider small-bg">
                    <div class="item" style="background-image:url(images/minera1.jpg)">
                      <div class="container">
                          <div class="box-slider-content">  
                          </div>
                      </div>
                    </div><!-- Item 1 end -->
                </div><!-- Page slider end-->          
              </div><!-- Col end -->
              <div class="col-lg-6">
                <h3 class="column-title">ANTAMINA</h3>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                  Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, 
                  when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
                  It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. </p>
                <a class="btn btn-primary" href="https://www.antamina.com/">Conocer mas >></a>
              </div><!-- Col end -->
            </div>
          </div><!-- Content inner end -->
        </div><!-- Content Col end -->
  
  
      </div><!-- Main row end -->
    </div><!-- Conatiner end -->
  </section><!-- Main container end -->
@endsection