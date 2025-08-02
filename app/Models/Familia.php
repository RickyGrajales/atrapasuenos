<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Familia extends Model
{
    protected $table = 'familias';

    protected $fillable = [
        'nna_id',
        'nombre_madre',
        'nombre_padre',
        'otros_miembros',
        'telefono',
        'direccion',
        'observaciones',
    ];

    public function nna()
    {
        return $this->belongsTo(Nna::class, 'nna_id');
    }
}
