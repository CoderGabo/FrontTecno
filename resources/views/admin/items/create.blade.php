@extends('adminlte::page')

@section('title', 'Front Web')

@section('content_header')
    <h1>Añadir un item</h1>
@stop

@section('content')
    {{-- @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif --}}

    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.items.store']) !!}

            <div class="form-group">
                {!! Form::label('monto', 'Monto') !!}

                {!! Form::text('monto', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el numero de cuenta']) !!}

                @error('monto')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

            </div>

            <div class="form-group">
                {!! Form::label('descripcion', 'Descripcion') !!}

                {!! Form::text('descripcion', null, [
                    'class' => 'form-control',
                    'placeholder' => 'Ingrese el nombre del propietario de la cuenta',
                ]) !!}

                @error('descripcion')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

            </div>

            <div class="form-group">
                {!! Form::label('nro_cuenta', 'Nro de Cuenta') !!}

                {!! Form::text('nro_cuenta', null, [
                    'class' => 'form-control',
                    'placeholder' => 'Ingrese el servicio de la cuenta',
                ]) !!}

                @error('nro_cuenta')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

            </div>




            {!! Form::submit('Añadir Item', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop
