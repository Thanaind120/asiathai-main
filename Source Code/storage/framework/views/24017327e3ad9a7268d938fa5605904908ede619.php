<!doctype html>
<html lang="th">

<head>
    <title><?php echo app('translator')->get('lang.poolvilla'); ?></title>
    <?php echo $__env->make('frontend/inc_header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets_frontend/css/owl.carousel.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets_frontend/css/owl.theme.default.min.css')); ?>">
    <script src="<?php echo e(asset('assets_frontend/js/owl.carousel.min.js')); ?>"></script>
</head>

<body>
    <?php echo $__env->make('sweetalert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('frontend/inc_navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="container">
        <div class="banner"> 
            <img src="<?php echo e(asset('frontend_assets/banner/'.$banner->banner_image)); ?>" class="banner-index">
        </div>
        <div class="clearfix">
            <div class="float-start">
                <div class="for-destop">
                    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="bread" href="<?php echo e(url('/'.Session::get('lang'))); ?>"><?php echo app('translator')->get('lang.home'); ?></a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo e($banner["head_".Session::get('lang')]); ?></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="text-title text-bold text-grey"><?php echo e($banner["head_".Session::get('lang')]); ?></div>
            <div class="text-tiny text-grey my-3">
                <?php echo e($banner["detail_".Session::get('lang')]); ?>

            </div>
            <div class="name-text my-3 text-bold text-grey"><?php echo app('translator')->get('lang.accommodation_offer'); ?></div>
            <div class="row">
                <?php $__currentLoopData = $discountRoom; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                $image=DB::table('db_image_poolvilla')->where('poolvilla_id',$val->ref_poolvilla_id)->get();
                $checkin = date('d-m-Y');
                $checkout = date('d-m-Y', strtotime($checkin . ' +1 day'));
                $explode = explode("-",$checkin);
                $explode2 = explode("-",$checkout);
                $check_in = $explode[0].'-'.$explode[1].'-'.$explode[2];
                $check_out = $explode2[0].'-'.$explode2[1].'-'.$explode2[2];
                $a_from = 1;
                $k_from = 0;
                $ro = 1;
                ?>
                <div class="col-sm-3 col-6">
                    <div class="mb-2">
                        <a href="<?php echo e(url(Session::get('lang').'/select-rooms/'.$val->ref_poolvilla_id.'/'.$check_in.'/'.$check_out.'/adult='.$a_from.'/kid='.$k_from.'/room='.$ro)); ?>">
                            <div class="box-save-red-image">
                                <div class="text-head-sale"><?php echo e($val->discount); ?>%</div>
                                <p><?php echo app('translator')->get('lang.sale'); ?></p>
                            </div>
                            <div class="img-cat-place">
                                <?php if(isset($image->image)): ?>
                                <img src="<?php echo e(asset(@$image->image)); ?>" class="img-des  pool" alt="...">
                                <?php else: ?>
                                <img src="<?php echo e(asset('assets_frontend/images/recomment%20(3).jpg')); ?>" class="img-des  pool" alt="...">
                                <?php endif; ?>
                            </div>
                        </a>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-9">
                                    <a href="<?php echo e(url(Session::get('lang').'/select-rooms/'.$val->ref_poolvilla_id.'/'.$check_in.'/'.$check_out.'/adult='.$a_from.'/kid='.$k_from.'/room='.$ro)); ?>">
                                        <p class="name-text"><?php echo e($val["poolvilla_".Session::get('lang')]); ?></p>
                                    </a>
                                </div>
                                <div class="col-3 px-0">
                                    <div class="row no-gutter">
                                        <div class="col-4 px-2 ">
                                            <div class="star-rating">
                                                <i class="fas fa-star"></i>
                                            </div>
                                        </div>
                                        <div class="col-8">
                                            <div class="small star-rating"><?php echo e($val->star_rating); ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-blue text-tiny"><i class="fas fa-map-marker-alt me-1"></i><?php echo e($val["province_".Session::get('lang')]); ?>  , <?php echo e($val["district_".Session::get('lang')]); ?></div>
                            <div class="text-green text-tiny">
                                <span class="text-bold me-1">FREE</span>Cancellation
                            </div>
                            <div class="row justify-content-between">
                                <div class="col-auto">
                                    <?php
                                        $price = $val->price;
                                        $discount = $val->discount;
                                        $total = $price - ($price * ($discount / 100));
                                    ?>
                                    <p class="small text-orange"><?php echo e(number_format($total)); ?>฿ / <?php echo app('translator')->get('lang.night'); ?></p>
                                </div>
                            </div>
                            <div class="small text-light-grey" style="text-decoration: line-through;"><?php echo app('translator')->get('lang.from_normal'); ?> <?php echo e(number_format($val->price)); ?>฿ </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
    <div class="space-footer"></div>
    <?php echo $__env->make('frontend/inc_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html><?php /**PATH /home/zkorn2/domains/korn2.orangeworkshop.info/public_html/Poolvilla/resources/views/frontend/promotion.blade.php ENDPATH**/ ?>