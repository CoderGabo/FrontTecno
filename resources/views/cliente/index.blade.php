@extends('adminlte::page')

@section('title', 'Front Web')

@section('content_header')
    <h1>Hola Cliente</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif
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
                        <p class="card-text">Stock: ${{ $product->stock }}</p>
                        {{-- Agrega el input para la cantidad --}}
                        {{-- <div class="form-group">
                            <label for="cantidad{{ $product->id }}">Cantidad:</label>
                            <input type="number" class="form-control" id="cantidad{{ $product->id }}"
                                name="cantidad{{ $product->id }}" value="1" min="1" max={{ $product->stock }}>
                        </div> --}}
                    </div>
                    <div class="card-footer">
                        {!! Form::open(['route' => 'cliente.store']) !!}
                        @csrf

                        <div class="form-group">
                            {{-- Hidden input for product ID --}}
                            {!! Form::hidden('product_id', $product->id) !!}

                            {{-- Label and input for 'cantidad' --}}
                            {!! Form::label('cantidad', 'Cantidad') !!}
                            {!! Form::number('cantidad', 1, [
                                'class' => 'form-control',
                                'placeholder' => 'Ingrese la cantidad',
                                'min' => 1,
                                'max' => $product->stock,
                            ]) !!}

                            @error('cantidad')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Submit button --}}
                        {!! Form::submit('Comprar', ['class' => 'btn btn-primary btn-block']) !!}

                        {!! Form::close() !!}
                    </div>
                    {{-- <div class="card-footer">
                        <button href="#" class="btn btn-primary btn-block">Comprar</button>
                    </div> --}}
                </div>
            </div>
        @endforeach
    </div>
    <!-- Muestra el contador de visitas -->
    <p>Esta página ha sido visitada {{ session('page_visits', 0) }} veces.</p>
@stop
