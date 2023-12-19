<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Estatico
        $accounts = [
            (object)['nro_cuenta' => 12343535532, 'nombre' => 'Juan Pérez', 'servicio' => 'Bs', 'moneda' => 100],
            (object)['nro_cuenta' => 98765432100, 'nombre' => 'María García', 'servicio' => 'Bs', 'moneda' => 150],
            (object)['nro_cuenta' => 55511223344, 'nombre' => 'Carlos Rodríguez', 'servicio' => 'Bs', 'moneda' => 200],
        ];

        return view('admin.accounts.index', compact('accounts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.accounts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nro_cuenta' => 'required|unique',
            'nombre' => 'required',
            'servicio' => 'required',
            'moneda' => 'required',
        ]);

        $cuenta = Account::create($request->all());

        return redirect()->route('admin.accounts.edit', $cuenta)->with('info', 'La cuenta se creo con exito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Account $account)
    {
        return view('admin.accounts.show', compact('account'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Account $account)
    {
        return view('admin.accounts.edit', compact('account'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Account $account)
    {
        $request->validate([
            'nro_cuenta' => 'required|unique',
            'nombre' => 'required',
            'servicio' => 'required',
            'moneda' => 'required',
        ]);

        $account->update($request->all());

        return redirect()->route('admin.accounts.edit', $account)->with('info', 'La cuenta se actualizó con exito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Account $account)
    {
        $account->delete();

        return redirect()->route('admin.accounts.index')->with('info', 'La cuenta se elimino con exito');
    }
}
