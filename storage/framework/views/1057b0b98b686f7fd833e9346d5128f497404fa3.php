<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
                <h1 >
                List of Users</h1>
                
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                           
                    <div class="card mb-2">
                                <div class="card-body ">
                                    
                                    <h4 class="card-title">Name:<?php echo e($user->name); ?></h4>
                                    <p class="card-text">Email:<?php echo e($user->email); ?></p>
                                    <form action="<?php echo e(route('admin.dashboard.destroy', $user )); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button class="stylishBtn"><i class="fas fa-trash-alt"></i>Delete</button>
                                    </form>
                                </div>
                            </div>
                    
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                           
                
            </div>
        </div>
        <div class="d-flex justify-content-center mt-3">
            <?php echo e($users->links()); ?>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/Sohana/Desktop/Sohana_Thesis/resources/views/admin/users/index.blade.php ENDPATH**/ ?>