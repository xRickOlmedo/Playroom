<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos - Playroom</title>
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
            justify-content: center;
            gap: 30px;
            align-items: center;
            position: relative;
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
        }
        .nav-link:hover {
            background-color: #f0a500;
            color: #162447;
        }
        .auth-container {
            position: absolute;
            right: 20px;
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
        }
        .login-btn:hover {
            background-color: #ff6b00;
            color: white;
        }
        .user-profile {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        .username-display {
            color: #f0a500;
            font-weight: 600;
        }
        .admin-btn {
            background-color: #4CAF50;
            color: white;
            padding: 8px 15px;
            border-radius: 20px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        .admin-btn:hover {
            background-color: #45a049;
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
        
        /* Estilos del carrito flotante */
        .floating-cart {
            position: fixed;
            bottom: 30px;
            right: 30px;
            z-index: 999;
        }
        .cart-btn {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background-color: #f0a500;
            color: #162447;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
            transition: all 0.3s ease;
            text-decoration: none;
            position: relative;
        }
        .cart-btn:hover {
            background-color: #ff6b00;
            color: white;
            transform: scale(1.1);
        }
        .cart-counter {
            position: absolute;
            top: -5px;
            right: -5px;
            background-color: #ff3333;
            color: white;
            border-radius: 50%;
            width: 25px;
            height: 25px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.8rem;
            font-weight: bold;
        }
        
        .section-title {
            font-size: 2rem;
            color: #f0a500;
            margin: 0 0 20px 15px;
            padding-bottom: 10px;
            border-bottom: 2px solid #f0a500;
            display: inline-block;
        }
        .products-container {
            display: flex;
            overflow-x: auto;
            gap: 20px;
            padding: 0 0px 20px;
            scrollbar-width: none;
        }
        .products-container::-webkit-scrollbar {
            display: none;
        }
        .product-card {
            width: 280px; 
            height: 380px; 
            background-color: #162447;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease;
            flex-shrink: 0;
            display: flex;
            flex-direction: column;
        }

        .product-image-container {
            width: 100%;
            height: 160px;
            overflow: hidden;
        }

        .product-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .product-card:hover .product-image {
            transform: scale(1.05);
        }

        .product-details {
            padding: 15px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .product-name {
            font-size: 1.2rem;
            margin-bottom: 10px;
            color: #e0e0e0;
            min-height: 40px; 
            display: flex;
            align-items: center;
        }

        .product-description {
            font-size: 0.9rem;
            color: #b0b0b0;
            margin-bottom: 15px;
            display: -webkit-box;
            -webkit-line-clamp: 3; 
            -webkit-box-orient: vertical;
            overflow: hidden;
            flex-grow: 1;
        }

        .product-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: auto; 
        }
        .product-price {
            color: #f0a500;
            font-weight: bold;
            font-size: 1.1rem;
        }
        .buy-btn {
            background-color: #f0a500;
            color: #162447;
            padding: 6px 12px;
            border-radius: 20px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
        }
        .buy-btn:hover {
            background-color: #ff6b00;
            color: white;
        }
        .empty-section {
            background-color: rgba(22, 36, 71, 0.5);
            padding: 30px;
            text-align: center;
            border-radius: 10px;
            color: #b0b0b0;
            margin: 0 15px;
        }
        .search-container {
            max-width: 800px;
            margin: 30px auto;
            padding: 0 15px;
        }
        .search-bar {
            width: 100%;
            padding: 12px 20px;
            border-radius: 30px;
            border: none;
            background: #162447;
            color: #e0e0e0;
            font-size: 1rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }
        .search-bar::placeholder {
            color: #6b7280;
        }
        .category-filter {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-bottom: 30px;
            flex-wrap: wrap;
            padding: 0 15px;
        }
        .category-btn {
            background: #1a1a2e;
            color: #e0e0e0;
            border: none;
            padding: 10px 20px;
            border-radius: 30px;
            cursor: pointer;
            transition: all 0.3s;
            font-weight: 500;
        }
        .category-btn:hover, .category-btn.active {
            background: #f0a500;
            color: #162447;
            font-weight: 600;
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="container">
            <div class="nav-container">
                <a href="{{ route('home') }}" class="nav-link">Home</a>
                <a href="{{ route('productos') }}" class="nav-link">Productos</a>
                <a href="{{ route('membresias') }}" class="nav-link">Membresías</a>
                <a href="{{ route('blog') }}" class="nav-link">Blog</a>
                <a href="{{ route('contacto') }}" class="nav-link">Contacto</a>
                
                <div class="auth-container">
                    @if(Session::has('usuario_id'))
                        @php
                            $usuario = App\Models\Usuario::find(Session::get('usuario_id'));
                        @endphp
                        <div class="user-profile">
                            <span class="username-display">{{ $usuario->nombre_usuario }}</span>
                            
                            @if(Session::get('es_admin'))
                                <a href="{{ route('admin.panel') }}" class="admin-btn">
                                    Administrar
                                </a>
                            @endif
                            
                            <a href="{{ route('logout') }}" class="logout-circle" title="Cerrar sesión">
                                X
                            </a>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="login-btn">Iniciar Sesión</a>
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <!-- Botón flotante del carrito -->
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

    <div class="container">
        <div class="search-container">
            <form action="{{ route('productos') }}" method="GET">
                <input 
                    type="text" 
                    class="search-bar" 
                    name="search"
                    placeholder="Buscar productos por nombre..." 
                    value="{{ request('search') }}"
                >
            </form>
        </div>
        <div class="category-filter">
            <a href="{{ route('productos') }}" class="category-btn {{ !request('tipo') ? 'active' : '' }}">Todos</a>
            <a href="{{ route('productos', ['tipo' => 'Consolas']) }}" class="category-btn {{ request('tipo') == 'Consolas' ? 'active' : '' }}">Consolas</a>
            <a href="{{ route('productos', ['tipo' => 'Controles']) }}" class="category-btn {{ request('tipo') == 'Controles' ? 'active' : '' }}">Controles</a>
            <a href="{{ route('productos', ['tipo' => 'Accesorios']) }}" class="category-btn {{ request('tipo') == 'Accesorios' ? 'active' : '' }}">Accesorios</a>
            <a href="{{ route('productos', ['tipo' => 'Juegos']) }}" class="category-btn {{ request('tipo') == 'Juegos' ? 'active' : '' }}">Juegos</a>
        </div>
        @if(request('search'))
            <div class="product-section">
                <h2 class="section-title">Resultados de búsqueda</h2>
                @if($productos->count() > 0)
                    <div class="products-container">
                        @foreach($productos as $producto)
                            <div class="product-card">
                                <div class="product-image-container">
                                    @if($producto->imagen)
                                        <img src="{{ asset('storage/' . $producto->imagen) }}" alt="{{ $producto->nombre }}" class="product-image">
                                    @else
                                        <div class="product-image" style="background-color: #1a1a2e; display: flex; align-items: center; justify-content: center;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="#f0a500" viewBox="0 0 24 24">
                                                <path d="M4 4h16v16h-16v-16zm2 2v12h12v-12h-12zm5 8h2v-4h4v-2h-6v6z"/>
                                            </svg>
                                        </div>
                                    @endif
                                </div>
                                <div class="product-details">
                                    <h3 class="product-name">{{ $producto->nombre }}</h3>
                                    <p class="product-description">{{ $producto->descripcion }}</p>
                                    <div class="product-footer">
                                        <span class="product-price">${{ number_format($producto->precio, 2) }}</span>
                                        @if(Session::has('usuario_id'))
                                            <form action="{{ route('cart.add') }}" method="POST" style="display: inline;">
                                                @csrf
                                                <input type="hidden" name="producto_id" value="{{ $producto->id }}">
                                                <button type="submit" class="buy-btn">Comprar</button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="empty-section">
                        No se encontraron productos con ese nombre
                    </div>
                @endif
            </div>
        @endif
        @php
            $tipos = ['Consolas', 'Controles', 'Accesorios', 'Juegos'];
        @endphp
        
        @foreach($tipos as $tipo)
            @if(!request('search') && (!request('tipo') || request('tipo') == $tipo))
                @php
                    $productosTipo = App\Models\Producto::where('tipo', $tipo)->get();
                @endphp
                
                <div class="product-section">
                    <h2 class="section-title">{{ $tipo }}</h2>
                    
                    @if($productosTipo->count() > 0)
                        <div class="products-container">
                            @foreach($productosTipo as $producto)
                                <div class="product-card">
                                    <div class="product-image-container">
                                        @if($producto->imagen)
                                            <img src="{{ asset('storage/' . $producto->imagen) }}" alt="{{ $producto->nombre }}" class="product-image">
                                        @else
                                            <div class="product-image" style="background-color: #1a1a2e; display: flex; align-items: center; justify-content: center;">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="#f0a500" viewBox="0 0 24 24">
                                                    <path d="M4 4h16v16h-16v-16zm2 2v12h12v-12h-12zm5 8h2v-4h4v-2h-6v6z"/>
                                                </svg>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="product-details">
                                        <h3 class="product-name">{{ $producto->nombre }}</h3>
                                        <p class="product-description">{{ $producto->descripcion }}</p>
                                        <div class="product-footer">
                                            <span class="product-price">${{ number_format($producto->precio, 2) }}</span>
                                            @if(Session::has('usuario_id'))
                                                <form action="{{ route('cart.add') }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    <input type="hidden" name="producto_id" value="{{ $producto->id }}">
                                                    <button type="submit" class="buy-btn">Comprar</button>
                                                </form>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="empty-section">
                            Próximamente tendremos productos en esta sección
                        </div>
                    @endif
                </div>
            @endif
        @endforeach
    </div>
</body>
</html>