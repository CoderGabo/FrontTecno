<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        // Simulación de datos de ventas mensuales
        $reportMes = [
            'Enero' => [
                (object)['nombre' => 'Producto A', 'cantidad' => 50, 'precio' => 50],
                (object)['nombre' => 'Producto B', 'cantidad' => 30, 'precio' => 75],
            ],
            'Febrero' => [
                (object)['nombre' => 'Producto A', 'cantidad' => 40, 'precio' => 50],
                (object)['nombre' => 'Producto B', 'cantidad' => 20, 'precio' => 75],
            ],
            // Agrega más meses según sea necesario
        ];

        // Calcular el totoal
        $totals = [];
        foreach ($reportMes as $mes => $reports) {
            $totals[$mes] = array_sum(array_map(function ($report) {
                return $report->cantidad * $report->precio;
            }, $reports));
        }


        return view('admin.reports.index', compact('reportMes', 'totals'));
    }
}
