<!DOCTYPE html>
<html>
    <head>
        <title>Login - Admin Dashboard</title>
        <meta charset="utf-8">
        <meta name="description" content="RealEstate Management System">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Main CSS-->
        <link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset('back-end/css/main.css')); ?>">
        <!-- Font-icon css-->
        <link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset('back-end/css/font-awesome.css')); ?>">
    </head>
    <body>
        <section class="material-half-bg">
            <div class="cover" style="background: #ffffff"></div>
        </section>
        <section class="login-content">
            <div class="logo">
                <img src="<?php echo e(Setting::get('LOGO')); ?>" width="250px"/>
            </div>
            <div class="login-box rounded">
                <!-- Login Form -->
                <form method="POST" action="<?php echo e(route('login')); ?>" class="login-form form-material">
                    <?php echo csrf_field(); ?>
                    <h4 class="login-head text-center pb-4">WELCOME BACK</h4>

                    <div class="form-group">
                        <label for="email" class="control-label text-uppercase"><?php echo e(__('E-Mail Address')); ?></label>
                        <div class="d-block">
                            <input id="email" type="email" class="form-control p-0<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" name="email" value="<?php echo e(old('email')); ?>" required autofocus>
                            <?php if($errors->has('email')): ?>
                                <span class="invalid-feedback">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="password" class="control-label text-uppercase"><?php echo e(__('Password')); ?></label>
                        <div class="d-block">
                            <input id="password" type="password" class="form-control p-0<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" name="password" required>
                            <?php if($errors->has('password')): ?>
                                <span class="invalid-feedback">
                                    <strong><?php echo e($errors->first('password')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="utility">
                            <div class="animated-checkbox">
                                <label>
                                    <input type="checkbox"><span class="label-text">Stay Signed in</span>
                                </label>
                            </div>
                            
                        </div>
                    </div>
                    <div class="btn-container">
                        <button class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>LOG IN</button>
                    </div>
                </form>
                <!-- End Login Form -->

                <!-- Reset Password Form -->
                <form method="POST" action="<?php echo e(route('password.request')); ?>" class="forget-form form-material">
                    <?php echo csrf_field(); ?>
                    <h4 class="login-head text-center pb-4">Forgot Password ?</h4>
                    <div class="form-group">
                        <label for="email" class="control-label text-uppercase"><?php echo e(__('E-Mail Address')); ?></label>
                        <div class="d-block">
                            <input id="email" type="email" class="form-control p-0<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" name="email" value="<?php echo e(old('email')); ?>" required autofocus>
                            <?php if($errors->has('email')): ?>
                                <span class="invalid-feedback">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="btn-container">
                        <button class="btn btn-primary btn-block"><i class="fa fa-unlock fa-lg fa-fw"></i>RESET</button>
                    </div>
                    <div class="mt-3">
                        <p class="semibold-text text-center mb-0"><a href="#" data-toggle="flip"><i class="fa fa-angle-left fa-fw"></i> Back to Login</a></p>
                    </div>
                </form>
                <!-- End Reset Password Form -->

            </div>
        </section>
        <!-- Essential javascripts for application to work-->
        <script src="<?php echo e(URL::asset('back-end/js/jquery-3.2.1.min.js')); ?>"></script>
        <script src="<?php echo e(URL::asset('back-end/js/popper.min.js')); ?>"></script>
        <script src="<?php echo e(URL::asset('back-end/js/bootstrap.min.js')); ?>"></script>
        <script src="<?php echo e(URL::asset('back-end/js/main.js')); ?>"></script>
        <!-- The javascript plugin to display page loading on top-->
        <script src="<?php echo e(URL::asset('back-end/js/plugins/pace.min.js')); ?>"></script>
        <script type="text/javascript">
            // Login Page Flipbox control
            $('.login-content [data-toggle="flip"]').click(function() {
                $('.login-box').toggleClass('flipped');
                return false;
            });
        </script>
    </body>
</html>
