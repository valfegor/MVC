<?php

namespace App\Http\Controllers;
use App\Producto;
use Illuminate\Http\Request;


class ProductoAPIController extends Controller
{
    ////Entrega una consulta , listamos en un apartado HTML todos los elementos o productos
    public function index(){
        $productos = Producto::get(
           [
            "id",
            "name",
            "description",
            "price"
           ]
        );

        if (!$productos) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, Not Acceptable.',
            ], 406);
        } else {
            return response()->json([
                'success' => true,
                'producto' => $productos,
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

        if ($producto->save())             return response()->json([                 'success' => true,                 'sensor' => $producto,             ], 201);         else             return response()->json([                 'success' => false,                 'message' => 'Sorry, product could not be added.'             ], 500); 
    }
}
