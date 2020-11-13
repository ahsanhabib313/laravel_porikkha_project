@extends('master');
@section('title')
   Create Student Record
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
       <div class="row">
          <div class=" col-md-offset-3 col-md-6 col-sm-12 col-xs-12 ">


             <div class=" panel panel-default createUserPanel">
                <div class="panel-heading">
                   <h3 class="panel-title">Create Student Record</h3>
                </div>
                <div class="panel-body">
                   <form  action="{{url('dashboard/student/create')}}" method="post">
                      <div class="form-group">
                         <label for="std_name">Name</label>
                         <input class="form-control" type="text" name="std_name" id="std_name" value="{{Request::old('std_name')}}">
                      </div>
                      <div class="form-group">
                         <label for="class_roll">Class Roll</label>
                         <input class="form-control" type="text" name="class_roll" id="class_roll" value="{{Request::old('class_roll')}}">
                      </div>
                      <div class="form-group">
                         <label for="exam_roll">Exam Roll</label>
                         <input class="form-control" type="text" name="exam_roll" id="exam_roll" value="{{Request::old('exam_roll')}}">
                      </div>
                      <div class="form-group">
                         <label for="user_id">Email</label>
                         <select class="form-control" name="user_id">
                            <option value=""></option>
                            @foreach($students as $student)
                               <option value="{{$student->user_id}}">{{$student->email}}</option>
                            @endforeach

                         </select>
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
                         <input class="form-control" type="text" name="session" id="session" value="{{Request::old('session')}}">
                      </div>

                      <div class="form-group">
                         <label for="reg_num">Registration Number</label>
                         <input class="form-control" type="text" name="reg_num" id="reg_num" value="{{Request::old('reg_num')}}">
                      </div>

                      <div class="form-group">
                         <label for="hall_name">Hall Name</label>
                         <input class="form-control" type="text" name="hall_name" id="hall_name" value="{{Request::old('hall_name')}}">
                      </div>
                      <button class="btn btn-info" type="submit">Create</button>
                      <a href="{{url('/dashboard')}}" class="btn btn-info" type="submit">Cancel</a>
                      <input type="hidden" name="_token" value="{{Session::token()}}">
                   </form>
                </div>
             </div>
          </div>
       </div>
    </div>
    @endsection