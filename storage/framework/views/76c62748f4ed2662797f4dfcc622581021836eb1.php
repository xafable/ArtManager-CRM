<?php $__env->startSection('content'); ?>


    <div class="container">

        <p>
            <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                Добавить
            </button>
        </p>
        <div class="collapse mb-3" id="collapseExample">
            <form action="<?php echo e(route('status.insert')); ?>" method="POST" id="workObjectTypeCreateForm">
                <?php echo csrf_field(); ?>
                <div class="card card-body">
                    <div class="input-group mb-3">
                        <input required name="title" type="text" class="form-control" placeholder="Имя объекта" aria-describedby="button-addon2">
                        <button id="objectTypeNextButton" class="btn btn-outline-secondary" type="submit" >Далее</button>
                    </div>
                </div>
            </form>
        </div>

        <?php $__currentLoopData = $statusTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $statusType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="card text-dark bg-light mb-3" style="width: 100%;">
                <div class="card-header"><?php echo e($statusType->title); ?></div>
                <div class="card-body">
                    <h5 class="card-title"></h5>
                    <button onclick="location.href ='<?php echo e(route('status.edit',$statusType->id)); ?>'" id="objectTypeEditButton" class="btn btn-outline-secondary" type="button" >Редактировать</button>

                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


    </div>


<?php $__env->stopSection(); ?>


<?php echo $__env->make('workLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\ArtManager\resources\views/statusTypeShow.blade.php ENDPATH**/ ?>