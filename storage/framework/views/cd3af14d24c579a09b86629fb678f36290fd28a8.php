<?php $__env->startSection('title'); ?>
    Total Mark Distribution
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
        <div class="col-md-offset-3 col-md-6">
            <?php if(Session::has('message')): ?>
                <div class="alert alert-success">
                    <?php echo e(Session::get('message')); ?>

                </div>
            <?php endif; ?>

        </div>
    </div>
    <div class="row">
        <div class=" col-md-offset-3 col-md-6 col-sm-12 col-xs-12 ">
            <div class=" panel panel-default createUserPanel">
                <div class="panel-heading">
                    <h3 class="panel-title"> Total Mark Distribution</h3>
                </div>
                <div class="panel-body">
                    <form action="<?php echo e(url('dashboard/mark/create')); ?>" method="post">
                        <div class="form-group">
                            <label for="course_id">Course Name</label>
                            <select class="form-control" name="course_id">
                                <option value=""></option>
                                <?php foreach($courses as $course): ?>
                                    <option value="<?php echo e($course->course_id); ?>"><?php echo e($course->course_name); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="class_test_1_total">Total Mark of Class Test-1</label>
                            <input class="form-control" name="class_test_1_total" id="class_test_1_total">
                        </div>
                        <div class="form-group">
                            <label for="class_test_2_total">Total Mark of Class Test-2</label>
                            <input class="form-control" name="class_test_2_total" id="class_test_2_total">
                        </div>
                        <div class="form-group">
                            <label for="assignment_total">Total Mark of Assignment</label>
                            <input class="form-control" name="assignment_total" id="assignment_total">
                        </div>
                        <div class="form-group">
                            <label for="mid_1_total">Total Mark of Mid-1</label>
                            <input class="form-control" name="mid_1_total" id="mid_1_total">
                        </div>
                        <div class="form-group">
                            <label for="mid_2_total">Total Mark of Mid-2</label>
                            <input class="form-control" name="mid_2_total" id="mid_2_total">
                        </div>
                        <div class="form-group">
                            <label for="lab_total">Total Mark of Lab</label>
                            <input class="form-control" name="lab_total" id="lab_total">
                        </div>
                        <div class="form-group">
                            <label for="cont_evaluation_total">Total Mark of Continous Evaluation</label>
                            <input class="form-control" name="cont_evaluation_total" id="cont_evaluation_total">
                        </div>
                        <div class="form-group">
                            <label for="final_exam_mark">Total Final Exam Mark</label>
                            <input class="form-control" name="final_exam_mark" id="final_exam_mark">
                        </div>
                        <div class="form-group">
                            <label for="total_mark">Total Mark</label>
                            <input class="form-control" name="total_mark" id="total_mark">
                        </div>
                        <div class="form-group">
                            <label for="gpa">Total GPA</label>
                            <input class="form-control" name="gpa" id="gpa" value="">
                        </div>
                        <div class="form-group">
                            <label for="cont_evaluation_total">Year</label>
                            <input class="form-control" name="year" id="year">
                        </div>
                        <button class="btn btn-info" type="submit">Create</button>
                        <a href="<?php echo e(url('/dashboard')); ?>" class="btn btn-info" type="submit">Cancel</a>
                        <input type="hidden" name="_token" value="<?php echo e(Session::token()); ?>">
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>