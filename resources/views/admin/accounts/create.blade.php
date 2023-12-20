@extends('adminlte::page')

@section('title', 'Front Web')

@section('content_header')
    <h1>Añadir una cuenta</h1>
@stop

@section('content')
    {{-- @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif --}}

    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.accounts.store']) !!}

            <div class="form-group">
                {!! Form::label('nro_cuenta', 'Numero de Cuenta') !!}

                {!! Form::text('nro_cuenta', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el numero de cuenta']) !!}

                @error('nro_cuenta')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

            </div>

            <div class="form-group">
                {!! Form::label('nombre', 'Nombre') !!}

                {!! Form::text('nombre', null, [
                    'class' => 'form-control',
                    'placeholder' => 'Ingrese el nombre del propietario de la cuenta',
                ]) !!}

                @error('nombre')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

            </div>

            <div class="form-group">
                {!! Form::label('servicio', 'Servicio') !!}

                {!! Form::text('servicio', null, [
                    'class' => 'form-control',
                    'placeholder' => 'Ingrese el servicio de la cuenta',
                ]) !!}

                @error('servicio')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

            </div>

            <div class="form-group">
                {!! Form::label('moneda', 'Moneda') !!}

                {!! Form::text('moneda', null, [
                    'class' => 'form-control',
                    'placeholder' => 'Ingrese el monto de dinero en la cuenta',
                ]) !!}

                @error('moneda')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

            </div>

            <div class="form-group">
                {!! Form::label('id_empresa', 'Empresa') !!}

                {!! Form::text('id_empresa', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el id de empresa']) !!}

                @error('id_empresa')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

            </div>

            {!! Form::submit('Crear Cuenta', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop
