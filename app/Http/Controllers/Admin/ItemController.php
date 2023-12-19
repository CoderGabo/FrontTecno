<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = [
            (object)['nro_item' => 1, 'descripcion' => 'Este item es la deuda de Juan Pérez', 'monto' => 50, 'pagar' => false, 'fecha_paga' => null],
            (object)['nro_item' => 2, 'descripcion' => 'Este item es la deuda de María García', 'monto' => 75, 'pagar' => true, 'fecha_paga' => '2023-01-15'],
            (object)['nro_item' => 3, 'descripcion' => 'Este item es la deuda de Carlos Rodríguez', 'monto' => 100, 'pagar' => false, 'fecha_paga' => null],
        ];

        return view('admin.items.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        // $category->update($request->all());

        // return redirect()->route('admin.items.index', $category)->with('info', 'Se pago el Item con exito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
