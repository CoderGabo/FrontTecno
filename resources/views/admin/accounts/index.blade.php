@extends('adminlte::page')

@section('title', 'Front Web')

@section('content_header')
    <h1>Lista de Cuenta</h1>
@stop

@section('content')
    <div class="card">

        <div class="card-header">
            <a class="btn btn-secondary" href="{{ route('admin.accounts.create') }}">Agregar Cuenta</a>
            <a class="btn btn-secondary" href="{{ route('admin.items.create') }}">Agregar Item</a>
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
                            <td>{{ $account->nro_cuenta }}</td>
                            <td>{{ $account->nombre }}</td>
                            <td>{{ $account->servicio }}</td>
                            <td>{{ $account->moneda }}</td>
                            <td width="170px">
                                <a class="btn btn-info btn-sm" href="{{ route('admin.accounts.show', $account) }}">Ver Items
                                    Pendientes</a>
                            </td>
                            <td width="10px">
                                <form action="{{ route('admin.accounts.destroy', $account) }}" method="POST"
                                    onsubmit="return confirm('¿Estás seguro de que quieres eliminar esta cuenta?');">
                                    @csrf
                                    @method('delete')

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
    <!-- Muestra el contador de visitas -->
    <p>Esta página ha sido visitada {{ session('page_visits', 0) }} veces.</p>
@stop
