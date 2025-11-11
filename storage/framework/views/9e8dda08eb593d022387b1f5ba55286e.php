
<?php $__env->startSection('title', 'Listado de Reservas'); ?>
<?php $__env->startPush('css'); ?>
<style>
    /* Colores para estados */
    .estado-pendiente {
        color: #856404;
        background-color: #fff3cd;
        border-radius: 0.25rem;
        padding: 0.2rem 0.5rem;
        font-weight: 600;
    }
    .estado-confirmada {
        color: #0c5460;
        background-color: #d1ecf1;
        border-radius: 0.25rem;
        padding: 0.2rem 0.5rem;
        font-weight: 600;
    }
    .estado-pagada {
        color: #155724;
        background-color: #d4edda;
        border-radius: 0.25rem;
        padding: 0.2rem 0.5rem;
        font-weight: 600;
    }
    .estado-cancelada {
        color: #721c24;
        background-color: #f8d7da;
        border-radius: 0.25rem;
        padding: 0.2rem 0.5rem;
        font-weight: 600;
    }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<main class="app-main">
    <div class="app-content-header mb-3">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <h3>Listado de Reservas</h3>
                </div>
                <div class="col-sm-6 text-end">
                    <a href="<?php echo e(route('reservas.create')); ?>" class="btn btn-primary">
                        <i class="bi bi-plus-circle"></i> Nueva Reserva
                    </a>
                    <a href="<?php echo e(route('reportes.todas.reservas')); ?>" class="btn btn-danger" target="_blank">
                        <i class="bi bi-file-pdf"></i> Reporte PDF - Todas las Reservas
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="app-content">
        <?php if(session('success')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>¡Éxito!</strong> <?php echo e(session('success')); ?>

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
            </div>
        <?php endif; ?>

        <div class="card card-outline card-primary">
            <div class="card-body p-0">
                <?php if($reservas->count()): ?>
                    <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <thead class="table-primary">
                                <tr>
                                    <th>#</th>
                                    <th>Cliente</th>
                                    <th>Paquete</th>
                                    <th>Fecha Reserva</th>
                                    <th>Fecha Inicio</th>
                                    <th>Precio Total</th>
                                    <th>Estado Reserva</th>
                                    <th>Estado Pago</th>
                                    <th class="text-center" style="width:120px;">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $reservas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reserva): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($loop->iteration + ($reservas->currentPage() - 1) * $reservas->perPage()); ?></td>
                                    <td><?php echo e($reserva->cliente->nombres ?? 'N/A'); ?> <?php echo e($reserva->cliente->apellidos ?? ''); ?></td>
                                    <td><?php echo e($reserva->paquete->nombre ?? 'N/A'); ?></td>
                                    <td><?php echo e(\Carbon\Carbon::parse($reserva->fecha_reserva)->format('d/m/Y')); ?></td>
                                    <td><?php echo e($reserva->fecha_inicio ? \Carbon\Carbon::parse($reserva->fecha_inicio)->format('d/m/Y') : 'N/A'); ?></td>
                                    <td><strong>S/ <?php echo e(number_format($reserva->precio_total ?? 0, 2)); ?></strong></td>
                                    <td>
                                        <?php if($reserva->estado == 'confirmada'): ?>
                                            <span class="badge bg-success">Confirmada</span>
                                        <?php elseif($reserva->estado == 'pendiente'): ?>
                                            <span class="badge bg-warning">Pendiente</span>
                                        <?php else: ?>
                                            <span class="badge bg-danger">Cancelada</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if($reserva->estado_pago == 'pagado'): ?>
                                            <span class="badge bg-success"><i class="bi bi-check-circle"></i> Pagado</span>
                                        <?php else: ?>
                                            <span class="badge bg-danger"><i class="bi bi-x-circle"></i> Pendiente</span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group" role="group">
                                            <a href="<?php echo e(route('reservas.show', $reserva->id)); ?>" class="btn btn-sm btn-info" title="Ver Detalles">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            
                                            <a href="<?php echo e(route('reservas.edit', $reserva->id)); ?>" class="btn btn-sm btn-warning" title="Editar">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>

                                            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#modalEliminar-<?php echo e($reserva->id); ?>" title="Eliminar">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </div>

                                        <!-- Modal Eliminación -->
                                        <div class="modal fade" id="modalEliminar-<?php echo e($reserva->id); ?>" tabindex="-1" aria-labelledby="modalLabel-<?php echo e($reserva->id); ?>" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modalLabel-<?php echo e($reserva->id); ?>">Confirmar eliminación</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        ¿Estás seguro que quieres eliminar la reserva de <strong><?php echo e($reserva->cliente->nombres); ?> <?php echo e($reserva->cliente->apellidos); ?></strong> para el paquete <strong><?php echo e($reserva->paquete->nombre); ?></strong>?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                        <form action="<?php echo e(route('reservas.destroy', $reserva->id)); ?>" method="POST" style="display:inline;">
                                                            <?php echo csrf_field(); ?>
                                                            <?php echo method_field('DELETE'); ?>
                                                            <button type="submit" class="btn btn-danger">Sí, eliminar</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="p-3">
                        <?php echo e($reservas->links()); ?>

                    </div>
                <?php else: ?>
                    <div class="p-3">
                        <p class="text-center text-muted">No hay reservas registradas.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</main>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('template', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\gestion-paquetes - copia\resources\views/reserva/index.blade.php ENDPATH**/ ?>