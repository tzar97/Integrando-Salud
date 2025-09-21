<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tratamiento extends Model
{
    use HasFactory;

    protected $fillable = [
        'paciente_id', 'tipo_pet_id', 'fecha_inicio'
    ];




    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }


    
    public function tipoPet()
    {
        return $this->belongsTo(TipoPet::class, 'tipo_pet_id');
    }
}