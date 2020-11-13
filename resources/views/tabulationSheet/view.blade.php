@extends('master')

@section('title')
    View a Tabulation Sheet
@endsection

@section('content')
    @include('admin.header.header')
    <div class="row gradesheettop UserDeleteContent ">
        <div class="col-md-12 text-center  ">
            <div class="jumbotron">
                <h4><strong>{{$semester}}<sup>th</sup> Semester BSSE (Honor's)</strong></h4>
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
                    @foreach($courses as $course)
                        <td><strong>{{$course->course_name}}<br>({{$course->course_code}})</strong></td>
                    @endforeach
                    <td><strong><u>{{$semester}}<sup>th</sup> Semester GPA</u> </strong></td>
                    @if($semester==1)

                        <td><strong><u>Up to {{$semester}}<sup>th</sup> semester CGPA</u></strong></td>
                    @elseif($semester>1)
                        <td><strong><u>Up to {{$semester-1}}<sup>th</sup> semester CGPA</u></strong></td>
                        <td><strong><u>Up to {{$semester}}<sup>th</sup> semester CGPA</u></strong></td>
                    @endif
                </tr>
                </thead>


                <tr>
                    @foreach($tabulation as $tabulations)

                        <td id="">{{$tabulations->student->exam_roll}}
                        </td>
                        <td id="">{{$tabulations->student->hall_name}}
                        </td>
                        <td id="">{{$tabulations->student->student_name}}
                        </td>
                        @foreach($courses as $course)
                            <?php $grade_sheet = \App\GradeSheet::where('student_id', $tabulations->student->student_id)->where('course_id', $course->course_id)->first();

                            ?>
                            @if($grade_sheet!=null)
                                <td>
                                    {{$grade_sheet->grade}}
                                </td>

                            @endif

                        @endforeach
                        <td id="">{{number_format($tabulations->cur_sem_gpa,2) }}
                        </td>
                        <?php

                        $prev_semester = $semester - 1;
                        $tabulation = \App\TabulationSheet::where('semester', $prev_semester)->where('student_id', $tabulations->student->student_id)->first();

                        ?>
                        @if($semester ==1)



                            <td id="">{{number_format($tabulations->upto_cur_sem_cgpa,2) }}
                            </td>
                        @elseif($semester>1)
                            <td id="">{{number_format($tabulation->upto_cur_sem_cgpa,2) }}
                            </td>
                            <td id="">{{number_format($tabulations->upto_cur_sem_cgpa,2) }}
                            </td>

                        @endif

                </tr>
                @endforeach
                </tbody>
            </table>


        </div>
    </div>



@endsection
