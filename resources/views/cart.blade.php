<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras - Playroom</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background-color: #1a1a2e;
            color: #e0e0e0;
            font-family: 'Poppins', sans-serif;
            margin: 0;
        }

        .navbar {
            background-color: #162447;
            padding: 15px 0;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
        }
        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
        }
        .nav-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: relative;
        }
        .nav-links {
            display: flex;
            gap: 20px;
        }
        .nav-link {
            color: #e0e0e0;
            text-decoration: none;
            font-size: 1.1rem;
            font-weight: 500;
            padding: 8px 15px;
            border-radius: 5px;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .nav-link:hover {
            background-color: #f0a500;
            color: #162447;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(240, 165, 0, 0.3);
        }
        .auth-container {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        .login-btn {
            background-color: #f0a500;
            color: #162447;
            padding: 8px 20px;
            border-radius: 20px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }
        .login-btn:hover {
            background-color: #ff6b00;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(255, 107, 0, 0.3);
        }
        .user-profile {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        .username-display {
            color: #f0a500;
            font-weight: 600;
            text-shadow: 0 0 5px rgba(240, 165, 0, 0.5);
        }
        .admin-btn {
            background-color: #4CAF50;
            color: white;
            padding: 8px 15px;
            border-radius: 20px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }
        .admin-btn:hover {
            background-color: #45a049;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(69, 160, 73, 0.3);
        }
        .logout-circle {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background-color: #f0a500;
            color: #162447;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        .logout-circle:hover {
            background-color: #ff6b00;
            color: white;
            transform: scale(1.1);
        }
        
        /* Contenedor principal del carrito */
        .cart-container {
            max-width: 800px;
            margin: 40px auto;
            padding: 0 20px;
        }
        .cart-title {
            color: #f0a500;
            font-size: 2.5rem;
            margin-bottom: 30px;
            border-bottom: 2px solid #f0a500;
            padding-bottom: 10px;
            text-align: center;
            text-shadow: 0 0 10px rgba(240, 165, 0, 0.3);
        }
        .cart-items {
            background-color: #162447;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 30px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }
        .cart-item {
            display: flex;
            align-items: center;
            padding: 15px 0;
            border-bottom: 1px solid rgba(26, 26, 46, 0.5);
            transition: all 0.3s ease;
        }
        .cart-item:hover {
            background-color: rgba(26, 26, 46, 0.3);
            transform: translateX(5px);
        }
        .cart-item:last-child {
            border-bottom: none;
        }
        .cart-item-image {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 5px;
            margin-right: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }
        .cart-item-details {
            flex-grow: 1;
        }
        .cart-item-name {
            font-size: 1.2rem;
            color: #e0e0e0;
            margin-bottom: 5px;
            font-weight: 600;
        }
        .cart-item-price {
            color: #f0a500;
            font-weight: bold;
        }
        .cart-item-quantity {
            display: flex;
            align-items: center;
            margin: 0 20px;
        }
        .cart-item-quantity span {
            margin: 0 10px;
        }
        .cart-item-total {
            color: #f0a500;
            font-weight: bold;
            min-width: 100px;
            text-align: right;
            font-size: 1.1rem;
        }
        .remove-btn {
            background-color: #ff3333;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 8px 15px;
            cursor: pointer;
            margin-left: 20px;
            transition: all 0.3s ease;
            font-weight: 600;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }
        .remove-btn:hover {
            background-color: #cc0000;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(204, 0, 0, 0.3);
        }
        
        .cart-summary {
            background-color: #162447;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }
        .cart-total {
            font-size: 1.8rem;
            color: #f0a500;
            margin-bottom: 30px;
            text-align: center;
            font-weight: 700;
            text-shadow: 0 0 10px rgba(240, 165, 0, 0.3);
        }
        
        .checkout-form {
            max-width: 500px;
            margin: 0 auto;
        }
        .form-group {
            margin-bottom: 25px;
        }
        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #b0b0b0;
            font-weight: 500;
            font-size: 1rem;
        }
        .form-group input,
        .form-group select {
            width: 100%;
            padding: 12px 15px;
            border-radius: 8px;
            border: none;
            background-color: rgba(26, 26, 46, 0.7);
            color: #e0e0e0;
            font-size: 1rem;
            transition: all 0.3s ease;
            border: 1px solid rgba(240, 165, 0, 0.3);
        }
        .form-group input:focus,
        .form-group select:focus {
            outline: none;
            border-color: #f0a500;
            box-shadow: 0 0 0 3px rgba(240, 165, 0, 0.2);
            background-color: rgba(26, 26, 46, 0.9);
        }
        .form-group input::placeholder {
            color: #6b7280;
        }
        .checkout-btn {
            background-color: #f0a500;
            color: #162447;
            padding: 15px 25px;
            border-radius: 30px;
            font-weight: 700;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            font-size: 1.1rem;
            width: 100%;
            margin-top: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            box-shadow: 0 4px 15px rgba(240, 165, 0, 0.3);
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .checkout-btn:hover {
            background-color: #ff6b00;
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(255, 107, 0, 0.4);
        }
        .checkout-btn:active {
            transform: translateY(0);
        }
        .text-danger {
            color: #ff3333;
            font-size: 0.9rem;
            margin-top: 5px;
            display: block;
        }
        
        .empty-cart {
            text-align: center;
            padding: 50px;
            background-color: #162447;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }
        .empty-cart-icon {
            font-size: 3rem;
            color: #f0a500;
            margin-bottom: 20px;
            text-shadow: 0 0 10px rgba(240, 165, 0, 0.3);
        }
        .empty-cart-message {
            font-size: 1.2rem;
            margin-bottom: 20px;
            color: #b0b0b0;
        }
        .continue-shopping {
            background-color: #f0a500;
            color: #162447;
            padding: 12px 25px;
            border-radius: 30px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            display: inline-block;
            box-shadow: 0 4px 15px rgba(240, 165, 0, 0.3);
        }
        .continue-shopping:hover {
            background-color: #ff6b00;
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(255, 107, 0, 0.4);
        }
        
        .floating-cart {
            position: fixed;
            bottom: 30px;
            right: 30px;
            z-index: 999;
        }
        .cart-btn {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            background-color: #f0a500;
            color: #162447;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
            transition: all 0.3s ease;
            text-decoration: none;
            position: relative;
        }
        .cart-btn:hover {
            background-color: #ff6b00;
            color: white;
            transform: scale(1.1) translateY(-5px);
            box-shadow: 0 6px 20px rgba(255, 107, 0, 0.4);
        }
        .cart-counter {
            position: absolute;
            top: -5px;
            right: -5px;
            background-color: #ff3333;
            color: white;
            border-radius: 50%;
            width: 28px;
            height: 28px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.9rem;
            font-weight: bold;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }
        
        @media (max-width: 768px) {
            .nav-container {
                flex-direction: column;
                gap: 15px;
            }
            .nav-links {
                flex-wrap: wrap;
                justify-content: center;
            }
            .auth-container {
                margin-top: 15px;
            }
            .cart-item {
                flex-wrap: wrap;
                gap: 15px;
            }
            .cart-item-total, .remove-btn {
                margin-left: 120px; 
            }
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="container">
            <div class="nav-container">
                <div class="nav-links">
                    <a href="{{ route('home') }}" class="nav-link">Home</a>
                    <a href="{{ route('productos') }}" class="nav-link">Productos</a>
                    <a href="{{ route('membresias') }}" class="nav-link">Membresías</a>
                    <a href="{{ route('blog') }}" class="nav-link">Blog</a>
                    <a href="{{ route('contacto') }}" class="nav-link">Contacto</a>
                </div>
                
                <div class="auth-container">
                    @if(Session::has('usuario_id'))
                        @php
                            $usuario = App\Models\Usuario::find(Session::get('usuario_id'));
                        @endphp
                        <div class="user-profile">
                            <span class="username-display">{{ $usuario->nombre_usuario }}</span>
                            
                            @if(Session::get('es_admin'))
                                <a href="{{ route('admin.panel') }}" class="admin-btn">
                                    <i class="fas fa-cog mr-1"></i> Administrar
                                </a>
                            @endif
                            
                            <a href="{{ route('logout') }}" class="logout-circle" title="Cerrar sesión">
                                <i class="fas fa-sign-out-alt"></i>
                            </a>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="login-btn">
                            <i class="fas fa-sign-in-alt mr-1"></i> Iniciar Sesión
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </nav>
    @if(Session::has('usuario_id'))
        @php
            $cartCount = Session::get('cart', []) ? count(Session::get('cart')) : 0;
        @endphp
        <div class="floating-cart">
            <a href="{{ route('cart.view') }}" class="cart-btn">
                <i class="fas fa-shopping-cart"></i>
                @if($cartCount > 0)
                    <span class="cart-counter">{{ $cartCount }}</span>
                @endif
            </a>
        </div>
    @endif

    <div class="cart-container">
        <h1 class="cart-title">Tu Carrito de Compras</h1>
        
        @if(count($cart) > 0)
            <div class="cart-items">
                @foreach($cart as $item)
                    <div class="cart-item">
                        @if($item['imagen'])
                            <img src="{{ asset('storage/' . $item['imagen']) }}" alt="{{ $item['nombre'] }}" class="cart-item-image">
                        @else
                            <div style="width: 100px; height: 100px; background-color: #1a1a2e; display: flex; align-items: center; justify-content: center; border-radius: 5px; margin-right: 20px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);">
                                <i class="fas fa-image" style="font-size: 2rem; color: #f0a500;"></i>
                            </div>
                        @endif
                        <div class="cart-item-details">
                            <h3 class="cart-item-name">{{ $item['nombre'] }}</h3>
                            <span class="cart-item-price">${{ number_format($item['precio'], 2) }} c/u</span>
                            <div class="cart-item-quantity">
                                <span>Cantidad: {{ $item['cantidad'] }}</span>
                            </div>
                        </div>
                        <div class="cart-item-total">
                            ${{ number_format($item['precio'] * $item['cantidad'], 2) }}
                        </div>
                        <form action="{{ route('cart.remove', $item['id']) }}" method="POST">
                            @csrf
                            <button type="submit" class="remove-btn">
                                <i class="fas fa-trash-alt mr-1"></i> Eliminar
                            </button>
                        </form>
                    </div>
                @endforeach
            </div>
            
            <div class="cart-summary">
                <div class="cart-total">
                    Total: ${{ number_format($total, 2) }}
                </div>
                
                <form action="{{ route('cart.checkout') }}" method="POST" id="checkout-form" class="checkout-form">
                    @csrf
                    
                    <div class="form-group">
                        <label for="direccion"><i class="fas fa-map-marker-alt mr-2"></i>Dirección de Envío:</label>
                        <input type="text" name="direccion" id="direccion" required
                               placeholder="Ej: Av. Principal 123, Ciudad, Código Postal"
                               value="{{ old('direccion') }}">
                        @error('direccion')
                            <span class="text-danger"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="metodo_pago"><i class="fas fa-credit-card mr-2"></i>Método de Pago:</label>
                        <select name="metodo_pago" id="metodo_pago" required>
                            <option value="">Seleccione un método de pago</option>
                            <option value="tarjeta" {{ old('metodo_pago') == 'tarjeta' ? 'selected' : '' }}>
                                <i class="fas fa-credit-card mr-1"></i> Tarjeta de Crédito/Débito
                            </option>
                            <option value="paypal" {{ old('metodo_pago') == 'paypal' ? 'selected' : '' }}>
                                <i class="fab fa-paypal mr-1"></i> PayPal
                            </option>
                            <option value="transferencia" {{ old('metodo_pago') == 'transferencia' ? 'selected' : '' }}>
                                <i class="fas fa-university mr-1"></i> Transferencia Bancaria
                            </option>
                        </select>
                        @error('metodo_pago')
                            <span class="text-danger"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <button type="submit" class="checkout-btn">
                        <i class="fas fa-check-circle"></i>
                        Finalizar Compra
                    </button>
                </form>
            </div>
        @else
            <div class="empty-cart">
                <div class="empty-cart-icon">
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <p class="empty-cart-message">Tu carrito está vacío</p>
                <a href="{{ route('productos') }}" class="continue-shopping">
                    <i class="fas fa-arrow-left mr-1"></i> Continuar Comprando
                </a>
            </div>
        @endif
    </div>

    @section('scripts')
    <script>
    document.getElementById('checkout-form').addEventListener('submit', function(e) {
        const btn = this.querySelector('button[type="submit"]');
        btn.disabled = true;
        btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Procesando tu pedido...';
    });
    </script>
    @endsection
</body>
</html>