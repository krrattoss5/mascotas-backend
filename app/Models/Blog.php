<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'title', // El título del blog.
        'description', // Descripción o contenido principal del blog.
        'image', // Ruta de la imagen destacada del blog.
        'status', // Estado del blog (por ejemplo, publicado, borrador, archivado).
        'user_id', // ID del usuario que creó el blog.
        'category_id', // ID de la categoría a la que pertenece el blog.
        'slug', // Slug URL del blog, utilizado para crear una URL amigable.
        'meta_title', // Título meta del blog para SEO.
        'meta_description', // Descripción meta del blog para SEO.
        'meta_keywords' // Palabras clave meta para SEO del blog.
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}