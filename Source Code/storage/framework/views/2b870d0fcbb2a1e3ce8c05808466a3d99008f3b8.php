<!DOCTYPE html>
<html lang="en">

<head>
    <?php echo $__env->make('layout.style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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
                        <h1>Banking System Manage</h1>
                    </div>

                    <div class="section-body">

                        <div class="card">
                            <?php if($check->page_create == 1): ?>
                            <div class="card-header">
                                <!-- add user button -->
                                <div class="text-right">
                                    <a href="<?php echo e(url('backend/admin/add_bank_system')); ?>" class="btn btn-success "><i
                                            class="fa fa-plus"></i> add</a>
                                </div><br>
                            </div>
                            <?php endif; ?>
                            <div class="card-body ">
                                <div class="table-responsive">
                                    <table id="simpletable" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col"><i class="fa fa-user text-center"></i>Bank Name</th>
                                                <th scope="col"><i class="fa fa-user text-center"></i>Acoount Number
                                                </th>
                                                <th scope="col"><i class="fa fa-envelope text-center"></i> Logo</th>
                                                <th scope="col"><i class="fa fa-envelope text-center"></i> Status</th>
                                                <?php if($check->page_edit == 1 || $check->page_delete == 1): ?>
                                                <th class="text-center"><i class="fa fa-cog "></i> Tools</th>
                                                <?php endif; ?>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php $__currentLoopData = $bank; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($key+1); ?></td>
                                                <td><?php echo e($u->name); ?> </td>
                                                <td><?php echo e($u->account_number); ?> </td>
                                                <td class="text-center"><img src="<?php echo e(asset($u->logo)); ?>" width="120px"
                                                        height="120px"></td>

                                                <td>
                                                    <?php if($u->status==1): ?>
                                                    <span class="text-success">Active</span>
                                                    <?php else: ?>
                                                    <span class="text-danger">Deactive</span>
                                                    <?php endif; ?>
                                                </td>
                                                <?php if($check->page_edit == 1 || $check->page_delete == 1): ?>
                                                <td class="text-center">
                                                    <?php if($check->page_edit == 1): ?>
                                                    <a class="btn btn-warning text-white"
                                                        href="<?php echo e(url('backend/admin/update_bank_system/'.$u->id)); ?>"> Edit
                                                        <i class="fa fa-user"></i></a>
                                                    <?php endif; ?>
                                                    <!-- <a class="btn btn-info text-white" href="<?php echo e(url('backend/admin/hotel/'.$u->id)); ?>">  Pool Villa<i class="fa fa-hotel"></i></a> -->

                                                </td>
                                                <?php endif; ?>
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            </section>
        </div>
        <?php echo $__env->make('layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    </div>

    <?php echo $__env->make('layout.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- form to reset password -->
    <form action="<?php echo e(url('/backend/hotel_reset')); ?>" method="POST" id="reset_password">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="id" id="id_reset">
    </form>
    <script>
        $('#simpletable').dataTable();

        function confirm_reset(id) {
            Swal.fire({
                title: 'Are you sure to reset?',
                text: "Reset password:m123456",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Confirm'
            }).then((result) => {
                if (result.isConfirmed) {

                    $('#id_reset').val(id);
                    $('#reset_password').submit();
                }
            });
        }

    </script>
</body>

</html>
<?php /**PATH /home/zkorn2/domains/korn2.orangeworkshop.info/public_html/Poolvilla/resources/views/backend/banking_system/index.blade.php ENDPATH**/ ?>