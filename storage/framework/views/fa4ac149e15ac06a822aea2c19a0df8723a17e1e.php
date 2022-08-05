

<?php $__env->startSection('workObjectSection'); ?>


    <div class="container mt-1 mb-1">

        <p>
            <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                Добавить задачу
            </button>
        </p>
        <div class="collapse" id="collapseExample">
            <form action="<?php echo e(route('task.store')); ?>" method="POST" >
                <?php echo csrf_field(); ?>
                <div class="card card-body">
                    <div class="input-group mb-3">
                        <input hidden name = "work_object_id" value="<?php echo e($workObject->id); ?>" type="text">
                        <input required name="title" type="text" class="form-control" placeholder="Имя" aria-describedby="button-addon2">
                        <button id="objectTypeNextButton" class="btn btn-outline-secondary" type="submit" >Далее</button>
                    </div>
                </div>
            </form>
        </div>



        <div class="mt-2">
            <?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="card border-secondary mb-3" >
                    <div class="card-header">
                        <?php echo e($task->title); ?>

                        <?php switch($task->status_id):
                            case (1): ?>
                            <span class="badge bg-primary"> <?php echo e($taskStatuses->firstWhere('id', $task->status_id)->title); ?></span>
                            <?php break; ?>
                            <?php case (2): ?>
                            <span class="badge bg-warning"> <?php echo e($taskStatuses->firstWhere('id', $task->status_id)->title); ?></span>
                            <?php break; ?>
                            <?php case (3): ?>
                            <span class="badge bg-success"> <?php echo e($taskStatuses->firstWhere('id', $task->status_id)->title); ?></span>
                            <?php break; ?>
                            <?php case (4): ?>
                            <span class="badge bg-secondary"> <?php echo e($taskStatuses->firstWhere('id', $task->status_id)->title); ?></span>
                            <?php break; ?>
                            <?php case (5): ?>
                            <span class="badge bg-success"> <?php echo e($taskStatuses->firstWhere('id', $task->status_id)->title); ?></span>
                            <?php break; ?>
                            <?php default: ?>
                            <span class="badge bg-dark"> <?php echo e($taskStatuses->firstWhere('id', $task->status_id)->title); ?></span>
                        <?php endswitch; ?>

                    </div>
                    <div class="card-body" >
                        <h5 class="card-title"></h5>
                        <p class="card-text"><?php echo e($task->description); ?></p>
                        <button onclick="location.href = '<?php echo e(route('task.edit',$task->id)); ?>'" id="objectTypeEditButton" class="btn btn-outline-secondary" type="button" >К задаче</button>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

    </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('main.workObjectLayot', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\ArtManager-CRM\resources\views/workObjectTasks.blade.php ENDPATH**/ ?>