@extends('adminlte::page')

@section('title', 'Editar Funcionario')

@section('content_header')
    <h1>Editar Funcionario</h1>
@stop

@section('content')
<div class="content">
    <div class="content-header">
        <div class="container-fluid">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item">
                    <a href="{{ route('productiva.index') }}">
                        <i class="fas fa-fw fa-arrow-left"></i>
                        Lista de Funcionarios
                    </a>
                </li>
                <li class="breadcrumb-item active">Editar</li>
            </ol>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="card mt-4">
                <div class="card-header">
                    Editar Funcionario
                </div>
                <div class="card-body">
                    {!! Form::model($funcionario, ['route' => ['productivas.update', $funcionario->id], 'method' => 'PUT','novalidate', 'files' => true]) !!}
                        @csrf
                        @include('admin.organos_de_gobierno.linea.actividades.productivas.partials.form-edit')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </section>
</div>
@stop

@section('css')
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet"/>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet"/>
    <!-- MDB -->
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.2/mdb.min.css" rel="stylesheet"/> --}}
    @toastr_css
    <!-- Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="/css/style.css">
@stop

@section('js')
    <!-- Sweet Alert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @toastr_js
    <!-- MDB -->
    {{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.2/mdb.min.js"></script> --}}
    <!-- Select2 -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple1').select2({
                placeholder: "Seleccionar...",
                allowClear: true
            });
        let imagePreview = document.getElementById('imagePreview');
        let path = document.getElementById('path');
        imagePreview.style.display = 'none';
        let addImage = function(evt){
            let file = evt.target.files[0],
            imageType = /image.*/;
            if(file != null){
                if (!file.type.match(imageType)) {
                	imagePreview.style.display = 'none';
                    Swal.fire({
                        type: 'error',
                        title: 'Seleccione una imagen',
                        text: 'Extensiones permitidas: jpg, jpeg, png',
                    });
                    path.value = '';
                    return;
                }
                let reader = new FileReader();
                reader.onload = fileOnLoad;
                reader.readAsDataURL(file);
                imagePreview.style.display = 'block';
            }
        }
        let fileOnLoad = function(evt) {
        	let result = evt.target.result;
        	imagePreview.setAttribute('src', result);
        }
        let getImage = function(evt) {
            addImage(evt);
        }
        path.addEventListener('change', getImage, false);
        let filePath = document.getElementById('filePath');
        let validateFile = function(evt){
            let file = evt.target.files[0],
            imageType = /application.pdf/;
            if(file != null){
                if (!file.type.match(imageType)) {
                    Swal.fire({
                        type: 'error',
                        title: 'Seleccione un archivo PDF',
                        text: 'Extensiones permitidas: pdf',
                    });
                    filePath.value = '';
                    return;
                }
            }
        }
        filePath.addEventListener('change', validateFile, false);
    });
    function SoloNumeros(e){
        var key= Window.Event? e.which : e.keyCode;
        if (key < 48 || key > 57) { 
            e.preventDefault();
        }
    }; 
    </script>
@stop
