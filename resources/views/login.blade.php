@extends('master')

    @section('title')
        Login
    @endsection

{{--<body class="body-Login-back">--}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="">
                    @if (Session::has('message'))
                        <div class="alert alert-danger">
                            {{ Session::get('message')}}
                        </div>
                    @endif

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="">
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
    </div>


    <div class="row Error">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Please Sign In</h3>
                </div>
                <div class="panel-body">
                        <form action="{{url('signin')}}" method="post">
                            <div class="form-group">
                                <input class="form-control" type="email" placeholder="Enter your email...." name="email"  autofocus>
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="password" placeholder="Enter your password...." name="password"  autofocus>
                            </div>
                            <button class="btn btn-info" type="submit">Sign In</button>
                            <input type="hidden" name="_token" value="{{Session::token()}}">
                        </form>
                </div>
            </div>
        </div>
    </div>
@endsection
{{--</body>--}}

</html>
