<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MedidaProteccion extends Model
{
    protected $fillable = [
        'tipo_medida',
        'fecha_inicio',
        'fecha_fin',
        'nna_id'
    ];

    public function nna()
    {
        return $this->belongsTo(Nna::class);
    }
}
