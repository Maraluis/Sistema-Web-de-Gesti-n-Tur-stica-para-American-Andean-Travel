<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte Diario - {{ $fecha }}</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 11px; }
        .header { text-align: center; margin-bottom: 15px; border-bottom: 2px solid #333; padding-bottom: 10px; }
        .header h1 { margin: 5px 0; color: #2c3e50; }
        table { width: 100%; border-collapse: collapse; margin: 10px 0; font-size: 10px; }
        th, td { border: 1px solid #ddd; padding: 6px; text-align: left; }
        th { background-color: #3498db; color: white; }
        .resumen { background: #ecf0f1; padding: 10px; margin: 15px 0; border-left: 4px solid #e74c3c; }
        .footer { position: fixed; bottom: 0; width: 100%; text-align: center; font-size: 9px; color: #7f8c8d; }
    </style>
</head>
<body>
    <div class="header">
        <h1>REPORTE DIARIO DE OPERACIONES</h1>
        <p><strong>Fecha: {{ \Carbon\Carbon::parse($fecha)->format('d/m/Y') }}</strong></p>
        <p>Sistema de Gestión Turística</p>
    </div>

    <div class="resumen">
        <strong>Total de Tours del día: {{ $reservas->count() }}</strong>
    </div>

    @if($reservas->count() > 0)
    <table>
        <thead>
            <tr>
                <th style="width: 5%;">ID</th>
                <th style="width: 20%;">Turista</th>
                <th style="width: 20%;">Paquete/Destino</th>
                <th style="width: 15%;">Guía</th>
                <th style="width: 15%;">Transporte</th>
                <th style="width: 10%;">Hora Salida</th>
                <th style="width: 10%;">Precio</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reservas as $reserva)
            <tr>
                <td>{{ $reserva->id }}</td>
                <td>{{ $reserva->cliente->nombre }} {{ $reserva->cliente->apellido }}</td>
                <td>
                    <strong>{{ $reserva->paquete->nombre }}</strong><br>
                    <small>{{ $reserva->paquete->destino }}</small>
                </td>
                <td>
                    @foreach($reserva->paquete->guias as $guia)
                        {{ $guia->nombre }}@if(!$loop->last), @endif
                    @endforeach
                </td>
                <td>
                    @foreach($reserva->paquete->transportes as $transporte)
                        {{ $transporte->tipo }} - {{ $transporte->placa }}
                    @endforeach
                </td>
                <td>08:00 AM</td>
                <td>S/. {{ number_format($reserva->paquete->precio, 2) }}</td>
            </tr>
            @endforeach
            <tr style="background: #f8f9fa; font-weight: bold;">
                <td colspan="6" style="text-align: right;">TOTAL DEL DÍA:</td>
                <td>S/. {{ number_format($reservas->sum(function($r){ return $r->paquete->precio; }), 2) }}</td>
            </tr>
        </tbody>
    </table>
    @else
    <p style="text-align: center; padding: 20px; background: #f8f9fa;">
        No hay tours programados para esta fecha.
    </p>
    @endif

    <div class="footer">
        <p>Sistema de Gestión Turística - Reporte generado: {{ date('d/m/Y H:i:s') }}</p>
    </div>
</body>
</html>
