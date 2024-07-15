<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EducationAndResource extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'name', // Nombre del recurso o material educativo.
        'description', // Descripción detallada del recurso o material.
        'url', // URL donde se puede acceder al recurso o material.
        'status' // Estado del recurso (por ejemplo, activo, inactivo).
    ];
}