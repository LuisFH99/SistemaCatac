<div id="accordion">
    <div class="form-group row ">
        <div class="input-group rounded col-md-9 mt-2">
            <label for="" class="col-md-3 col-form-label">Buscar
                Entidad:</label>
            <input type="search" wire:model="buscar" class="form-control rounded d-flex" placeholder="Buscar"
                aria-label="Search" aria-describedby="search-addon" />
            <div class="input-group-append">
                <span class="input-group-text border-0" id="search-addon">
                    <i class="fas fa-search"></i>
            </div>
            </span>
        </div>
    </div>

    <div class="card ">
        <div class="card-header">
            <div class="row">
                <div class="col-9">
                    <h3 class="card-title font-weight-bold text-uppercase mt-1">VISION</h3>
                </div>

                <div class="col-3 d-flex justify-content-end">
                    <a data-toggle="collapse" href="#collapsevision" class="btn btn-success btn-sm mr-1"><i
                            class="fas fa-eye"></i>
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
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Descripcion</th>
                                <th scope="col" style="width: 100px">Imagen</th>
                                <th scope="col">Estado</th>
                                <th scope="col" style="width: 85px">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                          {{-- wire:click="eliminarintegrante({{$integrante->id}} --}}
                            @php
                                $cont = 1;
                            @endphp
                                @foreach ($visiones as $vision)
                                    <tr>
                                        <th style="vertical-align: middle" scope="row">{{ $cont++ }}</th>
                                        <td style="vertical-align: middle">{{ $vision->descripcion }}</td>
                                        <td style="vertical-align: middle">{{ $vision->imagenes_id }}</td>
                                        <td style="vertical-align: middle">{{ $vision->activo }}</td>
                                        <td style="vertical-align: middle;"><button type="button" class="btn btn-danger btn-sm"> <i class="fas fa-trash"></i>
                                            </button></td>
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
                    <a data-toggle="collapse" href="#collapsemision" class="btn btn-success btn-sm mr-1"><i
                            class="fas fa-eye"></i>
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

                </div>

            </div>
        </div>
    </div>


</div>
