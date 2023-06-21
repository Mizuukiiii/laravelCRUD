<?php $__env->startSection('content'); ?>
    <div class="container">
        <h1>Kategorie</h1>

        <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Název</th>
                <th scope="col">Akce</th>
            </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($category->name); ?></td>
                    <td>
                        <?php if(session('user_name')): ?>
                            <a href="<?php echo e(route('categories.edit', $category->id)); ?>" class="btn btn-primary">Upravit</a>
                            <form action="<?php echo e(route('categories.destroy', $category->id)); ?>" method="POST" class="d-inline">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Opravdu chcete odstranit?')">Odstranit</button>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\laravelprojectrecipes\resources\views/categories/index.blade.php ENDPATH**/ ?>