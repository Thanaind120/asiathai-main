<!doctype html>
<html lang="th">

<head>
    <title><?php echo app('translator')->get('lang.poolvilla'); ?></title>
    <?php echo $__env->make('frontend/inc_header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets_frontend/css/owl.carousel.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets_frontend/css/owl.theme.default.min.css')); ?>">
    <script src="<?php echo e(asset('assets_frontend/js/owl.carousel.min.js')); ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .heighttext {
            height: 53px
        }

    </style>
</head>

<body>
    <?php echo $__env->make('sweetalert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('frontend/inc_navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="bg-orange-light2">
        <form action="<?php echo e(url(Session::get('lang').'/select-hotel/search')); ?>" method="get" autocomplete="off">
            <div class="row g-1">
                <div class="col-lg-2 col-12">
                    <div class="autocomplete heighttext">
                        <input class="form-control emptytwo orange" type="text" id="iconified" name="province"
                            placeholder="&#xF002; <?php echo app('translator')->get('lang.where_are_you_going'); ?>" aria-label="" value="">
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
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
                                            <input class="form-control orange-check check-in-out" id="datepicker"
                                                type="text" placeholder="<?php echo app('translator')->get('lang.date'); ?>" name="ci" value="<?php echo e(@$check_in); ?>">
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
                                            type="text" placeholder="<?php echo app('translator')->get('lang.date'); ?>" name="co" value="<?php echo e(@$check_out); ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
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
                                                        value="<?php echo e(@$adult); ?>">
                                                    <button class="btn add" type="button" id="add">+</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="row g-2">
                                            <label for="inputPassword"
                                                class="col-4 text-tiny text-orange text-center"><?php echo app('translator')->get('lang.kid'); ?></label>
                                            <div class="col-8 mt-0">
                                                <div class="input-group input-number">
                                                    <button class="btn sub2" type="button" id="sub2">-</button>
                                                    <input class="input-number border-0 text-center field2"
                                                        placeholder="0" type="text" id="demoInput2" name="kid"
                                                        value="<?php echo e($kid); ?>">
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
                                                        placeholder="1" type="text" id="demoInput3" name="ro" value="<?php echo e(@$select_room); ?>">
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
                <div class="col-lg-2 col-12">
                    <button type="submit" class="btn-search two"><?php echo app('translator')->get('lang.search'); ?></button>
                </div>
            </div>
        </form>
    </div>
    <div class="bg-orange">
        <!-- <div class="clearfix">
            <div class="float-end width-search">
                <input class="form-control empty orange" type="text" id="iconified" placeholder="&#xF002;  Where  are  you  looking for ?" aria-label="default input example">
            </div>
        </div> -->
    </div>
    <div class="container">
        <div class="clearfix">
            <div class="float-start">
                <div class="for-destop">
                    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="bread" href="<?php echo e(url('/'.Session::get('lang'))); ?>"><?php echo app('translator')->get('lang.home'); ?></a>
                            </li>
                            <li class="breadcrumb-item"><a class="bread" href="<?php echo e(url(Session::get('lang').'/select-hotel/search?province='.$poolvilla->province_name.'&ci='.$check_in.'&co='.$check_out.'&adult='.$adult.'&kid='.$kid.'&ro='.$select_room)); ?>"><?php echo app('translator')->get('lang.select_hotel'); ?></a>
                            </li>
                            
                            <li class="breadcrumb-item active" aria-current="page"><?php echo e($poolvilla->province_name); ?></li>
                        </ol>
                    </nav>
                </div>
            </div>
            
        </div>
        <div class="row">
            <div class="col-sm-9">
                <div class="row g-1">
                <?php $image_poolvilla=DB::table('db_image_poolvilla')->where('poolvilla_id',$poolvilla->id)->get();?>
                    
                    <div class="col-sm-7">
                        <div class="img-a">
                            <?php if(isset($image_poolvilla[0]->image)): ?>
                            <img src="<?php echo e(asset(@$image_poolvilla[0]->image)); ?>" style="width:100%"
               
                                data-bs-toggle="modal" data-bs-target="#popup-img-head">
                                <?php endif; ?>
                        </div>
                    </div>
                    
    
                    <div class="col-sm-5">                
                    
                        <div class="img-b">
                        <?php if(isset($image_poolvilla[1]->image)): ?>
                            <img src="<?php echo e(asset(@$image_poolvilla[1]->image)); ?>" style="width:100%"
                                data-bs-toggle="modal" data-bs-target="#popup-img-head">
                        <?php endif; ?>
                        </div>
                        
                        <div class="row g-2">
                        
                            <div class="col-6">
                                <div class="img-c">
                                <?php if(isset($image_poolvilla[2]->image)): ?>
                                    <img src="<?php echo e(asset(@$image_poolvilla[2]->image)); ?>" style="width:100%"
                                        data-bs-toggle="modal" data-bs-target="#popup-img-head">
                                <?php endif; ?>
                                </div>
                            </div>
                            
                            <div class="col-6">
                                <div class="img-c text-on">
                                <?php if(isset($image_poolvilla[3]->image)): ?>
                                    <img src="<?php echo e(asset(@$image_poolvilla[3]->image)); ?>" style="width:100%"
                                        class="img-see-more" data-bs-toggle="modal" data-bs-target="#popup-img-head">
                            
                                    <div class="centered"><?php echo app('translator')->get('lang.see_more_photo'); ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                
                <!-- Modal -->
                <div class="modal fade" id="popup-img-head" data-bs-backdrop="static" data-bs-keyboard="false"
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
                                        <?php $__currentLoopData = $image_poolvilla; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item2 =>$ip2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="carousel-item <?php if($item2==0): ?>active <?php endif; ?>">
                                            <img src="<?php echo e(asset($ip2->image)); ?>"
                                                class="d-block w-100" alt="...">
                                        </div>
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
                                <div class="text-tiny text-grey text-end mt-1"><?php echo app('translator')->get('lang.all_pictures'); ?> (<?php echo e(count($image_poolvilla)); ?>)</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-white">
                    <div class="mt-3">
                        <div class="row mb-2">
                            <div class="col-auto">
                                <div class="text-title text-bold text-grey"><?php echo e($poolvilla->name_th); ?></div>
                            </div>
                            <div class="col-auto mt-2">
                                <?php for($i=0;$i<$poolvilla->star_rating;$i++): ?>
                                <i class="fas fa-star text-orange text-tiny"></i>
                                <?php endfor; ?>
                            </div>
                        </div>
                        <div class="text-light-grey text-tiny"><i class="fas fa-map-marker-alt me-1"></i><?php echo e($poolvilla->province_name); ?> ,
                            <?php echo e($poolvilla->country_name); ?>

                            <span><a href="https://www.google.com/maps" target="_blank"
                                    class="btn-link-map"><?php echo app('translator')->get('lang.show_on_map'); ?></a></span>
                        </div>
                    </div>
                    <div class="mt-2">
                        <div class="name-text text-bold text-grey"><?php echo app('translator')->get('lang.space_and_rooms'); ?></div>
                        <div class="text-grey text-tiny"><?php echo $poolvilla->detail_en; ?></div>
                        <div class="row">
                            <div class="col-auto">
                                <div class="text-grey text-tiny"><?php echo app('translator')->get('lang.max'); ?> 4 <?php echo app('translator')->get('lang.guests'); ?></div>
                            </div>
                            <?php if(Session::get('locale') == 'th'): ?>
                            <div class="col-auto col-sm-2">
                                <div class="vl-left">
                                    <div class="text-grey text-tiny">2&nbsp;<?php echo app('translator')->get('lang.bedrooms'); ?></div>
                                </div>
                            </div>
                            <?php elseif(Session::get('locale') == 'en' || Session::get('locale') == null): ?>
                            <div class="col-auto">
                                <div class="vl-left">
                                    <div class="text-grey text-tiny">2&nbsp;<?php echo app('translator')->get('lang.bedrooms'); ?></div>
                                </div>
                            </div>
                            <?php endif; ?>
                            <div class="col-auto">
                                <div class="vl-left">
                                    <div class="text-grey text-tiny">2&nbsp;<?php echo app('translator')->get('lang.bathrooms'); ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <div class="row g-1">
                            <?php if($poolvilla->breakfast>=1): ?>
                            <div class="col-sm-2 col-4">
                                <div class="box-facilities">
                                    <div class="text-orange icon-box-facilities"><i class="fas fa-utensils"></i></div>
                                    <div class="text-orange text-box-facilities"><?php echo app('translator')->get('lang.breakfast'); ?></div>
                                </div>
                            </div>
                            <?php endif; ?>
                            <?php if($poolvilla->parking>=1): ?>
                            <div class="col-sm-2 col-4">
                                <div class="box-facilities">
                                    <div class="text-orange icon-box-facilities"><i class="fas fa-car"></i></div>
                                    <div class="text-orange text-box-facilities"><?php echo app('translator')->get('lang.car_park'); ?></div>
                                </div>
                            </div>
                            <?php endif; ?>
                            <?php if($poolvilla->smoke>=1): ?>
                            <div class="col-sm-2 col-4">
                                <div class="box-facilities">
                                    <div class="text-orange icon-box-facilities"><i class="fas fa-smoking"></i></div>
                                    <div class="text-orange text-box-facilities"><?php echo app('translator')->get('lang.smorking_area'); ?></div>
                                </div>
                            </div>
                            <?php endif; ?>
                            <?php if($poolvilla->pet>=1): ?>
                            <div class="col-sm-2 col-4">
                                <div class="box-facilities">
                                    <div class="text-orange icon-box-facilities"><i class="fas fa-paw"></i></div>
                                    <div class="text-orange text-box-facilities"><?php echo app('translator')->get('lang.pet'); ?></div>
                                </div>
                            </div>
                            <?php endif; ?>
                            <?php if($poolvilla->child>=1): ?>
                            <div class="col-sm-2 col-4">
                                <div class="box-facilities">
                                    <div class="text-orange icon-box-facilities"><i class="fas fa-child"></i></div>
                                    <div class="text-orange text-box-facilities"><?php echo app('translator')->get('lang.kid'); ?></div>
                                </div>
                            </div>
                            <?php endif; ?>
                            <?php if($poolvilla->party>=1): ?>
                            <div class="col-sm-2 col-4">
                                <div class="box-facilities">
                                    <div class="text-orange icon-box-facilities"><i class="fas fa-beer"></i></div>
                                    <div class="text-orange text-box-facilities"><?php echo app('translator')->get('lang.party'); ?></div>
                                </div>
                            </div>
                            <?php endif; ?>
                            <!-- <div class="col-sm-2 col-4">
                                <div class="box-facilities">
                                    <div class="text-orange icon-box-facilities"><i class="fas fa-shuttle-van"></i>
                                    </div>
                                    <div class="text-orange text-box-facilities"><?php echo app('translator')->get('lang.airport_transfer'); ?></div>
                                </div>
                            </div> -->
                            <!-- <div class="col-sm-2 col-4">
                                <div class="box-facilities">
                                    <div class="text-orange icon-box-facilities"><i class="fas fa-swimming-pool"></i>
                                    </div>
                                    <div class="text-orange text-box-facilities"><?php echo app('translator')->get('lang.private_pool'); ?></div>
                                </div>
                            </div> -->
                          
                  
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="box-white">
                    <div class="row g-1">
                        <div class="col-3">
                            <div class="point-badge">9.2</div>
                        </div>
                        <div class="col-9">
                            <div class="text-grey text-review"><?php echo app('translator')->get('lang.exceptional'); ?></div>
                            <div class="text-light-grey text-tiny">562 <?php echo app('translator')->get('lang.reviews'); ?></div>
                        </div>
                    </div>
                    <div class="vl-top-book">
                        <a href="https://www.google.com/maps" target="_blank">
                            <img class="map w-100" src="<?php echo e(asset('assets_frontend/images/map.jpg')); ?>">
                        </a>
                        <div class="name-text text-bold text-grey mt-1"><?php echo app('translator')->get('lang.area_info'); ?></div>
                        <div class="text-tiny text-bold text-grey mt-1"><i
                                class="fas fa-walking me-2"></i><?php echo app('translator')->get('lang.near_by_landmarks'); ?></div>
                        <div class="row">
                            <div class="col-6">
                                <div class="text-tiny text-light-grey mt-1">location</div>
                            </div>
                            <div class="col-6">
                                <div class="text-tiny text-light-grey mt-1 text-end">100m.</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="text-tiny text-light-grey mt-1">location</div>
                            </div>
                            <div class="col-6">
                                <div class="text-tiny text-light-grey mt-1 text-end">100m.</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="text-tiny text-light-grey mt-1">location</div>
                            </div>
                            <div class="col-6">
                                <div class="text-tiny text-light-grey mt-1 text-end">100m.</div>
                            </div>
                        </div>
                        <div class="text-tiny text-bold text-grey mt-1"><i
                                class="fas fa-award me-2"></i><?php echo app('translator')->get('lang.population_landmarks'); ?></div>
                        <div class="row">
                            <div class="col-6">
                                <div class="text-tiny text-light-grey mt-1">location</div>
                            </div>
                            <div class="col-6">
                                <div class="text-tiny text-light-grey mt-1 text-end">100m.</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="text-tiny text-light-grey mt-1">location</div>
                            </div>
                            <div class="col-6">
                                <div class="text-tiny text-light-grey mt-1 text-end">100m.</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="text-tiny text-light-grey mt-1">location</div>
                            </div>
                            <div class="col-6">
                                <div class="text-tiny text-light-grey mt-1 text-end">100m.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="box-white">
            <div class="mt-2">
                <div class="name-text text-bold text-grey"><?php echo app('translator')->get('lang.select_your_room'); ?></div>
                <div class="text-grey text-tiny"><?php echo e($total_room); ?> <?php echo app('translator')->get('lang.rooms_type'); ?></div>
                <?php $__currentLoopData = $room; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item2 =>$r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $image_room=DB::table('db_image_room')->where('room_id',$r->id)->get();?>
                <div class="box-grey my-2">
                    <div class="name-text text-bold text-grey"><?php echo e($r->name); ?></div>
                    <div class="row g-2">
            
                        <div class="col-sm-3">
                        <?php if(isset($image_room[0]->image)): ?>
                            <img src="<?php echo e(asset(  $image_room[0]->image )); ?>" style="width:100%"
                                data-bs-toggle="modal" data-bs-target="#popup-img-room<?php echo e($r->id); ?>">
                        <?php endif; ?>
                            <div class="row g-2 mt-1">
                                <div class="col-6">
                                <?php if(isset($image_room[1]->image)): ?>
                                    <img src="<?php echo e(asset(  $image_room[1]->image )); ?>" style="width:100%"
                                        data-bs-toggle="modal" data-bs-target="#popup-img-room<?php echo e($r->id); ?>">
                                 <?php endif; ?>
                                </div>
                                <div class="col-6">
                                <?php if(isset($image_room[2]->image)): ?>
                                    <img src="<?php echo e(asset( $image_room[2]->image )); ?>" style="width:100%"
                                        data-bs-toggle="modal" data-bs-target="#popup-img-room<?php echo e($r->id); ?>">
                                <?php endif; ?>
                                </div>
                            </div>
                            <div class="text-blue text-tiny mt-2" data-bs-toggle="modal"
                                data-bs-target="#popup-img-room<?php echo e($r->id); ?>"><?php echo app('translator')->get('lang.see_more_photo'); ?></div>
                            <!-- Modal -->
                            <div class="modal fade" id="popup-img-room<?php echo e($r->id); ?>" data-bs-backdrop="static"
                                data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content popup-img">
                                        <div class="modal-body">
                                            <div class="clearfix mb-2">
                                                <div class="float-end">
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                            </div>
                                            <div id="carousel-room<?php echo e($r->id); ?>" class="carousel slide" data-bs-touch="false"
                                                data-bs-interval="false">
                                              
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">                                                      
                                                        <img src="<?php echo e(asset($image_room[0]->image)); ?>"
                                                            class="d-block w-100" alt="...">
                                                    </div>
                                                    <?php $__currentLoopData = $image_room; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item3=>$ir): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($item3!=0): ?>
                                                    <div class="carousel-item">
                                                        <img src="<?php echo e(asset($ir->image)); ?>"
                                                            class="d-block w-100" alt="...">
                                                    </div>
                                                    <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </div>
                                     
                                                <button class="carousel-control-prev" type="button"
                                                    data-bs-target="#carousel-room<?php echo e($r->id); ?>" data-bs-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden"><?php echo app('translator')->get('lang.previous'); ?></span>
                                                </button>
                                                <button class="carousel-control-next" type="button"
                                                    data-bs-target="#carousel-room<?php echo e($r->id); ?>" data-bs-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden"><?php echo app('translator')->get('lang.next'); ?></span>
                                                </button>
                                            </div>

                                            <div class="text-tiny text-grey text-end mt-1"><?php echo app('translator')->get('lang.all_pictures'); ?> (4)</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-2">
                                <div class="text-light-grey text-tiny"><i class="fas fa-home me-2"></i><?php echo app('translator')->get('lang.room_size'); ?>: <?php echo e(@$r->size); ?></div>
                                <div class="text-light-grey text-tiny"><i class="fas fa-bed me-2"></i>
                                <?php if($r->twin_bed>1): ?> <?php echo e($r->twin_bed); ?> Twin bed(s) <?php endif; ?> 
                                <?php if($r->full_bed>1): ?> <?php echo e($r->full_bed); ?> Full bed(s) <?php endif; ?> 
                                <?php if($r->queen_bed>1): ?> <?php echo e($r->queen_bed); ?> Queen bed(s) <?php endif; ?> 
                                <?php if($r->king_bed>1): ?> <?php echo e($r->king_bed); ?>  King bed(s) <?php endif; ?> 
                               </div>
                                <div class="text-light-grey text-tiny"><i class="fas fa-swimming-pool me-2"></i>Private
                                    pool</div>
                            </div>
                        </div>
                        <div class="col-sm-9">
                            <div class="none-mobile">
                                <div class="row g-1">
                                    <div class="col-sm-6">
                                        <div class="row g-1">
                                            <div class="col-7">
                                                <div class="text-tiny text-bold text-grey"><?php echo app('translator')->get('lang.benefit'); ?></div>
                                            </div>
                                            <div class="col-5">
                                                <div class="text-tiny text-bold text-grey"><?php echo app('translator')->get('lang.sleep'); ?></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="row g-1">
                                            <div class="col-4">
                                                <div class="text-tiny text-bold text-grey"><?php echo app('translator')->get('lang.price_per_night'); ?></div>
                                            </div>
                                            <div class="col-2">
                                                <div class="text-tiny text-bold text-grey"><?php echo app('translator')->get('lang.rooms'); ?></div>
                                            </div>
                                            <div class="col-6"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="box-white-detail">
                                    <div class="row g-1">
                                        <div class="col-sm-6">
                                            <div class="row g-1">
                                                <div class="col-7">
                                                    <div class="text-tiny text-bold text-light-grey"><?php echo app('translator')->get('lang.Your_price_includes'); ?>
                                                    </div>
                                                    <div class="text-tiny text-light-grey"><i
                                                            class="fas fa-circle text-green text-small mx-2"></i><?php echo app('translator')->get('lang.Beakfast_for_4'); ?></div>
                                                    <div class="text-tiny text-light-grey"><i
                                                            class="fas fa-circle text-green text-small mx-2"></i><?php echo app('translator')->get('lang.free_wifi'); ?></div>
                                                    <div class="text-tiny text-light-grey"><i
                                                            class="fas fa-circle text-green text-small mx-2"></i><?php echo app('translator')->get('lang.Cancellation_policy'); ?></div>
                                                </div>
                                                <div class="col-5">
                                                    <div class="vl-left facility">
                                                        <div class="text-tiny text-light-grey"><i
                                                                class="fas fa-male text-small mx-2"></i><?php echo app('translator')->get('lang.Adults'); ?> X <?php echo e($r->adult); ?></div>
                                                        <div class="text-tiny text-light-grey"><i
                                                                class="fas fa-child text-small mx-2"></i><?php echo app('translator')->get('lang.Kids'); ?> X <?php echo e($r->kids); ?></div>
                                                        <div class="text-small text-light-grey text-center"><?php echo e($r->kids); ?> <?php echo app('translator')->get('lang.kids_4'); ?></div>
                                                        <div class="text-small text-green text-center"><?php echo app('translator')->get('lang.FREE'); ?></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="row g-1">
                                                <div class="col-4">
                                                    <div class="vl-left facility">
                                                        <!-- <div class="box-save-red">Save 25%</div> -->
                                                        <div class="text-end">
                                                            <!-- <div class="text-light-grey text-small text-end">5,500</div> -->
                                                            <!-- <div class="line-th-price-room"></div> -->
                                                            <div
                                                                class="text-tiny text-grey text-bold text-end mt-1 mb-4">
                                                                THB <span class="text-red"><?php echo e(number_format($r->price)); ?></span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                              
                                                <div class="col-2">
                                                    <div class="vl-left facility">
                                                        <input class="input-number-room" id="set_total_room<?php echo e($r->id); ?>" onchange="set_total_room('<?php echo e($r->id); ?>')" type="number" min="0"
                                                            max="110" placeholder="0" >
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="vl-left facility">
                                                    <form action="<?php echo e(url('en/booking-1')); ?>" method="POST">
                                                            <?php echo csrf_field(); ?>
                                                            <input type="hidden" name="room_id" value="<?php echo e($r->id); ?>">
                                                            <input type="hidden" name="check_in" value="<?php echo e($check_in); ?>">
                                                            <input type="hidden" name="check_out" value="<?php echo e($check_out); ?>">
                                                            <input type="hidden" name="adult" value="<?php echo e($adult); ?>">
                                                            <input type="hidden" name="kid" value="<?php echo e($kid); ?>">
                                                            <input type="hidden" name="total_room" id="total_room<?php echo e($r->id); ?>">
                                                                 <button type="submit" class="btn-book"><?php echo app('translator')->get('lang.book_now'); ?></a>
                                                        </form>
                                                        <!-- <a href="<?php echo e(url(Session::get('lang').'/booking-1')); ?>" class="btn-book"><?php echo app('translator')->get('lang.book_now'); ?></a> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="for-mobile">
                                <div class="box-white-detail">
                                    <div class="row g-1">
                                        <div class="col-sm-6">
                                            <div class="row g-1">
                                                <div class="col-sm-7">
                                                    <div class="text-tiny text-bold text-grey"><?php echo app('translator')->get('lang.benefit'); ?></div>
                                                    <div class="text-tiny text-bold text-light-grey">Your price includes
                                                    </div>
                                                    <div class="text-tiny text-light-grey"><i
                                                            class="fas fa-circle text-green text-small mx-2"></i>Beakfast
                                                        for 4</div>
                                                    <div class="text-tiny text-light-grey"><i
                                                            class="fas fa-circle text-green text-small mx-2"></i>Free
                                                        WIFI</div>
                                                    <div class="text-tiny text-light-grey"><i
                                                            class="fas fa-circle text-green text-small mx-2"></i>Cancellation
                                                        policy</div>
                                                </div>
                                                <div class="col-sm-5">
                                                    <div class="text-tiny text-bold text-grey"><?php echo app('translator')->get('lang.sleep'); ?></div>
                                                    <div class="">
                                                        <div class="text-tiny text-light-grey"><i
                                                                class="fas fa-male text-small mx-2"></i>Adults X <?php echo e($r->adult); ?></div>
                                                        <div class="text-tiny text-light-grey"><i
                                                                class="fas fa-child text-small mx-2"></i>Kids X <?php echo e($r->kids); ?></div>
                                                        <div class="text-small text-light-grey">2 kids 4 - 10 years stay
                                                        </div>
                                                        <div class="text-small text-green">FREE</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="row g-1">
                                                <div class="col-sm-4 col-6">
                                                    <div class="">
                                                        <div class="text-tiny text-bold text-grey"><?php echo app('translator')->get('lang.price_per_night'); ?></div>
                                                        <!-- <div class="box-save-red">Save 25%</div> -->
                                                        <div class="text-end">
                                                            <!-- <div class="text-light-grey text-small text-end">5,500</div> -->
                                                            <!-- <div class="line-th-price-room"></div> -->
                                                            <div
                                                                class="text-tiny text-grey text-bold text-end mt-1 mb-4">
                                                                THB <span class="text-red"><?php echo e(number_format($r->price)); ?></span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-2 col-6">
                                                    <div class="vl-left facility">
                                                        <div class="text-tiny text-bold text-grey"><?php echo app('translator')->get('lang.rooms'); ?></div>
                                                        <input class="input-number-room" id=demoInput type=number min=0
                                                            max=110 placeholder="1">
                                                    </div>
                                                </div>
                                                <div class="col-sm6">
                                                    <div class="">
                                                        <a href="<?php echo e(url(Session::get('lang').'/booking-1/'.$r->id)); ?>" class="btn-book"><?php echo app('translator')->get('lang.book_now'); ?></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-white-detail mt-2">
                                <div class="accordion" id="accordionExample">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingOne1">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapseOne1" aria-expanded="true"
                                                aria-controls="collapseOne">
                                                <?php echo app('translator')->get('lang.Room_Facilities'); ?>
                                            </button>
                                        </h2>
                                        <div id="collapseOne1" class="accordion-collapse collapse show"
                                            aria-labelledby="headingOne1" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                            <?php $icon=DB::table('db_icon_room')->where('icon_id',$r->id)->get();?>
                                            <?php $fac=DB::table('db_facilities')->where('status',1)->get();?>
                                                <?php $__currentLoopData = $fac; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item4 =>$fa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php $icon=DB::table('db_icon')->where('facilities_id',$fa->id)->where('status',1)->get();?>
                                                <div class="row g-2">
                                                    <div class="col-sm-6">
                                                        <div class="text-tiny text-bold text-grey"><?php echo e($fa->facilities); ?></div>
                                                        
                                                        <div class="row g-2">
                                                            <div class="col-sm-6">
                                                                <?php $__currentLoopData = $icon; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item5 =>$ic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php $my_icon=DB::table('db_icon_room')->where('icon_id',$ic->id)->where('room_id',$r->id)->first();?>
                                                                <?php if(isset($my_icon)): ?>
                                                                <div class="text-small text-light-grey my-1"><img
                                                                        src="<?php echo e(asset('frontend_assets/icon/'.$ic->icon_img)); ?>"
                                                                        class="icon-facility me-2"><?php echo e($ic->icon_name); ?></div>
                                                                <?php endif; ?>
                                                                <!-- <div class="text-small text-light-grey my-1"><img
                                                                        src="<?php echo e(asset('assets_frontend/images/bath-tub.png')); ?>"
                                                                        class="icon-facility me-2">Bathtub</div>
                                                                <div class="text-small text-light-grey my-1"><img
                                                                        src="<?php echo e(asset('assets_frontend/images/towel.png')); ?>"
                                                                        class="icon-facility me-2">Towels</div> -->
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </div>
                                                         
                                                            <!-- <div class="col-sm-6">
                                                                <div class="text-small text-light-grey my-1"><img
                                                                        src="<?php echo e(asset('assets_frontend/images/skincare.png')); ?>"
                                                                        class="icon-facility me-2">Toiletries</div>
                                                                <div class="text-small text-light-grey my-1"><img
                                                                        src="<?php echo e(asset('assets_frontend/images/shower.png')); ?>"
                                                                        class="icon-facility me-2">Shower</div>
                                                            </div> -->
                                                        </div>
                                                       
                                                    </div>
                                                </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               
            <div class="name-text text-bold text-grey my-3"><?php echo app('translator')->get('lang.guest_review'); ?></div>
            <div class="row">
                <?php $__currentLoopData = $review; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-sm-4">
                    <div class="reviewimg-box">
                        <div class="fitter-review">
                            <img src="<?php echo e(($val->review_img != '')? asset(@$val->review_img) : asset('assets_frontend/images/4.2-place.jpg')); ?>" class="w-100">
                        </div>
                        <div class="review-text">
                            <p class="name-text text-white"><?php if(Session::get('lang') == 'en'): ?> <?php echo e($val->poolvilla_en); ?>

                                <?php else: ?> <?php echo e($val->poolvilla_th); ?> <?php endif; ?> - <?php if(Session::get('lang') == 'en'): ?>
                                <?php echo e($val->name); ?> <?php else: ?> <?php echo e($val->name); ?> <?php endif; ?></p>
                            <p class="detail-text text-white">><?php if(Session::get('lang') == 'en'): ?> <?php echo e($val->province_en); ?>

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
            <div class="clearfix mt-2">
                <div class="float-end">
                    <a href="<?php echo e(url(Session::get('lang').'/review-hotel/id='.$poolvilla->id)); ?>" class="btn-line-orange"><?php echo app('translator')->get('lang.read_all_reviews'); ?></a>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-sm-6">
                    <img src="<?php echo e(asset($image_poolvilla[0]->image)); ?>" class="w-100">
                </div>
                <div class="col-sm-6">
                    <div class="name-text text-bold text-grey my-3"><?php echo app('translator')->get('lang.more_about_poolvilla'); ?></div>
                    <div class="text-tiny text-grey my-3"><?php echo $poolvilla->more_about_en; ?></div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-7">
                    <!--accordion-->
                    <div class="name-text text-bold text-grey my-3"><?php echo app('translator')->get('lang.frequently_Asked_questions'); ?></div>
                    <div class="accordion accordion-flush" id="accordionFlushExample">
                    <?php $more_about=DB::table('db_question')->where('poolvilla_id',$poolvilla->id)->get();?>
                        <?php $__currentLoopData = $more_about; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item6 =>$ma): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-heading<?php echo e($item6); ?>">
                                <button class="accordion-button faq collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapse<?php echo e($item6); ?>" aria-expanded="false"
                                    aria-controls="flush-collapse<?php echo e($item6); ?>">
                                    <i class="far fa-question-circle text-orange me-2"></i><?php echo e($ma->question_en); ?>

                                </button>
                            </h2>
                            <div id="flush-collapse<?php echo e($item6); ?>" class="accordion-collapse collapse"
                                aria-labelledby="flush-heading<?php echo e($item6); ?>" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body"><?php echo e($ma->ans_en); ?></div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      <!--   <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingTwo">
                                <button class="accordion-button faq  collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseTwo" aria-expanded="false"
                                    aria-controls="flush-collapseTwo">
                                    <i class="far fa-question-circle text-orange me-2"></i>FAQ#2
                                </button>
                            </h2>
                            <div id="flush-collapseTwo" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    Aliquam vitae dapibus mi. Vivamus congue sodales luctus. Maecenas aliquet maximus
                                    dolor quis rutrum. Maecenas rutrum eros ac leo rhoncus, fringilla efficitur nibh
                                    ultrices. Suspendisse potenti. Duis aliquam nisl et elit facilisis, ac imperdiet ex
                                    tempor. Praesent egestas lobortis massa.</div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingThree">
                                <button class="accordion-button faq  collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseThree" aria-expanded="false"
                                    aria-controls="flush-collapseThree">
                                    <i class="far fa-question-circle text-orange me-2"></i>FAQ#3
                                </button>
                            </h2>
                            <div id="flush-collapseThree" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    Aliquam vitae dapibus mi. Vivamus congue sodales luctus. Maecenas aliquet maximus
                                    dolor quis rutrum. Maecenas rutrum eros ac leo rhoncus, fringilla efficitur nibh
                                    ultrices. Suspendisse potenti. Duis aliquam nisl et elit facilisis, ac imperdiet ex
                                    tempor. Praesent egestas lobortis massa.</div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
            <div class="head-text-index"><?php echo app('translator')->get('lang.Based_on_properties_you_might_like'); ?></div>
            <div class="line-bottom-head-text"></div>
            <!-- Recommend  slide -->
            <div class="">
                <div class="owl-carousel slide-carousel owl-theme  recommend">
                    <?php $__currentLoopData = $poolvillas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                    $image=DB::table('db_image_poolvilla')->where('poolvilla_id',$val->id)->first();
                    $discount = DB::table('db_discount')->where('ref_poolvilla_id',$val->id)->get();
                    if(Session::get('lang') == 'en'){
                    $province = $val->name_en;
                    }else{
                    $province = $val->name_th;
                    }
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
                    <a class="" href="<?php echo e(url(Session::get('lang').'/select-rooms/'.$val->id.'/'.$check_in.'/'.$check_out.'/adult='.$a_from.'/kid='.$k_from.'/room='.$ro)); ?>}">
                        <div class="card">
                            <div class="img-rec">
                                <img src="<?php echo e(asset(@$image->image)); ?>"
                                    class="card-img-top" alt="...">
                            </div>
                            <div class="card-body">
                                <p class="name-text"><?php if(Session::get('lang') == 'en'): ?> <?php echo e($val->name_en); ?> <?php else: ?>
                                    <?php echo e($val->name_th); ?> <?php endif; ?></p>
                                <p class="detail-text">
                                    <?php if(Session::get('lang') == 'en'): ?>
                                        <?php echo e($val->province_en); ?> <?php else: ?> <?php echo e($val->province_th); ?>

                                        <?php endif; ?>,<?php if(Session::get('lang') == 'en'): ?> <?php echo e($val->district_en); ?> <?php else: ?>
                                        <?php echo e($val->district_th); ?> <?php endif; ?>
                                </p>
                                <div class="row">
                                    <?php if($val->star_rating == 1): ?>
                                    <div class="star-rating">
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <?php elseif($val->star_rating == 2): ?>
                                    <div class="star-rating">
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <div class="star-rating">
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <?php elseif($val->star_rating == 3): ?>
                                    <div class="star-rating">
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <div class="star-rating">
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <div class="star-rating">
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <?php elseif($val->star_rating == 4): ?>
                                    <div class="star-rating">
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <div class="star-rating">
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <div class="star-rating">
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <div class="star-rating">
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <?php elseif($val->star_rating == 5): ?>
                                    <div class="star-rating">
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <div class="star-rating">
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <div class="star-rating">
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <div class="star-rating">
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <div class="star-rating">
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <!-- end of Recommend slide -->
        </div>
    </div>
    <div class="space-footer"></div>
    <?php echo $__env->make('frontend/inc_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html>
<script>
    $(function () {
        $("#datepicker").datepicker({
            dateFormat: 'dd/mm/yy',
        });
    });

    $(function () {
        $("#datepicker2").datepicker({
            dateFormat: 'dd/mm/yy',
        });
    });

    function set_total_room(room_id){
        var total_room=$('#set_total_room'+room_id).val();
        $('#total_room'+room_id).val(total_room);
    }
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

     /*An array containing all the province names in the world:*/
     var poolvilla = <?php echo json_encode($results); ?>;


    /*initiate the autocomplete function on the "POL" element, and pass along the countries array as possible autocomplete values:*/
    autocomplete(document.getElementById("iconified"), poolvilla);

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
</script><?php /**PATH /home/zkorn2/domains/korn2.orangeworkshop.info/public_html/Poolvilla/resources/views/frontend/select-rooms.blade.php ENDPATH**/ ?>