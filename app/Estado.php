<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $fillable = [
        'descripcion', 
        'estado_me_id', 
    ];
    public function estado()
    {
        return $this->belongsTo(Estado::class,"estado_me_id");
    }
    
}
