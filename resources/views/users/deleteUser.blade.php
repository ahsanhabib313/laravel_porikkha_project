@extends('master')

@section('title')
    Delete User
@endsection
@section('content')
    @include('admin.header.header')

    <br>
    <br>
    <div class="row Error">
        <div class="col-md-12">

            @if (Session::has('message'))
                <div class="alert alert-success">
                    {{ Session::get('message')}}
                </div>
            @endif

        </div>
    </div>
    <div class="row UserDeleteContent UsderDeleteH1">
        <div class="col-md-12">

            <h1>User List</h1>
        </div>
    </div>

    <div class="row  UserDeleteContent">
        <div class="col-md-12">
            <table class="table table-responsive table-bordered">
                <tbody>

                <tr>

                    <td>User Name</td>
                    <td>Email</td>
                    <td>Role</td>
                    <td>Semester</td>
                    <td>Action</td>

                </tr>

                @foreach($data as $data)
                    <tr>
                        <td>{{$data->user_name}}</td>
                        <td>{{$data->email}}</td>

                        <td>{{$data->role}}</td>
                        <td>{{$data->semester}}</td>
                        <td><a class="btn btn-danger" href="{{url('deleteUser')}}/{{$data->user_id}}"> Delete</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>


@endsection