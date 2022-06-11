@extends('adminlte::page')

@section('title', 'Servicios')

@section('content')
    <livewire:admin.servicio/>
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
                    Livewire.emitTo('admin.servicio','Eliminar',banerId)
                } else {
                    console.log('No confirmo');
                }
                })
            });
        });
    </script>
@stop