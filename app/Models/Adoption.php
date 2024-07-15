<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Adoption extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'pet_id', // ID de la mascota que está siendo adoptada.
        'user_id', // ID del usuario que adopta la mascota.
        'status', // Estado de la adopción (por ejemplo, pendiente, completada, cancelada).
        'description', // Descripción adicional sobre la adopción.
        'date_adoption', // Fecha en la que se realiza o se completa la adopción.
        'date_return', // Fecha en la que la mascota es devuelta, si aplica.
        'date_delivered', // Fecha en la que la mascota es entregada al adoptante.
        'date_received', // Fecha en la que la mascota es recibida de vuelta, si es devuelta.
        'observations' // Observaciones adicionales sobre la adopción.
    ];

    public function pet()
    {
        return $this->belongsTo(Pet::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function histories()
    {
        return $this->hasMany(History::class);
    }

    public function sponsorships()
    {
        return $this->hasMany(Sponsorship::class);
    }

    public function donations()
    {
        return $this->hasMany(Donation::class);
    }


    public function needPets()
    {
        return $this->hasMany(NeedPet::class);
    }

    public function adoptions()
    {
        return $this->hasMany(Adoption::class);
    }

    public function scopeSearch($query, $search)
    {
        if ($search) {
            return $query->where('status', 'LIKE', "%$search%");
        }
    }
}
