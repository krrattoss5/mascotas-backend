<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Race extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['name', 'description'];

    public function pets()
    {
        return $this->hasMany(Pet::class);
    }
    
}
