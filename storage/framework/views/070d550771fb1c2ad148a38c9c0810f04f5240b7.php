<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">



    <?php echo Html::style('css/master.css'); ?>

    <?php echo Html::style('css/bootstrap.min.css'); ?>

    <?php echo Html::style('font-awesome/css/font-awesome.min.css'); ?>

    <?php echo Html::style('font-awesome/css/font-awesome.css'); ?>

    <title><?php echo $__env->yieldContent('title'); ?></title>

</head>
<body>

        <div class="container-fluid">
            <?php echo $__env->yieldContent('content'); ?>

        </div>


</body>


</html>