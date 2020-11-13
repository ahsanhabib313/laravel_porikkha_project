@extends('master')
@section('title')
Edit Grade Sheet
@endsection

@section('content')
    @include('admin.header.header')
    <div class="row">
        <div class="col-md-offset-3 col-md-6">

            @if (Session::has('message'))
                <div class="alert alert-success">
                    {{ Session::get('message')}}
                </div>
            @endif

        </div>
    </div>
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
            <form name="addem" id="addem" action="{{url('/dashboard/gradeSheet/update')}} " method="post">
                <table class="table table-responsive  table-bordered table-hover text-center">
                    <tbody>
                    <thead>
                    <tr class="text-center">

                        <td><strong>Gradesheet<br>Id</strong></td>
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

                            <td id=""><input class="form-control  " name="grade_id[]" readonly
                                             value="{{$gradesheet->grade_id}}"></td>
                            <td id="class_roll_grade"><input class="form-control  " name="class_roll" readonly
                                                             value="{{$gradesheet->student->class_roll}}"></td>
                            <td id="student_name_grade"><input class="form-control  " name="student_name" readonly
                                                               value="{{$gradesheet->student->student_name}}"></td>

                            <td><input  class="form-control  " name="class_test-1[]"
                                       value="{{$gradesheet->class_test_1 }}" min="0" max="{{$totalmarks->class_test_1_total}}"></td>
                            <td><input  class="form-control  " name="class_test-2[]"
                                       value="{{$gradesheet->class_test_2}}" min="0" max="{{$totalmarks->class_test_2_total}}" ></td>
                            <td><input  class="form-control  " name="assignment[]"
                                       value="{{$gradesheet->assignment}}" min="0" max="{{$totalmarks->assignment_total}}"></td>
                            <td><input  class="form-control " name="mid_term-1[]"
                                       value="{{$gradesheet->mid_1}}" min="0" max="{{$totalmarks->mid_1_total}}"></td>
                            <td><input  class="form-control  " name="mid_term-2[]"
                                       value="{{$gradesheet->mid_2}}" min="0" max="{{$totalmarks->mid_2_total}}" ></td>
                            <td><input  class="form-control  " name="lab[]" value="{{$gradesheet->lab}}" min="0" max="{{$totalmarks->lab_total}}"
                                       ></td>
                            <td><input  class="form-control  " name="cont_evaluation[]" min="0" max="{{$totalmarks->cont_evaluation_total}}"
                                       value="{{$gradesheet->cont_evaluation}}" ></td>
                            <td><input  class="form-control  " name="final_exam[]"
                                       value="{{$gradesheet->final_mark}}"  min="0" max="{{$totalmarks->final_exam_mark}}"></td>
                            <td><input  class="form-control  " name="total_mark[]"
                                       value="{{$gradesheet->total_mark}}" readonly></td>
                            <td><input  class="form-control  " name="grade[]" value="{{$gradesheet->grade}}" readonly>
                            </td>


                        </tr>
                        @endforeach
                        </tbody>
                </table>
                <div class="pull-right">
                    <button class="btn btn-info  " type="submit">Update</button>
                    <a href="{{url('/dashboard')}}" class="btn btn-primary " type="submit">Cancel</a>
                    <input type="hidden" name="_token" value="{{Session::token()}}">
                </div>
            </form>

        </div>
    </div>

@endsection
