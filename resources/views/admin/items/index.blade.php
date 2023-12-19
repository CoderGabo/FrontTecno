@extends('adminlte::page')

@section('title', 'Front Web')

@section('content_header')
    <h1>Lista de Items Pendientes</h1>
@stop

@section('content')

    {{-- @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif --}}

    <div class="card">

        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Numero de Item</th>
                        <th>Descripcion</th>
                        <th>Monto</th>
                        <th>Pagar</th>
                        <th>Fecha Paga</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($items as $item)
                        <tr>
                            <td>{{$item->nro_item}}</td>
                            <td>{{$item->descripcion}}</td>
                            <td>{{$item->monto}}</td>
                            <td>{{$item->pagar}}</td>
                            <td>{{$item->fecha_paga}}</td>
                            <td width="115px">
                                <a class="btn btn-primary btn-sm" href="{{route('admin.items.index')}}">Pagar Item</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop