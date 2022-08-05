





<?php $__env->startSection('adminContent'); ?>


    <div class="container">
        <h1><span class="badge bg-secondary"></span></h1>
        <span class="badge bg-primary"></span>



        <div class="card text-left shadow-sm">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">

                    <li class="nav-item">
                        <a class="nav-link <?php echo e(request()->routeIs('admin.generalOptions') ? 'active' : ''); ?> " href="<?php echo e(route('admin.generalOptions',$roleId)); ?>">Общее</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo e(request()->routeIs('admin.roleWOTypeShow') || request()->routeIs('admin.roleWOTypeOptions') ? 'active' : ''); ?>" href="<?php echo e(route('admin.roleWOTypeShow',$roleId)); ?>">Шаблоны</a>
                    </li>

                </ul>
            </div>

            <div class="card-body">


                <?php echo $__env->yieldContent('options'); ?>

            </div>
        </div>
    </div>










<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.adminLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\ArtManager-CRM\resources\views/admin/roleOptionsLayout.blade.php ENDPATH**/ ?>