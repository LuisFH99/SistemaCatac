@extends('adminlte::page')

@section('title', 'Mision-Vision')


@section('content')
<div class="d-flex justify-content-center ">
    <h3 class="font-weight-bold mt-2 ">MISION Y VISION DE LA COMUNIDAD</h3>
</div>
    <livewire:admin.mision-vision />
@stop

@section('css')
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
@stop

@section('js')
    <script src="{{ asset('js/cute-alert.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            Livewire.on('confirmEliminacion', subentidadId=>{
                cuteAlert({
                type: "question",
                title: "Mensaje de Sistema",
                img: "question.svg",
                message: "¿Esta seguro de Eliminar el elemento del Sistema?",
                confirmText: "SI",
                cancelText: "NO"
                }).then((e)=>{
                    console.log(e)
                if ( e == ("confirm")){
                    Livewire.emitTo('admin.mision-vision','ElimnarComponente',subentidadId)
                } else {
                    console.log('No confirmo');
                }
                })
            });
        });
    </script>
@stop