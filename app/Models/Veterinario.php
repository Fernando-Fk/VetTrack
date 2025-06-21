<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Veterinario extends Model
{
    protected $table = 'veterinarios';
    protected $primaryKey = 'idVeterinario';
    public $timestamps = false;
    protected $fillable = [
        'nombre',
        'correo',
        'especialidad',
    ];
}
