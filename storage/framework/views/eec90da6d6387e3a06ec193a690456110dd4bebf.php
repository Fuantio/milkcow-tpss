<?php if(isset( Auth::user()->name )): ?>


<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><?php echo e(__('Registrar producción.')); ?></div>

                <div class="card-body">
                <form method="POST" action="<?php echo e(url('/')); ?>/produccion">

<?php echo csrf_field(); ?>

<div class="form-group row">
    <label for="vaca" class="col-md-4 col-form-label text-md-right"><?php echo e(__('VACA')); ?></label>
        <div class="col-md-6"> 
    <select name="vaca" id="vaca" class="form-control <?php $__errorArgs = ['vaca'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
        
        <option value="">Selecione una...</option>

        <?php $__currentLoopData = $vacas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vaca): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    
        <option value="<?php echo e($vaca['Id_animal']); ?>"><?php echo e($vaca['nombre']); ?></option>
        
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
    </select>
        <?php $__errorArgs = ['vaca'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <span class="invalid-feedback" role="alert">
                    <strong><?php echo e($message); ?></strong>
            </span>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>
</div>


<div class="form-group row">
    <label for="cantidad" class="col-md-4 col-form-label text-md-right"><?php echo e(__('CANTIDAD(Litros)')); ?></label>
        <div class="col-md-6"> 
        <input id="cantidad" type="number" class="form-control <?php $__errorArgs = ['cantidad'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="cantidad" value="" require autocomplete="cantidad" autofocus>

        <?php $__errorArgs = ['cantidad'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <span class="invalid-feedback" role="alert">
                    <strong><?php echo e($message); ?></strong>
            </span>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>
</div>

<div class="form-group row">
    <label for="responsable" class="col-md-4 col-form-label text-md-right"><?php echo e(__('RESPONSABLE')); ?></label>
        <div class="col-md-6"> 
        <select name="responsable" id="responsable" class="form-control <?php $__errorArgs = ['responsable'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">

        <option value="">Selecione uno/a...</option>

        <?php $__currentLoopData = $usuarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usuario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <option value="<?php echo e($usuario['id']); ?>"><?php echo e($usuario['name']); ?></option>
       
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
    </select>
        <?php $__errorArgs = ['responsable'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <span class="invalid-feedback" role="alert">
                    <strong><?php echo e($message); ?></strong>
            </span>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>
</div>

<div class="form-group row">
    <label for="jornada" class="col-md-4 col-form-label text-md-right"><?php echo e(__('JORNADA')); ?></label>
        <div class="col-md-6"> 
        <select name="jornada" id="jornada" class="form-control <?php $__errorArgs = ['jornada'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
        <option value="">Selecione una...</option>
        <option value="mañana">mañana</option>
        <option value="tarde">tarde</option>
        </select>
        <?php $__errorArgs = ['jornada'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <span class="invalid-feedback" role="alert">
                    <strong><?php echo e($message); ?></strong>
            </span>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>
</div>

<div class="form-group row">
    <label for="fecha" class="col-md-4 col-form-label text-md-right"><?php echo e(__('FECHA')); ?></label>
        <div class="col-md-6"> 
        <input id="fecha" type="date" class="form-control <?php $__errorArgs = ['fecha'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="fecha" value="" require autocomplete="fecha" autofocus>

        <?php $__errorArgs = ['fecha'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <span class="invalid-feedback" role="alert">
                    <strong><?php echo e($message); ?></strong>
            </span>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>
</div>

<div class="form-group row mb-0">
    <div class="col-md-6 offset-md-4">
        <button type="submit" class="btn btn-primary">
            <?php echo e(__('Agregar')); ?>

        </button>

    </div>
</div>
</form>


                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php endif; ?> 
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\frontend\milkcow-tpss\resources\views/paginas/produccionAgregar.blade.php ENDPATH**/ ?>