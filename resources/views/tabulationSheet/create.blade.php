@extends('master')
@section('title')
    Create a Tabulation Sheet
@endsection

@section('content')
    @include('admin.header.header')

    <div class="row UserDeleteContent gradesheettop">
        <div class="col-md-12">
            <form action="{{url('/dashboard/tabulationSheet/create')}} " method="post">
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

                        @foreach($courses as $course)
                            <td><strong>{{$course->course_name}}<br>({{$course->course_code}})</strong></td>
                        @endforeach
                        <td><strong> {{$semester}}<sup>th</sup> Semester GPA</strong></td>
                        <td><strong>Up to {{$semester}}<sup>th</sup> semester CGPA</strong></td>
                    </tr>
                    </thead>


                    <tr>
                        @foreach($student as $student)
                            <td id=""><input class="form-control  " name="student_id[]" readonly

                                             value="{{$student->student_id}}">
                            </td>
                            <td id=""><input class="form-control  " name="semester[]"readonly
                                             value="{{$semester}}">

                            </td>



                            <td id=""><input class="form-control  " name=""readonly
                                             value="{{$student->student_name}}">

                            </td>
                            <td id=""><input class="form-control  " name=""readonly
                                             value="{{$student->exam_roll}}">

                            </td>
                            <td id=""><input class="form-control  " name=""readonly
                                             value="{{$student->class_roll}}">

                            </td>
                            <td id=""><input class="form-control  " name=""readonly
                                             value="{{$student->hall_name}}">

                            </td>


                            @foreach($courses as $course)
                                <?php $grade_sheet = \App\GradeSheet::where('student_id', $student->student_id)->where('course_id', $course->course_id)->first();

                                ?>
                                @if($grade_sheet!=null)
                                    <td id=""><input class="form-control  " name=""readonly
                                                     value="{{$grade_sheet->grade}}">
                                    </td>

                                @endif

                            @endforeach

                            <td>
                                <?php  $prev_grade = 0;
                                $gpa = 0;
                                $cur_sem_gpa=0;?>

                                @foreach($courses as $course)
                                    <?php $grade_sheet = \App\GradeSheet::where('student_id', $student->student_id)->where('course_id', $course->course_id)->first();
                                    $gpa = $grade_sheet->grade;
                                            $prev_grade = $prev_grade +$gpa;

                                    ?>
                                @endforeach

                                    <?php $total_gpa= $prev_grade/6 ?>

                                    <input class="form-control  " name="cur_sem_gpa[]"readonly
                                           value="{{number_format($total_gpa,2)}}">


                            </td>


                            <td>

                                @if($semester == 1)
                                  <?php $upto_cgpa = $total_gpa ?>

                                      <input class="form-control  " name="upto_cur_sem_cgpa[]"readonly
                                             value="{{number_format($upto_cgpa,2)}}">

                                @elseif($semester >1)

                                    <?php
                                         $prev_semester = $semester -1;
                                    $tabulation = \App\TabulationSheet::where('student_id', $student->student_id)->where('semester', $prev_semester)->first();
                                         $prev_cgpa = $tabulation->upto_cur_sem_cgpa;

                                        $upto_cgpa = (($prev_cgpa*$prev_semester)+$total_gpa)/$semester;

                                    ?>
                                        <input class="form-control  " name="upto_cur_sem_cgpa[]" readonly
                                               value="{{number_format($upto_cgpa,2)}}">
                                    @endif
                            </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="pull-right">
                    <button class="btn btn-info  " type="submit">Create</button>
                    <a href="{{url('/dashboard')}}" class="btn btn-primary " type="submit">Cancel</a>
                    <input type="hidden" name="_token" value="{{Session::token()}}">
                </div>

            </form>

        </div>
    </div>

@endsection
