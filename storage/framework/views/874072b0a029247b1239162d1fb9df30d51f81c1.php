<?php $__env->startSection('content'); ?>
    <div class="container">
        <h1>Upravit kategorii <?php echo e($category->name); ?></h1>

        <form action="<?php echo e(route('categories.update', $category->id)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div class="form-group">
                <label for="name">Název kategorie</label>
                <input type="text" name="name" id="name" class="form-control" value="<?php echo e($category->name); ?>" required>
            </div>

            <button type="submit" class="btn btn-primary">Aktualizovat kategorii</button>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\laravelprojectrecipes\resources\views/categories/edit.blade.php ENDPATH**/ ?>