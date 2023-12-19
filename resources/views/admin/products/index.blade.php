@extends('adminlte::page')

@section('title', 'Front Web')

@section('content_header')
    <h1>Lista de Productos</h1>
@stop

@section('content')

    {{-- @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif --}}

    <div class="row">

        <div class="col-md-12 mb-3">
            <a class="btn btn-secondary" href="{{route('admin.products.create')}}">Agregar Producto</a>
        </div>

        @foreach ($products as $product)
            <div class="col-md-4 mb-3">
                <div class="card">
                    {{-- <img src="{{ $producto->imagen }}" class="card-img-top" alt="{{ $producto->nombre }}"> --}}
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->nombre }}</h5>
                        <p class="card-text">{{ $product->descripcion }}</p>
                        <p class="card-text">Precio: ${{ $product->precio }}</p>
                        <p class="card-text">Promocion: ${{ $product->promocion }}</p>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="btn btn-primary btn-block">Editar</a>
                        <a href="#" class="btn btn-danger btn-block">Eliminar</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@stop