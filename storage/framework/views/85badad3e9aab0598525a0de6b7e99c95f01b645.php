<?php $__env->startSection('title'); ?>
    Dashboard
    <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('admin.header.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>