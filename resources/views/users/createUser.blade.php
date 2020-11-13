@extends('master')
{!! Html::style('css/createUser.css') !!}
@section('title')
    Create User
@endsection

@section('content')
    @include('admin.header.header')
    <br>
    <br>
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
        <div class="col-md-offset-3 col-md-6">

            @if (Session::has('message_email'))
                <div class="alert alert-danger">
                    {{ Session::get('message_email')}}
                </div>
            @endif

        </div>
    </div>
    <div class="row">
        <div class=" col-md-offset-3 col-md-6 col-sm-12 col-xs-12 ">


            <div class=" panel panel-default createUserPanel">
                <div class="panel-heading">
                    <h3 class="panel-title">Create User</h3>
                </div>
                <div class="panel-body">
                    <form action="{{url('/createUser')}}" method="post">
                        <div class="form-group">
                            <label for="username">User Name</label>
                            <input class="form-control" type="text" name="username" id="username"
                                   value="{{Request::old('username')}}">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input class="form-control" type="email" name="email" id="email"
                                   value="{{Request::old('email')}}">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input class="form-control" type="password" name="password" id="password"
                                   value="{{Request::old('password')}}">
                        </div>
                        <div class="form-group">
                            <label for="role">Role</label>
                            <select class="form-control" name="role">
                                <option value=""></option>
                                <option value="Coordinator">Coordinator</option>
                                <option value="Admin">Admin</option>
                                <option value="Teacher">Teacher</option>
                                <option value="Program Officer">Program Officer</option>
                                <option value="Student">Student</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="smester">Semester</label>
                            <select class="form-control" name="semester">
                                <option value=" "></option>
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
                        <button class="btn btn-primary" type="submit">Create</button>
                        <a href="{{url('/dashboard')}}" class="btn btn-info " type="submit">Cancel</a>
                        <input type="hidden" name="_token" value="{{Session::token()}}">


                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection