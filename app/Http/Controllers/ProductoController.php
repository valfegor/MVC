<?php

namespace App\Http\Controllers;
use App\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{   
    //Entrega una consulta , listamos en un apartado HTML todos los elementos o productos
    public function index(){
        $productos = Producto::get();
        return \View::make('producto',['productos' => $productos]);


    }
    public function store(Request $request)
    {
        $producto = new Producto();
        $producto->name = $request->name;
        $producto->description = $request->description;
        $producto->brand = $request->brand;
        $producto->category = $request->category;
        $producto->price = $request->price;

        $producto->save();
        return redirect('producto');

    }

}
