
alkfjaklfjakljf
<ul>
    <?php foreach($totalmark as $totalmarks): ?>
        <li><?php echo e($totalmarks->id); ?></li>
        <li><?php echo e($totalmarks->course_id); ?></li>
        <li>Lab: <?php echo e($totalmarks->lab_total); ?></li>

    <?php endforeach; ?>

</ul>
