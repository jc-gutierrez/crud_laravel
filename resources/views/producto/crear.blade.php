@extends("layouts.sitio") 

@section('titulo', 'NUEVO')

@section("contenedor")

<br>
<h5>NUEVO PRODUCTO</h5>
<br>

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('producto.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <label for="">Nombre:</label>
    <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre') }}"/>
    
    @error('nombre')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    
    <label for="">Cantidad:</label>
    <input type="number" name="cantidad" class="form-control @error('cantidad') is-invalid @enderror" value="{{ old('cantidad') }}"/>
    @error('cantidad')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    <label for="">Precio:</label>
    <input type="number" step="0.01" name="precio" class="form-control @error('precio') is-invalid @enderror" value="{{ old('precio') }}"/>
    
    <label for="">imagen:</label>
    <input type="file" name="imagen" class="form-control"/>
    
    <label for="">Descripcion:</label>
    <input type="text" name="descripcion" class="form-control @error('descripcion') is-invalid @enderror" value="{{ old('descripcion') }}"/>
    
    @error('descripcion')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror

    <br>
    <input type="submit" class="btn btn-success" />
</form>

@endsection


