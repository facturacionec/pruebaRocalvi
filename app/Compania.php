<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compania extends Model
{
    protected $fillable = [
        'ruc', 
        'razon_social', 
        'estado_id', 
    ];
    public function estado()
    {
        return $this->belongsTo(Estado::class);
    }
    
    
    
}
