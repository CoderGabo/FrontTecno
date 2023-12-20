@extends('adminlte::page')

@section('title', 'Front Web')

@section('content_header')
    <h1>Lista de Items Pendientes</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif

    <div class="card">

        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Numero de Item</th>
                        <th>Descripcion</th>
                        <th>Monto</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($items as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->descripcion }}</td>
                            <td>{{ $item->monto }}</td>
                            <td width="115px">
                                <form action="{{ route('admin.items.destroy', $item) }}" method="POST"
                                    onsubmit="return confirm('¿Estás seguro de que quieres pagar este item?');">
                                    @csrf
                                    @method('delete')

                                    <button type="submit" class="btn btn-primary btn-sm">
                                        Pagar Item
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
