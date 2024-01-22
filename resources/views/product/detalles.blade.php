@extends('layouts.app')

@section('content')

    <h1>Detalles del Producto</h1>

    @if ($product)
        <div>
            <h3>{{ $product->name }}</h3>
            <p>{{ $product->subtitle }}</p>
            <p>Precio: ${{ $product->price }}</p>
            <img src="{{ asset('img/' . $product->image) }}" alt="{{ $product->name }}" width="200">
        </div>
    @else
        <p>Producto no encontrado</p>
    @endif

    <a href="{{ route('product.productos') }}">Volver al Listado</a>

@endsection
