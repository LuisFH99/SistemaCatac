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
                      <li class="breadcrumb-item active" aria-current="page">Comites Especializados</li>
                    </ol>
                </nav>
              </div>
          </div><!-- Col end -->
        </div><!-- Row end -->
    </div><!-- Container end -->
  </div><!-- Banner text end -->
</div><!-- Banner area end --> 
@endforeach
  
<section id="main-container" class="main-container">
  <div class="container">
    <div class="row">
      @foreach ($organos as $o)
        <div class="col-lg-12" style="text-align: justify;">
          <h3 class="column-title" style="text-align: center">{{$o->nombre}}</h3>
          <p style="text-align: justify">{{$o->descripcion}}</p><br>
        </div>
      @endforeach
      @foreach ($suborganos as $o)
      <div class="col-lg-12" style="text-align: justify;">
        <h4 class="column-title mb-2" style="text-align: left">{{$o->nombre}}</h4>
        <p style="text-align: justify">{{$o->descripcion}}</p><br>

          @if ($o->id == 12)
          <div class="row" style="margin-top: 0%">
            @if ($funcionarios1->count())
            @foreach ($funcionarios1 as $f)
            <div class="col-lg-3 col-md-4 col-sm-6 mb-5">
              <div id="zoom" class="card ts-team-wrapper ml-0">
      
                <div class="team-img-wrapper">
                  <img loading="lazy" src="{{ url($f->url_imagen) }}" style="width: 350px;height: 350px;align-content: center" class="img-fluid rounded mt-0 pt-4" alt="team-img">
                </div>
            
                <div class="ts-team-content-classic mb-4 m-2">
                  <p class="ts-name" style="font-size: 88%; font-weight: bolder">{{$f->apep}} {{$f->apem}} {{$f->name}}</p><br>
                  <p class="ts-designation">Cargo: {{$f->cargo}}</p><br>
                  <div class="team-social-icons">
                    <a style="cursor: pointer"><i class="fas fa-at" style="color: #64dd17"> {{$f->email}}</i></a><br>
                    <a style="cursor: pointer"><i class="fab fa-whatsapp" style="color: #64dd17"> {{$f->telefono}}</i></a><br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a class="link-secondary mb-4" href="perfiles/{{$f->id}}"><strong>Perfil <i class="fas fa-arrow-circle-right" style="color: greenyellow"></i></strong></a><br><br>
                  </div>
                </div>
      
              </div>
            </div>    
            @endforeach
            <div class="col-lg-12 mb-5 mb-lg-0">
              <nav aria-label="Page navigation example">
                  <ul class="pagination justify-content-center">
                    <li  class="page-item">{{ $funcionarios1->links() }}</li>
                  </ul>
              </nav>
            </div>  
            @else
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <img src="{{ url('img\not-found.png') }}" alt="">
            @endif
          </div>
          @else
              @if ($o->id==13)
              <div class="row" style="margin-top: 0%">
                @if ($funcionarios2->count())
                @foreach ($funcionarios2 as $f)
                <div class="col-lg-3 col-md-4 col-sm-6 mb-5">
                  <div id="zoom" class="card ts-team-wrapper ml-0">
          
                    <div class="team-img-wrapper">
                      <img loading="lazy" src="{{ url($f->url_imagen) }}" style="width: 350px;height: 350px;align-content: center" class="img-fluid rounded mt-0 pt-4" alt="team-img">
                    </div>
                
                    <div class="ts-team-content-classic mb-4 m-2">
                      <p class="ts-name" style="font-size: 88%; font-weight: bolder">{{$f->apep}} {{$f->apem}} {{$f->name}}</p><br>
                      <p class="ts-designation">Cargo: {{$f->cargo}}</p><br>
                      <div class="team-social-icons">
                        <a style="cursor: pointer"><i class="fas fa-at" style="color: #64dd17"> {{$f->email}}</i></a><br>
                        <a style="cursor: pointer"><i class="fab fa-whatsapp" style="color: #64dd17"> {{$f->telefono}}</i></a><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <a class="link-secondary mb-4" href="perfiles/{{$f->id}}"><strong>Perfil <i class="fas fa-arrow-circle-right" style="color: greenyellow"></i></strong></a><br><br>
                      </div>
                    </div>
          
                  </div>
                </div>    
                @endforeach
                <div class="col-lg-12 mb-5 mb-lg-0">
                  <nav aria-label="Page navigation example">
                      <ul class="pagination justify-content-center">
                        <li  class="page-item">{{ $funcionarios2->links() }}</li>
                      </ul>
                  </nav>
                </div>  
                @else
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <img src="{{ url('img\not-found.png') }}" alt="">
                @endif
              </div>
              @else
                  @if ($o->id==14)
                  <div class="row" style="margin-top: 0%">
                    @if ($funcionarios3->count())
                    @foreach ($funcionarios3 as $f)
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-5">
                      <div id="zoom" class="card ts-team-wrapper ml-0">
              
                        <div class="team-img-wrapper">
                          <img loading="lazy" src="{{ url($f->url_imagen) }}" style="width: 350px;height: 350px;align-content: center" class="img-fluid rounded mt-0 pt-4" alt="team-img">
                        </div>
                    
                        <div class="ts-team-content-classic mb-4 m-2">
                          <p class="ts-name" style="font-size: 88%; font-weight: bolder">{{$f->apep}} {{$f->apem}} {{$f->name}}</p><br>
                          <p class="ts-designation">Cargo: {{$f->cargo}}</p><br>
                          <div class="team-social-icons">
                            <a style="cursor: pointer"><i class="fas fa-at" style="color: #64dd17"> {{$f->email}}</i></a><br>
                            <a style="cursor: pointer"><i class="fab fa-whatsapp" style="color: #64dd17"> {{$f->telefono}}</i></a><br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <a class="link-secondary mb-4" href="perfiles/{{$f->id}}"><strong>Perfil <i class="fas fa-arrow-circle-right" style="color: greenyellow"></i></strong></a><br><br>
                          </div>
                        </div>
              
                      </div>
                    </div>    
                    @endforeach
                    <div class="col-lg-12 mb-5 mb-lg-0">
                      <nav aria-label="Page navigation example">
                          <ul class="pagination justify-content-center">
                            <li  class="page-item">{{ $funcionarios3->links() }}</li>
                          </ul>
                      </nav>
                    </div>  
                    @else
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <img src="{{ url('img\not-found.png') }}" alt="">
                    @endif
                  </div>
                  @else
                      @if ($o->id==15)
                      <div class="row" style="margin-top: 0%">
                        @if ($funcionarios4->count())
                        @foreach ($funcionarios4 as $f)
                        <div class="col-lg-3 col-md-4 col-sm-6 mb-5">
                          <div id="zoom" class="card ts-team-wrapper ml-0">
                  
                            <div class="team-img-wrapper">
                              <img loading="lazy" src="{{ url($f->url_imagen) }}" style="width: 350px;height: 350px;align-content: center" class="img-fluid rounded mt-0 pt-4" alt="team-img">
                            </div>
                        
                            <div class="ts-team-content-classic mb-4 m-2">
                              <p class="ts-name" style="font-size: 88%; font-weight: bolder">{{$f->apep}} {{$f->apem}} {{$f->name}}</p><br>
                              <p class="ts-designation">Cargo: {{$f->cargo}}</p><br>
                              <div class="team-social-icons">
                                <a style="cursor: pointer"><i class="fas fa-at" style="color: #64dd17"> {{$f->email}}</i></a><br>
                                <a style="cursor: pointer"><i class="fab fa-whatsapp" style="color: #64dd17"> {{$f->telefono}}</i></a><br>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <a class="link-secondary mb-4" href="perfiles/{{$f->id}}"><strong>Perfil <i class="fas fa-arrow-circle-right" style="color: greenyellow"></i></strong></a><br><br>
                              </div>
                            </div>
                  
                          </div>
                        </div>    
                        @endforeach
                        <div class="col-lg-12 mb-5 mb-lg-0">
                          <nav aria-label="Page navigation example">
                              <ul class="pagination justify-content-center">
                                <li  class="page-item">{{ $funcionarios4->links() }}</li>
                              </ul>
                          </nav>
                        </div>  
                        @else
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <img src="{{ url('img\not-found.png') }}" alt="">
                        @endif
                      </div>
                      @else
                        @if ($o->id==16)
                        <div class="row" style="margin-top: 0%">
                          @if ($funcionarios5->count())
                          @foreach ($funcionarios5 as $f)
                          <div class="col-lg-3 col-md-4 col-sm-6 mb-5">
                            <div id="zoom" class="card ts-team-wrapper ml-0">
                    
                              <div class="team-img-wrapper">
                                <img loading="lazy" src="{{ url($f->url_imagen) }}" style="width: 350px;height: 350px;align-content: center" class="img-fluid rounded mt-0 pt-4" alt="team-img">
                              </div>
                          
                              <div class="ts-team-content-classic mb-4 m-2">
                                <p class="ts-name" style="font-size: 88%; font-weight: bolder">{{$f->apep}} {{$f->apem}} {{$f->name}}</p><br>
                                <p class="ts-designation">Cargo: {{$f->cargo}}</p><br>
                                <div class="team-social-icons">
                                  <a style="cursor: pointer"><i class="fas fa-at" style="color: #64dd17"> {{$f->email}}</i></a><br>
                                  <a style="cursor: pointer"><i class="fab fa-whatsapp" style="color: #64dd17"> {{$f->telefono}}</i></a><br>
                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  <a class="link-secondary mb-4" href="perfiles/{{$f->id}}"><strong>Perfil <i class="fas fa-arrow-circle-right" style="color: greenyellow"></i></strong></a><br><br>
                                </div>
                              </div>
                    
                            </div>
                          </div>    
                          @endforeach
                          <div class="col-lg-12 mb-5 mb-lg-0">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-center">
                                  <li  class="page-item">{{ $funcionarios5->links() }}</li>
                                </ul>
                            </nav>
                          </div>  
                          @else
                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          <img src="{{ url('img\not-found.png') }}" alt="">
                          @endif
                        </div>
                        @else
                            @if ($o->id==17)
                            <div class="row" style="margin-top: 0%">
                              @if ($funcionarios6->count())
                              @foreach ($funcionarios6 as $f)
                              <div class="col-lg-3 col-md-4 col-sm-6 mb-5">
                                <div id="zoom" class="card ts-team-wrapper ml-0">
                        
                                  <div class="team-img-wrapper">
                                    <img loading="lazy" src="{{ url($f->url_imagen) }}" style="width: 350px;height: 350px;align-content: center" class="img-fluid rounded mt-0 pt-4" alt="team-img">
                                  </div>
                              
                                  <div class="ts-team-content-classic mb-4 m-2">
                                    <p class="ts-name" style="font-size: 88%; font-weight: bolder">{{$f->apep}} {{$f->apem}} {{$f->name}}</p><br>
                                    <p class="ts-designation">Cargo: {{$f->cargo}}</p><br>
                                    <div class="team-social-icons">
                                      <a style="cursor: pointer"><i class="fas fa-at" style="color: #64dd17"> {{$f->email}}</i></a><br>
                                      <a style="cursor: pointer"><i class="fab fa-whatsapp" style="color: #64dd17"> {{$f->telefono}}</i></a><br>
                                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                      <a class="link-secondary mb-4" href="perfiles/{{$f->id}}"><strong>Perfil <i class="fas fa-arrow-circle-right" style="color: greenyellow"></i></strong></a><br><br>
                                    </div>
                                  </div>
                        
                                </div>
                              </div>    
                              @endforeach
                              <div class="col-lg-12 mb-5 mb-lg-0">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination justify-content-center">
                                      <li  class="page-item">{{ $funcionarios6->links() }}</li>
                                    </ul>
                                </nav>
                              </div>  
                              @else
                              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                              <img src="{{ url('img\not-found.png') }}" alt="">
                              @endif
                            </div>
                            @else
                                @if ($o->id==18)
                                <div class="row" style="margin-top: 0%">
                                  @if ($funcionarios7->count())
                                  @foreach ($funcionarios7 as $f)
                                  <div class="col-lg-3 col-md-4 col-sm-6 mb-5">
                                    <div id="zoom" class="card ts-team-wrapper ml-0">
                            
                                      <div class="team-img-wrapper">
                                        <img loading="lazy" src="{{ url($f->url_imagen) }}" style="width: 350px;height: 350px;align-content: center" class="img-fluid rounded mt-0 pt-4" alt="team-img">
                                      </div>
                                  
                                      <div class="ts-team-content-classic mb-4 m-2">
                                        <p class="ts-name" style="font-size: 88%; font-weight: bolder">{{$f->apep}} {{$f->apem}} {{$f->name}}</p><br>
                                        <p class="ts-designation">Cargo: {{$f->cargo}}</p><br>
                                        <div class="team-social-icons">
                                          <a style="cursor: pointer"><i class="fas fa-at" style="color: #64dd17"> {{$f->email}}</i></a><br>
                                          <a style="cursor: pointer"><i class="fab fa-whatsapp" style="color: #64dd17"> {{$f->telefono}}</i></a><br>
                                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                          <a class="link-secondary mb-4" href="perfiles/{{$f->id}}"><strong>Perfil <i class="fas fa-arrow-circle-right" style="color: greenyellow"></i></strong></a><br><br>
                                        </div>
                                      </div>
                            
                                    </div>
                                  </div>    
                                  @endforeach
                                  <div class="col-lg-12 mb-5 mb-lg-0">
                                    <nav aria-label="Page navigation example">
                                        <ul class="pagination justify-content-center">
                                          <li  class="page-item">{{ $funcionarios7->links() }}</li>
                                        </ul>
                                    </nav>
                                  </div>  
                                  @else
                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  <img src="{{ url('img\not-found.png') }}" alt="">
                                  @endif
                                </div>
                                @else
                                    @if ($o->id==19)
                                    <div class="row" style="margin-top: 0%">
                                      @if ($funcionarios8->count())
                                      @foreach ($funcionarios8 as $f)
                                      <div class="col-lg-3 col-md-4 col-sm-6 mb-5">
                                        <div id="zoom" class="card ts-team-wrapper ml-0">
                                
                                          <div class="team-img-wrapper">
                                            <img loading="lazy" src="{{ url($f->url_imagen) }}" style="width: 350px;height: 350px;align-content: center" class="img-fluid rounded mt-0 pt-4" alt="team-img">
                                          </div>
                                      
                                          <div class="ts-team-content-classic mb-4 m-2">
                                            <p class="ts-name" style="font-size: 88%; font-weight: bolder">{{$f->apep}} {{$f->apem}} {{$f->name}}</p><br>
                                            <p class="ts-designation">Cargo: {{$f->cargo}}</p><br>
                                            <div class="team-social-icons">
                                              <a style="cursor: pointer"><i class="fas fa-at" style="color: #64dd17"> {{$f->email}}</i></a><br>
                                              <a style="cursor: pointer"><i class="fab fa-whatsapp" style="color: #64dd17"> {{$f->telefono}}</i></a><br>
                                              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                              <a class="link-secondary mb-4" href="perfiles/{{$f->id}}"><strong>Perfil <i class="fas fa-arrow-circle-right" style="color: greenyellow"></i></strong></a><br><br>
                                            </div>
                                          </div>
                                
                                        </div>
                                      </div>    
                                      @endforeach
                                      <div class="col-lg-12 mb-5 mb-lg-0">
                                        <nav aria-label="Page navigation example">
                                            <ul class="pagination justify-content-center">
                                              <li  class="page-item">{{ $funcionarios8->links() }}</li>
                                            </ul>
                                        </nav>
                                      </div>  
                                      @else
                                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                      <img src="{{ url('img\not-found.png') }}" alt="">
                                      @endif
                                    </div> 
                                    @else
                                        @if ($o->id==20)
                                        <div class="row" style="margin-top: 0%">
                                          @if ($funcionarios9->count())
                                          @foreach ($funcionarios9 as $f)
                                          <div class="col-lg-3 col-md-4 col-sm-6 mb-5">
                                            <div id="zoom" class="card ts-team-wrapper ml-0">
                                    
                                              <div class="team-img-wrapper">
                                                <img loading="lazy" src="{{ url($f->url_imagen) }}" style="width: 350px;height: 350px;align-content: center" class="img-fluid rounded mt-0 pt-4" alt="team-img">
                                              </div>
                                          
                                              <div class="ts-team-content-classic mb-4 m-2">
                                                <p class="ts-name" style="font-size: 88%; font-weight: bolder">{{$f->apep}} {{$f->apem}} {{$f->name}}</p><br>
                                                <p class="ts-designation">Cargo: {{$f->cargo}}</p><br>
                                                <div class="team-social-icons">
                                                  <a style="cursor: pointer"><i class="fas fa-at" style="color: #64dd17"> {{$f->email}}</i></a><br>
                                                  <a style="cursor: pointer"><i class="fab fa-whatsapp" style="color: #64dd17"> {{$f->telefono}}</i></a><br>
                                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                  <a class="link-secondary mb-4" href="perfiles/{{$f->id}}"><strong>Perfil <i class="fas fa-arrow-circle-right" style="color: greenyellow"></i></strong></a><br><br>
                                                </div>
                                              </div>
                                    
                                            </div>
                                          </div>    
                                          @endforeach
                                          <div class="col-lg-12 mb-5 mb-lg-0">
                                            <nav aria-label="Page navigation example">
                                                <ul class="pagination justify-content-center">
                                                  <li  class="page-item">{{ $funcionarios9->links() }}</li>
                                                </ul>
                                            </nav>
                                          </div>  
                                          @else
                                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                          <img src="{{ url('img\not-found.png') }}" alt="">
                                          @endif
                                        </div>
                                        @endif
                                    @endif
                                @endif
                            @endif
                        @endif
                      @endif
                  @endif
              @endif
          @endif

      </div>
      @endforeach

<!-- 
      <div class="col-lg-12" style="text-align: justify;">
        <h4 class="column-title">Lista de los Miembros</h4>
        <form method="get" > 
          <div class="col-lg-6">
            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
              <input type="text" name="buscar" class="form-control" placeholder="Buscar Integrante..."  value="{{$buscar}}">
            </div><br>
          </div>
        </form>
      </div> -->
    </div>
  </div>
</section>
@endsection