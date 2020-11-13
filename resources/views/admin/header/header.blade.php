<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {!! Html::style('css/header.css') !!}
    {!! Html::style('css/bootstrap.min.css') !!}
    {!! Html::style('font-awesome/css/font-awesome.min.css') !!}
    {!! Html::style('font-awesome/css/font-awesome.css') !!}
</head>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{url('dashboard')}}">পরীক্ষা
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right ">

                <li class="dropdown">
                    <a href="" class="dropdown-toggle" data-toggle="dropdown"
                    > Student Record List<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        @if($user->role == 'Program Officer')
                            <li><a href="{{url('dashboard/student/create')}}">Generate</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{url('dashboard/student/edit')}}">Edit</a></li>
                           {{-- <li role="separator" class="divider"></li>
                            <li><a href="{{url('dashboard/student/delete')}}">Delete</a></li>--}}
                            <li role="separator" class="divider"></li>
                            <li><a href="{{url('dashboard/student/View/search')}}">View</a></li>
                        @else
                            <li><a href="{{url('dashboard/student/View/search')}}">View</a></li>
                        @endif


                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" id="xyz" data-toggle="dropdown" role="button"
                       aria-haspopup="true" aria-expanded="false"> Course List<span class="caret"></span></a>
                    <ul class="dropdown-menu" aria-labelledby="xyz">
                        @if($user->role == 'Program Officer')
                            <li><a href="{{url('/dashboard/course/create')}}">Generate</a></li>
                            <li role="separator" class="divider"></li>
                       {{-- <li><a href="{{url('/dashboard/course/delete')}}">Delete</a></li>
                            <li role="separator" class="divider"></li>--}}
                            <li><a href="{{url('/dashboard/course/view/search')}}">View</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{url('/dashboard/course/edit')}}">Edit</a></li>
                        @elseif($user->role == 'Coordinator')
                            <li><a href="{{url('/dashboard/course/edit')}}">Edit</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{url('/dashboard/course/view/search')}}">View</a></li>
                        @else
                            <li><a href="{{url('/dashboard/course/view/search')}}">View</a></li>
                        @endif
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" id="xyz" data-toggle="dropdown" role="button"
                       aria-haspopup="true" aria-expanded="false"> Grade Sheet<span class="caret"></span></a>
                    <ul class="dropdown-menu" aria-labelledby="xyz">
                        @if($user->role == 'Teacher')
                            <li><a href="{{url('dashboard/gradeSheet/create')}}">Generate</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{url('dashboard/gradeSheet/edit/search')}}">Edit</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{url('/dashboard/gradeSheet/view/search')}}">View</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a target="_blank" href="{{url('/dashboard/gradeSheet/print/search')}}">Print</a></li>
                        @elseif($user->role == 'Student' || $user->role == 'Coordinator')
                            <li><a href="{{url('/dashboard/gradeSheet/view/search')}}">View</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a target="_blank" href="{{url('/dashboard/gradeSheet/print/search')}}">Print</a></li>
                        @endif
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" id="xyz" data-toggle="dropdown" role="button"
                       aria-haspopup="true" aria-expanded="false"> Tabulation Sheet<span class="caret"></span></a>
                    @if($user->role=='Coordinator')
                        <ul class="dropdown-menu" aria-labelledby="xyz">

                            <li><a href="{{url('/dashboard/tabulationSheet/search')}}">Generate</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{url('/dashboard/tabulation/view/search')}}">View</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a target="_blank" href="{{url('/dashboard/tabulationSheet/printSearch')}}">Print</a>
                            </li>

                        </ul>
                    @endif
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" id="xyz" data-toggle="dropdown" role="button"
                       aria-haspopup="true" aria-expanded="false">User Information<span class="caret"></span></a>
                    <ul class="dropdown-menu" aria-labelledby="xyz">
                        @if($user->role == 'Admin')
                            <li><a href="{{url('/createUser')}}">Generate</a></li>
                            <li class="divider"></li>
                            <li><a href="{{url('/showUser')}}">Delete </a></li>
                            <li class="divider"></li>
                            <li><a href="{{url('/passwordPage')}}">Change Password</a></li>
                        @else
                        <li><a href="{{url('/passwordPage')}}">Change Password</a></li>
                            @endif
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" id="xyz" data-toggle="dropdown" role="button"
                       aria-haspopup="true" aria-expanded="false">Notice <span class="caret"></span></a>
                    <ul class="dropdown-menu" aria-labelledby="xyz">
                        @if($user->role == 'Program Officer')
                            <li><a href="{{url('/dashboard/notice/create')}}">Generate</a></li>
                            <li class="divider"></li>
                            <li><a href="{{url('/dashboard/notice/delete')}}">Delete</a></li>
                            <li class="divider"></li>
                            <li><a href="{{url('/dashboard/notice/view')}}">View</a></li>
                   @else
                        <li><a href="{{url('/dashboard/notice/view')}}">View</a></li>
                        @endif
                    </ul>
                </li>


                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" id="xyz" data-toggle="dropdown" role="button"
                       aria-haspopup="true" aria-expanded="false">Course Configuration <span class="caret"></span></a>
                    @if($user->role == 'Teacher')
                        <ul class="dropdown-menu" aria-labelledby="xyz">
                            <li><a href="{{url('dashboard/mark/create')}}">Generate</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{url('dashboard/mark/edit')}}">Edit</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{url('dashboard/mark/delete')}}">Delete</a></li>


                        </ul>
                    @endif

                </li>


                <li class="dropdown">
                    <a class="dropdown-toggle user-name" id="xyz" data-toggle="dropdown" role="button"
                       aria-haspopup="true" aria-expanded="false">
                        <strong>{{$user->user_name}}({{$user->role}})</strong></a>
                    <ul class="dropdown-menu" aria-labelledby="xyz">
                        <li><a href='{{url('/logout')}}'><i class="fa fa-sign-out fa-fw"></i>Logout</a></li>
                    </ul>
                </li>

            </ul>

        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

{!! Html::script('js/jquery.min.js') !!}
{!! Html::script('js/bootstrap.min.js') !!}


