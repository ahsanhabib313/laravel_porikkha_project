@extends('master');
@section('title')
    Update Student Record
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
                        <h3 class="panel-title">Update Student Record</h3>
                    </div>
                    <div class="panel-body">
                        <form  action="{{url('dashboard/student/edit/update')}}/{{$student->student_id}}" method="post">
                            <div class="form-group">
                                <label for="std_name">Name</label>
                                <input class="form-control" type="text" name="std_name" id="std_name" value="{{$student->student_name}}">
                            </div>
                            <div class="form-group">
                                <label for="class_roll">Class Roll</label>
                                <input class="form-control" type="text" name="class_roll" id="class_roll" value="{{$student->class_roll}}">
                            </div>
                            <div class="form-group">
                                <label for="exam_roll">Exam Roll</label>
                                <input class="form-control" type="text" name="exam_roll" id="exam_roll" value="{{$student->exam_roll}}">
                            </div>

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

                            <div class="form-group">
                                <label for="session">Year</label>
                                <input class="form-control" type="text" name="session" id="session" value="{{$student->session}}">
                            </div>

                            <div class="form-group">
                                <label for="reg_num">Registration Number</label>
                                <input class="form-control" type="text" name="reg_num" id="reg_num" value="{{$student->reg_num}}">
                            </div>

                            <div class="form-group">
                                <label for="hall_name">Hall Name</label>
                                <input class="form-control" type="text" name="hall_name" id="hall_name" value="{{$student->hall_name}}">
                            </div>



                            <button class="btn btn-info" type="submit">Submit</button>
                            <a href="{{url('/dashboard/student/edit')}}" class="btn btn-info" type="submit">Cancel</a>
                            <input type="hidden" name="_token" value="{{Session::token()}}">


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection