<div class="col-md-11 card card-success card-outline mt-1">
    <div class="card-body">
        <div class="row">
            
            <div class="col-md-6">
                <div class="col-12">
                    <label class="form-label">Titulo: <strong style="color: red">*</strong> </label>
                    <input type="text" class="form-control" name="titulo" autocomplete="off" tabindex="1" wire:model="titulo">
                    @error('titulo')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-12">
                    <label class="form-label mt-1">Cargar imagen <strong style="color: red">*</strong></label><br>
                    <input type="file" id="uploadedfile" wire:model="imgcomunicado" accept='image/jpg,image/jpeg,image/png' tabindex="3">
                    @error('imgcomunicado')
                        <br><small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

            </div>
            <div class="col-md-6">
                <div class="col-12">
                    <label class="form-label">Descripcion: <strong style="color: red">*</strong> </label>
                    <textarea class="form-control" id="descripcion" rows="4" name="descripcion" wire:model="descripcion" tabindex="2"></textarea>
                    @error('descripcion')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
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