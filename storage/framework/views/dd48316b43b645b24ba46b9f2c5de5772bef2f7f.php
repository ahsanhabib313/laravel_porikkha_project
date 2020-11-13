<?php $__env->startSection('title'); ?>
    Create Grade Sheet
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('admin.header.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <div class="row  Error UserDeleteContent">
        <div class="col-md-offset-4 col-md-5 col-sm-12 col-xs-12">
            <h1>Enter the grade sheet information</h1>
            <hr>
        </div>
    </div>

    <div class="row UserDeleteContent">
        <div class="col-md-offset-4 col-md-5 col-sm-12 col-xs-12">


            <form action="/dsahboard/gradeSheet/create" method="post">
                <div class="form-group ">
                    <label for="year">Year</label>
                    <input class="form-control" id="year" name="year" type="text" placeholder="current year">
                </div>
                <div class="form-group ">
                    <label for="semester">Semester</label>
                    <select name="semester" class="form-control">
                        <option value=""></option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                    </select>
                </div>
                <div class="form-group ">
                    <label for="course_name">Course Name</label>
                    <select class="form-control" name="course_name">
                        <option value=""></option>
                        <?php foreach($course as $course): ?>
                            <option value="<?php echo e($course->course_id); ?>"><?php echo e($course->course_name); ?></option>
                        <?php endforeach; ?>

                    </select>
                </div>
                <div class="form-group ">
                    <label for="course_teacher">Course Teacher</label>
                  <input class="form-control" value=" <?php echo e($user->user_name); ?>" name="course_teacher" id="course_teacher">
                </div>

                <button class="btn btn-info" type="submit">Create</button>
                <a href="<?php echo e(url('/dashboard')); ?>" class="btn btn-info" type="submit">Cancel</a>
                <input type="hidden" name="_token" value="<?php echo e(Session::token()); ?>">

            </form>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>