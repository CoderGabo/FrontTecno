@extends('adminlte::page')

@section('title', 'Front Web')

@section('content_header')
    <h1 class="mt-5 mb-4">Reporte de Ventas Mensuales</h1>
@stop

@section('content')

    <div class="container">


        {!! Form::open(['route' => 'admin.reports.store']) !!}
        <div class="form-group row">
            <label for="fecha_inicio" class="col-sm-2 col-form-label">Fecha de inicio:</label>
            <div class="col-sm-4">
                {!! Form::date('fecha_inicio', null, ['class' => 'form-control']) !!}
            </div>

            <label for="fecha_fin" class="col-sm-2 col-form-label">Fecha de fin:</label>
            <div class="col-sm-4">
                {!! Form::date('fecha_fin', null, ['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-10 offset-sm-2">
                <button type="submit" class="btn btn-primary">Generar Reporte</button>
            </div>
        </div>
        {!! Form::close() !!}


        @foreach ($reportMes as $mes => $reports)
            <div class="card mb-4">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">{{ $mes }}</h5>

                    <ul class="list-group">
                        @foreach ($reports as $report)
                            <li class="list-group-item">
                                <strong>{{ $report['nombre'] }}:</strong>
                                Se vendieron {{ $report['cantidad'] }} unidades a un precio de ${{ $report['precio'] }} cada
                                una.
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
    <!-- Muestra el contador de visitas -->
    <p>Esta página ha sido visitada {{ session('page_visits', 0) }} veces.</p>
@stop
