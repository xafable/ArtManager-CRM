




<?php $__env->startSection('adminContent'); ?>


    <p>
        <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
            Добавить
        </button>
    </p>
    <div class="collapse" id="collapseExample">
        <form action="<?php echo e(route('admin.enumInsert')); ?>" method="POST" id="workObjectTypeCreateForm">
            <?php echo csrf_field(); ?>
            <div class="card card-body">
                <div class="input-group mb-3">
                    <input name="title" type="text" class="form-control" placeholder="Имя объекта" aria-describedby="button-addon2">
                    <button id="objectTypeNextButton" class="btn btn-outline-secondary" type="submit" >Далее</button>
                </div>
            </div>
        </form>
    </div>

                <?php $__currentLoopData = $enums; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $enum): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <br>
                    <div class="card card-body">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo e($enum->title); ?></h5>
                            <a href="<?php echo e(route('admin.enumEdit',$enum->id)); ?>" class="btn btn-outline-secondary">Редактировать</a>
                        </div>
                    </div>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>





<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.adminLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\ArtManager-CRM\resources\views/admin/enumsSettings.blade.php ENDPATH**/ ?>