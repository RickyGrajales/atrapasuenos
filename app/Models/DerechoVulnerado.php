<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DerechoVulnerado extends Model
{
    protected $fillable = [
        'tipo_derecho',
        'descripcion',
        'nna_id'
    ];

    public function nna()
    {
        return $this->belongsTo(Nna::class);
    }
}
