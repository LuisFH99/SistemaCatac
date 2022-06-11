@extends('adminlte::page')

@section('title', 'Órgano de Asesoria')

@section('content_header')
    <h1>Órgano de Asesoria</h1>
@stop

@section('content')
<div class="content">
    <section class="content">
        <div class="container-fluid">
            <div id="accordion">
                <div class="card ">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-9">
                                <h3 class="card-title font-weight-bold text-uppercase mt-1">Descripción</h3>
                            </div>
                            <div class="col-3 d-flex justify-content-end">
                                <a data-toggle="collapse" href="#collapseDescripcion" class="btn btn-success btn-sm mr-1"><i
                                        class="fas fa-eye"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div id="collapseDescripcion" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                            {!! Form::model($directiva, ['route' => ['directiva_comunal.updateDirectiva', $directiva->id], 'method' => 'PUT']) !!}
                            <div class="row">
                                    
                                    <div class="col-md-11">
                                        <div class="col-md-10">
                                            <textarea name="descripcion" id="descripcion" cols="20" rows="5" class="form-control" disabled required>{{ $directiva->descripcion }}</textarea>
                                            @error('descripcion')
                                                <small class="text-danger">{{$message}}</small>
                                            @enderror
                                            {{ Form::hidden('bdr', 4) }}
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="text-center">
                                            <button type="button" class="btn btn-outline-danger btn-sm mr-1" onclick="activar()" id="btnLock"><i class="fas fa-lock" id="btnLogo"></i></button>
                                        </div><br>
                                        <div class="text-center d-none" id="btnEditar">
                                            {{ Form::button('<i class="fas fa-edit mr-1"></i>Editar', ['type' => 'submit', 'class' => 'btn btn-outline-info btn-sm'] )  }}
                                        </div>
                                    </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>  <br>
                <div class="card ">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-9">
                                <h3 class="card-title font-weight-bold text-uppercase mt-1">Órganos de Asesoria</h3>
                            </div>
                            <div class="col-3 d-flex justify-content-end">
                                <a data-toggle="collapse" href="#collapseApoyo" class="btn btn-success btn-sm mr-1"><i
                                        class="fas fa-eye"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div id="collapseApoyo" class="collapse" data-parent="#accordion">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-9">
                                    <h3 class="card-title font-weight-bold text-uppercase mt-1"></h3>
                                </div>
                                <div class="col-3 d-flex justify-content-end">
                                    <a href="{{ route('asesoria.create') }}" class="btn btn-success float-right">
                                        <i class="fas fa-fw fa-save"></i>
                                        Registrar
                                    </a>
                                </div><hr>
                                
                            </div>
                            <div class="card mt-4">
                                @livewire('admin.organo-de-gobierno.listar-apoyo',['aux'=>4,'ruta'=>'asesoria'])
                            </div>
                        </div>
                    </div>
                </div>  <br>
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-9">
                                <h3 class="card-title font-weight-bold text-uppercase mt-1">Lista de Funcionarios</h3>
                            </div>
                            <div class="col-3 d-flex justify-content-end">
                                <a data-toggle="collapse" href="#collapseFuncionarios" class="btn btn-success btn-sm mr-1"><i
                                        class="fas fa-eye"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div id="collapseFuncionarios" class="collapse" data-parent="#accordion">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-9">
                                    <h3 class="card-title font-weight-bold text-uppercase mt-1"></h3>
                                </div>
                                <div class="col-3 d-flex justify-content-end">
                                    <a href="{{ route('asesorias.create') }}" class="btn btn-success float-right">
                                        <i class="fas fa-fw fa-save"></i>
                                        Registrar
                                    </a>
                                </div><hr>
                                
                            </div>
                            <div class="card mt-4">
                                @livewire('admin.organo-de-gobierno.listar-gerencia',['aux'=>4,'ruta'=>'asesorias'])
                            </div>
                        </div>
                    </div>
                </div>  <br>
            </div>
        </div>
    </section>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="/css/style.css">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet"/>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet"/>
    <!-- MDB -->
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.2/mdb.min.css" rel="stylesheet"/> --}}
    <link rel="stylesheet" href="/css/style.css">
    
    @toastr_css
    
@stop

