



<?php $__env->startSection('adminContent'); ?>



    <p>
        <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
            Добавить
        </button>
    </p>
    <div class="collapse" id="collapseExample">
        <form action="<?php echo e(route('admin.insertRole')); ?>" method="POST" id="roleCreateForm">
            <?php echo csrf_field(); ?>
            <div class="card card-body">
                <div class="input-group mb-3">
                    <input required name="roleTitle" type="text" class="form-control" placeholder="Имя " aria-describedby="button-addon2">
                    <button id="objectTypeNextButton" class="btn btn-outline-secondary" type="submit" > Ок </button>
                </div>
            </div>
        </form>
    </div>







            <div class="row">


                <div class="card mb-4">
                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0"><?php echo e($role->name); ?>  </p>
                            </div>
                            <div class="col-sm-3">
                              <a href="<?php echo e(route('admin.generalOptions',$role->id)); ?>" class="btn btn-outline-secondary" role="button" >Параметры</a>
                            </div>
                        </div>

                    </div>
                        <hr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>



            </div>












<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.adminLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\ArtManager-CRM\resources\views/admin/rolesSettings.blade.php ENDPATH**/ ?>