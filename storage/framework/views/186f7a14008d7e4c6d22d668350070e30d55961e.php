

<?php $__env->startSection('content'); ?>




    <div class="container">

        <div class="row">
            <div class="col-xs-auto col-md-3">
                <div class="accordion" id="accordionPanelsStayOpenExample">

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                                Фильтр
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                            <div class="accordion-body">
                                <form action="<?php echo e(route('task.showAll')); ?>" method="GET">

                                    <div class="form-floating">
                                <select name="filters[workObjectType]" class="form-select" aria-label="Default select example">
                                    <option selected></option>
                                   <?php $__currentLoopData = $workObjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $workObject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option  <?php if(isset(request()->filters['workObjectType'])): ?>
                                             <?php echo e(request()->filters['workObjectType'] == $workObject->id ? 'selected' : ''); ?>

                                             <?php endif; ?>
                                         value="<?php echo e($workObject->id); ?>"><?php echo e($workObject->title); ?></option>
                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                        <label>Шаблон объекта</label>
                                    </div>
                                <br>

                                    <div class="form-floating">
                                <select  name="filters[statusId]" class="form-select" aria-label="Default select example">
                                    <option selected></option>
                                    <?php $__currentLoopData = $taskStatuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $taskStatus): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option <?php if(isset(request()->filters['statusId'])): ?>
                                                <?php echo e(request()->filters['statusId'] == $taskStatus->id ? 'selected' : ''); ?>

                                                <?php endif; ?>
                                            value="<?php echo e($taskStatus->id); ?>"><?php echo e($taskStatus->title); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                        <label>Статус</label>
                                    </div>
                                    <br>

                                    <button class="btn btn-outline-secondary" type="submit">Применить</button>
                                </form>



                            </div>
                        </div>
                    </div>


                </div>
            </div>

            <div class="col-xs-auto col-md-9">

                <p>
                    <button class="btn btn-primary mt-2" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                        Добавить задачу
                    </button>
                </p>
                <div class="collapse" id="collapseExample">
                    <form action="<?php echo e(route('task.store')); ?>" method="POST" >
                        <?php echo csrf_field(); ?>
                        <div class="card card-body">
                            <div class="input-group mb-3">
                                <input required name="title" type="text" class="form-control" placeholder="Имя" aria-describedby="button-addon2">
                                <button id="objectTypeNextButton" class="btn btn-outline-secondary" type="submit" >Далее</button>
                            </div>
                        </div>
                    </form>
                </div>
                <br>



                <?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="card text-dark bg-light mb-3" >
                        <div class="card-header">
                            <?php echo e($task->title); ?>

                            <span class="badge bg-primary"> <?php echo e($task->workObject->title ?? 'без объекта'); ?></span>

                           <?php switch($task->status_id):
                            case (1): ?>
                                <span class="badge bg-primary"> <?php echo e($taskStatuses->firstWhere('id', $task->status_id)->title); ?></span>
                                <?php break; ?>
                            <?php case (2): ?>
                                <span class="badge bg-warning"> <?php echo e($taskStatuses->firstWhere('id', $task->status_id)->title); ?></span>
                                <?php break; ?>
                            <?php case (3): ?>
                                <span class="badge bg-success"> <?php echo e($taskStatuses->firstWhere('id', $task->status_id)->title); ?></span>
                                <?php break; ?>
                            <?php case (4): ?>
                                <span class="badge bg-secondary"> <?php echo e($taskStatuses->firstWhere('id', $task->status_id)->title); ?></span>
                                <?php break; ?>
                            <?php case (5): ?>
                                <span class="badge bg-success"> <?php echo e($taskStatuses->firstWhere('id', $task->status_id)->title); ?></span>
                                <?php break; ?>
                            <?php default: ?>
                                <span class="badge bg-dark"> <?php echo e($taskStatuses->firstWhere('id', $task->status_id)->title); ?></span>
                            <?php endswitch; ?>

                        </div>
                        <div class="card-body" >
                            <h5 class="card-title"></h5>
                            <p class="card-text"><?php echo e($task->description); ?></p>
                            <button onclick="location.href = '<?php echo e(route('task.edit',$task->id)); ?>'" id="objectTypeEditButton" class="btn btn-outline-secondary" type="button" >К задаче</button>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

        </div>
    </div>

    <div class="container">
        <div class="d-flex justify-content-center"> <?php echo e($tasks->withQueryString()->links()); ?></div>
    </div>



<?php $__env->stopSection(); ?>








<?php echo $__env->make('workLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\ArtManager-CRM\resources\views/taskShowAll.blade.php ENDPATH**/ ?>