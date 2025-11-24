

<?php $__env->startPush('css'); ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <?php if(session('success')): ?>
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });
            Toast.fire({
                icon: "success",
                title: "<?php echo e(session('success')); ?>"
            });
        </script>
    <?php endif; ?>

    <main class="app-main">
        <!--begin::Header-->
        <div class="app-content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0">Paquetes</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('panel.index')); ?>">Inicio</a></li>
                            <li class="breadcrumb-item active">Paquetes</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!--end::Header-->

        <div class="app-content">
            <div class="container-fluid">
                <a href="<?php echo e(route('paquetes.create')); ?>">
                    <button type="button" class="btn btn-outline-primary mb-2">
                        <i class="bi bi-plus-circle"></i> Nuevo
                    </button>
                </a>

                <div class="card mb-4">
                    <div class="card-header">
                        <h3 class="card-title">Tabla de paquetes turísticos</h3>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Destino</th>
                                    <th>Precio</th>
                                    <th>Duración (días)</th>
                                    <th>Imagen</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $paquetes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $paquete): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($paquete->nombre); ?></td>
                                        <td><?php echo e($paquete->destino); ?></td>
                                        <td>S/ <?php echo e(number_format($paquete->precio, 2)); ?></td>
                                        <td><?php echo e($paquete->duracion); ?></td>
                                        <td>
                                            <?php if($paquete->imagen): ?>
                                                <img src="<?php echo e(asset('storage/' . $paquete->imagen)); ?>" width="80"
                                                    alt="Imagen del paquete">
                                            <?php else: ?>
                                                <span class="text-muted">Sin imagen</span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <a href="<?php echo e(route('paquetes.edit', $paquete->id)); ?>"
                                                class="btn btn-warning btn-sm">
                                                <i class="bi bi-pencil-square"></i> Editar
                                            </a>

                                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#modalEliminar-<?php echo e($paquete->id); ?>">
                                                <i class="bi bi-trash"></i> Eliminar
                                            </button>

                                            <!-- Modal de confirmación -->
                                            <div class="modal fade" id="modalEliminar-<?php echo e($paquete->id); ?>" tabindex="-1"
                                                aria-labelledby="modalLabel-<?php echo e($paquete->id); ?>" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5"
                                                                id="modalLabel-<?php echo e($paquete->id); ?>">Confirmar eliminación
                                                            </h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Cerrar"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            ¿Estás seguro que quieres eliminar el paquete
                                                            <strong><?php echo e($paquete->nombre); ?></strong>?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Cancelar</button>
                                                            <form action="<?php echo e(route('paquetes.destroy', $paquete->id)); ?>"
                                                                method="POST" style="display:inline;">
                                                                <?php echo csrf_field(); ?>
                                                                <?php echo method_field('DELETE'); ?>
                                                                <button type="submit" class="btn btn-danger">Sí,
                                                                    eliminar</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Fin Modal -->
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

<?php echo $__env->make('template', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\gestion-paquetes - copia\resources\views/paquete/index.blade.php ENDPATH**/ ?>