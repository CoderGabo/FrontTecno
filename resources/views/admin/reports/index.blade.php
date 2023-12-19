@extends('adminlte::page')

@section('title', 'Front Web')

@section('content_header')
    <h1 class="mt-5 mb-4">Reporte de Ventas Mensuales</h1>
@stop

@section('content')

    <div class="container">

        @foreach ($reportMes as $mes => $reports)
            <div class="card mb-4">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">{{ $mes }}</h5>

                    <ul class="list-group">
                        @foreach ($reports as $report)
                            <li class="list-group-item">
                                <strong>{{ $report->nombre }}:</strong>
                                Se vendieron {{ $report->cantidad }} unidades a un precio de ${{ $report->precio }} cada una.
                            </li>
                        @endforeach
                    </ul>

                    <p class="mt-3">
                        <strong>Total del Mes:</strong> ${{ $totals[$mes] }}
                    </p>
                </div>
            </div>
        @endforeach

    </div>
@stop