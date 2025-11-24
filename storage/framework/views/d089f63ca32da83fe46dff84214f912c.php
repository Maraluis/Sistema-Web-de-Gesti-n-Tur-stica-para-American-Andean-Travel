

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
                        <h3 class="mb-0">Transportes</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('panel.index')); ?>">Inicio</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Transportes</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="app-content">
            <div class="container-fluid">
                <a href="<?php echo e(route('transportes.create')); ?>">
                    <button type="button" class="btn btn-outline-primary mb-2"><i class="bi bi-plus-circle"></i> Nuevo</button>
                </a>

                <div class="card mb-4">
                    <div class="card-header">
                        <h3 class="card-title">Lista de transportes</h3>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Tipo</th>
                                    <th>Placa</th>
                                    <th>Empresa</th>
                                    <th>Capacidad</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $transportes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transporte): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="align-middle">
                                        <td><?php echo e($transporte->tipo); ?></td>
                                        <td><?php echo e($transporte->placa); ?></td>
                                        <td><?php echo e($transporte->empresa ?? '-'); ?></td>
                                        <td><?php echo e($transporte->capacidad); ?></td>
                                        <td>
                                            <?php if($transporte->estado === 'activo'): ?>
                                                <span class="badge bg-success">Activo</span>
                                            <?php elseif($transporte->estado === 'mantenimiento'): ?>
                                                <span class="badge bg-warning text-dark">Mantenimiento</span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <a href="<?php echo e(route('transportes.edit', $transporte->id)); ?>" class="btn btn-warning btn-sm">
                                                <i class="bi bi-pencil-square"></i> Editar
                                            </a>

                                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modalEliminar-<?php echo e($transporte->id); ?>">
                                                <i class="bi bi-trash"></i> Eliminar
                                            </button>

                                            <!-- Modal Eliminación -->
                                            <div class="modal fade" id="modalEliminar-<?php echo e($transporte->id); ?>" tabindex="-1" aria-labelledby="modalLabel-<?php echo e($transporte->id); ?>" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="modalLabel-<?php echo e($transporte->id); ?>">Confirmar eliminación</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            ¿Estás seguro que quieres eliminar el transporte con placa <strong><?php echo e($transporte->placa); ?></strong>?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                            <form action="<?php echo e(route('transportes.destroy', $transporte->id)); ?>" method="POST" style="display:inline;">
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
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="card-footer clearfix">
                        
                    </div>
                </div>
            </div>
        </div>
    </main>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('template', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\gestion-paquetes - copia\resources\views/transporte/index.blade.php ENDPATH**/ ?>