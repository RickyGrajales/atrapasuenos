<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Acudiente extends Model
{
    use HasFactory;

    // Tabla asociada
    protected $table = 'acudientes';

    // Atributos que se pueden asignar en masa
    protected $fillable = [
        'nombres',
        'apellidos',
        'documento_identidad',
        'telefono',
        'correo',
        'direccion',
        // Agrega más si tienes más columnas
    ];

    // Relación: un acudiente tiene muchos NNA
    public function nnas()
    {
        return $this->hasMany(Nna::class);
    }
}
