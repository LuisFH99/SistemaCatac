<div class="row d-flex justify-content-center">

    <div class="col-md-11 card card-success card-outline mt-1">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <label class="form-label">Descripcion: <strong style="color: red">*</strong> </label>
                    <input type="text" class="form-control" name="descripcion" autocomplete="off" wire:model="descripcion">
                    @error('descripcion')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label mt-1">Tipo Objetivo: <strong style="color: red">*</strong></label>
                    <select class="form-control" wire:model="tipo">
                        <option>Seleccione...</option>
                        @foreach ($tipos as $item)
                            <option value="{{$item->id}}">{{$item->tipo}}</option>
                        @endforeach
                    </select>
                    @error('tipo')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label mt-1">Cargar imagen <strong style="color: red">*</strong></label><br>
                    <input type="file" id="uploadedfile" wire:model="imgobjetivo" accept='image/jpg,image/jpeg,image/png'>
                    @error('imgobjetivo')
                        <br><small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label">Posición de la imagen: <strong style="color: red">*</strong></label><br>
                    <select class="form-control" wire:model="posicion">
                        <option value="1">Derecha</option>
                        <option value="2">Izquierda </option>
                    </select>
                </div>
                
            </div>
        </div>

        <div class="card-footer d-flex justify-content-center">
            <button type="button" class="btn btn-primary mr-3" wire:click="Guardar"><i
                    class="far fa-save mr-2"></i>Guardar</button>
            <button type="button" class="btn btn-danger" wire:click="limpiar"><i
                    class="far fa-times-circle mr-2"></i>Cancelar</button>
        </div>
    </div>

    <div class="col-md-12 card card-warning card-outline mt-1">
        <div class="card-body">
            <table class="table table-sm table-bordered">
                <thead class="bg-black">
                    <tr style="text-align: center;">
                        <th scopre="col"style="width: 60px">Item</th>
                        
                        <th scope="col">Descripcion</th>
                        <th scope="col" style="width: 100px">Tipo</th>
                        <th scope="col" style="width: 150px">Imagen</th>
                        <th scope="col" style="width: 100px">Posicion Imagen</th>
                        <th scope="col" style="width: 110px">Estado</th>
                        <th scope="col" style="width: 100px">Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $cont = 1;
                    @endphp
                    @foreach ($objetivos as $dato)
                        @if (is_null($dato->objetivos_id))
                            <tr>
                                <th style="vertical-align: middle" scope="row">&nbsp;&nbsp;{{ $cont }}</th>
                                <td style="vertical-align: middle"><strong>{{ $dato->objetivo }}</strong></td>
                                <td style="vertical-align: middle;text-align: center;"><strong>{{ $dato->tipo->tipo }}</strong></td>
                                <td style="vertical-align: middle"><img src="{{ isset($dato->imagenes->url_imagen) ? $dato->imagenes->url_imagen : ''}}" alt="" class="img-thumbnail"> </td>
                                <td style="vertical-align: middle; text-align: center;"><span class="badge bg-info"">{{ $dato->posicion == '1' ? 'Lado derecho' : 'Lado Izquierdo' }}</span>
                                </td>
                                <td style=" vertical-align: middle; text-align: center;">
                                    <span class="badge {{ $dato->activo == '0' ? 'bg-danger' : 'bg-success' }}">{{ $dato->activo == '0' ? 'No visible en pagina' : 'Visible en pagina' }}</span>
                                </td>
                                <td style="vertical-align: middle;">
                                    <div class="d-flex justify-content-end">
                                        <button type="button" class="btn {{ $dato->activo == '1' ? 'btn-danger' : 'btn-success' }} btn-sm mr-1" wire:click="CambiarVisibilidadMision({item->id }})"><i class="fas {{ $dato->activo == '1' ? 'fa-eye-slash' : 'fa-eye' }}"></i>
                                        </button>
                                        <button type="button" class="btn btn-primary btn-sm mr-1" wire:click="MostrarModal({{ $dato->id }})"><i class="fas fa-list"></i>
                                        </button>
                                        <button type="button" class="btn btn-info btn-sm mr-1"
                                            wire:click="Seleccionar({{ $dato->id }})">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button type="button" class="btn btn-danger btn-sm"
                                            wire:click="$emit('confirmEliminacion',{{ $dato->id }})"> <i
                                                class="fas fa-trash-alt"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @php
                                $subcont = 1;
                            @endphp
                            @foreach ($dato->ObjetivoHijo as $subitem)
                                @if($subitem->borrado==0)
                                    <tr>
                                        <th style="vertical-align: middle" scope="row">&nbsp;&nbsp;{{$cont}}.{{$subcont++}}</th>
                                        
                                        <td colspan="5">&nbsp;&nbsp;{{ $subitem->objetivo }}</td>
                                        <td style="text-align: center;"><button type="button" class="btn btn-info btn-sm" wire:click="SeleccionarSubitem({{ $subitem->id }})"><i class="fas fa-edit"></i></button> <button class="btn btn-danger btn-sm" wire:click="QuitarSubitem({{ $subitem->id }})"><i class="fas fa-trash"></i></button> </td>
                                        
                                    </tr>
                                @endif
                                
                            @endforeach
                            @php
                                $cont++;
                            @endphp
                        @endif
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
    @include('livewire.objetivo.createitem')
</div>

<script>
    function miNotificacion() {
        Livewire.on('alertaObjetivo', function(datos) {
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
