<div id="accordion">
    <div class="form-group row ">
        <div class="input-group rounded col-md-9 mt-2">
            <label for="" class="col-form-label mr-2">Crear Nueva Noticia:</label>
            <button type="button" class="btn btn-info" wire:click="MostrarModal"><i class="fas fa-plus-circle mr-1"></i>Nuevo</button>
        </div>
        
        @include('livewire.noticia.create')
    </div>
    @if (count($noticias) > 0)
        @foreach ($noticias as $noticia)
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <h3 class="card-title font-weight-bold text-uppercase mt-1">{{ $noticia->titulo }}</h3>
                        </div>
                        <div class="col-3 d-flex justify-content-end">
                            <span
                                class="badge {{ $noticia->activo == '0' ? 'bg-danger' : 'bg-success' }}">{{ $noticia->activo == '0' ? 'No visible en pagina' : 'Visible en pagina' }}</span>
                        </div>
                        <div class="col-3 d-flex justify-content-end">
                            <a class="btn {{ $noticia->activo == '1' ? 'btn-danger' : 'btn-success' }} btn-sm mr-1"
                                wire:click="CambiarVisibilidad({{ $noticia->id }})"><i
                                    class="fas {{ $noticia->activo == '1' ? 'fa-eye-slash' : 'fa-eye' }}"></i>
                            </a>
                            <a data-toggle="collapse" href="#collapse{{ $noticia->id }}"
                                class="btn btn-primary btn-sm mr-1"><i class="fas fa-info-circle"></i>
                            </a>
                            <a class="btn btn-info btn-sm mr-1" wire:click="SeleccionarNoticia({{ $noticia->id }})">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a class="btn btn-danger btn-sm" wire:click="$emit('confirmEliminacion',{{ $noticia->id}})">
                                <i class="fas fa-trash-alt"></i>
                            </a>

                        </div>
                    </div>
                </div>
                <div id="collapse{{ $noticia->id }}" class="collapse" data-parent="#accordion">
                    <div class="card-body">
                        <div class="row">
                            <div class="callout callout-success col-8">
                                <p>{{ $noticia->descripcion }} </p>
                            </div>
                            <div class="card card-primary card-outline col-4">
                                <i class="fas fa-plus-circle my-1" style="color:blue" wire:click="FromImagenes({{$noticia->id}})"></i>
                                @if (count($noticia->noticiaimagenes) > 0)
                                    <div class="row">
                                        @foreach ($noticia->noticiaimagenes as $imagen)
                                            <div class="position-relative col-4 ml-auto text-center">
                                                <img src="{{ $imagen->url_imagen }}" alt="Photo 1"
                                                    class="img-thumbnail">
                                                <i class="fas fa-times-circle" style="color:#DC3545" wire:click="QuitarImagen({{$noticia->id}},{{$imagen->id}})"></i>
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <p>No hay imagenes registradas</p>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        @endforeach
    @else
        <div class="d-flex justify-content-center">
            <div class="card col-7">
                <div class="card-header d-flex justify-content-center">
                    <h3 class="card-title font-weight-bold "> NO SE ENCONTRO NINGUN REGISTRO EN EL SISTEMA</h3>
                </div>
            </div>
        </div>
    @endif

</div>

<script>
    window.onload = function() {
        miNotificacion();
    }
</script>