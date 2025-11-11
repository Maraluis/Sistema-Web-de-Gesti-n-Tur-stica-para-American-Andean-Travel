<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte de Cliente - {{ $cliente->nombre }}</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; }
        .header { text-align: center; margin-bottom: 20px; border-bottom: 2px solid #333; padding-bottom: 10px; }
        .header h1 { margin: 5px 0; color: #2c3e50; }
        .section { margin: 15px 0; }
        .section-title { background: #3498db; color: white; padding: 8px; margin-bottom: 10px; font-weight: bold; }
        .info-box { background: #ecf0f1; padding: 10px; margin-bottom: 10px; border-left: 4px solid #3498db; }
        table { width: 100%; border-collapse: collapse; margin: 10px 0; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #3498db; color: white; }
        .footer { position: fixed; bottom: 0; width: 100%; text-align: center; font-size: 10px; color: #7f8c8d; }
    </style>
</head>
<body>
    <div class="header">
        <h1>REPORTE DE TURISTA</h1>
        <p><strong>Sistema de Gestión Turística</strong></p>
        <p>Fecha de Emisión: {{ date('d/m/Y H:i:s') }}</p>
    </div>

    <div class="section">
        <div class="section-title">DATOS DEL TURISTA</div>
        <div class="info-box">
            <strong>Nombre:</strong> {{ $cliente->nombre }} {{ $cliente->apellido }}<br>
            <strong>DNI/Pasaporte:</strong> {{ $cliente->dni }}<br>
            <strong>Email:</strong> {{ $cliente->email }}<br>
            <strong>Teléfono:</strong> {{ $cliente->telefono }}<br>
            <strong>Dirección:</strong> {{ $cliente->direccion }}
        </div>
    </div>

    @foreach($cliente->reservas as $reserva)
    <div class="section">
        <div class="section-title">RESERVA #{{ $reserva->id }} - {{ $reserva->paquete->nombre }}</div>
        
        <div class="info-box">
            <strong>Destino:</strong> {{ $reserva->paquete->destino }}<br>
            <strong>Fecha de Reserva:</strong> {{ \Carbon\Carbon::parse($reserva->fecha_reserva)->format('d/m/Y') }}<br>
            <strong>Duración:</strong> {{ $reserva->paquete->duracion }} días<br>
            <strong>Precio:</strong> S/. {{ number_format($reserva->paquete->precio, 2) }}<br>
            <strong>Descripción:</strong> {{ $reserva->paquete->descripcion }}
        </div>

        @if($reserva->paquete->guias->count() > 0)
        <h4>Guías Asignados:</h4>
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Especialidad</th>
                    <th>Teléfono</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reserva->paquete->guias as $guia)
                <tr>
                    <td>{{ $guia->nombre }}</td>
                    <td>{{ $guia->especialidad }}</td>
                    <td>{{ $guia->telefono }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif

        @if($reserva->paquete->transportes->count() > 0)
        <h4>Transporte:</h4>
        <table>
            <thead>
                <tr>
                    <th>Tipo</th>
                    <th>Placa</th>
                    <th>Capacidad</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reserva->paquete->transportes as $transporte)
                <tr>
                    <td>{{ $transporte->tipo }}</td>
                    <td>{{ $transporte->placa }}</td>
                    <td>{{ $transporte->capacidad }} personas</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif

        @if($reserva->paquete->hoteles->count() > 0)
        <h4>Alojamiento:</h4>
        <table>
            <thead>
                <tr>
                    <th>Hotel</th>
                    <th>Ciudad</th>
                    <th>Estrellas</th>
                    <th>Noches</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reserva->paquete->hoteles as $hotel)
                <tr>
                    <td>{{ $hotel->nombre }}</td>
                    <td>{{ $hotel->ciudad }}</td>
                    <td>{{ $hotel->estrellas }} ⭐</td>
                    <td>{{ $hotel->pivot->noches }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif

        @if($reserva->paquete->restaurantes->count() > 0)
        <h4>Alimentación:</h4>
        <table>
            <thead>
                <tr>
                    <th>Restaurante</th>
                    <th>Tipo de Cocina</th>
                    <th>Servicio</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reserva->paquete->restaurantes as $restaurante)
                <tr>
                    <td>{{ $restaurante->nombre }}</td>
                    <td>{{ $restaurante->tipo_cocina }}</td>
                    <td>{{ $restaurante->pivot->tipo_servicio }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
    @endforeach

    <div class="footer">
        <p>Sistema de Gestión Turística - Reporte generado automáticamente</p>
    </div>
</body>
</html>
