@extends("layouts.sitio")

@section("titulo", "LISTAR")

@section("contenedor")
<br>
<div>
    <h5>LISTADO DE PRODUCTOS</h5>
</div>

<br>

<div>
    <a href="{{ route('producto.create') }}" class="btn btn-primary">Nuevo Producto</a>
</div>
<br>

<table class="table">
    <tr>
        <th>ID</th>
        <th>NOMBRE</th>
        <th>PRECIO</th>
        <th>CANTIDAD</th>
        <th>IMAGEN</th>
        <th>CATEGORIA</th>
        <th>ACCIONES</th>
    </tr>
    @foreach($productos as $prod)
    <tr>
        <td>{{ $prod->id }}</td>
        <td>{{ $prod->nombre }}</td>
        <td>{{ $prod->precio }}</td>
        <td>{{ $prod->cantidad }}</td>
        <td>
            <img src="{{ asset($prod->imagen) }}" width="60px" alt="">
        </td>
        <td>{{ $prod->descripcion }}</td>
        <td>
            <!--a href="{{ route('producto.show', $prod->id) }}" class="btn btn-success btn-xs">Ver</a-->
            <a href="{{ route('producto.edit', $prod->id) }}" class="btn btn-warning">Editar</a>
        
            <form action="{{ route('producto.destroy', $prod->id) }}" method="post">
                @csrf
                @Method('DELETE')
                <input type="submit" value="Eliminar" class="btn btn-danger btn-xs">
            </form>        
        
        </td>

    </tr>
    @endforeach
</table>

@endsection
