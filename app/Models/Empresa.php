<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'eliminar'];

    public function accounts()
    {
        return $this->hasMany(Account::class, 'id_empresa', 'id');
    }
}
