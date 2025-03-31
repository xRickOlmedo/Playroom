<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ContactoController extends Controller
{
    public function index()
    {
        return view('contacto');
    }

    public function submit(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|min:3',
            'email' => 'required|email',
            'asunto' => 'required',
            'mensaje' => 'required|min:10'
        ], [
            'nombre.required' => 'El nombre es obligatorio',
            'nombre.min' => 'El nombre debe tener al menos 3 caracteres',
            'email.required' => 'El correo electrónico es obligatorio',
            'email.email' => 'Ingresa un correo electrónico válido',
            'asunto.required' => 'Por favor selecciona un asunto',
            'mensaje.required' => 'El mensaje es obligatorio',
            'mensaje.min' => 'El mensaje debe tener al menos 10 caracteres'
        ]);
        
        return redirect()->route('contacto')->with('success', '¡Mensaje enviado con éxito! Nos pondremos en contacto contigo pronto.');
    }
}