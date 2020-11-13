@extends('master')

@section('title')
    view Course Record
@endsection
@section('content')
    @include('admin.header.header')

    <br>
    <br>

    <div class="row UserDeleteContent UsderDeleteH1">
        <div class="col-md-12">

            <h1> view Course Record List</h1>
        </div>
    </div>

    <div class="row  UserDeleteContent">
        <div class="col-md-12">
            <table class="table table-responsive table-bordered">
                <tbody>

                <tr>

                    <td><strong>Course Name</strong></td>
                    <td><strong>Course Code</strong></td>
                    <td><strong>Course Credit</strong></td>
                    <td><strong>Course Teacher</strong></td>
                    <td><strong>Semester</strong></td>


                </tr>

                @foreach($course as $course)
                    <tr>
                        <td>{{$course->course_name}}</td>
                        <td>{{$course->course_code}}</td>
                        <td>{{$course->course_credit}}</td>
                        <td>{{$course->course_teacher}}</td>
                        <td>{{$course->semester}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>


@endsection