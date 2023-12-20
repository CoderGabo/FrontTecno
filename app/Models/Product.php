<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'descripcion', 'precio', 'promocion', 'stock', 'eliminar'];

    public function detalles()
    {
        return $this->hasMany(Detalle::class, 'id_product', 'id');
    }
}
