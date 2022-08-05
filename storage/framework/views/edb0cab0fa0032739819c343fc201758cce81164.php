

<?php $__env->startSection('workObjectSection'); ?>


    <div class="container" style="margin-top: 10px;">


        <?php $__currentLoopData = $histories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $history): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="card" style="margin-top: 10px;">
                <div class="card-body">
                  <?php echo e($users[$history->user_id]); ?> : <?php echo e($history->objectAction); ?> <?php echo e($history->objectData); ?> <?php echo e($history->newValue); ?>

                </div>
            </div>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('main.workObjectLayot', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\ArtManager-CRM\resources\views/workObjectHistory.blade.php ENDPATH**/ ?>