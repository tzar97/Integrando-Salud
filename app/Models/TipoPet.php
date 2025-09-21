<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;



class TipoPet extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nombre',
        'color',
        'intensidad',
        'duracion_min',
        'requiere_ayuno',
        'observaciones',
        'estado'
    ];

    protected $casts = [
        'requiere_ayuno' => 'boolean',
        'estado' => 'boolean',
    ];





    public function tratamientos()
    {
        return $this->hasMany(Tratamiento::class, 'tipo_pet_id');
    }




    public function scopeActivos($query)
    {
        return $query->where('estado', true);
    }
}