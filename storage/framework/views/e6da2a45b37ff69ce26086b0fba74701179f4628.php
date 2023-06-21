<table>
    <thead>
    <tr>
        <th>Name</th>
        <th>Description</th>
    </tr>
    </thead>
    <tbody>
    <?php $__currentLoopData = $recipes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recipe): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <?php echo e(var_dump($recipe)); ?>

            <td><?php echo e($recipe->title); ?></td>
            <td><?php echo e($recipe->id); ?></td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<a href="<?php echo e(route('recipes.create')); ?>">Add Recipe</a>
<?php /**PATH C:\wamp64\www\laravelprojectrecipes\resources\views/index.blade.php ENDPATH**/ ?>