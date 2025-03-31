<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración</title>
    @vite('resources/css/app.css')
    <style>
        body {
            background-color: #1a1a2e;
            color: #e0e0e0;
            font-family: 'Poppins', sans-serif;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        .form-container {
            background-color: #162447;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
        }
        .form-input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            background-color: #1a1a2e;
            border: 1px solid #f0a500;
            color: #e0e0e0;
            border-radius: 5px;
        }
        .form-label {
            display: block;
            margin-bottom: 5px;
            color: #f0a500;
        }
        .submit-btn {
            background-color: #f0a500;
            color: #162447;
            padding: 10px 20px;
            border: none;
            border-radius: 20px;
            cursor: pointer;
            font-weight: 600;
            margin-right: 10px;
        }
        .back-btn {
            background-color: #1a1a2e;
            color: #f0a500;
            padding: 10px 20px;
            border: 1px solid #f0a500;
            border-radius: 20px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        .back-btn:hover {
            background-color: #f0a500;
            color: #162447;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 style="color: #f0a500; text-align: center; margin-bottom: 30px;">Agregar Nuevo Producto</h1>
        <div class="form-container">
            <form action="{{ route('productos.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div>
                    <label for="nombre" class="form-label">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" class="form-input" required>
                </div>
                <div>
                    <label for="precio" class="form-label">Precio:</label>
                    <input type="number" id="precio" name="precio" class="form-input" step="0.01" required>
                </div>
                <div>
                    <label for="descripcion" class="form-label">Descripción:</label>
                    <textarea id="descripcion" name="descripcion" class="form-input" rows="4" required></textarea>
                </div>
                <div>
                    <label for="imagen" class="form-label">Imagen:</label>
                    <input type="file" id="imagen" name="imagen" class="form-input">
                </div>
                <div>
                    <label for="tipo" class="form-label">Tipo:</label>
                    <select id="tipo" name="tipo" class="form-input" required>
                        <option value="Consolas">Consolas</option>
                        <option value="Controles">Controles</option>
                        <option value="Accesorios">Accesorios</option>
                        <option value="Juegos">Juegos</option>
                    </select>
                </div>
                <div>
                    <label for="categoria" class="form-label">Categoría:</label>
                    <select id="categoria" name="categoria" class="form-input" required>
                        <option value="Recomendados">Recomendados</option>
                        <option value="Ofertas">Ofertas especiales</option>
                        <option value="Nuevos">Nuevos lanzamientos</option>
                        <option value="Destacados">Destacados</option>
                        <option value="Sin categoría">Sin categoría</option>
                    </select>
                </div>
                <div style="display: flex; justify-content: space-between;">
                    <button type="submit" class="submit-btn">Agregar Producto</button>
                    <a href="{{ route('home') }}" class="back-btn">Volver a Home</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>