

<?php $__env->startSection('workObjectSection'); ?>


    <div class="container mt-1" ">

        <form action=<?php echo e(route('object.comment.add',$workObject->id)); ?> method="post">
            <?php echo csrf_field(); ?>
            <div class="form-group">


                <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <span class="badge badge-pill badge-secondary"> </span>
                    <textarea  class="form-control" id="exampleFormControlTextarea1" rows="1" readonly="readonly" style="margin-top: 5px;resize: none;"> <?php echo e($users[$comment->user_id]); ?> : <?php echo e($comment->comment); ?></textarea>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                <textarea required name = "comment" class="form-control mt-1" id="exampleFormControlTextarea1" rows="2" style="resize: none;"></textarea>
                <button type="submit" class="btn btn-outline-success mt-1" >Добавить</button>
            </div>
        </form>

    </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('main.workObjectLayot', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\ArtManager-CRM\resources\views/workObjectComments.blade.php ENDPATH**/ ?>