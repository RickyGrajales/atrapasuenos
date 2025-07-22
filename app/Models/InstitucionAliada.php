<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InstitucionAliada extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'direccion', 'telefono', 'correo'];

    public function talentoHumanos()
    {
        return $this->hasMany(TalentoHumano::class, 'institucion_id');
    }

    public function responsabilidadesIcbf()
    {
        return $this->hasMany(ResponsabilidadIcbf::class, 'institucion_id');
    }
}
