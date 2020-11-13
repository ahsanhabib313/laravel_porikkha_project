@extends('master')

@section('title')
    Student Record list
@endsection
@section('content')
    @include('admin.header.header')

    <br>
    <br>
    <div class="row">
        <div class="col-md-12">

            @if (Session::has('message'))
                <div class="alert alert-success">
                    {{ Session::get('message')}}
                </div>
            @endif

        </div>
    </div>
    <div class="row UserDeleteContent UsderDeleteH1">
        <div class="col-md-12">

            <h1>Student Record List</h1>
        </div>
    </div>

    <div class="row  UserDeleteContent">
        <div class="col-md-12">
            <table class="table table-responsive table-bordered">
                <tbody>

                <tr>

                    <td><strong>Student Name</strong></td>
                    <td><strong>Class Roll</strong></td>
                    <td><strong>Exam Roll</strong></td>
                    <td><strong>Email</strong></td>
                    <td><strong>Semester</strong></td>
                    <td><strong>Registration Number</strong></td>
                    <td><strong>Year</strong></td>
                    <td><strong>Hall Name</strong></td>


                </tr>

                @foreach($data as $data)
                    <tr>
                        <td>{{$data->student_name}}</td>
                        <td>{{$data->class_roll}}</td>
                        <td>{{$data->exam_roll}}</td>
                        <td>{{$data->user->email}}</td>
                        <td>{{$data->cur_semester}}</td>
                        <td>{{$data->reg_num}}</td>
                        <td>{{$data->session}}</td>
                        <td>{{$data->hall_name}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>


@endsection