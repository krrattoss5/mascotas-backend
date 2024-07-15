<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pet extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name', // Nombre de la mascota.
        'race_id', // ID de la raza de la mascota.
        'size', // Tamaño de la mascota (por ejemplo, pequeño, mediano, grande).
        'weight', // Peso de la mascota.
        'age', // Edad de la mascota.
        'personality', // Descripción de la personalidad de la mascota.
        'image', // Ruta de la imagen de la mascota.
        'status' // Estado de la mascota (por ejemplo, disponible para adopción, adoptado).
    ];

    
}