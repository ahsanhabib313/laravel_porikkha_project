<?php $__env->startSection('title'); ?>
    Student Record list
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.header.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <br>
    <br>
    <div class="row">
        <div class="col-md-12">

            <?php if(Session::has('message')): ?>
                <div class="alert alert-success">
                    <?php echo e(Session::get('message')); ?>

                </div>
            <?php endif; ?>

        </div>
    </div>
    <div class="row UserDeleteContent UsderDeleteH1">
        <div class="col-md-12">

            <h1>Student Record List</h1>
        </div>
    </div>

    <div class="row  UserDeleteContent">
        <div class="col-md-12">
            <table class="table table-responsive table-bordered">
                <tbody>

                <tr>

                    <td><strong>Student Name</strong></td>
                    <td><strong>Class Roll</strong></td>
                    <td><strong>Exam Roll</strong></td>
                    <td><strong>Email</strong></td>
                    <td><strong>Semester</strong></td>
                    <td><strong>Registration Number</strong></td>
                    <td><strong>Year</strong></td>
                    <td><strong>Hall Name</strong></td>


                </tr>

                <?php foreach($data as $data): ?>
                    <tr>
                        <td><?php echo e($data->student_name); ?></td>
                        <td><?php echo e($data->class_roll); ?></td>
                        <td><?php echo e($data->exam_roll); ?></td>
                        <td><?php echo e($data->user->email); ?></td>
                        <td><?php echo e($data->cur_semester); ?></td>
                        <td><?php echo e($data->reg_num); ?></td>
                        <td><?php echo e($data->session); ?></td>
                        <td><?php echo e($data->hall_name); ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>