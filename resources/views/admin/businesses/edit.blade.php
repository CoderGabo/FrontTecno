@extends('adminlte::page')

@section('title', 'Front Web')

@section('content_header')
    <h1>Editar Empresa</h1>
@stop

@section('content')
    @if (session('info'))
    <div class="alert alert-success">
        <strong>{{session('info')}}</strong>
    </div>
    @endif

    <div class="card">
        <div class="card-body">
            {!! Form::model($empresa, ['route' => ['admin.businesses.update', $empresa], "method" => 'put']) !!}

                <div class="form-group">
                    {!! Form::label('name', 'Nombre') !!}

                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre de la empresa']) !!}

                    @error('name')
                        <span class="text-danger">{{$message}}</span>
                    @enderror

                </div>

                {!! Form::submit('Actualizar Epmresa', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop