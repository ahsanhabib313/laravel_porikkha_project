@extends('master')

@section('title')
    Create Notice
    @endsection


@section('content')

    @include('admin.header.header')
    <div class="row gradesheettop">
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

    <div class="row UserDeleteContent">
        <div class=" col-md-offset-2 col-md-8">
            <h2>Create a notice</h2>

                <form action="{{url('/dashboard/notice/create')}}" method="post">
                    <div class="jumbotron ">

                    <div class="form-group">
                        <label for="title">Title</label>
                        <input class="form-control" type="text" name="title" id="title" value="{{Request::old('title')}}">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control"  name="content" id="content" placeholder="write something......"  rows="10" value="{{Request::old('content')}}"></textarea>
                    </div>
                        <div class="form-group">
                            <label for="date">Date</label>
                            <input class="form-control" type="date" name="date" id="date" value="{{Request::old('date')}}">
                        </div>
                        <button class="btn btn-primary " type="submit">Submit</button>
                        <a href="{{url('/dashboard')}}" class="btn btn-info " type="submit">Cancel</a>
                        <input type="hidden" name="_token" value="{{Session::token()}}">
                    </div>
                </form>


        </div>
    </div>

@endsection