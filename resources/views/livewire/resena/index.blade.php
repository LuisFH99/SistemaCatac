@extends('adminlte::page')

@section('title', 'Reseña')


@section('content')
<div class="d-flex justify-content-center ">
    <h3 class="font-weight-bold mt-2 ">Reseña Historica</h3>
</div>
    <livewire:admin.resena />
@stop

@section('css')
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    
@stop

@section('js')

    <script src="{{ asset('js/cute-alert.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            Livewire.on('confirmEliminacion', resenaId=>{
                cuteAlert({
                type: "question",
                title: "Mensaje de Sistema",
                img: "question.svg",
                message: "¿Esta seguro de Eliminar el Elemento?",
                confirmText: "SI",
                cancelText: "NO"
                }).then((e)=>{
                    console.log(e)
                if ( e == ("confirm")){
                    Livewire.emitTo('admin.resena','ElimnarResena',resenaId)
                } else {
                    console.log('No confirmo');
                }
                })
            });
        });
    </script>
    
@stop