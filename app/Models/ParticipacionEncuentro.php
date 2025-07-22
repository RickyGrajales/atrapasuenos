<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ParticipacionEncuentro extends Model
{
    use HasFactory;

    protected $fillable = ['nna_id', 'encuentro_id', 'observaciones'];

    public function nna()
    {
        return $this->belongsTo(Nna::class);
    }

    public function encuentro()
    {
        return $this->belongsTo(Encuentro::class);
    }
}
