

@extends('master')

@section('title')
    view Notice
@endsection
@section('content')
    @include('admin.header.header')
    <div class="container">

        <div class="row  UserDeleteContent gradesheettop">
            <div class="col-md-12">

                @foreach($notices as $notice)
                    <div class="jumbotron">
                        <h2 class="text-center text-capitalize"><b>Regular Program Office</b></h2>
                        <h2 class="text-center text-capitalize"><b>Institute of Information Technology (IIT)</b></h2>
                        <h2 class="text-center text-capitalize"><b>University of Dhaka</b></h2>
                        <br>


    <h2 class="text-center text-capitalize ">{{$notice->title}}</h2>
    <h3 class=""><b>Date:</b> {{$notice->date}}</h3>

                        <p class="text-justify">{{$notice->content}}</p>

                    </div>

                    <hr>
                @endforeach

            </div>
        </div>
    </div>


@endsection