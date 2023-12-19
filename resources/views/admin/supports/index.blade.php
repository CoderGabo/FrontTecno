@extends('adminlte::page')

@section('title', 'Front Web')

@section('content_header')
    <h1 class="mt-5 mb-4">Comandos de Soporte</h1>
@stop

@section('content')

    <div class="container">

        <ul class="list-group">
            @foreach ($comands as $comand)
                <li class="list-group-item mb-2">
                    <h4 class="mb-1">{{ $comand->comando }}</h4>
                    <p class="mb-1">{{ $comand->descripcion }}</p>
                    <small>ID: {{ $comand->id }}</small>
                </li>
            @endforeach
        </ul>
    </div>
@stop