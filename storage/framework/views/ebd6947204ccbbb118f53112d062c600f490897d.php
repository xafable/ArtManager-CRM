<?php $__env->startSection('options'); ?>


    <div class="container">


        <form method="POST" action="<?php echo e(route('admin.updateRoleGeneralOptions')); ?>">

            <?php echo csrf_field(); ?>
            <input name="roleId" value="<?php echo e($roleId); ?>" hidden="hidden">

            <br>
        <h3><span class="badge bg-secondary">Объекты</span></h3>

            <input name="workObject[<?php echo e($workObjectPerm['create workObject']); ?>]" value="0" hidden="hidden">
            <input name="workObject[<?php echo e($workObjectPerm['update workObject']); ?>]" value="0" hidden="hidden">
            <input name="workObject[<?php echo e($workObjectPerm['delete workObject']); ?>]" value="0" hidden="hidden">
            <input name="workObject[<?php echo e($workObjectPerm['view workObject']); ?>]" value="0" hidden="hidden">


            <div class="row">
            <div class="col">
                <div class="form-check form-switch">
                    <input name="workObject[<?php echo e($workObjectPerm['create workObject']); ?>]" value="1" class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" <?php echo e($grantedPermissions->contains($workObjectPerm['create workObject']) ? 'checked' : ''); ?>>
                    <label class="form-check-label" for="flexSwitchCheckDefault">Создание</label>
                </div>
            </div>
            <div class="col">
                <div class="form-check form-switch">
                    <input name="workObject[<?php echo e($workObjectPerm['update workObject']); ?>]" value="1" class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" <?php echo e($grantedPermissions->contains($workObjectPerm['update workObject']) ? 'checked' : ''); ?>>
                    <label class="form-check-label" for="flexSwitchCheckDefault">Обновление</label>
                </div>
            </div>
        </div>

        <br>
        <div class="row">
            <div class="col">
                <div class="form-check form-switch">
                    <input name="workObject[<?php echo e($workObjectPerm['delete workObject']); ?>]" value="1" class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" <?php echo e($grantedPermissions->contains($workObjectPerm['delete workObject']) ? 'checked' : ''); ?>>
                    <label class="form-check-label" for="flexSwitchCheckDefault">Удаление</label>
                </div>
            </div>
            <div class="col">
                <div class="form-check form-switch">
                    <input name="workObject[<?php echo e($workObjectPerm['view workObject']); ?>]" value="1" class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" <?php echo e($grantedPermissions->contains($workObjectPerm['view workObject']) ? 'checked' : ''); ?>>
                    <label class="form-check-label" for="flexSwitchCheckDefault">Просмотр</label>
                </div>
            </div>
        </div>



        <br>
        <h3><span class="badge bg-secondary">Шаблоны</span></h3>
            <input name="workObjectType[<?php echo e($workObjectTypePerm['create workObjectType']); ?>]" value="0" hidden="hidden">
            <input name="workObjectType[<?php echo e($workObjectTypePerm['update workObjectType']); ?>]" value="0" hidden="hidden">
            <input name="workObjectType[<?php echo e($workObjectTypePerm['delete workObjectType']); ?>]" value="0" hidden="hidden">
            <input name="workObjectType[<?php echo e($workObjectTypePerm['view workObjectType']); ?>]" value="0" hidden="hidden">
        <div class="row">
            <div class="col">
                <div class="form-check form-switch">
                    <input name="workObjectType[<?php echo e($workObjectTypePerm['create workObjectType']); ?>]" value="1" class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" <?php echo e($grantedPermissions->contains($workObjectTypePerm['create workObjectType']) ? 'checked' : ''); ?>>
                    <label class="form-check-label" for="flexSwitchCheckDefault">Создание</label>
                </div>
            </div>
            <div class="col">
                <div class="form-check form-switch">
                    <input name="workObjectType[<?php echo e($workObjectTypePerm['update workObjectType']); ?>]" value="1" class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" <?php echo e($grantedPermissions->contains($workObjectTypePerm['update workObjectType']) ? 'checked' : ''); ?>>
                    <label class="form-check-label" for="flexSwitchCheckDefault">Обновление</label>
                </div>
            </div>
        </div>

        <br>
        <div class="row">
            <div class="col">
                <div class="form-check form-switch">
                    <input name="workObjectType[<?php echo e($workObjectTypePerm['delete workObjectType']); ?>]" value="1" class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" <?php echo e($grantedPermissions->contains($workObjectTypePerm['delete workObjectType']) ? 'checked' : ''); ?>>
                    <label class="form-check-label" for="flexSwitchCheckDefault">Удаление</label>
                </div>
            </div>
            <div class="col">
                <div class="form-check form-switch">
                    <input name="workObjectType[<?php echo e($workObjectTypePerm['view workObjectType']); ?>]" value="1" class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" <?php echo e($grantedPermissions->contains($workObjectTypePerm['view workObjectType']) ? 'checked' : ''); ?>>
                    <label class="form-check-label" for="flexSwitchCheckDefault">Просмотр</label>
                </div>
            </div>
        </div>

        <br>
        <h3><span class="badge bg-secondary">Типы статусов</span></h3>
            <input name="statusType[<?php echo e($statusTypePerm['create statusType']); ?>]" value="0" hidden="hidden">
            <input name="statusType[<?php echo e($statusTypePerm['update statusType']); ?>]" value="0" hidden="hidden">
            <input name="statusType[<?php echo e($statusTypePerm['delete statusType']); ?>]" value="0" hidden="hidden">
            <input name="statusType[<?php echo e($statusTypePerm['view statusType']); ?>]" value="0" hidden="hidden">
        <div class="row">
            <div class="col">
                <div class="form-check form-switch">
                    <input name="statusType[<?php echo e($statusTypePerm['create statusType']); ?>]" value="1" class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" <?php echo e($grantedPermissions->contains($statusTypePerm['create statusType']) ? 'checked' : ''); ?>>
                    <label class="form-check-label" for="flexSwitchCheckDefault">Создание</label>
                </div>
            </div>
            <div class="col">
                <div class="form-check form-switch">
                    <input name="statusType[<?php echo e($statusTypePerm['update statusType']); ?>]" value="1" class="form-check-input" type="checkbox" id="flexSwitchCheckDefault"  <?php echo e($grantedPermissions->contains($statusTypePerm['update statusType']) ? 'checked' : ''); ?>>
                    <label class="form-check-label" for="flexSwitchCheckDefault">Обновление</label>
                </div>
            </div>
        </div>

        <br>
        <div class="row">
            <div class="col">
                <div class="form-check form-switch">
                    <input name="statusType[<?php echo e($statusTypePerm['delete statusType']); ?>]" value="1" class="form-check-input" type="checkbox" id="flexSwitchCheckDefault"  <?php echo e($grantedPermissions->contains($statusTypePerm['delete statusType']) ? 'checked' : ''); ?>>
                    <label class="form-check-label" for="flexSwitchCheckDefault">Удаление</label>
                </div>
            </div>
            <div class="col">
                <div class="form-check form-switch">
                    <input name="statusType[<?php echo e($statusTypePerm['view statusType']); ?>]" value="1" class="form-check-input" type="checkbox" id="flexSwitchCheckDefault"  <?php echo e($grantedPermissions->contains($statusTypePerm['view statusType']) ? 'checked' : ''); ?>>
                    <label class="form-check-label" for="flexSwitchCheckDefault">Просмотр</label>
                </div>
            </div>
        </div>

            <br>
            <h3><span class="badge bg-secondary">Дополнительные атрибуты</span></h3>
            <input name="additionalAttribute[<?php echo e($additionalAttributePerm['create additionalAttribute']); ?>]" value="0" hidden="hidden">
            <input name="additionalAttribute[<?php echo e($additionalAttributePerm['update additionalAttribute']); ?>]" value="0" hidden="hidden">
            <input name="additionalAttribute[<?php echo e($additionalAttributePerm['delete additionalAttribute']); ?>]" value="0" hidden="hidden">
            <input name="additionalAttribute[<?php echo e($additionalAttributePerm['view additionalAttribute']); ?>]" value="0" hidden="hidden">
            <div class="row">
                <div class="col">
                    <div class="form-check form-switch">
                        <input name="additionalAttribute[<?php echo e($additionalAttributePerm['create additionalAttribute']); ?>]" value="1" class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" <?php echo e($grantedPermissions->contains($additionalAttributePerm['create additionalAttribute']) ? 'checked' : ''); ?>>
                        <label class="form-check-label" for="flexSwitchCheckDefault">Создание</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-check form-switch">
                        <input name="additionalAttribute[<?php echo e($additionalAttributePerm['update additionalAttribute']); ?>]" value="1" class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" <?php echo e($grantedPermissions->contains($additionalAttributePerm['update additionalAttribute']) ? 'checked' : ''); ?>>
                        <label class="form-check-label" for="flexSwitchCheckDefault">Обновление</label>
                    </div>
                </div>
            </div>

            <br>
            <div class="row">
                <div class="col">
                    <div class="form-check form-switch">
                        <input name="additionalAttribute[<?php echo e($additionalAttributePerm['delete additionalAttribute']); ?>]" value="1" class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" <?php echo e($grantedPermissions->contains($additionalAttributePerm['delete additionalAttribute']) ? 'checked' : ''); ?>>
                        <label class="form-check-label" for="flexSwitchCheckDefault">Удаление</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-check form-switch">
                        <input name="additionalAttribute[<?php echo e($additionalAttributePerm['view additionalAttribute']); ?>]" value="1" class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" <?php echo e($grantedPermissions->contains($additionalAttributePerm['view additionalAttribute']) ? 'checked' : ''); ?>>
                        <label class="form-check-label" for="flexSwitchCheckDefault">Просмотр</label>
                    </div>
                </div>
            </div>

            <br>
            <button  id="objectTypeUpdateButton" class="btn btn-outline-secondary" type="submit" >Сохранить</button>

        </form>

    </div>





<?php $__env->stopSection(); ?>




<?php echo $__env->make('admin.roleOptionsLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\ArtManager\resources\views/admin/roleGeneralOptions.blade.php ENDPATH**/ ?>