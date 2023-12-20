<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = ['monto', 'pagar', 'fecha_paga', 'id_cuenta', 'descripcion'];

    public function account()
    {
        return $this->belongsTo(Account::class, 'id_cuenta', 'id');
    }
}
