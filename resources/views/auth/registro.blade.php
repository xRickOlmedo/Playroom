<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - Playroom</title>
    <style>
        body {
            background-color: #1a1a2e;
            color: #e0e0e0;
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
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
        .auth-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: calc(100vh - 80px);
            padding: 40px 20px;
        }
        .auth-container {
            width: 100%;
            max-width: 500px;
            padding: 40px 50px; 
            background-color: #162447;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
        }
        .auth-title {
            color: #f0a500;
            text-align: center;
            margin-bottom: 30px;
            font-size: 1.8rem;
            text-transform: uppercase;
        }
        .form-group {
            margin-bottom: 25px;
            width: 100%; 
        }
        .auth-input {
            width: calc(100% - 40px);
            padding: 14px 20px;
            background-color: #1a1a2e;
            border: 1px solid #2a2a3e;
            border-radius: 8px;
            color: #e0e0e0;
            font-family: 'Poppins', sans-serif;
            transition: all 0.3s;
            display: block;
            margin: 0 auto; 
        }
        .auth-input:focus {
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
            margin-top: 8px;
            display: block;
            padding: 0 10px; 
        }
        .auth-btn {
            background-color: #f0a500;
            color: #162447;
            border: none;
            padding: 15px;
            border-radius: 8px;
            font-weight: bold;
            width: calc(100% - 40px); 
            cursor: pointer;
            transition: all 0.3s;
            font-size: 1rem;
            text-transform: uppercase;
            margin: 15px auto 0; 
            display: block;
        }
        .auth-btn:hover {
            background-color: #ffbe33;
            transform: translateY(-2px);
        }
        .auth-link {
            color: #f0a500;
            text-align: center;
            display: block;
            margin-top: 25px;
            text-decoration: none;
            transition: all 0.3s;
            padding: 0 10px; 
        }
        .auth-link:hover {
            text-decoration: underline;
            color: #ffbe33;
        }
        .password-hint {
            color: #a0a0a0;
            font-size: 0.8rem;
            margin-top: 8px;
            padding: 0 10px; 
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="container">
            <div class="nav-container">
                <a href="{{ url('/') }}" class="nav-link">Home</a>
                <a href="{{ route('login') }}" class="nav-link">Iniciar Sesión</a>
            </div>
        </div>
    </nav>

    <div class="auth-wrapper">
        <div class="auth-container">
            <h1 class="auth-title">Crear Cuenta</h1>
            <form method="POST" action="{{ route('registro.post') }}">
                @csrf
                
                <div class="form-group">
                    <input type="text" name="nombre" class="auth-input @error('nombre') is-invalid @enderror" 
                           placeholder="Nombre completo" value="{{ old('nombre') }}" required>
                    @error('nombre')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <input type="text" name="nombre_usuario" class="auth-input @error('nombre_usuario') is-invalid @enderror" 
                           placeholder="Nombre de usuario" value="{{ old('nombre_usuario') }}" required>
                    @error('nombre_usuario')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <input type="email" name="correo" class="auth-input @error('correo') is-invalid @enderror" 
                           placeholder="Correo electrónico" value="{{ old('correo') }}" required>
                    @error('correo')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <input type="password" name="contraseña" class="auth-input @error('contraseña') is-invalid @enderror" 
                           placeholder="Contraseña (mínimo 8 caracteres)" required>
                    @error('contraseña')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                    <p class="password-hint">La contraseña debe contener letras y números</p>
                </div>
                
                <div class="form-group">
                    <input type="password" name="contraseña_confirmation" class="auth-input" 
                           placeholder="Confirmar contraseña" required>
                </div>
                
                <button type="submit" class="auth-btn">Registrarse</button>
            </form>
            
            <a href="{{ route('login') }}" class="auth-link">¿Ya tienes cuenta? Inicia sesión</a>
        </div>
    </div>
</body>
</html>