@section('js')
    <!-- Sweet Alert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @jquery
    @toastr_js
    @toastr_render
    <!-- MDB -->
    {{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.2/mdb.min.js"></script> --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="{{ asset('js/cute-alert.js') }}"></script>
    <script>
        let bdr=1;
        $(document).ready(function() {
            //delete method
            $(document).on('click', '.delete-button', function() {
                let csrf_token = $("meta[name='csrf-token']").attr("content");
                Swal.fire({
                title: '¿Estás seguro?',
                text: "¡Se eliminará al Funcionario y todo registro relacionado, esta operación no se podrá revertir!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Cancelar',
                confirmButtonText: 'Si'
                }).then((result) => {
                if (result.value) {
                    let element = $(this)[0];
                    let id = $(element).attr('id');
                    $.ajax({
                        url: "{{ url('admin/organos_de_gobierno/apoyo_asesoria/asesorias') }}" + '/' + id,
                        type: "POST",
                        data: {'_method': 'DELETE', '_token': csrf_token},
                        success: function(data) {
                            $(document).Toasts('create', {
                                class: 'bg-succcess',
                                title: 'Mensaje de Sistema',
                                body: data,
                                autohide: true,
                                delay: 3350
                            });
                            location.reload();
                            //alert(data.id +' - '+ data.name +' - ' + data.email +' - ' + data.password );
                        },
                        error: function(data) {
                            Swal.fire({
                            type: 'error',
                            title: 'Hubo un error',
                            text: 'Intente recargar la página',
                            timer: 2000
                            });
                        }
                    });
                }
                });
            });
            $(document).on('click', '.delete-button1', function() {
                let csrf_token = $("meta[name='csrf-token']").attr("content");
                Swal.fire({
                title: '¿Estás seguro?',
                text: "¡Se eliminará al Organo de asesoria y todo registro relacionado, esta operación no se podrá revertir!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Cancelar',
                confirmButtonText: 'Si'
                }).then((result) => {
                if (result.value) {
                    let element = $(this)[0];
                    let id = $(element).attr('id');
                    $.ajax({
                        url: "{{ url('admin/organos_de_gobierno/apoyo_asesoria/asesoria') }}" + '/' + id,
                        type: "POST",
                        data: {'_method': 'DELETE', '_token': csrf_token},
                        success: function(data) {
                            $(document).Toasts('create', {
                                class: 'bg-succcess',
                                title: 'Mensaje de Sistema',
                                body: data,
                                autohide: true,
                                delay: 3350
                            });
                            location.reload();
                            //alert(data.id +' - '+ data.name +' - ' + data.email +' - ' + data.password );
                        },
                        error: function(data) {
                            Swal.fire({
                            type: 'error',
                            title: 'Hubo un error',
                            text: 'Intente recargar la página',
                            timer: 2000
                            });
                        }
                    });
                }
                });
            });
        });
        
        function habilitar(ids,aux) {
            console.log(ids);
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-warning mr-1',
                    cancelButton: 'btn btn-secondary mr-1'
                },
                buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
                title: 'Estas Seguro?',
                text: "Esta accion es Irreversible!",
                icon: (aux==1)?'warning':'success',
                showCancelButton: true,
                confirmButtonText: (aux==1)?'Deshabilitar':'Habilitar',
                cancelButtonText: 'Cancelar!',
                reverseButtons: false
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/admin/organos_de_gobierno/apoyo_asesoria/asesorias/habilitar',
                        method: 'POST',
                        data: {
                            _token: $('input[name="_token"]').val(),
                            id: ids,
                            bdr: aux
                        }
                    }).done(function(msg) {
                        console.log(msg);
                        $(document).Toasts('create', {
                            class: 'bg-'+((aux==1)?'warning':'success'),
                            title: 'Mensaje de Sistema',
                            body: msg,
                            autohide: true,
                            delay: 3350
                        });
                        location.reload();
                    }).fail(function(msg) {
                        console.log(msg);
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Algo salio mal!...'
                        })
                    });
                }
            })
        }
        function activar(){

            if(bdr==1){
                $("#btnEditar").removeClass("d-none");
                $("#btnEditar").addClass("d-flex");
                $("#btnLock").removeClass("btn-outline-danger");
                $("#btnLock").addClass("btn-outline-warning");
                $("#btnLogo").removeClass("fa-lock");
                $("#btnLogo").addClass("fa-lock-open");
                document.getElementById('descripcion').disabled = false;
                bdr=0;
            }else{
                $("#btnEditar").removeClass("d-flex");
                $("#btnEditar").addClass("d-none");
                $("#btnLock").removeClass("btn-outline-warning");
                $("#btnLock").addClass("btn-outline-danger");
                $("#btnLogo").removeClass("fa-lock-open");
                $("#btnLogo").addClass("fa-lock");
                document.getElementById('descripcion').disabled = true;
                bdr=1;
            }
        }
    </script>
@stop