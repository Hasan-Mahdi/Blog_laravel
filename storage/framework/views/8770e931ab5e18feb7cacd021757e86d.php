

<?php $__env->startSection('content'); ?>
    <div class="container">
        <h1 class="text-center"><span class="text-warning">Create New Post</span></h1>
        <br>

        <form action="<?php echo e(route('posts.store')); ?>" method="POST" enctype="multipart/form-data" style="max-width:400px; margin:auto">
          <?php echo csrf_field(); ?>
           <!-- Uncomment if updating an existing record instead of creating a new one -->
          <div class="mb-3">
              <label for="title" class="form-label">Title</label>
              <input type="text" autofocus class="form-control" value="<?php echo e(old('title')); ?>" name="title" id="title">
              <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                  <div class="text-danger"><?php echo e($message); ?></div>
              <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
          </div>
          <div class="mb-3">
              <label for="description" class="form-label">Description</label>
              <textarea name="description" id="description" rows="5" class="form-control"><?php echo e(old('description')); ?></textarea>
              <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                  <div class="text-danger"><?php echo e($message); ?></div>
              <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
          </div>
          <div class="mb-3">
              <label for="image_path" class="form-label">Image</label>
              <input type="file" class="form-control" name="image_path" id="image_path">
              <?php $__errorArgs = ['image_path'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                  <div class="text-danger"><?php echo e($message); ?></div>
              <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
          </div>
          <button type="submit" class="btn btn-outline-info px-5">Submit</button>
      </form>
      
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Surface.LAPTOP-09CTHE33\Desktop\Blog_Laravel\resources\views/posts/create.blade.php ENDPATH**/ ?>