<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NeedPet extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'name', // Nombre de la necesidad específica de la mascota.
        'description', // Descripción detallada de la necesidad.
        'status', // Estado de la necesidad (por ejemplo, pendiente, resuelta).
        'pet_id', // ID de la mascota asociada a la necesidad.
        'user_id' // ID del usuario que reporta o atiende la necesidad.
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
