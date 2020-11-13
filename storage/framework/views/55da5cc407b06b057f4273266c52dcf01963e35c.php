<?php $__env->startSection('title'); ?>
    Print a Tabulation Sheet
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.header.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="row gradesheettop UserDeleteContent ">
        <div class="col-md-12 text-center  ">
            <div class="jumbotron">
                <h4><strong><?php echo e($semester); ?><sup>th</sup> Semester BSSE (Honor's)</strong></h4>
                <h3><strong> Software Engineering</strong></h3>
            </div>

        </div>
    </div>
    <div class="row UserDeleteContent ">
        <div class="col-md-12">
            <table class="table table-responsive  table-bordered table-hover text-center " style="color: white">
                <tbody>
                <thead>
                <tr>
                    <td><strong>Exam Roll</strong></td>
                    <td><strong>Hall Name</strong></td>
                    <td><strong>Student Name</strong></td>
                    <?php foreach($courses as $course): ?>
                        <td><strong><?php echo e($course->course_name); ?><br>(<?php echo e($course->course_code); ?>)</strong></td>
                    <?php endforeach; ?>
                    <td><strong><u><?php echo e($semester); ?><sup>th</sup>  Semester GPA</u> </strong></td>
                    <?php if($semester==1): ?>

                        <td><strong><u>Up to <?php echo e($semester); ?><sup>th</sup> semester CGPA</u></strong></td>
                    <?php elseif($semester>1): ?>
                        <td><strong><u>Up to <?php echo e($semester-1); ?><sup>th</sup> semester CGPA</u></strong></td>
                        <td><strong><u>Up to <?php echo e($semester); ?><sup>th</sup> semester CGPA</u></strong></td>
                    <?php endif; ?>
                </tr>
                </thead>


                <tr>
                    <?php foreach($tabulation as $tabulations): ?>

                        <td id=""><?php echo e($tabulations->student->exam_roll); ?>

                        </td>
                        <td id=""><?php echo e($tabulations->student->hall_name); ?>

                        </td>
                        <td id=""><?php echo e($tabulations->student->student_name); ?>

                        </td>
                        <?php foreach($courses as $course): ?>
                            <?php $grade_sheet = \App\GradeSheet::where('student_id', $tabulations->student->student_id)->where('course_id', $course->course_id)->first();

                            ?>
                            <?php if($grade_sheet!=null): ?>
                                <td>
                                    <?php echo e($grade_sheet->grade); ?>

                                </td>

                            <?php endif; ?>

                        <?php endforeach; ?>
                        <td id=""><?php echo e(number_format($tabulations->cur_sem_gpa,2)); ?>

                        </td>
                        <?php
                        $prev_semester = $semester -1;
                        $tabulation = \App\TabulationSheet::where('semester', $prev_semester)->where('student_id', $tabulations->student->student_id)->first();

                        ?>
                        <?php if($semester ==1): ?>



                            <td id=""><?php echo e(number_format($tabulations->upto_cur_sem_cgpa,2)); ?>

                            </td>
                        <?php elseif($semester>1): ?>
                            <td id=""><?php echo e(number_format($tabulation->upto_cur_sem_cgpa,2)); ?>

                            </td>
                            <td id=""><?php echo e(number_format($tabulations->upto_cur_sem_cgpa,2)); ?>

                            </td>

                        <?php endif; ?>
                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>



        </div>
    </div>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>