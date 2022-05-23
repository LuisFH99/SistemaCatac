@extends('layouts.web')
@section('contenido')
<div><br>
    @foreach ($perfiles as $f)
    <div class="card p-2 col-lg-3 col-md-4 col-sm-6 mb-5 rounded" style="margin: 5px">
      <div  class="ts-team-wrapper">
        <div  class="team-img-wrapper">
          <img  loading="lazy" src="{{$f->url_imagen}}" style="width: 300px;height: 300px;" style="align-content: center" class="img-fluid" alt="team-img">
        </div>
        <div  class="card p-2 ts-team-content-classic">
          <h6 class="ts-name">{{$f->apep}} {{$f->apem}} {{$f->name}}</h6><br>
          <p class="ts-designation">Oficina: {{$f->nombre}} - {{$f->organo}}</p>
          <!-- <p class="ts-designation">Cargo Administrativo: {{$f->cargo}}</p>
          <p class="ts-designation">FECHA INICIO: {{$f->fech_inicio}}</p>
          <p class="ts-designation">FECHA FIN: {{$f->fech_fin}}</p> -->
          
          <!-- <p class="ts-description" style="text-align: justify">{{$f->perfil}}</p> -->
          <div class="team-social-icons" style="margin-top: 5%">
            <!-- <a target="_blank" href="#"><i class="fab fa-facebook-f"></i></a> -->
            <!-- <a target="_blank" href="#"><i class="fab fa-twitter"></i></a> -->
            <a style="cursor: pointer"><i class="fas fa-at"> {{$f->email}}</i></a>
            <a style="cursor: pointer"><i class="fab fa-whatsapp"> {{$f->telefono}}</i></a><br><br> 
          </div>  
          <!--/ social-icons-->
        </div>
      </div>
      <!--/ Team wrapper 3 end -->
    </div><!-- Col end -->            
    @endforeach
</div>
@endsection