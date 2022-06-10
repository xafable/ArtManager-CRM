<?php $__env->startSection('content'); ?>
<div class="container py-5 mt-2 " >
    <div class="container mb-2">
        <?php echo $__env->yieldContent('adminContent'); ?>
    </div>
</div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('navBar'); ?>
    <nav class="navbar fixed-bottom bg-light border-top border-primary" >
        <div class="container justify-content-center">

            <ul class="nav nav-pills card-header-pills">


                <li class="nav-item">
                    <a class="btn btn-outline-primary" href="<?php echo e(route('main')); ?>">На сайт</a>
                </li>

                <li class="nav-item px-2">
                    <a class="btn btn-primary btn-mg" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
                        Меню
                    </a>
                </li>

            </ul>
        </div>
    </nav>

    <div class="offcanvas offcanvas-bottom" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasExampleLabel">Меню</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="nav nav-pills card-header-pills">
                <li class="nav-item">
                    <a class="nav-link  <?php echo e(request()->routeIs('admin.users') ? 'active' : ''); ?>" href="<?php echo e(route('admin.users')); ?>">Пользователи</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo e(request()->routeIs('admin.roles') ? 'active' : ''); ?>" href="<?php echo e(route('admin.roles')); ?>">Роли</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo e(request()->routeIs('admin.searchSettings') ? 'active' : ''); ?>" aria-current="page" href="<?php echo e(route('admin.searchSettings')); ?>">Настройки поиска</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo e(request()->routeIs('admin.enumsSettings') ? 'active' : ''); ?>" href="<?php echo e(route('admin.enumsSettings')); ?>">Настройки перечислений</a>
                </li>
            </ul>
        </div>
    </div>
<?php $__env->stopSection(); ?>






<?php echo $__env->make('main.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\ArtManager\resources\views/admin/adminLayout.blade.php ENDPATH**/ ?>