<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ValoracionPsicosocial extends Model
{
    protected $table = 'valoracion_psicosocial';

    protected $fillable = [
        'nna_id',
        'fecha_valoracion',
        'observaciones',
        'diagnostico',
        'profesional',
    ];

    public function nna()
    {
        return $this->belongsTo(Nna::class, 'nna_id');
    }
}
