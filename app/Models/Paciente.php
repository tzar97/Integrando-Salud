<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    
    use HasFactory;

    protected $fillable = [
        'nombre', 'apellido', 'sexo', 'dni', 'fecha_nacimiento'
    ];


    
    public function tratamientos ()
    {
        return $this->hasMany (tratamientos::class);
    }



}
