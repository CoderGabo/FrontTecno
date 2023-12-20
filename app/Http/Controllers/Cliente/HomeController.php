<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use App\Models\Detalle;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {

        $products = Product::where('eliminar', false)
            ->orderBy('id', 'asc')
            ->get();

        return view('cliente.index', compact('products'));
    }

    public function store(Request $request)
    {

        // echo $product;
        $request->validate([
            'cantidad' => 'required',
        ]);


        // echo $request->input('product_id');


        $productId = $request->input('product_id');
        $product = Product::findOrFail($productId);

        $id_user = Auth()->user()->id_rol;

        try {
            DB::beginTransaction();

            $detalle = Detalle::create([
                'cantidad' => $request->input('cantidad'),
                'promocion' => $product->promocion,
                'precio' => $product->precio,
                'total_pagar' => $request->input('cantidad') * $product->precio,
                'fecha' => now(),
                'pagado' => true,
                'id_product' => $product->id,
                'id_user' => $id_user,
            ]);

            $product->update(['stock' => $product->stock - $request->input('cantidad')]);

            DB::commit();

            return redirect()->route('cliente.home')->with('info', 'La compra se realizó con éxito');
        } catch (Exception $e) {
            echo $e;
            DB::rollBack();
            // return redirect()->route('cliente.home')->with('info', 'Error');
            // Handle the exception (redirect, show an error, log, etc.)
        }
    }
}
