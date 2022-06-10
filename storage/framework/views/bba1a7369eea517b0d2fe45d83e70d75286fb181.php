




<?php $__env->startSection('options'); ?>


    <div class="container">


        <?php $__currentLoopData = $workObjectTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $workObjectType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="card text-dark bg-light mb-3" style="width: 100%;">
                <div class="card-header"><?php echo e($workObjectType->title); ?></div>
                <div class="card-body">
                    <h5 class="card-title"></h5>
                    <button onclick="location.href = '<?php echo e(route('admin.roleWOTypeOptions',[$roleId,$workObjectType->id])); ?>'" id="objectTypeEditButton" class="btn btn-outline-secondary" type="button" >Редактировать</button>

                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


    </div>





<?php $__env->stopSection(); ?>




<?php echo $__env->make('admin.roleOptionsLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\ArtManager\resources\views/admin/roleWorkObjectTypeShow.blade.php ENDPATH**/ ?>