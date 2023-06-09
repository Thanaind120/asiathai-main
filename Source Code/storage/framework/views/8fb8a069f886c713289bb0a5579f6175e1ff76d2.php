<!doctype html>
<html lang="th">
<head>
    <title><?php echo app('translator')->get('lang.poolvilla'); ?></title>
    <?php echo $__env->make('frontend/inc_header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets_frontend/css/owl.carousel.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets_frontend/css/owl.theme.default.min.css')); ?>">
    <script src="<?php echo e(asset('assets_frontend/js/owl.carousel.min.js')); ?>"></script>
    <?php $active[0]='active'; ?>
</head>
<body>
    <?php echo $__env->make('frontend/inc_navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="bg-orange">
        
    </div>
    <div class="bg-grey-2">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="none-mobile">
                        <?php echo $__env->make('frontend/inc_account', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>
                <div class="col-sm-9">
                    <div class="mt-4"></div>
                    <div class="row">
                        <div>
                            <a style="cursor:pointer" class="btn-booking btn_show active"><?php echo app('translator')->get('lang.upcoming'); ?></a>
                            <a style="cursor:pointer" class="btn-booking btn_show"><?php echo app('translator')->get('lang.completed'); ?></a>
                            <a style="cursor:pointer" class="btn-booking btn_show"><?php echo app('translator')->get('lang.cancelled'); ?></a>
                        </div>
                    </div>
                    
                    <div>
                        <div class="boxshow">
                            <br>
                            
                            
                            <?php $__currentLoopData = $mybooking; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="card booking mb-3" href="#">
                                <div class="row g-0">
                                    <div class="col-md-3">
                                        <?php $image = DB::table('db_image_poolvilla')->where('poolvilla_id',$val->poolvilla_id)->first();?>
                                        <a href="#">
                                            <img src="<?php echo e(asset(@$image->image)); ?>" class="img-fluid" alt="...">
                                        </a>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-7">
                                                    <div class="name-text">
                                                        <?php if(Session::get('lang') == 'en'): ?>
                                                        <?php echo e($val->name_en); ?> <?php else: ?> <?php echo e($val->name_th); ?>

                                                        <?php endif; ?> - <?php echo e($val->name); ?>

                                                    </div>
                                                        <?php if($val->booking_id >= 1 && $val->booking_id <= 9): ?>
                                                        <div class="text-grey text-review"><?php echo app('translator')->get('lang.booking_id'); ?> : B0000000<?php echo e($val->booking_id); ?></div>
                                                        <?php elseif($val->booking_id >= 10 && $val->booking_id <= 99): ?>
                                                        <div class="text-grey text-review"><?php echo app('translator')->get('lang.booking_id'); ?> : B000000<?php echo e($val->booking_id); ?></div>
                                                        <?php elseif($val->booking_id >= 100 && $val->booking_id <= 999): ?>
                                                        <div class="text-grey text-review"><?php echo app('translator')->get('lang.booking_id'); ?> : B00000<?php echo e($val->booking_id); ?></div>
                                                        <?php elseif($val->booking_id >= 1000 && $val->booking_id <= 9999): ?>
                                                        <div class="text-grey text-review"><?php echo app('translator')->get('lang.booking_id'); ?> : B0000<?php echo e($val->booking_id); ?></div>
                                                        <?php elseif($val->booking_id >= 10000 && $val->booking_id <= 99999): ?>
                                                        <div class="text-grey text-review"><?php echo app('translator')->get('lang.booking_id'); ?> : B000<?php echo e($val->booking_id); ?></div>
                                                        <?php elseif($val->booking_id >= 100000 && $val->booking_id <= 999999): ?>
                                                        <div class="text-grey text-review"><?php echo app('translator')->get('lang.booking_id'); ?> : B00<?php echo e($val->booking_id); ?></div>
                                                        <?php elseif($val->booking_id >= 1000000 && $val->booking_id <= 9999999): ?>
                                                        <div class="text-grey text-review"><?php echo app('translator')->get('lang.booking_id'); ?> : B0<?php echo e($val->booking_id); ?></div>
                                                        <?php elseif($val->booking_id >= 10000000 && $val->booking_id <= 99999999): ?>
                                                        <div class="text-grey text-review"><?php echo app('translator')->get('lang.booking_id'); ?> : B<?php echo e($val->booking_id); ?></div>
                                                        <?php elseif($val->booking_id >= 100000000): ?>
                                                        <div class="text-grey text-review"><?php echo app('translator')->get('lang.booking_id'); ?> : B<?php echo e($val->booking_id); ?></div>
                                                        <?php endif; ?>
                                                </div>
                                                <div class="col-sm-5">
                                                    <div class="vl-left">
                                                        <div class="text-light-grey text-small"><?php echo app('translator')->get('lang.booked_on'); ?> 
                                                            <?php
                                                            $date = new DateTime($val->booking_date);
                                                            $dates = $val->booking_date;
                                                            $newdate = $date->format(DateTime::RFC822); 
                                                            $explode = explode(" ",$newdate);
                                                            $explodes = explode("-",$dates);
                                                            echo $explode[1]." ".$explode[2]." ".$explodes[0];
                                                            ?>
                                                        </div>
                                                        <div class="row g-0 mt-2">
                                                            <div class="col-5">
                                                                <div class="text-light-grey text-tiny"><?php echo app('translator')->get('lang.Check_in'); ?></div>
                                                                <div class="row g-0">
                                                                    <div class="col-6">
                                                                        <div class="text-light-grey text-check">
                                                                            <?php
                                                                            $date = new DateTime($val->check_in);
                                                                            $dates = $val->check_in;
                                                                            $newdate = $date->format(DateTime::RFC822); 
                                                                            $explode = explode(" ",$newdate);
                                                                            $explodes = explode("-",$dates);
                                                                            echo $explode[1];
                                                                            ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <div class="text-light-grey text-small">
                                                                            <?php
                                                                            $date = new DateTime($val->check_in);
                                                                            $dates = $val->check_in;
                                                                            $newdate = $date->format(DateTime::RFC822); 
                                                                            $explode = explode(" ",$newdate);
                                                                            $explodes = explode("-",$dates);
                                                                            echo $explode[2];
                                                                            ?>
                                                                        </div>
                                                                        <div class="text-light-grey text-small">
                                                                            <?php
                                                                            $date = new DateTime($val->check_in);
                                                                            $dates = $val->check_in;
                                                                            $newdate = $date->format(DateTime::RFC822); 
                                                                            $explode = explode(",",$newdate);
                                                                            $explodes = explode("-",$dates);
                                                                            echo $explode[0];
                                                                            ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-7">
                                                                <div class="vl-left-dash">
                                                                    <div class="text-light-grey text-tiny"><?php echo app('translator')->get('lang.Check_out'); ?>
                                                                    </div>
                                                                    <div class="row g-0">
                                                                        <div class="col-6">
                                                                            <div class="text-light-grey text-check">
                                                                            <?php
                                                                            $date = new DateTime($val->check_out);
                                                                            $dates = $val->check_out;
                                                                            $newdate = $date->format(DateTime::RFC822); 
                                                                            $explode = explode(" ",$newdate);
                                                                            $explodes = explode("-",$dates);
                                                                            echo $explode[1];
                                                                            ?>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <div class="text-light-grey text-small">
                                                                            <?php
                                                                            $date = new DateTime($val->check_out);
                                                                            $dates = $val->check_out;
                                                                            $newdate = $date->format(DateTime::RFC822); 
                                                                            $explode = explode(" ",$newdate);
                                                                            $explodes = explode("-",$dates);
                                                                            echo $explode[2];
                                                                            ?>
                                                                            </div>
                                                                            <div class="text-light-grey text-small">
                                                                            <?php
                                                                            $date = new DateTime($val->check_out);
                                                                            $dates = $val->check_out;
                                                                            $newdate = $date->format(DateTime::RFC822); 
                                                                            $explode = explode(",",$newdate);
                                                                            $explodes = explode("-",$dates);
                                                                            echo $explode[0];
                                                                            ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="text-price text-grey text-bold text-end mt-4">
                                                            THB <span class="text-red"><?php echo e(number_format($val->price)); ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="vl-top-book">
                                    <div class="row">
                                        <div class="col-sm-9">
                                            <div class="row">
                                                <div class="col-auto">
                                                    <a style="cursor:pointer" class="text-blue text-small" data-bs-toggle="modal"
                                                        data-bs-target="#confirmation_<?php echo e($val->booking_id); ?>"><?php echo app('translator')->get('lang.send_booking_confirmation'); ?></a>
                                                </div>
                                                <div class="col-auto">
                                                    <div class="vl-blue">
                                                        <a style="cursor:pointer" class="text-blue text-small"
                                                            href="<?php echo e($val->url_maps); ?>"
                                                            target="_blank"><?php echo app('translator')->get('lang.view_on_map'); ?>
                                                        </a>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Modal confirmation-->
                                            <div class="modal fade" id="confirmation_<?php echo e($val->booking_id); ?>" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <form action="<?php echo e(url(Session::get('lang').'/mybooking/updated/'.$val->booking_id)); ?>" method="post" autocomplete="off">
                                                            <?php echo csrf_field(); ?>
                                                            <?php echo method_field('PUT'); ?>
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel"><?php echo app('translator')->get('lang.get_booking_confirmation'); ?></h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <label for="exampleFormControlInput1"
                                                                    class="form-label text-bold text-tiny"><?php echo app('translator')->get('lang.email'); ?></label>
                                                                <input type="email" class="form-control"
                                                                    id="email" name="email" required>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn-search-booking"><?php echo app('translator')->get('lang.send_to_email'); ?></button>
                                                                
                                                                
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <a type="submit" class="btn-blue" href="<?php echo e(url(Session::get('lang').'/booking_detail/id='.$val->booking_id)); ?>"><?php echo app('translator')->get('lang.view_details'); ?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <div class="space-booking"></div>
                        </div>
                        <div class="boxshow">
                            <br>
                            
                            
                            <?php $__currentLoopData = $mybookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="card booking mb-3" href="#">
                                <div class="row g-0">
                                    <div class="col-md-3">
                                        <?php $image = DB::table('db_image_poolvilla')->where('poolvilla_id',$val->poolvilla_id)->first();?>
                                        <a href="#">
                                            <img src="<?php echo e(asset(@$image->image)); ?>" class="img-fluid" alt="...">
                                        </a>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-7">
                                                    <div class="name-text">
                                                        <?php if(Session::get('lang') == 'en'): ?>
                                                        <?php echo e($val->name_en); ?> <?php else: ?> <?php echo e($val->name_th); ?>

                                                        <?php endif; ?> - <?php echo e($val->name); ?>

                                                    </div>
                                                    <?php if($val->booking_id >= 1 && $val->booking_id <= 9): ?>
                                                    <div class="text-grey text-review"><?php echo app('translator')->get('lang.booking_id'); ?> : B0000000<?php echo e($val->booking_id); ?></div>
                                                    <?php elseif($val->booking_id >= 10 && $val->booking_id <= 99): ?>
                                                    <div class="text-grey text-review"><?php echo app('translator')->get('lang.booking_id'); ?> : B000000<?php echo e($val->booking_id); ?></div>
                                                    <?php elseif($val->booking_id >= 100 && $val->booking_id <= 999): ?>
                                                    <div class="text-grey text-review"><?php echo app('translator')->get('lang.booking_id'); ?> : B00000<?php echo e($val->booking_id); ?></div>
                                                    <?php elseif($val->booking_id >= 1000 && $val->booking_id <= 9999): ?>
                                                    <div class="text-grey text-review"><?php echo app('translator')->get('lang.booking_id'); ?> : B0000<?php echo e($val->booking_id); ?></div>
                                                    <?php elseif($val->booking_id >= 10000 && $val->booking_id <= 99999): ?>
                                                    <div class="text-grey text-review"><?php echo app('translator')->get('lang.booking_id'); ?> : B000<?php echo e($val->booking_id); ?></div>
                                                    <?php elseif($val->booking_id >= 100000 && $val->booking_id <= 999999): ?>
                                                    <div class="text-grey text-review"><?php echo app('translator')->get('lang.booking_id'); ?> : B00<?php echo e($val->booking_id); ?></div>
                                                    <?php elseif($val->booking_id >= 1000000 && $val->booking_id <= 9999999): ?>
                                                    <div class="text-grey text-review"><?php echo app('translator')->get('lang.booking_id'); ?> : B0<?php echo e($val->booking_id); ?></div>
                                                    <?php elseif($val->booking_id >= 10000000 && $val->booking_id <= 99999999): ?>
                                                    <div class="text-grey text-review"><?php echo app('translator')->get('lang.booking_id'); ?> : B<?php echo e($val->booking_id); ?></div>
                                                    <?php elseif($val->booking_id >= 100000000): ?>
                                                    <div class="text-grey text-review"><?php echo app('translator')->get('lang.booking_id'); ?> : B<?php echo e($val->booking_id); ?></div>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="col-sm-5">
                                                    <div class="vl-left">
                                                        <div class="text-light-grey text-small"><?php echo app('translator')->get('lang.booked_on'); ?> 
                                                            <?php
                                                            $date = new DateTime($val->booking_date);
                                                            $dates = $val->booking_date;
                                                            $newdate = $date->format(DateTime::RFC822); 
                                                            $explode = explode(" ",$newdate);
                                                            $explodes = explode("-",$dates);
                                                            echo $explode[1]." ".$explode[2]." ".$explodes[0];
                                                            ?>
                                                        </div>
                                                        <div class="row g-0 mt-2">
                                                            <div class="col-5">
                                                                <div class="text-light-grey text-tiny"><?php echo app('translator')->get('lang.Check_in'); ?></div>
                                                                <div class="row g-0">
                                                                    <div class="col-6">
                                                                        <div class="text-light-grey text-check">
                                                                            <?php
                                                                            $date = new DateTime($val->check_in);
                                                                            $dates = $val->check_in;
                                                                            $newdate = $date->format(DateTime::RFC822); 
                                                                            $explode = explode(" ",$newdate);
                                                                            $explodes = explode("-",$dates);
                                                                            echo $explode[1];
                                                                            ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <div class="text-light-grey text-small">
                                                                            <?php
                                                                            $date = new DateTime($val->check_in);
                                                                            $dates = $val->check_in;
                                                                            $newdate = $date->format(DateTime::RFC822); 
                                                                            $explode = explode(" ",$newdate);
                                                                            $explodes = explode("-",$dates);
                                                                            echo $explode[2];
                                                                            ?>
                                                                        </div>
                                                                        <div class="text-light-grey text-small">
                                                                            <?php
                                                                            $date = new DateTime($val->check_in);
                                                                            $dates = $val->check_in;
                                                                            $newdate = $date->format(DateTime::RFC822); 
                                                                            $explode = explode(",",$newdate);
                                                                            $explodes = explode("-",$dates);
                                                                            echo $explode[0];
                                                                            ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-7">
                                                                <div class="vl-left-dash">
                                                                    <div class="text-light-grey text-tiny"><?php echo app('translator')->get('lang.Check_out'); ?>
                                                                    </div>
                                                                    <div class="row g-0">
                                                                        <div class="col-6">
                                                                            <div class="text-light-grey text-check">
                                                                                <?php
                                                                                $date = new DateTime($val->check_out);
                                                                                $dates = $val->check_out;
                                                                                $newdate = $date->format(DateTime::RFC822); 
                                                                                $explode = explode(" ",$newdate);
                                                                                $explodes = explode("-",$dates);
                                                                                echo $explode[1];
                                                                                ?>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <div class="text-light-grey text-small">
                                                                            <?php
                                                                            $date = new DateTime($val->check_out);
                                                                            $dates = $val->check_out;
                                                                            $newdate = $date->format(DateTime::RFC822); 
                                                                            $explode = explode(" ",$newdate);
                                                                            $explodes = explode("-",$dates);
                                                                            echo $explode[2];
                                                                            ?>
                                                                            </div>
                                                                            <div class="text-light-grey text-small">
                                                                            <?php
                                                                            $date = new DateTime($val->check_out);
                                                                            $dates = $val->check_out;
                                                                            $newdate = $date->format(DateTime::RFC822); 
                                                                            $explode = explode(",",$newdate);
                                                                            $explodes = explode("-",$dates);
                                                                            echo $explode[0];
                                                                            ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="text-price text-grey text-bold text-end mt-4">
                                                            THB <span class="text-red"><?php echo e(number_format($val->price)); ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="vl-top-book">
                                    <div class="row">
                                        <div class="col-sm-9">
                                        </div>
                                        <div class="col-sm-3">
                                            <a type="submit" class="btn-blue" href="<?php echo e(url(Session::get('lang').'/booking_detail/id='.$val->booking_id)); ?>"><?php echo app('translator')->get('lang.view_details'); ?></a>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <div class="space-booking"></div>
                        </div>
                        <div class="boxshow">
                            <br>
                            
                            
                            <?php $__currentLoopData = $Mybookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="card booking mb-3" href="#">
                                <div class="row g-0">
                                    <div class="col-md-3">
                                        <?php $image = DB::table('db_image_poolvilla')->where('poolvilla_id',$val->poolvilla_id)->first();?>
                                        <a href="#">
                                            <img src="<?php echo e(asset(@$image->image)); ?>" class="img-fluid" alt="...">
                                        </a>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-7">
                                                    <div class="name-text">
                                                        <?php if(Session::get('lang') == 'en'): ?>
                                                        <?php echo e($val->name_en); ?> <?php else: ?> <?php echo e($val->name_th); ?>

                                                        <?php endif; ?> - <?php echo e($val->name); ?>

                                                    </div>
                                                    <?php if($val->booking_id >= 1 && $val->booking_id <= 9): ?>
                                                    <div class="text-grey text-review"><?php echo app('translator')->get('lang.booking_id'); ?> : B0000000<?php echo e($val->booking_id); ?></div>
                                                    <?php elseif($val->booking_id >= 10 && $val->booking_id <= 99): ?>
                                                    <div class="text-grey text-review"><?php echo app('translator')->get('lang.booking_id'); ?> : B000000<?php echo e($val->booking_id); ?></div>
                                                    <?php elseif($val->booking_id >= 100 && $val->booking_id <= 999): ?>
                                                    <div class="text-grey text-review"><?php echo app('translator')->get('lang.booking_id'); ?> : B00000<?php echo e($val->booking_id); ?></div>
                                                    <?php elseif($val->booking_id >= 1000 && $val->booking_id <= 9999): ?>
                                                    <div class="text-grey text-review"><?php echo app('translator')->get('lang.booking_id'); ?> : B0000<?php echo e($val->booking_id); ?></div>
                                                    <?php elseif($val->booking_id >= 10000 && $val->booking_id <= 99999): ?>
                                                    <div class="text-grey text-review"><?php echo app('translator')->get('lang.booking_id'); ?> : B000<?php echo e($val->booking_id); ?></div>
                                                    <?php elseif($val->booking_id >= 100000 && $val->booking_id <= 999999): ?>
                                                    <div class="text-grey text-review"><?php echo app('translator')->get('lang.booking_id'); ?> : B00<?php echo e($val->booking_id); ?></div>
                                                    <?php elseif($val->booking_id >= 1000000 && $val->booking_id <= 9999999): ?>
                                                    <div class="text-grey text-review"><?php echo app('translator')->get('lang.booking_id'); ?> : B0<?php echo e($val->booking_id); ?></div>
                                                    <?php elseif($val->booking_id >= 10000000 && $val->booking_id <= 99999999): ?>
                                                    <div class="text-grey text-review"><?php echo app('translator')->get('lang.booking_id'); ?> : B<?php echo e($val->booking_id); ?></div>
                                                    <?php elseif($val->booking_id >= 100000000): ?>
                                                    <div class="text-grey text-review"><?php echo app('translator')->get('lang.booking_id'); ?> : B<?php echo e($val->booking_id); ?></div>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="col-sm-5">
                                                    <div class="vl-left">
                                                        <div class="text-light-grey text-small"><?php echo app('translator')->get('lang.booked_on'); ?> 
                                                            <?php
                                                            $date = new DateTime($val->booking_date);
                                                            $dates = $val->booking_date;
                                                            $newdate = $date->format(DateTime::RFC822); 
                                                            $explode = explode(" ",$newdate);
                                                            $explodes = explode("-",$dates);
                                                            echo $explode[1]." ".$explode[2]." ".$explodes[0];
                                                            ?>
                                                        </div>
                                                        <div class="row g-0 mt-2">
                                                            <div class="col-5">
                                                                <div class="text-light-grey text-tiny"><?php echo app('translator')->get('lang.Check_in'); ?></div>
                                                                <div class="row g-0">
                                                                    <div class="col-6">
                                                                        <div class="text-light-grey text-check">
                                                                            <?php
                                                                            $date = new DateTime($val->check_in);
                                                                            $dates = $val->check_in;
                                                                            $newdate = $date->format(DateTime::RFC822); 
                                                                            $explode = explode(" ",$newdate);
                                                                            $explodes = explode("-",$dates);
                                                                            echo $explode[1];
                                                                            ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <div class="text-light-grey text-small">
                                                                            <?php
                                                                            $date = new DateTime($val->check_in);
                                                                            $dates = $val->check_in;
                                                                            $newdate = $date->format(DateTime::RFC822); 
                                                                            $explode = explode(" ",$newdate);
                                                                            $explodes = explode("-",$dates);
                                                                            echo $explode[2];
                                                                            ?>
                                                                        </div>
                                                                        <div class="text-light-grey text-small">
                                                                            <?php
                                                                            $date = new DateTime($val->check_in);
                                                                            $dates = $val->check_in;
                                                                            $newdate = $date->format(DateTime::RFC822); 
                                                                            $explode = explode(",",$newdate);
                                                                            $explodes = explode("-",$dates);
                                                                            echo $explode[0];
                                                                            ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-7">
                                                                <div class="vl-left-dash">
                                                                    <div class="text-light-grey text-tiny"><?php echo app('translator')->get('lang.Check_out'); ?>
                                                                    </div>
                                                                    <div class="row g-0">
                                                                        <div class="col-6">
                                                                            <div class="text-light-grey text-check">
                                                                                <?php
                                                                                $date = new DateTime($val->check_out);
                                                                                $dates = $val->check_out;
                                                                                $newdate = $date->format(DateTime::RFC822); 
                                                                                $explode = explode(" ",$newdate);
                                                                                $explodes = explode("-",$dates);
                                                                                echo $explode[1];
                                                                                ?>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <div class="text-light-grey text-small">
                                                                            <?php
                                                                            $date = new DateTime($val->check_out);
                                                                            $dates = $val->check_out;
                                                                            $newdate = $date->format(DateTime::RFC822); 
                                                                            $explode = explode(" ",$newdate);
                                                                            $explodes = explode("-",$dates);
                                                                            echo $explode[2];
                                                                            ?>
                                                                            </div>
                                                                            <div class="text-light-grey text-small">
                                                                            <?php
                                                                            $date = new DateTime($val->check_out);
                                                                            $dates = $val->check_out;
                                                                            $newdate = $date->format(DateTime::RFC822); 
                                                                            $explode = explode(",",$newdate);
                                                                            $explodes = explode("-",$dates);
                                                                            echo $explode[0];
                                                                            ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="text-price text-grey text-bold text-end mt-4">
                                                            THB <span class="text-red"><?php echo e(number_format($val->price)); ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="vl-top-book">
                                    <div class="row">
                                        <div class="col-sm-9">
                                        </div>
                                        <div class="col-sm-3">
                                            <a type="submit" class="btn-blue" href="<?php echo e(url(Session::get('lang').'/booking_detail/id='.$val->booking_id)); ?>"><?php echo app('translator')->get('lang.view_details'); ?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <div class="space-booking"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php echo $__env->make('frontend/inc_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <script>
        $('.btn_show').click(function (event) {
            var rsnum = $(this).index();
            if ($(".boxshow").eq(rsnum).is(":hidden")) {
                $(".boxshow").hide();
                $(".boxshow").eq(rsnum).fadeIn();
            } else {}
            event.stopPropagation();
        });
    
        $(function () {
            $('.btn_show').click(function () {
                $('.btn_show').removeClass('active');
                $(this).addClass('active');
            });
        });

        // $('#room').on('keyup', function () {
        //     var input = $(this);
        //     if (input.val().length === 0) {
        //         input.addClass('empty');
        //     } else {
        //         input.removeClass('empty');
        //     }
        // });
    
    </script>
    
</body>

</html>


<?php /**PATH /home/zkorn2/domains/korn2.orangeworkshop.info/public_html/Poolvilla/resources/views/frontend/mybooking.blade.php ENDPATH**/ ?>