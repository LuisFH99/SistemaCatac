@extends('adminlte::page')

@section('title', 'Eventos')


@section('content')
<div class="d-flex justify-content-center ">
    <h3 class="font-weight-bold mt-2 ">GESTION DE EVENTOS</h3>
</div>
    <livewire:admin.evento/>
@stop

@section('css')
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
@stop

@section('js')
    <script src="{{ asset('js/cute-alert.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            Livewire.on('confirmEliminacion', banerId=>{
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
                    Livewire.emitTo('admin.evento','EliminarEvento',banerId)
                } else {
                    console.log('No confirmo');
                }
                })
            });
        });
    </script>
@stop