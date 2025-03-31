<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto - Playroom</title>
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
            font-size: 2.5rem;
            color: #f0a500;
            margin: 40px 0;
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
        
        .contact-container {
            max-width: 700px;
            margin: 0 auto;
            padding: 20px;
        }
        .contact-form {
            background-color: #162447;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            margin-bottom: 50px;
        }
        .form-group {
            margin-bottom: 25px;
        }
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #f0a500;
        }
        .form-control {
            width: 100%;
            padding: 12px 15px;
            background-color: #1a1a2e;
            border: 1px solid #2a2a3e;
            border-radius: 8px;
            color: #e0e0e0;
            font-family: 'Poppins', sans-serif;
            transition: all 0.3s;
        }
        .form-control:focus {
            outline: none;
            border-color: #f0a500;
            box-shadow: 0 0 0 2px rgba(240, 165, 0, 0.3);
        }
        .is-invalid {
            border-color: #ff4d4d;
        }
        .invalid-feedback {
            color: #ff4d4d;
            font-size: 0.85rem;
            margin-top: 5px;
        }
        textarea.form-control {
            min-height: 150px;
            resize: vertical;
        }
        .submit-btn {
            background-color: #f0a500;
            color: #162447;
            border: none;
            padding: 12px 30px;
            border-radius: 30px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s;
            font-size: 1rem;
            text-transform: uppercase;
            width: 100%;
        }
        .submit-btn:hover {
            background-color: #ff8c00;
            transform: translateY(-2px);
        }
        .success-message {
            color: #4dff4d;
            text-align: center;
            margin: 20px 0;
            font-weight: 500;
            font-size: 1.1rem;
        }
        .contact-info {
            text-align: center;
            color: #a0a0a0;
            margin: 40px 0;
        }
        .contact-info a {
            color: #f0a500;
            text-decoration: none;
        }
        .contact-info a:hover {
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
        <h1 class="section-title">Contáctanos</h1>
        
        <div class="contact-container">
            @if(session('success'))
                <div class="success-message">
                    {{ session('success') }}
                </div>
            @endif

            <form class="contact-form" method="POST" action="{{ route('contacto.submit') }}">
                @csrf
                
                <div class="form-group">
                    <label for="nombre">Nombre completo</label>
                    <input type="text" id="nombre" name="nombre" class="form-control @error('nombre') is-invalid @enderror" 
                           value="{{ old('nombre', Session::has('usuario_id') ? App\Models\Usuario::find(Session::get('usuario_id'))->nombre_usuario : '') }}" required>
                    @error('nombre')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="email">Correo electrónico</label>
                    <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror"
                           value="{{ old('email', Session::has('usuario_id') ? App\Models\Usuario::find(Session::get('usuario_id'))->email : '') }}" required>
                    @error('email')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="asunto">Asunto</label>
                    <select id="asunto" name="asunto" class="form-control @error('asunto') is-invalid @enderror" required>
                        <option value="" disabled selected>Selecciona un tema</option>
                        <option value="consulta" {{ old('asunto') == 'consulta' ? 'selected' : '' }}>Consulta general</option>
                        <option value="soporte" {{ old('asunto') == 'soporte' ? 'selected' : '' }}>Soporte técnico</option>
                        <option value="ventas" {{ old('asunto') == 'ventas' ? 'selected' : '' }}>Preguntas sobre ventas</option>
                        <option value="membresias" {{ old('asunto') == 'membresias' ? 'selected' : '' }}>Información de membresías</option>
                        <option value="devoluciones" {{ old('asunto') == 'devoluciones' ? 'selected' : '' }}>Devoluciones y garantías</option>
                    </select>
                    @error('asunto')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="mensaje">Mensaje</label>
                    <textarea id="mensaje" name="mensaje" class="form-control @error('mensaje') is-invalid @enderror" required>{{ old('mensaje') }}</textarea>
                    @error('mensaje')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                
                <button type="submit" class="submit-btn">Enviar mensaje</button>
            </form>
            
            <div class="contact-info">
                <p>También puedes contactarnos directamente:</p>
                <p><strong>Email:</strong> <a href="mailto:erickolmedo92@gmail.com">erickolmedo92@gmail.com</a></p>
                <p><strong>Teléfono:</strong> <a href="tel:+59161651778">+591 61651778</a></p>
                <p><strong>Horario:</strong> Lunes a Viernes de 9:00 a 18:00 hrs</p>
            </div>
        </div>
    </div>
</body>
</html>