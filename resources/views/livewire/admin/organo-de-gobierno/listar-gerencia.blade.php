<div>
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
    <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
    </symbol>
    <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
    </symbol>
    <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
    </symbol>
    </svg>
    <div class="card-body">
        <div class="input-group rounded col-6">
            <input wire:model="search" type="search" class="form-control rounded" placeholder="Buscar" aria-label="Search"
                aria-describedby="search-addon" />
            <span class="input-group-text border-0" id="search-addon">
                <i class="fas fa-search"></i>
            </span>
        </div>
    </div>
    @if($funcionarios->count())
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="table">
                    <thead class="table-dark text-center">
                        <tr>
                            <th width="10px">N°</th>
                            <th>Foto</th>
                            <th>DNI</th>
                            <th>Nombre</th>
                            <th>Perfil</th>
                            <th>Profesión</th>
                            <th>CV</th>
                            <th>Inicio</th>
                            <th>Fin</th>
                            <th>Cargo</th>
                            <th>Estado</th>
                            <th width="140px"></th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach($funcionarios as $funcionario)
                        <tr>
                            <td class="align-V">{{ $funcionario->contador }}</td>
                            <td class="align-V"><img src="/{{ $funcionario->url_imagen }}" width="60px" height="60px" alt=""></td>
                            <td class="align-V">{{ $funcionario->DNI }}</td>
                            <td class="align-V">{{ $funcionario->nombre.' '.$funcionario->apell_pat.' '.$funcionario->apell_mat }}</td>
                            <td class="align-V"><textarea cols="10" rows="3" disabled>{{ $funcionario->perfil }}</textarea></td>
                            <td class="align-V">{{ $funcionario->profesion }}</td>
                            <td class="align-V text-center"><a href="/{{ $funcionario->url_cv }}" target="_blank" class="text-center">
                                <i class="fas fa-file-pdf"></i>Ver</a></td>
                            <td class="align-V">{{ $funcionario->fech_inicio }}</td>
                            <td class="align-V">{{ $funcionario->fech_fin }}</td>
                            <td class="align-V">{{ $funcionario->cargo }}</td>
                            <td class="align-V"><span class="badge {{($funcionario->activos ==1 )?'bg-success':'bg-danger'}}">{{($funcionario->activos ==1 )?'Habilitado':'Deshabilitado'}}</span></td>
                            <td class="align-V">
                                <a class="btn btn-warning btn-sm" href="#" onclick="habilitar({{$funcionario->id}},{{$funcionario->activos}})" 
                                        title="{{($funcionario->activos ==1 )?'Deshabilitar':'Habilitar'}} Usuario">
                                    <i class="fas fa-arrow-alt-circle-{{($funcionario->activos ==1 )?'down':'up'}} whiterr"></i>
                                </a>
                                <a href="{{ route($ruta.'.edit', $funcionario->id) }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-fw fa-edit"></i>
                                </a>
                                <button id="{{ $funcionario->id }}" class="delete-button btn btn-danger btn-sm">
                                    <i class="fas fa-fw fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            {{$funcionarios->links()}}
        </div>
    @else
        <div class="card-body justify-content-center align-items-center">
            <div class="alert alert-danger d-flex align-items-center justify-content-center" role="alert">
                <svg class="bi flex-shrink-0 me-2 mr-1" width="24" height="24" role="img" aria-label="Danger:">
                    <use xlink:href="#exclamation-triangle-fill"/>
                </svg>
                <div class="justify-content-center align-items-center">
                    <Strong  class="text-center align-items-center">No hay Registros</Strong>
                </div>
            </div>
        </div>
    @endif
</div>