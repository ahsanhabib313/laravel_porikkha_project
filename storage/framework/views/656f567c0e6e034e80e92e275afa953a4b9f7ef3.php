<?php $__env->startSection('title'); ?>
View Grade Sheet
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.header.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="row gradesheettop UserDeleteContent jumbotron ">
        <div class="col-md-6">
            <h4><strong>Course Name:</strong><?php echo e(" "); ?><?php echo e($courseNames->course_name); ?></h4>
            <h4><strong>Course Code:</strong><?php echo e(" "); ?><?php echo e($courseNames->course_code); ?></h4>
            <h4><strong>Course Teacher:</strong><?php echo e(" "); ?><?php echo e($courseNames->course_teacher); ?></h4>
            <h4><strong>Semester:</strong><?php echo e(" "); ?><?php echo e($courseNames->semester); ?></h4>
            <h4><strong>Year:</strong><?php echo e(" "); ?><?php echo e($year); ?></h4>
        </div>
    </div>

    <div class="row UserDeleteContent">
        <div class="col-md-12">

                <table class="table table-responsive  table-bordered table-hover text-center">
                    <tbody>
                    <thead>
                    <tr >

                        <td><strong>Exam <br>Roll</strong></td>
                        <td><strong>Class <br>Roll</strong></td>
                        <td><strong>Student <br>Name</strong></td>
                        <td><strong>Class Test-1<br>(<?php echo e($totalmarks->class_test_1_total); ?>)</strong></td>
                        <td><strong>Class Test-2<br>(<?php echo e($totalmarks->class_test_2_total); ?>)</strong></td>
                        <td><strong>Assignment <br>(<?php echo e($totalmarks->assignment_total); ?>)</strong></td>
                        <td><strong>Mid Term-1<br>(<?php echo e($totalmarks->mid_1_total); ?>)</strong></td>
                        <td><strong>Mid Term-2<br>(<?php echo e($totalmarks->mid_2_total); ?>)</strong></td>
                        <td><strong>Lab<br>(<?php echo e($totalmarks->lab_total); ?>)</strong></td>
                        <td><strong>Continous<br>Evaluation<br>(<?php echo e($totalmarks->cont_evaluation_total); ?>)</strong></td>
                        <td><strong>Final<br>Exam<br>Mark</strong><br>(<?php echo e($totalmarks->final_exam_mark); ?>)</td>
                        <td><strong>Total<br>Mark</strong><br>(<?php echo e($totalmarks->total_mark); ?>)</td>
                        <td><strong>GPA</strong><br>(<?php echo e($totalmarks->gpa); ?>)</td>


                    </tr>
                    </thead>
                    <?php foreach($gradesheet as $gradesheet): ?>
                        <tr>

                            <td><?php echo e($gradesheet->student->exam_roll); ?></td>
                            <td><?php echo e($gradesheet->student->class_roll); ?></td>
                            <td><?php echo e($gradesheet->student->student_name); ?></td>
                            <td><?php echo e($gradesheet->class_test_1); ?></td>
                            <td><?php echo e($gradesheet->class_test_2); ?></td>
                            <td><?php echo e($gradesheet->assignment); ?></td>
                            <td><?php echo e($gradesheet->mid_1); ?></td>
                            <td><?php echo e($gradesheet->mid_2); ?></td>
                            <td><?php echo e($gradesheet->lab); ?></td>
                            <td><?php echo e($gradesheet->cont_evaluation); ?></td>
                            <td><?php echo e($gradesheet->final_mark); ?></td>
                            <td><?php echo e($gradesheet->total_mark); ?></td>
                            <td><?php echo e($gradesheet->grade); ?></td>
                        </tr>
                        <?php endforeach; ?>
                        </tbody>
                </table>

            <a href="<?php echo e(url('/dashboard')); ?>" class="btn btn-primary pull-right btn-lg" >Cancel</a>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>