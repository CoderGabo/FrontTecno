@extends('adminlte::page')

@section('title', 'Front Web')

@section('content_header')
    <h1>Añadir un Producto</h1>
@stop

@section('content')
    {{-- @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif --}}

    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.products.store']) !!}

            <div class="form-group">
                {!! Form::label('nombre', 'Nombre') !!}

                {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del producto']) !!}

                @error('nombre')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

            </div>

            <div class="form-group">
                {!! Form::label('descripcion', 'Descripcion') !!}

                {!! Form::text('descripcion', null, [
                    'class' => 'form-control',
                    'placeholder' => 'Ingrese la descripcion del producto',
                ]) !!}

                @error('descripcion')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

            </div>

            <div class="form-group">
                {!! Form::label('precio', 'Precio') !!}

                {!! Form::text('precio', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el precio del producto']) !!}

                @error('precio')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

            </div>

            <div class="form-group">
                {!! Form::label('promocion', 'Promocion') !!}

                {!! Form::text('promocion', null, ['class' => 'form-control', 'placeholder' => 'Ingrese una promoción']) !!}

            </div>

            <div class="form-group">
                {!! Form::label('stock', 'Stock') !!}

                {!! Form::text('stock', null, ['class' => 'form-control', 'placeholder' => 'Ingrese una promoción']) !!}

            </div>

            {!! Form::submit('Añadir Producto', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop
