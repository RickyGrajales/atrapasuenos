<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nna extends Model
{
    protected $table = 'nna';

    protected $fillable = [
        'nombres',
        'apellidos',
        'fecha_nacimiento',
        'documento_identidad',
        'genero',
        'direccion',
        'telefono',
        'correo',
    ];

    // Relación con Familia
    public function familia()
    {
        return $this->hasOne(Familia::class, 'nna_id');
    }

    // Relación con Valoración Psicosocial
    public function valoracionPsicosocial()
    {
        return $this->hasOne(ValoracionPsicosocial::class, 'nna_id');
    }

    // Relación con Seguimiento Psicosocial
    public function seguimientoPsicosocial()
    {
        return $this->hasMany(SeguimientoPsicosocial::class, 'nna_id');
    }

    // Relación con Historia Clínica
    public function historiaClinica()
    {
        return $this->hasOne(HistoriaClinica::class, 'nna_id');
    }

    // Relación con Responsabilidad ICBF
    public function responsabilidadIcbf()
    {
        return $this->hasOne(ResponsabilidadIcbf::class, 'nna_id');
    }

    // Relación con Derechos Vulnerados
    public function derechosVulnerados()
    {
        return $this->hasMany(DerechoVulnerado::class, 'nna_id');
    }

    // Relación con Medida de Protección
    public function medidasProteccion()
    {
        return $this->hasMany(MedidaProteccion::class, 'nna_id');
    }

    
}
