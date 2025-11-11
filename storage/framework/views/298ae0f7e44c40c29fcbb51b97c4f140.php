
<?php $__env->startSection('title', 'Crear cliente'); ?>
<?php $__env->startPush('css'); ?>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <main class="app-main">
        <div class="app-content-header">
            <!--begin::Container-->
            <div class="container-fluid">
                <!--begin::Row-->
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0">Editar cliente</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href=" <?php echo e(route('panel.index')); ?>">Inicio</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo e(route('clientes.index')); ?>">Clientes</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Editar</li>
                        </ol>
                    </div>
                </div>
                <!--end::Row-->
            </div>
            <!--end::Container-->
        </div>
        <div class="app-content">
            <div class="card card-primary card-outline mb-4">
                <!--begin::Form-->
                <form action="<?php echo e(route('clientes.update', $cliente->id)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PATCH'); ?>
                    <!--begin::Body-->
                    <div class="card-body">
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="nombres" class="form-label">Nombres:</label>
                                <input type="text" class="form-control" id="nombres" name="nombres"
                                    value="<?php echo e(old('nombres', $cliente->nombres)); ?>" />
                                <?php $__errorArgs = ['nombres'];
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
                            <div class="mb-3 col-md-6">
                                <label for="apellidos" class="form-label">Apellidos:</label>
                                <input type="text" class="form-control" id="apellidos" name="apellidos"
                                    value="<?php echo e(old('apellidos', $cliente->apellidos)); ?>" />
                                <?php $__errorArgs = ['apellidos'];
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
                            <div class="mb-3 col-md-6">
                                <label for="tipo_documento" class="form-label">Tipo de documento:</label>
                                <select class="form-select" id="tipo_documento" name="tipo_documento">
                                    <option value="" disabled
                                        <?php echo e(old('tipo_documento', $cliente->tipo_documento) === null ? 'selected' : ''); ?>>
                                        Seleccione una opción</option>

                                    <option value="dni"
                                        <?php echo e(old('tipo_documento', $cliente->tipo_documento) === 'dni' ? 'selected' : ''); ?>>
                                        DNI</option>

                                    <option value="carnet"
                                        <?php echo e(old('tipo_documento', $cliente->tipo_documento) === 'carnet' ? 'selected' : ''); ?>>
                                        Carnet de Extranjería</option>

                                    <option value="pasaporte"
                                        <?php echo e(old('tipo_documento', $cliente->tipo_documento) === 'pasaporte' ? 'selected' : ''); ?>>
                                        Pasaporte</option>

                                    <option value="ptp"
                                        <?php echo e(old('tipo_documento', $cliente->tipo_documento) === 'ptp' ? 'selected' : ''); ?>>
                                        Permiso Temporal de Permanencia (PTP)</option>

                                    <option value="otro"
                                        <?php echo e(old('tipo_documento', $cliente->tipo_documento) === 'otro' ? 'selected' : ''); ?>>
                                        Otro</option>
                                </select>

                                <?php $__errorArgs = ['tipo_documento'];
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


                            <div class="mb-3 col-md-6">
                                <label for="documento" class="form-label">Número de documento:</label>
                                <input type="text" class="form-control" id="documento" name="documento"
                                    placeholder="Ingrese el número" value="<?php echo e(old('documento', $cliente->documento)); ?>">
                                <?php $__errorArgs = ['documento'];
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

                            <!-- Campo de Correo Electrónico -->
                            <div class="mb-3 col-md-6">
                                <label for="correo" class="form-label">Correo electrónico:</label>
                                <input type="email" class="form-control" id="correo" name="correo"
                                    placeholder="ejemplo@correo.com" value="<?php echo e(old('correo', $cliente->correo)); ?>">
                                <?php $__errorArgs = ['correo'];
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

                            <!-- Campo de Teléfono -->
                            <div class="mb-3 col-md-6">
                                <label for="telefono" class="form-label">Teléfono:</label>
                                <input type="tel" class="form-control" id="telefono" name="telefono"
                                    placeholder="Ej: +51 987654321" pattern="^\+?\d{7,15}$"
                                    value="<?php echo e(old('telefono', $cliente->telefono)); ?>">
                                <?php $__errorArgs = ['telefono'];
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

                            <!-- Campo de Nacionalidad -->
                            <div class="mb-3 col-md-6">
                                <label for="nacionalidad" class="form-label">Nacionalidad:</label>
                                <input type="text" class="form-control" id="nacionalidad" name="nacionalidad"
                                    placeholder="Ej: Peruana, Argentina, etc." value="<?php echo e(old('nacionalidad', $cliente->nacionalidad)); ?>">
                                <?php $__errorArgs = ['nacionalidad'];
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
                    <!--end::Body-->
                    <!--begin::Footer-->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                    <!--end::Footer-->
                </form>
                <!--end::Form-->
            </div>
        </div>
    </main>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('template', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\gestion-paquetes - copia\resources\views/cliente/edit.blade.php ENDPATH**/ ?>