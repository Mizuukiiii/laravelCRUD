<?php $__env->startSection('content'); ?>
    <div class="container">
        <h1>Vytvořit recept</h1>

        <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <form action="<?php echo e(route('recipes.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>

            <div class="form-group">
                <label for="category_id">Kategorie</label>
                <select name="category_id" id="category_id" class="form-control" required>
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <div class="form-group">
                <label for="title">Název</label>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="description">Popis</label>
                <textarea name="description" id="description" rows="1" class="form-control" required></textarea>
            </div>

            <div class="form-group">
                <label for="cooking_time">Čas připravy</label>
                <input type="text" name="cooking_time" id="cooking_time" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="instruction">Instrukce</label>
                <textarea name="instruction" id="instruction" rows="4" class="form-control" required></textarea>
            </div>

            <div class="form-group">
                <label for="ingredients">Ingredience</label>
                <textarea name="ingredients" id="ingredients" rows="4" class="form-control" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Přidat recept</button>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\laravelprojectrecipes\resources\views/recipes/create.blade.php ENDPATH**/ ?>