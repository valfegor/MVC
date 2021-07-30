<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;

class ProductoAPIController extends Controller
{
    ////Entrega una consulta , listamos en un apartado HTML todos los elementos o productos
    public function index(){
        $productos = Producto::get([]);
        ;

        if (!$products) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, Not Acceptable.',
            ], 406);
        } else {
            return response()->json([
                'success' => true,
                'products' => $products,
            ], 200);
        }



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
