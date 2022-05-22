<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instrumento extends Model
{
    use HasFactory;

    protected $fillable = [
        'descripcion'
    ];

    public function inventarios(){
        return $this->hasMany(Instrumento::class, 'id');
    }
}
