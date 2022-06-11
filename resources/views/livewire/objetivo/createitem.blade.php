<div class="{{ $vermodal ? 'modal fade show' : 'modal fade' }}" id="exampleModal" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true"
    style=" {{ $vermodal ? 'display: block;' : 'display: none' }}" aria-modal="{{ $vermodal ? 'true' : '' }}" role="dialog">
    
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="font-weight-bold" id="exampleModalLabel">Agregar Subitem a Objetivo</h5>
                <button type="button" wire:click="Cancelar" class="close" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <div class="modal-body">
                {{$objetivo_id}}
                <label class="form-label">Sub item: <strong style="color: red">*</strong></label>
                <textarea class="form-control" name="subitem" rows="3" wire:model="subitem"></textarea>
                @error('subitem')
                    <small class="text-danger">{{ $message }}</small><br>
                @enderror
            </div>
            <div class="modal-footer">
                <button type="button" wire:click="AgregarSubitem()" class="btn btn-primary"><i
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
