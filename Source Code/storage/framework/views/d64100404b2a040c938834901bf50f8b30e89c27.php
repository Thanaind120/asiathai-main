<!doctype html>
<html lang="th">
<head>
    <title><?php echo app('translator')->get('lang.poolvilla'); ?></title>
    <?php echo $__env->make('frontend/inc_header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets_frontend/css/owl.carousel.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets_frontend/css/owl.theme.default.min.css')); ?>">
    <script src="<?php echo e(asset('assets_frontend/js/owl.carousel.min.js')); ?>"></script>
    <?php $active[2]='active'; ?>
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
                    <div class="text-title text-grey text-bold mb-3"><?php echo app('translator')->get('lang.user_detail'); ?></div>
                    <div class="box-white">
                        <form method="POST" enctype="multipart/form-data"
                            action="<?php echo e(url(Session::get('lang').'/profile/id='.Auth::guard('member')->user()->id)); ?>">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <div class="col-sm-8">
                                <input type="hidden" value="<?php echo e(Auth::guard('member')->user()->id); ?>">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label text-bold text-tiny"><?php echo app('translator')->get('lang.first_name'); ?></label>
                                    <input type="text" class="form-control" id="firstname" placeholder=""
                                        name="firstname" value="<?php echo e(Auth::guard('member')->user()->firstname); ?>" maxlength="255">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label text-bold text-tiny"><?php echo app('translator')->get('lang.last_name'); ?></label>
                                    <input type="text" class="form-control" id="lastname" placeholder="" name="lastname"
                                        value="<?php echo e(Auth::guard('member')->user()->lastname); ?>" maxlength="255">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1"
                                        class="form-label text-bold text-tiny"><?php echo app('translator')->get('lang.e_mail'); ?></label>
                                    <input type="email" class="form-control" id="email" placeholder="" name="email"
                                        onblur="check_email(this)" value="<?php echo e(Auth::guard('member')->user()->email); ?>" maxlength="255">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label text-bold text-tiny"><?php echo app('translator')->get('lang.phone_number'); ?></label>
                                    <input type="text" class="form-control" id="phone" placeholder="" name="phone"
                                        onblur="check_phone(this)" value="<?php echo e(Auth::guard('member')->user()->phone); ?>" maxlength="255">
                                </div>
                            </div>
                            <div class="row g-1">
                                <div class="col-sm-4">
                                    
                                    <a href="<?php echo e(url(Session::get('lang').'/profile')); ?>" class="btn btn-grey" data-bs-dismiss="modal"
                                        style="color:grey;border-radius: 15px;font-size: 12px;"><?php echo app('translator')->get('lang.cancel'); ?></a>
                                </div>
                                <div class="col-sm-4">
                                    <button type="submit" class="btn-search-booking"><?php echo app('translator')->get('lang.save'); ?></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="text-title text-grey text-bold mt-4 mb-3"><?php echo app('translator')->get('lang.payment_method'); ?></div>
                    <div class="row mb-3">
                        <?php $__currentLoopData = $payment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-sm-4 col-6">
                            <div class="box-white visa">
                                <div class="clearfix mb-2">
                                    <div class="float-start">
                                        <img class="visa-icon" src="<?php echo e(asset('assets_frontend/images/logo-visa.jpg')); ?>">
                                    </div>
                                    <div class="float-end">
                                        <a href="" class="text-tiny text-blue" data-bs-toggle="modal"
                                            data-bs-target="#edit-card"
                                            onclick="show_edit('<?php echo e($val->id); ?>','<?php echo e($val->credit_number); ?>','<?php echo e($val->credit_name); ?>','<?php echo e($val->credit_date); ?>','<?php echo e($val->credit_cvv); ?>')"><?php echo app('translator')->get('lang.edit'); ?></a>
                                    </div>
                                </div>
                                <div class="text-tiny text-grey"><?php echo e($val->credit_number); ?></div>
                                <div class="text-tiny text-grey">*<?php echo e($val->credit_name); ?>*</div>
                                <div class="text-tiny text-grey">*<?php echo e($val->credit_date); ?>*</div>
                                <div class="clearfix">
                                    <div class="float-end">
                                        <button class="text-red text-tiny btn-trach"
                                            onclick="delete_payment(<?php echo e($val->id); ?>)">
                                            <i class="far fa-trash-alt"></i>
                                        </button>
                                    </div>
                                </div>
                                <!-- Modal edit card-->
                                <div class="modal fade" id="edit-card" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <form method="POST" enctype="multipart/form-data"
                                        action="<?php echo e(url(Session::get('lang').'/profile/payment/id='.$val->id)); ?>">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('PUT'); ?>
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel"><?php echo app('translator')->get('lang.edit_credit_card'); ?></h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="">
                                                        <label for="exampleFormControlInput2"
                                                            class="form-label text-bold text-tiny"><?php echo app('translator')->get('lang.creditanddebit_card_number'); ?></label>
                                                        <input type="text" class="form-control"
                                                            id="card_number_for_edit" name="credit_number"
                                                            onblur="check_cards(this)" value="<?php echo e($val->credit_number); ?>"
                                                            maxlength="19">
                                                        <!-- id for insert -->
                                                        <input type="hidden" name="id" id="id_for_edit">
                                                    </div>
                                                    <div class="">
                                                        <label for="exampleFormControlInput3"
                                                            class="form-label text-bold text-tiny"><?php echo app('translator')->get('lang.card_holder_name'); ?></label>
                                                        <input type="text" class="form-control" id="card_name_for_edit"
                                                            name="credit_name" value="<?php echo e($val->credit_name); ?>"
                                                            maxlength="255">
                                                    </div>
                                                    <div class="">
                                                        <label for="exampleFormControlInput3"
                                                            class="form-label text-bold text-tiny"><?php echo app('translator')->get('lang.expiry_date'); ?></label>
                                                        <input type="text" class="form-control" id="card_date_for_edit"
                                                            name="credit_date" value="<?php echo e($val->credit_date); ?>"
                                                            maxlength="7">
                                                    </div>
                                                    <div class="">
                                                        <label for="exampleFormControlInput3"
                                                            class="form-label text-bold text-tiny"><?php echo app('translator')->get('lang.cvv'); ?></label>
                                                        <input type="text" class="form-control" id="card_cvv_for_edit"
                                                            name="credit_cvv" value="<?php echo e($val->credit_cvv); ?>"
                                                            maxlength="19">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <div class="row g-1 justify-content-end">
                                                        <div class="col-sm-4">
                                                            
                                                            <a href="<?php echo e(url(Session::get('lang').'/profile')); ?>" class="btn btn-grey"
                                                                data-bs-dismiss="modal"
                                                                style="color:grey;border-radius: 15px;font-size: 12px;"><?php echo app('translator')->get('lang.cancel'); ?></a>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <button type="submit"
                                                                class="btn-search-booking"><?php echo app('translator')->get('lang.save'); ?></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-sm-4 col-6">
                            <div class="box-white visa">
                                <a data-bs-toggle="modal" data-bs-target="#add-card">
                                    <div class="btn-add text-blue"><i class="fas fa-plus"></i></div>
                                    <div class="text-tiny text-blue text-center"><?php echo app('translator')->get('lang.add_credit_card'); ?></div>
                                </a>
                            </div>
                        </div>
                        <!-- Modal add card -->
                        <div class="modal fade" id="add-card" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <form method="POST" enctype="multipart/form-data" action="<?php echo e(url(Session::get('lang').'/profile/payment')); ?>">
                                <?php echo csrf_field(); ?>
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel"><?php echo app('translator')->get('lang.add_credit_card'); ?></h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="">
                                                <label for="exampleFormControlInput2"
                                                    class="form-label text-bold text-tiny"><?php echo app('translator')->get('lang.creditanddebit_card_number'); ?></label>
                                                <input type="text" class="form-control" id="credit_number"
                                                    name="credit_number" maxlength="19" onblur="check_card(this)"
                                                    required>
                                            </div>
                                            <div class="">
                                                <label for="exampleFormControlInput3"
                                                    class="form-label text-bold text-tiny"><?php echo app('translator')->get('lang.card_holder_name'); ?></label>
                                                <input type="text" class="form-control" id="credit_name"
                                                    name="credit_name" maxlength="255" required>
                                            </div>
                                            <div class="">
                                                <label for="exampleFormControlInput3"
                                                    class="form-label text-bold text-tiny"><?php echo app('translator')->get('lang.expiry_date'); ?></label>
                                                <input type="text" class="form-control" id="credit_date"
                                                    name="credit_date" maxlength="7" required>
                                            </div>
                                            <div class="">
                                                <label for="exampleFormControlInput3"
                                                    class="form-label text-bold text-tiny"><?php echo app('translator')->get('lang.cvv'); ?></label>
                                                <input type="text" class="form-control" id="credit_cvv"
                                                    name="credit_cvv" maxlength="19" required>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <div class="row g-1 justify-content-end">
                                                <div class="col-sm-4">
                                                    
                                                    <a href="<?php echo e(url(Session::get('lang').'/profile')); ?>" class="btn btn-grey"
                                                        data-bs-dismiss="modal"
                                                        style="color:grey;border-radius: 15px;font-size: 12px;"><?php echo app('translator')->get('lang.cancel'); ?></a>
                                                </div>
                                                <div class="col-sm-4">
                                                    <button type="submit" class="btn-search-booking"><?php echo app('translator')->get('lang.save'); ?></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="text-title text-grey text-bold mb-3 mt-4"><?php echo app('translator')->get('lang.change_password'); ?></div>
                    <div class="box-white">
                        <form method="POST" enctype="multipart/form-data"
                            action="<?php echo e(url(Session::get('lang').'/profile/updated/id='.Auth::guard('member')->user()->id)); ?>">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <div class="col-sm-8">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label text-bold text-tiny"><?php echo app('translator')->get('lang.current_password'); ?></label>
                                    <input type="password" class="form-control" id="exampleFormControlInput1"
                                        placeholder="<?php echo app('translator')->get('lang.current_password'); ?>" name="password_3" maxlength="255" required>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label text-bold text-tiny"><?php echo app('translator')->get('lang.new_password'); ?></label>
                                    <input type="password" class="form-control" id="exampleFormControlInput1"
                                        placeholder="<?php echo app('translator')->get('lang.new_password'); ?>" name="password_1" maxlength="255" required>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label text-bold text-tiny"><?php echo app('translator')->get('lang.confirm_new_password'); ?></label>
                                    <input type="password" class="form-control" id="exampleFormControlInput1"
                                        placeholder="<?php echo app('translator')->get('lang.confirm_new_password'); ?>" name="password_2" maxlength="255" required>
                                </div>
                            </div>
                            <div class="row g-1">
                                <div class="col-sm-4">
                                    
                                    <a href="<?php echo e(url(Session::get('lang').'/profile')); ?>" class="btn btn-grey" data-bs-dismiss="modal"
                                        style="color:grey;border-radius: 15px;font-size: 12px;"><?php echo app('translator')->get('lang.cancel'); ?></a>
                                </div>
                                <div class="col-sm-4">
                                    <button type="submit" class="btn-search-booking"><?php echo app('translator')->get('lang.save'); ?></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="space-footer"></div>
                </div>
            </div>
        </div>
    </div>
    <?php echo $__env->make('frontend/inc_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <script type="text/javascript">
        $('#firstname').on('keypress', function (event) {
            var regex = new RegExp("^[ก-ฮๆไำะัี๊ฯุูึโ้็่๋าแิื์a-zA-Z]+$");
            var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
            if (!regex.test(key)) {
                event.preventDefault();
                return false;
            }
        });
        $('#lastname').on('keypress', function (event) {
            var regex = new RegExp("^[ก-ฮๆไำะัี๊ฯุูึโ้็่๋าแิื์a-zA-Z]+$");
            var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
            if (!regex.test(key)) {
                event.preventDefault();
                return false;
            }
        });

        function check_phone(inputtxt) {
            var phoneno = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
            if (inputtxt.value.match(phoneno)) {
                return true;
            } else {
                alert('You have entered an incorrect phone number! Example xxx-xxx-0011');
                return false;
            }
        }
        $('#phone').on('keypress', function (event) {
            var regex = new RegExp("^[0-9-]+$");
            var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
            if (!regex.test(key)) {
                event.preventDefault();
                return false;
            }
        });

        function check_card(inputtxt) {
            var phoneno = /^\(?([0-9]{4})\)?[-. ]?([0-9]{4})[-. ]?([0-9]{4})[-. ]?([0-9]{4})$/;
            if (inputtxt.value.match(phoneno)) {
                return true;
            } else {
                alert('You have entered an incorrect credit card number! Example xxxx-xxxx-xxxx');
                return false;
            }
        }
        $('#credit_number').on('keypress', function (event) {
            var regex = new RegExp("^[0-9-]+$");
            var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
            if (!regex.test(key)) {
                event.preventDefault();
                return false;
            }
        });

        function check_cards(inputtxt) {
            var phoneno = /^\(?([0-9]{4})\)?[-. ]?([0-9]{4})[-. ]?([0-9]{4})[-. ]?([0-9]{4})$/;
            if (inputtxt.value.match(phoneno)) {
                return true;
            } else {
                alert('You have entered an incorrect credit card number! Example xxxx-xxxx-xxxx');
                return false;
            }
        }
        $('#card_number_for_edit').on('keypress', function (event) {
            var regex = new RegExp("^[0-9-]+$");
            var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
            if (!regex.test(key)) {
                event.preventDefault();
                return false;
            }
        });

        function check_email(elm) {
            var regex_email = /^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*\@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*(\.([a-zA-Z]){2,4})$/
            if (!elm.value.match(regex_email)) {
                alert('You have entered an invalid email address!');
            } else {

            }
        }
        $('#email').on('keypress', function (event) {
            var regex = new RegExp("^[a-zA-Z0-9@.?-]+$");
            var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
            if (!regex.test(key)) {
                event.preventDefault();
                return false;
            }
        });

        function show_edit(id, credit_number, credit_name, credit_date, credit_cvv) {
            // ส่งค่าไปยัง input ด้วย id
            $('#id_for_edit').val(id);
            $('#card_number_for_edit').val(credit_number)
            $('#card_name_for_edit').val(credit_name)
            $('#card_date_for_edit').val(credit_date)
            $('#card_cvv_for_edit').val(credit_cvv)
        }

        function delete_payment(id) {

            swal({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#DD6B55',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                },
                function (isConfirm) {
                    if (isConfirm) {
                        $.ajax({
                            type: "DELETE",
                            url: "<?php echo url(Session::get('lang').'/profile/payment/delete/id=" + id + "'); ?>",
                            data: {
                                '_token': "<?php echo e(csrf_token()); ?>"
                            },
                            success: function (data) {
                                console.log(data);
                                location.reload();
                            }
                        });
                    }
                });
        }

    </script>
</body>

</html><?php /**PATH /home/zkorn2/domains/korn2.orangeworkshop.info/public_html/Poolvilla/resources/views/frontend/profile.blade.php ENDPATH**/ ?>