    <?php $__env->startSection('title'); ?>
        Login
    <?php $__env->stopSection(); ?>

<?php /*<body class="body-Login-back">*/ ?>
<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="">
                    <?php if(Session::has('message')): ?>
                        <div class="alert alert-danger">
                            <?php echo e(Session::get('message')); ?>

                        </div>
                    <?php endif; ?>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="">
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
    </div>


    <div class="row Error">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Please Sign In</h3>
                </div>
                <div class="panel-body">
                        <form action="<?php echo e(url('signin')); ?>" method="post">
                            <div class="form-group">
                                <input class="form-control" type="email" placeholder="Enter your email...." name="email"  autofocus>
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="password" placeholder="Enter your password...." name="password"  autofocus>
                            </div>
                            <button class="btn btn-info" type="submit">Sign In</button>
                            <input type="hidden" name="_token" value="<?php echo e(Session::token()); ?>">
                        </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php /*</body>*/ ?>

</html>

<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>