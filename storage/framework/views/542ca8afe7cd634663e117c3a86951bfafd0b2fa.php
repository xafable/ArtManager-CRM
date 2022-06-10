<?php $__env->startSection('navBar'); ?>
<?php $__env->stopSection(); ?>

    <nav class="navbar fixed-bottom bg-light border-top border-primary">
        <div class="container justify-content-center">
                    <a class="btn btn-outline-primary" href="<?php echo e(route('main')); ?>">На сайт</a>
        </div>
    </nav>

<div class="container mt-5">
     <?php echo $__env->yieldContent('dashboardContent'); ?>
</div>

<?php $__env->startSection('content'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('main.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\ArtManager\resources\views/dashboard/dashboardLayout.blade.php ENDPATH**/ ?>