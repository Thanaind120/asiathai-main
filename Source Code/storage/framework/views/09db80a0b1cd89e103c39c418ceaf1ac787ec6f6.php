<!doctype html>
<html lang="th">
<head>      
    <title>หน้าแรก</title>
  
   <?php echo $__env->make('frontend/inc_header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
    <link rel="stylesheet" href="<?php echo e(asset('assets_frontend/css/owl.carousel.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('assets_frontend/css/owl.theme.default.min.css')); ?>">
<script src="<?php echo e(asset('assets_frontend/js/owl.carousel.min.js')); ?>"></script>
</head>
<body >
    <?php echo $__env->make('sweetalert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   <?php echo $__env->make('frontend/inc_navbar_hotel_regis', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="bg-grey">
    <div class="container">
        <form action="<?php echo e(url('partner/loging')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="box-sign">
                <div class="text-head-sign text-orange">Sign in to manage your property</div>
                <div class="space-footer mb-3">
                <label for="exampleFormControlInput1" class="form-label text-orange">Email</label>
                <input type="email" class="form-control" name="email" required>
                </div>
                <div class="mb-3">
                <label for="exampleFormControlInput2" class="form-label text-orange">Password</label>
                <input type="password" class="form-control" name="password" required>
                </div>
                <div class="clearfix">
                    <div class="float-end">
                        <a href="<?php echo e(url('forgot_password')); ?>">
                            <small class="text-orange">forgot password</small>
                        </a>
                    </div>
                </div>
                <button class="btn-sign" type="submit">Sing in</button>
                <div class="text-grey text-tiny text-start mt-5">Don't have a parther account?<a href="<?php echo e(url('TermsOfPartner')); ?>" class="text-orange ms-2">Create</a></div>
                <div class="space-footer"></div>
            </div>
        </form>
    </div>
        <div class="space-footer"></div>
    </div>
   <?php echo $__env->make('frontend/inc_footer_hotel_regis', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
</body>
</html>

<?php /**PATH /home/zkorn2/domains/korn2.orangeworkshop.info/public_html/Poolvilla/resources/views/frontend/signin_hotel.blade.php ENDPATH**/ ?>