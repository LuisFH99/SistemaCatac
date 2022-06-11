<div class="{{ $vermodal ? 'modal fade show' : 'modal fade' }}" id="exampleModal" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true"
    style=" {{ $vermodal ? 'display: block;' : 'display: none' }}" aria-modal="{{ $vermodal ? 'true' : '' }}"
    role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            @if ($fromresena)
                <div class="modal-header">
                    <h5 class="font-weight-bold" id="exampleModalLabel">
                        {{ $resena_id == 0 ? 'CREAR REGISTRO' : 'EDITAR REGISTRO' }}</h5>
                    <button type="button" wire:click="Cancelar" class="close" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label class="form-label">Titulo <strong style="color: red">*</strong> </label>
                    <input type="text" class="form-control" name="titulo" autocomplete="off" wire:model="titulo">
                    @error('titulo')
                        <small class="text-danger">{{ $message }}</small><br>
                    @enderror
                    <label class="form-label">Descripcion <strong style="color: red">*</strong> </label>
                    <textarea class="form-control" name="descripcion" rows="5" wire:model="descripcion"></textarea>
                    @error('descripcion')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="modal-footer">
                    <button type="button" wire:click="GuardarResena" class="btn btn-primary"><i
                            class="far fa-save mr-2"></i>Guardar</button>
                    <button type="button" wire:click="Cancelar" class="btn btn-danger"><i
                            class="fas fa-times-circle mr-2"></i>Cancelar</button>
                </div>
            @else
                <div class="modal-header">
                    <h5 class="font-weight-bold" id="exampleModalLabel">Agregar Imagen a: {{ $titulo }}</h5>
                    <button type="button" wire:click="Cancelar" class="close" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label class="form-label">Aqui subir las imagenes <strong style="color: red">*</strong></label><br>
                    
                    <input type="file" wire:model="imagenes" accept='image/jpg,image/jpeg,image/png' multiple>
                    @error('imagenes.*')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror 
                </div>
                <div class="modal-footer">
                    <button type="button" wire:click="GuardarImagenes" class="btn btn-primary"><i
                            class="far fa-save mr-2"></i>Guardar</button>
                    <button type="button" wire:click="Cancelar" class="btn btn-danger"><i
                            class="fas fa-times-circle mr-2"></i>Cancelar</button>
                </div>
            @endif

        </div>
    </div>
</div>
@if ($vermodal)
    <div class="modal-backdrop fade show"></div>
@endif

<script>
    function miNotificacion() {
        Livewire.on('alertaResena', function(datos) {
            $(document).Toasts('create', {
                class: datos.modo,
                title: 'Mensaje de Sistema',
                body: datos.mensaje,
                autohide: true,
                delay: 2000
            })
        });

    }
</script>
