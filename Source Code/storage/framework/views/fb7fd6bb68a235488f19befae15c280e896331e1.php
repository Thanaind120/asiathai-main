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
   <?php echo $__env->make('frontend/inc_navbar_hotel_regis', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="bg-grey">
        <div class="container">
            <div class="box-sign">
                <div class="text-icon-re text-orange"><i class="fas fa-envelope-open-text"></i></div>
                <div class="text-head-sign text-orange">Verify your email</div>
                <div class="text-filter mt-3 text-center text-bold">We've sent an email to <?php echo e($email); ?> to verify your email address and activate your account.</div>
                <div class="space-footer mb-3"></div>
            </div>
        </div>
        <div class="space-footer"></div>
    </div>
<?php echo $__env->make('frontend/inc_footer_hotel_regis', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html>


<?php /**PATH /home/zkorn2/domains/korn2.orangeworkshop.info/public_html/Poolvilla/resources/views/frontend/register_hotel_2.blade.php ENDPATH**/ ?>