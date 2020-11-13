@extends('master')
@section('title')
View Grade Sheet
@endsection

@section('content')
    @include('admin.header.header')
    <div class="row gradesheettop UserDeleteContent jumbotron ">
        <div class="col-md-6">
            <h4><strong>Course Name:</strong>{{" "}}{{$courseNames->course_name}}</h4>
            <h4><strong>Course Code:</strong>{{" "}}{{$courseNames->course_code}}</h4>
            <h4><strong>Course Teacher:</strong>{{" "}}{{$courseNames->course_teacher}}</h4>
            <h4><strong>Semester:</strong>{{" "}}{{$courseNames->semester}}</h4>
            <h4><strong>Year:</strong>{{" "}}{{$year}}</h4>
        </div>
    </div>

    <div class="row UserDeleteContent">
        <div class="col-md-12">

                <table class="table table-responsive  table-bordered table-hover text-center">
                    <tbody>
                    <thead>
                    <tr >

                        <td><strong>Exam <br>Roll</strong></td>
                        <td><strong>Class <br>Roll</strong></td>
                        <td><strong>Student <br>Name</strong></td>
                        <td><strong>Class Test-1<br>({{$totalmarks->class_test_1_total}})</strong></td>
                        <td><strong>Class Test-2<br>({{$totalmarks->class_test_2_total}})</strong></td>
                        <td><strong>Assignment <br>({{$totalmarks->assignment_total}})</strong></td>
                        <td><strong>Mid Term-1<br>({{$totalmarks->mid_1_total}})</strong></td>
                        <td><strong>Mid Term-2<br>({{$totalmarks->mid_2_total}})</strong></td>
                        <td><strong>Lab<br>({{$totalmarks->lab_total}})</strong></td>
                        <td><strong>Continous<br>Evaluation<br>({{$totalmarks->cont_evaluation_total}})</strong></td>
                        <td><strong>Final<br>Exam<br>Mark</strong><br>({{$totalmarks->final_exam_mark}})</td>
                        <td><strong>Total<br>Mark</strong><br>({{$totalmarks->total_mark}})</td>
                        <td><strong>GPA</strong><br>({{$totalmarks->gpa}})</td>


                    </tr>
                    </thead>
                    @foreach($gradesheet as $gradesheet)
                        <tr>

                            <td>{{$gradesheet->student->exam_roll}}</td>
                            <td>{{$gradesheet->student->class_roll}}</td>
                            <td>{{$gradesheet->student->student_name}}</td>
                            <td>{{$gradesheet->class_test_1}}</td>
                            <td>{{$gradesheet->class_test_2}}</td>
                            <td>{{$gradesheet->assignment}}</td>
                            <td>{{$gradesheet->mid_1}}</td>
                            <td>{{$gradesheet->mid_2}}</td>
                            <td>{{$gradesheet->lab}}</td>
                            <td>{{$gradesheet->cont_evaluation}}</td>
                            <td>{{$gradesheet->final_mark}}</td>
                            <td>{{$gradesheet->total_mark}}</td>
                            <td>{{$gradesheet->grade}}</td>
                        </tr>
                        @endforeach
                        </tbody>
                </table>

            <a href="{{url('/dashboard')}}" class="btn btn-primary pull-right btn-lg" >Cancel</a>
        </div>
    </div>

@endsection
