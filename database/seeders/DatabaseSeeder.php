<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Account;
use App\Models\Detalle;
use App\Models\Empresa;
use App\Models\Item;
use App\Models\Product;
use App\Models\Role;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        Role::create(['name' => 'Admin']);
        Role::create(['name' => 'Cliente']);

        $this->call(UserSeeder::class);
        $empresasData = [
            (object)['id' => 1, 'name' => 'Acme Corporation'],
            (object)['id' => 2, 'name' => 'Tech Innovators Ltd.'],
            (object)['id' => 3, 'name' => 'Global Services Inc.'],
        ];

        foreach ($empresasData as $empresaData) {
            Empresa::create(['name' => $empresaData->name]);
        }

        $accountsData = [
            (object)['nro_cuenta' => 12343535532, 'nombre' => 'Juan Pérez', 'servicio' => 'Bs', 'moneda' => 100, 'id_empresa' => 1],
            (object)['nro_cuenta' => 98765432100, 'nombre' => 'María García', 'servicio' => 'Bs', 'moneda' => 150, 'id_empresa' => 2],
            (object)['nro_cuenta' => 55511223344, 'nombre' => 'Carlos Rodríguez', 'servicio' => 'Bs', 'moneda' => 200, 'id_empresa' => 3],
        ];

        foreach ($accountsData as $accountData) {
            Account::create([
                'nro_cuenta' => $accountData->nro_cuenta,
                'nombre' => $accountData->nombre,
                'servicio' => $accountData->servicio,
                'moneda' => $accountData->moneda,
                'id_empresa' => $accountData->id_empresa,
            ]);
        }

        $items = [
            (object)['nro_item' => 1, 'descripcion' => 'Este item es la deuda de Juan Pérez', 'monto' => 50, 'id_cuenta' => 1],
            (object)['nro_item' => 2, 'descripcion' => 'Este item es la deuda de María García', 'monto' => 75, 'id_cuenta' => 1],
            (object)['nro_item' => 3, 'descripcion' => 'Este item es la deuda de Carlos Rodríguez', 'monto' => 100, 'id_cuenta' => 2],
        ];

        foreach ($items as $itemData) {
            Item::create([
                'descripcion' => $itemData->descripcion,
                'monto' => $itemData->monto,
                'id_cuenta' => $itemData->id_cuenta,
            ]);
        }

        $products = [
            (object)['id' => 1, 'nombre' => 'Producto A', 'descripcion' => 'Descripción del Producto A', 'precio' => 50, 'stock' => 2, 'promocion' => 0],
            (object)['id' => 2, 'nombre' => 'Producto B', 'descripcion' => 'Descripción del Producto B', 'precio' => 75, 'stock' => 10, 'promocion' => 0],
            (object)['id' => 3, 'nombre' => 'Producto C', 'descripcion' => 'Descripción del Producto C', 'precio' => 100, 'stock' => 50, 'promocion' => 10],
        ];

        foreach ($products as $itemData) {
            Product::create([
                'nombre' => $itemData->nombre,
                'descripcion' => $itemData->descripcion,
                'precio' => $itemData->precio,
                'stock' => $itemData->stock,
                'promocion' => $itemData->promocion,
            ]);
        }

        $detalles = [
            (object)['cantidad' => 5, 'precio' => 50, 'promocion' => 0, 'total_pagar' => 250, 'pagado' => true, 'fecha' => '2023-12-15', 'id_user' => 1, 'id_product' => 1],
            (object)['cantidad' => 2, 'precio' => 100, 'promocion' => 10, 'total_pagar' => 180, 'pagado' => false, 'fecha' => null, 'id_user' => 1, 'id_product' => 3],
            (object)['cantidad' => 1, 'precio' => 50, 'promocion' => 0, 'total_pagar' => 50, 'pagado' => false, 'fecha' => null, 'id_user' => 2, 'id_product' => 1],
        ];

        foreach ($detalles as $itemData) {
            Detalle::create([
                'precio' => $itemData->precio,
                'cantidad' => $itemData->cantidad,
                'promocion' => $itemData->promocion,
                'total_pagar' => $itemData->total_pagar,
                'pagado' => $itemData->pagado,
                'fecha' => $itemData->fecha,
                'id_user' => $itemData->id_user,
                'id_product' => $itemData->id_product,
            ]);
        }
    }
}
