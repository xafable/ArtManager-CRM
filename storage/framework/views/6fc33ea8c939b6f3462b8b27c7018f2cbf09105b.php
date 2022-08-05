

<?php $__env->startSection('content'); ?>



    <div class="container">
        <div class="row">
            <div class="col-xs-auto col-md-3">
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button <?php echo e(request()->routeIs('object.showByFilter') ? "" : "collapsed"); ?>  " type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                Фильтр по шаблонам
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse <?php echo e(request()->routeIs('object.showByFilter') ? "show" : ""); ?>" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <button onclick="location.href = '<?php echo e(route('object.show')); ?>'" id="objectTypeEditButton" class="btn btn-outline-secondary" type="button" >Все</button>
                                <br>
                                <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <button onclick="location.href = '<?php echo e(route('object.showByType',$type->id)); ?>'" id="objectTypeEditButton" class="btn btn-outline-secondary mt-1" type="button" >
                                        <?php echo e($type->title); ?></button>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button <?php echo e(request()->routeIs('object.showByFilter') ? "" : "collapsed"); ?> " type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Фильтр по полям
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse <?php echo e(request()->routeIs('object.showByFilter') ? "show" : ""); ?>" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                            <div class="accordion-body">



                                <form name="filters" method="get" action="<?php echo e(route('object.showByFilter')); ?>" style="width: 90%;margin: 30px;">
                                    <p >Для расширеного фильтра выберите шаблон объекта</p>
                                    <label for="exampleInputEmail1" class="form-label">Имя</label><br>
                                    <input name="filters[title]" type="text"  id="exampleInputEmail1"
                                           <?php if(request()->has('filters')): ?>
                                           value = "<?php echo e(request()->filters['title']  ?? ''); ?>"
                                           <?php else: ?>
                                           value = " "
                                        <?php endif; ?>>

                                    <label for="exampleInputEmail1" class="form-label">Описание</label>
                                    <input name="filters[description]" type="text"  id="exampleInputEmail1"
                                           <?php if(request()->has('filters')): ?>
                                           value = "<?php echo e(request()->filters['description'] ?? ''); ?>"
                                           <?php else: ?>
                                           value = " "
                                        <?php endif; ?> >

                                    <?php if(isset($typeFields)): ?>
                                        <?php if(isset($workObjectTypeId)): ?>

                                        <input hidden name="workObjectTypeId" value="<?php echo e($workObjectTypeId ?? 0); ?>" type="text"  id="exampleInputEmail1" >
                                        <?php $__currentLoopData = $typeFields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $typeField): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <hr>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label"><?php echo e($typeField->title_ru); ?></label><br>


                                                <?php if($typeField->format == 'boolean'): ?>
                                                    <input name="attributeFilters[<?php echo e($typeField->title_eng); ?>]" value="0" hidden>
                                                <?php endif; ?>

                                                <?php if($typeField->format == 'enum'): ?>
                                                    <select name="attributeFilters[<?php echo e($typeField->title_eng); ?>]" class="form-select" aria-label="Default select example">
                                                        <option value="" ></option>
                                                        <?php $__currentLoopData = $enumerationsData[$typeField->enumeration_id]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $enum): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                            <option <?php echo e(request()->has('attributeFilters')  ? request()->attributeFilters[$typeField->title_eng] == $enum->value ? 'selected' : '' : ''); ?>

                                                                    value="<?php echo e($enum->value); ?>" ><?php echo e($enum->value); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                <?php elseif($typeField->format == 'date'): ?>
                                                    <input name="attributeFilters[<?php echo e($typeField->title_eng); ?>]" type= "date" value="<?php echo e(request()->has('attributeFilters')  ? request()->attributeFilters[$typeField->title_eng] ?? '' : ''); ?>" >
                                                <?php elseif($typeField->format == 'boolean'): ?>
                                                    <input name="attributeFilters[<?php echo e($typeField->title_eng); ?>]" type= "checkbox" value="1"<?php echo e(request()->has('attributeFilters')  ? request()->attributeFilters[$typeField->title_eng] == 1 ? 'checked' : '' : ''); ?> >
                                                <?php elseif($typeField->format == 'integer'): ?>
                                                    <input name="attributeFilters[<?php echo e($typeField->title_eng); ?>]" type= "number" value="<?php echo e(request()->has('attributeFilters')  ? request()->attributeFilters[$typeField->title_eng] ?? '' : ''); ?>" >
                                                <?php else: ?>
                                                    <input name="attributeFilters[<?php echo e($typeField->title_eng); ?>]" type= "text" value="<?php echo e(request()->has('attributeFilters')  ? request()->attributeFilters[$typeField->title_eng] ?? '' : ''); ?>" >

                                                <?php endif; ?>

                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                     <?php endif; ?>
                                    <?php endif; ?>
                                    <button type="submit" class="btn btn-primary mt-2">Поиск</button>
                                </form>

                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-xs-auto col-md-9">
                    <p>
                        <button class="btn btn-primary mt-2" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                            Добавить объект
                        </button>
                    </p>
                    <br>
                    <div class="collapse" id="collapseExample">
                        <form action="<?php echo e(route('object.insert')); ?>" method="POST" id="workObjectTypeCreateForm">
                            <?php echo csrf_field(); ?>
                            <div class="card card-body">
                                <div class="input-group mb-3">
                                    <select name="type_id" class="form-select" id="inputGroupSelect01" required>
                                        <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option  value="<?php echo e($type->id); ?>"><?php echo e($type->title); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <input required name="title" type="text" class="form-control" placeholder="Имя объекта" aria-describedby="button-addon2">
                                    <button id="objectTypeNextButton" class="btn btn-outline-secondary" type="submit" >Далее</button>
                                </div>
                            </div>
                            <br>
                        </form>
                    </div>

                    <?php $__currentLoopData = $workObjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $workObject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="card text-dark bg-light mb-3" >
                            <div class="card-header"><?php echo e($workObject->title); ?></div>
                            <div class="card-body">
                                <h5 class="card-title"></h5>
                                <p class="card-text"><?php echo e($workObject->description); ?></p>
                                <button onclick="location.href = '<?php echo e(route('object.edit',$workObject->id)); ?>'" id="objectTypeEditButton" class="btn btn-outline-secondary" type="button" >К объекту</button>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php echo e($workObjects->withQueryString()->links()); ?>   </div>
        </div>
    </div>





<?php $__env->stopSection(); ?>




<?php echo $__env->make('workLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\ArtManager-CRM\resources\views/workObjectShow.blade.php ENDPATH**/ ?>