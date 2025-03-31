<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Gaming - Playroom</title>
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

        .blog-container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 0 15px;
        }
        .article-card {
            background-color: #162447;
            border-radius: 12px;
            overflow: hidden;
            margin-bottom: 50px;
            transition: all 0.3s;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }
        .article-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(240, 165, 0, 0.2);
        }
        .article-img {
            width: 100%;
            height: 400px;
            object-fit: cover;
            transition: transform 0.5s ease;
        }
        .article-card:hover .article-img {
            transform: scale(1.02);
        }
        .article-content {
            padding: 30px;
        }
        .article-title {
            font-size: 1.8rem;
            color: #f0a500;
            margin-bottom: 15px;
            line-height: 1.3;
        }
        .article-date {
            color: #a0a0a0;
            margin-bottom: 20px;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
        }
        .article-date:before {
            content: '📅';
            margin-right: 8px;
        }
        .article-text {
            line-height: 1.8;
            margin-bottom: 25px;
            color: #d0d0d0;
        }
        .article-text p {
            margin-bottom: 15px;
        }
        .read-more {
            display: inline-block;
            background-color: #f0a500;
            color: #162447;
            padding: 10px 25px;
            border-radius: 30px;
            text-decoration: none;
            font-weight: bold;
            transition: all 0.3s;
        }
        .read-more:hover {
            background-color: #ff8c00;
            transform: translateX(5px);
        }
        .info-text {
            text-align: center;
            color: #a0a0a0;
            margin: 60px 0;
            font-size: 1.1rem;
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
        <h1 class="section-title">Últimas Noticias Gaming</h1>
        
        <div class="blog-container">
            <!-- Artículo 1 -->
            <article class="article-card">
                <img src="https://cdn-uploads.gameblog.fr/img/news/502490_65704bb424d52.jpg" alt="GTA VI" class="article-img">
                <div class="article-content">
                    <h2 class="article-title">Rockstar anuncia oficialmente GTA VI para 2025</h2>
                    <p class="article-date">Publicado el 15 de Noviembre, 2024</p>
                    <div class="article-text">
                        <p>Trás años de especulaciones, Rockstar Games ha confirmado el desarrollo de Grand Theft Auto VI con un espectacular tráiler que rompió récords de visualizaciones. El juego estará ambientado en Vice City (una versión moderna de Miami) y presentará por primera vez un protagonista femenino llamado Lucia junto a su compañero Jason.</p>
                        <p>Entre las novedades destacan un mapa que superará en tamaño a todos los GTA anteriores, un sistema de clima dinámico con huracanes, y una IA revolucionaria para los NPCs.</p>
                    </div>
                    <a href="https://ejemplo.com/gta-vi-anuncio" class="read-more">Leer más →</a>
                </div>
            </article>
            
            <!-- Artículo 2 -->
            <article class="article-card">
                <img src="https://cdn.mos.cms.futurecdn.net/CAZ6JXi6huSuN4QGE627NR.jpg" alt="Nintendo Switch 2" class="article-img">
                <div class="article-content">
                    <h2 class="article-title">Filtraciones revelan especificaciones técnicas de la Nintendo Switch 2</h2>
                    <p class="article-date">Publicado el 5 de Diciembre, 2023</p>
                    <div class="article-text">
                        <p>Según documentos filtrados por un desarrollador asociado, la próxima consola de Nintendo (conocida temporalmente como Switch 2) contaría con un chip NVIDIA Tegra T239 personalizado, permitiendo rendimiento cercano a PS4 en modo portátil y superior a PS4 Pro cuando está conectada al dock.</p>
                        <p>Entre las características más destacadas se mencionan: pantalla OLED de 8 pulgadas con resolución 1080p, 12GB de RAM LPDDR5, almacenamiento SSD de 256GB, retrocompatibilidad total con juegos y accesorios de Switch original.</p>
                    </div>
                    <a href="https://ejemplo.com/nintendo-switch-2-filtraciones" class="read-more">Leer más →</a>
                </div>
            </article>
            
            <!-- Artículo 3 -->
            <article class="article-card">
                <img src="https://www.pcmag.com/wp-content/uploads/2023/10/playstation-portal-remote-player-100823670-orig.jpg?quality=50&strip=all" alt="PlayStation Portal" class="article-img">
                <div class="article-content">
                    <h2 class="article-title">PlayStation Portal: Análisis a fondo del dispositivo streaming de Sony</h2>
                    <p class="article-date">Publicado el 20 de Diciembre, 2023</p>
                    <div class="article-text">
                        <p>El PlayStation Portal, el dispositivo de streaming remoto de Sony, ha llegado a las manos de los primeros usuarios y las opiniones son mixtas. Por un lado, ofrece una experiencia sorprendentemente buena para jugar juegos de PS5 en otra habitación, con una pantalla LCD de 8 pulgadas a 1080p/60fps y controles idénticos al DualSense.</p>
                        <p>Sin embargo, su dependencia de una conexión WiFi estable (no funciona con redes móviles) y la ausencia de soporte para PlayStation Plus Premium cloud gaming han generado críticas.</p>
                    </div>
                    <a href="https://ejemplo.com/playstation-portal-analisis" class="read-more">Leer más →</a>
                </div>
            </article>
        </div>

        <p class="info-text">Mantente al día con las últimas noticias del mundo gaming. Visítanos regularmente para más actualizaciones.</p>
    </div>
</body>
</html>