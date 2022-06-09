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
                      <li class="breadcrumb-item active" aria-current="page">Organo de Linea</li>
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
  <div class="container">
    <div class="row">
      @foreach ($suborganos as $o)
      <div class="col-lg-12" style="text-align: justify;" data-aos="fade-right">
        <h4 class="column-title mb-2" style="text-align: left">{{$o->nombre}}</h4>
        <p style="text-align: justify">{{$o->descripcion}}</p><br>
          @if ($o->id == 27)
          <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            @if ($funcionarios1->count())
            @foreach ($funcionarios1 as $f)
            <div class="col">
              <div  data-aos="zoom-in-left" class="card shadow-sm mb-3">
                <img loading="lazy" src="{{ url($f->url_imagen) }}" style="width: 350px;height: 350px" class="img-fluid rounded mt-0 p-1" alt="team-img">
                <div class="card-body">
                  <p class="card-text" style="font-weight: bolder">{{$f->apep}} {{$f->apem}} {{$f->name}}</p>
                  <p class="card-text">Cargo: {{$f->cargo }}</p>
                      <!--  
                      <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                      <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button> -->
                     <small class="text-muted"><i class="fas fa-at" style="color: #747d84"></i><b> {{$f->email}}</b></small><br>
                     <small class="text-muted"><i class="fab fa-whatsapp" style="color: #747d84"></i><b> {{$f->telefono}}</b></small>
                     <small class="text-muted float-right"><a href="perfiles/{{$f->id}}"><strong>Perfil <i class="fas fa-arrow-circle-right" style="color: green"></i></strong></a></small>
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
            <img src="{{ url('img\not-found.png') }}" class="img-fluid" alt="">
            @endif
          </div>
          <hr style="height: 0.5px;background: yellowgreen">

          @else
              @if ($o->id==28)
              <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @if ($funcionarios2->count())
                @foreach ($funcionarios2 as $f)
                <div class="col">
                  <div  data-aos="zoom-in-left" class="card shadow-sm mb-3">
                    <img loading="lazy" src="{{ url($f->url_imagen) }}" style="width: 350px;height: 350px" class="img-fluid rounded mt-0 p-1" alt="team-img">
                    <div class="card-body">
                      <p class="card-text" style="font-weight: bolder">{{$f->apep}} {{$f->apem}} {{$f->name}}</p>
                      <!-- <p class="ts-designation">Oficina: {{$f->nombre}}</p> -->
                      <p class="card-text">Cargo: {{$f->cargo }}</p>
                          <!--  
                          <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                          <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button> -->
                         <small class="text-muted"><i class="fas fa-at" style="color: #747d84"></i><b> {{$f->email}}</b></small><br>
                         <small class="text-muted"><i class="fab fa-whatsapp" style="color: #747d84"></i><b> {{$f->telefono}}</b></small>
                         <small class="text-muted float-right"><a href="perfiles/{{$f->id}}"><strong>Perfil <i class="fas fa-arrow-circle-right" style="color: green"></i></strong></a></small>
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
                <img src="{{ url('img\not-found.png') }}" class="img-fluid" alt="">
                @endif
              </div>
              <hr style="height: 0.5px;background: yellowgreen">
              @else
                  @if ($o->id==29)
                  <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    @if ($funcionarios3->count())
                    @foreach ($funcionarios3 as $f)
                    <div class="col">
                      <div  data-aos="zoom-in-left" class="card shadow-sm mb-3">
                        <img loading="lazy" src="{{ url($f->url_imagen) }}" style="width: 350px;height: 350px" class="img-fluid rounded mt-0 p-1" alt="team-img">
                        <div class="card-body">
                          <p class="card-text" style="font-weight: bolder">{{$f->apep}} {{$f->apem}} {{$f->name}}</p>
                          <!-- <p class="ts-designation">Oficina: {{$f->nombre}}</p> -->
                          <p class="card-text">Cargo: {{$f->cargo }}</p>
                              <!--  
                              <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                              <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button> -->
                             <small class="text-muted"><i class="fas fa-at" style="color: #747d84"></i><b> {{$f->email}}</b></small><br>
                             <small class="text-muted"><i class="fab fa-whatsapp" style="color: #747d84"></i><b> {{$f->telefono}}</b></small>
                             <small class="text-muted float-right"><a href="perfiles/{{$f->id}}"><strong>Perfil <i class="fas fa-arrow-circle-right" style="color: green"></i></strong></a></small>
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
                    <img src="{{ url('img\not-found.png') }}" class="img-fluid" alt="">
                    @endif
                  </div>
                  <hr style="height: 0.5px;background: yellowgreen">

                  @else
                      @if ($o->id==30)
                      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                        @if ($funcionarios4->count())
                        @foreach ($funcionarios4 as $f)
                        <div class="col">
                          <div  data-aos="zoom-in-left" class="card shadow-sm mb-3">
                            <img loading="lazy" src="{{ url($f->url_imagen) }}" style="width: 350px;height: 350px" class="img-fluid rounded mt-0 p-1" alt="team-img">
                            <div class="card-body">
                              <p class="card-text" style="font-weight: bolder">{{$f->apep}} {{$f->apem}} {{$f->name}}</p>
                              <!-- <p class="ts-designation">Oficina: {{$f->nombre}}</p> -->
                              <p class="card-text">Cargo: {{$f->cargo }}</p>
                                  <!--  
                                  <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                  <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button> -->
                                 <small class="text-muted"><i class="fas fa-at" style="color: #747d84"></i><b> {{$f->email}}</b></small><br>
                                 <small class="text-muted"><i class="fab fa-whatsapp" style="color: #747d84"></i><b> {{$f->telefono}}</b></small>
                                 <small class="text-muted float-right"><a href="perfiles/{{$f->id}}"><strong>Perfil <i class="fas fa-arrow-circle-right" style="color: green"></i></strong></a></small>
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
                        <img src="{{ url('img\not-found.png') }}" class="img-fluid" alt="">
                        @endif
                      </div>
                      <hr style="height: 0.5px;background: yellowgreen">

                      @else
                        @if ($o->id==31)
                          <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                            @if ($funcionarios5->count())
                            @foreach ($funcionarios5 as $f)
                            <div class="col">
                              <div  data-aos="zoom-in-left" class="card shadow-sm mb-3">
                                <img loading="lazy" src="{{ url($f->url_imagen) }}" style="width: 350px;height: 350px" class="img-fluid rounded mt-0 p-1" alt="team-img">
                                <div class="card-body">
                                  <p class="card-text" style="font-weight: bolder">{{$f->apep}} {{$f->apem}} {{$f->name}}</p>
                                  <!-- <p class="ts-designation">Oficina: {{$f->nombre}}</p> -->
                                  <p class="card-text">Cargo: {{$f->cargo }}</p>
                                      <!--  
                                      <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                      <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button> -->
                                     <small class="text-muted"><i class="fas fa-at" style="color: #747d84"></i><b> {{$f->email}}</b></small><br>
                                     <small class="text-muted"><i class="fab fa-whatsapp" style="color: #747d84"></i><b> {{$f->telefono}}</b></small>
                                     <small class="text-muted float-right"><a href="perfiles/{{$f->id}}"><strong>Perfil <i class="fas fa-arrow-circle-right" style="color: green"></i></strong></a></small>
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
                            <img src="{{ url('img\not-found.png') }}" class="img-fluid" alt="">
                            @endif
                          </div>
                          
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