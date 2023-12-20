@extends('adminlte::page')

@section('title', 'Front Web')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1>Lista de Usuarios</h1>

        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownTemas" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                Temas
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownTemas">
                <a class="dropdown-item" href="{{ route('cambiar-tema', ['tema' => 'original']) }}">Original</a>
                <a class="dropdown-item" href="#">Infantil</a>
            </div>
        </div>
    </div>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <a class="btn btn-secondary" href="{{ route('admin.users.create') }}">Agregar Usuario</a>
        </div>

        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Telefono</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->telefono }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Muestra el contador de visitas -->
    <p>Esta página ha sido visitada {{ session('page_visits', 0) }} veces.</p>
@stop
