<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::where('eliminar', false)
            ->orderBy('id', 'asc')
            ->get();

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
            'precio' => 'required',
            'stock' => 'required',
            'promocion' => 'required',
        ]);

        $product = Product::create($request->all());

        return redirect()->route('admin.products.edit', $product)->with('info', 'El producto se creo con exito');
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
    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'precio' => 'required'
        ]);

        $product->update($request->all());

        return redirect()->route('admin.products.edit', $product)->with('info', 'El producto se actualizó con exito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        // $product->delete();
        $product->update(['eliminar' => true]);
        return redirect()->route('admin.products.index')->with('info', 'El producto se elimino con exito');
    }
}
