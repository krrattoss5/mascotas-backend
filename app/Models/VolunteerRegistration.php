<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VolunteerRegistration extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'volunteering_id', // ID de la actividad de voluntariado a la que se registra el voluntario.
        'volunteer_user_id', // ID del usuario que se registra como voluntario.
        'role', // Rol o función que el voluntario desempeñará en la actividad.
        'status', // Estado del registro del voluntario (por ejemplo, pendiente, aprobado, completado).
        'observations', // Observaciones adicionales sobre el registro o la participación del voluntario.
        'hours_committed', // Horas a las que el voluntario se compromete.
        'hours_completed' // Horas efectivamente completadas por el voluntario.
    ];

    public function volunteering()
    {
        return $this->belongsTo(Volunteering::class);
    }

    public function volunteer()
    {
        return $this->belongsTo(User::class, 'volunteer_user_id');
    }
}
