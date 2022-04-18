@extends('layouts.web')
@section('contenido')
<div id="banner-area" class="banner-area" style="background-image:url(constra/images/banner/banneresta.jpg)">
    <div class="banner-text">
      <div class="container">
          <div class="row">
            <div class="col-lg-12">
                <div class="banner-heading">
                  <h1 class="banner-title">Reglamento de Organización y Funciones</h1>
                  <h1 class="banner-subtitle">Comunidad Campesina de Catac</h1>
                  <nav aria-label="breadcrumb">
                      <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a href="#">Instrumentos de Gestión</a></li>
                        <li class="breadcrumb-item"><a href="#">Reglamento</a></li>
                        <li class="breadcrumb-item active" aria-current="page">ROF</li>
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
          <div class="col-lg-16">
            <p>El Reglamento de Organización y Funciones (ROF) de la Municipalidad Distrital de Cátac, es el instrumento de gestión institucional que formaliza 
              la estructura orgánica de la entidad municipal, orientada al esfuerzo institucional y al logro de la misión, visión y objetivos institucionales; 
              conteniendo las funciones generales de la Municipalidad y las funciones específicas de los órganos y unidades orgánicas, estableciendo sus relaciones 
              y responsabilidades.</p>
              <div class="accordion accordion-group accordion-classic" id="construction-accordion">
                <div class="card">
                  <div class="card-header p-0 bg-transparent" id="headingOne">
                    <h2 class="mb-0">
                      <button class="btn btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne"
                        aria-expanded="true" aria-controls="collapseOne">
                        Ordenanza municipal N°0001-2022
                      </button>
                    </h2>
                  </div>
                    
                  <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                    data-parent="#construction-accordion">
                    <div class="card-body">
                      <center><iframe src="constra/images/ESTATUTO DE LA COMUNIDAD CAMPESINA DE CÁTAC. BASES LEGALES - PDF Descargar libre.pdf"></iframe></center>
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header p-0 bg-transparent" id="headingTwo">
                    <h2 class="mb-0">
                      <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse"
                        data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Reglamento de Organización y Funciones 2020
                      </button>
                    </h2>
                  </div>
                  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#construction-accordion">
                    <div class="card-body">
                      <center><iframe src="constra/images/ESTATUTO DE LA COMUNIDAD CAMPESINA DE CÁTAC. BASES LEGALES - PDF Descargar libre.pdf"></iframe></center>
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header p-0 bg-transparent" id="headingThree">
                    <h2 class="mb-0">
                      <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse"
                        data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Reglamento de Organización y Funciones 2020 – Actualizado mediante Ordenanza N°009-2020-MDC
                      </button>
                    </h2>
                  </div>
                  <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                    data-parent="#construction-accordion">
                    <div class="card-body">
                      <center><iframe src="constra/images/ESTATUTO DE LA COMUNIDAD CAMPESINA DE CÁTAC. BASES LEGALES - PDF Descargar libre.pdf"></iframe></center>
                    </div>
                  </div>
                </div>
              </div>  
          </div><!-- Col end -->
      </div><!-- Content row end -->
  
    </div><!-- Container end -->
  </section><!-- Main container end -->
@endsection