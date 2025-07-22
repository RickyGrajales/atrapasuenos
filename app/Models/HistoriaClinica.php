<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HistoriaClinica extends Model
{
    protected $fillable = [
        'nna_id',
        'diagnostico',
        'tratamiento',
        'fecha'
    ];

    public function nna()
    {
        return $this->belongsTo(Nna::class);
    }
}
