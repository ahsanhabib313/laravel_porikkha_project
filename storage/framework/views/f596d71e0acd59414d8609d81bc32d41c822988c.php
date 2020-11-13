
<?php foreach($students as $student): ?>

    <ul>
        <li><?php echo e($student->password); ?></li>
    </ul>

    <?php endforeach; ?>