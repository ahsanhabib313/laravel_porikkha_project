<?php $__env->startSection('title'); ?>
    Edit Grade Sheet Info
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
    <div class="row  Error UserDeleteContent">
        <div class="col-md-offset-4 col-md-5 col-sm-12 col-xs-12">
            <h3>Which Grade Sheet do you want to update?</h3>
            <hr>
        </div>
    </div>

    <div class="row UserDeleteContent">
        <div class="col-md-offset-4 col-md-5 col-sm-12 col-xs-12">
            <form action="<?php echo e(url('dashboard/gradeSheet/edit/search')); ?>" method="post">
                <div class="jumbotron">
                    <div class="form-group ">
                        <label for="course_name">Course Name</label>
                        <select class="form-control" name="course_id">
                            <option value=""></option>
                            <?php foreach($course as $course): ?>
                                <option value="<?php echo e($course->course_id); ?>"><?php echo e($course->course_name); ?></option>
                            <?php endforeach; ?>

                        </select>
                    </div>


                    <button class="btn btn-info" type="submit">Search</button>
                    <a href="<?php echo e(url('/dashboard')); ?>" class="btn btn-info" type="submit">Cancel</a>
                    <input type="hidden" name="_token" value="<?php echo e(Session::token()); ?>">
                </div>

            </form>
        </div>
    </div>






<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>