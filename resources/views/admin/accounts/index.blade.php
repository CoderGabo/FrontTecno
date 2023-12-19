@extends('adminlte::page')

@section('title', 'Front Web')

@section('content_header')
    <h1>Lista de Cuenta</h1>
@stop

@section('content')
    <div class="card">

        <div class="card-header">
            <a class="btn btn-secondary" href="{{route('admin.accounts.create')}}">Agregar Cuenta</a>
        </div>

        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Numero de Cuenta</th>
                        <th>Nombre</th>
                        <th>Servicio</th>
                        <th>Moneda</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($accounts as $account)
                        <tr>
                            <td>{{$account->nro_cuenta}}</td>
                            <td>{{$account->nombre}}</td>
                            <td>{{$account->servicio}}</td>
                            <td>{{$account->moneda}}</td>
                            <td width="170px">
                                <a class="btn btn-info btn-sm" href="{{route('admin.items.index')}}">Ver Items Pendientes</a>
                            </td>
                            <td width="10px">
                                <form action="#" method="POST">
                                    @csrf
                                    @method("delete")

                                    <button type="submit" class="btn btn-danger btn-sm">
                                        Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop