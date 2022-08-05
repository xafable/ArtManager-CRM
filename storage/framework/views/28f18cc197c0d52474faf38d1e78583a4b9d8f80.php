

<?php $__env->startSection('navBar'); ?>

    <nav class="navbar sticky-top shadow-sm p-3  bg-body rounded">
        <div class="container">
            <ul class="nav nav-pills card-header-pills">
                <li class="nav-item dropdown">
                    <?php if(auth()->guard()->check()): ?>
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"><?php echo e(\Illuminate\Support\Facades\Auth::user()->fio); ?></a>
                    <?php endif; ?>
                    <?php if(auth()->guard()->guest()): ?>
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Гость</a>
                    <?php endif; ?>
                    <ul class="dropdown-menu">
                        <?php if(auth()->guard()->check()): ?>
                            <li>
                                <a class="dropdown-item" href="<?php echo e(route('user.tasks')); ?>">
                                    Мои задачи
                                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                        <?php echo e(\App\Models\User::getTasksCount()); ?>

                                        <span class="visually-hidden">Задачи</span>
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="<?php echo e(route('user.profile')); ?>">
                                    Мой профиль
                                </a>
                            </li>

                        <?php endif; ?>
                        <li><a class="dropdown-item" href="<?php echo e(route('admin.searchSettings')); ?>">Администрирование</a></li>
                        <li><hr class="dropdown-divider"></li>

                        <?php if(auth()->guard()->guest()): ?>
                            <li><a class="dropdown-item" href="<?php echo e(route('auth.login')); ?>">Вход</a></li>
                        <?php endif; ?>

                        <?php if(auth()->guard()->check()): ?>
                            <li><a class="dropdown-item" href="<?php echo e(route('auth.logout')); ?>">Выход</a></li>
                        <?php endif; ?>


                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <?php if(auth()->guard()->check()): ?>
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                            Роль (<?php echo e(Auth::user()->roles->pluck('name')[0] ?? ''); ?>)
                        </button>
                    <?php endif; ?>

                    <ul class="dropdown-menu">



                        <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <li><a class="dropdown-item" href="<?php echo e(route('auth.changeRole',$role->id)); ?>"><?php echo e($role->name); ?></a></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                    </ul>
                </li>


                <li class="nav-item dropdown">
                    <?php if(auth()->guard()->check()): ?>
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Модерирование</a>
                    <?php endif; ?>

                    <ul class="dropdown-menu">
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('object.model.show')); ?>">Шаблоны</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('status.show')); ?>">Типы статусов</a>
                        </li>

                    </ul>
                </li>




                <li class="nav-item" >
                    <a class="nav-link <?php echo e((request()->routeIs('object.show')) || request()->routeIs('object.showByType') || request()->routeIs('object.showByFilter') ? 'active' : ''); ?>" href="<?php echo e(route('object.show')); ?>" >Объекты</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?php echo e((request()->routeIs('task.showAll')) ? 'active' : ''); ?>" href="<?php echo e(route('task.showAll')); ?>">Задачи</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo e((request()->routeIs('calendar.show')) ? 'active' : ''); ?>" href="<?php echo e(route('calendar.show')); ?>">Календарь</a>
                </li>
            </ul>
        </div>
    </nav>

<?php $__env->stopSection(); ?>




<?php echo $__env->make('main.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\ArtManager-CRM\resources\views/workLayout.blade.php ENDPATH**/ ?>