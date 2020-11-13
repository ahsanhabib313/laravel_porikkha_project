@extends('master')
@section('title')
    Search Course Record...
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
        <div class="col-md-offset-3 col-md-6  ">

            @if (Session::has('message'))
                <div class="alert alert-success">
                    {{ Session::get('message')}}
                </div>
            @endif

        </div>
    </div>
    <div class="row  Error UserDeleteContent">
        <div class="col-md-offset-4 col-md-5 col-sm-12 col-xs-12">
            <h3>Which semester Courses do you want to view....?</h3>
            <hr>
        </div>
    </div>

    <div class="row UserDeleteContent">
        <div class="col-md-offset-4 col-md-5 col-sm-12 col-xs-12">
            <form action="{{url('/dashboard/course/view/search')}}" method="post">
                <div class="jumbotron">
                    <div class="form-group ">
                        <label for="semester">Semester</label>
                        <select class="form-control" name="semester">
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


                    <button class="btn btn-info" type="submit">Search</button>
                    <a href="{{url('/dashboard')}}" class="btn btn-info" type="submit">Cancel</a>
                    <input type="hidden" name="_token" value="{{Session::token()}}">
                </div>

            </form>
        </div>
    </div>






@endsection