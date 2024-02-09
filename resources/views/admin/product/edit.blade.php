@extends('layouts.admin')
@section('title', 'Editar producto')
@section('content')
<div class="card mb-4">
  <div class="card-header">
    Editar producto
  </div>
  <div class="card-body">

    <form method="POST" action="{{ route('admin.product.update', $product->id) }}" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="row">
        <div class="col">
          <div class="mb-3 row">
            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Nombre:</label>
            <div class="col-lg-10 col-md-6 col-sm-12">
              <input name="name" value="{{ $product->name }}" type="text" class="form-control">
            </div>
          </div>
        </div>
        <div class="col">
          <div class="mb-3 row">
            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Precio:</label>
            <div class="col-lg-10 col-md-6 col-sm-12">
              <input name="price" value="{{ $product->price }}" type="number" class="form-control">
            </div>
          </div>
        </div>
      </div>
      <div class="mb-3">
        <label class="form-label">Descripción</label>
        <textarea class="form-control" name="description" rows="3">{{ $product->description }}</textarea>
      </div>
      <div class="mb-3">
        <label class="form-label">Imagen actual:</label>
        <img src="{{ asset('/storage/'.$product->image) }}" class="img-fluid">
      </div>
      <div class="mb-3">
        <label class="form-label">Nueva imagen:</label>
        <input type="file" name="image">
      </div>
      <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
  </div>
</div>
@endsection
