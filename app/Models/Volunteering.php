<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Volunteering extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'user_id', // ID del usuario que crea la tarea de voluntariado.
        'name', // Nombre de la oportunidad de voluntariado.
        'description', // Descripción detallada de la actividad de voluntariado.
        'status', // Estado de la oportunidad de voluntariado (por ejemplo, disponible, completado).
        'date_start', // Fecha de inicio de la actividad de voluntariado.
        'date_end', // Fecha de finalización de la actividad de voluntariado.
        'observations', // Observaciones adicionales sobre la actividad de voluntariado.
        'locations' // Ubicaciones asociadas a la actividad de voluntariado.
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
