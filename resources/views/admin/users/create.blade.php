@extends('adminlte::page')

@section('title', 'Front Web')

@section('content_header')
    <h1>Agrega un Usuario</h1>
@stop

@section('content')
    {{-- @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif --}}

    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.users.store']) !!}

            <div class="form-group">
                {!! Form::label('nombre', 'Nombre') !!}

                {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del Usuario']) !!}

                @error('nombre')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

            </div>

            <div class="form-group">
                {!! Form::label('email', 'Correo Electronico') !!}

                {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el correo del usuario']) !!}

                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

            </div>

            <div class="form-group">
                {!! Form::label('telefono', 'Telefono') !!}

                {!! Form::text('telefono', null, [
                    'class' => 'form-control',
                    'placeholder' => 'Ingrese el telefono del usuario',
                ]) !!}

                @error('telefono')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

            </div>

            <div class="form-group">
                {!! Form::label('punto_origen', 'Punto Origen') !!}

                {!! Form::text('punto_origen', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el punto de origen']) !!}

                @error('punto_origen')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

            </div>

            {!! Form::submit('Crear Usuario', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>

    <!-- Muestra el contador de visitas -->
    <p>Esta página ha sido visitada {{ session('page_visits', 0) }} veces.</p>
@stop
