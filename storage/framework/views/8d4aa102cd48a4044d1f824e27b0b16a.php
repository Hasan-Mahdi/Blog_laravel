<?php $__env->startSection('content'); ?>
    <div class="container">
        <h1 class="text-center"><span class="text-warning"><?php echo e($post->title); ?></span></h1>
        <div class="d-flex gap-3 justify-content-center mb-3">
            <a href="<?php echo e(route('posts.edit' , $post)); ?>" class="btn btn-outline-info">edit</a>
            <form action="<?php echo e(route('posts.destroy', $post)); ?>" method="post">
                <?php echo csrf_field(); ?>
                <?php echo method_field("DELETE"); ?>
                <input type="submit" class="btn btn-outline-danger" value="delete">
            </form>
        </div>
        <img src="<?php echo e(url('images/'.$post->image_path)); ?>" class="w-100" alt="">
        <br>
        <h3><?php echo e($post->description); ?></h3>

        <br>

        Show Page

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\hasan\Desktop\Blog_Laravel\resources\views/posts/show.blade.php ENDPATH**/ ?>