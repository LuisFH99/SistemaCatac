@extends('layouts.web')
@section('contenido')

@foreach ($banner as $b)
<div id="banner-area" class="banner-area" style="background-image:url({{$b->url_imagen}});">
  <div class="banner-text">
    <div class="container">
        <div class="row">
          <div class="col-lg-12">
              <div class="banner-heading">
                <h1 class="banner-title">{{$b->titulo}}</h1>
                <h1 class="banner-subtitle">{{$b->subtitulo}}</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                      <li class="breadcrumb-item"><a href="#">Comunidad</a></li>
                      <li class="breadcrumb-item active" aria-current="page">POI</li>
                    </ol>
                </nav>
              </div>
          </div>
        </div>
    </div>
  </div>
</div>
@endforeach
  
  <section id="main-container" class="main-container">
    <div class="container">
      <div class="row">
          <div class="col-lg-16">
            <p style="text-align: justify">El Plan Estratégico Institucional (PEI) 2019 – 2020 y Plan Operativo Institucional (POI) 2019 de la Municipalidad Distrital de Cátac, 
              constituye una herramienta de Gestión institucional de corto plazo, que orienta la labor operativa de la alta dirección, funcionarios y 
              trabajadores de las diferentes unidades orgánicas de la institución, con al finalidad de alcanzar los mejores resultados organizando esfuerzos 
              y racionalizando recursos materiales, humanos y económicos para lograr los objetivos y metas del plan estratégico institucional.</p>
              @foreach ($instrumentos as $i)
              @if ($codigos > 0)
              <div class="accordion accordion-group" id="construction-accordion">
                <div class="card">
                  <div class="card-header p-0 bg-transparent" id="headingOne">
                    <h2 class="mb-0">
                      <button class="btn btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse{{$i->id}}" aria-expanded="true" aria-controls="collapse{{$i->id}}">
                        {{$i->descripcion}}
                      </button>
                    </h2>
                  </div>
                    
                  <div id="collapse{{$i->id}}" class="collapse show" aria-labelledby="headingOne"
                    data-parent="#construction-accordion">
                    <div class="card-body">
                      <center><iframe src="{{ url($i->url_documento) }}"></iframe></center>
                    </div>
                  </div>
                </div>
              </div>
              @else
              <div class="accordion accordion-group" id="construction-accordion">
                <div class="card">
                  <div class="card-header p-0 bg-transparent" id="headingOne">
                    <h2 class="mb-0">
                      <button class="btn btn-block text-left collapsed" type="button" data-toggle="modal" data-target="#staticBackdrop" data-toggle="collapse" data-target="#collapse{{$i->id}}" aria-expanded="false" aria-controls="collapse{{$i->id}}">
                        {{$i->descripcion}}
                      </button>
                    </h2>
                  </div>
                    
                  <div id="collapse{{$i->id}}" class="collapse" aria-labelledby="headingOne"
                    data-parent="#construction-accordion">
                    <div class="card-body">
                      <center><iframe src="{{ url($i->url_documento) }}"></iframe></center>
                    </div>
                  </div>
                </div>
              </div>
              @endif  
              @endforeach
          </div>
      </div>
    </div>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Ingreso de Credenciales</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <form method="post" >
        @csrf
      <div class="modal-body">
        <div class="alert alert-warning">
          <p> <i class="fas fa-exclamation-triangle"></i><b> Aviso:</b><br>
            Solo los comunero de la comunidad pueden visualizar los Instrumentos de Gestion, por ello se le pide que inserte su codigo asignado.<br>
          </p>
        </div>  
          <input type="password" name="codigo" class="form-control" placeholder="Ingrese Codigo de Comunero" value="{{$codigo}}">        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="far fa-times-circle"></i> Cancelar</button>
        <button type="submit" class="btn btn-primary"><i class="far fa-check-circle"></i> Ingresar</button>
      </div>
    </form>
    </div>
  </div>
</div>
  </section>
@endsection