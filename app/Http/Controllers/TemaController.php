<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TemaController extends Controller
{
    public function cambiarTema($tema)
    {
        // Verificar si el tema es "original" antes de almacenarlo en la sesión
        if ($tema === 'original') {
            session(['tema' => $tema]);
            config(['tema' => $tema]);
            return redirect()->route('admin.home');
        }

        return response()->json(['mensaje' => 'Tema no cambiado']);
    }
}
