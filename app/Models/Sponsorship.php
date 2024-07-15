<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sponsorship extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'pet_id', // ID de la mascota que recibe el patrocinio.
        'user_id', // ID del usuario que proporciona el patrocinio.
        'amount', // Cantidad de dinero del patrocinio.
        'observations', // Observaciones adicionales sobre el patrocinio.
        'status', // Estado del patrocinio (por ejemplo, activo, completado, cancelado).
        'date_start', // Fecha de inicio del patrocinio.
        'date_end' // Fecha de finalización del patrocinio.
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