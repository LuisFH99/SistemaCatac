@extends('layouts.web')
@section('contenido')
<div id="banner-area" class="banner-area" style="background-image:url(constra/images/banner/banneresta.jpg)">
    <div class="banner-text">
      <div class="container">
          <div class="row">
            <div class="col-lg-12">
                <div class="banner-heading">
                  <h1 class="banner-title">PLAN OPERATIVO INSTITUCIONAL</h1>
                  <h1 class="banner-subtitle">Comunidad Campesina de Catac</h1>
                  <nav aria-label="breadcrumb">
                      <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a href="#">Instrumentos de Gestión</a></li>
                        <li class="breadcrumb-item"><a href="#">Reglamento</a></li>
                        <li class="breadcrumb-item active" aria-current="page">POI</li>
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
            <p>El Plan Estratégico Institucional (PEI) 2019 – 2020 y Plan Operativo Institucional (POI) 2019 de la Municipalidad Distrital de Cátac, 
              constituye una herramienta de Gestión institucional de corto plazo, que orienta la labor operativa de la alta dirección, funcionarios y 
              trabajadores de las diferentes unidades orgánicas de la institución, con al finalidad de alcanzar los mejores resultados organizando esfuerzos 
              y racionalizando recursos materiales, humanos y económicos para lograr los objetivos y metas del plan estratégico institucional.</p>
              <div class="accordion accordion-group accordion-classic" id="construction-accordion">
                <div class="card">
                  <div class="card-header p-0 bg-transparent" id="headingOne">
                    <h2 class="mb-0">
                      <button class="btn btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne"
                        aria-expanded="true" aria-controls="collapseOne">
                        Plan Operativo Institucional (POI) 2019.
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
              </div> 
          </div><!-- Col end -->
      </div><!-- Content row end -->
  
    </div><!-- Container end -->
  </section><!-- Main container end -->
@endsection