<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RutaActivada extends Model
{
    use HasFactory;

    protected $fillable = ['nombre_ruta', 'fecha_inicio', 'nna_id'];

    public function nna()
    {
        return $this->belongsTo(Nna::class);
    }
}
