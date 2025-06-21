<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mascota extends Model
{
    protected $table = 'mascotas';
    protected $primaryKey = 'idMascota';
    public $timestamps = false;
    protected $fillable = [
        'nombre',
        'especie',
        'raza',
        'edad',
        'idPropietario',
    ];

    public function propietario()
    {
        return $this->belongsTo(Propietario::class, 'idPropietario', 'id');
    }
}
