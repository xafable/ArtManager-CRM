<?php $__env->startSection('content'); ?>

    <?php if($workObjectsCount > 0): ?>
        <div class="container">
            <div class="alert alert-danger" role="alert">
                Есть созданные объекты по шаблону. Редактирование запрещено!
            </div>
        </div>
    <?php endif; ?>

    <form id="workObjectTypeEditForm" method="POST" action="<?php echo e(route('object.model.update')); ?>">
        <?php if($workObjectsCount > 0): ?>
            <fieldset  disabled="disabled">
                <?php else: ?>
                    <fieldset >
                        <?php endif; ?>

                        <?php echo csrf_field(); ?>
                        <div id="mainContainer" class="container">
                            <input hidden name="workObjectTypeId" value="<?php echo e($workObjectType->id); ?>">
                            <button onclick="addFieldToWorkObjectType(this)"  id="objectTypeNextButton" class="btn btn-outline-secondary" type="button" >Добавить поле</button>
                            <br>

                            <div id="fieldParams">

                                <br>

                                <select param="select" name="statusType" class="form-select" id="inputGroupSelect01" required>
                                    <?php $__currentLoopData = $statusTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $statusType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($statusType->id); ?>" <?php echo e($statusType->id==$typeSettings->status_type_id ? 'selected' : ''); ?>><?php echo e($statusType->title); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <hr>

                                <?php $__empty_1 = true; $__currentLoopData = $typeFields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $typeField): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                                    <div class="shadow p-3 mb-5 bg-body rounded mt-2" id="fieldParam<?php echo e($typeField->id); ?>" >

                                        <div class="row">

                                            <div class="col">
                                                <input   name="fieldParams[<?php echo e($loop->index); ?>][title]" value="<?php echo e($typeField->title_ru); ?>" type="text" class="form-control"  required >
                                            </div>
                                            <div class="col">
                                                <input   name="fieldParams[<?php echo e($loop->index); ?>][quantity]" value="<?php echo e($typeField->pivot->fields_quantity); ?>" type="number" class="form-control" id="exampleFormControlInput1" placeholder="Количество">
                                            </div>

                                        </div>


                                        <div class="row align-items-center mt-3">
                                            <div class="col">
                                                <select data-typeFieldId="fieldParam<?php echo e($typeField->id); ?>" id="fieldFormatSelector" onchange="fieldFormatOnChange(this)" param="select" name="fieldParams[<?php echo e($loop->index); ?>][field_format]" class="form-select"  required>
                                                    <?php $__currentLoopData = $fieldFormats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fieldFormat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($fieldFormat->format); ?>" <?php echo e($fieldFormat->format==$typeField->format ? 'selected' : ''); ?>><?php echo e($fieldFormat->title); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>



                                            <div class="col ">
                                                <div  class="form-check form-switch" style="margin-right: 30px;">
                                                    <input <?php echo e($typeField->required == 1 ? 'checked' : ''); ?> param="input" name="fieldParams[<?php echo e($loop->index); ?>][required]" value="1"  class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                                    <label class="form-check-label" for="flexSwitchCheckDefault">Обьязательное</label>
                                                </div>
                                            </div>



                                        </div>

                                        <div class="row align-items-center mt-3">
                                            <div class="col">
                                                <select id="enumSelector"  param="select" name="fieldParams[<?php echo e($loop->index); ?>][enumeration_id]" class="form-select" style="<?php echo e($typeField->format == 'enum' ? '' : 'visibility:hidden;'); ?>"  >
                                                    <?php $__currentLoopData = $enumerations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $enumeration): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($enumeration->id); ?>" <?php echo e($enumeration->id==$typeField->enumeration_id ? 'selected' : ''); ?>><?php echo e($enumeration->title); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>

                                        <br>
                                        <button class="btn btn-danger" type="button" onClick="deleteFieldFromWorkObjectType(this)" id="remover">Удалить</button>

                                        <input hidden value="<?php echo e($typeField->id); ?>" name="fieldParams[<?php echo e($loop->index); ?>][id]">

                                    </div>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                                    <div class=" shadow p-3 mb-5 bg-body rounded mt-2" id="fieldParam_" >

                                        <div class="row">

                                            <div class="col">
                                                <input  name="fieldParams[0][title]" value="" type="text" class="form-control"  required placeholder="Имя">
                                            </div>
                                            <div class="col">
                                                <input name="fieldParams[0][quantity]" value="1" type="number" class="form-control" id="exampleFormControlInput1" placeholder="Количество">
                                            </div>

                                        </div>


                                        <div class="row align-items-center mt-3">
                                            <div class="col">
                                                <select data-typeFieldId="fieldParam_" id="fieldFormatSelector" onchange="fieldFormatOnChange(this)" param="select" name="fieldParams[0][field_format]" class="form-select"  required>
                                                    <?php $__currentLoopData = $fieldFormats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fieldFormat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($fieldFormat->format); ?>" selected><?php echo e($fieldFormat->title); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>



                                            <div class="col ">
                                                <div  class="form-check form-switch" style="margin-right: 30px;">
                                                    <input  param="input" name="fieldParams[0][required]" value="1" class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                                    <label class="form-check-label" for="flexSwitchCheckDefault">Обьязательное</label>
                                                </div>
                                            </div>



                                        </div>

                                        <div class="row align-items-center mt-3">
                                            <div class="col">
                                                <select id="enumSelector" param="select" name="fieldParams[0][enumeration_id]" class="form-select"  >
                                                    <?php $__currentLoopData = $enumerations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $enumeration): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($enumeration->id); ?>" selected><?php echo e($enumeration->title); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>

                                        <br>
                                        <button class="btn btn-danger" type="button" onClick="deleteFieldFromWorkObjectType(this)" id="remover">Удалить</button>

                                        <input hidden value="0" name="fieldParams[0][id]">

                                    </div>

                                <?php endif; ?>

                            </div>

                            <hr>
                            <button  id="objectTypeUpdateButton" class="btn btn-outline-secondary" type="submit" >Сохранить</button>

                            <button type="button" class="btn btn-danger" onclick="document.delForm.submit();">Удалить</button>



                        </div>
                    </fieldset>
    </form>
    <br>

    <form name="delForm" action="<?php echo e(route('object.model.delete')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <input  name="delId" value="<?php echo e($workObjectType->id); ?>" type="number" hidden="hidden">
    </form>




    <div class=" shadow p-3 mb-5 bg-body rounded mt-2" id="paramTemplate" hidden>

        <div class="row">

            <div class="col">
                <input  name="fieldParams[_0_][title]" value="" type="text" class="form-control"  required placeholder="Имя">
            </div>
            <div class="col">
                <input  name="fieldParams[_0_][quantity]" value="1" type="number" class="form-control" id="exampleFormControlInput1" placeholder="Количество">
            </div>

        </div>


        <div class="row align-items-center mt-3">
            <div class="col">
                <select data-typeFieldId="fieldParam_0_" id="fieldFormatSelector" onchange="fieldFormatOnChange(this)" param="select" name="fieldParams[_0_][field_format]" class="form-select"  required>
                    <?php $__currentLoopData = $fieldFormats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fieldFormat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($fieldFormat->id); ?>" selected><?php echo e($fieldFormat->title); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>



            <div class="col ">
                <div  class="form-check form-switch" >
                    <input  param="input" name="fieldParams[_0_][required]" value="1" class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                    <label class="form-check-label" for="flexSwitchCheckDefault">Обьязательное</label>
                </div>
            </div>



        </div>

        <div class="row align-items-center mt-3">
            <div class="col">
                <select id="enumSelector" param="select" name="fieldParams[_0_][enumeration_id]" class="form-select"  >
                    <?php $__currentLoopData = $enumerations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $enumeration): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($enumeration->id); ?>" selected><?php echo e($enumeration->title); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>

        <br>
        <button class="btn btn-danger" type="button" onClick="deleteFieldFromWorkObjectType(this)" id="remover">Удалить</button>

        <input hidden value="0" name="fieldParams[_0_][id]">

    </div>

    
<?php $__env->stopSection(); ?>








<?php echo $__env->make('workLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\ArtManager\resources\views/workObjectTypeEdit.blade.php ENDPATH**/ ?>