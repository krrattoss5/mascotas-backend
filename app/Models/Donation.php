<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Donation extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'user_id', // ID del usuario que realiza la donación.
        'amount', // Cantidad donada.
        'status', // Estado de la donación (por ejemplo, pendiente, completada, cancelada).
        'observations' // Observaciones adicionales sobre la donación.
    ];
    
}