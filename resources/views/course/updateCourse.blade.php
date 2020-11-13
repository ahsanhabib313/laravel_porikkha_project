@extends('master');
@section('title')
    Update Course Record
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
        <div class=" col-md-offset-3 col-md-6 col-sm-12 col-xs-12 ">


            <div class=" panel panel-default createUserPanel">
                <div class="panel-heading">
                    <h3 class="panel-title">Update Course Record</h3>
                </div>
                <div class="panel-body">
                    <form  action="{{url('/dashboard/course/edit')}}/{{$course->course_id}}" method="post">
                        <div class="form-group">
                            <label for="course_name">Course Name</label>
                            <input class="form-control" type="text" name="course_name" id="course_name" value="{{$course->course_name}}">
                        </div>
                        <div class="form-group">
                            <label for="course_code">Course Code</label>
                            <input class="form-control" type="text" name="course_code" id="course_code" value="{{$course->course_code}}">
                        </div>
                        <div class="form-group">
                            <label for="course_credit">Course Credit</label>
                            <input class="form-control" type="text" name="course_credit" id="course_credit" value="{{$course->course_credit}}">
                        </div>
                        @if($user->role=='Program Officer')
                        <div class="form-group">
                            <label for="course_teacher">Course Teacher</label>
                            <input readonly class="form-control" type="text" name="course_teacher" id="course_teacher" value="{{$course->course_teacher}}">
                        </div>
                        @else
                            <div class="form-group">
                                <label for="course_teacher">Course Teacher</label>
                                <input  class="form-control" type="text" name="course_teacher" id="course_teacher" value="{{$course->course_teacher}}">
                            </div>

                        @endif


                        <div class="form-group">
                            <label for="semester">Semester</label>
                            <select class="form-control" name="semester" >
                                <option value=""></option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                            </select>
                        </div>
                        <button class="btn btn-info" type="submit">Save</button>
                        <a href="{{url('/dashboard/course/edit')}}" class="btn btn-info" type="submit">Cancel</a>
                        <input type="hidden" name="_token" value="{{Session::token()}}">


                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection