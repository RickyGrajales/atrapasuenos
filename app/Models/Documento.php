<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Documento extends Model
{
    use HasFactory;

    protected $fillable = ['tipo', 'descripcion', 'archivo', 'nna_id'];

    public function nna()
    {
        return $this->belongsTo(Nna::class);
    }
}
