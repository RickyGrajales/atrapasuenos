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
        'nna_id',
        'nombres',
        'apellidos',
        'documento_identidad',
        'telefono',
        'correo',
        'direccion',
        'parentesco'
        // Agrega más si tienes más columnas
    ];

    // Relación: un acudiente tiene muchos NNA

    public function nna()
    {
        return $this->belongsTo(Nna::class);
    }
}
