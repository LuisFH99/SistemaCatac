@extends('layouts.web')
@section('contenido')
<div><br>
    @foreach ($perfiles as $f)

    <div >
      <div class="container card">
        <hr style="height: 0.5px;background: yellowgreen">
        <div class="row">
          <div class="col-lg-5 mb-0">
            <div id="page-slider" class="page-slider small-bg">
              <div class="item">
                <a href="{{ url($f->url_imagen) }}"><img loading="lazy" class="img-fluid" src="{{ asset($f->url_imagen) }}" style="width: 95%;height:95% ;" alt="project-image" /><br>
                </a>
              </div>
            </div>
            <div class="row mb-0">
              <div class="col-lg-5">
                <p class="project-info-label m-0">Nombres y Apellidos:</p> <p class="project-info-content">{{$f->apep}} {{$f->apem}} {{$f->name}}</p>
                <p class="project-info-label m-0">DNI:</p> <p class="project-info-content">{{$f->DNI}}</p>
              </div>
              <div class="col-lg-6" style="text-align: left">
                <p class="project-info-label m-0">Datos de Contacto:</p>
                  <p class="project-info-content m-0"><i class="fas fa-at"> {{$f->email}}</i></p> 
                  <p class="project-info-content"><i class="fab fa-whatsapp"> {{$f->telefono}}</i></p>
              </div>
            </div>
          </div>
          
          <div class="col-lg-6">          
            <ul class=" project-info list-unstyled">
              <li>
                <p class="project-info-label m-0" >Perfil:</p>
                <p class="project-info-content" style="text-align: justify">{{$f->perfil}}</p>
              </li>
              <li>
                <p class="project-info-label m-0">Profesion:</p>
                <p class="project-info-content">{{$f->profesion}}</p>
              </li>
              <li>
                <p class="project-info-label m-0">Oficina:</p>
                <p class="project-info-content">{{$f->organo}} - {{$f->nombre}}</p>
              </li>
              <li>
                <p class="project-info-label m-0">Cargo:</p>
                <p class="project-info-content">{{$f->cargo}}</p>
              </li>
              <li>
                <p class="project-info-label m-0">Periodo:</p>
                <p class="project-info-content">Del {{$f->fech_inicio}} al {{$f->fech_fin}}</p>
              </li>
              <li>
                <p class="project-info-label m-0">Documento CV:</p>
                <a href="{{ url($f->url_cv) }}" target="_blank"><img src="{{ asset('img/pdf.png') }}" style="width: 20%" class="img-fluid" alt=""></a>
              </li>            
            </ul>
    
          </div><!-- Content col end -->
    
        </div><!-- Row end -->
        <hr style="height: 0.5px;background: yellowgreen">
      </div><!-- Conatiner end -->
    </div><!-- Main container end -->     
    @endforeach
</div>
@endsection