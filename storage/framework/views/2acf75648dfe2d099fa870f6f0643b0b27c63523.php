<?php $__env->startSection('content'); ?>
    <div class="container">
        <h1>Recepty</h1>

        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Uživatel</th>
                <th scope="col">Název</th>
                <th scope="col">Kategorie</th>
                <th scope="col">Doba přípravy</th>
                <th scope="col">Akce</th>
            </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $recipes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recipe): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($recipe->user->name); ?></td>
                    <td>
                        <a href="<?php echo e(route('recipes.show', ['recipe' => $recipe->id])); ?>"><?php echo e($recipe->title); ?></a>
                    </td>
                    <td><?php echo e($recipe->category->name); ?></td>
                    <td><?php echo e($recipe->cooking_time); ?></td>
                    <td>
                        <?php if($recipe->isMine): ?>
                            <a href="<?php echo e(route('recipes.edit', ['recipe' => $recipe->id])); ?>" class="btn btn-primary">Upravit</a>
                            <form action="<?php echo e(route('recipes.destroy', ['recipe' => $recipe->id])); ?>" method="POST" style="display: inline;">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-danger">Odstranit</button>
                            </form>
                        <?php else: ?>
                            <span class="btn btn-primary disabled">Upravit</span>
                            <span class="btn btn-danger disabled">Odstranit</span>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\laravelprojectrecipes\resources\views/recipes/index.blade.php ENDPATH**/ ?>