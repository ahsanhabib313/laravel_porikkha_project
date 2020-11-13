<?php $__env->startSection('title'); ?>
Edit Grade Sheet
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.header.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="row">
        <div class="col-md-offset-3 col-md-6">

            <?php if(Session::has('message')): ?>
                <div class="alert alert-success">
                    <?php echo e(Session::get('message')); ?>

                </div>
            <?php endif; ?>

        </div>
    </div>
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
            <form name="addem" id="addem" action="<?php echo e(url('/dashboard/gradeSheet/update')); ?> " method="post">
                <table class="table table-responsive  table-bordered table-hover text-center">
                    <tbody>
                    <thead>
                    <tr class="text-center">

                        <td><strong>Gradesheet<br>Id</strong></td>
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

                            <td id=""><input class="form-control  " name="grade_id[]" readonly
                                             value="<?php echo e($gradesheet->grade_id); ?>"></td>
                            <td id="class_roll_grade"><input class="form-control  " name="class_roll" readonly
                                                             value="<?php echo e($gradesheet->student->class_roll); ?>"></td>
                            <td id="student_name_grade"><input class="form-control  " name="student_name" readonly
                                                               value="<?php echo e($gradesheet->student->student_name); ?>"></td>

                            <td><input  class="form-control  " name="class_test-1[]"
                                       value="<?php echo e($gradesheet->class_test_1); ?>" min="0" max="<?php echo e($totalmarks->class_test_1_total); ?>"></td>
                            <td><input  class="form-control  " name="class_test-2[]"
                                       value="<?php echo e($gradesheet->class_test_2); ?>" min="0" max="<?php echo e($totalmarks->class_test_2_total); ?>" ></td>
                            <td><input  class="form-control  " name="assignment[]"
                                       value="<?php echo e($gradesheet->assignment); ?>" min="0" max="<?php echo e($totalmarks->assignment_total); ?>"></td>
                            <td><input  class="form-control " name="mid_term-1[]"
                                       value="<?php echo e($gradesheet->mid_1); ?>" min="0" max="<?php echo e($totalmarks->mid_1_total); ?>"></td>
                            <td><input  class="form-control  " name="mid_term-2[]"
                                       value="<?php echo e($gradesheet->mid_2); ?>" min="0" max="<?php echo e($totalmarks->mid_2_total); ?>" ></td>
                            <td><input  class="form-control  " name="lab[]" value="<?php echo e($gradesheet->lab); ?>" min="0" max="<?php echo e($totalmarks->lab_total); ?>"
                                       ></td>
                            <td><input  class="form-control  " name="cont_evaluation[]" min="0" max="<?php echo e($totalmarks->cont_evaluation_total); ?>"
                                       value="<?php echo e($gradesheet->cont_evaluation); ?>" ></td>
                            <td><input  class="form-control  " name="final_exam[]"
                                       value="<?php echo e($gradesheet->final_mark); ?>"  min="0" max="<?php echo e($totalmarks->final_exam_mark); ?>"></td>
                            <td><input  class="form-control  " name="total_mark[]"
                                       value="<?php echo e($gradesheet->total_mark); ?>" readonly></td>
                            <td><input  class="form-control  " name="grade[]" value="<?php echo e($gradesheet->grade); ?>" readonly>
                            </td>


                        </tr>
                        <?php endforeach; ?>
                        </tbody>
                </table>
                <div class="pull-right">
                    <button class="btn btn-info  " type="submit">Update</button>
                    <a href="<?php echo e(url('/dashboard')); ?>" class="btn btn-primary " type="submit">Cancel</a>
                    <input type="hidden" name="_token" value="<?php echo e(Session::token()); ?>">
                </div>
            </form>

        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>