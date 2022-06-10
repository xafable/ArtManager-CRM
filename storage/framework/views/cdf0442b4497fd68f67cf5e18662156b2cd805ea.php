<?php $__env->startSection('adminContent'); ?>


                <form method="POST" action="<?php echo e(route('admin.updateSearchSettings')); ?>">
                    <?php echo csrf_field(); ?>
                <div class="container">
                    <?php $__currentLoopData = $workObjectTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $workObjectType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <h4><?php echo e($workObjectType->title); ?></h4>
                    <ul class="list-group">

                        <?php $__currentLoopData = $workObjectType->typeFields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $typeField): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="list-group-item">
                            <input name="typeFields[<?php echo e($typeField->id); ?>]" class="form-check-input me-1" type="checkbox" value="<?php echo e($typeField->id); ?>" aria-label="..." <?php echo e($typeField->searchable == 1 ? 'checked' : ''); ?>>
                            <?php echo e($typeField->title_ru); ?>

                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </ul>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <button  id="objectTypeUpdateButton" class="btn btn-outline-secondary" type="submit" >Сохранить</button>
                </div>


                </form>




<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.adminLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\ArtManager\resources\views/admin/searchSetting.blade.php ENDPATH**/ ?>