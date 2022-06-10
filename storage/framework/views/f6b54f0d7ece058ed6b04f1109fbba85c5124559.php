<?php $__env->startSection('content'); ?>

    <div class="container">
        <form method="POST" action="<?php echo e(route('user.update')); ?>">
            <?php echo csrf_field(); ?>
            <input name="userId" value="<?php echo e($user->id); ?>" hidden="hidden">
            <section>
                <div class="container py-5">

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card mb-4">
                                <div class="card-body text-center">
                                    <img src="https://mdbootstrap.com/img/Photos/new-templates/bootstrap-chat/ava3.png" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                                    <h5 class="my-3"><?php echo e($user->fio); ?></h5>

                                    <div class="d-flex justify-content-center mb-2">

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-8">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="row">

                                        <div class="mb-3">
                                            <label  class="form-label">ФИО</label>
                                            <input name="fio" value="<?php echo e($user->fio); ?>" class="form-control" >
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Email</label>
                                            <input name="email" value="<?php echo e($user->email); ?>" class="form-control" >
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="mb-3">
                                            <label class="form-label">Telegram ID</label>
                                            <input name="telegram_user_id" value="<?php echo e($user->telegram_user_id); ?>" class="form-control" >
                                            <div  class="form-text"><a href = "https://t.me/getmyid_bot">Узнать свой Id</a></div>
                                        </div>
                                    </div>

                                    <button class="btn btn-outline-secondary" type="submit" >Сохранить</button>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </section>

        </form>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.userLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\ArtManager\resources\views/user/userProfile.blade.php ENDPATH**/ ?>