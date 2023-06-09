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
            <img src="<?php echo e(($_district->district_image != '')? asset('assets_frontend/images/'.$_district->district_image) : asset('assets_frontend/images/place-banner2.jpg')); ?>"
                class="banner-index">
            <div class="centered_box">
                <div class="text-banner-country text-center">*<?php if(Session::get('lang') ==
                    'en'): ?><?php echo e($_district->name_en); ?><?php else: ?><?php echo e($_district->name_th); ?><?php endif; ?>*</div>
            </div>
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
                            'en'): ?><?php echo e($_district->name_en); ?><?php else: ?><?php echo e($_district->name_th); ?><?php endif; ?>*</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3 none-mobile">
                <div class="filter-badge"><i class="fas fa-filter me-2"></i><?php echo app('translator')->get('lang.filters'); ?></div>
                <div class="mt-4">
                    <div class="text-orange text-filter"><?php echo app('translator')->get('lang.category'); ?></div>
                    <div class="ms-4 mt-2">
                        <form id="formCategory"
                            action="<?php echo e(url(Session::get('lang').'/tourist_attraction_province/search')); ?>" method="get">
                            <input type="hidden" name="id" value="<?php echo e($district_id); ?>">
                            <input type="hidden" name="province" value="<?php echo e($province); ?>">
                            <input type="hidden" name="district" value="<?php echo e($district); ?>">
                            <?php if(isset($landmarks_from)): ?>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="<?php echo e($landmarks_from); ?>"
                                    id="landmarks" name="landmarks" checked>
                                <label class="form-check-label" for="flexCheckChecked1">
                                    <?php echo app('translator')->get('lang.landmarks'); ?>
                                </label>
                            </div>
                            <?php else: ?>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" id="landmarks"
                                    name="landmarks">
                                <label class="form-check-label" for="flexCheckChecked1">
                                    <?php echo app('translator')->get('lang.landmarks'); ?>
                                </label>
                            </div>
                            <?php endif; ?>
                            <?php if(isset($attractions_from)): ?>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="<?php echo e($attractions_from); ?>"
                                    id="attractions" name="attractions" checked>
                                <label class="form-check-label" for="flexCheckChecked2">
                                    <?php echo app('translator')->get('lang.attractions'); ?>
                                </label>
                            </div>
                            <?php else: ?>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="2" id="attractions"
                                    name="attractions">
                                <label class="form-check-label" for="flexCheckChecked2">
                                    <?php echo app('translator')->get('lang.attractions'); ?>
                                </label>
                            </div>
                            <?php endif; ?>
                            <?php if(isset($restaurant_from)): ?>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="<?php echo e($restaurant_from); ?>"
                                    id="restaurant" name="restaurant" checked>
                                <label class="form-check-label" for="flexCheckChecked3">
                                    <?php echo app('translator')->get('lang.restaurant'); ?>
                                </label>
                            </div>
                            <?php else: ?>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="3" id="restaurant"
                                    name="restaurant">
                                <label class="form-check-label" for="flexCheckChecked3">
                                    <?php echo app('translator')->get('lang.restaurant'); ?>
                                </label>
                            </div>
                            <?php endif; ?>
                            <?php if(isset($activities_from)): ?>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="<?php echo e($activities_from); ?>"
                                    id="activities" name="activities" checked>
                                <label class="form-check-label" for="flexCheckChecked4">
                                    <?php echo app('translator')->get('lang.activities'); ?>
                                </label>
                            </div>
                            <?php else: ?>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="4" id="activities"
                                    name="activities">
                                <label class="form-check-label" for="flexCheckChecked4">
                                    <?php echo app('translator')->get('lang.activities'); ?>
                                </label>
                            </div>
                            <?php endif; ?>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-9">
                <div class="clearfix mb-3">
                    <div class="for-mobile">
                        <div class="float-start">
                            <button type="button" class="filter-badge" data-bs-toggle="modal"
                                data-bs-target="#exampleModal"><i
                                    class="fas fa-filter me-2"></i><?php echo app('translator')->get('lang.filters'); ?></button>
                        </div>
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"><?php echo app('translator')->get('lang.filter'); ?></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div>
                                            <div class="vl-filter">
                                                <div class="text-orange text-filter"><i
                                                        class="fas fa-star me-2"></i><?php echo app('translator')->get('lang.category'); ?></div>
                                                <div class="ms-4 mt-2">
                                                    <form id="formCategory"
                                                        action="<?php echo e(url(Session::get('lang').'/tourist_attraction_province/search')); ?>"
                                                        method="get">
                                                        <?php if(isset($landmarks_from)): ?>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                value="<?php echo e($landmarks_from); ?>" id="landmarks"
                                                                name="landmarks" checked>
                                                            <label class="form-check-label" for="flexCheckChecked1">
                                                                <?php echo app('translator')->get('lang.landmarks'); ?>
                                                            </label>
                                                        </div>
                                                        <?php else: ?>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="1"
                                                                id="landmarks" name="landmarks">
                                                            <label class="form-check-label" for="flexCheckChecked1">
                                                                <?php echo app('translator')->get('lang.landmarks'); ?>
                                                            </label>
                                                        </div>
                                                        <?php endif; ?>
                                                        <?php if(isset($attractions_from)): ?>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                value="<?php echo e($attractions_from); ?>" id="attractions"
                                                                name="attractions" checked>
                                                            <label class="form-check-label" for="flexCheckChecked2">
                                                                <?php echo app('translator')->get('lang.attractions'); ?>
                                                            </label>
                                                        </div>
                                                        <?php else: ?>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="2"
                                                                id="attractions" name="attractions">
                                                            <label class="form-check-label" for="flexCheckChecked2">
                                                                <?php echo app('translator')->get('lang.attractions'); ?>
                                                            </label>
                                                        </div>
                                                        <?php endif; ?>
                                                        <?php if(isset($restaurant_from)): ?>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                value="<?php echo e($restaurant_from); ?>" id="restaurant"
                                                                name="restaurant" checked>
                                                            <label class="form-check-label" for="flexCheckChecked3">
                                                                <?php echo app('translator')->get('lang.restaurant'); ?>
                                                            </label>
                                                        </div>
                                                        <?php else: ?>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="3"
                                                                id="restaurant" name="restaurant">
                                                            <label class="form-check-label" for="flexCheckChecked3">
                                                                <?php echo app('translator')->get('lang.restaurant'); ?>
                                                            </label>
                                                        </div>
                                                        <?php endif; ?>
                                                        <?php if(isset($activities_from)): ?>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                value="<?php echo e($activities_from); ?>" id="activities"
                                                                name="activities" checked>
                                                            <label class="form-check-label" for="flexCheckChecked4">
                                                                <?php echo app('translator')->get('lang.activities'); ?>
                                                            </label>
                                                        </div>
                                                        <?php else: ?>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="4"
                                                                id="activities" name="activities">
                                                            <label class="form-check-label" for="flexCheckChecked4">
                                                                <?php echo app('translator')->get('lang.activities'); ?>
                                                            </label>
                                                        </div>
                                                        <?php endif; ?>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <div class="col-sm-4">
                                            <button type="submit" class="btn-grey"
                                                data-bs-dismiss="modal"><?php echo app('translator')->get('lang.cancel'); ?></button>
                                        </div>
                                        <div class="col-sm-4">
                                            <button type="submit"
                                                class="btn-search-booking"><?php echo app('translator')->get('lang.submit'); ?></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                    
                    
                    
                    
                </div>
                <div class="row">
                    <?php $__currentLoopData = $attraction; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-6 mb-2">
                        <div class="frame-item box-destination">
                            <a href="<?php echo e(url(Session::get('lang').'/tourist_attraction_detail/id='.$val->id)); ?>"
                                class="">
                                <img src="<?php echo e(($val->attraction_image != '')? asset('assets_frontend/images/'.$val->attraction_image) : asset('assets_frontend/images/1-place.jpg')); ?>"
                                    class="img-des">
                                <div class="bottom-left">
                                    <p class="name-text text-white"><?php if(Session::get('lang') == 'en'): ?>
                                        <?php echo e($val->attraction_en); ?> <?php else: ?> <?php echo e($val->attraction_th); ?> <?php endif; ?></p>
                                    <p class="detail-text text-white"><?php if(Session::get('lang') == 'en'): ?>
                                        <?php echo e($val->name_en); ?> <?php else: ?> <?php echo e($val->name_th); ?> <?php endif; ?> , <?php if(Session::get('lang')
                                        == 'en'): ?> <?php echo e($val->district_en); ?> <?php else: ?> <?php echo e($val->district_th); ?> <?php endif; ?></p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="space-footer"></div>
    <?php echo $__env->make('frontend/inc_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <script>
        $('#formCategory').change(function () {

            document.getElementById('formCategory').submit(); // SUB

        });
    </script>
</body>

</html><?php /**PATH /home/zkorn2/domains/korn2.orangeworkshop.info/public_html/Poolvilla/resources/views/frontend/tourist_attraction_province.blade.php ENDPATH**/ ?>