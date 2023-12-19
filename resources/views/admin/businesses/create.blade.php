@extends('adminlte::page')

@section('title', 'Front Web')

@section('content_header')
    <h1>Crear una Empresa</h1>
@stop

@section('content')
    {{-- @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif --}}

    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.businesses.store']) !!}

                <div class="form-group">
                    {!! Form::label('name', 'Nombre') !!}

                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre de la empresa']) !!}

                    @error('name')
                        <span class="text-danger">{{$message}}</span>
                    @enderror

                </div>

                {!! Form::submit('Crear Empresa', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop