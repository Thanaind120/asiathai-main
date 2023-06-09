<!doctype html>
<html lang="th">

<head>
    <title><?php echo app('translator')->get('lang.poolvilla'); ?></title>
    <?php echo $__env->make('frontend/inc_header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets_frontend/css/owl.carousel.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets_frontend/css/owl.theme.default.min.css')); ?>">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="<?php echo e(asset('assets_frontend/js/owl.carousel.min.js')); ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
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
                        <div class="box-sidebaraccount mt-3">
                            <a href="<?php echo e(url(Session::get('lang').'/mybooking')); ?>" class="menu-account">
                                <div class="text-menu-account active">
                                    <div class="row">
                                        <div class="col-2"><i class="far fa-calendar"></i></div>
                                        <div class="col-10"><?php echo app('translator')->get('lang.my_booking'); ?></div>
                                    </div>
                                </div>
                            </a>
                            <a href="<?php echo e(url(Session::get('lang').'/review')); ?>" class="menu-account">
                                <div class="text-menu-account">
                                    <div class="row">
                                        <div class="col-2"><i class="far fa-star"></i></div>
                                        <div class="col-10"><?php echo app('translator')->get('lang.my_review'); ?></div>
                                    </div>
                                </div>
                            </a>
                            <a href="<?php echo e(url(Session::get('lang').'/profile')); ?>" class="menu-account">
                                <div class="text-menu-account">
                                    <div class="row">
                                        <div class="col-2"><i class="far fa-user"></i></div>
                                        <div class="col-10"><?php echo app('translator')->get('lang.profile'); ?></div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-9">
                    <div class="mt-4"></div>
                    <a href="<?php echo e(url(Session::get('lang').'/mybooking')); ?>" class="text-sort-by"><i
                            class="fas fa-chevron-left text-light-grey me-2"></i><?php echo app('translator')->get('lang.back_to_bookings'); ?></a>
                    <div class="box-white my-4">
                        <div class="text-bold text-filter"><?php echo app('translator')->get('lang.yourbooking_isconfirmed_noreconfirmation_required'); ?></div>
                        <div class="row mt-2">
                            <div class="col-sm-6">
                                <a style="cursor:pointer" class="text-tiny text-orange" data-bs-toggle="modal" data-bs-target="#confirmation_<?php echo e($mybooking->booking_id); ?>">
                                    <i class="fas fa-envelope me-2"></i><?php echo app('translator')->get('lang.get_booking_confirmation'); ?>
                                </a>
                            </div>
                            <div class="col-sm-6">
                                <a style="cursor:pointer" class="text-tiny text-orange" data-bs-toggle="modal" data-bs-target="#guest_<?php echo e($mybooking->booking_id); ?>"><i
                                        class="fas fa-user-tie me-2"></i><?php echo app('translator')->get('lang.manage_guest'); ?></a>
                            </div>
                            <div class="col-sm-6">
                                <a style="cursor:pointer" class="text-tiny text-orange" data-bs-toggle="modal" data-bs-target="#cancel_<?php echo e($mybooking->booking_id); ?>"><i
                                        class="fas fa-ban me-2"></i><?php echo app('translator')->get('lang.cancel_booking'); ?></a>
                            </div>
                            <div class="col-sm-6">
                                <a style="cursor:pointer" class="text-tiny text-orange" data-bs-toggle="modal" data-bs-target="#policies"><i
                                        class="fas fa-file-alt me-2"></i><?php echo app('translator')->get('lang.view_propoty_policies'); ?></a>
                            </div>
                        </div>
                    </div>
                    <!-- Modal confirmation-->
                    <div class="modal fade" id="confirmation_<?php echo e($mybooking->booking_id); ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <form action="<?php echo e(url(Session::get('lang').'/mybooking/updated/'.$mybooking->booking_id)); ?>" method="post" autocomplete="off">
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
                    <!-- Modal guest-->
                    <div class="modal fade" id="guest_<?php echo e($mybooking->booking_id); ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <form action="<?php echo e(url(Session::get('lang').'/mybooking/update/'.$mybooking->booking_id)); ?>" method="post" autocomplete="off">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('PUT'); ?>
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"><?php echo app('translator')->get('lang.manage_guest'); ?></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label for="exampleFormControlInput2"
                                                    class="form-label text-bold text-tiny"><?php echo app('translator')->get('lang.first_name'); ?> - <?php echo app('translator')->get('lang.last_name'); ?></label>
                                                <input type="text" class="form-control" id="fullname1" name="fullname1" value="<?php echo e($mybooking->fullname1); ?>">
                                            </div>
                                            
                                        
                                        
                                            
                                            <?php if(isset($mybooking->fullname2)): ?>
                                            <div id="Create" class="col-sm-6">
                                                <label for="exampleFormControlInput2"
                                                    class="form-label text-bold text-tiny"><?php echo app('translator')->get('lang.first_name'); ?> - <?php echo app('translator')->get('lang.last_name'); ?></label>
                                                <input type="text" class="form-control" id="fullname2" name="fullname2" value="<?php echo e($mybooking->fullname2); ?>">
                                            </div>
                                            <?php else: ?>
                                            <div id="Create" style="display:none" class="col-sm-6">
                                                <label for="exampleFormControlInput2"
                                                    class="form-label text-bold text-tiny"><?php echo app('translator')->get('lang.first_name'); ?> - <?php echo app('translator')->get('lang.last_name'); ?></label>
                                                <input type="text" class="form-control" id="fullname2" name="fullname2" value="">
                                            </div>
                                            <?php endif; ?>
                                                
                                        </div>
                                        
                                        <div>
                                            <input style="cursor:pointer" id="btn" class="text-small text-blue btn-anoter"
                                                value="<?php echo app('translator')->get('lang.add_another_guest'); ?>">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <div class="row g-1 justify-content-end">
                                            <div class="col-4">
                                                <button type="submit" class="btn-grey"
                                                    data-bs-dismiss="modal"><?php echo app('translator')->get('lang.cancel'); ?></button>
                                            </div>
                                            <div class="col-4">
                                                <button type="submit" class="btn-search-booking"><?php echo app('translator')->get('lang.save'); ?></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Modal cancel-->
                    <div class="modal fade" id="cancel_<?php echo e($mybooking->booking_id); ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <form action="<?php echo e(url(Session::get('lang').'/mybooking/cancel/'.$mybooking->booking_id)); ?>" method="post" autocomplete="off">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('PUT'); ?>
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"><?php echo app('translator')->get('lang.cancel_booking'); ?></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <label for="exampleFormControlInput1" class="form-label text-bold text-tiny"><?php echo app('translator')->get('lang.reason_for_cancellation'); ?></label>
                                        <div class="dropdown">
                                            
                                            
                                            <select class="js-example-basic-single" style="width: 100%" id="cancle_comment" name="cancle_comment">
                                                <option value=""><?php echo app('translator')->get('lang.please_select'); ?></option>
                                                <option value="<?php echo app('translator')->get('lang.booking_was_not_confirmed_quickly_enough'); ?>"><?php echo app('translator')->get('lang.booking_was_not_confirmed_quickly_enough'); ?></option>
                                                <option value="<?php echo app('translator')->get('lang.concerns_about_reliabilityandtrustworthiness'); ?>"><?php echo app('translator')->get('lang.concerns_about_reliabilityandtrustworthiness'); ?></option>
                                                <option value="<?php echo app('translator')->get('lang.concerns_about_safety_at_thehotel_location'); ?>"><?php echo app('translator')->get('lang.concerns_about_safety_at_thehotel_location'); ?></option>
                                                <option value="<?php echo app('translator')->get('lang.decided_on_a_different_hotel_not_offered_byyour_site'); ?>"><?php echo app('translator')->get('lang.decided_on_a_different_hotel_not_offered_byyour_site'); ?></option>
                                                <option value="<?php echo app('translator')->get('lang.did_not_like_cancellation_terms'); ?>"><?php echo app('translator')->get('lang.did_not_like_cancellation_terms'); ?></option>
                                                <option value="<?php echo app('translator')->get('lang.did_not_like_payment_terms'); ?>"><?php echo app('translator')->get('lang.did_not_like_payment_terms'); ?></option>
                                                <option value="<?php echo app('translator')->get('lang.forced_to_cancel_or_postpone_trip'); ?>"><?php echo app('translator')->get('lang.forced_to_cancel_or_postpone_trip'); ?></option>
                                                <option value="<?php echo app('translator')->get('lang.found_lower_price_on_the_Internet'); ?>"><?php echo app('translator')->get('lang.found_lower_price_on_the_Internet'); ?></option>
                                                <option value="<?php echo app('translator')->get('lang.found_lower_price_through_a_local_agent'); ?>"><?php echo app('translator')->get('lang.found_lower_price_through_a_local_agent'); ?></option>
                                                <option value="<?php echo app('translator')->get('lang.natural_disaster'); ?>"><?php echo app('translator')->get('lang.natural_disaster'); ?></option>
                                                <option value="<?php echo app('translator')->get('lang.will_book_a_different_hotel_through_your_site'); ?>"><?php echo app('translator')->get('lang.will_book_a_different_hotel_through_your_site'); ?></option>
                                                <option value="<?php echo app('translator')->get('lang.will_book_with_hotel_directly'); ?>"><?php echo app('translator')->get('lang.will_book_with_hotel_directly'); ?></option>
                                                <option value="<?php echo app('translator')->get('lang.other'); ?>"><?php echo app('translator')->get('lang.other'); ?></option>
                                            </select>
                                                
                                            
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <div class="row g-1 justify-content-end">
                                            <div class="col-4">
                                                <button type="button" class="btn-grey"
                                                    data-bs-dismiss="modal"><?php echo app('translator')->get('lang.cancel'); ?></button>
                                            </div>
                                            <div class="col-4">
                                                <button type="submit" class="btn-search-booking"><?php echo app('translator')->get('lang.cancel_booking'); ?></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Modal policies-->
                    <div class="modal fade" id="policies" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"><?php echo app('translator')->get('lang.view_propoty_policies'); ?></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="text-small text-bold text-grey"><?php echo app('translator')->get('lang.title'); ?></div>
                                    <div class="text-small  text-grey"><?php echo app('translator')->get('lang.title_details'); ?></div>
                                    <div class="text-small text-bold text-grey"><?php echo app('translator')->get('lang.title'); ?></div>
                                    <div class="text-small  text-grey"><?php echo app('translator')->get('lang.title_details'); ?></div>
                                </div>
                                <div class="modal-footer"></div>
                            </div>
                        </div>
                    </div>
                    <div class="box-white my-4">
                        <div class="row">
                            <div class="col-md-3">
                                <?php $image = DB::table('db_image_poolvilla')->where('poolvilla_id',$mybooking->poolvilla_id)->first();?>
                                <a href="#">
                                    <img src="<?php echo e(asset(@$image->image)); ?>" class="img-fluid" alt="...">
                                </a>
                            </div>
                            <div class="col-md-9">
                                <div class="mb-4">
                                    <div class="name-text">
                                        <?php if(Session::get('lang') == 'en'): ?>
                                            <?php echo e($mybooking->name_en); ?> 
                                        <?php else: ?> 
                                            <?php echo e($mybooking->name_th); ?>

                                        <?php endif; ?> - <?php echo e($mybooking->name); ?>

                                    </div>
                                    <div class="mb-2">
                                        <?php if($mybooking->star_rating == 5): ?>
                                        <i class="fas fa-star text-orange size-star"></i>
                                        <i class="fas fa-star text-orange size-star"></i>
                                        <i class="fas fa-star text-orange size-star"></i>
                                        <i class="fas fa-star text-orange size-star"></i>
                                        <i class="fas fa-star text-orange size-star"></i>
                                        <?php elseif($mybooking->star_rating == 4): ?>
                                        <i class="fas fa-star text-orange size-star"></i>
                                        <i class="fas fa-star text-orange size-star"></i>
                                        <i class="fas fa-star text-orange size-star"></i>
                                        <i class="fas fa-star text-orange size-star"></i>
                                        <?php elseif($mybooking->star_rating == 3): ?>
                                        <i class="fas fa-star text-orange size-star"></i>
                                        <i class="fas fa-star text-orange size-star"></i>
                                        <i class="fas fa-star text-orange size-star"></i>
                                        <?php elseif($mybooking->star_rating == 2): ?>
                                        <i class="fas fa-star text-orange size-star"></i>
                                        <i class="fas fa-star text-orange size-star"></i>
                                        <?php elseif($mybooking->star_rating == 1): ?>
                                        <i class="fas fa-star text-orange size-star"></i>
                                        <?php endif; ?>
                                    </div>
                                    <div class="text-blue text-tiny"><i class="fas fa-phone me-2"></i><?php echo e($mybooking->phone1); ?>, <?php if(isset($mybooking->phone2)): ?> <?php echo e($mybooking->phone1); ?> <?php endif; ?></div>
                                    <div class="text-blue text-tiny"><i class="fas fa-map-marker-alt me-2"></i> 
                                        <?php if(Session::get('lang') == 'en'): ?>
                                            <?php echo e($mybooking->province_en); ?> 
                                        <?php else: ?> 
                                            <?php echo e($mybooking->province_th); ?>

                                        <?php endif; ?>
                                        , <?php if(Session::get('lang') == 'en'): ?>
                                        <?php echo e($mybooking->district_en); ?> 
                                        <?php else: ?> 
                                        <?php echo e($mybooking->district_th); ?>

                                        <?php endif; ?>
                                        <span>
                                            
                                            <a href="<?php echo e($mybooking->url_maps); ?>"
                                                class="btn-link-map" target="_blank"><?php echo app('translator')->get('lang.show_on_map'); ?></a>
                                        </span>
                                    </div>
                                </div>
                                <div class="vl-booking-detail">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="text-tiny text-bold"><?php echo app('translator')->get('lang.booking_id'); ?></div>
                                        </div>
                                        <div class="col-sm-8">
                                            <?php if($mybooking->booking_id >= 1 && $mybooking->booking_id <= 9): ?>
                                            <div class="text-tiny"><?php echo app('translator')->get('lang.booking_id'); ?> : B0000000<?php echo e($mybooking->booking_id); ?></div>
                                            <?php elseif($mybooking->booking_id >= 10 && $mybooking->booking_id <= 99): ?>
                                            <div class="text-tiny"><?php echo app('translator')->get('lang.booking_id'); ?> : B000000<?php echo e($mybooking->booking_id); ?></div>
                                            <?php elseif($mybooking->booking_id >= 100 && $mybooking->booking_id <= 999): ?>
                                            <div class="text-tiny"><?php echo app('translator')->get('lang.booking_id'); ?> : B00000<?php echo e($mybooking->booking_id); ?></div>
                                            <?php elseif($mybooking->booking_id >= 1000 && $mybooking->booking_id <= 9999): ?>
                                            <div class="text-tiny"><?php echo app('translator')->get('lang.booking_id'); ?> : B0000<?php echo e($mybooking->booking_id); ?></div>
                                            <?php elseif($mybooking->booking_id >= 10000 && $mybooking->booking_id <= 99999): ?>
                                            <div class="text-tiny"><?php echo app('translator')->get('lang.booking_id'); ?> : B000<?php echo e($mybooking->booking_id); ?></div>
                                            <?php elseif($mybooking->booking_id >= 100000 && $mybooking->booking_id <= 999999): ?>
                                            <div class="text-tiny"><?php echo app('translator')->get('lang.booking_id'); ?> : B00<?php echo e($mybooking->booking_id); ?></div>
                                            <?php elseif($mybooking->booking_id >= 1000000 && $mybooking->booking_id <= 9999999): ?>
                                            <div class="text-tiny"><?php echo app('translator')->get('lang.booking_id'); ?> : B0<?php echo e($mybooking->booking_id); ?></div>
                                            <?php elseif($mybooking->booking_id >= 10000000 && $mybooking->booking_id <= 99999999): ?>
                                            <div class="text-tiny"><?php echo app('translator')->get('lang.booking_id'); ?> : B<?php echo e($mybooking->booking_id); ?></div>
                                            <?php elseif($mybooking->booking_id >= 100000000): ?>
                                            <div class="text-tiny"><?php echo app('translator')->get('lang.booking_id'); ?> : B<?php echo e($mybooking->booking_id); ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="vl-booking-detail">
                                    <div class="row mb-1">
                                        <div class="col-sm-4">
                                            <div class="text-tiny text-bold"><?php echo app('translator')->get('lang.check_in'); ?></div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="text-tiny">
                                                <?php
                                                $date = new DateTime($mybooking->check_in);
                                                $dates = $mybooking->check_in;
                                                $newdate = $date->format(DateTime::RFC822); 
                                                $explode = explode(" ",$newdate);
                                                $explodes = explode("-",$dates);
                                                echo $explode[1]." ".$explode[2]." ".$explodes[0];
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col-sm-4">
                                            <div class="text-tiny text-bold"><?php echo app('translator')->get('lang.check_out'); ?></div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="text-tiny">
                                                <?php
                                                $date = new DateTime($mybooking->check_out);
                                                $dates = $mybooking->check_out;
                                                $newdate = $date->format(DateTime::RFC822); 
                                                $explode = explode(" ",$newdate);
                                                $explodes = explode("-",$dates);
                                                echo $explode[1]." ".$explode[2]." ".$explodes[0];
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col-sm-4">
                                            <div class="text-tiny text-bold"></div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="text-tiny">
                                                <?php
                                                $date1 = date_create($mybooking->check_in);
                                                $date2 = date_create($mybooking->check_out);
                                                $diff = date_diff($date1,$date2);
                                                $explode = $diff->format("%a days");
                                                $explodes = explode(" ",$explode);
                                                echo $explodes[0];
                                                ?>
                                                <?php echo app('translator')->get('lang.nights'); ?></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="vl-booking-detail">
                                    <div class="row mb-1">
                                        <div class="col-sm-4">
                                            <div class="text-tiny text-bold"><?php echo app('translator')->get('lang.contact_detail'); ?></div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="text-tiny"><?php echo app('translator')->get('lang.email'); ?> <?php if($mybooking->email != ''): ?> : <?php echo e($mybooking->email); ?> <?php endif; ?></div>
                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col-sm-4">
                                            <div class="text-tiny text-bold"></div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="text-tiny"><?php echo e($mybooking->phone1); ?></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="vl-booking-detail">
                                    <div class="row mb-1">
                                        <div class="col-sm-4">
                                            <div class="text-tiny text-bold"><?php echo app('translator')->get('lang.lead_guest'); ?></div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="text-tiny"><?php echo e($mybooking->fullname1); ?></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="vl-booking-detail">
                                    <div class="row mb-1">
                                        <div class="col-sm-4">
                                            <div class="text-tiny text-bold"><?php echo app('translator')->get('lang.additional_guest'); ?></div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="text-tiny"><?php echo e($mybooking->fullname2); ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="title-booking-detail"><?php echo app('translator')->get('lang.rooms'); ?></div>
                        <div class="row mt-4">
                            <div class="col-md-3">
                                <?php $image = DB::table('db_image_poolvilla')->where('poolvilla_id',$mybooking->poolvilla_id)->first();?>
                                <a href="#">
                                    <img src="<?php echo e(asset(@$image->image)); ?>" class="img-fluid" alt="...">
                                </a>
                                <div class="text-small text-light-grey mt-2"><?php echo app('translator')->get('lang.room_size'); ?> : <?php echo e($mybooking->size); ?></div>
                                <div class="text-small text-light-grey mt-1"><?php echo e($mybooking->king_bed); ?> King bed & <?php echo e($mybooking->queen_bed); ?>  Queen bed</div>
                                <div class="text-small text-light-grey mt-1">Private pool</div>
                            </div>
                            <div class="col-md-9">
                                <div class="vl-booking-detail">
                                    <div class="row mb-1">
                                        <div class="col-sm-4">
                                            <div class="text-tiny text-bold"><?php echo app('translator')->get('lang.rooms_booked'); ?></div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="text-tiny">privates pool (x<?php echo e($mybooking->number_of_room); ?>)</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="vl-booking-detail">
                                    <div class="row mb-1">
                                        <div class="col-sm-4">
                                            <div class="text-tiny text-bold"><?php echo app('translator')->get('lang.booked_capacity'); ?></div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="text-tiny"><?php echo e($mybooking->booking_adult); ?> adults</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="vl-booking-detail">
                                    <div class="row mb-1">
                                        <div class="col-sm-4">
                                            <div class="text-tiny text-bold"><?php echo app('translator')->get('lang.max_capacity'); ?></div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="text-tiny"><?php echo e($mybooking->room_adult); ?> adults</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="vl-booking-detail">
                                    <div class="row mb-1">
                                        <div class="col-sm-4">
                                            <div class="text-tiny text-bold"><?php echo app('translator')->get('lang.room_type'); ?></div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="text-tiny">Privated pool</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="vl-booking-detail">
                                    <div class="row mb-1">
                                        <div class="col-sm-4">
                                            <div class="text-tiny text-bold"><?php echo app('translator')->get('lang.room_capacity'); ?></div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="text-tiny">Max <?php echo e($mybooking->max_room); ?> adults</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="title-booking-detail"><?php echo app('translator')->get('lang.payment'); ?></div>
                        <div class="row mt-4">
                            <div class="col-md-3"></div>
                            <div class="col-md-9">
                                <div class="vl-booking-detail">
                                    <div class="row mb-1">
                                        <div class="col-sm-4">
                                            <div class="text-tiny text-bold"><?php echo app('translator')->get('lang.payment_details'); ?></div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="text-tiny"><?php echo app('translator')->get('lang.total_amount_charged'); ?></div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="text-tiny">THB <?php echo e(number_format($mybooking->price)); ?></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="vl-booking-detail">
                                    <div class="row mb-1">
                                        <div class="col-sm-4">
                                            <div class="text-tiny text-bold"><?php echo app('translator')->get('lang.payment_methods'); ?></div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="text-tiny"><?php echo app('translator')->get('lang.card_holder_name'); ?></div>
                                                </div>
                                                <div class="col-6">
                                                    <?php $member = DB::table('db_payment')->where('id_member', Auth::guard('member')->user()->id)->first();?>
                                                    <div class="text-tiny"><?php if(isset($member->credit_number)): ?> <?php echo e($member->credit_number); ?> <?php else: ?> xxxx-xxxx-xxxx-xxxx <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col-sm-4">
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="text-tiny"><?php echo app('translator')->get('lang.card_type'); ?></div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="text-tiny">Visa</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col-sm-4">
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="text-tiny"><?php echo app('translator')->get('lang.card_number'); ?></div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="text-tiny">
                                                        <?php
                                                        $payment = isset($member->credit_cvv);
                                                        $explode = explode("-",$payment);
                                                        if(isset($explode[3])){
                                                            echo 'xxxx-xxxx-xxxx-'.$explode[3];
                                                        } else {
                                                            echo 'xxxx-xxxx-xxxx-xxxx';
                                                        }
                                                        ?>
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
            </div>
        </div>
    </div>
    <?php echo $__env->make('frontend/inc_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html>

<script type="text/javascript">
    $(document).ready(function () {
        $("#btn").click(function () {
            $("#Create").toggle();
        });
    });

</script>
<?php /**PATH /home/zkorn2/domains/korn2.orangeworkshop.info/public_html/Poolvilla/resources/views/frontend/booking_detail.blade.php ENDPATH**/ ?>