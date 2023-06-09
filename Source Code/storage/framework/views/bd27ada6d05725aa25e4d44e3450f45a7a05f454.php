<!DOCTYPE html>
<html lang="en">

<head>
    <?php echo $__env->make('layout.style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            <?php echo $__env->make('layout.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('layout.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <?php if(!isset($discountrooms)): ?>
                        <h1 class="font-large-1">Create Discount Rooms</h1>
                        <?php else: ?>
                        <h1 class="font-large-1">Edit Discount Rooms</h1>
                        <?php endif; ?>
                    </div>
                    <div class="section-body">
                        <div class="card col-8">
                            <div class="card-body p-0">
                                <?php if(!isset($discountrooms)): ?>
                                <form action="<?php echo e(url('/backend/banner/discount-rooms/save/'.$banner->id)); ?>"
                                    enctype="multipart/form-data" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="id" value="<?php echo e($banner->id); ?>">
                                    <input type="hidden" name="type" value="1">
                                    <?php else: ?>
                                    <form
                                        action="<?php echo e(url('/backend/banner/discount-rooms/update/'.$banner->id.'/'.$discountrooms->id_roomdetails)); ?>"
                                        enctype="multipart/form-data" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="id" value="<?php echo e($banner->id); ?>">
                                        <input type="hidden" name="id_roomdetails"
                                            value="<?php echo e($discountrooms->id_roomdetails); ?>">
                                        <input type="hidden" name="type" value="2">
                                        <?php endif; ?>
                                        <!-- form insert -->
                                        <?php if(!isset($discountrooms)): ?>
                                        <div class="form-group row ml-4 mt-5">
                                            <label for="" class="col-md-2 col-form-label">Poolvilla <font color="red">*</font> :</label>
                                            <div class="col-md-4">
                                                <select class="form-control" name="ref_poolvilla_id"
                                                    id="ref_poolvilla_id" required>
                                                    <option value="">Please select a pool villa</option>
                                                    <?php $__currentLoopData = $poolvilla; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($val->id); ?>"><?php echo e($val->name_en); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row ml-4 mt-5">
                                            <label for="" class="col-md-2 col-form-label">Room <font color="red">*</font> :</label>
                                            <div class="col-md-4">
                                                <select class="form-control" name="ref_room_id" id="ref_room_id" required>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row ml-4 mt-5" style="display:none;">
                                            <label for="" class="col-md-2 col-form-label">Discount <font color="red">*</font> :</label>
                                            <div class="col-md-4">
                                                <select class="form-control" name="ref_discount_id"
                                                    id="ref_discount_id">
                                                </select>
                                                <select class="form-control" name="ref_start_date"
                                                    id="ref_start_date">
                                                </select>
                                                <select class="form-control" name="ref_end_date"
                                                    id="ref_end_date">
                                                </select>
                                            </div>
                                        </div>
                                        <?php else: ?>
                                        <!-- End : form insert -->
                                        <!-- form update -->
                                        <div class="form-group row ml-4 mt-5">
                                            <label for="" class="col-md-2 col-form-label">Poolvilla <font color="red">*</font> :</label>
                                            <div class="col-md-4">
                                                <select class="form-control" name="ref_poolvilla_id"
                                                    id="ref_poolvilla_id" required>
                                                    <option value="">Please select a pool villa</option>
                                                    <?php $__currentLoopData = $poolvilla; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option <?php echo e(($discountrooms->ref_poolvilla_id == $val->id)? "selected" : ""); ?> value="<?php echo e($val->id); ?>"><?php echo e($val->name_en); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row ml-4 mt-5">
                                            <label for="" class="col-md-2 col-form-label">Room <font color="red">*</font> :</label>
                                            <div class="col-md-4">
                                                <select class="form-control" name="ref_room_id" id="ref_room_id" required>
                                                    <option value="">Please select a room</option>
                                                    <?php $__currentLoopData = $room; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option <?php echo e(($discountrooms->ref_room_id == $val->id)? "selected" : ""); ?> value="<?php echo e($val->id); ?>"><?php echo e($val->name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row ml-4 mt-5" style="display:none;">
                                            <label for="" class="col-md-2 col-form-label">Discount <font color="red">*</font> :</label>
                                            <div class="col-md-4">
                                                <select class="form-control" name="ref_discount_id" id="ref_discount_id">
                                                    <?php $__currentLoopData = $discount; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option <?php echo e(($discountrooms->ref_discount_id == $val->id)? "selected" : ""); ?> value="<?php echo e($val->id); ?>"><?php echo e($val->id); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                                <select class="form-control" name="ref_start_date" id="ref_start_date">
                                                    <?php $__currentLoopData = $discountSdate; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option <?php echo e(($discountrooms->ref_start_date == $val->start_date)? "selected" : ""); ?> value="<?php echo e($val->start_date); ?>"><?php echo e($val->start_date); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                                <select class="form-control" name="ref_end_date" id="ref_end_date">
                                                    <?php $__currentLoopData = $discountEdate; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option <?php echo e(($discountrooms->ref_end_date == $val->end_date)? "selected" : ""); ?> value="<?php echo e($val->end_date); ?>"><?php echo e($val->end_date); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row ml-4 mt-5">
                                            <label class="col-md-2 col-form-label">Status :</label>
                                            <div class="col-md-10 mt-2">
                                                <div class="custom-control custom-switch">
                                                    <?php if(empty($discountrooms)): ?>
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="customSwitch" name="status" value="1" checked>
                                                    <?php else: ?>
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="customSwitch" name="status" value="1"
                                                        <?php echo e(@$discountrooms->status == '1' ? 'checked' : ''); ?>>
                                                    <?php endif; ?>
                                                    <label class="custom-control-label" for="customSwitch"> Active /
                                                        Deactive</label>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endif; ?>
                                        <!-- End : form update -->
                                        <div class="form-group mb-0 row">
                                            <div class="col-md-6">
                                                <a class="btn btn-secondary btn-sm waves-effect"
                                                    href="<?php echo e(url('/backend/admin/banner/discount-rooms/'.$banner->id)); ?>">
                                                    <i class="fa fa-reply font-size-16 align-middle mr-1"></i> Return
                                                </a>
                                            </div>
                                            <div class="col-md-6 text-right">
                                                <button type="submit" class="btn btn-success btn-sm waves-effect">
                                                    <i class="fa fa-save font-size-16 align-middle mr-1"></i>
                                                    <?php if(!isset($discountrooms)): ?>
                                                    Save
                                                    <?php else: ?>
                                                    Update
                                                    <?php endif; ?>
                                                </button>
                                            </div>
                                        </div><br>
                                        <?php if(!isset($discountrooms)): ?>
                                    </form>
                                    <?php else: ?>
                                </form>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <?php echo $__env->make('layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>

    <?php echo $__env->make('layout.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <script type="text/javascript">
        $('#ref_poolvilla_id').change(function () {
            var pid = $(this).val();
            if (pid) {
                $.ajax({
                    type: "GET",
                    url: "<?php echo url('/backend/banner/discount-rooms/getRoom/" + pid + "'); ?>",
                    success: function (res) {
                        if (res) {
                            $("#ref_room_id").empty();
                            $("#ref_discount_id").empty();
                            $("#ref_start_date").empty();
                            $("#ref_end_date").empty();
                            $("#ref_room_id").append('<option>Please select a room</option>');
                            $.each(res, function (key, value) {
                                $("#ref_room_id").append('<option value="' + key + '">' +
                                    value + '</option>');
                            });
                        }
                    }

                });
            }
        });

        $('#ref_room_id').change(function () {
            var rid = $(this).val();
            if (rid) {
                $.ajax({
                    type: "GET",
                    url: "<?php echo url('/backend/banner/discount-rooms/getDiscount/" + rid + "'); ?>",
                    success: function (res) {
                        if (res) {
                            $("#ref_discount_id").empty();
                            $("#ref_start_date").empty();
                            $("#ref_end_date").empty();
                            $.each(res.discount, function (item, discount) {
                                $("#ref_discount_id").append('<option value="' + discount.id +
                                    '">' +
                                    discount.id + '</option>');
                                $("#ref_start_date").append('<option value="' + discount.start_date + '">' +
                                    discount.start_date + '</option>');
                                $("#ref_end_date").append('<option value="' + discount.end_date + '">' +
                                    discount.end_date + '</option>');
                            });
                        }
                    }
                });
            }
        });

    </script>

</body>

</html>
<?php /**PATH /home/zkorn2/domains/korn2.orangeworkshop.info/public_html/Poolvilla/resources/views/backend/banner/manage_roomdetail_discount/form.blade.php ENDPATH**/ ?>