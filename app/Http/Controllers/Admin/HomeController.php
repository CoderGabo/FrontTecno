<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Detalle;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // $user = Auth()->user()->id_rol;

        // echo $user;

        // $ventasMensuales = [
        //     'Enero' => [
        //         (object)['nombre' => 'Producto A', 'cantidad' => 50, 'precio' => 50],
        //         (object)['nombre' => 'Producto B', 'cantidad' => 30, 'precio' => 75],
        //         (object)['nombre' => 'Producto D', 'cantidad' => 20, 'precio' => 120],
        //     ],
        //     'Febrero' => [
        //         (object)['nombre' => 'Producto A', 'cantidad' => 40, 'precio' => 50],
        //         (object)['nombre' => 'Producto B', 'cantidad' => 20, 'precio' => 75],
        //         (object)['nombre' => 'Producto C', 'cantidad' => 15, 'precio' => 100],
        //     ],
        //     'Marzo' => [
        //         (object)['nombre' => 'Producto A', 'cantidad' => 60, 'precio' => 50],
        //         (object)['nombre' => 'Producto B', 'cantidad' => 25, 'precio' => 75],
        //         (object)['nombre' => 'Producto C', 'cantidad' => 30, 'precio' => 100],
        //         (object)['nombre' => 'Producto D', 'cantidad' => 15, 'precio' => 120],
        //     ],
        //     'Abril' => [
        //         (object)['nombre' => 'Producto A', 'cantidad' => 45, 'precio' => 50],
        //         (object)['nombre' => 'Producto B', 'cantidad' => 35, 'precio' => 75],
        //         (object)['nombre' => 'Producto C', 'cantidad' => 20, 'precio' => 100],
        //         (object)['nombre' => 'Producto D', 'cantidad' => 25, 'precio' => 120],
        //     ],
        //     // Agregar más
        // ];

        $fechaHacecuatroMeses = Carbon::now()->subMonths(4)->toDateString();

        // Consulta para obtener los detalles de los últimos 3 meses con pagado = true
        $ventasMensuales = Detalle::where('pagado', true)
            ->where('fecha', '>=', $fechaHacecuatroMeses)
            ->with('product') // Cargar la relación product
            ->get()
            ->groupBy(function ($detalle) {
                return Carbon::parse($detalle->fecha)->format('F'); // Agrupar por mes
            })
            ->map(function ($details, $month) {
                return $details->map(function ($detail) {
                    return [
                        'nombre' => $detail->product->nombre,
                        'cantidad' => $detail->cantidad,
                        'precio' => $detail->precio,
                    ];
                });
            });

        $ventasGoogleChartData = $this->generateGoogleChartData($ventasMensuales);
        $gananciasGoogleChartData = $this->generateBarChartData($ventasMensuales);

        return view('admin.index', compact('ventasGoogleChartData', 'gananciasGoogleChartData'));
    }

    private function generateGoogleChartData($ventasMensuales)
    {
        $productos = Product::pluck('nombre')->toArray();

        $googleChartData = [
            ['Mes', ...$productos],
        ];

        $ventasMensuales = $ventasMensuales->toArray(); // Convert to array

        foreach (array_keys($ventasMensuales) as $mes) {
            $row = [$mes];
            foreach ($productos as $producto) {
                $cantidad = 0;
                foreach ($ventasMensuales[$mes] as $venta) {
                    $cantidad += ($venta['nombre'] === $producto) ? $venta['cantidad'] : 0;
                }
                $row[] = $cantidad;
            }
            $googleChartData[] = $row;
        }

        return json_encode($googleChartData);
    }


    private function generateBarChartData($ventasMensuales)
    {
        $ventasMensuales = $ventasMensuales->toArray(); // Convert to array

        $meses = array_keys($ventasMensuales);
        $gananciasMensuales = [];

        foreach ($meses as $mes) {
            $gananciaMes = 0;
            foreach ($ventasMensuales[$mes] as $venta) {
                $gananciaMes += $venta['cantidad'] * $venta['precio'];
            }
            $gananciasMensuales[] = $gananciaMes;
        }

        $barChartData = [
            ['Mes', 'Ganancias'],
        ];

        foreach ($meses as $index => $mes) {
            $barChartData[] = [$mes, $gananciasMensuales[$index]];
        }

        return json_encode($barChartData);
    }
}
