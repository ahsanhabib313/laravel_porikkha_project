<?php $__env->startSection('title'); ?>
    Delete User
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.header.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <br>
    <br>
    <div class="row Error">
        <div class="col-md-12">

            <?php if(Session::has('message')): ?>
                <div class="alert alert-success">
                    <?php echo e(Session::get('message')); ?>

                </div>
            <?php endif; ?>

        </div>
    </div>
    <div class="row UserDeleteContent UsderDeleteH1">
        <div class="col-md-12">

            <h1>User List</h1>
        </div>
    </div>

    <div class="row  UserDeleteContent">
        <div class="col-md-12">
            <table class="table table-responsive table-bordered">
                <tbody>

                <tr>

                    <td>User Name</td>
                    <td>Email</td>
                    <td>Role</td>
                    <td>Semester</td>
                    <td>Action</td>

                </tr>

                <?php foreach($data as $data): ?>
                    <tr>
                        <td><?php echo e($data->user_name); ?></td>
                        <td><?php echo e($data->email); ?></td>

                        <td><?php echo e($data->role); ?></td>
                        <td><?php echo e($data->semester); ?></td>
                        <td><a class="btn btn-danger" href="<?php echo e(url('deleteUser')); ?>/<?php echo e($data->user_id); ?>"> Delete</a></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>