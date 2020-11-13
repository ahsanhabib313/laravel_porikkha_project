@extends('master')
@section('title')
    Total Mark Distribution
@endsection

@section('content')
    @include('admin.header.header')

    <div class="row">
        <div class="col-md-offset-3 col-md-6">
            <div class="Error">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif


            </div>

        </div>

    </div>
    <div class="row">
        <div class="col-md-offset-3 col-md-6">
            @if (Session::has('message'))
                <div class="alert alert-success">
                    {{ Session::get('message')}}
                </div>
            @endif

        </div>
    </div>
    <div class="row">
        <div class=" col-md-offset-3 col-md-6 col-sm-12 col-xs-12 ">
            <div class=" panel panel-default createUserPanel">
                <div class="panel-heading">
                    <h3 class="panel-title"> Total Mark Distribution</h3>
                </div>
                <div class="panel-body">
                    <form action="{{url('dashboard/mark/create')}}" method="post">
                        <div class="form-group">
                            <label for="course_id">Course Name</label>
                            <select class="form-control" name="course_id">
                                <option value=""></option>
                                @foreach($courses as $course)
                                    <option value="{{$course->course_id}}">{{$course->course_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="class_test_1_total">Total Mark of Class Test-1</label>
                            <input class="form-control" name="class_test_1_total" id="class_test_1_total">
                        </div>
                        <div class="form-group">
                            <label for="class_test_2_total">Total Mark of Class Test-2</label>
                            <input class="form-control" name="class_test_2_total" id="class_test_2_total">
                        </div>
                        <div class="form-group">
                            <label for="assignment_total">Total Mark of Assignment</label>
                            <input class="form-control" name="assignment_total" id="assignment_total">
                        </div>
                        <div class="form-group">
                            <label for="mid_1_total">Total Mark of Mid-1</label>
                            <input class="form-control" name="mid_1_total" id="mid_1_total">
                        </div>
                        <div class="form-group">
                            <label for="mid_2_total">Total Mark of Mid-2</label>
                            <input class="form-control" name="mid_2_total" id="mid_2_total">
                        </div>
                        <div class="form-group">
                            <label for="lab_total">Total Mark of Lab</label>
                            <input class="form-control" name="lab_total" id="lab_total">
                        </div>
                        <div class="form-group">
                            <label for="cont_evaluation_total">Total Mark of Continous Evaluation</label>
                            <input class="form-control" name="cont_evaluation_total" id="cont_evaluation_total">
                        </div>
                        <div class="form-group">
                            <label for="final_exam_mark">Total Final Exam Mark</label>
                            <input class="form-control" name="final_exam_mark" id="final_exam_mark">
                        </div>
                        <div class="form-group">
                            <label for="total_mark">Total Mark</label>
                            <input class="form-control" name="total_mark" id="total_mark">
                        </div>
                        <div class="form-group">
                            <label for="gpa">Total GPA</label>
                            <input class="form-control" name="gpa" id="gpa" value="">
                        </div>
                        <div class="form-group">
                            <label for="cont_evaluation_total">Year</label>
                            <input class="form-control" name="year" id="year">
                        </div>
                        <button class="btn btn-info" type="submit">Create</button>
                        <a href="{{url('/dashboard')}}" class="btn btn-info" type="submit">Cancel</a>
                        <input type="hidden" name="_token" value="{{Session::token()}}">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
