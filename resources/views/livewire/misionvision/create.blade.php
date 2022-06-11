<div class="{{ $vermodal ? 'modal fade show' : 'modal fade' }}" id="exampleModal" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true"
    style=" {{ $vermodal ? 'display: block;' : 'display: none' }}" aria-modal="{{ $vermodal ? 'true' : '' }}" role="dialog">
    
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="font-weight-bold" id="exampleModalLabel">{{($vision_id!=0)||($mision_id!=0)?'Edicion de ':'Nuevo'}}Registro {{$fromvision ? 'Vision' : 'Mision'}}</h5>
                <button type="button" wire:click="Cancelar" class="close" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <div class="modal-body">
                <label class="form-label">Ingrese la descripcion: <strong style="color: red">*</strong></label>
                <textarea class="form-control" name="descvision" rows="5" wire:model="descvision"></textarea>
                @error('descvision')
                    <small class="text-danger">{{ $message }}</small><br>
                @enderror
                <label class="form-label">Cargar imagen <strong style="color: red">*</strong></label><br>

                <input type="file" id="uploadedfile" wire:model="imgvision" accept='image/jpg,image/jpeg,image/png'>
                @error('imgvision')
                    <br><small class="text-danger">{{ $message }}</small>
                @enderror
                <label class="form-label">Posición de la imagen: <strong style="color: red">*</strong></label><br>
                <select class="form-control" wire:model="posicion">
                    <option value="1">Derecha</option>
                    <option value="2">Izquierda </option>
                </select>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click=" {{$fromvision ? 'GuardarInformacion(1)' : 'GuardarInformacion(2)'}}" class="btn btn-primary"><i
                        class="far fa-save mr-2"></i>Guardar</button>
                <button type="button" wire:click="Cancelar" class="btn btn-danger"><i
                        class="fas fa-times-circle mr-2"></i>Cancelar</button>
            </div>

        </div>
    </div>
</div>
@if ($vermodal)
    <div class="modal-backdrop fade show"></div>
@endif
