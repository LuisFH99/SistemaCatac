<div class="{{ $vermodal ? 'modal fade show' : 'modal fade' }}" id="exampleModal" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true"
    style=" {{ $vermodal ? 'display: block;' : 'display: none' }}" aria-modal="{{ $vermodal ? 'true' : '' }}" role="dialog">
    
    <div class="modal-dialog">
        <div class="modal-content">
            @if ($fromproducto)
                <div class="modal-header">
                    
                    <h5 class="font-weight-bold" id="exampleModalLabel">{{($producto_id!=0)?'Edicion de ':'Agregar'}} Producto</h5>
                    <button type="button" wire:click="Cancelar" class="close" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                
                <div class="modal-body">
                    <label class="form-label">Ingrese Nombre del Producto: <strong style="color: red">*</strong></label>
                    <input type="text" class="form-control" name="producto" autocomplete="off" tabindex="1" wire:model="producto">
                    @error('producto')
                        <small class="text-danger">{{ $message }}</small><br>
                    @enderror
                    <label class="form-label">Ingrese Descripcion del Producto: <strong style="color: red">*</strong></label>
                    <textarea class="form-control" name="descproducto" rows="2" wire:model="descproducto"></textarea>
                    @error('descproducto')
                        <small class="text-danger">{{ $message }}</small><br>
                    @enderror
                    <label class="form-label">Cargar imagen <strong style="color: red">*</strong></label><br>

                    <input type="file" id="uploadedfileproducto" wire:model="imgproducto" accept='image/jpg,image/jpeg,image/png'>
                    @error('imgproducto')
                        <br><small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="modal-footer">
                    <button type="button" wire:click=" RegistarProducto()" class="btn btn-primary"><i
                            class="far fa-save mr-2"></i>Guardar</button>
                    <button type="button" wire:click="Cancelar" class="btn btn-danger"><i
                            class="fas fa-times-circle mr-2"></i>Cancelar</button>
                </div>
            @else
                <div class="modal-header">
                    <h5 class="font-weight-bold" id="exampleModalLabel">Desginar Encargado</h5>
                    <button type="button" wire:click="Cancelar" class="close" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-5">
                            <label class="form-label">Ingrese DNI comunero: <strong style="color: red">*</strong></label>
                        </div>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="comunero" autocomplete="off" tabindex="1" wire:model="dnicomunero" maxlength="8">
                            @error('dnicomunero')
                                <small class="text-danger">{{ $message }}</small><br>
                            @enderror</div>
                        <div class="col-md-2">
                            <button type="button" wire:click="Buscar" class="btn btn-primary"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                    @if($encontrado)
                        <label class="form-label">Apellidos y Nombres: </label><h5 class="text-uppercase">{{$nombcomunero}}</h5>
                        <label class="form-label">DNI: {{$dnicomunero}}</label>&nbsp;&nbsp;&nbsp;
                        <label class="form-label">Correo: {{$correo}}</label>&nbsp;&nbsp;&nbsp;
                        <label class="form-label">Telefono: {{$telefono}}</label><br>

                        <label class="form-label">Descripcion: <strong style="color: red">*</strong></label>
                        <textarea class="form-control" name="descencargado" rows="2" wire:model="descencargado"></textarea>
                        @error('descencargado')
                        <small class="text-danger">{{ $message }}</small><br>
                        @enderror
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label">Fecha Inicio: <strong style="color: red">*</strong></label>
                                <input type="date" id="finicio" name="finicio" class="form-control" wire:model="fechainicio">
                                @error('fechainicio')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Fecha Fin: <strong style="color: red">*</strong></label>
                                <input type="date" id="ffinal" name="ffinal" class="form-control" wire:model="fechafinal">
                                @error('fechafinal')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <label class="form-label">Cargar imagen <strong style="color: red">*</strong></label><br>

                        <input type="file" id="uploadedfileencargado" wire:model="imgencargado" accept='image/jpg,image/jpeg,image/png'>
                        @error('imgproducto')
                            <br><small class="text-danger">{{ $message }}</small>
                        @enderror
                    @endif
                </div>
                <div class="modal-footer">
                    @if($encontrado)
                        <button type="button" wire:click="RegistarEncargado()" class="btn btn-primary"><i
                        class="far fa-save mr-2"></i>Guardar</button>
                    @endif
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
