<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - Playroom</title>
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
            text-align: center;
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
        }
        .auth-link:hover {
            text-decoration: underline;
            color: #ffbe33;
        }
        .remember-me {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
            width: calc(100% - 40px);
            margin-left: auto;
            margin-right: auto;
        }
        .remember-me input {
            width: auto;
            margin-right: 10px;
        }
        .remember-me label {
            color: #e0e0e0;
            font-size: 0.9rem;
        }
        .auth-message {
            color: #ff4d4d;
            text-align: center;
            margin-bottom: 20px;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
     <nav class="navbar">
        <div class="container">
            <div class="nav-container">
                <a href="{{ url('/') }}" class="nav-link">Home</a>
                <a href="{{ route('registro') }}" class="nav-link">Registrarse</a>
            </div>
        </div>
    </nav>
    <div class="auth-wrapper">
        <div class="auth-container">
            <h1 class="auth-title">Iniciar Sesión</h1>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                
                <div class="form-group">
                    <input type="email" name="correo" class="auth-input @error('correo') is-invalid @enderror" 
                           placeholder="Correo electrónico" value="{{ old('correo') }}" required autofocus>
                    @error('correo')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <input type="password" name="contraseña" class="auth-input @error('contraseña') is-invalid @enderror" 
                           placeholder="Contraseña" required>
                    @error('contraseña')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="remember-me">
                    <input type="checkbox" name="remember" id="remember">
                    <label for="remember">Recordar sesión</label>
                </div>
                
                <button type="submit" class="auth-btn">Iniciar Sesión</button>
            </form>
            
            <a href="{{ route('registro') }}" class="auth-link">¿No tienes cuenta? Regístrate aquí</a>
        </div>
    </div>
</body>
</html>