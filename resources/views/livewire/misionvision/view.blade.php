<div id="accordion">
    <br>
    <div class="card ">
        <div class="card-header">
            <div class="row">
                <div class="col-9">
                    <h3 class="card-title font-weight-bold text-uppercase mt-1">VISION</h3>
                </div>

                <div class="col-3 d-flex justify-content-end">
                    <a data-toggle="collapse" href="#collapsevision" class="btn btn-primary btn-sm mr-1"><i
                            class="fas fa-info-circle"></i>
                    </a>
                    <a class="btn btn-info btn-sm mr-1" wire:click="MostrarModal(1)">
                        <i class="fas fa-plus-circle"></i>
                    </a>

                    {{-- <a class="btn btn-info btn-sm" wire:click="enivarid({{ $resena->id }})">
                                <i class="fas fa-clipboard-list"></i>
                            </a> --}}

                </div>
            </div>
        </div>
        <div id="collapsevision" class="collapse" data-parent="#accordion">
            <div class="card-body">
                <div class="row">
                    <table class="table table-sm table-bordered">
                        <thead class="bg-blue">
                            <tr style="text-align: center;">
                                <th scope="col">#</th>
                                <th scope="col">Descripcion</th>
                                <th scope="col" style="width: 150px">Imagen</th>
                                <th scope="col" style="width: 100px">Posicion Imagen</th>
                                <th scope="col" style="width: 100px">Estado</th>
                                <th scope="col">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $cont = 1;
                            @endphp
                            @foreach ($visiones as $vision)
                                <tr>
                                    <th style="vertical-align: middle" scope="row">{{ $cont++ }}</th>
                                    <td style="vertical-align: middle">{{ $vision->descripcion }}</td>
                                    <td style="vertical-align: middle"><img src="{{ $vision->imagenes->url_imagen }}"
                                            alt="" class="img-thumbnail"> </td>
                                    <td style="vertical-align: middle; text-align: center;"><span class="badge bg-info"">{{ $vision->posicion == '1' ? 'Lado derecho' : 'Lado Izquierdo' }}</span>
                                    </td>
                                    <td style=" vertical-align: middle; text-align: center;"><span
                                                class="badge {{ $vision->activo == '0' ? 'bg-danger' : 'bg-success' }}">{{ $vision->activo == '0' ? 'No visible en pagina' : 'Visible en pagina' }}</span>
                                    </td>

                                    <td style="vertical-align: middle;">
                                        <div class="d-flex justify-content-end">
                                            <button type="button"
                                                class="btn {{ $vision->activo == '1' ? 'btn-danger' : 'btn-success' }} btn-sm mr-1"
                                                wire:click="CambiarVisibilidadVision({{ $vision->id }})"><i
                                                    class="fas {{ $vision->activo == '1' ? 'fa-eye-slash' : 'fa-eye' }}"></i>
                                            </button>
                                            <button type="button" class="btn btn-info btn-sm mr-1"
                                                wire:click="Seleccionar({{ $vision->id }},1)">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button type="button" class="btn btn-danger btn-sm"
                                                wire:click="$emit('confirmEliminacion',[{{ $vision->id }},1])"> <i
                                                    class="far fa-trash-alt"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

    <div class="card ">
        <div class="card-header">
            <div class="row">
                <div class="col-9">
                    <h3 class="card-title font-weight-bold text-uppercase mt-1">Mision</h3>
                </div>

                <div class="col-3 d-flex justify-content-end">
                    <a data-toggle="collapse" href="#collapsemision" class="btn btn-primary btn-sm mr-1"><i
                            class="fas fa-info-circle"></i>
                    </a>
                    <a class="btn btn-info btn-sm mr-1" wire:click="MostrarModal(2)">
                        <i class="fas fa-plus-circle"></i>
                    </a>

                    {{-- <a class="btn btn-info btn-sm" wire:click="enivarid({{ $resena->id }})">
                                <i class="fas fa-clipboard-list"></i>
                            </a> --}}

                </div>
            </div>
        </div>
        <div id="collapsemision" class="collapse" data-parent="#accordion">
            <div class="card-body">
                <div class="row">
                    <table class="table table-sm">
                        <thead class="bg-blue">
                            <tr style="text-align: center;">
                                <th scope="col">#</th>
                                <th scope="col">Descripcion</th>
                                <th scope="col" style="width: 150px">Imagen</th>
                                <th scope="col" style="width: 100px">Posicion Imagen</th>
                                <th scope="col" style="width: 100px">Estado</th>
                                <th scope="col">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $cont = 1;
                            @endphp
                            @foreach ($misiones as $mision)
                                <tr>
                                    <th style="vertical-align: middle" scope="row">{{ $cont++ }}</th>
                                    <td style="vertical-align: middle">{{ $mision->descripcion }}</td>
                                    <td style="vertical-align: middle"><img src="{{ $mision->imagenes->url_imagen }}"
                                            alt="" class="img-thumbnail"> </td>
                                    <td style="vertical-align: middle; text-align: center;"><span class="badge bg-info"">{{ $mision->posicion == '1' ? 'Lado derecho' : 'Lado Izquierdo' }}</span>
                                            </td>
                                    <td style=" vertical-align: middle; text-align: center;"><span
                                                class="badge {{ $mision->activo == '0' ? 'bg-danger' : 'bg-success' }}">{{ $mision->activo == '0' ? 'No visible en pagina' : 'Visible en pagina' }}</span>
                                    </td>
                                    <td style="vertical-align: middle;">
                                        <div class="d-flex justify-content-end">
                                            <button type="button"
                                                class="btn {{ $mision->activo == '1' ? 'btn-danger' : 'btn-success' }} btn-sm mr-1"
                                                wire:click="CambiarVisibilidadMision({{ $mision->id }})"><i
                                                    class="fas {{ $mision->activo == '1' ? 'fa-eye-slash' : 'fa-eye' }}"></i>
                                            </button>
                                            <button type="button" class="btn btn-info btn-sm mr-1"
                                                wire:click="Seleccionar({{ $mision->id }},2)">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button type="button" class="btn btn-danger btn-sm"
                                                wire:click="$emit('confirmEliminacion',[{{ $mision->id }},2])"> <i class="far fa-trash-alt"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
    @include('livewire.misionvision.create')

</div>

<script>
    function miNotificacion() {
        Livewire.on('alertaMisionVision', function(datos) {
            $(document).Toasts('create', {
                class: datos.modo,
                title: 'Mensaje de Sistema',
                body: datos.mensaje,
                autohide: true,
                delay: 2000
            })
            document.getElementById("uploadedfile").value = "";
        });

    }
    window.onload = function() {
        miNotificacion();
    }
</script>
