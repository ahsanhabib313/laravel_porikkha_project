;
<?php $__env->startSection('title'); ?>
    Update Total Mark
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.header.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="row">
        <div class="col-md-offset-3 col-md-6">
            <div class="Error">
                <?php if(count($errors) > 0): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php foreach($errors->all() as $error): ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>


            </div>

        </div>

    </div>

    <div class="row">
        <div class=" col-md-offset-3 col-md-6 col-sm-12 col-xs-12 ">
            <div class=" panel panel-default createUserPanel">
                <div class="panel-heading">
                    <h3 class="panel-title">Update Total Mark</h3>
                </div>
                <div class="panel-body">
                    <form  action="<?php echo e(url('dashboard/mark/edit')); ?>/<?php echo e($totalmarks->id); ?>" method="post">
                        <div class="form-group">
                            <label for="std_name">Course Name</label>
                            <input class="form-control" type="text" name="" id="" value="<?php echo e($totalmarks->course->course_name); ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="class_roll">Course Teacher</label>
                            <input class="form-control" type="text" name="" id="" value="<?php echo e($totalmarks->course->course_teacher); ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="class_test_1_total">Class Test-1</label>
                            <input class="form-control" type="text" name="class_test_1_total" id="class_test_1_total" value="<?php echo e($totalmarks->class_test_1_total); ?>">
                        </div>

                        <div class="form-group">
                            <label for="class_test_2_total">Class Test-2</label>
                            <input class="form-control" type="text" name="class_test_2_total" id="class_test_2_total" value="<?php echo e($totalmarks->class_test_2_total); ?>">
                        </div>

                        <div class="form-group">
                            <label for="assignment_total">Assignment</label>
                            <input class="form-control" type="text" name="assignment_total" id="assignment_total" value="<?php echo e($totalmarks->assignment_total); ?>">
                        </div>
                        <div class="form-group">
                            <label for="mid_1_total">Mid-1</label>
                            <input class="form-control" type="text" name="mid_1_total" id="mid_1_total" value="<?php echo e($totalmarks->mid_1_total); ?>">
                        </div>
                        <div class="form-group">
                            <label for="mid_2_total">Mid-2</label>
                            <input class="form-control" type="text" name="mid_2_total" id="mid_2_total" value="<?php echo e($totalmarks->mid_2_total); ?>">
                        </div>
                        <div class="form-group">
                            <label for="lab_total">Lab</label>
                            <input class="form-control" type="text" name="lab_total" id="lab_total" value="<?php echo e($totalmarks->lab_total); ?>">
                        </div>

                        <div class="form-group">
                            <label for="cont_evaluation_total">Continous Evaluation</label>
                            <input class="form-control" type="text" name="cont_evaluation_total" id="cont_evaluation_total" value="<?php echo e($totalmarks->cont_evaluation_total); ?>">
                        </div>
                        <div class="form-group">
                            <label for="final_exam_mark">Final Exam Mark</label>
                            <input class="form-control" type="text" name="final_exam_mark" id="final_exam_mark" value="<?php echo e($totalmarks->final_exam_mark); ?>">
                        </div>
                        <div class="form-group">
                            <label for="total_mark">Total Mark</label>
                            <input class="form-control" type="text" name="total_mark" id="total_mark" value="<?php echo e($totalmarks->total_mark); ?>">
                        </div>
                        <div class="form-group">
                            <label for="gpa">Total GPA</label>
                            <input class="form-control" type="text" name="gpa" id="gpa" value="<?php echo e($totalmarks->gpa); ?>">
                        </div>
                        <div class="form-group">
                            <label for="year">Year</label>
                            <input class="form-control" type="text" name="year" id="year" value="<?php echo e($totalmarks->year); ?>" readonly>
                        </div>
                        <button class="btn btn-info" type="submit">Save</button>
                        <a href="<?php echo e(url('/dashboard/mark/edit')); ?>" class="btn btn-info" type="submit">Cancel</a>
                        <input type="hidden" name="_token" value="<?php echo e(Session::token()); ?>">


                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>