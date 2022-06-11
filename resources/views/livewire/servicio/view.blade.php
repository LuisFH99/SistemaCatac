<div id="accordion">
    <div class="d-flex justify-content-center ">
        <h3 class="font-weight-bold mt-2 text-uppercase">SERVICIO {{$datoservicio->nom_servicio}}</h3>
    </div>

    <br>
    <div class="card ">
        <div class="card-header">
            <div class="row">
                <div class="col-9">
                    <h3 class="card-title font-weight-bold text-uppercase mt-1">DESCRIPCION</h3>
                </div>

                <div class="col-3 d-flex justify-content-end">
                    <a data-toggle="collapse" href="#collapsedescripcion" class="btn btn-primary btn-sm mr-1"><i
                            class="fas fa-info-circle"></i>
                    </a>
                </div>
            </div>
        </div>
        <div id="collapsedescripcion" class="collapse" data-parent="#accordion">
            <div class="card-body">
                <form wire:submit.prevent="GuardarDescripcion">
                    <div class="row">
                        <div class="col-md-11">
                            <textarea class="form-control" id="descripcion" rows="4" wire:model.defer="descripcion"></textarea>
                        </div>
                        <div class="col-md-1 text-center d-flex align-items-center">
                            <button type="submit" class="btn btn-success btn-sm"><i class="far fa-save"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="card ">
        <div class="card-header">
            <div class="row">
                <div class="col-9">
                    <h3 class="card-title font-weight-bold text-uppercase mt-1">FUNCIONES</h3>
                </div>

                <div class="col-3 d-flex justify-content-end">
                    <a data-toggle="collapse" href="#collapsefunciones" class="btn btn-primary btn-sm mr-1"><i
                            class="fas fa-info-circle"></i>
                    </a>
                </div>
            </div>
        </div>
        {{-- <div>{{$funciones}}</div> --}}
        <div id="collapsefunciones" class="collapse" data-parent="#accordion" wire:ignore>
            
            <div class="card-body" >
                <form wire:submit.prevent="GuardarFuncion">
                    <div class="row" >
                        <div class="col-md-11">
                            <textarea name="" id="ckeditor" cols="30" rows="10" wire:model.defer="funciones"></textarea>
                        </div>
                        <div class="col-md-1 text-center d-flex align-items-center">
                            <button type="submit" class="btn btn-success btn-sm"><i class="far fa-save"></i></button>
                        </div>
                    </div>
                </form>
                
            </div>
        </div>
    </div>

    <div class="card ">
        <div class="card-header">
            <div class="row">
                <div class="col-9">
                    <h3 class="card-title font-weight-bold text-uppercase mt-1">PRODUCTOS</h3>
                </div>

                <div class="col-3 d-flex justify-content-end">
                    <a data-toggle="collapse" href="#collapseproductos" class="btn btn-primary btn-sm mr-1"><i
                            class="fas fa-info-circle"></i>
                    </a>
                    <a class="btn btn-info btn-sm mr-1" wire:click="MostrarModal(1)">
                        <i class="fas fa-plus-circle"></i>
                    </a>
                </div>
            </div>
        </div>
        <div id="collapseproductos" class="collapse" data-parent="#accordion">
            <div class="card-body">
                <table class="table table-sm table-bordered">
                    <thead style="background-color: #127a66; color:#fff">
                        <tr style="text-align: center;">
                            <th scopre="col"style="width: 50px">Item</th>
                            <th scope="col">Producto</th>
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
                        
                        @if((count($productos)>0))
                            @foreach ($productos as $producto)
                                <tr>
                                    <th style="font-size: 12px; vertical-align: middle; text-align: center;">{{$cont++}}</th>
                                    <td style="font-size: 12px; vertical-align: middle; text-align: center;">{{$producto->producto}}</td>
                                    <td style="font-size: 12px; vertical-align: middle;  text-align:justify;">{{$producto->descripcion}}</td>
                                    <td style="vertical-align: middle;"><img src="{{$producto->imagenes->url_imagen}}" alt="" class="img-thumbnail"></td>
                                    <td style=" vertical-align: middle; text-align: center;">
                                        <span class="badge {{ $producto->Activo == '0' ? 'bg-danger' : 'bg-success' }}">{{ $producto->Activo == '0' ? 'No visible en pagina' : 'Visible en pagina' }}</span>
                                    </td>
                                    <td style="vertical-align: middle;">
                                        <div class="d-flex justify-content-end">
                                            <button type="button"
                                                class="btn {{ $producto->Activo == '1' ? 'btn-danger' : 'btn-success' }} btn-sm mr-1"
                                                wire:click="CambiarVisibilidad({{ $producto->id }},1)"><i
                                                    class="fas {{ $producto->Activo == '1' ? 'fa-eye-slash' : 'fa-eye' }}"></i>
                                            </button>
                                            <button type="button" class="btn btn-info btn-sm mr-1"
                                                wire:click="Seleccionar({{ $producto->id }},1)">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button type="button" class="btn btn-danger btn-sm" wire:click="$emit('confirmEliminacion',[{{ $producto->id }},1])"> <i class="fas fa-trash-alt"></i>
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
    </div>

    <div class="card ">
        <div class="card-header">
            <div class="row">
                <div class="col-9">
                    <h3 class="card-title font-weight-bold text-uppercase mt-1">ENCARGADO</h3>
                </div>

                <div class="col-3 d-flex justify-content-end">
                    <a data-toggle="collapse" href="#collapseencargado" class="btn btn-primary btn-sm mr-1"><i
                            class="fas fa-info-circle"></i>
                    </a>
                    @if(!isset($datoservicio->encargado_id))
                    <a class="btn btn-info btn-sm mr-1" wire:click="MostrarModal(2)">
                        <i class="fas fa-plus-circle"></i>
                    </a>
                    @endif
                </div>
            </div>
        </div>
        <div id="collapseencargado" class="collapse" data-parent="#accordion">
            <div class="card-body">
                <table class="table table-sm table-bordered">
                    <thead style="background-color: #127a66; color:#fff">
                        <tr style="text-align: center;">
                            <th scope="col">Apellidos y Nombres</th>
                            <th scope="col" tyle="width: 150px">DNI</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Telefono</th>
                            <th scope="col">Descripcion</th>
                            <th scope="col">Fecha Inicion</th>
                            <th scope="col">Fecha Fin</th>
                            <th scope="col" style="width: 150px">Imagen</th>
                            <th scope="col" style="width: 100px">Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($datoservicio->encargado_id))
                            
                                <tr>
                                    
                                    <td style="font-size: 12px; vertical-align: middle; text-align: center;">{{$datoservicio->encargado->persona->apell_pat}} {{$datoservicio->encargado->persona->apell_mat}} {{$datoservicio->encargado->persona->nombre}}</td>
                                    <td style="font-size: 12px; vertical-align: middle;  text-align:justify;">{{$datoservicio->encargado->persona->DNI}}</td>
                                    <td style="font-size: 12px; vertical-align: middle;  text-align:justify;">{{$datoservicio->encargado->persona->email}}</td>
                                    <td style="font-size: 12px; vertical-align: middle;  text-align:justify;">{{$datoservicio->encargado->persona->telefono}}</td>
                                    <td style="font-size: 12px; vertical-align: middle;  text-align:justify;">{{$datoservicio->encargado->descripcion}}</td>
                                    <td style="font-size: 12px; vertical-align: middle;  text-align:justify;">{{$datoservicio->encargado->fecha_inicio}}</td>
                                    <td style="font-size: 12px; vertical-align: middle;  text-align:justify;">{{$datoservicio->encargado->fecha_fin}}</td>
                                    <td style="vertical-align: middle;"><img src="{{$datoservicio->encargado->imagenes->url_imagen}}" alt="" class="img-thumbnail"></td>
                                    
                                    <td style="vertical-align: middle;">
                                        <div class="d-flex justify-content-center">
                                            <button type="button" class="btn btn-danger btn-sm" wire:click="$emit('confirmEliminacion',[{{ $datoservicio->encargado->id }},2])"> <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                           
                        @else
                            <tr style="text-align: center;">
                                <td colspan="9">No hay datos registrados en el sistema</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @include('livewire.servicio.create')

</div>
<script src="https://cdn.ckeditor.com/ckeditor5/34.1.0/classic/ckeditor.js"></script>

<script>
    function miNotificacion() {
        Livewire.on('alertaServicio', function(datos) {
            $(document).Toasts('create', {
                class: datos.modo,
                title: 'Mensaje de Sistema',
                body: datos.mensaje,
                autohide: true,
                delay: 2000
            })
            document.getElementById("uploadedfileproducto").value = "";
        });

    }
    window.onload = function() {
        miNotificacion();
        if(document.querySelector("#ckeditor")){
            ClassicEditor
                .create( document.querySelector( '#ckeditor' ) )
                .then(function(editor){
                    editor.model.document.on('change:data', () => {
                        @this.set('funciones', editor.getData());
                    })
                })
                .catch( error => {
                    console.error( error.stack );
                } );

        }
    }
</script>