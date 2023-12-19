<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){

        $ventasMensuales = [
            'Enero' => [
                (object)['nombre' => 'Producto A', 'cantidad' => 50, 'precio' => 50],
                (object)['nombre' => 'Producto B', 'cantidad' => 30, 'precio' => 75],
                (object)['nombre' => 'Producto D', 'cantidad' => 20, 'precio' => 120],
            ],
            'Febrero' => [
                (object)['nombre' => 'Producto A', 'cantidad' => 40, 'precio' => 50],
                (object)['nombre' => 'Producto B', 'cantidad' => 20, 'precio' => 75],
                (object)['nombre' => 'Producto C', 'cantidad' => 15, 'precio' => 100],
            ],
            'Marzo' => [
                (object)['nombre' => 'Producto A', 'cantidad' => 60, 'precio' => 50],
                (object)['nombre' => 'Producto B', 'cantidad' => 25, 'precio' => 75],
                (object)['nombre' => 'Producto C', 'cantidad' => 30, 'precio' => 100],
                (object)['nombre' => 'Producto D', 'cantidad' => 15, 'precio' => 120],
            ],
            'Abril' => [
                (object)['nombre' => 'Producto A', 'cantidad' => 45, 'precio' => 50],
                (object)['nombre' => 'Producto B', 'cantidad' => 35, 'precio' => 75],
                (object)['nombre' => 'Producto C', 'cantidad' => 20, 'precio' => 100],
                (object)['nombre' => 'Producto D', 'cantidad' => 25, 'precio' => 120],
            ],
            // Agregar más
        ];

        $ventasGoogleChartData = $this->generateGoogleChartData($ventasMensuales);
        $gananciasGoogleChartData = $this->generateBarChartData($ventasMensuales);

        return view('admin.index', compact('ventasGoogleChartData', 'gananciasGoogleChartData'));

    }

    private function generateGoogleChartData($ventasMensuales)
    {
        $productos = ['Producto A', 'Producto B', 'Producto C', 'Producto D'];

        $googleChartData = [
            ['Mes', ...$productos],
        ];

    
        foreach (array_keys($ventasMensuales) as $mes) {
            $row = [$mes];
            foreach ($productos as $producto) {
                $cantidad = 0;
                foreach ($ventasMensuales[$mes] as $venta) {
                    $cantidad += ($venta->nombre === $producto) ? $venta->cantidad : 0;
                }
                $row[] = $cantidad;
            }
            $googleChartData[] = $row;
        }
    
        return json_encode($googleChartData);
    }

    private function generateBarChartData($ventasMensuales)
    {
        $meses = array_keys($ventasMensuales);
        $gananciasMensuales = [];

        foreach ($meses as $mes) {
            $gananciaMes = 0;
            foreach ($ventasMensuales[$mes] as $venta) {
                $gananciaMes += $venta->cantidad * $venta->precio;
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
