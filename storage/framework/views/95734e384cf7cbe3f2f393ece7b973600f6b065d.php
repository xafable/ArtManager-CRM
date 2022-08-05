




<?php $__env->startSection('content'); ?>


    <div class="container">
        <h1><span class="badge bg-secondary"><?php echo e($workObject->title); ?></span></h1>
        <span class="badge bg-primary"><?php echo e($workObject->type->title); ?></span>




    <div class="card text-left shadow-sm mt-1">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item">
                    <a class="nav-link <?php echo e(request()->routeIs('object.edit') ? 'active' : ''); ?>" href="<?php echo e(route('object.edit',$workObject->id)); ?>">Объект</a>
                </li>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view additionalAttribute')): ?>
                    <li class="nav-item">
                        <a class="nav-link <?php echo e((request()->routeIs('object.additionalAttributes')) ? 'active' : ''); ?>" href="<?php echo e(route('object.additionalAttributes',$workObject->id)); ?>">Доп атрибуты</a>
                    </li>
                <?php endif; ?>

                <li class="nav-item">
                    <a class="nav-link <?php echo e((request()->routeIs('object.comments')) ? 'active' : ''); ?>" href="<?php echo e(route('object.comments',$workObject->id)); ?>">Заметки</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo e((request()->routeIs('object.files')) ? 'active' : ''); ?>" href="<?php echo e(route('object.files',$workObject->id)); ?>">Вложения</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo e((request()->routeIs('object.history')) ? 'active' : ''); ?>" href="<?php echo e(route('object.history',$workObject->id)); ?>">История</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo e((request()->routeIs('object.tasks')) ? 'active' : ''); ?>" href="<?php echo e(route('object.tasks',$workObject->id)); ?>">Задачи</a>
                </li>
            </ul>
        </div>

        <div class="card-body" >

            <?php echo $__env->yieldContent('workObjectSection'); ?>




        </div>

    </div>

    </div>












<?php $__env->stopSection(); ?>

<?php echo $__env->make('workLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\ArtManager-CRM\resources\views/main/workObjectLayot.blade.php ENDPATH**/ ?>