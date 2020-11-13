

@extends('master')

@section('title')
    Delete Notice
@endsection
@section('content')
    @include('admin.header.header')
<div class="container">
    <div class="row gradesheettop">
        <div class="col-md-12">
            <div class="Error">
                @if (Session::has('message'))
                    <div class="alert alert-success">
                        {{ Session::get('message')}}
                    </div>
                @endif

            </div>
        </div>
    </div>

    <div class="row  UserDeleteContent">
        <div class="col-md-12">

            @foreach($notices as $notice)
                <div class="jumbotron">
                <h2 class="text-center text-capitalize ">{{$notice->title}}</h2>
                <p class="text-justify">{{$notice->content}}</p>
                <h6>{{$notice->date}}</h6>
                <a class="btn  btn-danger btn-block " href="{{url('dashboard/notice/delete')}}/{{$notice->notice_id}}"> Delete</a>

            </div>

                <hr>
                @endforeach

        </div>
    </div>
</div>


@endsection