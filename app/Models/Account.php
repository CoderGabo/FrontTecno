<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $fillable = ['nro_cuenta', 'nombre', 'servicio', 'moneda', 'id_empresa', 'eliminar'];

    public function empresa()
    {
        return $this->belongsTo(Empresa::class, 'id_empresa', 'id');
    }

    public function items()
    {
        return $this->hasMany(Item::class, 'id_cuenta', 'id');
    }
}
