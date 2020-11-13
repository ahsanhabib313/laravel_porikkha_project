<?php $__env->startSection('title'); ?>
    Search Course Record...
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
        <div class="col-md-offset-3 col-md-6  ">

            <?php if(Session::has('message')): ?>
                <div class="alert alert-success">
                    <?php echo e(Session::get('message')); ?>

                </div>
            <?php endif; ?>

        </div>
    </div>
    <div class="row  Error UserDeleteContent">
        <div class="col-md-offset-4 col-md-5 col-sm-12 col-xs-12">
            <h3>Which semester Courses do you want to view....?</h3>
            <hr>
        </div>
    </div>

    <div class="row UserDeleteContent">
        <div class="col-md-offset-4 col-md-5 col-sm-12 col-xs-12">
            <form action="<?php echo e(url('/dashboard/course/view/search')); ?>" method="post">
                <div class="jumbotron">
                    <div class="form-group ">
                        <label for="semester">Semester</label>
                        <select class="form-control" name="semester">
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


                    <button class="btn btn-info" type="submit">Search</button>
                    <a href="<?php echo e(url('/dashboard')); ?>" class="btn btn-info" type="submit">Cancel</a>
                    <input type="hidden" name="_token" value="<?php echo e(Session::token()); ?>">
                </div>

            </form>
        </div>
    </div>






<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>