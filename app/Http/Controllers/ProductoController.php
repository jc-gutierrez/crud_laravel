<?php

namespace App\Http\Controllers;

use App\Producto;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\DB;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::All();
        return view("producto.listar", compact("productos"));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('producto.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "nombre" => "required|min:2|max:150",
            "precio" => "required",
            "cantidad" => "required",
        ]);

        $prod = new Producto;
        $prod->nombre = $request->nombre;
        $prod->cantidad = $request->cantidad;
        $prod->precio = $request->precio;
        $prod->descripcion = $request->descripcion;

        if($file = $request->file("imagen")){
            $nombre_archivo = $file->getClientOriginalName();
            $file->move("img/productos", $nombre_archivo);
        
        $prod->imagen = "/img/productos/" . $nombre_archivo;
        }
        $prod->save();

        return redirect("/producto");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        //muestra productos
        return view("producto.mostrar");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producto = Producto::find($id);
        return view('producto.editar', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            "nombre" => "required|min:2|max:150",
            "precio" => "required",
            "cantidad" => "required",
        ]);

        $prod = Producto::find($id);
        $prod->nombre = $request->nombre;
        $prod->cantidad = $request->cantidad;
        $prod->precio = $request->precio;
        $prod->descripcion = $request->descripcion;

        if($file = $request->file("imagen")){
            $nombre_archivo = $file->getClientOriginalName();
            $file->move("img/productos", $nombre_archivo);
        
        $prod->imagen = "/img/productos/" . $nombre_archivo;
        }
        $prod->save();

        return redirect("/producto");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $prod = Producto::find($id);
        $prod->delete();
        return redirect("/producto")->with("ok", "Producto Eliminado");
    }
}
