<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vacuna extends Model
{
    protected $table = 'vacunas';
    protected $primaryKey = 'idVacuna';
    public $timestamps = false;
    protected $fillable = [
        'idMascota',
        'nombre',
        'fecha_aplicacion',
        'fecha_proxima',
    ];

    public function mascota()
    {
        return $this->belongsTo(Mascota::class, 'idMascota', 'idMascota');
    }
}
