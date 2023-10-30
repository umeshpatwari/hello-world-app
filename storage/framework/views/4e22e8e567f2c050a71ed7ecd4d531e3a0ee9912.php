<?php $__env->startSection('content'); ?>
    <h1>Hello World</h1>

    <h2>Products from BigCommerce:</h2>
    <ul>
        <?php $__currentLoopData = $products->data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            dskljkjk
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
<?php $__env->stopSection(); ?><?php /**PATH /var/www/html/hello-world-app/resources/views/hello_world.blade.php ENDPATH**/ ?>