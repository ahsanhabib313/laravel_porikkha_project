<?php $__env->startSection('title'); ?>
    view Notice
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.header.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="container">

        <div class="row  UserDeleteContent gradesheettop">
            <div class="col-md-12">

                <?php foreach($notices as $notice): ?>
                    <div class="jumbotron">
                        <h2 class="text-center text-capitalize"><b>Regular Program Office</b></h2>
                        <h2 class="text-center text-capitalize"><b>Institute of Information Technology (IIT)</b></h2>
                        <h2 class="text-center text-capitalize"><b>University of Dhaka</b></h2>
                        <br>


    <h2 class="text-center text-capitalize "><?php echo e($notice->title); ?></h2>
    <h3 class=""><b>Date:</b> <?php echo e($notice->date); ?></h3>

                        <p class="text-justify"><?php echo e($notice->content); ?></p>

                    </div>

                    <hr>
                <?php endforeach; ?>

            </div>
        </div>
    </div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>