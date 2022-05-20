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
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                      <li class="breadcrumb-item"><a href="#">Comunidad</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Directorio</li>
                    </ol>
                </nav>
              </div>
          </div><!-- Col end -->
        </div><!-- Row end -->
    </div><!-- Container end -->
  </div><!-- Banner text end -->
</div><!-- Banner area end --> 
@endforeach

  
  
  <section id="main-container" class="main-container pb-4">
    <div class="container">
      <!--/ Title row end -->
  
      <div class="col-lg-12">
        <p>Lorem ipsum dolor sit amet consectetur adipiscing elit commodo condimentum nisi, fusce eleifend interdum sem sodales leo luctus ullamcorper nostra lacus, iaculis cras metus dictum eros nullam ornare vitae ridiculus. Feugiat sed pretium in odio fringilla dignissim litora, taciti proin vulputate platea mauris nulla erat cursus, phasellus est himenaeos dapibus curabitur vivamus. Placerat ultricies fringilla aliquam leo cum eu quisque nisi eros nascetur nunc sollicitudin arcu lacinia, magnis nisl magna urna dictumst quis tincidunt diam convallis primis malesuada netus in
          Cubilia laoreet sollicitudin orci auctor posuere interdum nullam ultrices sed rutrum dui lectus habitasse curae, porttitor at faucibus hendrerit ligula iaculis facilisi eros tellus pretium sociosqu cursus. Neque curabitur etiam erat ligula ut augue condimentum rutrum, natoque rhoncus orci nunc ultrices nullam pretium lobortis ante, molestie blandit leo pulvinar aliquet cursus vivamus. Phasellus odio accumsan congue dictumst augue leo posuere condimentum luctus vivamus, curabitur ligula curae cubilia eleifend non velit ridiculus tristique, netus consequat lectus facilisi donec mauris vel egestas orci.</p><br>
      </div><!-- Col end -->
  
      <div class="col-lg-6">
        <div class="input-group mb-3">
          <span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
          <input type="text" class="form-control" placeholder="Buscar Integrante de la comunidad">
        </div>
      </div>
      
      <br><!-- Col end -->
  
      <div class="row" >
        @foreach ($funcionarios as $f)
        <div class="card p-2 col-lg-3 col-md-4 col-sm-6 mb-5 rounded" style="margin: 5px">
          <div  class="ts-team-wrapper">
            <div  class="team-img-wrapper">
              <img  loading="lazy" src="{{$f->url_imagen}}" style="width: 300px;height: 300px;" style="align-content: center" class="img-fluid" alt="team-img">
            </div>
            <div  class="card p-2 ts-team-content-classic">
              <h3 class="ts-name">{{$f->apep}} {{$f->apem}} {{$f->name}}</h3>
              <p class="ts-designation">OFICINA: {{$f->nombre}} - {{$f->organo}}</p>
              <p class="ts-designation">Cargo Administrativo: {{$f->cargo}}</p>
              <p class="ts-designation">FECHA INICIO: {{$f->fech_inicio}}</p>
              <p class="ts-designation">FECHA FIN: {{$f->fech_fin}}</p>
              
              <!-- <p class="ts-description" style="text-align: justify">{{$f->perfil}}</p> -->
              <div class="team-social-icons">
                <!-- <a target="_blank" href="#"><i class="fab fa-facebook-f"></i></a> -->
                <!-- <a target="_blank" href="#"><i class="fab fa-twitter"></i></a> -->
                <a href=""><i class="fas fa-at"> {{$f->email}}</i></a>
                <a href=""><i class="fab fa-whatsapp"> {{$f->telefono}}</i></a><br>
                <a class="link-primary" href="perfiles/{{$f->persona}}"><strong>Ver Perfil</strong></a>
                
              </div>
              <!--/ social-icons-->
            </div>
          </div>
          <!--/ Team wrapper 3 end -->
        </div><!-- Col end -->            
        @endforeach

  <!--
        <div class="col-lg-12 mb-5 mb-lg-0">
          <nav aria-label="Page navigation example">
              <ul class="pagination justify-content-center">
                <li class="page-item"><a class="page-link" href="#"><i class="fas fa-chevron-left"></i></a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">4</a></li>
                <li class="page-item"><a class="page-link" href="#">5</a></li>
                <li class="page-item"><a class="page-link" href="#">6</a></li>
                <li class="page-item"><a class="page-link" href="#">7</a></li>
                <li class="page-item"><a class="page-link" href="#">8</a></li>
                <li class="page-item"><a class="page-link" href="#">9</a></li>
                <li class="page-item"><a class="page-link" href="#">10</a></li>
                <li class="page-item"><a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a></li>
              </ul>
          </nav>
  
        </div> -->
        <div class="col-lg-12 mb-5 mb-lg-0">
          <nav aria-label="Page navigation example">
              <ul class="pagination justify-content-center">
                <li  class="page-item">{{ $funcionarios->links() }}</li>
              </ul>
          </nav>
  
  
  
          
      </div><!-- Content row end -->
    </div><!-- Container end -->
  </section><!-- Main container end -->
@endsection