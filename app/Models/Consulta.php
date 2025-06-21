<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    protected $table = 'consultas';
    protected $primaryKey = 'idConsulta';
    public $timestamps = false;
    protected $fillable = [
        'idMascota',
        'idVeterinario',
        'fecha',
        'hora_atencion',
        'diagnostico',
        'tratamiento',
    ];

    public function mascota()
    {
        return $this->belongsTo(Mascota::class, 'idMascota', 'idMascota');
    }

    public function veterinario()
    {
        return $this->belongsTo(Veterinario::class, 'idVeterinario', 'idVeterinario');
    }
}
