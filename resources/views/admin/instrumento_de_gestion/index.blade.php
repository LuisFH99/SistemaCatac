@extends('adminlte::page')

@section('title', 'Instrumentos de Gestión')

@section('content_header')
    <h1>Instrumentos de Gestión</h1>
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
                                <h3 class="card-title font-weight-bold text-uppercase mt-1">Lista de los Instrumentos de Gestión</h3>
                            </div>
                            <div class="col-3 d-flex justify-content-end">
                                <a href="{{ route('instrumento_de_gestion.create') }}" class="btn btn-success float-right">
                                    <i class="fas fa-fw fa-save"></i>
                                    Registrar
                                </a>
                            </div><hr>
                        </div>
                        <div class="card mt-4">
                            @livewire('admin.instrumento-gestion.listar-instrumento')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
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
    <script src="{{ asset('js/cute-alert.js') }}"></script>
    @jquery
    @toastr_js
    @toastr_render
    <!-- MDB -->
    {{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.2/mdb.min.js"></script> --}}
    <script>
        let bdr=1;
        $(document).ready(function() {
            //delete method
            $(document).on('click', '.delete-button', function() {
                let csrf_token = $("meta[name='csrf-token']").attr("content");
                Swal.fire({
                title: '¿Estás seguro?',
                text: "¡Se eliminará a la Modificatoria y todo registro relacionado, esta operación no se podrá revertir!",
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
                        url: "{{ url('admin/instrumento_de_gestion') }}" + '/' + id,
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