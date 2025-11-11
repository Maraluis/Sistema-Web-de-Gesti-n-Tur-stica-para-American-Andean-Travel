
<?php $__env->startSection('title', 'Ver hotel'); ?>
<?php $__env->startPush('css'); ?>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <main class="app-main">
        <div class="app-content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0">Detalles del hotel</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('panel.index')); ?>">Inicio</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo e(route('hoteles.index')); ?>">Hoteles</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Ver</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="app-content">
            <div class="card mb-4">
                <div class="card-header">
                    <h3 class="card-title"><?php echo e($hotele->nombre); ?></h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <?php if($hotele->imagen): ?>
                            <div class="col-md-4 mb-3">
                                <img src="<?php echo e(asset('storage/' . $hotele->imagen)); ?>" alt="<?php echo e($hotele->nombre); ?>" class="img-fluid rounded">
                            </div>
                        <?php endif; ?>
                        <div class="col-md-<?php echo e($hotele->imagen ? '8' : '12'); ?>">
                            <table class="table table-bordered">
                                <tr>
                                    <th width="200">Nombre:</th>
                                    <td><?php echo e($hotele->nombre); ?></td>
                                </tr>
                                <tr>
                                    <th>Dirección:</th>
                                    <td><?php echo e($hotele->direccion); ?></td>
                                </tr>
                                <tr>
                                    <th>Ciudad:</th>
                                    <td><?php echo e($hotele->ciudad); ?></td>
                                </tr>
                                <tr>
                                    <th>País:</th>
                                    <td><?php echo e($hotele->pais); ?></td>
                                </tr>
                                <tr>
                                    <th>Estrellas:</th>
                                    <td>
                                        <?php for($i = 0; $i < $hotele->estrellas; $i++): ?>
                                            <i class="bi bi-star-fill text-warning"></i>
                                        <?php endfor; ?>
                                        (<?php echo e($hotele->estrellas); ?>)
                                    </td>
                                </tr>
                                <tr>
                                    <th>Teléfono:</th>
                                    <td><?php echo e($hotele->telefono ?? 'No especificado'); ?></td>
                                </tr>
                                <tr>
                                    <th>Email:</th>
                                    <td><?php echo e($hotele->email ?? 'No especificado'); ?></td>
                                </tr>
                                <tr>
                                    <th>Precio por noche:</th>
                                    <td><strong class="text-success">S/ <?php echo e(number_format($hotele->precio_noche, 2)); ?></strong></td>
                                </tr>
                                <tr>
                                    <th>Capacidad:</th>
                                    <td><?php echo e($hotele->capacidad); ?> personas</td>
                                </tr>
                                <tr>
                                    <th>Servicios:</th>
                                    <td><?php echo e($hotele->servicios ?? 'No especificado'); ?></td>
                                </tr>
                                <tr>
                                    <th>Descripción:</th>
                                    <td><?php echo e($hotele->descripcion ?? 'Sin descripción'); ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="<?php echo e(route('hoteles.edit', $hotele)); ?>" class="btn btn-warning">
                        <i class="bi bi-pencil-square"></i> Editar
                    </a>
                    <a href="<?php echo e(route('hoteles.index')); ?>" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Volver
                    </a>
                </div>
            </div>
        </div>
    </main>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('template', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\gestion-paquetes - copia\resources\views/hotel/show.blade.php ENDPATH**/ ?>