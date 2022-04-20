<div id="accordion">
    <div class="form-group row ">
        <div class="input-group rounded col-md-9 mt-2">
            <label for="" class="col-md-3 col-form-label">Buscar
                Entidad:</label>
            <input type="search" wire:model="buscar" class="form-control rounded d-flex" placeholder="Buscar"
                aria-label="Search" aria-describedby="search-addon" />
            <div class="input-group-append">
                <span class="input-group-text border-0" id="search-addon">
                    <i class="fas fa-search"></i>
            </div>
            </span>
        </div>
    </div>
    @if (count($resenas) > 0)
        @foreach ($resenas as $resena)
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <h3 class="card-title font-weight-bold text-uppercase mt-1">{{ $resena->titulo }}</h3>
                        </div>
                        <div class="col-3 d-flex justify-content-end">
                            <span
                                class="badge {{ $resena->activo == '0' ? 'bg-danger' : 'bg-success' }}">{{ $resena->activo == '0' ? 'No visible en pagina' : 'Visible en pagina' }}</span>
                        </div>
                        <div class="col-3 d-flex justify-content-end">
                            <a data-toggle="collapse" href="#collapse{{ $resena->id }}"
                                class="btn btn-success btn-sm mr-1"><i class="fas fa-eye"></i>
                            </a>
                            <a class="btn btn-info btn-sm" wire:click="enivarid({{ $resena->id }})">
                                <i class="fas fa-clipboard-list"></i>
                            </a>

                        </div>
                    </div>
                </div>
                <div id="collapse{{ $resena->id }}" class="collapse" data-parent="#accordion">
                    <div class="card-body">
                        <div class="row">
                            <div class="callout callout-success col-8">
                                <p>{{ $resena->descripcion }} </p>
                            </div>
                            <div class="card card-primary card-outline col-4">
                                @if (count($resena->resenaimagenes) > 0)
                                    <div class="row">
                                        @foreach ($resena->resenaimagenes as $imagen)
                                            <div class="position-relative col-4 ml-auto">
                                                <img src="{{$imagen->url_imagen}}" alt="Photo 1"
                                                    class="img-thumbnail">

                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <p>Sin registro de imagenes</p>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        @endforeach
        {{-- <div class="col-12 d-flex justify-content-center">
            {{ $resena->links() }}
        </div> --}}
    @else
        <div class="d-flex justify-content-center">
            <div class="card col-7">
                <div class="card-header d-flex justify-content-center">
                    <h3 class="card-title font-weight-bold "> NO SE ENCONTRA NINGUN REGISTRO EN EL SISTEMA</h3>
                </div>
            </div>
        </div>
    @endif

    {{ $resenas }}

</div>
