

<?php $__env->startSection('content'); ?>
    <div class="container">
        <h1 class="text-center"><span class="text-warning">All Posts</span></h1>
        <br>
        
        <?php if(auth()->guard()->check()): ?>
        <?php endif; ?>
        
        <?php if(Auth::check()): ?>
        <a href="<?php echo e(route('posts.create')); ?>" class="btn btn-outline-success px-4 mb-2">Add New Post</a>
            
        <?php endif; ?>

        <?php if(session('message')): ?>
            <div class="alert alert-success">
                <?php echo e(session('message')); ?>

            </div>
        <?php endif; ?>


        <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="row">
            <div class="col-md-6 mb-3">
                <img src="<?php echo e(url("images/".$post->image_path)); ?>" class="w-100 rounded shadow" alt="">
            </div>
            <div class="col-md-6 mb-3 d-flex justify-content-center align-items-center">
                <div class="w-100">
                    <h2><?php echo e($post->title); ?></h2>
                    <p class="text-light">Created by: <?php echo e($post->user->name); ?></p>
                    <p class="text-light">Created at: <?php echo e(date("Y-m-d", strtotime($post->created_at))); ?></p>
                    <h5> <?php echo e($post->description); ?></h5>
                    <a href="<?php echo e(route("posts.show", $post)); ?>" class="btn text-warning">Read More</a>

                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Surface.LAPTOP-09CTHE33\Desktop\Blog_Laravel\resources\views/posts/index.blade.php ENDPATH**/ ?>