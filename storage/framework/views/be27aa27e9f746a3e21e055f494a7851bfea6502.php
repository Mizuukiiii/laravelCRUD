<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recepty CRUD</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" >Receptos</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('recipes.index')); ?>">Seznam receptů</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('categories.index')); ?>">Seznam kategorií</a>
            </li>
            <?php if(session()->has('user_name')): ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('recipes.create')); ?>">Přidat recept</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('categories.create')); ?>">Přidat kategorii</a>
                </li>
            <?php endif; ?>
        </ul>
        <ul class="navbar-nav ml-auto">
            <?php if(session('user_name')): ?>
                <li class="nav-item">
                    <span class="nav-link">Přihlášen jako <?php echo e(session('user_name')); ?></span>
                </li>
                <li class="nav-item">
                    <form action="<?php echo e(route('logout')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="nav-link btn btn-link">Odhlásit</button>
                    </form>
                </li>
            <?php else: ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('login')); ?>">Přihlásit</a>
                </li>
            <?php endif; ?>
        </ul>

    </div>
</nav>

<div class="container">
    <?php echo $__env->yieldContent('content'); ?>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
<?php /**PATH C:\wamp64\www\laravelprojectrecipes\resources\views/layouts/app.blade.php ENDPATH**/ ?>