<div class="row d-flex justify-content-center">
    
    @include('livewire.comunicado.from-create')
    
    <div class="col-md-12 card card-warning card-outline mt-1">
        <div class="card-body">
            <table class="table table-sm table-bordered">
                <thead class="bg-black">
                    <tr style="text-align: center;">
                        <th scopre="col"style="width: 60px">Item</th>
                        <th scope="col">Titulo</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col" style="width: 150px">Imagen</th>
                        <th scope="col" style="width: 110px">Estado</th>
                        <th scope="col" style="width: 100px">Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $cont = 1;
                    @endphp
                    @if(!(is_null($comunicados)))
                        @foreach ($comunicados as $comunicado)
                            <tr>
                                <th style="font-size: 12px; vertical-align: middle; text-align: center;">{{$cont++}}</th>
                                <td style="font-size: 12px; vertical-align: middle; text-align: center;">{{$comunicado->titulo}}</td>
                                <td style="font-size: 12px; vertical-align: middle;  text-align:justify;">{{$comunicado->descripcion}}</td>
                                <td style="vertical-align: middle;"><img src="{{$comunicado->imagenes->url_imagen}}" alt="" class="img-thumbnail"></td>
                                <td style=" vertical-align: middle; text-align: center;">
                                    <span class="badge {{ $comunicado->activo == '0' ? 'bg-danger' : 'bg-success' }}">{{ $comunicado->activo == '0' ? 'No visible en pagina' : 'Visible en pagina' }}</span>
                                </td>
                                <td style="vertical-align: middle;">
                                    <div class="d-flex justify-content-end">
                                        <button type="button"
                                            class="btn {{ $comunicado->activo == '1' ? 'btn-danger' : 'btn-success' }} btn-sm mr-1"
                                            wire:click="CambiarVisibilidad({{ $comunicado->id }})"><i
                                                class="fas {{ $comunicado->activo == '1' ? 'fa-eye-slash' : 'fa-eye' }}"></i>
                                        </button>
                                        <button type="button" class="btn btn-info btn-sm mr-1"
                                            wire:click="Seleccionar({{ $comunicado->id }})">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button type="button" class="btn btn-danger btn-sm" wire:click="$emit('confirmEliminacion',{{ $comunicado->id }})"> <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        
                    @else
                    <tr style="text-align: center;">
                        <td colspan="6">No hay datos registrados en el sistema</td>
                    </tr>
                    @endif

                </tbody>
            </table>
        </div>
    </div>
    
    {{-- @include('livewire.objetivo.createitem') --}}
</div>

<script>
    function miNotificacion() {
        Livewire.on('alertaComunicado', function(datos) {
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