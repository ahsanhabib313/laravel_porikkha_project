<?php $__env->startSection('title'); ?>
    Delete Notice
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.header.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="container">
    <div class="row gradesheettop">
        <div class="col-md-12">
            <div class="Error">
                <?php if(Session::has('message')): ?>
                    <div class="alert alert-success">
                        <?php echo e(Session::get('message')); ?>

                    </div>
                <?php endif; ?>

            </div>
        </div>
    </div>

    <div class="row  UserDeleteContent">
        <div class="col-md-12">

            <?php foreach($notices as $notice): ?>
                <div class="jumbotron">
                <h2 class="text-center text-capitalize "><?php echo e($notice->title); ?></h2>
                <p class="text-justify"><?php echo e($notice->content); ?></p>
                <h6><?php echo e($notice->date); ?></h6>
                <a class="btn  btn-danger btn-block " href="<?php echo e(url('dashboard/notice/delete')); ?>/<?php echo e($notice->notice_id); ?>"> Delete</a>

            </div>

                <hr>
                <?php endforeach; ?>

        </div>
    </div>
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>