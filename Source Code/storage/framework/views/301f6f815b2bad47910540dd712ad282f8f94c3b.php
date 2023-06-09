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
    <?php echo $__env->make('frontend/inc_navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="container">
        <div class="banner">
            <img src="<?php echo e(($attractionDetail->attraction_image != '')? asset('assets_frontend/images/'.$attractionDetail->attraction_image) : asset('assets_frontend/images/place-banner.jpg')); ?>"
                class="banner-index">
        </div>
        <div class="clearfix">
            <div class="float-start">
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="bread"
                                href="<?php echo e(url('/'.Session::get('lang'))); ?>"><?php echo app('translator')->get('lang.home'); ?></a></li>
                        <li class="breadcrumb-item"><a class="bread"
                                href="<?php echo e(url(Session::get('lang').'/tourist_attraction')); ?>"><?php echo app('translator')->get('lang.tourist_attraction'); ?></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">*<?php if(Session::get('lang') ==
                            'en'): ?><?php echo e($attractionDetail->district_en); ?><?php else: ?><?php echo e($attractionDetail->district_th); ?><?php endif; ?>*
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-8">
                <div class="text-title text-bold text-grey"><?php if(Session::get('lang') ==
                    'en'): ?> <?php echo e($attractionDetail->attraction_en); ?> <?php else: ?> <?php echo e($attractionDetail->attraction_th); ?> <?php endif; ?>
                </div>
                <div class="text-tiny text-grey my-3"><?php if(Session::get('lang') ==
                    'en'): ?> <?php echo $attractionDetail->detail_en; ?> <?php else: ?> <?php echo $attractionDetail->detail_th; ?> <?php endif; ?></div>
                <?php echo $attractionDetail->api_map; ?>

                <?php if(Session::get('lang') ==
                'en'): ?> <?php echo $attractionDetail->title_en; ?> <?php else: ?> <?php echo $attractionDetail->title_th; ?> <?php endif; ?>
                
            </div>  
            <div class="col-sm-4">
                <div class="name-text text-bold text-grey"><?php echo app('translator')->get('lang.gallery'); ?></div>
                <div class="row">
                    <?php $__currentLoopData = $attractionDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-6">
                        <img src="<?php echo e(($val->image != '')? asset('assets_frontend/images/'.$val->image) : asset('assets_frontend/images/1-place.jpg')); ?>" style="width:100%"
                            data-bs-toggle="modal" data-bs-target="#popup-img-head_<?php echo e($val->id); ?>">
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="popup-img-head_<?php echo e($val->id); ?>" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content popup-img">
                            <div class="modal-body">
                                <div class="clearfix mb-2">
                                    <div class="float-end">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                </div>
                                <div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-touch="false"
                                    data-bs-interval="false">
                                    <div class="carousel-inner">
                                        <?php $__currentLoopData = $attractionDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($key+1 >= 0 && $key+1 <= 1): ?>
                                        <div class="carousel-item active">
                                            <img src="<?php echo e(($val->image != '')? asset('assets_frontend/images/'.$val->image) : asset('assets_frontend/images/1-place.jpg')); ?>"
                                                class="d-block w-100" alt="...">
                                        </div>
                                        <?php endif; ?>
                                        <?php if($key+1 >= 2): ?>
                                        <div class="carousel-item">
                                            <img src="<?php echo e(($val->image != '')? asset('assets_frontend/images/'.$val->image) : asset('assets_frontend/images/1-place.jpg')); ?>"
                                                class="d-block w-100" alt="...">
                                        </div> 
                                        <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                    <button class="carousel-control-prev" type="button"
                                        data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden"><?php echo app('translator')->get('lang.previous'); ?></span>
                                    </button>
                                    <button class="carousel-control-next" type="button"
                                        data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden"><?php echo app('translator')->get('lang.next'); ?></span>
                                    </button>
                                </div>
                                <div class="text-tiny text-grey text-end mt-1"><?php echo app('translator')->get('lang.all_pictures'); ?> (2)</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class=""></div>
    </div>
    <div class="space-footer"></div>
    <?php echo $__env->make('frontend/inc_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html><?php /**PATH /home/zkorn2/domains/korn2.orangeworkshop.info/public_html/Poolvilla/resources/views/frontend/tourist_attraction_detail.blade.php ENDPATH**/ ?>