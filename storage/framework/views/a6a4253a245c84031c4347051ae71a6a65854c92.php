<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>

    <?php echo Html::style('plugins/bootstrap/bootstrap.css'); ?>

    <?php echo Html::style('font-awesome/css/font-awesome.css'); ?>

    <?php echo Html::style('plugins/pace/pace-theme-big-counter.css'); ?>

    <?php echo Html::style('css/style.css'); ?>

    <?php echo Html::style('css/main-style.css'); ?>

    <?php echo Html::style('plugins/morris/morris-0.4.3.min.css'); ?>

</head>
<body>

<?php echo $__env->make('admin.header.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('admin.sidebar.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


<?php echo Html::script('plugins/jquery-1.10.2.js'); ?>

<?php echo Html::script('plugins/bootstrap/bootstrap.min.js'); ?>

<?php echo Html::script('plugins/metisMenu/jquery.metisMenu.js'); ?>

<?php echo Html::script('plugins/pace/pace.js'); ?>

<?php echo Html::script('scripts/siminta.js'); ?>

<?php echo Html::script('plugins/morris/raphael-2.1.0.min.js'); ?>

<?php echo Html::script('plugins/morris/morris.js'); ?>

<?php echo Html::script('scripts/dashboard-demo.js'); ?>

</body>
</html>