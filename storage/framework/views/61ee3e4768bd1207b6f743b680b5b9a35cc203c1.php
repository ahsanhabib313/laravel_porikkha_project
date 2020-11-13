<?php $__env->startSection('title'); ?>
    Create a Tabulation Sheet
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.header.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <div class="row UserDeleteContent gradesheettop">
        <div class="col-md-12">
            <form action="<?php echo e(url('/dashboard/tabulationSheet/create')); ?> " method="post">
                <table class="table table-responsive  table-bordered table-hover text-center">
                    <tbody>
                    <thead>
                    <tr>
                        <td><strong>Student <br>Id</strong></td>
                        <td><strong>Semester</strong></td>

                        <td><strong>Student <br>Name</strong></td>
                        <td><strong>Exam<br>Roll</strong></td>
                        <td><strong>Class <br>Roll</strong></td>
                        <td><strong>Hall <br>Name</strong></td>

                        <?php foreach($courses as $course): ?>
                            <td><strong><?php echo e($course->course_name); ?><br>(<?php echo e($course->course_code); ?>)</strong></td>
                        <?php endforeach; ?>
                        <td><strong> <?php echo e($semester); ?><sup>th</sup> Semester GPA</strong></td>
                        <td><strong>Up to <?php echo e($semester); ?><sup>th</sup> semester CGPA</strong></td>
                    </tr>
                    </thead>


                    <tr>
                        <?php foreach($student as $student): ?>
                            <td id=""><input class="form-control  " name="student_id[]" readonly

                                             value="<?php echo e($student->student_id); ?>">
                            </td>
                            <td id=""><input class="form-control  " name="semester[]"readonly
                                             value="<?php echo e($semester); ?>">

                            </td>



                            <td id=""><input class="form-control  " name=""readonly
                                             value="<?php echo e($student->student_name); ?>">

                            </td>
                            <td id=""><input class="form-control  " name=""readonly
                                             value="<?php echo e($student->exam_roll); ?>">

                            </td>
                            <td id=""><input class="form-control  " name=""readonly
                                             value="<?php echo e($student->class_roll); ?>">

                            </td>
                            <td id=""><input class="form-control  " name=""readonly
                                             value="<?php echo e($student->hall_name); ?>">

                            </td>


                            <?php foreach($courses as $course): ?>
                                <?php $grade_sheet = \App\GradeSheet::where('student_id', $student->student_id)->where('course_id', $course->course_id)->first();

                                ?>
                                <?php if($grade_sheet!=null): ?>
                                    <td id=""><input class="form-control  " name=""readonly
                                                     value="<?php echo e($grade_sheet->grade); ?>">
                                    </td>

                                <?php endif; ?>

                            <?php endforeach; ?>

                            <td>
                                <?php  $prev_grade = 0;
                                $gpa = 0;
                                $cur_sem_gpa=0;?>

                                <?php foreach($courses as $course): ?>
                                    <?php $grade_sheet = \App\GradeSheet::where('student_id', $student->student_id)->where('course_id', $course->course_id)->first();
                                    $gpa = $grade_sheet->grade;
                                            $prev_grade = $prev_grade +$gpa;

                                    ?>
                                <?php endforeach; ?>

                                    <?php $total_gpa= $prev_grade/6 ?>

                                    <input class="form-control  " name="cur_sem_gpa[]"readonly
                                           value="<?php echo e(number_format($total_gpa,2)); ?>">


                            </td>


                            <td>

                                <?php if($semester == 1): ?>
                                  <?php $upto_cgpa = $total_gpa ?>

                                      <input class="form-control  " name="upto_cur_sem_cgpa[]"readonly
                                             value="<?php echo e(number_format($upto_cgpa,2)); ?>">

                                <?php elseif($semester >1): ?>

                                    <?php
                                         $prev_semester = $semester -1;
                                    $tabulation = \App\TabulationSheet::where('student_id', $student->student_id)->where('semester', $prev_semester)->first();
                                         $prev_cgpa = $tabulation->upto_cur_sem_cgpa;

                                        $upto_cgpa = (($prev_cgpa*$prev_semester)+$total_gpa)/$semester;

                                    ?>
                                        <input class="form-control  " name="upto_cur_sem_cgpa[]" readonly
                                               value="<?php echo e(number_format($upto_cgpa,2)); ?>">
                                    <?php endif; ?>
                            </td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
                <div class="pull-right">
                    <button class="btn btn-info  " type="submit">Create</button>
                    <a href="<?php echo e(url('/dashboard')); ?>" class="btn btn-primary " type="submit">Cancel</a>
                    <input type="hidden" name="_token" value="<?php echo e(Session::token()); ?>">
                </div>

            </form>

        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>