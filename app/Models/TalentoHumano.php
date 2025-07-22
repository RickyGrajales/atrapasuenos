<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TalentoHumano extends Model
{
    use HasFactory;

    protected $fillable = ['nombres', 'apellidos', 'cargo', 'correo', 'telefono', 'institucion_id'];

    public function institucion()
    {
        return $this->belongsTo(InstitucionAliada::class, 'institucion_id');
    }

    public function responsabilidades()
    {
        return $this->hasMany(ResponsabilidadIcbf::class, 'responsable_id');
    }
}
