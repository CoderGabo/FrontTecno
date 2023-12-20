<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'telefono' => 'required',
            'password' => 'required|min:6', // You can set a minimum length for the password
        ]);

        echo $request->input('name');

        // Hash the password before storing it
        $hashedPassword = bcrypt($request->input('password'));

        // // Create a new user with the hashed password
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'telefono' => $request->input('telefono'),
            'password' => $hashedPassword,
        ]);

        return redirect()->route('admin.users.index')->with('info', 'El Usuario se creo con exito');
    }
}
