<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php echo Html::style('css/header.css'); ?>

<?php echo Html::style('css/bootstrap.min.css'); ?>

</head>



<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo e(url('dashboard')); ?>">পরীক্ষা
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">

                <li class="dropdown">
                    <a href="" class="dropdown-toggle"  data-toggle="dropdown"
                       > Student Record List<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Create</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Edit</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">View</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" id="xyz" data-toggle="dropdown" role="button"
                       aria-haspopup="true" aria-expanded="false"> Course List<span class="caret"></span></a>
                    <ul class="dropdown-menu" aria-labelledby="xyz">
                        <li><a href="#">Create</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Edit</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">View</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" id="xyz" data-toggle="dropdown" role="button"
                       aria-haspopup="true" aria-expanded="false"> Grade Sheet<span class="caret"></span></a>
                    <ul class="dropdown-menu" aria-labelledby="xyz">
                        <li><a href="#">Create</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Edit</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">View</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" id="xyz" data-toggle="dropdown" role="button"
                       aria-haspopup="true" aria-expanded="false"> Tabulation Sheet<span class="caret"></span></a>
                    <ul class="dropdown-menu" aria-labelledby="xyz">
                        <li><a href="#">Create</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Edit</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">View</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" id="xyz" data-toggle="dropdown" role="button"
                       aria-haspopup="true" aria-expanded="false">User Information<span class="caret"></span></a>
                    <ul class="dropdown-menu" aria-labelledby="xyz">
                        <li><a href="<?php echo e(url('/createUser')); ?>">Create User</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo e(url('/showUser')); ?>">Delete User</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo e(url('/passwordPage')); ?>">Change Password</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" id="xyz" data-toggle="dropdown" role="button"
                       aria-haspopup="true" aria-expanded="false">Notice Board<span class="caret"></span></a>
                    <ul class="dropdown-menu" aria-labelledby="xyz">
                        <li><a href="<?php echo e(url('/')); ?>">Create</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo e(url('/')); ?>">Delete</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo e(url('/')); ?>">View</a></li>
                    </ul>
                </li>

                <li>name</li>


                <li><a href='<?php echo e(url('/logout')); ?>'><i class="fa fa-sign-out fa-fw"></i>Logout</a>


            </ul>

        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>


<?php echo Html::script('js/jquery.min.js'); ?>

<?php echo Html::script('js/bootstrap.min.js'); ?>


