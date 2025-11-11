
<?php $__env->startSection('title', 'Crear hotel'); ?>
<?php $__env->startPush('css'); ?>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <main class="app-main">
        <div class="app-content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0">Crear hotel</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('panel.index')); ?>">Inicio</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo e(route('hoteles.index')); ?>">Hoteles</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Crear</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="app-content">
            <div class="card card-primary card-outline mb-4">
                <div class="card-header">
                    <div class="card-title">Crear nuevo hotel</div>
                </div>
                <form action="<?php echo e(route('hoteles.store')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="card-body">
                        <div class="row">
                            <!-- Nombre -->
                            <div class="mb-3 col-md-6">
                                <label for="nombre" class="form-label">Nombre del hotel <span class="text-danger">*</span>:</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo e(old('nombre')); ?>" required />
                                <?php $__errorArgs = ['nombre'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <small class="text-danger"><?php echo e($message); ?></small>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <!-- Dirección -->
                            <div class="mb-3 col-md-6">
                                <label for="direccion" class="form-label">Dirección <span class="text-danger">*</span>:</label>
                                <input type="text" class="form-control" id="direccion" name="direccion" value="<?php echo e(old('direccion')); ?>" required />
                                <?php $__errorArgs = ['direccion'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <small class="text-danger"><?php echo e($message); ?></small>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <!-- Ciudad -->
                            <div class="mb-3 col-md-4">
                                <label for="ciudad" class="form-label">Ciudad <span class="text-danger">*</span>:</label>
                                <input type="text" class="form-control" id="ciudad" name="ciudad" value="<?php echo e(old('ciudad')); ?>" required />
                                <?php $__errorArgs = ['ciudad'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <small class="text-danger"><?php echo e($message); ?></small>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <!-- País -->
                            <div class="mb-3 col-md-4">
                                <label for="pais" class="form-label">País <span class="text-danger">*</span>:</label>
                                <input type="text" class="form-control" id="pais" name="pais" value="<?php echo e(old('pais')); ?>" required />
                                <?php $__errorArgs = ['pais'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <small class="text-danger"><?php echo e($message); ?></small>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <!-- Estrellas -->
                            <div class="mb-3 col-md-4">
                                <label for="estrellas" class="form-label">Estrellas <span class="text-danger">*</span>:</label>
                                <select class="form-select" id="estrellas" name="estrellas" required>
                                    <option value="">Seleccione...</option>
                                    <option value="1" <?php echo e(old('estrellas') == 1 ? 'selected' : ''); ?>>⭐</option>
                                    <option value="2" <?php echo e(old('estrellas') == 2 ? 'selected' : ''); ?>>⭐⭐</option>
                                    <option value="3" <?php echo e(old('estrellas') == 3 ? 'selected' : ''); ?>>⭐⭐⭐</option>
                                    <option value="4" <?php echo e(old('estrellas') == 4 ? 'selected' : ''); ?>>⭐⭐⭐⭐</option>
                                    <option value="5" <?php echo e(old('estrellas') == 5 ? 'selected' : ''); ?>>⭐⭐⭐⭐⭐</option>
                                </select>
                                <?php $__errorArgs = ['estrellas'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <small class="text-danger"><?php echo e($message); ?></small>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <!-- Teléfono -->
                            <div class="mb-3 col-md-4">
                                <label for="telefono" class="form-label">Teléfono:</label>
                                <input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo e(old('telefono')); ?>" />
                                <?php $__errorArgs = ['telefono'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <small class="text-danger"><?php echo e($message); ?></small>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <!-- Email -->
                            <div class="mb-3 col-md-4">
                                <label for="email" class="form-label">Email:</label>
                                <input type="email" class="form-control" id="email" name="email" value="<?php echo e(old('email')); ?>" />
                                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <small class="text-danger"><?php echo e($message); ?></small>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <!-- Precio por noche -->
                            <div class="mb-3 col-md-4">
                                <label for="precio_noche" class="form-label">Precio por noche <span class="text-danger">*</span>:</label>
                                <input type="number" step="0.01" class="form-control" id="precio_noche" name="precio_noche" value="<?php echo e(old('precio_noche')); ?>" required />
                                <?php $__errorArgs = ['precio_noche'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <small class="text-danger"><?php echo e($message); ?></small>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <!-- Capacidad -->
                            <div class="mb-3 col-md-6">
                                <label for="capacidad" class="form-label">Capacidad (personas) <span class="text-danger">*</span>:</label>
                                <input type="number" class="form-control" id="capacidad" name="capacidad" value="<?php echo e(old('capacidad')); ?>" required />
                                <?php $__errorArgs = ['capacidad'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <small class="text-danger"><?php echo e($message); ?></small>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <!-- Servicios -->
                            <div class="mb-3 col-md-6">
                                <label for="servicios" class="form-label">Servicios:</label>
                                <input type="text" class="form-control" id="servicios" name="servicios" value="<?php echo e(old('servicios')); ?>" placeholder="WiFi, Piscina, Gimnasio..." />
                                <?php $__errorArgs = ['servicios'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <small class="text-danger"><?php echo e($message); ?></small>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <!-- Descripción -->
                            <div class="mb-3 col-md-12">
                                <label for="descripcion" class="form-label">Descripción:</label>
                                <textarea class="form-control" id="descripcion" name="descripcion" rows="3"><?php echo e(old('descripcion')); ?></textarea>
                                <?php $__errorArgs = ['descripcion'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <small class="text-danger"><?php echo e($message); ?></small>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <!-- Imagen -->
                            <div class="mb-3 col-md-12">
                                <label for="imagen" class="form-label">Imagen del hotel:</label>
                                <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*" />
                                <?php $__errorArgs = ['imagen'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <small class="text-danger"><?php echo e($message); ?></small>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <a href="<?php echo e(route('hoteles.index')); ?>" class="btn btn-secondary">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('template', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\gestion-paquetes - copia\resources\views/hotel/create.blade.php ENDPATH**/ ?>