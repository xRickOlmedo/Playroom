<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AutenticacionController extends Controller
{
    private $adminsAutorizados = [
        'erickolmedo92@gmail.com',
        'jink97383@gmail.com'
    ];

    public function mostrarRegistro()
    {
        return view('auth.registro');
    }

    public function registrar(Request $request)
    {
        $request->validate([
            'nombre' => 'required|min:3|max:50|regex:/^[\pL\s\-]+$/u',
            'nombre_usuario' => 'required|min:3|max:20|alpha_dash|unique:usuarios',
            'correo' => 'required|email:rfc,dns|max:100|unique:usuarios',
            'contraseña' => [
                'required',
                'min:8',
                'confirmed',
                'regex:/^(?=.*[a-zA-Z])(?=.*\d).+$/'
            ]
        ], [
            'nombre.required' => 'El nombre completo es obligatorio',
            'nombre.min' => 'El nombre debe tener al menos 3 caracteres',
            'nombre.max' => 'El nombre no debe exceder los 50 caracteres',
            'nombre.regex' => 'El nombre solo puede contener letras y espacios',
            
            'nombre_usuario.required' => 'El nombre de usuario es obligatorio',
            'nombre_usuario.min' => 'El nombre de usuario debe tener al menos 3 caracteres',
            'nombre_usuario.max' => 'El nombre de usuario no debe exceder los 20 caracteres',
            'nombre_usuario.alpha_dash' => 'Solo se permiten letras, números, guiones y guiones bajos',
            'nombre_usuario.unique' => 'Este nombre de usuario ya está en uso',
            
            'correo.required' => 'El correo electrónico es obligatorio',
            'correo.email' => 'Ingresa un correo electrónico válido',
            'correo.max' => 'El correo no debe exceder los 100 caracteres',
            'correo.unique' => 'Este correo electrónico ya está registrado',
            
            'contraseña.required' => 'La contraseña es obligatoria',
            'contraseña.min' => 'La contraseña debe tener al menos 8 caracteres',
            'contraseña.confirmed' => 'Las contraseñas no coinciden',
            'contraseña.regex' => 'La contraseña debe contener letras y números'
        ]);

        Usuario::create([
            'nombre' => $request->nombre,
            'nombre_usuario' => $request->nombre_usuario,
            'correo' => $request->correo,
            'contraseña' => Hash::make($request->contraseña)
        ]);

        return redirect()->route('login')->with('exito', '¡Registro exitoso! Por favor inicia sesión.');
    }

    public function mostrarFormularioLogin()
    {
        return view('auth.login');
    }

    public function autenticar(Request $request)
    {
        $request->validate([
            'correo' => 'required|email',
            'contraseña' => 'required'
        ], [
            'correo.required' => 'El correo electrónico es obligatorio',
            'correo.email' => 'Ingresa un correo electrónico válido',
            'contraseña.required' => 'La contraseña es obligatoria'
        ]);

        $usuario = Usuario::where('correo', $request->correo)->first();

        if (!$usuario) {
            return back()->withInput()->withErrors([
                'correo' => 'El correo electrónico no está registrado'
            ]);
        }

        if (!Hash::check($request->contraseña, $usuario->contraseña)) {
            return back()->withInput()->withErrors([
                'contraseña' => 'La contraseña es incorrecta'
            ]);
        }

        Session::put('usuario_id', $usuario->id);
        Session::put('es_admin', in_array($usuario->correo, $this->adminsAutorizados));
        
        return redirect('/')->with('exito', 'Bienvenido '.$usuario->nombre);
    }

    public function cerrarSesion()
    {
        Session::flush();
        return redirect('/')->with('exito', 'Sesión cerrada correctamente');
    }
}