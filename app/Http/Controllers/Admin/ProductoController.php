<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = [
            (object)['id' => 1, 'nombre' => 'Producto A', 'descripcion' => 'Descripción del Producto A', 'precio' => 50, 'promocion' => null],
            (object)['id' => 2, 'nombre' => 'Producto B', 'descripcion' => 'Descripción del Producto B', 'precio' => 75, 'promocion' => 10],
            (object)['id' => 3, 'nombre' => 'Producto C', 'descripcion' => 'Descripción del Producto C', 'precio' => 100, 'promocion' => null],
        ];
        
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'precio' => 'required'
        ]);

        // $product = Product::create($request->all());

        // return redirect()->route('admin.products.edit', $product)->with('info', 'El producto se creo con exito');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $product)
    {
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $product)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'precio' => 'required'
        ]);

        // $product->update($request->all());

        // return redirect()->route('admin.categories.edit', $product)->with('info', 'El producto se actualizó con exito');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $product)
    {
        // $product->delete();

        // return redirect()->route('admin.product.index')->with('info', 'El producto se elimino con exito');
    }
}
