<?php $__env->startSection('navBar'); ?>
    <nav class="navbar fixed-bottom bg-light border-top border-primary">
        <div class="container justify-content-center">
            <a class="btn btn-outline-primary" href="<?php echo e(route('main')); ?>">На сайт</a>
        </div>
    </nav>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<div class="container ">
     <?php echo $__env->yieldContent('content'); ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('main.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\ArtManager\resources\views/user/userLayout.blade.php ENDPATH**/ ?>