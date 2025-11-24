

<?php $__env->startPush('css'); ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <?php if(session('success')): ?>
        <script>
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'success',
                title: '<?php echo e(session("success")); ?>',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            });
        </script>
    <?php endif; ?>

    <main class="app-main">
        <div class="app-content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0">Restaurantes</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('panel.index')); ?>">Inicio</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Restaurantes</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="app-content">
            <div class="container-fluid">
                <a href="<?php echo e(route('restaurantes.create')); ?>">
                    <button type="button" class="btn btn-outline-primary mb-2"><i class="bi bi-plus-circle"></i> Nuevo</button>
                </a>

                <div class="card mb-4">
                    <div class="card-header">
                        <h3 class="card-title">Lista de restaurantes</h3>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Ciudad</th>
                                    <th>Tipo de cocina</th>
                                    <th>Capacidad</th>
                                    <th>Precio promedio</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $restaurantes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $restaurante): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr class="align-middle">
                                        <td><?php echo e($restaurante->nombre); ?></td>
                                        <td><?php echo e($restaurante->ciudad); ?></td>
                                        <td><?php echo e($restaurante->tipo_cocina); ?></td>
                                        <td><?php echo e($restaurante->capacidad); ?> personas</td>
                                        <td>S/ <?php echo e(number_format($restaurante->precio_promedio, 2)); ?></td>
                                        <td>
                                            <a href="<?php echo e(route('restaurantes.show', ['restaurante' => $restaurante])); ?>" class="btn btn-info btn-sm">
                                                <i class="bi bi-eye"></i> Ver
                                            </a>
                                            <a href="<?php echo e(route('restaurantes.edit', ['restaurante' => $restaurante])); ?>" class="btn btn-warning btn-sm">
                                                <i class="bi bi-pencil-square"></i> Editar
                                            </a>

                                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modalEliminar-<?php echo e($restaurante->id); ?>">
                                                <i class="bi bi-trash"></i> Eliminar
                                            </button>

                                            <!-- Modal Eliminación -->
                                            <div class="modal fade" id="modalEliminar-<?php echo e($restaurante->id); ?>" tabindex="-1" aria-labelledby="modalLabel-<?php echo e($restaurante->id); ?>" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="modalLabel-<?php echo e($restaurante->id); ?>">Confirmar eliminación</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            ¿Estás seguro que quieres eliminar el restaurante <strong><?php echo e($restaurante->nombre); ?></strong>?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                            <form action="<?php echo e(route('restaurantes.destroy', $restaurante->id)); ?>" method="POST" style="display:inline;">
                                                                <?php echo csrf_field(); ?>
                                                                <?php echo method_field('DELETE'); ?>
                                                                <button type="submit" class="btn btn-danger">Sí, eliminar</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Modal Eliminación -->
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="6" class="text-center">No hay restaurantes registrados</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="card-footer clearfix">
                        <?php echo e($restaurantes->links()); ?>

                    </div>
                </div>
            </div>
        </div>
    </main>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('template', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\gestion-paquetes - copia\resources\views/restaurante/index.blade.php ENDPATH**/ ?>