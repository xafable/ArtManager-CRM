

<?php $__env->startSection('workObjectSection'); ?>


    <div class="container" style="margin-top: 10px;">

        <form action=<?php echo e(route('object.files.upload')); ?> method="post" enctype="multipart/form-data"  class="form-inline">
            <?php echo csrf_field(); ?>
            <div >

                <input hidden type="text"  name="work_object_id" value="<?php echo e($workObject->id); ?>" >
                <div class="input-group">
                    <input name="uploadedFile" onchange="this.form.submit()" type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                </div>


            </div>
        </form>

        <?php $__currentLoopData = $media; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mediaItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="card" style="margin-top: 10px;">
                <div class="card-body">
                    <img src="<?php echo e($mediaItem->url); ?>" onerror="this.src='http://laravel/uploads/document.png';" style="width: 60px; height: 60px; border-radius: 10%;"><a class="link-primary px-2" href="<?php echo e($mediaItem->url); ?>">  Открыть <?php echo e($mediaItem->title); ?> </a>
                </div>
            </div>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('main.workObjectLayot', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\ArtManager-CRM\resources\views/workObjectFiles.blade.php ENDPATH**/ ?>