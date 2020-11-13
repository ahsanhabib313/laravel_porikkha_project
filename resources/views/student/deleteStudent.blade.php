@extends('master')

@section('title')
    Delete Student Record
@endsection
@section('content')
    @include('admin.header.header')

    <br>
    <br>
    <div class="row">
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

            <h1> Delete Student Record</h1>
        </div>
    </div>

    <div class="row  UserDeleteContent">
        <div class="col-md-12">
            <table class="table table-responsive table-bordered">
                <tbody>

                <tr>

                    <td>Student Name</td>
                    <td>Class Roll</td>
                    <td>Exam Roll</td>
                    <td>Semester</td>
                    <td>Registration Number</td>
                    <td>Year</td>
                    <td>Hall Name</td>
                    <td>Action</td>

                </tr>

                @foreach($data as $data)
                    <tr>

                        <td>{{$data->student_name}}</td>
                        <td>{{$data->class_roll}}</td>
                        <td>{{$data->exam_roll}}</td>
                        <td>{{$data->cur_semester}}</td>
                        <td>{{$data->reg_num}}</td>
                        <td>{{$data->session}}</td>
                        <td>{{$data->hall_name}}</td>
                        <td><a class="btn  btn-danger" href="{{url('dashboard/student/delete')}}/{{$data->student_id}}"> Delete</a> </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>


@endsection