<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Membresías - Playroom</title>
    @vite('resources/css/app.css')
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
        .section-title {
            font-size: 2rem;
            color: #f0a500;
            margin: 30px 0;
            text-transform: uppercase;
            text-align: center;
            position: relative;
            padding-bottom: 15px;
        }
        .section-title:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 3px;
            background-color: #f0a500;
        }
        
        .membership-container {
            display: flex;
            justify-content: center;
            gap: 30px;
            flex-wrap: wrap;
            margin: 50px 0;
        }
        .membership-card {
            background-color: #162447;
            border-radius: 12px;
            padding: 10px;
            width: 320px;
            transition: all 0.3s;
            text-align: center;
            position: relative;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }
        .membership-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(240, 165, 0, 0.3);
        }
        .membership-card h3 {
            font-size: 1.8rem;
            margin-bottom: 15px;
            color: #f0a500;
        }
        .membership-price {
            font-size: 2.5rem;
            font-weight: bold;
            margin: 20px 0;
            color: white;
        }
        .membership-period {
            font-size: 1rem;
            color: #a0a0a0;
            margin-bottom: 25px;
        }
        .membership-features {
            text-align: left;
            margin-bottom: 30px;
            min-height: 180px;
            padding: 0 15px;
        }
        .membership-features li {
            margin-bottom: 10px;
            padding-left: 25px;
            position: relative;
            list-style: none;
        }
        .membership-features li:before {
            content: "✓";
            color: #f0a500;
            position: absolute;
            left: 0;
            font-weight: bold;
        }
        .subscribe-btn {
            background-color: #f0a500;
            color: #162447;
            border: none;
            padding: 12px 30px;
            border-radius: 30px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s;
            width: 100%;
            font-size: 1.1rem;
            text-transform: uppercase;
            margin-top: 10px;
        }
        .subscribe-btn:hover {
            background-color: #ffbe33;
            transform: scale(1.05);
        }
        .popular-tag {
            position: absolute;
            top: 15px;
            right: -30px;
            background-color: #f0a500;
            color: #162447;
            padding: 5px 30px;
            font-weight: bold;
            transform: rotate(45deg);
            width: 120px;
            text-align: center;
            font-size: 0.9rem;
        }
        .membership-card.popular {
            border: 2px solid #f0a500;
            transform: scale(1.02);
        }
        .membership-card.popular:hover {
            transform: scale(1.02) translateY(-10px);
        }
        .info-text {
            text-align: center;
            color: #a0a0a0;
            margin: 40px 0;
            font-size: 1.1rem;
        }
        .info-text a {
            color: #f0a500;
            text-decoration: none;
            transition: all 0.3s;
        }
        .info-text a:hover {
            text-decoration: underline;
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

    <div class="container">
        <h1 class="section-title">Planes de Membresía</h1>
        <p class="info-text">Elige el plan que mejor se adapte a tus necesidades gaming</p>
        
        <div class="membership-container">
            <!-- Plan Básico -->
            <div class="membership-card">
                <h3>Gamer Básico</h3>
                <div class="membership-price">$9.99</div>
                <div class="membership-period">por mes</div>
                <ul class="membership-features">
                    <li>Descuento del 5% en todos los productos</li>
                    <li>Acceso a ofertas exclusivas</li>
                    <li>Envío gratis en compras mayores a $100</li>
                    <li>Soporte prioritario por email</li>
                    <li>Contenido exclusivo mensual</li>
                </ul>
                <button class="subscribe-btn">Suscribirse</button>
            </div>
            
            <!-- Plan Premium (recomendado) -->
            <div class="membership-card popular">
                <div class="popular-tag">POPULAR</div>
                <h3>Gamer Premium</h3>
                <div class="membership-price">$19.99</div>
                <div class="membership-period">por mes</div>
                <ul class="membership-features">
                    <li>Descuento del 10% en todos los productos</li>
                    <li>Acceso 24h antes a lanzamientos</li>
                    <li>Envío gratis en todas las compras</li>
                    <li>Soporte prioritario 24/7</li>
                    <li>Kit de bienvenida valorado en $50</li>
                    <li>2 meses gratis al pagar anualmente</li>
                </ul>
                <button class="subscribe-btn">Suscribirse</button>
            </div>
            
            <!-- Plan Élite -->
            <div class="membership-card">
                <h3>Gamer Élite</h3>
                <div class="membership-price">$29.99</div>
                <div class="membership-period">por mes</div>
                <ul class="membership-features">
                    <li>Descuento del 15% en todos los productos</li>
                    <li>Acceso VIP a eventos exclusivos</li>
                    <li>Envío express gratis en 24h</li>
                    <li>Asesor gaming personalizado</li>
                    <li>Kit Élite valorado en $100</li>
                    <li>Garantía extendida en todos los productos</li>
                    <li>3 meses gratis al pagar anualmente</li>
                </ul>
                <button class="subscribe-btn">Suscribirse</button>
            </div>
        </div>
        
        <div class="info-text">
            <p>¿Necesitas ayuda para elegir? <a href="{{ route('contacto') }}">Contáctanos</a></p>
            <p>Todos los planes incluyen garantía de satisfacción de 30 días</p>
        </div>
    </div>
</body>
</html>