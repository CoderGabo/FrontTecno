@extends('adminlte::page')

@section('title', 'Your Page Title')

@section('content_header')
    <h1 class="mt-5 mb-4">Reporte {{ $fechaInicio }} ~ {{ $fechaFin }}</h1>
@stop

@section('content')
    <div class="container">
        @foreach ($results as $result)
            <div class="card mb-4">
                <div class="card-body d-flex flex-column">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <strong>Nombre:</strong> {{ $result['nombre'] }}
                        </li>
                        <li class="list-group-item">
                            <strong>Cantidad:</strong> {{ $result['cantidad'] }}
                        </li>
                        <li class="list-group-item">
                            <strong>Precio:</strong> ${{ $result['precio'] }}
                        </li>
                    </ul>
                </div>
            </div>
        @endforeach

        <div class="card">
            <div class="card-body d-flex flex-column">
                <p class="mt-3">
                    <strong>Total:</strong> ${{ $total }}
                </p>
            </div>
        </div>
    </div>
@stop
