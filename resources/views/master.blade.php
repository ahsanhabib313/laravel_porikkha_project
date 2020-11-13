<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">



    {!! Html::style('css/master.css') !!}
    {!! Html::style('css/bootstrap.min.css') !!}
    {!! Html::style('font-awesome/css/font-awesome.min.css') !!}
    {!! Html::style('font-awesome/css/font-awesome.css') !!}
    <title>@yield('title')</title>

</head>
<body>

        <div class="container-fluid">
            @yield('content')

        </div>


</body>


</html>