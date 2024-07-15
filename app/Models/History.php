<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class History extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'name', // Nombre del historial o evento registrado.
        'description', // Descripción detallada del historial o evento.
        'url', // URL relacionada con el historial o evento, si aplica.
        'status', // Estado del historial o evento (por ejemplo, activo, inactivo).
        'pet_id', // ID de la mascota asociada al historial o evento.
        'user_id' // ID del usuario relacionado con el historial o evento.
    ];

    public function pet()
    {
        return $this->belongsTo(Pet::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}