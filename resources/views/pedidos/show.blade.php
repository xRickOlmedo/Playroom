<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recibo de Compra - Playroom</title>
    @vite('resources/css/app.css')
    <style>
        body {
            background-color: #1a1a2e;
            color: #e0e0e0;
            font-family: 'Poppins', sans-serif;
        }
        .recibo-container {
            max-width: 800px;
            margin: 2rem auto;
            padding: 2rem;
            background-color: #162447;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.3);
        }
        .recibo-header {
            text-align: center;
            margin-bottom: 2rem;
            border-bottom: 2px solid #f0a500;
            padding-bottom: 1rem;
        }
        .recibo-title {
            color: #f0a500;
            font-size: 2rem;
            margin-bottom: 0.5rem;
        }
        .recibo-info {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
            margin-bottom: 2rem;
        }
        .info-label {
            color: #b0b0b0;
            font-weight: 500;
        }
        .info-value {
            color: #ffffff;
        }
        .productos-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 2rem;
        }
        .productos-table th {
            background-color: #f0a500;
            color: #162447;
            padding: 0.75rem;
            text-align: left;
        }
        .productos-table td {
            padding: 0.75rem;
            border-bottom: 1px solid #1a1a2e;
        }
        .total-section {
            text-align: right;
            font-size: 1.2rem;
            margin-top: 1rem;
        }
        .total-amount {
            color: #f0a500;
            font-weight: bold;
            font-size: 1.5rem;
        }
        .btn-volver {
            display: inline-block;
            background-color: #f0a500;
            color: #162447;
            padding: 0.75rem 1.5rem;
            border-radius: 30px;
            text-decoration: none;
            font-weight: 600;
            margin-top: 2rem;
            transition: all 0.3s;
        }
        .btn-volver:hover {
            background-color: #ff6b00;
            color: white;
        }
    </style>
</head>
<body>
    <div class="recibo-container">
        <div class="recibo-header">
            <h1 class="recibo-title">¡Gracias por tu compra!</h1>
            <p>Tu pedido ha sido procesado con éxito</p>
        </div>

        <div class="recibo-info">
            <div>
                <div class="info-label">Número de Pedido:</div>
                <div class="info-value">#{{ str_pad($pedido->id, 6, '0', STR_PAD_LEFT) }}</div>
            </div>
            <div>
                <div class="info-label">Fecha:</div>
                <div class="info-value">{{ $pedido->created_at->format('d/m/Y H:i') }}</div>
            </div>
            <div>
                <div class="info-label">Método de Pago:</div>
                <div class="info-value">{{ ucfirst($pedido->metodo_pago) }}</div>
            </div>
            <div>
                <div class="info-label">Estado:</div>
                <div class="info-value">{{ ucfirst($pedido->estado) }}</div>
            </div>
            <div>
                <div class="info-label">Dirección de Envío:</div>
                <div class="info-value">{{ $pedido->direccion_envio }}</div>
            </div>
        </div>

        <h2>Detalles del Pedido</h2>
        <table class="productos-table">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Precio Unitario</th>
                    <th>Cantidad</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pedido->detalles as $detalle)
                <tr>
                    <td>{{ $detalle->producto->nombre }}</td>
                    <td>${{ number_format($detalle->precio_unitario, 2) }}</td>
                    <td>{{ $detalle->cantidad }}</td>
                    <td>${{ number_format($detalle->subtotal, 2) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="total-section">
            <div>Total del Pedido: <span class="total-amount">${{ number_format($pedido->total, 2) }}</span></div>
        </div>

        <div style="text-align: center;">
            <a href="{{ route('productos') }}" class="btn-volver">Volver a la Tienda</a>
        </div>
    </div>
</body>
</html>