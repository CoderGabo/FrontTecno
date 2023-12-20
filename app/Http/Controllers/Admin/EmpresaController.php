<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Empresa;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $businesses = Empresa::where('eliminar', false)
            ->orderBy('id', 'asc')
            ->get();

        return view('admin.businesses.index', compact('businesses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.businesses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $empresa = Empresa::create($request->all());

        return redirect()->route('admin.businesses.edit', $empresa)->with('info', 'La empresa se creo con exito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Empresa $empresa)
    {
        $accounts = $empresa->accounts->filter(function ($account) {
            return $account->eliminar == false;
        });

        return view('admin.accounts.index', compact('accounts'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Empresa $empresa)
    {
        return view('admin.businesses.edit', compact('empresa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Empresa $empresa)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $empresa->update($request->all());

        return redirect()->route('admin.businesses.edit', $empresa)->with('info', 'La empresa se actualizó con exito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Empresa $empresa)
    {
        // $empresa->delete();

        $empresa->update(['eliminar' => true]);

        return redirect()->route('admin.businesses.index')->with('info', 'La empresa se elimino con exito');
    }
}
