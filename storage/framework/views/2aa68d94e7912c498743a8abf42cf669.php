<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Clientes</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            font-size: 12px;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 3px solid #007bff;
            padding-bottom: 15px;
        }
        .header h1 {
            margin: 0;
            color: #007bff;
            font-size: 24px;
        }
        .header p {
            margin: 5px 0;
            color: #666;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th {
            background-color: #007bff;
            color: white;
            padding: 10px;
            text-align: left;
            font-size: 11px;
        }
        td {
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            text-align: center;
            font-size: 10px;
            color: #666;
            border-top: 1px solid #ddd;
            padding-top: 10px;
        }
        .badge {
            padding: 3px 8px;
            border-radius: 3px;
            font-size: 10px;
            font-weight: bold;
        }
        .badge-success {
            background-color: #28a745;
            color: white;
        }
        .summary {
            margin-top: 20px;
            padding: 15px;
            background-color: #f0f8ff;
            border-left: 4px solid #007bff;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>American Andean Travel</h1>
        <p><strong>Reporte de Clientes Registrados</strong></p>
        <p>Fecha de generación: <?php echo e(date('d/m/Y H:i')); ?></p>
    </div>

    <div class="summary">
        <strong>Total de Clientes:</strong> <?php echo e($clientes->count()); ?>

    </div>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Documento</th>
                <th>Correo</th>
                <th>Teléfono</th>
                <th>Reservas</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $clientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $cliente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($index + 1); ?></td>
                <td><?php echo e($cliente->nombres); ?></td>
                <td><?php echo e($cliente->apellidos); ?></td>
                <td>
                    <?php echo e(strtoupper($cliente->tipo_documento)); ?>: <?php echo e($cliente->documento); ?>

                </td>
                <td><?php echo e($cliente->correo); ?></td>
                <td><?php echo e($cliente->telefono); ?></td>
                <td><?php echo e($cliente->reservas->count()); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    <div class="footer">
        <p>American Andean Travel - Sistema de Gestión Turística | Página 1 de 1</p>
    </div>
</body>
</html>
<?php /**PATH D:\gestion-paquetes - copia\resources\views/reportes/clientes.blade.php ENDPATH**/ ?>