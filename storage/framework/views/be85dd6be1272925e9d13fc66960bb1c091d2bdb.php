<?php $__env->startSection('title'); ?>
    User Information
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-xs-6">
            <div class=" panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Create User</h3>
                </div>
                <div class="panel-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="username">User Name</label>
                            <input class="form-control" type="text" name="username" id="username">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input class="form-control" type="email" name="email" id="email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input class="form-control" type="password" name="password" id="password">
                        </div>
                        <div class="form-group">
                            <label for="role">Role</label>
                            <input class="form-control" type="text" name="role" id="role">
                        </div>
                        <div class="form-group">
                            <label for="semester">Semester</label>
                            <input class="form-control" type="number" name="semester" id="semester">
                        </div>
                        <button class="btn btn-info" type="submit">Submit</button>


                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>