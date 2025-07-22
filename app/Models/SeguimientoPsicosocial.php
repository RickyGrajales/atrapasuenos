<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SeguimientoPsicosocial extends Model
{
    protected $fillable = [
        'fecha_seguimiento',
        'nna_id',
        'observaciones'
    ];

    public function nna()
    {
        return $this->belongsTo(Nna::class);
    }
}
