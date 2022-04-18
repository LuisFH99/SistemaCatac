@extends('layouts.web')
@section('contenido')
<div id="banner-area" class="banner-area" style="background-image:url(constra/images/banner/banneresta.jpg)">
    <div class="banner-text">
      <div class="container">
          <div class="row">
            <div class="col-lg-12">
                <div class="banner-heading">
                  <h1 class="banner-title">Estatuto</h1>
                  <h1 class="banner-subtitle">Comunidad Campesina de Catac</h1>
                  <nav aria-label="breadcrumb">
                      <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a href="#">Instrumentos de Gestión</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Estatuto</li>
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
      <div class="col-lg-16 mt-4 mt-lg-0">
        <div class="accordion accordion-group" id="our-values-accordion">
            <div class="card">
              <div class="card-header p-0 bg-transparent" id="headingOne">
                  <h2 class="mb-0">
                    <button class="btn btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Información General
                    </button>
                  </h2>
              </div>
            
              <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#our-values-accordion">
                  <div class="card-body">
                    Comunidad Campesina de Catac - RECUAY <br> Asamblea Estatutaria N°232 <br> Estatuto Catac - Perú 2020 
                  </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header p-0 bg-transparent" id="headingTwo">
                  <h2 class="mb-0">
                    <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Estatuto
                    </button>
                  </h2>
              </div>
              <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#our-values-accordion">
                  <div class="card-body">
                    <center><iframe src="constra/images/ESTATUTO DE LA COMUNIDAD CAMPESINA DE CÁTAC. BASES LEGALES - PDF Descargar libre.pdf"></iframe></center>
                  </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header p-0 bg-transparent" id="headingThree">
                  <h2 class="mb-0">
                    <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Modificatorias
                    </button>
                  </h2>
              </div>
              <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#our-values-accordion">
                  <div class="card-body">
                    Modificatorias realziadas al estatuto en sesiones de Asamblea. 
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a class="btn btn-dark" href="https://docplayer.es/61530297-Estatuto-de-la-comunidad-campesina-de-catac-bases-legales.html" target="_BLANK">Descargar</a>
                  </div>
              </div>
            </div>
        </div>
        <!--/ Accordion end -->
      </div><!-- Col end -->
    </div><!-- Container end -->
  </section><!-- Main container end -->
@endsection