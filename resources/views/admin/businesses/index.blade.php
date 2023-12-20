@extends('adminlte::page')

@section('title', 'Front Web')

@section('content_header')
    <h1>Lista de Empresa</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif

    <div class="card">

        <div class="card-header">
            <a class="btn btn-secondary" href="{{ route('admin.businesses.create') }}">Agregar Empresa</a>
        </div>

        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($businesses as $business)
                        <tr>
                            <td>{{ $business->id }}</td>
                            <td>{{ $business->name }}</td>
                            <td width="115px">
                                <a class="btn btn-info btn-sm" href="{{ route('admin.businesses.show', $business) }}">Ver
                                    Cuentas</a>
                            </td>
                            <td width="10px">
                                <a class="btn btn-primary btn-sm"
                                    href="{{ route('admin.businesses.edit', $business) }}">Editar</a>
                            </td>
                            <td width="10px">
                                <form action="{{ route('admin.businesses.destroy', $business) }}" method="POST"
                                    onsubmit="return confirm('¿Estás seguro de que quieres eliminar esta empresa?');">
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
