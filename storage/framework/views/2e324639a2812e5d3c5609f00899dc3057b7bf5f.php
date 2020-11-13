;
<?php $__env->startSection('title'); ?>
   Create Student Record
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
       <div class="row">
          <div class=" col-md-offset-3 col-md-6 col-sm-12 col-xs-12 ">


             <div class=" panel panel-default createUserPanel">
                <div class="panel-heading">
                   <h3 class="panel-title">Create Student Record</h3>
                </div>
                <div class="panel-body">
                   <form  action="<?php echo e(url('dashboard/student/create')); ?>" method="post">
                      <div class="form-group">
                         <label for="std_name">Name</label>
                         <input class="form-control" type="text" name="std_name" id="std_name" value="<?php echo e(Request::old('std_name')); ?>">
                      </div>
                      <div class="form-group">
                         <label for="class_roll">Class Roll</label>
                         <input class="form-control" type="text" name="class_roll" id="class_roll" value="<?php echo e(Request::old('class_roll')); ?>">
                      </div>
                      <div class="form-group">
                         <label for="exam_roll">Exam Roll</label>
                         <input class="form-control" type="text" name="exam_roll" id="exam_roll" value="<?php echo e(Request::old('exam_roll')); ?>">
                      </div>
                      <div class="form-group">
                         <label for="user_id">Email</label>
                         <select class="form-control" name="user_id">
                            <option value=""></option>
                            <?php foreach($students as $student): ?>
                               <option value="<?php echo e($student->user_id); ?>"><?php echo e($student->email); ?></option>
                            <?php endforeach; ?>

                         </select>
                      </div>
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

                      <div class="form-group">
                         <label for="session">Year</label>
                         <input class="form-control" type="text" name="session" id="session" value="<?php echo e(Request::old('session')); ?>">
                      </div>

                      <div class="form-group">
                         <label for="reg_num">Registration Number</label>
                         <input class="form-control" type="text" name="reg_num" id="reg_num" value="<?php echo e(Request::old('reg_num')); ?>">
                      </div>

                      <div class="form-group">
                         <label for="hall_name">Hall Name</label>
                         <input class="form-control" type="text" name="hall_name" id="hall_name" value="<?php echo e(Request::old('hall_name')); ?>">
                      </div>
                      <button class="btn btn-info" type="submit">Create</button>
                      <a href="<?php echo e(url('/dashboard')); ?>" class="btn btn-info" type="submit">Cancel</a>
                      <input type="hidden" name="_token" value="<?php echo e(Session::token()); ?>">
                   </form>
                </div>
             </div>
          </div>
       </div>
    </div>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>