<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Pedido;
use App\Models\DetallePedido;
use App\Models\Usuario; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function add(Request $request)
    {
        $request->validate([
            'producto_id' => 'required|exists:productos,id'
        ]);

        $producto = Producto::findOrFail($request->producto_id);
        
        $cart = Session::get('cart', []);
        
        if(isset($cart[$producto->id])) {
            $cart[$producto->id]['cantidad']++;
        } else {
            $cart[$producto->id] = [
                "id" => $producto->id,
                "nombre" => $producto->nombre,
                "cantidad" => 1,
                "precio" => $producto->precio,
                "imagen" => $producto->imagen
            ];
        }
        
        Session::put('cart', $cart);
        return redirect()->back()->with('success', 'Producto agregado al carrito');
    }

    public function view()
    {
        $cart = Session::get('cart', []);
        $total = $this->calculateTotal($cart);
        
        return view('cart', compact('cart', 'total'));
    }

    public function remove($id)
    {
        $cart = Session::get('cart', []);
        
        if(isset($cart[$id])) {
            unset($cart[$id]);
            Session::put('cart', $cart);
            return redirect()->route('cart.view')->with('success', 'Producto eliminado');
        }
        
        return redirect()->route('cart.view')->with('error', 'Producto no encontrado');
    }

    public function checkout(Request $request)
{
    \Log::info('Checkout iniciado', ['user' => Session::get('usuario_id'), 'cart' => Session::get('cart')]);

    if (!Session::has('usuario_id')) {
        \Log::error('Usuario no autenticado');
        return redirect()->route('login')->with('error', 'Debes iniciar sesión');
    }

    $validated = $request->validate([
        'direccion' => 'required|string|max:500',
        'metodo_pago' => 'required|string|in:tarjeta,paypal,transferencia'
    ]);

    $cart = Session::get('cart', []);
    
    if (empty($cart)) {
        \Log::error('Carrito vacío', ['user' => Session::get('usuario_id')]);
        return redirect()->back()->with('error', 'Tu carrito está vacío');
    }

    DB::beginTransaction();

    try {
        \Log::info('Creando pedido', ['user' => Session::get('usuario_id'), 'total' => $this->calculateTotal($cart)]);

        $pedido = Pedido::create([
            'usuario_id' => Session::get('usuario_id'),
            'total' => $this->calculateTotal($cart),
            'estado' => 'pendiente',
            'direccion_envio' => $validated['direccion'],
            'metodo_pago' => $validated['metodo_pago'],
            'fecha_pedido' => now()
        ]);

        \Log::info('Pedido creado', ['pedido_id' => $pedido->id]);

        foreach ($cart as $item) {
            DetallePedido::create([
                'pedido_id' => $pedido->id,
                'producto_id' => $item['id'],
                'cantidad' => $item['cantidad'],
                'precio_unitario' => $item['precio'],
                'subtotal' => $item['precio'] * $item['cantidad']
            ]);

            \Log::info('Detalle agregado', [
                'producto_id' => $item['id'],
                'cantidad' => $item['cantidad']
            ]);
        }

        DB::commit();

        Session::forget('cart');
        
        \Log::info('Checkout completado', ['pedido_id' => $pedido->id]);
        
        return redirect()->route('pedidos.show', $pedido->id)
                       ->with('success', '¡Pedido #'.$pedido->id.' creado con éxito!');

    } catch (\Exception $e) {
        DB::rollBack();
        \Log::error('Error en checkout', [
            'error' => $e->getMessage(),
            'trace' => $e->getTraceAsString()
        ]);
        return redirect()->back()
                       ->with('error', 'Error al procesar tu pedido: '.$e->getMessage());
    }
}

    private function calculateTotal($cart)
    {
        return array_reduce($cart, function($total, $item) {
            return $total + ($item['precio'] * $item['cantidad']);
        }, 0);
    }

    public function showPedido($id)
    {
        $pedido = Pedido::with(['detalles.producto', 'usuario'])
                      ->where('usuario_id', Session::get('usuario_id'))
                      ->findOrFail($id);

        return view('pedidos.show', compact('pedido'));
    }
}