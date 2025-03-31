<?php

namespace App\Http\Controllers;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index(Request $request)
{
    $query = Producto::query();
    
    if ($request->has('search')) {
        $query->where('nombre', 'like', '%' . $request->search . '%');
    }
    
    if ($request->has('tipo')) {
        $query->where('tipo', $request->tipo);
    }
    
    $productos = $query->get();
    
    return view('productos', [
        'productos' => $productos
    ]);
}
    public function store(Request $request) {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'precio' => 'required|numeric|min:0',
            'descripcion' => 'required|string',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'tipo' => 'required|in:Consolas,Controles,Accesorios,Juegos',
            'categoria' => 'required|in:Recomendados,Ofertas,Nuevos,Destacados,Sin categoría'
        ]);
    
        $imagenPath = $request->file('imagen') ? $request->file('imagen')->store('productos', 'public') : null;
    
        Producto::create([
            'nombre' => $request->nombre,
            'precio' => $request->precio,
            'descripcion' => $request->descripcion,
            'imagen' => $imagenPath,
            'tipo' => $request->tipo,
            'categoria' => $request->categoria
        ]);
    
        return redirect()->route('admin.panel')->with('success', 'Producto agregado correctamente!');
    }
}
