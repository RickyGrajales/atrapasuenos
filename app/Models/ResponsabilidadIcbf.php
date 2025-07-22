<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ResponsabilidadIcbf extends Model
{
    use HasFactory;

    protected $fillable = ['actividad', 'detalle', 'fecha_compromiso', 'estado', 'institucion_id', 'responsable_id'];

    public function institucion()
    {
        return $this->belongsTo(InstitucionAliada::class, 'institucion_id');
    }

    public function responsable()
    {
        return $this->belongsTo(TalentoHumano::class, 'responsable_id');
    }
}
