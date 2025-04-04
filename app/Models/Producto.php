<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = [
        'nombre', 'precio', 'descripcion', 'imagen', 'tipo', 'categoria'
    ];
    public function producto() {
        return $this->belongsTo(Producto::class);
    }
    
}
