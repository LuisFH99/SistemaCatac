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
                      <li class="breadcrumb-item active" aria-current="page">Misión y Visión</li>
                    </ol>
                </nav>
              </div>
          </div><!-- Col end -->
        </div><!-- Row end -->
    </div><!-- Container end -->
  </div><!-- Banner text end -->
</div>
@endforeach
  
  <section id="main-container" class="main-container">
    @if ($instrumentos->count())
        @foreach ($instrumentos as $i)
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
                        {{$i->descripcion}} <br>

                      </div>
                  </div>
                </div>
                @if ($codigos > 0)
                <div class="card">
                  <div class="card-header p-0 bg-transparent" id="headingTwo">
                      <h2 class="mb-0">
                        <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                            Estatuto
                        </button>
                      </h2>
                  </div>
                  <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#our-values-accordion">
                      <div class="card-body">
                        <center><iframe src="{{ url($i->url_documento) }}"></iframe></center>
                      </div>
                  </div>
                </div>
                @else
                <div class="card">
                  <div class="card-header p-0 bg-transparent" id="headingTwo">
                      <h2 class="mb-0">
                        
                        <button class="btn btn-block text-left collapsed" type="button" data-toggle="modal" data-target="#staticBackdrop" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Estatuto
                        </button>
                      </h2>
                  </div>
                
                  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#our-values-accordion">
                    <div class="card-body">
                      <center><iframe src="{{ url($i->url_documento) }}"></iframe></center>
                    </div>
                  </div>
                </div>
                @endif
                @endforeach
                @else
                    <h4>No se encontraron registros</h4>
                @endif


                @if ($codigos > 0)
                @foreach ($modicatoria as $m)
                <div class="card">
                  <div class="card-header p-0 bg-transparent" id="headingThree">
                      <h2 class="mb-0">
                        <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                            Modificatorias
                        </button>
                      </h2>
                  </div>
                  <div id="collapseThree" class="collapse show" aria-labelledby="headingThree" data-parent="#our-values-accordion">
                      <div class="card-body">
                        Modificatorias realizadas al estatuto en sesiones de Asamblea.  
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <a class="btn btn-dark" target="_blank" href="{{ url($m->url_doc) }}" >Descargar</a>
                      </div>
                  </div>
                </div>
                @endforeach
                @else
                <div class="card">
                  <div class="card-header p-0 bg-transparent" id="headingTwo">
                      <h2 class="mb-0">
                        <button class="btn btn-block text-left collapsed" type="button" data-toggle="modal" data-target="#staticBackdrop" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Modificatorias
                        </button>
                      </h2>
                  </div>
                
                  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#our-values-accordion">
                    <div class="card-body">
                      <center><iframe src="{{ url($i->url_documento) }}"></iframe></center>
                    </div>
                  </div>
                </div>
                @endif
            </div>
            <!--/ Accordion end -->
          </div><!-- Col end -->
        </div><!-- Container end -->
 
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
  </section><!-- Main container end -->
@endsection