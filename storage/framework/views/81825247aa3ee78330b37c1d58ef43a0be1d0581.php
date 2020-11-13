<?php $__env->startSection('title'); ?>
    Create Notice
    <?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('admin.header.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="row gradesheettop">
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

    <div class="row UserDeleteContent">
        <div class=" col-md-offset-2 col-md-8">
            <h2>Create a notice</h2>

                <form action="<?php echo e(url('/dashboard/notice/create')); ?>" method="post">
                    <div class="jumbotron ">

                    <div class="form-group">
                        <label for="title">Title</label>
                        <input class="form-control" type="text" name="title" id="title" value="<?php echo e(Request::old('title')); ?>">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control"  name="content" id="content" placeholder="write something......"  rows="10" value="<?php echo e(Request::old('content')); ?>"></textarea>
                    </div>
                        <div class="form-group">
                            <label for="date">Date</label>
                            <input class="form-control" type="date" name="date" id="date" value="<?php echo e(Request::old('date')); ?>">
                        </div>
                        <button class="btn btn-primary " type="submit">Submit</button>
                        <a href="<?php echo e(url('/dashboard')); ?>" class="btn btn-info " type="submit">Cancel</a>
                        <input type="hidden" name="_token" value="<?php echo e(Session::token()); ?>">
                    </div>
                </form>


        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>