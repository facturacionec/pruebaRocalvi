<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $fillable = [
        'cedula',
        'apellido1',
        'apellido2',
        'nombre1',
        'nombre2',
        'correo',
        'telcel',
        'telefono',
        'telext',
        'whatsapp',
        'cargo_id',
        'empresa_id',
        'estado_id',
    ];
    public function estado()
    {
        return $this->belongsTo(Estado::class);
    }
    public function empresa()
    {
        return $this->belongsTo(compania::class);
    }
    public function cargo()
    {
        return $this->belongsTo(cargo::class);
    }
}
