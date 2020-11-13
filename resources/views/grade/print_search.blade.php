@extends('master')
@section('title')
    Print Grade Sheet
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
    <div class="row  Error UserDeleteContent">
        <div class="col-md-offset-4 col-md-5 col-sm-12 col-xs-12">
            <h3>Which Grade Sheet do you want to Print?</h3>
            <hr>
        </div>
    </div>

    <div class="row UserDeleteContent">
        <div class="col-md-offset-4 col-md-5 col-sm-12 col-xs-12">
            <form action="{{url('dashboard/gradeSheet/print')}}" method="post">
                <div class="jumbotron">
                    <div class="form-group ">
                        <label for="course_name">Course Name</label>
                        <select class="form-control" name="course_id">
                            <option value=""></option>
                            @foreach($course as $course)
                                <option value="{{$course->course_id}}">{{$course->course_name}}</option>
                            @endforeach

                        </select>
                    </div>


                    <button class="btn btn-info" type="submit">Search</button>
                    <a href="{{url('/dashboard')}}" class="btn btn-info" type="submit">Cancel</a>
                    <input type="hidden" name="_token" value="{{Session::token()}}">
                </div>

            </form>
        </div>
    </div>






@endsection