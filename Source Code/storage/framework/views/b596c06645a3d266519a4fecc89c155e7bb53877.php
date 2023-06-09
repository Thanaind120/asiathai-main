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
    <?php echo $__env->make('frontend/inc_navbar_scroll', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="banner">
        <img src="<?php echo e(asset('assets_frontend/images/banner_index.jpg')); ?>" class="banner-index">
        <div class="centered_box">
            <div class="text-banner-index"><?php echo app('translator')->get('lang.get_thebest_poolvilla_aroundasia'); ?></div>
            <div class="box-search-destination">
                <form action="<?php echo e(url(Session::get('lang').'/select-hotel/search')); ?>" method="get" autocomplete="off"
                    id="form_searching">
                    <div class="autocomplete">
                        <input id="province" class="form-control empty orange province_value" type="text"
                            name="province" id="iconified" placeholder="&#xF002; <?php echo app('translator')->get('lang.where_are_you_going'); ?>">
                    </div>
                    <div class="row mt-2">
                        <div class="col-lg-5">
                            <div class="bg-white-form">
                                <div class="row g-0">
                                    <div class="col-6">
                                        <div class="line-check-in">
                                            <label class="top-text-form" for="check-in"><?php echo app('translator')->get('lang.check_in'); ?></label>
                                            <div class="row g-0">
                                                <div class="col-2 text-center text-orange">
                                                    <i class="far fa-calendar check-calender"></i>
                                                </div>
                                                <div class="col-10">
                                                    <input class="form-control orange-check check-in-out"
                                                        id="datepicker" type="text" placeholder="<?php echo app('translator')->get('lang.date'); ?>"
                                                        name="ci" value="<?php echo e($today); ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <label class="top-text-form" for="check-in"><?php echo app('translator')->get('lang.check_out'); ?></label>
                                        <div class="row g-0">
                                            <div class="col-2 text-center text-orange">
                                                <i class="far fa-calendar check-calender"></i>
                                            </div>
                                            <div class="col-10">
                                                <input class="form-control orange-check check-in-out" id="datepicker2"
                                                    type="text" placeholder="<?php echo app('translator')->get('lang.date'); ?>" name="co"
                                                    value="<?php echo e($tomorrow); ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="bg-white-form">
                                <label class="top-text-form" for="check-in"><?php echo app('translator')->get('lang.guest'); ?></label>
                                <div class="row g-0">
                                    <div class="col-1 text-center text-orange">
                                        <i class="fas fa-user check-calender"></i>
                                    </div>
                                    <div class="col-11">
                                        <div class="row g-2">
                                            <div class="col-4">
                                                <div class="row g-2">
                                                    <label for="inputPassword"
                                                        class="col-4 text-tiny text-orange"><?php echo app('translator')->get('lang.adult'); ?></label>
                                                    <div class="col-8 mt-0">
                                                        <div class="input-group input-number">
                                                            <button class="btn sub" type="button" id="sub">-</button>
                                                            <input class="input-number border-0 text-center field"
                                                                placeholder="1" type="text" id="demoInput" name="adult"
                                                                value="1">
                                                            <button class="btn add" type="button" id="add">+</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="row g-2">
                                                    <label for="inputPassword"
                                                        class="col-4 text-tiny text-orange"><?php echo app('translator')->get('lang.kid'); ?></label>
                                                    <div class="col-8 mt-0">
                                                        <div class="input-group input-number">
                                                            <button class="btn sub2" type="button" id="sub2">-</button>
                                                            <input class="input-number border-0 text-center field2"
                                                                placeholder="0" type="text" id="demoInput" name="kid"
                                                                value="0">
                                                            <button class="btn add2" type="button" id="add2">+</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="row g-2">
                                                    <label for="inputPassword"
                                                        class="col-4 text-tiny text-orange"><?php echo app('translator')->get('lang.room'); ?></label>
                                                    <div class="col-8 mt-0">
                                                        <div class="input-group input-number">
                                                            <button class="btn sub3" type="button" id="sub3">-</button>
                                                            <input class="input-number border-0 text-center field3"
                                                                placeholder="1" type="text" id="demoInput" name="ro"
                                                                value="1">
                                                            <button class="btn add3" type="button" id="add3">+</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" id="button_searching" class="btn-search"><?php echo app('translator')->get('lang.search'); ?></button>
                </form>
            </div>
        </div>
    </div>
    <div class="space-footer">
        <div class="container my-5">
            <div class="owl-carousel slide-carousel-promotions owl-theme recommend">
                <?php $__currentLoopData = $banner; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a class="" href="<?php echo e(url(Session::get('lang').'/promotion/id='.$val->id)); ?>">
                    <div class="">
                        <div class="">
                            <img src="<?php echo e(asset('frontend_assets/banner/'.$val->banner_image)); ?>"
                                class="card-img-top-travel" alt="...">
                        </div>
                    </div>
                </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="row pt-sm-5">
            <div class="col-sm-3 mb-2">
                <div class="head-text-index-df"><?php echo app('translator')->get('lang.i_still'); ?></div>
                <div class="detail-text mt-3"><?php echo app('translator')->get('lang.the_place'); ?></div>
                <a class="btn-sign index mt-xl-5"
                    href="<?php echo e(url(Session::get('lang').'/province')); ?>"><?php echo app('translator')->get('lang.see_all'); ?></a>
            </div>
            <div class="col-sm-9">
                <!-- destination slide -->
                <section class="testimonials">
                    <div class="row g-0">
                        <div id="customers-testimonials" class="owl-carousel trend">
                            <?php $__currentLoopData = $province; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="item box-destination">
                                <a href="<?php echo e(url(Session::get('lang').'/select-province/id='.$val->code)); ?>">
                                    <img src="<?php echo e(asset('assets_frontend/images/destination1.jpg')); ?>" class="img-des">
                                    <div class="bottom-left">
                                        <p class="name-text text-white"><?php echo e($val["name_".Session::get('lang')]); ?></p>
                                    </div>
                                </a>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </section>
                <!-- end of destination slide -->
            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="head-text-index"><?php echo app('translator')->get('lang.what_activities'); ?></div>
        <div class="line-bottom-head-text"></div>
        <div class="row mt-5">
            <?php $__currentLoopData = $attraction; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-3 col-6">
                <div class="myDIV">
                    <div class="overlay-img">
                        <div class="">
                            <a href="<?php echo e(url(Session::get('lang').'/tourist_attraction_detail/id='.$val->id)); ?>">
                                <div class="HoverVideo">
                                    <div class="HoverVideo__wrapper">
                                        <div class="HoverVideo__videoBox thumb">
                                            <img src="<?php echo e(($val->attraction_image != '')? asset('assets_frontend/images/'.$val->attraction_image) : asset('assets_frontend/images/1-place.jpg')); ?>"
                                            class="img-des">
                                            
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="box-body">
                        <a href="<?php echo e(url(Session::get('lang').'/tourist_attraction_detail/id='.$val->id)); ?>">
                            <p class="name-text text-bold"><?php if(Session::get('lang') == 'en'): ?>
                                <?php echo e($val->attraction_en); ?> <?php else: ?> <?php echo e($val->attraction_th); ?> <?php endif; ?></p>
                        </a>
                        <p class="detail-text text-orange"><?php if(Session::get('lang') == 'en'): ?>
                            <?php echo e($val->name_en); ?> <?php else: ?> <?php echo e($val->name_th); ?> <?php endif; ?> , <?php if(Session::get('lang')
                            == 'en'): ?> <?php echo e($val->district_en); ?> <?php else: ?> <?php echo e($val->district_th); ?> <?php endif; ?></p>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <a href="<?php echo e(url(Session::get('lang').'/tourist-attraction')); ?>">
            <div class="row justify-content-center">
                <div class="col-sm-2 col-6 mt-sm-5 mt-2">
                    <div href="<?php echo e(url(Session::get('lang').'/tourist-attraction')); ?>" class="btn-border-grey">
                        <?php echo app('translator')->get('lang.see_all'); ?></div>
                </div>
            </div>
        </a>
    </div>
    <div class="bg-grey pb-5">
        <div class="container">
            <div class="head-text-index-df"><?php echo app('translator')->get('lang.we_advise'); ?></div>
            <div class="line-bottom-head-text-side"></div>
            <div class="scroll-bar-wrap">
                <div class="scroll-box">
                    <ul class="nav nav-pills  mb-3" id="pills-tab" role="tablist">
                        <?php $__currentLoopData = $enjoywith; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-1-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-1" type="button" role="tab" aria-controls="pills-1"
                                aria-selected="true"><?php echo e($val->enjoy_name); ?></button>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php $__currentLoopData = $enjoywith2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-2-tab" data-bs-toggle="pill" data-bs-target="#pills-2"
                                type="button" role="tab" aria-controls="pills-2"
                                aria-selected="false"><?php echo e($val->enjoy_name); ?></button>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php $__currentLoopData = $enjoywith3; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-3-tab" data-bs-toggle="pill" data-bs-target="#pills-3"
                                type="button" role="tab" aria-controls="pills-3"
                                aria-selected="false"><?php echo e($val->enjoy_name); ?></button>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php $__currentLoopData = $enjoywith4; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-4-tab" data-bs-toggle="pill" data-bs-target="#pills-4"
                                type="button" role="tab" aria-controls="pills-4"
                                aria-selected="false"><?php echo e($val->enjoy_name); ?></button>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php $__currentLoopData = $enjoywith5; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-5-tab" data-bs-toggle="pill" data-bs-target="#pills-5"
                                type="button" role="tab" aria-controls="pills-5"
                                aria-selected="false"><?php echo e($val->enjoy_name); ?></button>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php $__currentLoopData = $enjoywith6; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-6-tab" data-bs-toggle="pill" data-bs-target="#pills-6"
                                type="button" role="tab" aria-controls="pills-6"
                                aria-selected="false"><?php echo e($val->enjoy_name); ?></button>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php $__currentLoopData = $enjoywith7; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-7-tab" data-bs-toggle="pill" data-bs-target="#pills-7"
                                type="button" role="tab" aria-controls="pills-7"
                                aria-selected="false"><?php echo e($val->enjoy_name); ?></button>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php $__currentLoopData = $enjoywith8; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-8-tab" data-bs-toggle="pill" data-bs-target="#pills-8"
                                type="button" role="tab" aria-controls="pills-8"
                                aria-selected="false"><?php echo e($val->enjoy_name); ?></button>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php $__currentLoopData = $enjoywith9; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-9-tab" data-bs-toggle="pill" data-bs-target="#pills-9"
                                type="button" role="tab" aria-controls="pills-9"
                                aria-selected="false"><?php echo e($val->enjoy_name); ?></button>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php $__currentLoopData = $enjoywith10; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-10-tab" data-bs-toggle="pill" data-bs-target="#pills-10"
                                type="button" role="tab" aria-controls="pills-10"
                                aria-selected="false"><?php echo e($val->enjoy_name); ?></button>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <li class="nav-item">
                            <a href="<?php echo e(url(Session::get('lang').'/category')); ?>"
                                class="nav-link btn-more"><?php echo app('translator')->get('lang.see_more'); ?></a>
                        </li>
                    </ul>
                </div>
            </div>
            <?php 
                $poolvilla = DB::table('db_poolvilla')->get();
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
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-1" role="tabpanel" aria-labelledby="pills-1-tab">
                    <div class="row">
                        <?php $__currentLoopData = $poolvilla; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                        $image = DB::table('db_image_poolvilla')->where('poolvilla_id',$val->id)->first();
                        $discount = DB::table('db_discount')->where('ref_poolvilla_id',$val->id)->first();
                        $room = DB::table('db_room')->where('poolvilla_id',$val->id)->first();
                        ?>
                        <?php if($val->ref_enjoy_id == 1): ?>
                        <div class="col-lg-2 col-sm-4 col-6 mb-3">
                            <div class="">
                                <a
                                    href="<?php echo e(url(Session::get('lang').'/select-rooms/'.$val->id.'/'.$check_in.'/'.$check_out.'/adult='.$a_from.'/kid='.$k_from.'/room='.$ro)); ?>">
                                    <div class="img-cat">
                                        <img src="<?php echo e(($image->image != '')? asset(@$image->image) : asset('assets_frontend/images/recomment%20(1).jpg')); ?>"
                                            class="img-des pool" alt="...">
                                    </div>
                                </a>
                                <div class="box-body">
                                    <a href="#">
                                        <p class="detail-text text-bold"><?php if(Session::get('lang') == 'en'): ?>
                                            <?php echo e($val->name_en); ?> <?php else: ?> <?php echo e($val->name_th); ?> <?php endif; ?></p>
                                    </a>
                                    <div class="for-mobile">
                                        <div class="row no-gutter ">
                                            <div class="col-2">
                                                <div class="star-rating">
                                                    <i class="fas fa-star"></i>
                                                </div>
                                            </div>
                                            <div class="col-10">
                                                <div class="small star-rating"><?php echo e($val->star_rating); ?></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row justify-content-between">
                                        <div class="col-auto">
                                            <?php
                                                if(isset($room->price)){
                                                    $price = $room->price;
                                                }else{
                                                    $price = 0;
                                                }
                                                if(isset($discount->discount)){
                                                    $discount = $discount->discount;
                                                }else{
                                                    $discount = 0;
                                                }
                                                $total = $price - ($price * ($discount / 100));
                                            ?>
                                            <p class="small text-orange"><?php echo e(number_format($total)); ?>฿ /
                                                <?php echo app('translator')->get('lang.night'); ?></p>
                                        </div>
                                        <div class="col-auto g-1">
                                            <div class="for-destop">
                                                <div class="row no-gutter ">
                                                    <div class="col p-0">
                                                        <div class="star-rating">
                                                            <i class="fas fa-star"></i>
                                                        </div>
                                                    </div>
                                                    <div class="col pl-2 pr-0">
                                                        <div class="small star-rating"><?php echo e($val->star_rating); ?></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="small text-light-grey" style="text-decoration: line-through;">
                                        <?php echo app('translator')->get('lang.from_normal'); ?> <?php echo e(number_format($price)); ?>฿</div>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <a href="<?php echo e(url(Session::get('lang').'/category-travel/search?id='.'1')); ?>">
                        <div class="row justify-content-center">
                            <div class="col-sm-2  col-6 mt-sm-5 mt-2">
                                <div href="<?php echo e(url(Session::get('lang').'/category-travel/search?id='.'1')); ?>"
                                    class="btn-border-grey">
                                    <?php echo app('translator')->get('lang.see_all'); ?></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="tab-pane fade" id="pills-2" role="tabpanel" aria-labelledby="pills-2-tab">
                    <div class="row">
                        <?php $__currentLoopData = $poolvilla; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                        $image = DB::table('db_image_poolvilla')->where('poolvilla_id',$val->id)->first();
                        $discount = DB::table('db_discount')->where('ref_poolvilla_id',$val->id)->first();
                        $room = DB::table('db_room')->where('poolvilla_id',$val->id)->first();
                        ?>
                        <?php if($val->ref_enjoy_id == 2): ?>
                        <div class="col-lg-2 col-sm-4 col-6 mb-3">
                            <div class="">
                                <a
                                    href="<?php echo e(url(Session::get('lang').'/select-rooms/'.$val->id.'/'.$check_in.'/'.$check_out.'/adult='.$a_from.'/kid='.$k_from.'/room='.$ro)); ?>">
                                    <div class="img-cat">
                                        <img src="<?php echo e(($image->image != '')? asset(@$image->image) : asset('assets_frontend/images/recomment%20(1).jpg')); ?>"
                                            class="img-des pool" alt="...">
                                    </div>
                                </a>
                                <div class="box-body">
                                    <a href="#">
                                        <p class="detail-text text-bold"><?php if(Session::get('lang') == 'en'): ?>
                                            <?php echo e($val->name_en); ?> <?php else: ?> <?php echo e($val->name_th); ?> <?php endif; ?></p>
                                    </a>
                                    <div class="for-mobile">
                                        <div class="row no-gutter ">
                                            <div class="col-2">
                                                <div class="star-rating">
                                                    <i class="fas fa-star"></i>
                                                </div>
                                            </div>
                                            <div class="col-10">
                                                <div class="small star-rating"><?php echo e($val->star_rating); ?></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row justify-content-between">
                                        <div class="col-auto">
                                            <?php
                                                if(isset($room->price)){
                                                    $price = $room->price;
                                                }else{
                                                    $price = 0;
                                                }
                                                if(isset($discount->discount)){
                                                    $discount = $discount->discount;
                                                }else{
                                                    $discount = 0;
                                                }
                                                $total = $price - ($price * ($discount / 100));
                                            ?>
                                            <p class="small text-orange"><?php echo e(number_format($total)); ?>฿ /
                                                <?php echo app('translator')->get('lang.night'); ?></p>
                                        </div>
                                        <div class="col-auto g-1">
                                            <div class="for-destop">
                                                <div class="row no-gutter ">
                                                    <div class="col p-0">
                                                        <div class="star-rating">
                                                            <i class="fas fa-star"></i>
                                                        </div>
                                                    </div>
                                                    <div class="col pl-2 pr-0">
                                                        <div class="small star-rating"><?php echo e($val->star_rating); ?></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="small text-light-grey" style="text-decoration: line-through;">
                                        <?php echo app('translator')->get('lang.from_normal'); ?> <?php echo e(number_format($price)); ?>฿</div>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <a href="<?php echo e(url(Session::get('lang').'/category-travel/search?id='.'1')); ?>">
                        <div class="row justify-content-center">
                            <div class="col-sm-2  col-6 mt-sm-5 mt-2">
                                <div href="<?php echo e(url(Session::get('lang').'/category-travel/search?id='.'1')); ?>"
                                    class="btn-border-grey">
                                    <?php echo app('translator')->get('lang.see_all'); ?></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="tab-pane fade" id="pills-3" role="tabpanel" aria-labelledby="pills-3-tab">
                    <div class="row">
                        <?php $__currentLoopData = $poolvilla; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                        $image = DB::table('db_image_poolvilla')->where('poolvilla_id',$val->id)->first();
                        $discount = DB::table('db_discount')->where('ref_poolvilla_id',$val->id)->first();
                        $room = DB::table('db_room')->where('poolvilla_id',$val->id)->first();
                        ?>
                        <?php if($val->ref_enjoy_id == 3): ?>
                        <div class="col-lg-2 col-sm-4 col-6 mb-3">
                            <div class="">
                                <a
                                    href="<?php echo e(url(Session::get('lang').'/select-rooms/'.$val->id.'/'.$check_in.'/'.$check_out.'/adult='.$a_from.'/kid='.$k_from.'/room='.$ro)); ?>">
                                    <div class="img-cat">
                                        <img src="<?php echo e(($image->image != '')? asset(@$image->image) : asset('assets_frontend/images/recomment%20(1).jpg')); ?>"
                                            class="img-des pool" alt="...">
                                    </div>
                                </a>
                                <div class="box-body">
                                    <a href="#">
                                        <p class="detail-text text-bold"><?php if(Session::get('lang') == 'en'): ?>
                                            <?php echo e($val->name_en); ?> <?php else: ?> <?php echo e($val->name_th); ?> <?php endif; ?></p>
                                    </a>
                                    <div class="for-mobile">
                                        <div class="row no-gutter ">
                                            <div class="col-2">
                                                <div class="star-rating">
                                                    <i class="fas fa-star"></i>
                                                </div>
                                            </div>
                                            <div class="col-10">
                                                <div class="small star-rating"><?php echo e($val->star_rating); ?></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row justify-content-between">
                                        <div class="col-auto">
                                            <?php
                                                if(isset($room->price)){
                                                    $price = $room->price;
                                                }else{
                                                    $price = 0;
                                                }
                                                if(isset($discount->discount)){
                                                    $discount = $discount->discount;
                                                }else{
                                                    $discount = 0;
                                                }
                                                $total = $price - ($price * ($discount / 100));
                                            ?>
                                            <p class="small text-orange"><?php echo e(number_format($total)); ?>฿ /
                                                <?php echo app('translator')->get('lang.night'); ?></p>
                                        </div>
                                        <div class="col-auto g-1">
                                            <div class="for-destop">
                                                <div class="row no-gutter ">
                                                    <div class="col p-0">
                                                        <div class="star-rating">
                                                            <i class="fas fa-star"></i>
                                                        </div>
                                                    </div>
                                                    <div class="col pl-2 pr-0">
                                                        <div class="small star-rating"><?php echo e($val->star_rating); ?></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="small text-light-grey" style="text-decoration: line-through;">
                                        <?php echo app('translator')->get('lang.from_normal'); ?> <?php echo e(number_format($price)); ?>฿</div>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <a href="<?php echo e(url(Session::get('lang').'/category-travel/search?id='.'1')); ?>">
                        <div class="row justify-content-center">
                            <div class="col-sm-2  col-6 mt-sm-5 mt-2">
                                <div href="<?php echo e(url(Session::get('lang').'/category-travel/search?id='.'1')); ?>"
                                    class="btn-border-grey">
                                    <?php echo app('translator')->get('lang.see_all'); ?></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="tab-pane fade" id="pills-4" role="tabpanel" aria-labelledby="pills-4-tab">
                    <div class="row">
                        <?php $__currentLoopData = $poolvilla; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                        $image = DB::table('db_image_poolvilla')->where('poolvilla_id',$val->id)->first();
                        $discount = DB::table('db_discount')->where('ref_poolvilla_id',$val->id)->first();
                        $room = DB::table('db_room')->where('poolvilla_id',$val->id)->first();
                        ?>
                        <?php if($val->ref_enjoy_id == 4): ?>
                        <div class="col-lg-2 col-sm-4 col-6 mb-3">
                            <div class="">
                                <a
                                    href="<?php echo e(url(Session::get('lang').'/select-rooms/'.$val->id.'/'.$check_in.'/'.$check_out.'/adult='.$a_from.'/kid='.$k_from.'/room='.$ro)); ?>">
                                    <div class="img-cat">
                                        <img src="<?php echo e(($image->image != '')? asset(@$image->image) : asset('assets_frontend/images/recomment%20(1).jpg')); ?>"
                                            class="img-des pool" alt="...">
                                    </div>
                                </a>
                                <div class="box-body">
                                    <a href="#">
                                        <p class="detail-text text-bold"><?php if(Session::get('lang') == 'en'): ?>
                                            <?php echo e($val->name_en); ?> <?php else: ?> <?php echo e($val->name_th); ?> <?php endif; ?></p>
                                    </a>
                                    <div class="for-mobile">
                                        <div class="row no-gutter ">
                                            <div class="col-2">
                                                <div class="star-rating">
                                                    <i class="fas fa-star"></i>
                                                </div>
                                            </div>
                                            <div class="col-10">
                                                <div class="small star-rating"><?php echo e($val->star_rating); ?></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row justify-content-between">
                                        <div class="col-auto">
                                            <?php
                                                if(isset($room->price)){
                                                    $price = $room->price;
                                                }else{
                                                    $price = 0;
                                                }
                                                if(isset($discount->discount)){
                                                    $discount = $discount->discount;
                                                }else{
                                                    $discount = 0;
                                                }
                                                $total = $price - ($price * ($discount / 100));
                                            ?>
                                            <p class="small text-orange"><?php echo e(number_format($total)); ?>฿ /
                                                <?php echo app('translator')->get('lang.night'); ?></p>
                                        </div>
                                        <div class="col-auto g-1">
                                            <div class="for-destop">
                                                <div class="row no-gutter ">
                                                    <div class="col p-0">
                                                        <div class="star-rating">
                                                            <i class="fas fa-star"></i>
                                                        </div>
                                                    </div>
                                                    <div class="col pl-2 pr-0">
                                                        <div class="small star-rating"><?php echo e($val->star_rating); ?></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="small text-light-grey" style="text-decoration: line-through;">
                                        <?php echo app('translator')->get('lang.from_normal'); ?> <?php echo e(number_format($price)); ?>฿</div>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <a href="<?php echo e(url(Session::get('lang').'/category-travel/search?id='.'1')); ?>">
                        <div class="row justify-content-center">
                            <div class="col-sm-2  col-6 mt-sm-5 mt-2">
                                <div href="<?php echo e(url(Session::get('lang').'/category-travel/search?id='.'1')); ?>"
                                    class="btn-border-grey">
                                    <?php echo app('translator')->get('lang.see_all'); ?></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="tab-pane fade" id="pills-5" role="tabpanel" aria-labelledby="pills-5-tab">
                    <div class="row">
                        <?php $__currentLoopData = $poolvilla; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                        $image = DB::table('db_image_poolvilla')->where('poolvilla_id',$val->id)->first();
                        $discount = DB::table('db_discount')->where('ref_poolvilla_id',$val->id)->first();
                        $room = DB::table('db_room')->where('poolvilla_id',$val->id)->first();
                        ?>
                        <?php if($val->ref_enjoy_id == 5): ?>
                        <div class="col-lg-2 col-sm-4 col-6 mb-3">
                            <div class="">
                                <a
                                    href="<?php echo e(url(Session::get('lang').'/select-rooms/'.$val->id.'/'.$check_in.'/'.$check_out.'/adult='.$a_from.'/kid='.$k_from.'/room='.$ro)); ?>">
                                    <div class="img-cat">
                                        <img src="<?php echo e(($image->image != '')? asset(@$image->image) : asset('assets_frontend/images/recomment%20(1).jpg')); ?>"
                                            class="img-des pool" alt="...">
                                    </div>
                                </a>
                                <div class="box-body">
                                    <a href="#">
                                        <p class="detail-text text-bold"><?php if(Session::get('lang') == 'en'): ?>
                                            <?php echo e($val->name_en); ?> <?php else: ?> <?php echo e($val->name_th); ?> <?php endif; ?></p>
                                    </a>
                                    <div class="for-mobile">
                                        <div class="row no-gutter ">
                                            <div class="col-2">
                                                <div class="star-rating">
                                                    <i class="fas fa-star"></i>
                                                </div>
                                            </div>
                                            <div class="col-10">
                                                <div class="small star-rating"><?php echo e($val->star_rating); ?></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row justify-content-between">
                                        <div class="col-auto">
                                            <?php
                                            if(isset($room->price)){
                                                $price = $room->price;
                                            }else{
                                                $price = 0;
                                            }
                                            if(isset($discount->discount)){
                                                $discount = $discount->discount;
                                            }else{
                                                $discount = 0;
                                            }
                                            $total = $price - ($price * ($discount / 100));
                                        ?>
                                            <p class="small text-orange"><?php echo e(number_format($total)); ?>฿ /
                                                <?php echo app('translator')->get('lang.night'); ?></p>
                                        </div>
                                        <div class="col-auto g-1">
                                            <div class="for-destop">
                                                <div class="row no-gutter ">
                                                    <div class="col p-0">
                                                        <div class="star-rating">
                                                            <i class="fas fa-star"></i>
                                                        </div>
                                                    </div>
                                                    <div class="col pl-2 pr-0">
                                                        <div class="small star-rating"><?php echo e($val->star_rating); ?></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="small text-light-grey" style="text-decoration: line-through;">
                                        <?php echo app('translator')->get('lang.from_normal'); ?> <?php echo e(number_format($price)); ?>฿</div>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <a href="<?php echo e(url(Session::get('lang').'/category-travel/search?id='.'1')); ?>">
                        <div class="row justify-content-center">
                            <div class="col-sm-2  col-6 mt-sm-5 mt-2">
                                <div href="<?php echo e(url(Session::get('lang').'/category-travel/search?id='.'1')); ?>"
                                    class="btn-border-grey">
                                    <?php echo app('translator')->get('lang.see_all'); ?></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="tab-pane fade" id="pills-6" role="tabpanel" aria-labelledby="pills-6-tab">
                    <div class="row">
                        <?php $__currentLoopData = $poolvilla; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                        $image = DB::table('db_image_poolvilla')->where('poolvilla_id',$val->id)->first();
                        $discount = DB::table('db_discount')->where('ref_poolvilla_id',$val->id)->first();
                        $room = DB::table('db_room')->where('poolvilla_id',$val->id)->first();
                        ?>
                        <?php if($val->ref_enjoy_id == 6): ?>
                        <div class="col-lg-2 col-sm-4 col-6 mb-3">
                            <div class="">
                                <a
                                    href="<?php echo e(url(Session::get('lang').'/select-rooms/'.$val->id.'/'.$check_in.'/'.$check_out.'/adult='.$a_from.'/kid='.$k_from.'/room='.$ro)); ?>">
                                    <div class="img-cat">
                                        <img src="<?php echo e(($image->image != '')? asset(@$image->image) : asset('assets_frontend/images/recomment%20(1).jpg')); ?>"
                                            class="img-des pool" alt="...">
                                    </div>
                                </a>
                                <div class="box-body">
                                    <a href="#">
                                        <p class="detail-text text-bold"><?php if(Session::get('lang') == 'en'): ?>
                                            <?php echo e($val->name_en); ?> <?php else: ?> <?php echo e($val->name_th); ?> <?php endif; ?></p>
                                    </a>
                                    <div class="for-mobile">
                                        <div class="row no-gutter ">
                                            <div class="col-2">
                                                <div class="star-rating">
                                                    <i class="fas fa-star"></i>
                                                </div>
                                            </div>
                                            <div class="col-10">
                                                <div class="small star-rating"><?php echo e($val->star_rating); ?></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row justify-content-between">
                                        <div class="col-auto">
                                            <?php
                                                if(isset($room->price)){
                                                    $price = $room->price;
                                                }else{
                                                    $price = 0;
                                                }
                                                if(isset($discount->discount)){
                                                    $discount = $discount->discount;
                                                }else{
                                                    $discount = 0;
                                                }
                                                $total = $price - ($price * ($discount / 100));
                                            ?>
                                            <p class="small text-orange"><?php echo e(number_format($total)); ?>฿ /
                                                <?php echo app('translator')->get('lang.night'); ?></p>
                                        </div>
                                        <div class="col-auto g-1">
                                            <div class="for-destop">
                                                <div class="row no-gutter ">
                                                    <div class="col p-0">
                                                        <div class="star-rating">
                                                            <i class="fas fa-star"></i>
                                                        </div>
                                                    </div>
                                                    <div class="col pl-2 pr-0">
                                                        <div class="small star-rating"><?php echo e($val->star_rating); ?></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="small text-light-grey" style="text-decoration: line-through;">
                                        <?php echo app('translator')->get('lang.from_normal'); ?> <?php echo e(number_format($price)); ?>฿</div>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <a href="<?php echo e(url(Session::get('lang').'/category-travel/search?id='.'1')); ?>">
                        <div class="row justify-content-center">
                            <div class="col-sm-2  col-6 mt-sm-5 mt-2">
                                <div href="<?php echo e(url(Session::get('lang').'/category-travel/search?id='.'1')); ?>"
                                    class="btn-border-grey">
                                    <?php echo app('translator')->get('lang.see_all'); ?></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="tab-pane fade" id="pills-7" role="tabpanel" aria-labelledby="pills-7-tab">
                    <div class="row">
                        <?php $__currentLoopData = $poolvilla; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                        $image = DB::table('db_image_poolvilla')->where('poolvilla_id',$val->id)->first();
                        $discount = DB::table('db_discount')->where('ref_poolvilla_id',$val->id)->first();
                        $room = DB::table('db_room')->where('poolvilla_id',$val->id)->first();
                        ?>
                        <?php if($val->ref_enjoy_id == 7): ?>
                        <div class="col-lg-2 col-sm-4 col-6 mb-3">
                            <div class="">
                                <a
                                    href="<?php echo e(url(Session::get('lang').'/select-rooms/'.$val->id.'/'.$check_in.'/'.$check_out.'/adult='.$a_from.'/kid='.$k_from.'/room='.$ro)); ?>">
                                    <div class="img-cat">
                                        <img src="<?php echo e(($image->image != '')? asset(@$image->image) : asset('assets_frontend/images/recomment%20(1).jpg')); ?>"
                                            class="img-des pool" alt="...">
                                    </div>
                                </a>
                                <div class="box-body">
                                    <a href="#">
                                        <p class="detail-text text-bold"><?php if(Session::get('lang') == 'en'): ?>
                                            <?php echo e($val->name_en); ?> <?php else: ?> <?php echo e($val->name_th); ?> <?php endif; ?></p>
                                    </a>
                                    <div class="for-mobile">
                                        <div class="row no-gutter ">
                                            <div class="col-2">
                                                <div class="star-rating">
                                                    <i class="fas fa-star"></i>
                                                </div>
                                            </div>
                                            <div class="col-10">
                                                <div class="small star-rating"><?php echo e($val->star_rating); ?></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row justify-content-between">
                                        <div class="col-auto">
                                            <?php
                                                if(isset($room->price)){
                                                    $price = $room->price;
                                                }else{
                                                    $price = 0;
                                                }
                                                if(isset($discount->discount)){
                                                    $discount = $discount->discount;
                                                }else{
                                                    $discount = 0;
                                                }
                                                $total = $price - ($price * ($discount / 100));
                                            ?>
                                            <p class="small text-orange"><?php echo e(number_format($total)); ?>฿ /
                                                <?php echo app('translator')->get('lang.night'); ?></p>
                                        </div>
                                        <div class="col-auto g-1">
                                            <div class="for-destop">
                                                <div class="row no-gutter ">
                                                    <div class="col p-0">
                                                        <div class="star-rating">
                                                            <i class="fas fa-star"></i>
                                                        </div>
                                                    </div>
                                                    <div class="col pl-2 pr-0">
                                                        <div class="small star-rating"><?php echo e($val->star_rating); ?></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="small text-light-grey" style="text-decoration: line-through;">
                                        <?php echo app('translator')->get('lang.from_normal'); ?> <?php echo e(number_format($price)); ?>฿</div>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <a href="<?php echo e(url(Session::get('lang').'/category-travel/search?id='.'1')); ?>">
                        <div class="row justify-content-center">
                            <div class="col-sm-2  col-6 mt-sm-5 mt-2">
                                <div href="<?php echo e(url(Session::get('lang').'/category-travel/search?id='.'1')); ?>"
                                    class="btn-border-grey">
                                    <?php echo app('translator')->get('lang.see_all'); ?></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="tab-pane fade" id="pills-8" role="tabpanel" aria-labelledby="pills-8-tab">
                    <div class="row">
                        <?php $__currentLoopData = $poolvilla; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                        $image = DB::table('db_image_poolvilla')->where('poolvilla_id',$val->id)->first();
                        $discount = DB::table('db_discount')->where('ref_poolvilla_id',$val->id)->first();
                        $room = DB::table('db_room')->where('poolvilla_id',$val->id)->first();
                        ?>
                        <?php if($val->ref_enjoy_id == 8): ?>
                        <div class="col-lg-2 col-sm-4 col-6 mb-3">
                            <div class="">
                                <a
                                    href="<?php echo e(url(Session::get('lang').'/select-rooms/'.$val->id.'/'.$check_in.'/'.$check_out.'/adult='.$a_from.'/kid='.$k_from.'/room='.$ro)); ?>">
                                    <div class="img-cat">
                                        <img src="<?php echo e(($image->image != '')? asset(@$image->image) : asset('assets_frontend/images/recomment%20(1).jpg')); ?>"
                                            class="img-des pool" alt="...">
                                    </div>
                                </a>
                                <div class="box-body">
                                    <a href="#">
                                        <p class="detail-text text-bold"><?php if(Session::get('lang') == 'en'): ?>
                                            <?php echo e($val->name_en); ?> <?php else: ?> <?php echo e($val->name_th); ?> <?php endif; ?></p>
                                    </a>
                                    <div class="for-mobile">
                                        <div class="row no-gutter ">
                                            <div class="col-2">
                                                <div class="star-rating">
                                                    <i class="fas fa-star"></i>
                                                </div>
                                            </div>
                                            <div class="col-10">
                                                <div class="small star-rating"><?php echo e($val->star_rating); ?></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row justify-content-between">
                                        <div class="col-auto">
                                            <?php
                                            if(isset($room->price)){
                                                $price = $room->price;
                                            }else{
                                                $price = 0;
                                            }
                                            if(isset($discount->discount)){
                                                $discount = $discount->discount;
                                            }else{
                                                $discount = 0;
                                            }
                                            $total = $price - ($price * ($discount / 100));
                                        ?>
                                            <p class="small text-orange"><?php echo e(number_format($total)); ?>฿ /
                                                <?php echo app('translator')->get('lang.night'); ?></p>
                                        </div>
                                        <div class="col-auto g-1">
                                            <div class="for-destop">
                                                <div class="row no-gutter ">
                                                    <div class="col p-0">
                                                        <div class="star-rating">
                                                            <i class="fas fa-star"></i>
                                                        </div>
                                                    </div>
                                                    <div class="col pl-2 pr-0">
                                                        <div class="small star-rating"><?php echo e($val->star_rating); ?></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="small text-light-grey" style="text-decoration: line-through;">
                                        <?php echo app('translator')->get('lang.from_normal'); ?> <?php echo e(number_format($price)); ?>฿</div>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <a href="<?php echo e(url(Session::get('lang').'/category-travel/search?id='.'1')); ?>">
                        <div class="row justify-content-center">
                            <div class="col-sm-2  col-6 mt-sm-5 mt-2">
                                <div href="<?php echo e(url(Session::get('lang').'/category-travel/search?id='.'1')); ?>"
                                    class="btn-border-grey">
                                    <?php echo app('translator')->get('lang.see_all'); ?></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="tab-pane fade" id="pills-9" role="tabpanel" aria-labelledby="pills-9-tab">
                    <div class="row">
                        <?php $__currentLoopData = $poolvilla; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                        $image = DB::table('db_image_poolvilla')->where('poolvilla_id',$val->id)->first();
                        $discount = DB::table('db_discount')->where('ref_poolvilla_id',$val->id)->first();
                        $room = DB::table('db_room')->where('poolvilla_id',$val->id)->first();
                        ?>
                        <?php if($val->ref_enjoy_id == 9): ?>
                        <div class="col-lg-2 col-sm-4 col-6 mb-3">
                            <div class="">
                                <a
                                    href="<?php echo e(url(Session::get('lang').'/select-rooms/'.$val->id.'/'.$check_in.'/'.$check_out.'/adult='.$a_from.'/kid='.$k_from.'/room='.$ro)); ?>">
                                    <div class="img-cat">
                                        <img src="<?php echo e(($image->image != '')? asset(@$image->image) : asset('assets_frontend/images/recomment%20(1).jpg')); ?>"
                                            class="img-des pool" alt="...">
                                    </div>
                                </a>
                                <div class="box-body">
                                    <a href="#">
                                        <p class="detail-text text-bold"><?php if(Session::get('lang') == 'en'): ?>
                                            <?php echo e($val->name_en); ?> <?php else: ?> <?php echo e($val->name_th); ?> <?php endif; ?></p>
                                    </a>
                                    <div class="for-mobile">
                                        <div class="row no-gutter ">
                                            <div class="col-2">
                                                <div class="star-rating">
                                                    <i class="fas fa-star"></i>
                                                </div>
                                            </div>
                                            <div class="col-10">
                                                <div class="small star-rating"><?php echo e($val->star_rating); ?></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row justify-content-between">
                                        <div class="col-auto">
                                            <?php
                                                if(isset($room->price)){
                                                    $price = $room->price;
                                                }else{
                                                    $price = 0;
                                                }
                                                if(isset($discount->discount)){
                                                    $discount = $discount->discount;
                                                }else{
                                                    $discount = 0;
                                                }
                                                $total = $price - ($price * ($discount / 100));
                                            ?>
                                            <p class="small text-orange"><?php echo e(number_format($total)); ?>฿ /
                                                <?php echo app('translator')->get('lang.night'); ?></p>
                                        </div>
                                        <div class="col-auto g-1">
                                            <div class="for-destop">
                                                <div class="row no-gutter ">
                                                    <div class="col p-0">
                                                        <div class="star-rating">
                                                            <i class="fas fa-star"></i>
                                                        </div>
                                                    </div>
                                                    <div class="col pl-2 pr-0">
                                                        <div class="small star-rating"><?php echo e($val->star_rating); ?></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="small text-light-grey" style="text-decoration: line-through;">
                                        <?php echo app('translator')->get('lang.from_normal'); ?> <?php echo e(number_format($price)); ?>฿</div>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <a href="<?php echo e(url(Session::get('lang').'/category-travel/search?id='.'1')); ?>">
                        <div class="row justify-content-center">
                            <div class="col-sm-2  col-6 mt-sm-5 mt-2">
                                <div href="<?php echo e(url(Session::get('lang').'/category-travel/search?id='.'1')); ?>"
                                    class="btn-border-grey">
                                    <?php echo app('translator')->get('lang.see_all'); ?></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="tab-pane fade" id="pills-10" role="tabpanel" aria-labelledby="pills-10-tab">
                    <div class="row">
                        <?php $__currentLoopData = $poolvilla; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                        $image = DB::table('db_image_poolvilla')->where('poolvilla_id',$val->id)->first();
                        $discount = DB::table('db_discount')->where('ref_poolvilla_id',$val->id)->first();
                        $room = DB::table('db_room')->where('poolvilla_id',$val->id)->first();
                        ?>
                        <?php if($val->ref_enjoy_id == 10): ?>
                        <div class="col-lg-2 col-sm-4 col-6 mb-3">
                            <div class="">
                                <a
                                    href="<?php echo e(url(Session::get('lang').'/select-rooms/'.$val->id.'/'.$check_in.'/'.$check_out.'/adult='.$a_from.'/kid='.$k_from.'/room='.$ro)); ?>">
                                    <div class="img-cat">
                                        <img src="<?php echo e(($image->image != '')? asset(@$image->image) : asset('assets_frontend/images/recomment%20(1).jpg')); ?>"
                                            class="img-des pool" alt="...">
                                    </div>
                                </a>
                                <div class="box-body">
                                    <a href="#">
                                        <p class="detail-text text-bold"><?php if(Session::get('lang') == 'en'): ?>
                                            <?php echo e($val->name_en); ?> <?php else: ?> <?php echo e($val->name_th); ?> <?php endif; ?></p>
                                    </a>
                                    <div class="for-mobile">
                                        <div class="row no-gutter ">
                                            <div class="col-2">
                                                <div class="star-rating">
                                                    <i class="fas fa-star"></i>
                                                </div>
                                            </div>
                                            <div class="col-10">
                                                <div class="small star-rating"><?php echo e($val->star_rating); ?></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row justify-content-between">
                                        <div class="col-auto">
                                            <?php
                                                if(isset($room->price)){
                                                    $price = $room->price;
                                                }else{
                                                    $price = 0;
                                                }
                                                if(isset($discount->discount)){
                                                    $discount = $discount->discount;
                                                }else{
                                                    $discount = 0;
                                                }
                                                $total = $price - ($price * ($discount / 100));
                                            ?>
                                            <p class="small text-orange"><?php echo e(number_format($total)); ?>฿ /
                                                <?php echo app('translator')->get('lang.night'); ?></p>
                                        </div>
                                        <div class="col-auto g-1">
                                            <div class="for-destop">
                                                <div class="row no-gutter ">
                                                    <div class="col p-0">
                                                        <div class="star-rating">
                                                            <i class="fas fa-star"></i>
                                                        </div>
                                                    </div>
                                                    <div class="col pl-2 pr-0">
                                                        <div class="small star-rating"><?php echo e($val->star_rating); ?></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="small text-light-grey" style="text-decoration: line-through;">
                                        <?php echo app('translator')->get('lang.from_normal'); ?> <?php echo e(number_format($price)); ?>฿</div>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <a href="<?php echo e(url(Session::get('lang').'/category-travel/search?id='.'1')); ?>">
                        <div class="row justify-content-center">
                            <div class="col-sm-2  col-6 mt-sm-5 mt-2">
                                <div href="<?php echo e(url(Session::get('lang').'/category-travel/search?id='.'1')); ?>"
                                    class="btn-border-grey">
                                    <?php echo app('translator')->get('lang.see_all'); ?></div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="head-text-index-df"><?php echo app('translator')->get('lang.choose_a'); ?></div>
            <div class="line-bottom-head-text-side"></div>
            <div class="row mt-4">
                <?php $__currentLoopData = $EnjoyWith; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-sm-4 col-6 mb-3">
                    <a class="" href="<?php echo e(url(Session::get('lang').'/category-travel/search?id='.$val->enjoy_id)); ?>">
                        <div class="row">
                            <div class="col-sm-7"><img
                                    src="<?php echo e(asset('frontend_assets/enjoy_image/'.$val->enjoy_image)); ?>"
                                    class="card-img-top-travel w-100" alt="..."></div>
                            <div class="col-sm-5 pt-xl-5 pt-sm-2 pl-3">
                                <p class="detail-text text-bold text-center"><?php echo e($val->enjoy_name); ?></p>
                            </div>
                        </div>
                    </a>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
    <div class="">
        <!-- reviews -->
        <div class="bg-orange-light">
            <div class="head-text-index"><?php echo app('translator')->get('lang.review_from_travelers'); ?></div>
            <div class="line-bottom-head-text"></div>
            <div class="row my-4">
                <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-sm-4">
                    <div class="reviewimg-box mb-2">
                        <div class="fitter-review">
                            <img src="<?php echo e(($val->review_img != '')? asset(@$val->review_img) : asset('assets_frontend/images/4.2-place.jpg')); ?>" class="w-100">
                        </div>
                        <div class="review-text">
                            <p class="name-text text-white"><?php if(Session::get('lang') == 'en'): ?> <?php echo e($val->poolvilla_en); ?>

                                <?php else: ?> <?php echo e($val->poolvilla_th); ?> <?php endif; ?> - <?php if(Session::get('lang') == 'en'): ?>
                                <?php echo e($val->name); ?> <?php else: ?> <?php echo e($val->name); ?> <?php endif; ?></p>
                            <p class="detail-text text-white"><?php if(Session::get('lang') == 'en'): ?> <?php echo e($val->province_en); ?>

                                <?php else: ?> <?php echo e($val->province_th); ?> <?php endif; ?> , <?php if(Session::get('lang') == 'en'): ?>
                                <?php echo e($val->district_en); ?> <?php else: ?> <?php echo e($val->district_th); ?> <?php endif; ?></p>
                            <p class="card-text text-white mt-3"><?php echo e($val->review); ?></p>
                        </div>
                        <div class="review-text-name">
                            <p class="reviews-customer mt-3">Miss A</p>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        <!-- end of reviews -->
    </div>
    <?php echo $__env->make('frontend/inc_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html>
<script>
    var dateToday = new Date();
    $(function () {
        $("#datepicker").datepicker({
            dateFormat: 'dd/mm/yy',
            minDate: dateToday,
        });
    });

    $(function () {
        $("#datepicker2").datepicker({
            dateFormat: 'dd/mm/yy',
            minDate: dateToday,
        });
    });
</script>
<script>
    $('#iconified').on('keyup', function () {
        var input = $(this);
        if (input.val().length === 0) {
            input.addClass('empty');
        } else {
            input.removeClass('empty');
        }
    });

    jQuery(document).ready(function ($) {
        "use strict";
        $('#customers-testimonials').owlCarousel({
            loop: true,
            margin: 30,
            navText: ['<span><i class="arrow fas fa-chevron-circle-left"></i></span>',
                '<span><i class="arrow fas fa-chevron-circle-right"></i></span>'
            ],
            autoplayHoverPause: false,
            autoplay: false,
            dots: true,
            nav: true,
            autoplayTimeout: 5500,
            smartSpeed: 650,
            stagePadding: 10,
            slideBy: 1,
            responsive: {
                0: {
                    items: 2
                },
                768: {
                    items: 3
                },
                1024: {
                    items: 3
                }

            }
        });
    });

    $('.slide-carousel').owlCarousel({
        loop: true,
        margin: 30,
        nav: true,
        navText: ['<span><i class="fas fa-chevron-left"></i></span>',
            '<span><i class="fas fa-chevron-right"></i></span>'
        ],
        autoplayHoverPause: false,
        dots: true,
        autoplay: true,
        autoplayTimeout: 5500,
        smartSpeed: 500,
        stagePadding: 30,
        slideBy: 1,
        responsive: {
            0: {
                items: 1
            },
            500: {
                items: 2
            },
            768: {
                items: 3
            },
            1201: {
                items: 4
            }
        }
    });


    $('.slide-carousel-promotions').owlCarousel({
        loop: true,
        margin: 30,
        nav: true,
        navText: ['<span><i class="fas fa-chevron-left"></i></span>',
            '<span><i class="fas fa-chevron-right"></i></span>'
        ],
        autoplayHoverPause: false,
        dots: true,
        autoplay: true,
        autoplayTimeout: 5500,
        smartSpeed: 500,
        stagePadding: 30,
        slideBy: 1,
        responsive: {
            0: {
                items: 1
            },
            500: {
                items: 1
            },
            768: {
                items: 2
            },
            1201: {
                items: 2
            }
        }
    });
</script>
<script>
    const videos = document.querySelectorAll(".video");

    for (const video of videos) {
        video.addEventListener('mouseover', function () {
            video.play()
        }, false);
        video.addEventListener('mouseout', function () {
            video.pause()
        }, false);
    }
</script>
<script>
    function autocomplete(inp, arr) {
        /*the autocomplete function takes two arguments,
        the text field element and an array of possible autocompleted values:*/
        var currentFocus;
        /*execute a function when someone writes in the text field:*/
        inp.addEventListener("input", function (e) {
            var a, b, i, val = this.value;
            /*close any already open lists of autocompleted values*/
            closeAllLists();
            if (!val) {
                return false;
            }
            currentFocus = -1;
            /*create a DIV element that will contain the items (values):*/
            a = document.createElement("DIV");
            a.setAttribute("id", this.id + "autocomplete-list");
            a.setAttribute("class", "autocomplete-items");
            /*append the DIV element as a child of the autocomplete container:*/
            this.parentNode.appendChild(a);
            /*for each item in the array...*/
            for (i = 0; i < arr.length; i++) {
                /*check if the item starts with the same letters as the text field value:*/
                if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
                    /*create a DIV element for each matching element:*/
                    b = document.createElement("DIV");
                    /*make the matching letters bold:*/
                    b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
                    b.innerHTML += arr[i].substr(val.length);
                    /*insert a input field that will hold the current array item's value:*/
                    b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
                    /*execute a function when someone clicks on the item value (DIV element):*/
                    b.addEventListener("click", function (e) {
                        /*insert the value for the autocomplete text field:*/
                        inp.value = this.getElementsByTagName("input")[0].value;
                        /*close the list of autocompleted values,
                        (or any other open lists of autocompleted values:*/
                        closeAllLists();
                    });
                    a.appendChild(b);
                }
            }
        });
        /*execute a function presses a key on the keyboard:*/
        inp.addEventListener("keydown", function (e) {
            var x = document.getElementById(this.id + "autocomplete-list");
            if (x) x = x.getElementsByTagName("div");
            if (e.keyCode == 40) {
                /*If the arrow DOWN key is pressed,
                increase the currentFocus variable:*/
                currentFocus++;
                /*and and make the current item more visible:*/
                addActive(x);
            } else if (e.keyCode == 38) { //up
                /*If the arrow UP key is pressed,
                decrease the currentFocus variable:*/
                currentFocus--;
                /*and and make the current item more visible:*/
                addActive(x);
            } else if (e.keyCode == 13) {
                /*If the ENTER key is pressed, prevent the form from being submitted,*/
                e.preventDefault();
                if (currentFocus > -1) {
                    /*and simulate a click on the "active" item:*/
                    if (x) x[currentFocus].click();
                }
            }
        });

        function addActive(x) {
            /*a function to classify an item as "active":*/
            if (!x) return false;
            /*start by removing the "active" class on all items:*/
            removeActive(x);
            if (currentFocus >= x.length) currentFocus = 0;
            if (currentFocus < 0) currentFocus = (x.length - 1);
            /*add class "autocomplete-active":*/
            x[currentFocus].classList.add("autocomplete-active");
        }

        function removeActive(x) {
            /*a function to remove the "active" class from all autocomplete items:*/
            for (var i = 0; i < x.length; i++) {
                x[i].classList.remove("autocomplete-active");
            }
        }

        function closeAllLists(elmnt) {
            /*close all autocomplete lists in the document,
            except the one passed as an argument:*/
            var x = document.getElementsByClassName("autocomplete-items");
            for (var i = 0; i < x.length; i++) {
                if (elmnt != x[i] && elmnt != inp) {
                    x[i].parentNode.removeChild(x[i]);
                }
            }
        }
        /*execute a function when someone clicks in the document:*/
        document.addEventListener("click", function (e) {
            closeAllLists(e.target);
        });
    }

    // /*An array containing all the province names in the world:*/
    // var courses = ["Destination A", "Destination B", "Destination C", "Destination D", "Destination E", "Destination F",
    //     "Destination G"
    // ];

    // /*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
    // autocomplete(document.getElementById("province"), courses);

    /*An array containing all the province names in the world:*/
    var poolvilla = <?php echo json_encode($result); ?>;


    /*initiate the autocomplete function on the "POL" element, and pass along the countries array as possible autocomplete values:*/
    autocomplete(document.getElementById("province"), poolvilla);
</script>


<!-- ปุ่มเพิ่ม-ลด  -->
<script>
    var unit = 1;
    var total;
    // if user changes value in field
    $('.field').change(function () {
        unit = this.value;
    });
    $('.add').click(function () {
        unit++;
        var $input = $(this).prevUntil('.sub');
        $input.val(unit);
        unit = unit;
    });
    $('.sub').click(function () {
        if (unit > 1) {
            unit--;
            var $input = $(this).nextUntil('.add');
            $input.val(unit);
        }
    });
</script>

<script>
    var unit2 = 0;
    var total;
    // if user changes value in field
    $('.field2').change(function () {
        unit2 = this.value;
    });
    $('.add2').click(function () {
        unit2++;
        var $input = $(this).prevUntil('.sub2');
        $input.val(unit2);
        unit2 = unit2;
    });
    $('.sub2').click(function () {
        if (unit2 > 0) {
            unit2--;
            var $input = $(this).nextUntil('.add2');
            $input.val(unit2);
        }
    });
</script>

<script>
    var unit3 = 1;
    var total;
    // if user changes value in field
    $('.field3').change(function () {
        unit3 = this.value;
    });
    $('.add3').click(function () {
        unit3++;
        var $input = $(this).prevUntil('.sub3');
        $input.val(unit3);
        unit3 = unit3;
    });
    $('.sub3').click(function () {
        if (unit3 > 1) {
            unit3--;
            var $input = $(this).nextUntil('.add3');
            $input.val(unit3);
        }
    });

    $('#datepicker').change(function () {
        var date2 = $('#datepicker').datepicker('getDate', '+1d');
        date2.setDate(date2.getDate() + 1);
        $('#datepicker2').datepicker('setDate', date2);
        $('#datepicker2').datepicker('option', 'minDate', new Date(date2));
    });

    $("#button_searching").on("click", function () {
        var keyword = $('.province_value').val();
        if (keyword === '') {
            Swal.fire({
                icon: 'error',
                confirmButtonText: 'รับทราบ',
                confirmButtonColor: '#f58b1b',
                text: 'กรุณาใส่ชื่อจังหวัดเพื่อค้นหาห้องพัก',
            })
        } else {
            $('#form_searching').submit();
        }
    });
</script><?php /**PATH /home/zkorn2/domains/korn2.orangeworkshop.info/public_html/Poolvilla/resources/views/frontend/index.blade.php ENDPATH**/ ?>