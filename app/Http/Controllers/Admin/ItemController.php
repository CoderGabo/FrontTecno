<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {


        $items = Item::where('pagar', false)
            ->orderBy('id', 'asc')
            ->get();
        return view('admin.items.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.items.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'monto' => 'required',
            'descripcion' => 'required',
            'nro_cuenta' => 'required',
        ]);

        // Buscar la cuenta por el número de cuenta proporcionado
        $cuenta = Account::where('nro_cuenta', $request->input('nro_cuenta'))->first();

        // Verificar si se encontró la cuenta
        if (!$cuenta) {
            return redirect()->back()->with('error', 'No se encontró una cuenta con ese número');
        }

        // Crear el ítem usando el ID de la cuenta encontrado
        $item = Item::create([
            'monto' => $request->input('monto'),
            'descripcion' => $request->input('descripcion'),
            'id_cuenta' => $cuenta->id,
            // Agrega otros campos según sea necesario
        ]);

        return redirect()->route('admin.items.edit', $item)->with('info', 'El ítem se añadió con éxito');
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
    public function edit(Item $item)
    {
        return view('admin.items.edit', compact('item'));
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
    public function destroy(Item $item)
    {

        // Obtener la cuenta asociada al ítem
        $cuenta = $item->account;

        // Verificar si el monto del ítem es mayor que la moneda de la cuenta
        if ($item->monto > floatval($cuenta->moneda)) {
            // Si el monto del ítem es mayor, lanzar una excepción de validación
            return redirect()->route('admin.items.index')->with('info', 'El monto del ítem es mayor que la moneda de la cuenta. No se puede pagar.');
        }

        $item->update([
            'pagar' => true,
            'fecha_paga' => now(),  // Establece la fecha actual
        ]);

        $cuenta->update([
            'moneda' => floatval($cuenta->moneda) - $item->monto,
        ]);

        return redirect()->route('admin.items.index')->with('info', 'El ítem se pagó con éxito');
    }
}
