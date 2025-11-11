<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Todas las Reservas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 15px;
            font-size: 10px;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 3px solid #007bff;
            padding-bottom: 10px;
        }
        .header h1 {
            margin: 0;
            color: #007bff;
            font-size: 20px;
        }
        .header p {
            margin: 3px 0;
            color: #666;
            font-size: 11px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        th {
            background-color: #007bff;
            color: white;
            padding: 8px 5px;
            text-align: left;
            font-size: 9px;
        }
        td {
            padding: 6px 5px;
            border-bottom: 1px solid #ddd;
            font-size: 9px;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            text-align: center;
            font-size: 9px;
            color: #666;
            border-top: 1px solid #ddd;
            padding-top: 8px;
        }
        .badge {
            padding: 2px 6px;
            border-radius: 3px;
            font-size: 8px;
            font-weight: bold;
            display: inline-block;
        }
        .badge-success {
            background-color: #28a745;
            color: white;
        }
        .badge-warning {
            background-color: #ffc107;
            color: #000;
        }
        .badge-danger {
            background-color: #dc3545;
            color: white;
        }
        .badge-info {
            background-color: #17a2b8;
            color: white;
        }
        .summary {
            margin-top: 15px;
            padding: 10px;
            background-color: #f0f8ff;
            border-left: 4px solid #007bff;
        }
        .summary-grid {
            display: table;
            width: 100%;
            margin-top: 10px;
        }
        .summary-item {
            display: table-cell;
            padding: 5px 10px;
            text-align: center;
            border-right: 1px solid #ddd;
        }
        .summary-item:last-child {
            border-right: none;
        }
        .summary-item strong {
            display: block;
            font-size: 14px;
            color: #007bff;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>American Andean Travel</h1>
        <p><strong>Reporte Completo de Reservas</strong></p>
        <p>Fecha de generación: <?php echo e(date('d/m/Y H:i')); ?></p>
    </div>

    <div class="summary">
        <strong>Resumen General</strong>
        <div class="summary-grid">
            <div class="summary-item">
                <span>Total Reservas</span>
                <strong><?php echo e($reservas->count()); ?></strong>
            </div>
            <div class="summary-item">
                <span>Total General</span>
                <strong>S/ <?php echo e(number_format($totalGeneral, 2)); ?></strong>
            </div>
            <div class="summary-item">
                <span>Total Pagado</span>
                <strong style="color: #28a745;">S/ <?php echo e(number_format($totalPagado, 2)); ?></strong>
            </div>
            <div class="summary-item">
                <span>Total Pendiente</span>
                <strong style="color: #dc3545;">S/ <?php echo e(number_format($totalPendiente, 2)); ?></strong>
            </div>
        </div>
    </div>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Cliente</th>
                <th>Paquete</th>
                <th>Fecha Reserva</th>
                <th>Fecha Inicio</th>
                <th>N° Personas</th>
                <th>Estado Reserva</th>
                <th>Estado Pago</th>
                <th>Precio Total</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $reservas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $reserva): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($index + 1); ?></td>
                <td><?php echo e($reserva->cliente->nombres); ?> <?php echo e($reserva->cliente->apellidos); ?></td>
                <td><?php echo e($reserva->paquete->nombre); ?></td>
                <td><?php echo e(\Carbon\Carbon::parse($reserva->fecha_reserva)->format('d/m/Y')); ?></td>
                <td><?php echo e($reserva->fecha_inicio ? \Carbon\Carbon::parse($reserva->fecha_inicio)->format('d/m/Y') : 'N/A'); ?></td>
                <td style="text-align: center;"><?php echo e($reserva->num_personas ?? 1); ?></td>
                <td>
                    <?php if($reserva->estado == 'confirmada'): ?>
                        <span class="badge badge-success">CONFIRMADA</span>
                    <?php elseif($reserva->estado == 'pendiente'): ?>
                        <span class="badge badge-warning">PENDIENTE</span>
                    <?php else: ?>
                        <span class="badge badge-danger">CANCELADA</span>
                    <?php endif; ?>
                </td>
                <td>
                    <?php if($reserva->estado_pago == 'pagado'): ?>
                        <span class="badge badge-success">PAGADO</span>
                    <?php else: ?>
                        <span class="badge badge-danger">PENDIENTE</span>
                    <?php endif; ?>
                </td>
                <td style="text-align: right;"><strong>S/ <?php echo e(number_format($reserva->precio_total, 2)); ?></strong></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    <div class="footer">
        <p>American Andean Travel - Sistema de Gestión Turística | Generado el <?php echo e(date('d/m/Y H:i:s')); ?></p>
    </div>
</body>
</html>
<?php /**PATH D:\gestion-paquetes - copia\resources\views/reportes/todas_reservas.blade.php ENDPATH**/ ?>