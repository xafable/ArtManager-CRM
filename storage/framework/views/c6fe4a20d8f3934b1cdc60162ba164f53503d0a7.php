<?php $__env->startSection('content'); ?>

            <div class="container py-5" >
                <?php $__empty_1 = true; $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                    <div class="card text-dark bg-light mb-3" >
                        <div class="card-header">
                            <?php echo e($task->title); ?>

                            <span class="badge bg-primary"> <?php echo e($task->workObject->title ?? 'без объекта'); ?></span>
                        </div>
                        <div class="card-body" >
                            <h5 class="card-title"></h5>
                            <p class="card-text"><?php echo e($task->description); ?></p>
                            <button onclick="location.href = '<?php echo e(route('task.edit',$task->id)); ?>'" id="objectTypeEditButton" class="btn btn-outline-secondary" type="button" >К задаче</button>
                        </div>
                    </div>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                <?php endif; ?>
            </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.userLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\ArtManager\resources\views/user/userTasks.blade.php ENDPATH**/ ?>