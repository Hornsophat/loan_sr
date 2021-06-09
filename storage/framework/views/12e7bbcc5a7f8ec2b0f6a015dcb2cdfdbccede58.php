<?php if(Session::has('message')): ?>
    <div id="alert" class="alert alert-success" role="alert"><?php echo e(Session::get('message')); ?></div>
<?php endif; ?>
<?php if(session()->has('success')): ?>
    <div class="alert alert-success">
        <?php echo session()->get('success'); ?>

    </div>
<?php endif; ?>
<?php if(session()->has('error')): ?>
    <div class="alert alert-danger">
        <?php echo session()->get('error'); ?>

    </div>
<?php endif; ?>