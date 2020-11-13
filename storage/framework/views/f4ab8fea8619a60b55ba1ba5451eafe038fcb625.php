<?php $__env->startSection('title'); ?>
 Edit Total Mark
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.header.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="row " >
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

            <h1>  Edit Total Mark</h1>
        </div>
    </div>

    <div class="row  UserDeleteContent">
        <div class="col-md-12">
            <table class="table table-responsive table-bordered">
                <tbody>

                <tr>

                    <td>Course Name</td>
                    <td>Course Teacher</td>
                    <td>Class Test-1</td>
                    <td>Class Test-2</td>
                    <td>Assignment</td>
                    <td> Mid-1</td>
                    <td>Mid-2</td>
                    <td>Lab</td>
                    <td>Continous Evaluation</td>
                    <td>Final Exam Mark</td>
                    <td>Total Mark</td>
                    <td>Total GPA</td>
                    <td>Year</td>
                    <td>Action</td>

                </tr>

                <?php foreach($totalmarks as $totalmark): ?>
                    <tr>
                     <td><?php echo e($totalmark->course->course_name); ?></td>
                        <td><?php echo e($totalmark->course->course_teacher); ?></td>
                        <td><?php echo e($totalmark->class_test_1_total); ?></td>
                        <td><?php echo e($totalmark->class_test_2_total); ?></td>
                        <td><?php echo e($totalmark->assignment_total); ?></td>
                        <td><?php echo e($totalmark->mid_1_total); ?></td>
                        <td><?php echo e($totalmark->mid_2_total); ?></td>
                        <td><?php echo e($totalmark->lab_total); ?></td>
                        <td><?php echo e($totalmark->cont_evaluation_total); ?></td>
                        <td><?php echo e($totalmark->final_exam_mark); ?></td>
                        <td><?php echo e($totalmark->total_mark); ?></td>
                        <td><?php echo e($totalmark->gpa); ?></td>
                        <td><?php echo e($totalmark->year); ?></td>
                        <td><a class="btn  btn-primary" href="<?php echo e(url('dashboard/mark/edit')); ?>/<?php echo e($totalmark->id); ?>"> Edit </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>