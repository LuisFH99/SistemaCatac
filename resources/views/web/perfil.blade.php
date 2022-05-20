@extends('layouts.web')
@section('contenido')
<div>
    @foreach ($perfiles as $p)
        <h1>{{$p->nombre}}</h1>
    @endforeach
</div>
@endsection