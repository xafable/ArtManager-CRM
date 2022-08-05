

<?php $__env->startSection('content'); ?>

    <?php if($workObjectTypesCount > 0): ?>
        <div class="container">
            <div class="alert alert-danger" role="alert">
                Есть созданные шаблоны с данным типом статусов. Редактирование запрещено!
            </div>
        </div>
    <?php endif; ?>

    <form id="statusTypeEditForm" method="POST" action="<?php echo e(route('status.update')); ?>">

        <?php if($workObjectTypesCount > 0): ?>
            <fieldset disabled="disabled">
        <?php else: ?>
            <fieldset>
        <?php endif; ?>

        <?php echo csrf_field(); ?>
        <div id="mainContainer" class="container">
            <input hidden name="statusTypeId" value="<?php echo e($statusType->id); ?>">
            <button onclick="addFieldToStatusType()"  id="objectTypeNextButton" class="btn btn-outline-secondary" type="button" >Добавить поле</button>


            <div id="fieldStatuses" >
                <br>
                <?php $__empty_1 = true; $__currentLoopData = $statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                    <div id="fieldStatus<?php echo e($status->id); ?>" class="input-group mb-3">
                        <input param="input" hidden value="<?php echo e($status->id); ?>" name="statuses[<?php echo e($loop->index); ?>][id]">
                        <input param="input" name="statuses[<?php echo e($loop->index); ?>][title]" value="<?php echo e($status->title); ?>" type="text" class="form-control" required>
                        <button class="btn btn-danger" type="button" onClick="deleteFieldFromStatusType(this)" id="remover">Удалить</button>


                    </div>


                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                    <div  id="fieldStatus0" class="input-group mb-3">
                        <input param="input" hidden value="0" name="statuses[0][id]">
                        <input param="input" name="statuses[0][title]" value="" type="text" class="form-control" required>
                        <button class="btn btn-danger" type="button" onClick="deleteFieldFromStatusType(this)" id="remover">Удалить</button>

                    </div>

                <?php endif; ?>
            </div>

            <button  id="objectStatusUpdateButton" class="btn btn-outline-secondary" type="submit" >Сохранить</button>
            <button type="button" class="btn btn-danger" onclick="document.delForm.submit();">Удалить</button>


        </div>
                </fieldset>
    </form>

    <form name="delForm" action="<?php echo e(route('object.model.delete')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <input  name="delId" value="<?php echo e($statusType->id); ?>" type="number" hidden="hidden">
    </form>
    <br>



    <div  id="fieldTemplate" class="input-group mb-3" hidden>
        <input param="input" hidden value="0" name="statuses[_0_][id]">
        <input param="input" name="statuses[_0_][title]" value="" type="text" class="form-control" required>
        <button class="btn btn-danger" type="button" onClick="deleteFieldFromStatusType(this)" id="remover">Удалить</button>
    </div>


<?php $__env->stopSection(); ?>








<?php echo $__env->make('workLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\ArtManager-CRM\resources\views/statusTypeEdit.blade.php ENDPATH**/ ?>