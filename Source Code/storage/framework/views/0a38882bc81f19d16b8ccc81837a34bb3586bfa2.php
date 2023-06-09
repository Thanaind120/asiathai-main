<!doctype html>
<html lang="th">
<head>      
    <title>หน้าแรก</title>
   <?php echo $__env->make('frontend/inc_header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets_frontend/css/owl.carousel.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('assets_frontend/css/owl.theme.default.min.css')); ?>">
<script src="<?php echo e(asset('assets_frontend/js/owl.carousel.min.js')); ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body >
    <?php echo $__env->make('frontend/inc_navbar_hotel_regis', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('sweetalert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="bg-grey">
      <form action="<?php echo e(url('partner/register')); ?>" method="POST">
        <?php echo csrf_field(); ?>
    <div class="container">
        <div class="box-sign">
            <div class="text-head-sign text-orange">Create your partner account</div>
            <div class="space-footer mb-3">
              <label for="exampleFormControlInput1" class="form-label text-orange">First Name</label>
              <input type="text" class="form-control" name="firstname" required>
            </div>
            <div class="mb-3">
              <label for="exampleFormControlInput2" class="form-label text-orange">Last Name</label>
              <input type="text" class="form-control"  name="lastname" required>
            </div>
        
            <div class="mb-3">
              <label for="exampleFormControlInput3" class="form-label text-orange">Email</label>
              <input type="email" class="form-control" name="email" required>
            </div>
            <div class=" mb-3">
              <label for="exampleFormControlInput3" class="form-label text-orange">Phone</label>
              <input type="text" class="form-control" name="phone1" required>
            </div>
            <div class="mb-3">
              <label for="exampleFormControlInput4" class="form-label text-orange">Password</label>
              <input type="password" class="form-control" name="password" required minlength="8">
                <small class="text-light-grey">Use a minimum of 8 characters, including uppercase letters, lowercase letters, and numbers.</small>
            </div>
            <div class="mb-3">
              <label for="exampleFormControlInput4" class="form-label text-orange">Confirm Password</label>
              <input type="password" class="form-control" name="confirm_password" minlength="8" required>
            </div>
            <button class="btn-sign" type="submit">Create</button>
            
            <div class="text-grey text-tiny text-start mt-5">Already have an account?<a href="<?php echo e(url('signin_hotel')); ?>" class="text-orange ms-2">Sign in</a></div>
             <div class="space-footer"></div>
        </div>
    </div>
  </form>
        <div class="space-footer"></div>
    </div>
   <?php echo $__env->make('frontend/inc_footer_hotel_regis', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html>

<?php /**PATH /home/zkorn2/domains/korn2.orangeworkshop.info/public_html/Poolvilla/resources/views/frontend/register_hotel.blade.php ENDPATH**/ ?>