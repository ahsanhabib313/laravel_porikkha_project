<?php $__env->startSection('title'); ?>
    view Course Record
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.header.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <br>
    <br>

    <div class="row UserDeleteContent UsderDeleteH1">
        <div class="col-md-12">

            <h1> view Course Record List</h1>
        </div>
    </div>

    <div class="row  UserDeleteContent">
        <div class="col-md-12">
            <table class="table table-responsive table-bordered">
                <tbody>

                <tr>

                    <td><strong>Course Name</strong></td>
                    <td><strong>Course Code</strong></td>
                    <td><strong>Course Credit</strong></td>
                    <td><strong>Course Teacher</strong></td>
                    <td><strong>Semester</strong></td>


                </tr>

                <?php foreach($course as $course): ?>
                    <tr>
                        <td><?php echo e($course->course_name); ?></td>
                        <td><?php echo e($course->course_code); ?></td>
                        <td><?php echo e($course->course_credit); ?></td>
                        <td><?php echo e($course->course_teacher); ?></td>
                        <td><?php echo e($course->semester); ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>