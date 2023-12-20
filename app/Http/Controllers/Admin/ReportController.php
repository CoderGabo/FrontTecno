<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Detalle;
use App\Models\Product;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function index()
    {
        // Obtener la fecha de hace 3 meses
        $fechaHaceTresMeses = Carbon::now()->subMonths(3)->toDateString();

        // Consulta para obtener los detalles de los últimos 3 meses con pagado = true
        $reportMes = Detalle::where('pagado', true)
            ->where('fecha', '>=', $fechaHaceTresMeses)
            ->with('product') // Cargar la relación product
            ->get()
            ->groupBy(function ($detalle) {
                return Carbon::parse($detalle->fecha)->format('F'); // Agrupar por mes
            })
            ->map(function ($details) {
                // Merge items with the same product name
                $mergedDetails = $details->groupBy('id_product')->map(function ($groupedDetails) {
                    $mergedItem = [
                        'nombre' => $groupedDetails->first()->product->nombre,
                        'cantidad' => $groupedDetails->sum('cantidad'),
                        'precio' => $groupedDetails->sum('total_pagar') / $groupedDetails->sum('cantidad'),
                    ];

                    return $mergedItem;
                });

                return $mergedDetails;
            });


        // Calcular el total
        $totals = [];
        foreach ($reportMes as $mes => $reports) {
            $totals[$mes] = 0;

            $reports->each(function ($report) use (&$totals, $mes) {
                $totals[$mes] += $report['cantidad'] * $report['precio'];
            });
        }

        return view('admin.reports.index', compact('reportMes', 'totals'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
        ]);

        $fechaInicio = $request->input('fecha_inicio');
        $fechaFin = $request->input('fecha_fin');

        $results = Detalle::whereBetween('fecha', [$fechaInicio, $fechaFin])
            ->with('product')
            ->get()
            ->groupBy('product.nombre') // Group by product name
            ->map(function ($details, $nombre) {
                return [
                    'nombre' => $nombre,
                    'cantidad' => $details->sum('cantidad'),
                    'precio' => $details->sum('total_pagar') / $details->sum('cantidad'),
                ];
            })
            ->values();

        $total = $results->sum(function ($detail) {
            return $detail['cantidad'] * $detail['precio'];
        });

        return view('admin.reports.query', compact('results', 'total', 'fechaInicio', 'fechaFin'));
    }
}
