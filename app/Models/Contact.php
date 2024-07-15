<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'name', // Nombre de la persona que contacta.
        'email', // Dirección de correo electrónico de la persona que contacta.
        'phone', // Número de teléfono de la persona que contacta.
        'message', // Mensaje proporcionado por la persona que contacta.
        'direccion', // Dirección física proporcionada por la persona que contacta.
        'status' // Estado del contacto (por ejemplo, nuevo, en proceso, resuelto).
    ];
    
}