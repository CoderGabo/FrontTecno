<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = [
            (object)['id' => 1, 'nombre' => 'Juan Pérez', 'email' => 'juan@example.com', 'telefono' => '123456789', 'empresa' => 'Empresa A'],
            (object)['id' => 2, 'nombre' => 'María García', 'email' => 'maria@example.com', 'telefono' => '987654321', 'empresa' => 'Empresa B'],
            (object)['id' => 3, 'nombre' => 'Carlos Rodríguez', 'email' => 'carlos@example.com', 'telefono' => '555555555', 'empresa' => 'Empresa C'],
        ];

        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'email' => 'required',
            'telefono' => 'required'
        ]);

        // $user = User::create($request->all());

        // return redirect()->route('admin.users.index')->with('info', 'El Usuario se creo con exito');
    }
}
