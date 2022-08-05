

<?php $__env->startSection('content'); ?>


<div class="container">

    <p>
        <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
            Добавить шаблон
        </button>
    </p>
    <div class="collapse" id="collapseExample">
        <form action="<?php echo e(route('object.model.insert')); ?>" method="POST" id="workObjectTypeCreateForm">
            <?php echo csrf_field(); ?>
        <div class="card card-body">
            <div class="input-group mb-3">
                <input required name="title" type="text" class="form-control" placeholder="Имя" aria-describedby="button-addon2">
                <button id="objectTypeNextButton" class="btn btn-outline-secondary" type="submit" >Далее</button>
            </div>
        </div>
        </form>
    </div>
    <br>

    <?php $__currentLoopData = $workObjectTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $workObjectType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="card text-dark bg-light mb-3">
            <div class="card-header"><?php echo e($workObjectType->title); ?></div>
            <div class="card-body">
                <h5 class="card-title"></h5>
                <button onclick="location.href = '<?php echo e(route('object.model.edit',$workObjectType->id)); ?>'" id="objectTypeEditButton" class="btn btn-outline-secondary" type="button" >Редактировать</button>

            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


</div>


<?php $__env->stopSection(); ?>




<?php echo $__env->make('workLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\ArtManager-CRM\resources\views/workObjectTypeShow.blade.php ENDPATH**/ ?>