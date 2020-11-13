@extends('master')

@section('title')

    Change Password
@endsection

@section('content')

    @include('admin.header.header')
    <br>
    <br>
    <br>


    <div class="row">
        <div class=" col-md-offset-3 col-md-6">
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
        <div class="col-md-offset-3 col-xs-6">


            <div class=" panel panel-default changePasswordPanel">
                <div class="panel-heading">
                    <h3 class="panel-title">Change Password</h3>
                </div>
                <div class="panel-body">
                    <form action="{{url('/passwordPage')}}" method="post">

                        <div class="form-group">
                            <label for="newPassword">New Password</label>
                            <input class="form-control" type="password" name="newPassword" id="newPassword" autofocus>
                        </div>
                        <div class="form-group">
                            <label for="confirmationPassword">Confirm Password</label>
                            <input class="form-control" type="password" name="confirmationPassword"
                                   id="confirmationPassword" autofocus>
                        </div>

                        <button class="btn btn-info" type="submit">Save</button>
                        <a href="{{'/dashboard'}}" class="btn btn-info" type="submit">Cancel</a>
                        <input type="hidden" name="_token" value="{{Session::token()}}">


                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection