@extends('master')

@section('title')
    Delete Total Mark
@endsection
@section('content')
    @include('admin.header.header')
    <div class="row " >
        <div class="col-md-12">
            <div class="Error">
                @if (Session::has('message'))
                    <div class="alert alert-success">
                        {{ Session::get('message')}}
                    </div>
                @endif

            </div>
        </div>
    </div>
    <div class="row UserDeleteContent UsderDeleteH1">
        <div class="col-md-12">

            <h1>  Delete Total Mark</h1>
        </div>
    </div>

    <div class="row  UserDeleteContent">
        <div class="col-md-12">
            <table class="table table-responsive table-bordered">
                <tbody>

                <tr>

                    <td>Course Name</td>
                    <td>Course Teacher</td>
                    <td>Class Test-1</td>
                    <td>Class Test-2</td>
                    <td>Assignment</td>
                    <td> Mid-1</td>
                    <td>Mid-2</td>
                    <td>Lab</td>
                    <td>Continous Evaluation</td>
                    <td>Final Exam Mark</td>
                    <td>Total mark</td>
                    <td>Total GPA</td>
                    <td>Year</td>
                    <td>Action</td>

                </tr>

                @foreach($totalmarks as $totalmark)
                    <tr>
                        <td>{{$totalmark->course->course_name}}</td>
                        <td>{{$totalmark->course->course_teacher}}</td>
                        <td>{{$totalmark->class_test_1_total}}</td>
                        <td>{{$totalmark->class_test_2_total}}</td>
                        <td>{{$totalmark->assignment_total}}</td>
                        <td>{{$totalmark->mid_1_total}}</td>
                        <td>{{$totalmark->mid_2_total}}</td>
                        <td>{{$totalmark->lab_total}}</td>
                        <td>{{$totalmark->cont_evaluation_total}}</td>
                        <td>{{$totalmark->final_exam_mark}}</td>
                        <td>{{$totalmark->total_mark}}</td>
                        <td>{{$totalmark->gpa}}</td>
                        <td>{{$totalmark->year}}</td>
                        <td><a class="btn  btn-danger" href="{{url('dashboard/mark/delete')}}/{{$totalmark->id}}"> Delete </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>


@endsection