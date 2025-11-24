
<?php $__env->startSection('title', 'Crear paquete'); ?>

<?php $__env->startPush('css'); ?>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <main class="app-main">
        <div class="app-content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0">Crear paquete turístico</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('panel.index')); ?>">Inicio</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo e(route('paquetes.index')); ?>">Paquetes</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Crear</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="app-content">
            <div class="card card-primary card-outline mb-4">
                <div class="card-header">
                    <div class="card-title">Nuevo paquete</div>
                </div>

                <form action="<?php echo e(route('paquetes.store')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="card-body">
                        <div class="row">
                            <!-- Nombre -->
                            <div class="mb-3 col-md-6">
                                <label for="nombre" class="form-label">Nombre del paquete:</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo e(old('nombre')); ?>">
                                <?php $__errorArgs = ['nombre'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <small class="text-danger">*.<?php echo e($message); ?></small>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <!-- Destino -->
                            <div class="mb-3 col-md-6">
                                <label for="destino" class="form-label">Destino:</label>
                                <input type="text" class="form-control" id="destino" name="destino" value="<?php echo e(old('destino')); ?>">
                                <?php $__errorArgs = ['destino'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <small class="text-danger">*.<?php echo e($message); ?></small>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <!-- Precio -->
                            <div class="mb-3 col-md-6">
                                <label for="precio" class="form-label">Precio (S/):</label>
                                <input type="number" class="form-control" id="precio" name="precio" step="0.01" value="<?php echo e(old('precio')); ?>">
                                <?php $__errorArgs = ['precio'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <small class="text-danger">*.<?php echo e($message); ?></small>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <!-- Duración -->
                            <div class="mb-3 col-md-6">
                                <label for="duracion" class="form-label">Duración (días):</label>
                                <input type="number" class="form-control" id="duracion" name="duracion" value="<?php echo e(old('duracion')); ?>">
                                <?php $__errorArgs = ['duracion'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <small class="text-danger">*.<?php echo e($message); ?></small>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <!-- Descripción -->
                            <div class="mb-3 col-12">
                                <label for="descripcion" class="form-label">Descripción:</label>
                                <textarea class="form-control" id="descripcion" name="descripcion" rows="4"><?php echo e(old('descripcion')); ?></textarea>
                                <?php $__errorArgs = ['descripcion'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <small class="text-danger">*.<?php echo e($message); ?></small>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <!-- Imagen -->
                            <div class="mb-3 col-12">
                                <label for="imagen" class="form-label">Imagen del paquete:</label>
                                <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*">
                                <?php $__errorArgs = ['imagen'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <small class="text-danger">*.<?php echo e($message); ?></small>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <button type="reset" class="btn btn-secondary">Reiniciar</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('template', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\gestion-paquetes - copia\resources\views/paquete/create.blade.php ENDPATH**/ ?>