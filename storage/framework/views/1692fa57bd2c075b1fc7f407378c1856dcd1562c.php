;
<?php $__env->startSection('title'); ?>
    Update Course Record
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
                    <h3 class="panel-title">Update Course Record</h3>
                </div>
                <div class="panel-body">
                    <form  action="<?php echo e(url('/dashboard/course/edit')); ?>/<?php echo e($course->course_id); ?>" method="post">
                        <div class="form-group">
                            <label for="course_name">Course Name</label>
                            <input class="form-control" type="text" name="course_name" id="course_name" value="<?php echo e($course->course_name); ?>">
                        </div>
                        <div class="form-group">
                            <label for="course_code">Course Code</label>
                            <input class="form-control" type="text" name="course_code" id="course_code" value="<?php echo e($course->course_code); ?>">
                        </div>
                        <div class="form-group">
                            <label for="course_credit">Course Credit</label>
                            <input class="form-control" type="text" name="course_credit" id="course_credit" value="<?php echo e($course->course_credit); ?>">
                        </div>
                        <?php if($user->role=='Program Officer'): ?>
                        <div class="form-group">
                            <label for="course_teacher">Course Teacher</label>
                            <input readonly class="form-control" type="text" name="course_teacher" id="course_teacher" value="<?php echo e($course->course_teacher); ?>">
                        </div>
                        <?php else: ?>
                            <div class="form-group">
                                <label for="course_teacher">Course Teacher</label>
                                <input  class="form-control" type="text" name="course_teacher" id="course_teacher" value="<?php echo e($course->course_teacher); ?>">
                            </div>

                        <?php endif; ?>


                        <div class="form-group">
                            <label for="semester">Semester</label>
                            <select class="form-control" name="semester" >
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
                        <button class="btn btn-info" type="submit">Save</button>
                        <a href="<?php echo e(url('/dashboard/course/edit')); ?>" class="btn btn-info" type="submit">Cancel</a>
                        <input type="hidden" name="_token" value="<?php echo e(Session::token()); ?>">


                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>