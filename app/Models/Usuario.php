<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Usuario extends Model
{
    protected $table = 'usuarios';
    protected $fillable = ['nombre', 'nombre_usuario', 'correo', 'contraseña'];

    public function verificarContraseña($contraseña)
    {
        return Hash::check($contraseña, $this->contraseña);
    }
public function esAdmin()
{
    return $this->rol === 'admin';
}
public function usuario()
{
    return $this->belongsTo(Usuario::class);
}
public function pedidos()
    {
        return $this->hasMany(Pedido::class, 'usuario_id');
    }
}
