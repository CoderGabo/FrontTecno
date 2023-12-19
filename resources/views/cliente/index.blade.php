@extends('adminlte::page')

@section('title', 'Front Web')

@section('content_header')
    <h1>Hola Cliente</h1>
@stop

@section('content')
    <div class="row">
        @foreach ($products as $product)
            <div class="col-md-4 mb-3">
                <div class="card">
                    {{-- <img src="{{ $producto->imagen }}" class="card-img-top" alt="{{ $producto->nombre }}"> --}}
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->nombre }}</h5>
                        <p class="card-text">{{ $product->descripcion }}</p>
                        <p class="card-text">Precio: ${{ $product->precio }}</p>
                        <p class="card-text">Promocion: ${{ $product->promocion }}</p>
                        
                        {{-- Agrega el input para la cantidad --}}
                        <div class="form-group">
                            <label for="cantidad{{ $product->id }}">Cantidad:</label>
                            <input type="number" class="form-control" id="cantidad{{ $product->id }}" name="cantidad{{ $product->id }}" value="1" min="1">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button href="#" class="btn btn-primary btn-block">Comprar</button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@stop