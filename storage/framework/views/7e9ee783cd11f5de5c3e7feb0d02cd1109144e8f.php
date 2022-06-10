<?php $__env->startSection('content'); ?>


    <div class="container mt-2">

        <form action=<?php echo e(route('task.update',$task->id)); ?> method="post"  style="margin-top: 20px;">
            <?php echo csrf_field(); ?>
        <div class="container mt-5">

            Статус
            <select name="status_id" class="form-select mb-3" id="inlineFormCustomSelectPref">
                <option value="<?php echo e($self_status->id); ?>" selected><?php echo e($self_status->title); ?></option>
                <?php $__currentLoopData = $statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($status->id); ?>"><?php echo e($status->title); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>

            <div class="row mt-2 mb-3">
                <div class="col">
                     Начало
                     <input value="<?php echo e($task->getHtmlStartDate()); ?>" name="start_date" type="date" class="form-control" >
                </div>
                <div class="col">
                     Конец
                    <input value="<?php echo e($task->getHtmlFinishDate()); ?>" name="finish_date" type="date" class="form-control" >
                </div>
            </div>

            Исполнители
            <select class="js-example-basic-multiple" name="performers[]" multiple="multiple" style="width: 100%;">
                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option id="<?php echo e($user->id); ?>" value="<?php echo e($user->id); ?>" ><?php echo e($user->fio); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php $__empty_1 = true; $__currentLoopData = $performers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $performer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <option selected="selected" id="<?php echo e($performer->id); ?>" value="<?php echo e($performer->id); ?>"><?php echo e($performer->fio); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <?php endif; ?>

            </select>


            <div class="row mt-3">
                <textarea name = "task_description" class="form-control" id="ex1" rows="3" ><?php echo e($task->description); ?></textarea>
            </div>
        </div>
            <button type="submit" class="btn btn-outline-success mt-3">Сохранить</button>

        </form>



    </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('main.workObjectLayot', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\ArtManager\resources\views/workObjectTaskEdit.blade.php ENDPATH**/ ?>