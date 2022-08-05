<?php $__env->startSection('workObjectSection'); ?>





    <div class="container" >

        <form method="POST" action="<?php echo e(route('object.updateStatus')); ?>">
            <?php echo csrf_field(); ?>
            <input name="workObjectId" type="text" value="<?php echo e($workObject->id); ?>" hidden>
            <select onchange="this.form.submit()" name="statusId" class="form-select" aria-label="Default select example">
        <?php $__currentLoopData = $statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($status->status_id); ?>" <?php echo e($workObject->status_id == $status->status_id ? 'selected' : ''); ?>><?php echo e($status->title); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
        </form>

    <hr>



    <?php if(Route::is('object.edit') ): ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update workObject')): ?>

                <button onclick="enableEditWorkObject(this)" type="submit" class="btn btn-outline-primary">Редактировать</button>

        <?php endif; ?>
    <?php endif; ?>

    </div>




    <fieldset id="workObjectFieldset" >

    <div class="container mt-4" >
        <form id="workObjectEditForm" method="POST" action="<?php echo e(route('object.update')); ?>">
            <input name="workObject_id" type="text" value="<?php echo e($workObject->id); ?>" hidden>
            <?php echo csrf_field(); ?>

    <?php $__currentLoopData = $attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view field'.$attribute->type_field_id)): ?>

        <div class="input-group mb-3 ">
            <span class="input-group-text" id="basic-addon1"><?php echo e($attribute->title_ru); ?></span>
            <input name="attribute_id[]" type="text" value="<?php echo e($attribute->id); ?>" hidden>

            <?php if($attribute->format == 'string'): ?>
                <input disabled data-attribute name="value[<?php echo e($attribute->id); ?>]" type="text" value="<?php echo e($attribute->getValue()); ?>" class="form-control"  aria-describedby="basic-addon1">
            <?php elseif($attribute->format == 'integer'): ?>
                <input disabled data-attribute name="value[<?php echo e($attribute->id); ?>]" type="number" value="<?php echo e($attribute->getValue()); ?>" class="form-control"  aria-describedby="basic-addon1">
            <?php elseif($attribute->format == 'date'): ?>
                <input disabled data-attribute name="value[<?php echo e($attribute->id); ?>]" type="date" value="<?php echo e($attribute->getHtmlDate()); ?>" class="form-control"  aria-describedby="basic-addon1">
            <?php elseif($attribute->format == 'coordinates'): ?>
                <input disabled data-attribute name="value[<?php echo e($attribute->id); ?>]" type="text" value="<?php echo e($attribute->getValue()); ?>" class="form-control"  aria-describedby="basic-addon1">

                <a target="_blank" rel="noopener noreferrer" id="coordinateButton" class="btn btn-outline-primary" href="https://maps.google.com?q=<?php echo e($attribute->getValue()); ?>" role="button">Карта</a>
            <?php elseif($attribute->format == 'boolean'): ?>
                <input  data-attribute value="0" name="value[<?php echo e($attribute->id); ?>]" type="number" hidden>

                <div class="form-check form-switch px-5 mt-1">

                    <input disabled data-attribute <?php echo e($attribute->getValue() == 1 ? 'checked' : ''); ?>  value="1" name="value[<?php echo e($attribute->id); ?>]" class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">

                </div>
            <?php elseif($attribute->format == 'enum'): ?>
                <select disabled data-attribute name="value[<?php echo e($attribute->id); ?>]" class="form-select" aria-label="Default select example">
                    <?php $__currentLoopData = $enumerationsData[$attribute->enumeration_id]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $enum): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($enum->value); ?>" <?php echo e($attribute->getValue() == $enum->value ? 'selected' : ''); ?>><?php echo e($enum->value); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>

            <?php endif; ?>

        </div>
                <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <div class="input-group">
                <span class="input-group-text">Описание</span>
                <textarea disabled data-attribute name="description" class="form-control" aria-label="With textarea"><?php echo e($workObject->description); ?></textarea>
            </div>

            <br>








        </form>
        <button hidden id="objectUpdateButton" onclick="submitWorkObject()" class="btn btn-primary">Сохранить</button>


        <!-- Button trigger modal -->
        <button hidden id="objectDeleteButton" type="button" class="btn btn-danger"  data-bs-toggle="modal" data-bs-target="#exampleModal">
            Удалить
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                       Подтвердите удаление
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
                        <button onclick="document.delForm.submit();" type="submit" class="btn btn-danger">Удалить</button>
                    </div>
                </div>
            </div>
        </div>


    </div>

        <div class="d-flex justify-content-end">
            <form name="delForm" method="POST" action="<?php echo e(route('object.delete')); ?>">
                <?php echo csrf_field(); ?>
                <input name="workObject_id" value="<?php echo e($workObject->id); ?>" hidden>
            </form>
        </div>
    </fieldset>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('main.workObjectLayot', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\ArtManager-CRM\resources\views/workObjectEdit.blade.php ENDPATH**/ ?>