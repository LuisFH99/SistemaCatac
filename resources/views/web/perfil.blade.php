@extends('layouts.web')
@section('contenido')
<div><br>
  @if ($perfiles->count())
  @foreach ($perfiles as $f)

    <div class="container card mb-0" data-aos="fade-zoom-in">
      <hr style="height: 0.5px;background: yellowgreen">

      <div class="row">
        <div class="col-lg-5 mb-0">
          <div id="page-slider" class="page-slider small-bg">
            <div class="item" >
              <a href="{{ url($f->url_imagen) }}"><img loading="lazy" class="img-fluid shadow p-1 mb-2 bg-white rounded" src="{{ asset($f->url_imagen) }}" style="width: 95%;height:95% ;" alt="project-image" /><br>
              </a>
            </div>
          </div>
          <div class="row mb-0">
            <div class="col-lg-5 mb-0">
              <p class="project-info-label m-0">Nombres y Apellidos:</p> <p class="project-info-content">{{$f->apep}} {{$f->apem}} {{$f->name}}</p>
              <p class="project-info-label m-0">DNI:</p> <p class="project-info-content">{{$f->DNI}}</p>
            </div>
            <div class="col-lg-6 mb-0" style="text-align: left">
              <p class="project-info-label m-0">Datos de Contacto:</p>
                <small class="text-muted"><i class="fas fa-at" style="color: #747d84"></i><b> {{$f->email}}</b></small><br>
                <small class="text-muted"><i class="fab fa-whatsapp" style="color: #747d84"></i><b> {{$f->telefono}}</b></small>
            </div>
          </div>
        </div>
        
        <div class="col-lg-6 mb-0">          
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
              <p class="project-info-label m-0 mb-2">Documento CV:</p>
              <a href="{{ url($f->url_cv) }}" target="_blank"><img src="{{ asset('img/pdf.png') }}" style="width: 15%" class="img-fluid" alt=""></a>
            </li>            
          </ul>
        </div>
      </div>
      <hr style="height: 0.5px;background: yellowgreen">
    </div><br>
  @endforeach
  @else
    @foreach ($perfiles1 as $f)
      <div class="container card" data-aos="fade-zoom-in">
        <hr style="height: 0.5px;background: yellowgreen">
        <div class="row">
          <div class="col-lg-5 mb-0">
            <div id="page-slider" class="page-slider small-bg">
              <div class="item" >
                <a href="{{ url($f->url_imagen) }}"><img loading="lazy" class="img-fluid shadow p-1 mb-2 bg-white rounded" src="{{ asset($f->url_imagen) }}" style="width: 95%;height:95% ;" alt="project-image" /><br>
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
                  <small class="text-muted"><i class="fas fa-at" style="color: #747d84"></i><b> {{$f->email}}</b></small><br>
                  <small class="text-muted"><i class="fab fa-whatsapp" style="color: #747d84"></i><b> {{$f->telefono}}</b></small>
              </div>
            </div>
          </div>
          
          <div class="col-lg-6 p-0">          
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
                <p class="project-info-label m-0 mb-2">Documento CV:</p>
                <a href="{{ url($f->url_cv) }}" target="_blank"><img src="{{ asset('img/pdf.png') }}" style="width: 15%" class="img-fluid" alt=""></a>
              </li>            
            </ul>
          </div>
        </div>
        <hr style="height: 0.5px;background: yellowgreen">
      </div><br>
    @endforeach
  @endif
</div>
@endsection