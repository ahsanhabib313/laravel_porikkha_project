<?php $__env->startSection('title'); ?>

    Change Password
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('admin.header.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <br>
    <br>
    <br>


    <div class="row">
        <div class=" col-md-offset-3 col-md-6">
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
        <div class="col-md-offset-3 col-xs-6">


            <div class=" panel panel-default changePasswordPanel">
                <div class="panel-heading">
                    <h3 class="panel-title">Change Password</h3>
                </div>
                <div class="panel-body">
                    <form action="<?php echo e(url('/passwordPage')); ?>" method="post">

                        <div class="form-group">
                            <label for="newPassword">New Password</label>
                            <input class="form-control" type="password" name="newPassword" id="newPassword" autofocus>
                        </div>
                        <div class="form-group">
                            <label for="confirmationPassword">Confirm Password</label>
                            <input class="form-control" type="password" name="confirmationPassword"
                                   id="confirmationPassword" autofocus>
                        </div>

                        <button class="btn btn-info" type="submit">Save</button>
                        <a href="<?php echo e('/dashboard'); ?>" class="btn btn-info" type="submit">Cancel</a>
                        <input type="hidden" name="_token" value="<?php echo e(Session::token()); ?>">


                    </form>
                </div>
            </div>
        </div>
    </div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>