<?php $__env->startSection('content'); ?>

    <div class="container mt-5">
<form action="<?php echo e(route('auth.auth')); ?>" method="POST" class="col s12">


            <div class="input-group mb-3">
                <input required name="name" type="text" class="form-control" placeholder="Логин" aria-label="Username" aria-describedby="basic-addon1">
            </div>

            <div class="input-group mb-3">
                <input required name="password" type="password" class="form-control" placeholder="Пароль" aria-label="Password" aria-describedby="basic-addon1">
            </div>

            <?php echo csrf_field(); ?>

            <button class="btn btn-outline-primary" type="submit" name="action">
               Войти
            </button>

            <a class="btn btn-outline-danger" href="<?php echo e(route('google.auth')); ?>" class="link-danger">Google</a>
           <a class="btn btn-primary" href="<?php echo e(route('auth.create')); ?>" class="link-danger">Регистрация</a>

</form>
    </div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('main.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\ArtManager\resources\views/auth/login.blade.php ENDPATH**/ ?>