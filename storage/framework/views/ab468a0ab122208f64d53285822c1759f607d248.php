

<?php $__env->startSection('workObjectSection'); ?>


    <div class="container mt-1">

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create additionalAttribute')): ?>
        <div class="accordion mb-4" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Добавить атрибут
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div  id='fieldCreator'  >

                            <div class="row">
                                <div class="col">
                                    <input id="attributeTitle" value="" type="text" class="form-control"  required placeholder="Имя">
                                </div>
                                <div class="col">
                                    <input id="attributeQuantity" value="1" type="number" class="form-control"  placeholder="Количество">
                                </div>
                            </div>


                            <div class="row align-items-center mt-3">
                                <div class="col">
                                    <div  class="form-check form-switch">
                                        <input id="attributeNumerate" value="0" class="form-check-input" type="checkbox">
                                        <label class="form-check-label" for="flexSwitchCheckDefault">Пронумеровать поля</label>
                                    </div>
                                </div>
                            </div>
                            <br>

                            <button class="btn btn-primary" type="button" onClick="addFieldToAdditionalAttribute(this)">Добавить</button>

                        </div>                    </div>
                </div>
            </div>
        </div>

        <?php endif; ?>



            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update additionalAttribute')): ?>
            <button onclick="enableEditAdditionalAttributes(this)" type="submit" class="btn btn-outline-primary">Редактировать</button>
            <?php endif; ?>

            <fieldset id="additionalAttributesFieldset" disabled>

            <form action=<?php echo e(route('object.additionalAttributes.update')); ?> method="post" class="mt-4">
            <?php echo csrf_field(); ?>
            <input name="workObjectId" value="<?php echo e($workObject->id); ?>" hidden>
            <div id="form" class="form-group">
                <?php $__empty_1 = true; $__currentLoopData = $additionalAttributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $additionalAttribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div data-oldAttribute class="input-group mb-3 ">
                    <input value="<?php echo e($additionalAttribute->id); ?>" name="oldAttribute[<?php echo e($loop->index); ?>][id]" hidden>
                    <span  class="input-group-text" id="basic-addon1"><?php echo e($additionalAttribute->title_ru); ?></span>
                    <input value="<?php echo e($additionalAttribute->value); ?>" name="oldAttribute[<?php echo e($loop->index); ?>][value]" type="text"  class="form-control"  aria-describedby="basic-addon1">

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete additionalAttribute')): ?>
                    <button data-delete-button data-attribute-id="<?php echo e($additionalAttribute->id); ?>" class="btn btn-danger" type="button" onClick="deleteFieldFromAdditionalAttribute(this)" hidden>Удалить</button>
                    <?php endif; ?>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                <?php endif; ?>

            </div>
            <button  id="additionalAttributeUpdateButton" class="btn btn-outline-secondary" type="submit" hidden>Сохранить</button>
        </form>

            </fieldset>


        <div data-newAttribute hidden id="additionalAttributeTemplate" class="input-group mb-3 ">
            <span  class="input-group-text" id="span">Template</span>
            <input value="" id="value" type="text"  class="form-control"  aria-describedby="basic-addon1">
            <input value="" id="title" type="text" hidden="">
            <button class="btn btn-danger" type="button" onClick="deleteFieldFromAdditionalAttribute(this)" id="remover">Удалить</button>
        </div>

    </div>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('main.workObjectLayot', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\ArtManager-CRM\resources\views/workObjectAdditionalAttributes.blade.php ENDPATH**/ ?>