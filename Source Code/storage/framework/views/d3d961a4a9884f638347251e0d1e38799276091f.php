<!doctype html>
<html lang="th">

<head>
    <title><?php echo app('translator')->get('lang.poolvilla'); ?></title>
    <?php echo $__env->make('frontend/inc_header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets_frontend/css/owl.carousel.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets_frontend/css/owl.theme.default.min.css')); ?>">
    <script src="<?php echo e(asset('assets_frontend/js/owl.carousel.min.js')); ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <?php echo $__env->make('sweetalert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('frontend/inc_navbar_nonlogin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="bg-grey">
        <form action="<?php echo e(url(Session::get('lang').'/loging')); ?>" method="post">
            <?php echo csrf_field(); ?>
            <div class="container">
                <div class="box-sign">
                    <div class="text-head-sign text-orange"><?php echo app('translator')->get('lang.sign_in'); ?></div>
                    <div class="space-footer mb-3">
                        <label for="exampleFormControlInput1" class="form-label text-orange"><?php echo app('translator')->get('lang.email'); ?></label>
                        <input type="email" class="form-control" name="email" id="exampleFormControlInput1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput2"
                            class="form-label text-orange"><?php echo app('translator')->get('lang.password'); ?></label>
                        <input type="password" class="form-control" name="password" id="exampleFormControlInput2">
                    </div>
                    <div class="clearfix">
                        <div class="float-end">
                            <a href="#" class="link-primary text-orange" data-bs-toggle="modal"
                                data-bs-target="#forgotModal"><small
                                    class="text-orange"><?php echo app('translator')->get('lang.forgot_password'); ?></small></a>
                        </div>
                    </div>
                    <button class="btn-sign" type="submit"><?php echo app('translator')->get('lang.sign_in'); ?></button>
                    <div class="box-text-white">
                        <div class="text-grey text-tiny"><?php echo app('translator')->get('lang.or_countinue_with'); ?></div>
                    </div>
                    <div class="text-line"></div>
                    <div class="row justify-content-center">
                        <div class="col-sm-4">
                            <button class="btn-facebook">
                                <img src="<?php echo e(asset('assets_frontend/images/fb.png')); ?>" class="fb"><span
                                    class="">facebook</span>
                            </button>
                        </div>
                        <div class="col-sm-4">
                            <button class="btn-gmail">
                                <img src="<?php echo e(asset('assets_frontend/images/gmail.png')); ?>" class="gm"><span
                                    class="">gmail</span>
                            </button>
                        </div>
                    </div>
                    <div class="text-grey text-tiny text-start mt-5"><?php echo app('translator')->get('lang.donot_have_an_account'); ?><a
                            href="<?php echo e(url(Session::get('lang').'/register')); ?>" class="text-orange ms-2"><?php echo app('translator')->get('lang.register'); ?></a>
                    </div>
                    <div class="space-footer"></div>
                    <div class="row justify-content-center">
                        <div class="col-sm-5 col-8">
                            <img src="<?php echo e(asset('assets_frontend/images/singin.svg')); ?>">
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- Modal -->
        <div class="modal fade" id="forgotModal" tabindex="-1" aria-labelledby="forgotModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content borderR-25 p-4">
                    <div class="modal-body">
                        <h5 class="text-head-sign text-orange" id="forgotModalLabel">Forgot your password?</h5>
                        <p class="text-filter mt-3 text-left text-bold">No worries! Enter your email and we will send
                            you a
                            reset.</p>
                        <form action="<?php echo e(url(Session::get('lang').'/signin/Forgotpassword')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <label for="" class="form-label text-orange">Your email</label>
                            <input type="email" class="form-control borderR-6" id="email" name="email"
                                placeholder="Email">
                            <div class="text-center pt-12">
                                <button type="submit" class="btn-sign">Password
                                    reset</button><br>
                                <button type="button" class="btn btn-link text-navy" data-bs-dismiss="modal">Back to
                                    login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="space-footer"></div>
    </div>
    <?php echo $__env->make('frontend/inc_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html>
<?php /**PATH /home/zkorn2/domains/korn2.orangeworkshop.info/public_html/Poolvilla/resources/views/frontend/signin.blade.php ENDPATH**/ ?>