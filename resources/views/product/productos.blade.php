@extends('layouts.app')

@section('content')

    <h1>Listado de Productos</h1>

    <div class="row">
        @foreach ($products as $product)
            <div class="col-md-6 col-lg-4 mb-2">
                <div class="card">
                    <img src="{{ asset('img/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <a href="{{ route('product.detalles', ['id' => $product->id]) }}" class="btn btn-primary">Ver Detalles</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection