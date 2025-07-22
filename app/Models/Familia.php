<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Familia extends Model
{
    protected $table = 'familia';

    protected $fillable = [
        'nna_id',
        'nombre_acudiente',
        'parentesco',
        'telefono_acudiente',
        'direccion_acudiente',
    ];

    public function nna()
    {
        return $this->belongsTo(Nna::class, 'nna_id');
    }
}
