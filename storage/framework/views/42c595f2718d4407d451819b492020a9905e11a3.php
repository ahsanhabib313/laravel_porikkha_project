<?php $__env->startSection('title'); ?>
    Delete Student Record
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.header.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <br>
    <br>
    <div class="row">
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
    <div class="row UserDeleteContent UsderDeleteH1">
        <div class="col-md-12">

            <h1> Delete Student Record</h1>
        </div>
    </div>

    <div class="row  UserDeleteContent">
        <div class="col-md-12">
            <table class="table table-responsive table-bordered">
                <tbody>

                <tr>

                    <td>Student Name</td>
                    <td>Class Roll</td>
                    <td>Exam Roll</td>
                    <td>Semester</td>
                    <td>Registration Number</td>
                    <td>Year</td>
                    <td>Hall Name</td>
                    <td>Action</td>

                </tr>

                <?php foreach($data as $data): ?>
                    <tr>

                        <td><?php echo e($data->student_name); ?></td>
                        <td><?php echo e($data->class_roll); ?></td>
                        <td><?php echo e($data->exam_roll); ?></td>
                        <td><?php echo e($data->cur_semester); ?></td>
                        <td><?php echo e($data->reg_num); ?></td>
                        <td><?php echo e($data->session); ?></td>
                        <td><?php echo e($data->hall_name); ?></td>
                        <td><a class="btn  btn-danger" href="<?php echo e(url('dashboard/student/delete')); ?>/<?php echo e($data->student_id); ?>"> Delete</a> </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>