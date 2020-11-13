<html lang="en">
<head>



<?php echo Html::style('css/header.css'); ?><?php echo Html::style('css/master.css'); ?>

<?php echo Html::style('css/bootstrap.min.css'); ?>

<?php echo Html::style('font-awesome/css/font-awesome.min.css'); ?>

<?php echo Html::style('font-awesome/css/font-awesome.css'); ?>


<!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://www.position-absolute.com/creation/print/jquery.printPage.js"></script>
    <title>Print Tabulation Sheet</title>
</head>
<body>
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
            <a class="navbar-brand" href="<?php echo e(url('dashboard')); ?>">পরীক্ষা
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right ">

                <li class="dropdown">
                    <a href="" class="dropdown-toggle" data-toggle="dropdown"
                    > Student Record List<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <?php if($user->role == 'Program Officer'): ?>
                            <li><a href="<?php echo e(url('dashboard/student/create')); ?>">Generate</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?php echo e(url('dashboard/student/edit')); ?>">Edit</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?php echo e(url('dashboard/student/delete')); ?>">Delete</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?php echo e(url('dashboard/student/View')); ?>">View</a></li>
                        <?php else: ?>
                            <li><a href="<?php echo e(url('dashboard/student/View')); ?>">View</a></li>
                        <?php endif; ?>


                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" id="xyz" data-toggle="dropdown" role="button"
                       aria-haspopup="true" aria-expanded="false"> Course List<span class="caret"></span></a>
                    <ul class="dropdown-menu" aria-labelledby="xyz">
                        <?php if($user->role == 'Program Officer'): ?>
                            <li><a href="<?php echo e(url('/dashboard/course/create')); ?>">Generate</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?php echo e(url('/dashboard/course/delete')); ?>">Delete</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?php echo e(url('/dashboard/course/view')); ?>">View</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?php echo e(url('/dashboard/course/edit')); ?>">Edit</a></li>
                        <?php elseif($user->role == 'Coordinator'): ?>
                            <li><a href="<?php echo e(url('/dashboard/course/edit')); ?>">Edit</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?php echo e(url('/dashboard/course/view')); ?>">View</a></li>
                        <?php else: ?>
                            <li><a href="<?php echo e(url('/dashboard/course/view')); ?>">View</a></li>
                        <?php endif; ?>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" id="xyz" data-toggle="dropdown" role="button"
                       aria-haspopup="true" aria-expanded="false"> Grade Sheet<span class="caret"></span></a>
                    <ul class="dropdown-menu" aria-labelledby="xyz">
                        <?php if($user->role == 'Teacher'): ?>
                            <li><a href="<?php echo e(url('dashboard/gradeSheet/create')); ?>">Generte</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?php echo e(url('dashboard/gradeSheet/edit/search')); ?>">Edit</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?php echo e(url('/dashboard/gradeSheet/view/search')); ?>">View</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a target="_blank" href="<?php echo e(url('/dashboard/gradeSheet/print/search')); ?>">Print</a></li>
                        <?php elseif($user->role == 'Student' || $user->role == 'Coordinator'): ?>
                            <li><a href="<?php echo e(url('/dashboard/gradeSheet/view/search')); ?>">View</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a target="_blank" href="<?php echo e(url('/dashboard/gradeSheet/print/search')); ?>">Print</a></li>
                        <?php endif; ?>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" id="xyz" data-toggle="dropdown" role="button"
                       aria-haspopup="true" aria-expanded="false"> Tabulation Sheet<span class="caret"></span></a>
                    <?php if($user->role=='Coordinator'): ?>
                        <ul class="dropdown-menu" aria-labelledby="xyz">

                            <li><a href="<?php echo e(url('/dashboard/tabulationSheet/search')); ?>">Generate</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a target="_blank" href="<?php echo e(url('/dashboard/tabulationSheet/printSearch')); ?>">Print</a>
                            </li>

                        </ul>
                    <?php endif; ?>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" id="xyz" data-toggle="dropdown" role="button"
                       aria-haspopup="true" aria-expanded="false">User Information<span class="caret"></span></a>
                    <ul class="dropdown-menu" aria-labelledby="xyz">
                        <?php if($user->role == 'Admin'): ?>
                            <li><a href="<?php echo e(url('/createUser')); ?>">Generate</a></li>
                            <li class="divider"></li>
                            <li><a href="<?php echo e(url('/showUser')); ?>">Delete </a></li>
                            <li class="divider"></li>
                            <li><a href="<?php echo e(url('/passwordPage')); ?>">Change Password</a></li>
                        <?php else: ?>
                            <li><a href="<?php echo e(url('/passwordPage')); ?>">Change Password</a></li>
                        <?php endif; ?>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" id="xyz" data-toggle="dropdown" role="button"
                       aria-haspopup="true" aria-expanded="false">Notice <span class="caret"></span></a>
                    <ul class="dropdown-menu" aria-labelledby="xyz">
                        <?php if($user->role == 'Program Officer'): ?>
                            <li><a href="<?php echo e(url('/dashboard/notice/create')); ?>">Generate</a></li>
                            <li class="divider"></li>
                            <li><a href="<?php echo e(url('/dashboard/notice/delete')); ?>">Delete</a></li>
                            <li class="divider"></li>
                            <li><a href="<?php echo e(url('/dashboard/notice/view')); ?>">View</a></li>
                        <?php else: ?>
                            <li><a href="<?php echo e(url('/dashboard/notice/view')); ?>">View</a></li>
                        <?php endif; ?>
                    </ul>
                </li>


                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" id="xyz" data-toggle="dropdown" role="button"
                       aria-haspopup="true" aria-expanded="false">Total Mark <span class="caret"></span></a>
                    <?php if($user->role == 'Teacher'): ?>
                        <ul class="dropdown-menu" aria-labelledby="xyz">
                            <li><a href="<?php echo e(url('dashboard/mark/create')); ?>">Generate</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?php echo e(url('dashboard/mark/edit')); ?>">Edit</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?php echo e(url('dashboard/mark/delete')); ?>">Delete</a></li>


                        </ul>
                    <?php endif; ?>

                </li>


                <li class="dropdown">
                    <a class="dropdown-toggle user-name" id="xyz" data-toggle="dropdown" role="button"
                       aria-haspopup="true" aria-expanded="false">
                        <strong><?php echo e($user->user_name); ?>(<?php echo e($user->role); ?>)</strong></a>
                    <ul class="dropdown-menu" aria-labelledby="xyz">
                        <li><a href='<?php echo e(url('/logout')); ?>'><i class="fa fa-sign-out fa-fw"></i>Logout</a></li>
                    </ul>
                </li>

            </ul>

        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>




<div class="container">

    <div class="row print ">
        <div class="col-md-12 jumbotron">
            <div class="">
                <a href="<?php echo e(url('/dashboard/tabulationSheet/print')); ?>/<?php echo e($id); ?>" class="btn btn-info btn-lg btn-block printbtn" >Print <i class="fa fa-print" aria-hidden="true"></i></a>
            </div>
        </div>
    </div>

</div>

<script type="text/javascript">
    $(document).ready(function () {
        $('.printbtn').printPage();
    });
</script>


</body>




</html>