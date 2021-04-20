<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    protected $fillable = [
        'descripcion', 
        'estado_id', 
    ];

    

    public function estado()
    {
        return $this->belongsTo(Estado::class);
    }
}
