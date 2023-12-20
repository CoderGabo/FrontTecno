<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Empresa;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    protected $business;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $accounts =  Account::where('eliminar', false)
            ->orderBy('id', 'asc')
            ->get();

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
            // 'nro_cuenta' => 'required|unique',
            'nro_cuenta' => 'required',
            'nombre' => 'required',
            'servicio' => 'required',
            'moneda' => 'required',
            'id_empresa' => 'required',
        ]);

        $cuenta = Account::create($request->all());
        echo $cuenta;

        return redirect()->route('admin.accounts.edit', $cuenta)->with('info', 'La cuenta se creo con exito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Account $account)
    {
        $items = $account->items->filter(function ($item) {
            return $item->pagar == false;
        });


        return view('admin.items.index', compact('items'));
        // return view('admin.accounts.show', compact('account'));
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
            'id_empresa' => 'required',
        ]);

        $account->update($request->all());

        return redirect()->route('admin.accounts.edit', $account)->with('info', 'La cuenta se actualizó con exito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Account $account)
    {
        // $account->delete();
        $account->update(['eliminar' => true]);

        return redirect()->route('admin.accounts.index')->with('info', 'La cuenta se elimino con exito');
    }
}
