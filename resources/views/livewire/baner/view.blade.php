<div class="row d-flex justify-content-center">
    

        <div class="col-md-11 card card-success card-outline mt-1">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <label class="form-label">Titulo de Banner:<strong style="color: red">*</strong> </label>
                        <input type="text" class="form-control" name="titulo" autocomplete="off" wire:model="titulo">
                        @error('titulo')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Subtitulo de Banner:<strong style="color: red">*</strong> </label>
                        <input type="text" class="form-control" name="titulo" autocomplete="off" wire:model="subtitulo">
                        @error('subtitulo')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label mt-1">Cargar imagen <strong style="color: red">*</strong></label><br>
                        <input type="file" id="uploadedfile" wire:model="imgbaner" accept='image/jpg,image/jpeg,image/png'>
                        @error('imgbaner')
                            <br><small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label mt-1">Ubicacion <strong style="color: red">*</strong></label>
                        <select class="form-control" wire:model="ubicacion">
                            <option>Seleccione...</option>
                            <option value="reseña">Reseña Historica</option>
                            <option value="misionvision">Mision y Vision</option>
                            <option value="objetivos">Objetivos</option>
                            <option value="directorio">Directorio</option>
                            <option value="direccion">Direccion</option>
                            <option value="ejecucion">Ejecucion</option>
                            <option value="administracion">Administracion</option>
                            <option value="apoyo">Apoyo</option>
                            <option value="linea">Linea</option>
                            <option value="autonomo">Autonomo</option>
                            <option value="estatuto">Estatuto</option>
                            <option value="rof">ROF</option>
                            <option value="poi">POI</option>
                            <option value="peconvenios">Convenios</option>
                            <option value="norvativo">Normativo</option>
                        </select>
                        @error('ubicacion')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="card-footer d-flex justify-content-center">
                <button type="button" class="btn btn-primary mr-3" wire:click="Guardar"><i class="far fa-save mr-2"></i>Guardar</button>
                <button type="button" class="btn btn-danger" wire:click="limpiar"><i class="far fa-times-circle mr-2"></i>Cancelar</button>
            </div>
        </div>
    
    <div class="col-md-12 card card-warning card-outline mt-1">
        <div class="card-body">
            <table class="table table-sm">
                <thead class="bg-olive">
                    <tr style="text-align: center;">
                        <th scope="col">#</th>
                        <th scope="col">Titulo Baner</th>
                        <th scope="col">SubTitulo Baner</th>
                        <th scope="col" style="width: 100px">Imagen</th>
                        <th scope="col" style="width: 100px">Ubicacion Banner</th>
                        <th scope="col" style="width: 110px">Estado</th>
                        <th scope="col" style="width: 100px">Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $cont = 1;
                    @endphp
                    @foreach ($baners as $baner)
                        <tr>
                            <th style="vertical-align: middle" scope="row">{{ $cont++ }}</th>
                            <td style="vertical-align: middle">{{ $baner->titulo }}</td>
                            <td style="vertical-align: middle">{{ $baner->subtitulo }}</td>
                            <td style="vertical-align: middle"><img src="{{ $baner->imagenes->url_imagen }}" alt="" class="img-thumbnail"> </td>
                            <td style="vertical-align: middle; text-align: center;"><span class="badge bg-info"">{{$baner->estado}}</span></td>
                            <td style=" vertical-align: middle; text-align: center;">
                                <span class="badge {{ $baner->activo == '0' ? 'bg-danger' : 'bg-success' }}">{{ $baner->activo == '0' ? 'No visible en pagina' : 'Visible en pagina' }}</span>
                            </td>
                            <td style="vertical-align: middle;">
                                <div class="d-flex justify-content-end">
                                    <button type="button"
                                        class="btn {{ $baner->activo == '1' ? 'btn-danger' : 'btn-success' }} btn-sm mr-1"
                                        wire:click="CambiarVisibilidadMision({{ $baner->id }})"><i
                                            class="fas {{ $baner->activo == '1' ? 'fa-eye-slash' : 'fa-eye' }}"></i>
                                    </button>
                                    <button type="button" class="btn btn-info btn-sm mr-1"
                                        wire:click="Seleccionar({{ $baner->id }})">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm" wire:click="$emit('confirmEliminacion',{{ $baner->id }})"> <i class="fas fa-trash-alt"></i>
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

<script>
    function miNotificacion() {
        Livewire.on('alertaBaner', function(datos) {
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