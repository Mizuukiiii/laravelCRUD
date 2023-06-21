<?php $__env->startSection('content'); ?>
    <div class="container">
        <h1>Detail receptu <?php echo e($recipe->title); ?></h1>


        <p><strong>Kategorie:</strong> <?php echo e($recipe->category->name); ?></p>
        <p><strong>Autor:</strong> <?php echo e($recipe->user->name); ?></p>
        <p><strong>Doba přípravy:</strong> <?php echo e($recipe->cooking_time); ?></p>
        <p><strong>Ingredience:</strong> <?php echo e($recipe->ingredients); ?></p>
        <p><strong>Popis:</strong> <?php echo e($recipe->description); ?></p>
        <p><strong>Instrukce:</strong> <?php echo e($recipe->instruction); ?></p>



        <a href="<?php echo e(route('recipes.index')); ?>" class="btn btn-primary">Zpět na seznam</a>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\laravelprojectrecipes\resources\views/recipes/show.blade.php ENDPATH**/ ?>