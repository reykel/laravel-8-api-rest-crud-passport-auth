<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    use HasFactory;

    protected $fillable = [
        'ubicacion',
        'cantidad',
        'instrumento_id'
    ];

    public function instrumentos(){
        return $this->belongsTo(Instrumento::class, 'instrumento_id');
    }
}
