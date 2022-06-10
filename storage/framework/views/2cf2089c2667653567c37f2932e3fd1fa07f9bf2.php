<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ArtManager</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

</head>
<body>




    <div class="container" style="margin-top: 8%;">
    <div class="row">


        <form action="<?php echo e(route('auth.auth')); ?>" method="POST" class="col s12">


            <div class="input-group mb-3">
                <input name="name" type="text" class="form-control" placeholder="Логин" aria-label="Username" aria-describedby="basic-addon1">
            </div>

            <div class="input-group mb-3">
                <input name="password" type="passwordt" class="form-control" placeholder="Пароль" aria-label="Password" aria-describedby="basic-addon1">
            </div>



            <?php echo csrf_field(); ?>



            <button class="btn btn-outline-primary" type="submit" name="action">
               Войти
            </button>

            <a href="<?php echo e(route('google.auth')); ?>" class="link-danger">через Google</a>


        </form>
    </div>
</div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="  crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="<?php echo e(URL::asset('public/js/artManager.js')); ?>"></script>
</body>
</html>


<?php /**PATH C:\OpenServer\domains\ArtManager\resources\views/auth/loginPage.blade.php ENDPATH**/ ?>