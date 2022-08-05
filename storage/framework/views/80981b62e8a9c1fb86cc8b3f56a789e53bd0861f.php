

<?php $__env->startSection('navBar'); ?>
<?php $__env->stopSection(); ?>




<?php $__env->startSection('content'); ?>

    <div class="container" style="margin-top: 200px;">


        <div class="row align-items-center">
            <div class="col">
            </div>
            <div class="col">
                <h1 class="display-2">Недостаточно прав </h1>
                <hr>
                <a href="<?php echo e(url()->previous()); ?>" class="btn btn-outline-secondary btn-lg"  role="button" >Назад</a>
            </div>
            <div class="col">
            </div>
        </div>

    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('main.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\ArtManager-CRM\resources\views/errors/403.blade.php ENDPATH**/ ?>