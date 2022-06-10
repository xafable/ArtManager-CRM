




<?php $__env->startSection('options'); ?>


        <div class="container">
        <button class="btn btn-warning" type="submit" onclick="rWoTypeOptSelectAllFields()">Показывать все поля</button>
        <input hidden name="workObjectTypeId" value="<?php echo e($workObjectType->id); ?>">
        <input hidden name="updateAllFields" value="1">
        <input hidden name="roleId" value="<?php echo e($roleId); ?>">
        </div>
        <br>



    <form  method="POST" action="<?php echo e(route('admin.updateRoleWOTypeOptions')); ?>">
        <?php echo csrf_field(); ?>


        <div id="mainContainer" class="container">
            <input hidden name="workObjectTypeId" value="<?php echo e($workObjectType->id); ?>">
            <input hidden name="roleId" value="<?php echo e($roleId); ?>">

            <div  class="form-check form-switch">
                <input hidden name="showTypeObjects" value="0">
                <input name="showTypeObjects" value="1" class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" <?php echo e($isGrantedObjectsWoType ? 'checked' : ''); ?>>
                <label class="form-check-label" for="flexSwitchCheckChecked">Просмотр объектов по этому шаблону</label>
            </div>
            <hr>

            <div id="fieldParams" >


                <?php $__currentLoopData = $typeFields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $typeField): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <div  class="input-group mb-3">
                        <input param="input" value="<?php echo e($typeField->title_ru); ?>" type="text" class="form-control"  required readonly>
                        <p>&ensp;</p>

                        <div  class="form-check form-switch">
                            <input name="fieldsIds[<?php echo e($typeField->id); ?>]" value="0" hidden  >
                            <input data-field="1" name="fieldsIds[<?php echo e($typeField->id); ?>]" value="1" class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" <?php echo e($grantedFields->contains($typeField->id) ? 'checked' : ''); ?>>
                            <label class="form-check-label" for="flexSwitchCheckChecked">Показывать</label>
                        </div>


                    </div>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
            <button  id="objectTypeUpdateButton" class="btn btn-outline-secondary" type="submit" >Сохранить</button>


        </div>
    </form>





<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.roleOptionsLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\ArtManager\resources\views/admin/roleWorkObjectTypeOptions.blade.php ENDPATH**/ ?>