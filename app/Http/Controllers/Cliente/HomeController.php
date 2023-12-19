<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){

        $products = [
            (object)['id' => 1, 'nombre' => 'Producto A', 'descripcion' => 'Descripción del Producto A', 'precio' => 50, 'promocion' => null],
            (object)['id' => 2, 'nombre' => 'Producto B', 'descripcion' => 'Descripción del Producto B', 'precio' => 75, 'promocion' => 10],
            (object)['id' => 3, 'nombre' => 'Producto C', 'descripcion' => 'Descripción del Producto C', 'precio' => 100, 'promocion' => null],
            (object)['id' => 4, 'nombre' => 'Producto D', 'descripcion' => 'Descripción del Producto D', 'precio' => 150, 'promocion' => 15],
        ];

        return view('cliente.index', compact('products'));

    }

    public function store(Request $request){

        // $category = Category::create($request->all());

        // return redirect()->route('cliente.index')->with('info', 'Compra realizada con exito');

    }
}
