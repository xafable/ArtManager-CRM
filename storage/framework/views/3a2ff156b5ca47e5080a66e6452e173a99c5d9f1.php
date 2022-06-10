<?php $__env->startSection('adminContent'); ?>

    <form class="" id="enumEditForm" method="POST" action="<?php echo e(route('admin.updateEnum')); ?>">
        <?php echo csrf_field(); ?>
        <div id="mainContainer" class="container">
            <input hidden name="enumId" value="<?php echo e($enumId); ?>">
            <button onclick="addFieldToEnumEdit()"  id="objectTypeNextButton" class="btn btn-outline-secondary" type="button" >Добавить поле</button>

            <div class="mt-4" id="fieldEnums" >
                <?php $__empty_1 = true; $__currentLoopData = $enumData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                    <div class="input-group mb-3" id="enumField<?php echo e($e->id); ?>">
                        <input param="input" hidden value="<?php echo e($e->id); ?>" name="enum[<?php echo e($loop->index); ?>][id]">
                        <input param="input" name="enum[<?php echo e($loop->index); ?>][value]" value="<?php echo e($e->value); ?>" type="text" class="form-control" required>
                        <button class="btn btn-danger" type="button" onClick="deleteFieldFromEnumEdit(this)" id="remover">Удалить</button>


                    </div>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="input-group mb-3" id="enumField0">
                        <input param="input" hidden value="0" name="enum[0][id]">
                        <input param="input" name="enum[0][value]" value="" type="text" class="form-control" required>
                        <button class="btn btn-danger" type="button" onClick="deleteFieldFromEnumEdit(this)" id="remover">Удалить</button>
                    </div>
                <?php endif; ?>
            </div>

            <button  id="enumUpdateButton" class="btn btn-outline-secondary" type="submit" >Сохранить</button>
        </div>
    </form>




    <div id="enumTemplate" class="input-group mb-3" hidden>
        <input param="input" hidden value="0" name="enum[_0_][id]">
        <input param="input" name="enum[_0_][value]" value="" type="text" class="form-control" required>
        <button class="btn btn-danger" type="button" onClick="deleteFieldFromEnumEdit(this)" id="remover">Удалить</button>
    </div>




<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.adminLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\ArtManager\resources\views/admin/enumEdit.blade.php ENDPATH**/ ?>